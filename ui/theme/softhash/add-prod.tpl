{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tambah Batch</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform" method="post">
                        <div class="form-group">
                            <label for="inputEmail3"
                                   class="col-lg-2 control-label">Tgl Pengolahan</label>
    
                            <div class="col-lg-2">
                                <input type="text" class="form-control" id="idate" name="idate" datepicker
                                       data-date-format="dd-mm-yyyy" data-auto-close="true"
                                       value="{$idate}">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Produk</label>
                            <div class="col-lg-10">
                                <select id="cid" name="cid" class="form-control">
                                    <option value="">Pilih Kode Produk...</option>
                                    {foreach $c as $cs}
                                        <option value="{$cs['code']}"
                                                {if $p_cid eq ($cs['code'])}selected="selected" {/if}>{$cs['code']} - {$cs['name']}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Target</label>

                            <div class="col-lg-10">
                                <select id="cta" name="cta" class="form-control">
                                    <option selected="selected" value="">Pilih Target Produksi...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">No. Permintaan Bahan</label>
                            <div class="col-lg-10">
                            	<input type="text" class="form-control item_name" name="no_minta" id='no_minta'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">No. Timbang</label>
                            <div class="col-lg-10">
                            	<input type="text" class="form-control item_name" name="no_timbang" id='no_timbang'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Nama Pelaksana</label>
                            <div class="col-lg-10">
                            	<input type="text" class="form-control item_name" name="pelaksana" id='pelaksana'>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">Nama Pemeriksa</label>
                            <div class="col-lg-10">
                            	<input type="text" class="form-control item_name" name="pemeriksa" id='pemeriksa'>
                            </div>
                        </div>

<input type="hidden" id="type" name="type" value="{$type}">

{if $type eq 'Product'}
<br>
                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="10%">{$_L['Item Code']}</th>
                                <th width="50%">{$_L['Item Name']}</th>
                                <th width="15%">{$_L['Qty']}</th>
                                <th width="20%">{$_L['Unit']}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr> <td></td> <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea> </td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
							<!--<tr> <td></td> <td><input type="text" class="form-control item_name" name="desc[]"></td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
                            </tbody>
                        </table>

                    </div>
                    <button type="button" class="btn btn-primary" id="item-add"><i
                                class="fa fa-search"></i> {$_L['Add Service']}</button>
                        <button type="button" class="btn btn-danger" id="item-remove"><i
                                    class="fa fa-minus-circle"></i> {$_L['Delete']}</button>

					<br><br>
{/if}
                        <div class="form-group">
                            <div style="margin-left:15px">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit">{$_L['Save']}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
{include file="sections/footer.tpl"}