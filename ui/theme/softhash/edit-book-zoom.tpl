{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Link Zoom</h5>
				<div class="ibox-tools">
					<a href="{$_url}book_zoom/list" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal form-zoom" id="rform">
                    <input type="hidden" name="cid" id="cid" value="{$cid}">
					<div class="form-group">
                        <label class="control-label" for="subjek">Subjek Meeting</label>
                        <input type="text" id="subjek" name="subjek" class="form-control" value="{$d['subjek']}">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="linkzoom">Link Zoom</label><br>
                        <textarea class="ckeditor" id="link_zoom" name="link_zoom" rows="10">{$d['link_zoom']}
                        </textarea>
                        <p>Note : Link Meeting akan muncul pada kolom diatas dalam waktu 1x24jam, jika link masih belum muncul maka hubungi administrator</p>
                    </div>
                    {if _auth2('ADD-ZOOM-LINK',$user['id'])}
                    <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> {$_L['Save']}</button>
                    <div class="form-group">
                        <label class="control-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="{$d['username']}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fullname">Fullname</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="{$d['fullname']}">
                    </div>
                    {/if}
                </form>
            </div>
        </div>
    </div>
</div>


</div>
{include file="sections/footer.tpl"}