{include file="sections/header.tpl"}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="{$_url}posisi/list/" class="btn btn-primary btn-xs">Daftar Posisi</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" id="rformposisi">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Perbarui Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position"><span style="color: red;">*</span> Position</label>
                            <div class="col-lg-9">
                                <div>
                                    <input type="file" id="position" name="position" class="files">
                                    <input type="text" id="sposition" name="sposition" style="display: none;">
                                </div>
                                <ul style="margin-top: 8px;">
                                    {foreach $cols as $col}
                                        <li>{$col}</li>
                                    {/foreach}
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}