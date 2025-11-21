{include file="sections/header.tpl"}

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a href="{$_url}cabang/list/" class="btn btn-primary btn-xs">Daftar Cabang</a>
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
                            <label class="col-lg-3 control-label" for="branch_name"><span style="color: red;">*</span> Branch Name</label>
                            <div class="col-lg-9">
                                <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Branch Name">
                                <small>Branch name berdasarkan nama sheet</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="work_location"><span style="color: red;">*</span> Work Location</label>
                            <div class="col-lg-9">
                                <input type="text" id="work_location" name="work_location" class="form-control" placeholder="Work Location">
                                <small>Work Location berdasarkan HRIS</small>
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