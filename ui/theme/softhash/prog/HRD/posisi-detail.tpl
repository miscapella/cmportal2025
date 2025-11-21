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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <h1 class="text-center">Detail Posisi</h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_id">Position Id</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_id" name="position_id" class="form-control" value="{$posisi['position_id']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_title">Position Title</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_title" name="position_title" class="form-control" value="{$posisi['title']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_grade">Position Grade</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_grade" name="position_grade" class="form-control" value="{$posisi['grade']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="position_level">Position Level</label>
                            <div class="col-lg-9">
                                <input type="text" id="position_level" name="position_level" class="form-control" value="{$posisi['level']}" disabled style="background-color: transparent; cursor: default;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="sections/footer.tpl"}