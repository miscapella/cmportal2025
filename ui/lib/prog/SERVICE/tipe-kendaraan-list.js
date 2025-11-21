$(function(){
  const $tbl = $('#datatable');
  if ($tbl.length) {
    $tbl.DataTable({
      order: [],
      pagingType: 'full_numbers',
      pageLength: 10,
      lengthMenu: [[10,25,50,100],[10,25,50,100]],
      columnDefs: [
        { targets: 0, orderable: false, searchable: false }
      ],
      rowCallback: function(row, data, index){
        $('td:eq(0)', row).html(index + 1);
      }
    });
  }
});
