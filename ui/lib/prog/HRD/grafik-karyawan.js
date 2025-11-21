$(document).ready(function() {
    const _url = $('#_url').val();

    // Format header's date
    const date = $('.tdate').text();
    const fdate = formatDate(date);
    $('.tdate').text(fdate);

    // Get graph settings and render
    const graph = {};

    const fd = new FormData();
    const names = Object.keys(_boilerplate);
    fd.append('names', JSON.stringify(names));

    $.ajax({
        url: _url + 'grafik-karyawan/graph-settings/',
        type: 'post',
        data: fd,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
            response.forEach((item) => {
                const name = item.name;
                delete item.id;
                delete item.name;
                graph[name] = item;
            });

            render();
        },
    });

    // Mode changes
    $(document).on('change', '[id$="Mode"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const mode = $(this).val();

        const parent = $(this).closest('.chart-container');
        const parentIndex = parent.index();

        const fd = new FormData();
        fd.append('name', name);
        fd.append('mode', mode);

        $.ajax({
            url: _url + 'grafik-karyawan/change-mode/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                graph[name].mode = response.mode;
                graph[name].chart = response.chart;

                parent.remove();

                const mode = +graph[name].mode;
                const type = _boilerplate[name].type;
                const data = createData([name], false, false)[name];
                let values;

                if (mode !== 1) {
                    values = { dateType: 'month' };
                    for (let i = 1; i <= mode; i ++) {
                        values[`${i}-Banding`] = new Date(new Date().getFullYear(), new Date().getMonth() - mode + i + 1).toISOString().slice(0, 7);
                    }
                } else if (type.startsWith('c-') || type.endsWith('monthyear')) {
                    values = {
                        dateType: 'month',
                        from: new Date(new Date().getFullYear(), new Date().getMonth() - 10).toISOString().slice(0, 7),
                        to: new Date(new Date().getFullYear(), new Date().getMonth() + 1).toISOString().slice(0, 7),
                    };
                } else {
                    values = { date: new Date(new Date().getFullYear(), new Date().getMonth() + 1).toISOString().slice(0, 7) };
                }

                const html = getTemplate(name, values);
                parentIndex === 0 ? $('#grafik').prepend(html) : $('#grafik').children().eq(parentIndex - 1).after(html);

                loadChart(name, data);
            },
        });
    });

    // Date Type changes
    $(document).on('change', '[id$="DateType1"], [id$="DateType2"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const dateType = $(this).val();

        const parent = $(this).closest('.chart-container');
        const parentIndex = parent.index();

        const mode = +graph[name].mode;
        let values = { dateType };

        if (mode === 1) {
            if (dateType === 'month') {
                values.from = new Date(new Date().getFullYear(), new Date().getMonth() - 10).toISOString().slice(0, 7);
                values.to = new Date(new Date().getFullYear(), new Date().getMonth() + 1).toISOString().slice(0, 7);
            } else {
                values.from = new Date().getFullYear() - 1;
                values.to = new Date().getFullYear();
            }
        } else {
            for (let i = 1; i <= mode; i ++) {
                if (dateType === 'month') values[`${i}-Banding`] = new Date(new Date().getFullYear(), new Date().getMonth() - mode + i + 1).toISOString().slice(0, 7);
                else values[`${i}-Banding`] = new Date().getFullYear() - mode + i;
            }
        }

        parent.remove();

        const html = getTemplate(name, values);
        parentIndex === 0 ? $('#grafik').prepend(html) : $('#grafik').children().eq(parentIndex - 1).after(html);

        const data = createData([name], false, false)[name];
        loadChart(name, data);
    });

    // Banding, From, To, Periode changes
    $(document).on('change', '[id$="Banding"], [id$="From"], [id$="To"], [id$="Periode"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const data = createData([ name ], false, false);
        loadChart(name, data[name]);
    });

    // Chart Type changes
    $(document).on('change', '[id$="Tipe"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const chart = $(this).val();

        const parent = $(this).closest('.chart-container');
        const parentIndex = parent.index();

        const fd = new FormData();
        fd.append('name', name);
        fd.append('chart', chart);

        $.ajax({
            url: _url + 'grafik-karyawan/change-chart/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            complete: function() {
                graph[name].chart = chart;

                const mode = +graph[name].mode;
                const type = _boilerplate[name].type;
                const data = createData([name], false, false)[name];
                let values;

                if (mode !== 1) {
                    const dateType = $(`#${id}-DateType2`).val() ?? 'month';
                    values = { dateType };

                    for (let i = 1; i <= mode; i ++) {
                        const banding = $(`#${i}-Banding`).val();
                        if (dateType === 'month') values[`${i}-Banding`] = banding ?? new Date(new Date().getFullYear(), new Date().getMonth() - mode + i + 1).toISOString().slice(0, 7);
                        else values[`${i}-Banding`] = banding ?? new Date().getFullYear();
                    }
                } else if (type.startsWith('c-') || type.endsWith('monthyear')) {
                    const dateType = $(`#${id}-DateType1`).val() ?? 'month';
                    const from = $(`#${id}-From`).val();
                    const to = $(`#${id}-To`).val();
                    values = { dateType, from, to };
                } else {
                    const date = $(`#${id}-Periode`).val();
                    values = { date };
                }

                parent.remove();

                const html = getTemplate(name, values);
                parentIndex === 0 ? $('#grafik').prepend(html) : $('#grafik').children().eq(parentIndex - 1).after(html);

                loadChart(name, data);
            },
        });
    });

    // Legend changes
    $(document).on('change', '[id$="Legend"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const legend = $(this).val();

        const fd = new FormData();
        fd.append('name', name);
        fd.append('legend', legend);

        $.ajax({
            url: _url + 'grafik-karyawan/change-legend/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            complete: function() {
                graph[name].legend = legend;
                const chart = Chart.getChart($(`#${id}`).get(0));

                if (legend === '-') {
                    chart.options.plugins.legend.display = false;
                } else {
                    chart.options.plugins.legend.display = true;
                    chart.options.plugins.legend.position = legend;
                }

                chart.update();
            },
        });
    });

    // Percentage changes
    $(document).on('change', '[id$="Percentage"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const percentage = $(this).prop('checked');

        const fd = new FormData();
        fd.append('name', name);
        fd.append('percentage', percentage);

        $.ajax({
            url: _url + 'grafik-karyawan/change-percentage/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            complete: function() {
                graph[name].percentage = percentage ? '1' : '0';
                changeDataLabelFormatter(id, graph[name]);
            },
        });
    });

    // Number changes
    $(document).on('change', '[id$="Number"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const number = $(this).prop('checked');

        const fd = new FormData();
        fd.append('name', name);
        fd.append('number', number);

        $.ajax({
            url: _url + 'grafik-karyawan/change-number/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            complete: function() {
                graph[name].number = number ? '1' : '0';
                changeDataLabelFormatter(id, graph[name]);
            },
        });
    });

    // Hide changes
    $(document).on('change', '[id$="Hide"]', function() {
        const id = $(this).attr('id').split('-')[0];
        const name = id.split('_').join(' ');
        const hide = $(this).prop('checked');

        const fd = new FormData();
        fd.append('name', name);
        fd.append('hide', hide);

        $.ajax({
            url: _url + 'grafik-karyawan/change-hide/',
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            complete: function() {
                graph[name].hide = hide ? '1' : '0';
                const data = createData([name], false, false)[name];
                loadChart(name, data);
            },
        });
    });

    // Adjust table
    $('#chart-table-detail').on('shown.bs.modal', function () {
        $('#chart-table').DataTable().columns.adjust();
    });

    // Adjust cuti table
    $('#chart-table-cuti-detail').on('shown.bs.modal', function () {
        $('#chart-table-cuti').DataTable().columns.adjust();
    });

    function render() {
        const data = createData(Object.keys(_boilerplate), false, false);

        Object.entries(data).forEach(([ name, data ]) => {
            const type = _boilerplate[name].type;
            const setting = graph[name];
            const mode = +setting.mode;
            let values;

            if (mode !== 1) {
                values = { dateType: 'month' };
                for (let i = 1; i <= mode; i ++) {
                    values[`${i}-Banding`] = new Date(new Date().getFullYear(), new Date().getMonth() - mode + i + 1).toISOString().slice(0, 7);
                }
            } else if (type.startsWith('c-') || type.endsWith('monthyear')) {
                values = {
                    dateType: 'month',
                    from: new Date(new Date().getFullYear(), new Date().getMonth() - 10).toISOString().slice(0, 7),
                    to: new Date(new Date().getFullYear(), new Date().getMonth() + 1).toISOString().slice(0, 7),
                };
            } else {
                values = { date: new Date(new Date().getFullYear(), new Date().getMonth() + 1).toISOString().slice(0, 7) };
            }

            const html = getTemplate(name, values);
            $('#grafik').append(html);

            loadChart(name, data);
        });
    }

    function createData(names, label, dataset) {
        const table = [];
        const result = names.reduce((obj, name) => ({ ...obj, [name]: {} }), {});

        _data.forEach((item) => {
            const [ joinYear, joinMonth ] = item.first_join_date.split('-');
            const joinDate = new Date(+joinYear, +joinMonth - 1);

            const isTerminated = item.terminated === '1';
            const [ terminationYear, terminationMonth ] = isTerminated ? item.termination_date.split('-') : [ null, null ];
            const terminationDate = isTerminated && new Date(+terminationYear, +terminationMonth - 1);

            const tableData = [ item.id, item.employee_id, item.employee_name, item.terminated, item.years_in_service, item.grade, item.id ];
            const cutiTableData = [ item.id, item.employee_id, item.employee_name, item.terminated, item.request_date, item.request_status, item.number_of_working_applied, item.karyawan_id ];

            names.forEach((name) => {
                const setting = _boilerplate[name];
                const type = setting.type;
                const key = setting.key;
                const mode = +graph[name].mode;
                const id = name.split(' ').join('_');
                const data = item[key];
                let value;

                if (type.startsWith('c-')) {

                    if (mode === 1) {
                        const { from, to } = getFromAndTo(id);

                        const dateTypeId = `#${id}-DateType1`;
                        const dateType = $(dateTypeId)?.val() ?? 'month';

                        const [ requestYear, requestMonth ] = item.request_date.split('-');
                        const date = dateType === 'month' ? new Date(+requestYear, +requestMonth - 1) : new Date(+requestYear, 0);

                        const inRange = from <= date && date <= to;

                        const temp = (type === 'c-monthyear')
                        ? (dateType === 'month' ? getMonthYear(data) : getYear(data))
                        : data ?? '-';

                        if (inRange) {
                            if (label === temp) table.push(cutiTableData);
                            else value = temp;
                        }
                    } else {
                        const { dateType, banding1, banding2, banding3 } = getDateTypeAndBanding(id);

                        const [ requestYear, requestMonth ] = item.request_date.split('-');
                        const date = dateType === 'month' ? new Date(+requestYear, requestMonth - 1) : new Date(+requestYear, 0);

                        const b1 = date.getTime() === banding1.getTime();
                        const b2 = date.getTime() === banding2.getTime();
                        const b3 = mode === 3 && date.getTime() === banding3.getTime();

                        const temp = data ?? '-';

                        if (b1 || b2 || b3) {
                            if (dataset) {
                                const d1 = b1 && dataset === (dateType === 'month' ? getMonthYear(banding1) : getYear(banding1));
                                const d2 = b2 && dataset === (dateType === 'month' ? getMonthYear(banding2) : getYear(banding2));
                                const d3 = b3 && dataset === (dateType === 'month' ? getMonthYear(banding3) : getYear(banding3));
                                if (label === temp && (d1 || d2 || d3)) table.push(cutiTableData);
                            } else {
                                value = [ temp, {} ];
                                value[1][banding1] = b1;
                                value[1][banding2] = b2;
                                if (mode === 3) value[1][banding3] = b3;
                            }
                        }
                    }

                } else if (type.endsWith('monthyear')) {

                    const { from, to } = getFromAndTo(id);

                    const dateTypeId = `#${id}-DateType1`;
                    const dateType = $(dateTypeId)?.val() ?? 'month';

                    const [ dataYear, dataMonth ] = data?.split('-') ?? [ null, null ];
                    const date = dataYear && dataMonth && (dateType === 'month' ? new Date(+dataYear, +dataMonth - 1) : new Date(+dataYear, 0));

                    const inRange = date && from <= date && date <= to;
                    const amy = type === 'a-monthyear';
                    const tmy = type === 't-monthyear' && isTerminated;

                    const temp = dateType === 'month' ? getMonthYear(data) : getYear(data);

                    if (inRange && (amy || tmy)) {
                        if (label === temp) table.push(tableData);
                        else value = temp;
                    }

                } else if (type.endsWith('floor') || type.endsWith('age')) {

                    const periodId = `#${id}-Periode`;
                    const [ periodYear, periodMonth ] = $(periodId)?.val()?.split('-') ?? [ null, null ];
                    const date = periodYear && periodMonth ? new Date(+periodYear, +periodMonth - 1) : new Date(new Date().getFullYear(), new Date().getMonth());

                    const tFloor = type === 't-floor' && isTerminated && terminationDate <= date;
                    const floor = type === 'floor' && joinDate <= date && (!isTerminated || date <= terminationDate);
                    const age = type === 'age' && joinDate <= date && (!isTerminated || date <= terminationDate);

                    const temp = (type.endsWith('floor'))
                    ? (data ? Math.floor(data).toString() : '-')
                    : (getAge(data));

                    if (tFloor || floor || age) {
                        if (label === temp) table.push(tableData);
                        else value = temp;
                    }

                } else {

                    if (mode === 1) {
                        const periodId = `#${id}-Periode`;
                        const [ periodYear, periodMonth ] = $(periodId)?.val()?.split('-') ?? [ null, null ];
                        const date = periodYear && periodMonth ? new Date(+periodYear, +periodMonth - 1) : new Date(new Date().getFullYear(), new Date().getMonth());

                        const tBasic = type === 't-basic' && isTerminated && terminationDate <= date;
                        const basic = type === 'basic' && joinDate <= date && (!isTerminated || date <= terminationDate);
                        const bool = type === 'bool' && joinDate <= date && (!isTerminated || date <= terminationDate);

                        const temp = (type === 'bool')
                        ? (data === '1' ? 'Yes': 'No')
                        : (data ?? '-');

                        if (tBasic || basic || bool) {
                            if (label === temp) table.push(tableData);
                            else value = temp;
                        }
                    } else {
                        const { dateType, banding1, banding2, banding3 } = getDateTypeAndBanding(id);
                        const jDate = dateType !== 'month' ? new Date(joinDate.getFullYear(), 0) : joinDate;
                        const tDate = isTerminated && dateType !== 'month' ? (new Date(terminationDate.getFullYear(), 0)) : terminationDate;

                        let b1, b2, b3;

                        if (type === 't-basic') {
                            b1 = tDate <= banding1;
                            b2 = tDate <= banding2;
                            b3 = mode === 3 && tDate <= banding3;
                        } else {
                            b1 = jDate <= banding1 && (!isTerminated || banding1 <= tDate);
                            b2 = jDate <= banding2 && (!isTerminated || banding2 <= tDate);
                            b3 = mode === 3 && jDate <= banding3 && (!isTerminated || banding3 <= tDate);
                        }

                        const tBasic = type === 't-basic' && isTerminated && (b1 || b2 || b3);
                        const basic = type === 'basic' && (b1 || b2 || b3);
                        const bool = type === 'bool' && (b1 || b2 || b3);

                        const temp = (type === 'bool')
                        ? (data === '1' ? 'Yes': 'No')
                        : (data ?? '-');

                        if (tBasic || basic || bool) {
                            if (dataset) {
                                const d1 = b1 && dataset === (dateType === 'month' ? getMonthYear(banding1) : getYear(banding1));
                                const d2 = b2 && dataset === (dateType === 'month' ? getMonthYear(banding2) : getYear(banding2));
                                const d3 = b3 && dataset === (dateType === 'month' ? getMonthYear(banding3) : getYear(banding3));
                                if (label === temp && (d1 || d2 || d3)) table.push(tableData);
                            } else {
                                value = [ temp, {} ];
                                value[1][banding1] = b1;
                                value[1][banding2] = b2;
                                if (mode === 3) value[1][banding3] = b3;
                            }
                        }
                    }

                }

                if (!label && value !== undefined) {
                    if (typeof (value) === 'object') {
                        const [ key, data ] = value;
                        const dates = Object.keys(data);

                        if (!result[name][key]) result[name][key] = dates.reduce((obj, date) => ({ ...obj, [date]: 0}), {});

                        dates.forEach((date) => {
                            const value = data[date];
                            if (value) result[name][key][date] ++;
                        });
                    } else {
                        if (!result[name][value]) result[name][value] = 1;
                        else result[name][value] ++;
                    }
                }

            });
        });

        return label ? table : result;
    }

    function getFromAndTo(id) {
        const dateTypeId = `#${id}-DateType1`;
        const fromId = `#${id}-From`;
        const toId = `#${id}-To`;

        const dateType = $(dateTypeId)?.val() ?? 'month';
        let from, to;

        if (dateType === 'month') {
            const [ fromYear, fromMonth ] = $(fromId)?.val()?.split('-') ?? [ null, null ];
            const [ toYear, toMonth ] = $(toId)?.val()?.split('-') ?? [ null, null ];;

            from = fromYear && fromMonth ? new Date(+fromYear, +fromMonth - 1) : new Date(new Date().getFullYear(), new Date().getMonth() - 11);
            to = toYear && toMonth ? new Date(+toYear, +toMonth - 1) : new Date(new Date().getFullYear(), new Date().getMonth());
        } else {
            const fromYear = $(fromId)?.val();
            const toYear = $(toId)?.val();

            from = fromYear ? new Date(+fromYear, 0) : new Date(new Date().getFullYear() - 1, 0);
            to = toYear ? new Date(+toYear, 0) : new Date(new Date().getFullYear(), 0);
        }

        return { from, to };
    }

    function getDateTypeAndBanding(id) {
        const name = id.split('_').join(' ');
        const mode = +graph[name].mode;

        const dateTypeId = `#${id}-DateType2`;
        const banding1Id = `#${id}-1-Banding`;
        const banding2Id = `#${id}-2-Banding`;
        const banding3Id = `#${id}-3-Banding`;

        const dateType = $(dateTypeId)?.val() ?? 'month';
        let banding1, banding2, banding3;

        if (dateType === 'month') {
            const [ banding1Year, banding1Month ] = $(banding1Id)?.val()?.split('-') ?? [ null, null ];
            banding1 = banding1Year && banding1Month ? new Date(+banding1Year, +banding1Month - 1) : new Date(new Date().getFullYear(), new Date().getMonth() - mode + 1);

            const [ banding2Year, banding2Month ] = $(banding2Id)?.val()?.split('-') ?? [ null, null ];
            banding2 = banding2Year && banding2Month ? new Date(+banding2Year, +banding2Month - 1) : new Date(new Date().getFullYear(), new Date().getMonth() - mode + 2);

            const [ banding3Year, banding3Month ] = $(banding3Id)?.val()?.split('-') ?? [ null, null ];
            banding3 = banding3Year && banding3Month ? new Date(+banding3Year, +banding3Month - 1) : new Date(new Date().getFullYear(), new Date().getMonth() - mode + 3);
        } else {
            const banding1Year = $(banding1Id)?.val();
            const banding2Year = $(banding2Id)?.val();
            const banding3Year = $(banding3Id)?.val();

            banding1 = banding1Year ? new Date(+banding1Year, 0) : new Date(new Date().getFullYear() - mode + 1, 0);
            banding2 = banding2Year ? new Date(+banding2Year, 0) : new Date(new Date().getFullYear() - mode + 2, 0);
            banding3 = banding3Year ? new Date(+banding3Year, 0) : new Date(new Date().getFullYear() - mode + 3, 0);
        }

        return { dateType, banding1, banding2, banding3 };
    }

    function getTemplate(name, values) {
        const id = name.split(' ').join('_');
        const boilerplate = _boilerplate[name];
        const setting = graph[name];
        const mode = +setting.mode;

        return `
            <div class="chart-container">
                <h3 class="text-center">${name}</h3>
                ${boilerplate.type.endsWith('basic') || boilerplate.type.endsWith('bool') ? `
                    <div class="form-group">
                        <label for="${id}-Mode" class="col-lg-3 control-label">Mode</label>
                        <div class="col-lg-9">
                            <select id="${id}-Mode" class="form-control" style="width: 100%;">
                                <option value="1" ${mode === 1 && 'selected'}>Single</option>
                                <option value="2" ${mode === 2 && 'selected'}>2 Perbandingan</option>
                                <option value="3" ${mode === 3 && 'selected'}>3 Perbandingan</option>
                            </select>
                        </div>
                    </div>
                ` : ''}
                ${
                    mode !== 1
                    ? `
                        <div class="form-group">
                            <label for="${id}-DateType2" class="col-lg-3 control-label">Waktu</label>
                            <div class="col-lg-9">
                                <select id="${id}-DateType2" class="form-control" style="width: 100%;">
                                    <option value="month" ${values.dateType === 'month' && 'selected'}>Bulanan</option>
                                    <option value="year" ${values.dateType === 'year' && 'selected'}>Tahunan</option>
                                </select>
                            </div>
                        </div>
                        ${Array.from({ length: mode }).map((_, i) => `
                            <div class="form-group">
                                <label for="${id}-${i + 1}-Banding" class="col-lg-3 control-label">Periode ${i + 1}</label>
                                <div class="col-lg-9">
                                    ${
                                        values.dateType === 'month'
                                        ? `<input type="month" class="form-control" id="${id}-${i + 1}-Banding" value="${values[`${i + 1}-Banding`]}">`
                                        : `<input type="number" min="1970" max="${new Date().getFullYear()}" class="form-control" id="${id}-${i + 1}-Banding" value="${values[`${i + 1}-Banding`]}">`
                                    }
                                </div>
                            </div>
                        `).join('')}
                    `
                    : values.dateType
                        ? `
                            ${boilerplate.type.endsWith('monthyear') ? `
                                <div class="form-group">
                                    <label for="${id}-DateType1" class="col-lg-3 control-label">Waktu</label>
                                    <div class="col-lg-9">
                                        <select id="${id}-DateType1" class="form-control" style="width: 100%;">
                                            <option value="month" ${values.dateType === 'month' && 'selected'}>Bulanan</option>
                                            <option value="year" ${values.dateType === 'year' && 'selected'}>Tahunan</option>
                                        </select>
                                    </div>
                                </div>
                            ` : ''}
                            <div class="form-group">
                                <label for="${id}-From" class="col-lg-3 control-label">Mulai</label>
                                <div class="col-lg-9">
                                    ${
                                        values.dateType === 'month'
                                        ? `<input type="month" class="form-control" id="${id}-From" value="${values.from}">`
                                        : `<input type="number" min="1970" max="${new Date().getFullYear()}" class="form-control" id="${id}-From" value="${values.from}">`
                                    }
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="${id}-To" class="col-lg-3 control-label">Hingga</label>
                                <div class="col-lg-9">
                                    ${
                                        values.dateType === 'month'
                                        ? `<input type="month" class="form-control" id="${id}-To" value="${values.to}">`
                                        : `<input type="number" min="1970" max="${new Date().getFullYear()}" class="form-control" id="${id}-To" value="${values.to}">`
                                    }
                                </div>
                            </div>
                        `
                        : `
                            <div class="form-group">
                                <label for="${id}-Periode" class="col-lg-3 control-label">Periode</label>
                                <div class="col-lg-9">
                                    <input type="month" class="form-control" id="${id}-Periode" value="${values.date}">
                                </div>
                            </div>
                        `
                }
                <div class="form-group">
                    <label for="${id}-Tipe" class="col-lg-3 control-label">Tipe Grafik</label>
                    <div class="col-lg-9">
                        <select id="${id}-Tipe" class="form-control" style="width: 100%;">
                            <option value="bar" ${setting.chart === 'bar' && 'selected'}>Bar Chart</option>
                            ${mode === 1 ? `<option value="doughnut" ${setting.chart === 'doughnut' && 'selected'}>Pie Chart</option>` : ''}
                            <option value="line" ${setting.chart === 'line' && 'selected'}>Line Chart</option>
                        </select>
                    </div>
                </div>
                ${
                    setting.chart === 'doughnut' || mode !== 1 ?
                    `
                        <div class="form-group">
                            <label for="${id}-Legend" class="col-lg-3 control-label">Legend</label>
                            <div class="col-lg-9">
                                <select id="${id}-Legend" class="form-control" style="width: 100%;">
                                    <option value="-" ${setting.legend === '-' && 'selected'}>Tidak ada</option>
                                    <option value="top" ${setting.legend === 'top' && 'selected'}>Atas</option>
                                    <option value="bottom" ${setting.legend === 'bottom' && 'selected'}>Bawah</option>
                                    <option value="left" ${setting.legend === 'left' && 'selected'}>Kiri</option>
                                    <option value="right" ${setting.legend === 'right' && 'selected'}>Kanan</option>
                                </select>
                            </div>
                        </div>
                    ` : ''
                }
                <div class="form-group">
                    <label for="${id}-Percentage" class="col-lg-3 control-label">Tampilkan Persentase</label>
                    <div class="col-lg-9">
                        <div class="form-control" style="padding-left: 0; border: none;">
                            <input type="checkbox" id="${id}-Percentage" ${setting.percentage === '1' && 'checked'}>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="${id}-Number" class="col-lg-3 control-label">Tampilkan Angka</label>
                    <div class="col-lg-9">
                        <div class="form-control" style="padding-left: 0; border: none;">
                            <input type="checkbox" id="${id}-Number" ${setting.number === '1' && 'checked'}>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="${id}-Hide" class="col-lg-3 control-label">Jangan tampilkan data kosong</label>
                    <div class="col-lg-9">
                        <div class="form-control" style="padding-left: 0; border: none;">
                            <input type="checkbox" id="${id}-Hide" ${setting.hide === '1' && 'checked'}>
                        </div>
                    </div>
                </div>
                <p id="${id}-Total" style="text-align: center;">Total : 0</p>
                <div style="width: 100%; max-height: 480px; max-width: 1024px; margin: 0 auto; display: flex; justify-content: center;">
                    <canvas id="${id}" style="margin-top: 16px;"></canvas>
                </div>
            </div>
        `;
    }

    function loadChart(name, rawData) {
        const id = name.split(' ').join('_');
        const boilerplate = _boilerplate[name];
        const setting = graph[name];
        const type = setting.chart;
        const mode = setting.mode;

        const keys = formatKeys(rawData, setting, boilerplate);
        const values = keys.map((key) => rawData[key]);

        const data = getChartData(id, keys, values, mode);
        const options = getChartOption(setting);
        const plugins = [ ChartDataLabels ];

        if (mode === '1') {
            const total = values.reduce((total, num) => total + num, 0);
            $(`#${id}-Total`).show();
            $(`#${id}-Total`).text(`Total : ${total}`);
        } else {
            $(`#${id}-Total`).hide();
            $(`#${id}-Total`).text('');
        }

        const chart = Chart.getChart($(`#${id}`).get(0));
        if (chart) chart.destroy();

        const ctx = $(`#${id}`).get(0).getContext('2d');
        new Chart(ctx, { type, data, options, plugins });
    }

    function getChartData(id, keys, values, mode) {
        if (mode === '1') return {
            labels: keys,
            datasets: [{
                label: 'Jumlah karyawan',
                data: values,
                fill: true,
                tension: 0.1,
            }],
        };

        const dateType = $(`#${id}-DateType2`)?.val() ?? 'month';
        const dates = Object.keys(values[0]);

        const datasets = dates.map((date) => ({
            label: dateType === 'month' ? getMonthYear(date) : getYear(date),
            data: values.map((datas) => datas[date]),
            fill: true,
            tension: 0.1,
        }));

        return {
            labels: keys,
            datasets: datasets,
        };
    }

    function formatKeys(data, setting, boilerplate) {
        let keys = Object.keys(data);
        const isDate = boilerplate.type.endsWith('monthyear');

        if (setting.hide === '1') keys = keys.filter((key) => key !== '-');

        if (isDate) {

            const months = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];
            return keys.sort((a, b) => {
                const [ monthA, yearA ] = a.split(' ');
                const [ monthB, yearB ] = b.split(' ');

                return yearA - yearB || months.indexOf(monthA) - months.indexOf(monthB);
            });

        } else if (boilerplate.sort) {

            if (typeof boilerplate.sort === 'object') {
                return keys.sort((a, b) => {
                    const indexA = boilerplate.sort.indexOf(a);
                    const indexB = boilerplate.sort.indexOf(b);

                    if (indexB === -1) return -1;
                    if (indexA === -1) return 1;

                    return indexA - indexB;
                });
            } else {
                return keys.sort((a, b) => {
                    const numA = parseInt(a, 10);
                    const numB = parseInt(b, 10);
                    const strA = a.substring(numA.toString().length);
                    const strB = b.substring(numB.toString().length);

                    if (!isNaN(numA) && !isNaN(numB) && numA !== numB) return numA - numB;
                    if (strA === '' && strB !== '') return -1;
                    if (strA !== '' && strB === '') return 1;

                    return strA.localeCompare(strB);
                });
            }
        }

        return keys;
    }

    function getChartOption(setting) {
        return {
            responsive: true,
            layout: {
                padding: {
                    top: setting.chart !== 'doughnut' && (setting.percentage === '1' || setting.number === '1') && setting.mode === '1' ? 20 : 0,
                },
            },
            plugins: {
                title: { display: false },
                legend: {
                    display: (setting.chart === 'doughnut' || setting.mode !== '1') && setting.legend !== '-',
                    position: setting.legend,
                    labels: {
                        font: { size: 12 },
                        generateLabels(chart) {
                            if (setting.mode === '1') {
                                const dataset = chart.data.datasets[0];

                                return chart.data.labels.map((label, i) => {
                                    const value = dataset.data[i];
                                    const bgColor = dataset.backgroundColor?.[i] || '#ccc';

                                    return {
                                        text: `${label} (${value})`,
                                        fillStyle: bgColor,
                                        strokeStyle: bgColor,
                                        lineWidth: 1,
                                        index: i,
                                        datasetIndex: 0,
                                        hidden: !chart.getDataVisibility(i),
                                    };
                                });
                            }

                            const datasets = chart.data.datasets;

                            return datasets.map((dataset, i) => {
                                const label = dataset.label;
                                const value = dataset.data.reduce((total, num) => total + num, 0);
                                const bgColor = dataset.backgroundColor;

                                return {
                                    text: `${label} (${value})`,
                                    fillStyle: bgColor,
                                    strokeStyle: bgColor,
                                    lineWidth: 1,
                                    index: i,
                                    datasetIndex: i,
                                    hidden: !chart.isDatasetVisible(i),
                                };
                            });
                        }
                    },
                },
                datalabels: {
                    font: { size: 12, weight: 'bold' },
                    display: setting.percentage === '1' || setting.number === '1',
                    anchor: setting.chart === 'doughnut' ? 'center' : 'end',
                    align: setting.chart === 'doughnut' ? 'center' : 'top',
                    formatter: (value, context) => {
                        const total = context.chart.data.datasets[0].data.reduce((sum, val) => sum + val, 0);
                        const result = +value / total * 100;
                        const percentage = result.toFixed(1);

                        if (setting.percentage === '1' && setting.number === '1') return `${value} (${percentage}%)`
                        else if (setting.percentage === '1') return `${percentage}%`;
                        else if (setting.number === '1') return value;
                    },
                    ...(setting.chart === 'doughnut' ? { textStrokeColor: '#fff', textStrokeWidth: 4 } : {}),
                },
            },
            onClick(evt, activeEls, chart) {
                if (activeEls.length > 0) {
                    const firstPoint = activeEls[0];
                    const label = chart.data.labels[firstPoint.index];
                    const datasetLabel = chart.data.datasets[firstPoint.datasetIndex].label;

                    const id = chart.canvas.id;
                    const name = id.split('_').join(' ');
                    const dataset = datasetLabel !== 'Jumlah karyawan' ? datasetLabel : false;
                    const isCutiTable = _boilerplate[name].type.startsWith('c-');
                    showTable(name, label, dataset, isCutiTable);
                }
            },
        };
    }

    function showTable(name, label, dataset, isCutiTable) {
        const data = createData([name], label, dataset);

        if (isCutiTable) {

            if ($.fn.DataTable.isDataTable('#chart-table-cuti')) {
                const table = $('#chart-table-cuti').DataTable();
                table.clear();
                table.rows.add(data);
                table.draw();
            } else {
                $('#chart-table-cuti').DataTable({
                    pagingType: 'full_numbers',
                    pageLength: 10,
                    scrollX: true,
                    processing: true,
                    lengthMenu: [
                        [ 10, 25, 50, 100 ],
                        [ 10, 25, 50, 100 ],
                    ],
                    data: data,
                    serverSide: false,
                    createdRow: function (row, data, dataIndex) {
                        const status = data[5];
                        let btnColor;

                        if (status === 'Cancelled') btnColor = 'btn-warning';
                        else if (status === 'Rejected') btnColor = 'btn-danger';
                        else if (status === 'Partially Approved') btnColor = 'btn-info';
                        else if (status === 'Approved') btnColor = 'btn-primary';
                        else if (status === 'MassLeave') btnColor = 'btn-success';
                        else btnColor = 'btn-info';

                        $('td:eq(3)', row).html(data[3] === '1' ? '<div class="text-center"><span class="btn btn-xs btn-danger">Terminated</span></div>' : '-');
                        $('td:eq(4)', row).html(formatDate(data[4]));
                        $('td:eq(5)', row).html(`<div class="text-center"><span class="btn btn-xs ${btnColor}">${status}</span></div>`);
                        $('td:eq(7)', row).html(`<div class="text-right"><a class="btn btn-xs btn-success" href="${_url}karyawan/detail/${data[7]}#cuti?id=${data[0]}" title="Detail" target="_blank">Detail</a><span>`);
                    },
                    rowCallback: function (row, data, index) {
                        $('td:eq(0)', row).html(index + 1);
                    },
                });
            }

            $('#chart-table-cuti-detail').modal('show');

        } else {

            if ($.fn.DataTable.isDataTable('#chart-table')) {
                const table = $('#chart-table').DataTable();
                table.clear();
                table.rows.add(data);
                table.draw();
            } else {
                $('#chart-table').DataTable({
                    pagingType: 'full_numbers',
                    pageLength: 10,
                    scrollX: true,
                    processing: true,
                    lengthMenu: [
                        [ 10, 25, 50, 100 ],
                        [ 10, 25, 50, 100 ],
                    ],
                    data: data,
                    serverSide: false,
                    createdRow: function (row, data, dataIndex) {
                        $('td:eq(3)', row).html(data[3] === '1' ? '<div class="text-center"><span class="btn btn-xs btn-danger">Terminated</span></div>' : '-');
                        $('td:eq(6)', row).html(`<div class="text-right"><a class="btn btn-xs btn-success" href="${_url}karyawan/detail/${data[6]}" title="Detail" target="_blank">Detail</a><span>`);
                    },
                    rowCallback: function (row, data, index) {
                        $('td:eq(0)', row).html(index + 1);
                    },
                });
            }

            $('#chart-table-detail').modal('show');

        }
    }

    function changeDataLabelFormatter(id, setting) {
        const chart = Chart.getChart($(`#${id}`).get(0));

        if (setting.percentage === '1' || setting.number === '1') {
            chart.options.plugins.datalabels.display = true;
            chart.options.plugins.datalabels.formatter = (value, context) => {
                const total = context.chart.data.datasets[0].data.reduce((sum, val) => sum + val, 0);
                const result = +value / total * 100;
                const percentage = result.toFixed(1);

                if (setting.percentage === '1' && setting.number === '1') return `${value} (${percentage}%)`
                else if (setting.percentage === '1') return `${percentage}%`;
                else if (setting.number === '1') return value;
            };
        } else {
            chart.options.plugins.datalabels.display = false;
        }

        chart.update();
    }

    function formatDate(time) {
        return new Date(time).toLocaleDateString('en-US', { day: '2-digit', month: 'long', year: 'numeric' });
    }

    function getMonthYear(date) {
        if (!date) return '-';
        const ddate = new Date(date);
        return ddate.toLocaleString('en-US', { month: 'short', year: 'numeric' });
    }

    function getYear(date) {
        if (!date) return '-';
        const ddate = new Date(date);
        return ddate.toLocaleString('en-US', { year: 'numeric' });
    }

    function getAge(date) {
        if (!date) return '-';

        const dob = new Date(date);
        const today = new Date();

        const age = today.getFullYear() - dob.getFullYear();
        const m = today.getMonth() - dob.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
            return (age - 1).toString();
        }

        return age.toString();
    }
});