{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tambah Kemasan</h5>
                    <div class="ibox-tools">
                        <a href="{$_url}ps/kemasan-list" class="btn btn-primary btn-xs">Daftar Kemasan</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform" method="post">

                        <div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Code']}</label>

                            <div class="col-lg-10">
	                            <input type="text" id="code" name="code" class="form-control" autocomplete="off">
                            </div>
                        </div>

                            <div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Name']}</label>
    
                                <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off">
    
                                </div>
                            </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sales_price">{if $type eq 'Product'} {$_L['Sales Price']} {else} Harga Beli {/if}</label>

                            <div class="col-lg-10"><input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="{$_c['currency_code']} "  data-a-dec="{$_c['dec_point']}" data-a-sep="{$_c['thousands_sep']}" data-d-group="3">

                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label" for="name">{$_L['Unit']}</label>

                            <div class="col-lg-10"><input type="text" id="unit" name="unit" class="form-control" autocomplete="off">

                            </div>
                        </div>

<input type="hidden" id="type" name="type" value="{$type}">

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