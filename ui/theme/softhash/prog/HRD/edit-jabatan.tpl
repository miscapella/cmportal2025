{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="ibox-tools">
					<a href="{$_url}jabatan/list/" class="btn btn-primary btn-xs">Daftar Jabatan</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
                <form class="form-horizontal" id="rformjabatan">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="col-lg-12"><h1 class="text-center">Edit Jabatan</h1></div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="id_jabatan"><span style="color: red;">*</span> Id Jabatan</label>
                        <div class="col-lg-9"><input type="text" id="id_jabatan" name="id_jabatan" class="form-control" placeholder="Id Jabatan" maxlength="10" value="{$d['id_jabatan']}">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="nama_jabatan"><span style="color: red;">*</span> Nama Jabatan</label>
                        <div class="col-lg-9"><input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" maxlength="255" value="{$d['nama_jabatan']}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="id_departemen"><span style="color: red;">*</span> Id Departemen</label>
                        <div class="col-lg-9">
                            <select class="form-control rolegroup" id="id_departemen" name="id_departemen">
                                {$departemen}
                            </select>
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