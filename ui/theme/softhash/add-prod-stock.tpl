{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Pengambilan Stock</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform" method="post">
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Batch No</label>
                            <div class="col-lg-10">
                                <select id="cid" name="cid" class="form-control" onBlur="cekDetail()">
                                    <option value="">Pilih Batch No...</option>
                                    {foreach $c as $cs}
                                        <option value="{$cs['batch_number']}"
                                                {if $p_cid eq ($cs['batch_number'])}selected="selected" {/if}>{$cs['batch_number']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Target</label>
                            <div class="col-lg-2">
                            	<input type="text" disabled class="form-control item_name" name="target" id='target'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Ditimbang Oleh</label>
                            <div class="col-lg-2">
                            	<input type="text" class="form-control item_name" name="penimbang" id='penimbang'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Periksa Timbangan Oleh</label>
                            <div class="col-lg-2">
                            	<input type="text" class="form-control item_name" name="periksa_timbang" id='periksa_timbang'>
                            </div>
                        </div>
<!-- Add Detail -->
<br>
                    <div class="table-responsive m-t">
                    	<div><h3>BAHAN</h3></div>
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="10%">{$_L['Item Code']}</th>
                                <th width="50%">{$_L['Item Name']}</th>
                                <th width="15%">{$_L['Qty']}</th>
                                <th width="15%">Qty Batch</th>
                                <th width="15%">#</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr> <td></td> <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea> </td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
							<!--<tr> <td><select name="code" id="code"><option>1</option></select></td> <td><input type="text" class="form-control item_name" name="desc[]"></td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
                            </tbody>
                        </table><br>
                    	<div><h3>KEMASAN</h3></div>
                        <table class="table invoice-table" id="invoice_items1">
                            <thead>
                            <tr>
                                <th width="10%">{$_L['Item Code']}</th>
                                <th width="50%">{$_L['Item Name']}</th>
                                <th width="15%">{$_L['Qty']}</th>
                                <th width="15%">Qty Batch</th>
                                <th width="15%">#</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr> <td></td> <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea> </td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
							<!--<tr> <td><select name="code" id="code"><option>1</option></select></td> <td><input type="text" class="form-control item_name" name="desc[]"></td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
                            </tbody>
                        </table>

                    </div>
<!--                        <button type="button" class="btn btn-primary" id="blank-add"><i
                                    class="fa fa-plus"></i> Tambah Kemasan</button>
                        <button type="button" class="btn btn-primary" id="item-add"><i
                                    class="fa fa-search"></i> Tambah Kemasan</button>
                        <button type="button" class="btn btn-danger" id="item-remove"><i
                                    class="fa fa-minus-circle"></i> {$_L['Delete']}</button>

					<br><br>

<input type="hidden" id="type" name="type" value="{$type}">
                        <div class="form-group">
                            <div style="margin-left:15px">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit">{$_L['Save']}</button>
                            </div>
                        </div>-->

                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
{include file="sections/footer.tpl"}