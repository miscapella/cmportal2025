eTotal();
    });

    var item_remove = $('#item-remove');
    item_remove.hide();
    function calculateTotal() {
        var sum = 0,
            tbl = $('#invoice_items');
        tbl.find('.lvtotal').each(function( index, elem ) {
            var val = parseFloat($(elem).val().replace(',', '.'));
            if( !isNaN( val ) ) {
                sum += val;
            }
        });
        $('.qty').keyup(function(){
            var u_qty = $(this).val();
            var u_price = $(this).closest('tr').find(".item_price").val().replace(',', '.');
            if( !isNaN( u_qty ) ) {
                var n_ltotal = u_qty*u_price;
                n_ltotal = n_ltotal.toFixed(2);
                var _dec_point = $("#_dec_point").val();
                if(_dec_point == ','){

                    n_ltotal = String(n_ltotal);
                    n_ltotal = n_ltotal.replace(".", ",");

                }
                $(this).closest('tr').find(".lvtotal").val(n_ltotal);
                calculateTotal();
            }

            $('.amount').autoNumeric('init');

        });
        $('.item_price').keyup(function(){
            var u_qty = $(this).closest('tr').find(".qty").val().replace(',', '.');
            var u_price = $(this).val().replace(',', '.');
            if( !isNaN( u_price ) ) {
                var n_ltotal = u_qty*u_price;
                n_ltotal = n_ltotal.toFixed(2);
                var _dec_point = $("#_dec_point").val();
                if(_dec_point == ','){
                    n_ltotal = String(n_ltotal);
                    n_ltotal = n_ltotal.replace(".", ",");

                }
                $(this).closest('tr').find(".lvtotal").val(n_ltotal);
                calculateTotal();
            }

        });
        // tbl.find('input.total').html(sum.toFixed(2));
        var _dec_point = $("#_dec_point").val();
        if(_dec_point == ','){
            sum = sum.toFixed(2);
            sum = sum.replace(".", ",");
        }
        $("#sub_total").html(sum);
        //calculate tax
        updateTax();
        updateTotal();

    }

    calculateTotal();
    updateTax();
    updateTotal();

    function update_address(){
        var _url = $("#_url").val();
        var cid = $('#cid').val();
        if(cid != ''){
            $.post(_url + 'contacts/render-address/', {
                cid: cid

            })
                .done(function (data) {
                    var adrs = $("#address");


                    adrs.html(data);

                });
        }

    }
    update_address();
    $('#cid').select2({
        theme: "bootstrap"
    })
        .on("change", function(e) {
            // mostly used event, fired to the original element when the value changes
            // log("change val=" + e.val);
            //  alert(e.val);

            update_address();
        });






    item_remove.on('click', function(){
        $("#invoice_items tr.info").fadeOut(300, function(){
            $(this).remove();
            calculateTotal();
        });

    });

    var $modal = $('#ajax-modal');



    $('#item-add').on('click', function(){

        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=ps/modal-list2/', '', function(){
                $modal.modal();

            });
        }, 1000);
    });

    /*
     / @since v 2.0
     */

    $('#contact_add').on('click', function(e){
        e.preventDefault();
        // create the backdrop and wait for next modal to be triggered
        $('body').modalmanager('loading');

        setTimeout(function(){
            $modal.load('?ng=contacts/modal_add/', '', function(){
                $modal.modal();
                $("#ajax-modal .country").select2();
            });

        }, 1000);
    });

    $('#blank-add').on('click', function(){
        $("#invoice_items").find('tbody')
            .append(
            '<tr> <td></td> <td><input type="text" class="form-control item_name" name="desc[]" value=""></td> <td><input type="text" class="form-control qty" value="" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> </tr>'
        );
        calculateTotal();
    });

    $('#invoice_items').on('click', '.item_name', function(){
        $("tr").removeClass("info");
        $(this).closest('tr').addClass("info");
        item_remove.show();
    });

    $modal.on('click', '.update', function(){
        var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        setTimeout(function(){
            $modal.modal('loading');
            //$modal
            //    .modal('loading')
            //    .find('.modal-body')
            //    .prepend('<div class="alert alert-info fade in">' +
            //    'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            //    '</div>');

            // var obj = new Array();

            $('input:checkbox:checked', tableControl).each(function() {

                var item_code = $(this).closest('tr').find('td:eq(1)').text();
                var item_name = $(this).closest('tr').find('td:eq(2)').text();

                var item_price = $(this).closest('tr').find('td:eq(3)').text();

                //  obj.push(innertext);
                $("#invoice_items").find('tbody')
                    .append(
                    '<tr> <td>' + item_code + '</td> <td><input type="text" class="form-control item_name" name="desc[]" value="' + item_name + '"></td> <td><input type="text" class="form-control qty" value="1" name="qty[]"></td> <td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value="' + item_price + '"></td> </tr>'
                );
            });

            //  console.debug(obj); // Write it to the console
            calculateTotal();


            $modal.modal('hide');

        }, 1000);

    });


    $modal.on('click', '.contact_submit', function(e){
        e.preventDefault();
        //  var tableControl= document.getElementById('items_table');
        $modal.modal('loading');
        setTimeout(function(){
            //  $modal.modal('loading');




            $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Working ...');
            $(this).addClass("btn-danger");
            var _url = $("#_url").val();
            $.post(_url + 'contacts/add-post/', {


                account: $('#account').val(),
                address: $('#m_address').val(),

                city: $('#city').val(),
                state: $('#state').val(),
                zip: $('#zip').val(),
                country: $('#country').val(),
                phone: $('#phone').val(),
                email: $('#email').val()

            })
                .done(function (data) {

                    setTimeout(function () {
                        var sbutton = $(".contact_submit");
                        var _url = $("#_url").val();
                        if ($.isNumeric(data)) {

                            // location.reload();
                            var is_recurring = $('#is_recurring').val();
                            if(is_recurring == 'yes'){
                                window.location = _url + 'invoices/add/recurring/' + data + '/';
                            }
                            else{
                                window.location = _url + 'invoices/add/1/' + data + '/';
                            }

                        }
                        else {
                            sbutton.html('<i class="fa fa-check"></i> Add Contact');
                            sbutton.removeCla class="col-md-4 control-label" for="set_discount_type">' + $("#_lan_discount_type").val() +'</label> ' +
                '<div class="col-md-4"> <div class="radio"> <label for="set_discount_type-0"> ' +
                '<input type="radio" name="set_discount_type" id="set_discount_type-0" value="p" ' + p_checked + '> ' +
                '' + $("#_lan_percentage").val() +' (%) </label> ' +
                '</div><div class="radio"> <label for="set_discount_type-1"> ' +
                '<input type="radio" name="set_discount_type" id="set_discount_type-1" value="f" ' + f_checked + '> ' + $("#_lan_fixed_amount").val() +' </label> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: $("#_lan_btn_save").val(),
                        className: "btn-success",
                        callback: function () {
                            var discount_amount = $('#set_discount').val();
                            var discount_type = $("input[name='set_discount_type']:checked").val();
                            $('#discount_amount').val(discount_amount);
                            $('#discount_type').val(discount_type);
                            //calculateTotal();
                            //updateTax();
                            //updateTotal();
                        }
                    }
                }
            }
        );
    });


    //var callbacks = $.Callbacks();
    //callbacks.add( updateTotal );
    //callbacks.fire(  alert('done') );


    $(".progress").hide();
    $("#emsg").hide();
    $("#submit").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'invoices/edit-post/', $('#invform').serialize(), function(data){

            var _url = $("#_url").val();
            if ($.isNumeric(data)) {

                window.location = _url + 'invoices/edit/' + data + '/';
            }
            else {
                $('#ibox_form').unblock();
                var body = $("html, body");
                body.animate({scrollTop:0}, '1000', 'swing');
                $("#emsgbody").html(data);
                $("#emsg").show("slow");
            }
        });
    });


    $("#save_n_close").click(function (e) {
        e.preventDefault();
        $('#ibox_form').block({ message: null });
        var _url = $("#_url").val();
        $.post(_url + 'invoices/edit-post/', $('#invform').serialize(), function(data){

            var _url = $("#_url").val();
            if ($.isNumeric(data)) {

                window.location = _url + 'invoices/view/' + data + '/';
            }
            else {
                $('#ibox_form').unblock();
                var body = $("html, body");
                body.animate({scrollTop:0}, '1000', 'swing');
                $("#emsgbody").html(data);
                $("#emsg").show("slow");
            }
        });
    });

    //function doStuff() {
    //    $('.amount').autoNumeric('init');
    //   // alert('dd');
    //}
    //setInterval(doStuff, 5000);

});