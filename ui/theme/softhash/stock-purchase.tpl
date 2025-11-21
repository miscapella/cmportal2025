{include file="sections/header.tpl"}
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <form id="invform" method="post">
                <div class="ibox-content p-xl" id="ibox_form">
                    <div class="row">
                        <div class="alert alert-danger" id="emsg">
                            <span id="emsgbody"></span>
                        </div>
                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="cid" class="col-sm-3 control-label">No. Faktur</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="faktur" readonly name="faktur" value="{$i['id']}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Tgl Terima</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="idate" name="idate" datepicker
                                               data-date-format="dd-mm-yyyy" data-auto-close="true"
                                               value="{$idate}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3"
                                           class="col-sm-4 control-label">{$_L['Invoice Date']}</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tgl" name="tgl" readonly value="{$tgl}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="table-responsive m-t">
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="10%">{$_L['Item Code']}</th>
                                <th width="40%">{$_L['Item Name']}</th>
                                <th width="25%">Batch Number</th>
                                <th width="7%">Qty</th>
                                <th width="15%">Gudang</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $items as $item}
                                <tr>
                                    <td><input type="text" class="form-control item_name" readonly name="code[]"
                                    			value="{$item['itemcode']}"></td>
                                    <td><input type="text" class="form-control item_name" readonly name="desc[]"
                                               value="{$item['description']}"></td>
                                    <td><input type="text" class="form-control item_name" readonly name="batch[]"
                                               value="{$item['batch_number']}"></td>
                                    <td><input type="text" class="form-control item_name" readonly name="qty[]"
                                               value="{$item['qty']}"></td>
                                    <td>
                                        <select id="tid" name="tid[]" class="form-control">
                                            <option value="">None</option>
                                            {foreach $t as $ts}
                                                <option value="{$ts['id']}" >{$ts['kode_gudang']}</option>
                                            {/foreach}

                                        </select>
                                    </td>
                                </tr>
                            {/foreach}


                            </tbody>
                        </table>

                    </div>
                    <br>

                    <div class="text-right">
                        <input type="hidden" name="iid" id="iid" value="{$i['id']}">
                        <button class="btn btn-primary" id="submit"><i class="fa fa-save"></i> {$_L['Save']}</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>

{* lan variables *}

<input type="hidden" id="_lan_btn_save" value="{$_L['Save']}">

{include file="sections/footer.tpl"}