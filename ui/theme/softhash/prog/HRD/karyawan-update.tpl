{include file="sections/header.tpl"}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="{$_url}karyawan/list/" class="btn btn-primary btn-xs">Daftar Karyawan</a>
                    </div>
                </div>
                <form class="form-horizontal" id="rformkaryawan">
                    <div class="ibox-content" id="ibox_form">
                        <div class="alert alert-danger" id="ekaryawan">
                            <span></span>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Perbarui Daftar Karyawan</h1>
                            </div>
                        </div>
                        {foreach $excel as $title => $cols}
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="{$title|replace:' ':'_'}"><span style="color: red;">*</span> {$title}</label>
                                <div class="col-lg-9">
                                    <div>
                                        <input type="file" id="file-{$title|replace:' ':'_'}" name="file-{$title|replace:' ':'_'}" class="files">
                                        <input type="text" id="sfile-{$title|replace:' ':'_'}" name="sfile-{$title|replace:' ':'_'}" style="display: none;">
                                    </div>
                                    <ul style="margin-top: 8px;">
                                        {foreach $cols as $col}
                                            <li>{$col}</li>
                                        {/foreach}
                                    </ul>
                                </div>
                            </div>
                        {/foreach}
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}