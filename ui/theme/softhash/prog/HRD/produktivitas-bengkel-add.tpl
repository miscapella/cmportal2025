{include file="sections/header.tpl"}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="{$_url}produktivitas-bengkel/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>
                    <form class="form-horizontal" id="rformcabang">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Tambah Cabang</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location"><span style="color: red;">*</span> Cabang</label>
                            <div class="col-lg-9">
                                <select class="form-control rolegroup" id="work_location" name="work_location">
                                    {$branchesSelect}
                                </select>
                            </div>
                        </div>
                        <script>
                            const workLocations = {$workLocations};
                        </script>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location1">Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location1" name="work_location1" class="form-control" placeholder="Work Location" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="spreadsheet_link"><span style="color: red;">*</span> Link Spreadsheet (.xlsx)</label>
                            <div class="col-lg-9">
                                <input type="text" id="spreadsheet_link" name="spreadsheet_link" class="form-control" placeholder="Link Spreadsheet (.xlsx)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="is_udt"> Cabang UDT</label>
                            <div class="col-lg-9">
                                <input type="checkbox" id="is_udt" name="is_udt">
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