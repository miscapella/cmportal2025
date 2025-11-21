{include file="sections/header.tpl"}
<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        {if $type eq 'Product'}
                            {$_L['Add Product']}
						{elseif $type eq 'Service'}
                            {$_L['Add Service']}
						{else}
							Tambah Assembly
                        {/if}


                    </h5>
                    <div class="ibox-tools">
                       {if $type eq 'Product'}
                           <a href="{$_url}ps/b-list" class="btn btn-primary btn-xs">{$_L['List Products']}</a>

                       {/if}
                        {if $type eq 'Service'}
                            <a href="{$_url}ps/s-list" class="btn btn-primary btn-xs">{$_L['List Services']}</a>
                        {/if}


                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform" method="post" enctype="multipart/form-data">

						{if $type eq 'Service'}
							<div class="form-group"><label class="col-lg-2 control-label" for="name">No. Equipment</label>
						{else $type eq 'Product'}
							<div class="form-group"><label class="col-lg-2 control-label" for="name">SMC PN.</label>
						{/if}

							{if $type eq 'Komposisi'}
								<div class="col-lg-10">
								<select id="code" name="code" class="form-control">
									<option value="">Pilih No. Internal...</option>
									{foreach $c as $cs}
										<option value="{$cs['code']}"
												{if $p_cid eq ($cs['code'])}selected="selected" {/if}>{$cs['code']} - {$cs['name']}</option>
									{/foreach}

								</select>
								</div>
							{else}
								{if $type eq 'Product'}
									<div class="col-lg-1">
										<select id="code1" name="code1" class="form-control">
											<option value="">Pilih Kode End User</option>
											{$kode_data}
										</select>
									</div>
									<div class="col-lg-1">
										<select id="code2" name="code2" class="form-control">
											<option value="">Pilih Plant</option>
											{$plant_data}
										</select>
									</div>
									<div class="col-lg-1">
										<select id="code3" name="code3" class="form-control">
											<option value="">Pilih Type</option>
											{$mark_data}
										</select>
									</div>
									{*<div class="col-lg-2">
										<input type="text" id="code4" name="code4" class="form-control" autocomplete="off" maxlength="6" value="{$code4}" disabled="disabled">
									</div>*}
								{else}
									<div class="col-lg-10">
										<input type="text" id="code4" name="code4" class="form-control" autocomplete="off" maxlength="15">
									</div>
								{/if}
							{/if}
						</div>

                        {if $type neq 'Komposisi'}
							{if $type eq 'Product'}
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Part NO</label>
									<div class="col-lg-10"><input type="text" id="no_part" name="no_part" class="form-control" autocomplete="off"></div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Name']} Part</label>
									<div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off"></div>
								</div>
							{else}
								<div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Name']} Equipment</label>
									<div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off"></div>
								</div>
							{/if}
						{*{else}
                            <div class="form-group"><label class="col-lg-2 control-label" for="item_number">Target Produksi</label> 
    
                                <div class="col-lg-10"><input type="text" id="item_number" name="item_number" class="form-control amount" autocomplete="off">
    
                                </div>
                            </div>*}
                        {/if}

                        {if $type neq 'Komposisi' and $type neq 'Service'}
                            {*<div class="form-group"><label class="col-lg-2 control-label" for="sales_price">{if $type eq 'Product'} {$_L['Sales Price']} {else} Harga Beli {/if}</label>
    
                                <div class="col-lg-10"><input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3">
    
                                </div>
                            </div>
                            < div class="form-group"><label class="col-lg-2 control-label" for="item_number">{$_L['Item Number']}</label> 
    
                                <div class="col-lg-10"><input type="text" id="item_number" *}{* value="{$nxt}" *}{* name="item_number" class="form-control amount" autocomplete="off">
    
                                </div>
                            </div> 
                            <div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Unit']}</label>
                                <div class="col-lg-10"><input type="text" id="unit" name="unit" class="form-control" autocomplete="off">
                                </div>
                            </div>*}
                            {if $type eq 'Product'}
								<div class="form-group"><label class="col-lg-2 control-label" for="name">PCI No.</label>
									<div class="col-lg-10"><input type="text" id="pci_no" name="pci_no" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Equip No.</label>
									<div class="col-lg-10">
										<select name="equip_no" id="equip_no" class="form-control">
											<option value="">Pilih Equip No</option>
										   {$equip_data}
										</select>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Drawing No.</label>
									<div class="col-lg-10"><input type="text" id="draw_no" name="draw_no" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Unit</label>
									<div class="col-lg-10"><input type="text" id="satuan" name="satuan" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">POS No.</label>
									<div class="col-lg-10"><input type="text" id="pos_no" name="pos_no" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Material</label>
									<div class="col-lg-10"><input type="text" id="material" name="material" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Manufacture</label>
									<div class="col-lg-10"><input type="text" id="manufacture" name="manufacture" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Model</label>
									<div class="col-lg-10"><input type="text" id="model" name="model" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">OD</label>
									<div class="col-lg-10"><input type="text" id="od" name="od" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">ID</label>
									<div class="col-lg-10"><input type="text" id="id_data" name="id_data" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">H/T</label>
									<div class="col-lg-10"><input type="text" id="ht" name="ht" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Berat</label>
									<div class="col-lg-10"><input type="text" id="berat" name="berat" class="form-control" autocomplete="off">
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">Remark</label>
									<div class="col-lg-10"><textarea id="editor1" class="ckeditor" name="spek" rows="3"></textarea>
									</div>
								</div>
								<div class="form-group"><label class="col-lg-2 control-label" for="name">File Drawing</label>
									<div class="col-lg-10"><input type="file" id="file" name="file" class="form-control" autocomplete="off">
									<p class="help-block">* Dikosongkan apabila tidak ada perubahan.</p>
									</div>
								</div>
                            {/if}
						{else}
                            {if $type eq 'Service'}
                            <div class="form-group"><label class="col-lg-2 control-label" for="description">Plant{*{$_L['Description']}*}</label>
    
                                <div class="col-lg-10"><textarea id="description" class="form-control" rows="3"></textarea>
    
                                </div>
                            </div>
                            {/if}
						{/if}

<input type="hidden" id="type" name="type" value="{$type}">

{if $type eq 'Komposisi'}
<br>
                    <div class="table-responsive m-t">
                    	<div><h3>EQUIPMENT</h3></div>
                        <table class="table invoice-table" id="invoice_items">
                            <thead>
                            <tr>
                                <th width="30%">No. Equipment</th>
                                <th width="50%">Nama Equipment</th>
                                <th width="20%">Satuan</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr> <td></td> <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea> </td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
							<!--<tr> <td></td> <td><input type="text" class="form-control item_name" name="desc[]"></td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
                            </tbody>
                        </table><br>
                    	{*<div><h3>KEMASAN</h3></div>
                        <table class="table invoice-table" id="invoice_items1">
                            <thead>
                            <tr>
                                <th width="10%">{$_L['Item Code']}</th>
                                <th width="45%">{$_L['Item Name']}</th>
                                <th width="10%">Persen (%)</th>
                                <th width="10%">{$_L['Qty']}</th>
                                <th width="20%">{$_L['Unit']}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <!--<tr> <td></td> <td><textarea class="form-control item_name" name="desc[]" rows="3"></textarea> </td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
							<!--<tr> <td></td> <td><input type="text" class="form-control item_name" name="desc[]"></td> <td><input type="text" class="form-control qty" value="" name="qty" id="qty"></td> <td><input type="text" class="form-control item_price" name="amount[]" value=""></td> <td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td> <td> <select class="form-control taxed" name="taxed[]"> <option value="Yes">Yes</option> <option value="No" selected="">No</option></select></td></tr>-->
                            </tbody>
                        </table>*}

                    </div>
                    <button type="button" class="btn btn-primary" id="item-add"><i
                                class="fa fa-search"></i> {$_L['Add Service']}</button>
                    {*<button type="button" class="btn btn-primary" id="item-add1"><i
                                class="fa fa-search"></i> Tambah Kemasan</button>*}
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