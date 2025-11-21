$(document).ready(function () {

    $(".cdelete").click(function (e) {
        e.preventDefault();
        var kode_group = this.id;
//        alert(kode_group)
        bootbox.confirm(_L['are_you_sure'], function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/otoritas-group/" + kode_group;
           }
        });
    });

});