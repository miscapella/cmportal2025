$(document).ready(function () {
    const _url = $('#_url').val();
    // minimal CSS for positive counts
    if (!document.getElementById('count-positive-style')) {
        const st = document.createElement('style');
        st.id = 'count-positive-style';
        st.textContent = '.count-positive{font-weight:700;color:#1e88e5;}';
        document.head.appendChild(st);
    }

    $('.tdate').each(function(_, e) {
        const date = $(e).text();
        const fdate = formattedDate(date);
        $(e).text(fdate);
    });

    // Export Active Customers with current filters
    $('#btn-export-active').on('click', function(e){
        e.preventDefault();
        var q = {
            tipe_kendaraan_multi: getSelectedKategori().join(','),
            merek_multi: getSelectedMerek().join(','),
            cabang_multi: getSelectedCabang().join(','),
            complete_multi: getSelectedComplete().join(','),
            unit_year_from: $('#flt_unit_year_from').val() || '',
            unit_year_to: $('#flt_unit_year_to').val() || '',
            service_year_from: $('#flt_service_year_from').val() || '',
            service_year_to: $('#flt_service_year_to').val() || ''
        };
        // Use POST form submit to avoid controller redirect on GET
        var form = $('<form method="POST" style="display:none;"></form>');
        form.attr('action', _url + 'customer/export-active-filtered/');
        Object.keys(q).forEach(function(k){
            $('<input type="hidden">').attr('name', k).val(q[k]).appendTo(form);
        });
        $('body').append(form);
        form.trigger('submit');
        setTimeout(function(){ form.remove(); }, 1000);
    });

    // Export Non-Active Customers with current filters
    $('#btn-export-nonactive').on('click', function(e){
        e.preventDefault();
        var q = {
            tipe_kendaraan_multi: getSelectedKategori().join(','),
            merek_multi: getSelectedMerek().join(','),
            cabang_multi: getSelectedCabang().join(','),
            complete_multi: getSelectedComplete().join(','),
            unit_year_from: $('#flt_unit_year_from').val() || '',
            unit_year_to: $('#flt_unit_year_to').val() || '',
            service_year_from: $('#flt_service_year_from').val() || '',
            service_year_to: $('#flt_service_year_to').val() || ''
        };
        var form = $('<form method="POST" style="display:none;"></form>');
        form.attr('action', _url + 'customer/export-nonactive-filtered/');
        Object.keys(q).forEach(function(k){
            $('<input type="hidden">').attr('name', k).val(q[k]).appendTo(form);
        });
        $('body').append(form);
        form.trigger('submit');
        setTimeout(function(){ form.remove(); }, 1000);
    });

    // Client-side export of currently displayed rows (CSV)
    function exportTableCsv(tableSelector, filename) {
        var csv = [];
        var table = $(tableSelector);
        // Headers
        var headers = [];
        table.find('thead th').each(function(){ headers.push($(this).text().trim()); });
        if (headers.length) csv.push('"' + headers.join('","') + '"');
        // Rows: use DataTables API if available to get only displayed rows
        var dt = $.fn.dataTable ? $(tableSelector).DataTable() : null;
        var rows = [];
        if (dt) {
            dt.rows({ search: 'applied', page: 'current' }).every(function(){
                rows.push(this.data());
            });
        } else {
            table.find('tbody tr').each(function(){
                var row = [];
                $(this).find('td').each(function(){ row.push($(this).text().trim()); });
                if (row.length) rows.push(row);
            });
        }
        rows.forEach(function(r){
            // If row is HTML array from DataTables, strip tags
            var cells = r.map ? r.map(function(c){ return $('<div>').html(c).text().trim(); }) : [];
            csv.push('"' + cells.join('","') + '"');
        });
        var blob = new Blob([csv.join('\r\n')], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement('a');
        var url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        setTimeout(function(){ URL.revokeObjectURL(url); }, 1000);
    }

    $('#btn-export-active-table').on('click', function(){
        console.log('=== EXPORT ACTIVE TABLE CLICKED ===');
        console.log('_url:', _url);
        
        // DataTable uses serverSide, so we can't get all data from client
        // Send filter parameters to server instead
        var q = {
            tipe_kendaraan_multi: getSelectedKategori().join(','),
            merek_multi: getSelectedMerek().join(','),
            cabang_multi: getSelectedCabang().join(','),
            complete_multi: getSelectedComplete().join(','),
            unit_year_from: $('#flt_unit_year_from').val() || '',
            unit_year_to: $('#flt_unit_year_to').val() || '',
            service_year_from: $('#flt_service_year_from').val() || '',
            service_year_to: $('#flt_service_year_to').val() || ''
        };
        
        console.log('Filter parameters:', q);
        console.log('Action URL:', _url + 'customer/export-active-table/');
        
        var form = $('<form method="POST" style="display:none;"></form>');
        form.attr('action', _url + 'customer/export-active-table/');
        Object.keys(q).forEach(function(k){
            $('<input type="hidden">').attr('name', k).val(q[k]).appendTo(form);
        });
        $('body').append(form);
        form.trigger('submit');
        setTimeout(function(){ form.remove(); }, 1000);
    });
    $('#btn-export-nonactive-table').on('click', function(){
        // DataTable uses serverSide, so we can't get all data from client
        // Send filter parameters to server instead
        var q = {
            tipe_kendaraan_multi: getSelectedKategori().join(','),
            merek_multi: getSelectedMerek().join(','),
            cabang_multi: getSelectedCabang().join(','),
            complete_multi: getSelectedComplete().join(','),
            unit_year_from: $('#flt_unit_year_from').val() || '',
            unit_year_to: $('#flt_unit_year_to').val() || '',
            service_year_from: $('#flt_service_year_from').val() || '',
            service_year_to: $('#flt_service_year_to').val() || '',
            use_serverside_query: '1'  // Flag to use exact same query as DataTable
        };
        
        console.log('Exporting with filters:', q);
        
        var form = $('<form method="POST" style="display:none;"></form>');
        form.attr('action', _url + 'customer/export-nonactive-table/');
        Object.keys(q).forEach(function(k){
            $('<input type="hidden">').attr('name', k).val(q[k]).appendTo(form);
        });
        $('body').append(form);
        form.trigger('submit');
        setTimeout(function(){ form.remove(); }, 1000);
    });

    // Set default year range: from = currentYear - 8, to = currentYear
    function setDefaultYears() {
        const y = new Date().getFullYear();
        const from = y - 8; // 7 tahun kebelakang -> contoh 2025 => 2017
        const to = y;       // 1 tahun berjalan
        $('#flt_unit_year_from').val(from);
        $('#flt_unit_year_to').val(to);
        $('#flt_service_year_from').val(from);
        $('#flt_service_year_to').val(to);
    }

    // Apply defaults on first load if inputs are empty
    if (!$('#flt_unit_year_from').val() && !$('#flt_unit_year_to').val() && !$('#flt_service_year_from').val() && !$('#flt_service_year_to').val()) {
        setDefaultYears();
    }

    function getSelectedKategori() {
        var vals = [];
        $('#flt_tipe_kendaraan_group .chk-tipe:checked').each(function(){
            var v = $(this).val();
            if (v) vals.push(v);
        });
        return vals; // empty array means all
    }

    function getSelectedMerek() {
        var vals = [];
        $('#flt_merek_group .chk-merek:checked').each(function(){
            var v = $(this).val();
            if (v) vals.push(v);
        });
        return vals; // empty array means all
    }

    function getSelectedComplete() {
        var vals = [];
        $('#flt_complete_group .chk-complete:checked').each(function(){
            var v = $(this).val();
            if (v) vals.push(v);
        });
        return vals; // empty means all
    }

    function getSelectedCabang() {
        var vals = [];
        $('#flt_cabang_group .chk-cabang:checked').each(function(){
            var v = $(this).val();
            if (v) vals.push(v);
        });
        return vals; // empty means all
    }

    // Handle mutual exclusion for "Semua Kategori"
    $(document).on('change', '#flt_tipe_kendaraan_group .chk-tipe', function(){
        const v = $(this).val();
        const $all = $('#flt_tipe_kendaraan_group .chk-tipe[value=""]');
        if (v === '') {
            if ($(this).is(':checked')) {
                // uncheck others
                $('#flt_tipe_kendaraan_group .chk-tipe').not(this).prop('checked', false);
            }
        } else {
            // uncheck "Semua" if any specific selected
            if ($(this).is(':checked')) $all.prop('checked', false);
            // if none selected, fallback to "Semua"
            setTimeout(function(){
                if (getSelectedKategori().length === 0) $all.prop('checked', true);
            }, 0);
        }
        reloadTables();
    });

    $(document).on('change', '#flt_complete_group .chk-complete', function(){
        const v = $(this).val();
        const $all = $('#flt_complete_group .chk-complete[value=""]');
        if (v === '') {
            if ($(this).is(':checked')) {
                $('#flt_complete_group .chk-complete').not(this).prop('checked', false);
            }
        } else {
            if ($(this).is(':checked')) $all.prop('checked', false);
            setTimeout(function(){ if (getSelectedComplete().length === 0) $all.prop('checked', true); }, 0);
        }
        reloadTables();
    });

    // Handle mutual exclusion for "Semua Cabang"
    $(document).on('change', '#flt_cabang_group .chk-cabang', function(){
        const v = $(this).val();
        const $all = $('#flt_cabang_group .chk-cabang[value=""]');
        if (v === '') {
            if ($(this).is(':checked')) {
                $('#flt_cabang_group .chk-cabang').not(this).prop('checked', false);
            }
        } else {
            if ($(this).is(':checked')) $all.prop('checked', false);
            setTimeout(function(){ if (getSelectedCabang().length === 0) $all.prop('checked', true); }, 0);
        }
        reloadTables();
    });

    // Handle mutual exclusion for "Semua Merek"
    $(document).on('change', '#flt_merek_group .chk-merek', function(){
        const v = $(this).val();
        const $all = $('#flt_merek_group .chk-merek[value=""]');
        if (v === '') {
            if ($(this).is(':checked')) {
                $('#flt_merek_group .chk-merek').not(this).prop('checked', false);
            }
        } else {
            if ($(this).is(':checked')) $all.prop('checked', false);
            setTimeout(function(){
                if (getSelectedMerek().length === 0) $all.prop('checked', true);
            }, 0);
        }
        reloadTables();
    });

    const dtActive = $('#datatable-customer').DataTable({
        order: [],
        pagingType: 'full_numbers',
        pageLength: 10,
        scrollX: true,
        processing: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        serverSide : true,
        responsive: ($.fn.dataTable && $.fn.dataTable.Responsive) ? {
            details: { type: 'inline', target: 'tr' }
        } : false,
        columnDefs: [
            { targets: -1, responsivePriority: 1 },        // Manage button
            { targets: 0, responsivePriority: 2 },         // Customer Name
            { targets: 1, responsivePriority: 3 },         // Cabang
            { targets: [2,3,4,5,6], responsivePriority: 10001 } // No Chassis, Mobile, Tipe, Tahun, KM
        ],
        ajax: {
            url : _url + 'serverside/load-active-customer/',
            type : 'POST',
            data: function(d) {
                return $.extend({}, d, {
                    tipe_kendaraan_multi: getSelectedKategori().join(','),
                    merek_multi: getSelectedMerek().join(','),
                    cabang_multi: getSelectedCabang().join(','),
                    complete_multi: getSelectedComplete().join(','),
                    unit_year_from: $('#flt_unit_year_from').val() || '',
                    unit_year_to: $('#flt_unit_year_to').val() || '',
                    service_year_from: $('#flt_service_year_from').val() || '',
                    service_year_to: $('#flt_service_year_to').val() || ''
                });
            }
        },
    });

    const dtNonActive = $('#datatable-nonactive-customer').DataTable({
        order: [],
        pagingType: 'full_numbers',
        pageLength: 10,
        scrollX: true,
        processing: true,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        serverSide : true,
        responsive: ($.fn.dataTable && $.fn.dataTable.Responsive) ? {
            details: { type: 'inline', target: 'tr' }
        } : false,
        columnDefs: [
            { targets: -1, responsivePriority: 1 },
            { targets: 0, responsivePriority: 2 },
            { targets: 1, responsivePriority: 3 },
            { targets: [2,3,4,5,6], responsivePriority: 10001 }
        ],
        ajax: {
            url : _url + 'serverside/load-nonactive-customer/',
            type : 'POST',
            data: function(d) {
                return $.extend({}, d, {
                    tipe_kendaraan_multi: getSelectedKategori().join(','),
                    merek_multi: getSelectedMerek().join(','),
                    cabang_multi: getSelectedCabang().join(','),
                    complete_multi: getSelectedComplete().join(','),
                    unit_year_from: $('#flt_unit_year_from').val() || '',
                    unit_year_to: $('#flt_unit_year_to').val() || '',
                    service_year_from: $('#flt_service_year_from').val() || '',
                    service_year_to: $('#flt_service_year_to').val() || ''
                });
            }
        }

        //             const parts = data.split('-');
        //             const day = parts[0];
        //             const month = months[parseInt(parts[1], 10) - 1];
        //             const year = parts[2];

        //             const formatted = `${day} ${month} ${year}`;
        //             return formatted;
        //         }
        //     }
        // ]
    });

    function updateCounts() {
        try {
            var infoA = dtActive.page.info();
            var infoN = dtNonActive.page.info();
            if (infoA && typeof infoA.recordsDisplay !== 'undefined') {
                $('#count-active').text(infoA.recordsDisplay);
            }
            if (infoN && typeof infoN.recordsDisplay !== 'undefined') {
                $('#count-nonactive').text(infoN.recordsDisplay);
            }
        } catch (e) { /* noop */ }
    }

    dtActive.on('draw', updateCounts);
    dtNonActive.on('draw', updateCounts);

    function setLabelCounts(groupSel, inputClass, counts) {
        $(groupSel + ' label.' + inputClass).each(function(){
            var $lbl = $(this);
            var $inp = $lbl.find('input');
            var v = $inp.val();
            if (v === '') return;
            var n = counts && typeof counts[v] !== 'undefined' ? counts[v] : 0;

            var $text = $lbl.find('span.lbl-text');
            if ($text.length === 0) {
                var clone = $lbl.clone();
                clone.find('input').remove();
                var base = $.trim(clone.text());
                $lbl.data('baseText', base);
                $lbl.contents().filter(function(){ return this.nodeType === 3; }).remove();
                $text = $('<span class="lbl-text"></span>').text(base);
                if ($lbl.find('input').length) { $lbl.append(' '); }
                $lbl.append($text);
            }
            var baseText = $lbl.data('baseText') || $.trim($text.text().replace(/\s*\(\d+\)\s*$/,''));
            var numHtml = '<span class="count' + (n > 0 ? ' count-positive' : '') + '">' + n + '</span>';
            $text.html(baseText + ' (' + numHtml + ')');
        });
    }

    function fetchCounts() {
        $.ajax({
            url: _url + 'serverside/load-customer-filter-counts/',
            type: 'POST',
            dataType: 'json',
            data: {
                tipe_kendaraan_multi: getSelectedKategori().join(','),
                merek_multi: getSelectedMerek().join(','),
                cabang_multi: getSelectedCabang().join(','),
                unit_year_from: $('#flt_unit_year_from').val() || '',
                unit_year_to: $('#flt_unit_year_to').val() || '',
                service_year_from: $('#flt_service_year_from').val() || '',
                service_year_to: $('#flt_service_year_to').val() || ''
            }
        }).done(function(res){
            setLabelCounts('#flt_tipe_kendaraan_group', 'checkbox-inline', res && res.kategori ? res.kategori : {});
            setLabelCounts('#flt_merek_group', 'checkbox-inline', res && res.merek ? res.merek : {});
            setLabelCounts('#flt_cabang_group', 'checkbox-inline', res && res.cabang ? res.cabang : {});
            (function(){
                var counts = res && res.complete ? res.complete : {};
                var unifiedTotal = (res && typeof res.total_kategori !== 'undefined') ? res.total_kategori : null;
                var $grp = $('#flt_complete_group');
                $grp.find('label.checkbox-inline').each(function(){
                    var $lbl = $(this); var $inp = $lbl.find('input'); var v = $inp.val();
                    var key = v === '' ? 'all' : v;
                    var n = (typeof counts[key] !== 'undefined') ? counts[key] : null;
                    if (v === '' && unifiedTotal !== null) { n = unifiedTotal; }
                    if (n === null) { n = 0; }
                    var $text = $lbl.find('span.lbl-text');
                    if ($text.length === 0) {
                        var clone = $lbl.clone(); clone.find('input').remove(); var base = $.trim(clone.text());
                        $lbl.data('baseText', base);
                        $lbl.contents().filter(function(){ return this.nodeType === 3; }).remove();
                        $text = $('<span class="lbl-text"></span>').text(base);
                        if ($lbl.find('input').length) { $lbl.append(' '); }
                        $lbl.append($text);
                    }
                    var baseText = $lbl.data('baseText') || $.trim($text.text().replace(/\s*\(\d+\)\s*$/,''));
                    var numHtml = '<span class="count' + (n > 0 ? ' count-positive' : '') + '">' + n + '</span>';
                    $text.html(baseText + ' (' + numHtml + ')');
                });
            })();

            var totalKat = (res && typeof res.total_kategori !== 'undefined') ? res.total_kategori : null;
            if (totalKat !== null) {
                var $allKat = $('#flt_tipe_kendaraan_group .chk-tipe[value=""]').closest('label');
                if ($allKat.length) {
                    var $txt = $allKat.find('span.lbl-text');
                    if ($txt.length === 0) {
                        var clone = $allKat.clone();
                        clone.find('input').remove();
                        var base = $.trim(clone.text());
                        $allKat.data('baseText', base);
                        $allKat.contents().filter(function(){ return this.nodeType === 3; }).remove();
                        $txt = $('<span class="lbl-text"></span>').text(base);
                        if ($allKat.find('input').length) { $allKat.append(' '); }
                        $allKat.append($txt);
                    }
                    var baseText = $allKat.data('baseText') || $.trim($txt.text().replace(/\s*\(\d+\)\s*$/,''));
                    var numHtml = '<span class="count' + (parseInt(totalKat,10) > 0 ? ' count-positive' : '') + '">' + totalKat + '</span>';
                    $txt.html(baseText + ' (' + numHtml + ')');
                }
            }

            var totalMrk = (res && typeof res.total_merek !== 'undefined') ? res.total_merek : null;
            if (totalMrk !== null) {
                var $allMrk = $('#flt_merek_group .chk-merek[value=""]').closest('label');
                if ($allMrk.length) {
                    var $txt2 = $allMrk.find('span.lbl-text');
                    if ($txt2.length === 0) {
                        var clone2 = $allMrk.clone();
                        clone2.find('input').remove();
                        var base2 = $.trim(clone2.text());
                        $allMrk.data('baseText', base2);
                        $allMrk.contents().filter(function(){ return this.nodeType === 3; }).remove();
                        $txt2 = $('<span class="lbl-text"></span>').text(base2);
                        if ($allMrk.find('input').length) { $allMrk.append(' '); }
                        $allMrk.append($txt2);
                    }
                    var baseText2 = $allMrk.data('baseText') || $.trim($txt2.text().replace(/\s*\(\d+\)\s*$/,''));
                    var numHtml2 = '<span class="count' + (parseInt(totalMrk,10) > 0 ? ' count-positive' : '') + '">' + totalMrk + '</span>';
                    $txt2.html(baseText2 + ' (' + numHtml2 + ')');
                }
            }

            var totalCab = (res && typeof res.total_cabang !== 'undefined') ? res.total_cabang : null;
            if (totalCab !== null) {
                var $allCab = $('#flt_cabang_group .chk-cabang[value=""]').closest('label');
                if ($allCab.length) {
                    var $txt3 = $allCab.find('span.lbl-text');
                    if ($txt3.length === 0) {
                        var clone3 = $allCab.clone();
                        clone3.find('input').remove();
                        var base3 = $.trim(clone3.text());
                        $allCab.data('baseText', base3);
                        $allCab.contents().filter(function(){ return this.nodeType === 3; }).remove();
                        $txt3 = $('<span class="lbl-text"></span>').text(base3);
                        if ($allCab.find('input').length) { $allCab.append(' '); }
                        $allCab.append($txt3);
                    }
                    var baseText3 = $allCab.data('baseText') || $.trim($txt3.text().replace(/\s*\(\d+\)\s*$/,''));
                    var numHtml3 = '<span class="count' + (parseInt(totalCab,10) > 0 ? ' count-positive' : '') + '">' + totalCab + '</span>';
                    $txt3.html(baseText3 + ' (' + numHtml3 + ')');
                }
            }
        });
    }

    function reloadTables() {
        if ($.fn.DataTable.isDataTable('#datatable-customer')) {
            $('#datatable-customer').DataTable().ajax.reload();
        }
        dtNonActive.ajax.reload();
        debounce(fetchCounts, 300)(); // panggil fetchCounts setelah reload table dengan debounce (minimal delay)
    }

    // Auto-apply handled in checkbox change above

    // Handle ALL filter input trigger (better UX and pastikan server-side filtering)
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    // text input filter: tahun kendaraan, service year dll
    $('#flt_unit_year_from, #flt_unit_year_to, #flt_service_year_from, #flt_service_year_to').on('input', debounce(function(){
        reloadTables();
    }, 300));

    $('#btn-reset-filter').on('click', function() {
        // set Semua Kategori checked
        $('#flt_tipe_kendaraan_group .chk-tipe').prop('checked', false);
        $('#flt_tipe_kendaraan_group .chk-tipe[value=""]').prop('checked', true);
        // set Semua Merek checked
        $('#flt_merek_group .chk-merek').prop('checked', false);
        $('#flt_merek_group .chk-merek[value=""]').prop('checked', true);
        // set Semua Cabang checked
        $('#flt_cabang_group .chk-cabang').prop('checked', false);
        $('#flt_cabang_group .chk-cabang[value=""]').prop('checked', true);
        // set Semua Lengkap/Tidak Lengkap checked
        $('#flt_complete_group .chk-complete').prop('checked', false);
        $('#flt_complete_group .chk-complete[value=""]').prop('checked', true);
        setDefaultYears();
        reloadTables();
    });

    // Initial update when tables finish first draw
    dtActive.on('draw', updateCounts);
    dtNonActive.on('draw', updateCounts);
});

function formattedDate(time) {
    return new Date(time).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });
}
