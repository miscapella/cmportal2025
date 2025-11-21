{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Memo</h5>
				<div class="ibox-tools">
					<a href="{$_url}form_memo/list" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
<!--
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>
-->
                <form class="form-horizontal form-memo" id="rform">
					<div class="form-group">
                        <input type="text" id="nomor" name="nomor" class="form-control" placeholder="Nomor">
                        <input type="text" id="kepada" name="kepada" class="form-control" placeholder="Kepada">
                        <input type="text" id="subjek" name="subjek" class="form-control" placeholder="Subjek">
                        <textarea class="ckeditor" id="isi_memo" name="isi_memo" rows="10"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}