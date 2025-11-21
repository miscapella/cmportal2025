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
                        <input type="hidden" name="cid" id="cid" value="{$posisi['id']}">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Edit Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_id"><span style="color: red;">*</span> Position Id</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_id" name="position_id" class="form-control" placeholder="Position Id" value="{$posisi['position_id']}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_title"><span style="color: red;">*</span> Position Title</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_title" name="position_title" class="form-control" placeholder="Position Title" value="{$posisi['title']}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_grade">Position Grade</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_grade" name="position_grade" class="form-control" placeholder="Position Grade" value="{$posisi['grade']}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_level">Position Level</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_level" name="position_level" class="form-control" placeholder="Position Level" value="{$posisi['level']}">
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