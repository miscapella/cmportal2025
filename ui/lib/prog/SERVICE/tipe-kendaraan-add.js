$(function(){
  const _url = $('#_url').val();
  $('#form-add').on('submit', function(e){
    e.preventDefault();
    const $btn = $(this).find('button[type="submit"]').prop('disabled', true);
    $.ajax({
      url: _url + 'tipe-kendaraan/add-post/',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json'
    })
    .done(function(resp){
      if (resp && resp.status === 1) {
        window.location = _url + 'tipe-kendaraan/list/s/saved';
      } else {
        var msg = (resp && (resp.message || resp.error)) ? (resp.message || resp.error) : 'Gagal menyimpan.';
        alert(msg);
      }
    })
    .fail(function(xhr){
      var txt = 'Terjadi kesalahan jaringan.';
      if (xhr && xhr.responseText) { txt += '\n' + xhr.responseText; }
      alert(txt);
    })
    .always(function(){ $btn.prop('disabled', false); });
  });
});
