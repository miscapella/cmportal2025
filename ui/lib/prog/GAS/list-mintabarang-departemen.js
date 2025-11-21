$(document).ready(function () {
    let _url = $("#_url").val();
    let tableData = [];  // Store table data from serverside
    let filteredTableData = [];  // Table data shown following user status' filter

    // Load data from serverside and keep it in tableData variable
    $.ajax({
        url: _url + "serverside/list-mintabarang-departemen/",
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            tableData = data;
            filteredTableData = data;
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ', status, error);
        },
        complete: function() {
            loadTable();
        }
    });

    // Destroy and create table when user changes status' filter
    function loadTable() {
        $('#list-mintabarang').DataTable({
            "pagingType": "full_numbers",
            "pageLength": 25,
            "scrollX": true,
            "processing": true,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "data": filteredTableData,
            "serverSide" : false,
            "createdRow": function(row, data, dataIndex) {
                if (data[4] == "PENDING")
                    $('td:eq(4)', row).html(`<div class="text-center"><span class="status btn btn-warning btn-xs">${data[4]}</span></div>`);
                else if (data[4] == "REJECTED")
                    $('td:eq(4)', row).html(`<div class="text-center"><span class="status btn btn-danger btn-xs">${data[4]}</span></div>`);
                else if (data[4] == "CANCEL")
                    $('td:eq(4)', row).html(`<div class="text-center"><span class="status btn btn-danger btn-xs">CANCELLED</span></div>`);
                else
                    $('td:eq(4)', row).html(`<div class="text-center"><span class="status btn btn-primary btn-xs">${data[4]}</span></div>`);

                $('td:eq(5)', row).html(`<div class="text-right">
                    <a class="btn btn-success btn-sm cdetail" id="uid${data[5]}" title="Detail"><i class="fa fa-book"></i></a>
                </div>`);
            },
            "rowCallback": function(row, data, index) {
                $('td:eq(0)', row).html(index + 1);
            },
            "initComplete": function() {
                let table = $('#list-mintabarang').DataTable();

                $('#status-filter').select2({
                    theme: "bootstrap",
                }).on('select2:open', function(e) {
                    table.column(4).header().style.pointerEvents = 'none';
                }).on('select2:close', function(e) {
                    table.column(4).header().style.pointerEvents = '';
                }).on('change', function() {
                    let filter = $("#status-filter").val();
                    if (filter == "") {
                        filteredTableData = [...tableData];
                    } else {
                        filteredTableData = tableData.filter(data => data[4] == filter);
                    }
                    $('#list-mintabarang').DataTable().clear().rows.add(filteredTableData).draw();
                });
            }
        });
    }

	$(document).on('click', '.cdetail', function(e) {
        e.preventDefault();
        var id = this.id;
        window.location.href = _url + "permintaanbarang/detail-mb/" + id;
    });
});