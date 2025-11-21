{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Department</h5>
				<div class="ibox-tools">
					<a href="{$_url}department/list" class="btn btn-primary btn-xs">List Unit Usaha</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="kode_dept">Kode Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="kode_dept" name="kode_dept" class="form-control" value="{$d['kode_dept']}"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_dept">Nama Unit Usaha</label>
                        <div class="col-lg-9"><input type="text" id="nama_dept" name="nama_dept" class="form-control" value="{$d['nama_dept']}"></div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="atasan">Atasan</label>
                        <div class="col-lg-9"><input type="text" id="atasan" name="atasan" class="form-control" value="{$d['atasan']}"></div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
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