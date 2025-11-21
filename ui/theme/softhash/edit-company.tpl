{include file="sections/header.tpl"}
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Edit Perusahaan</h5>
				<div class="ibox-tools">
					<a href="{$_url}company/list" class="btn btn-primary btn-xs">{$_L['List Company']}</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal" id="rform">

					<input type="hidden" name="cid" id="cid" value="{$cid}">
                    <div class="form-group"><label class="col-lg-3 control-label" for="company">Nama Perusahaan</label>

                        <div class="col-lg-9"><input type="text" id="company" name="company" class="form-control" value="{$d['company']}">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="email">{$_L['Email']}</label>

                        <div class="col-lg-9"><input type="text" id="email" name="email" class="form-control" value="{$d['email']}">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="phone">{$_L['Phone']}</label>

                        <div class="col-lg-9"><input type="text" id="phone" name="phone" class="form-control" value="{$d['phone']}">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="address">{$_L['Address']}</label>

                        <div class="col-lg-9"><input type="text" id="address" name="address" class="form-control" value="{$d['address']}">

                        </div>
                    </div>


                    <div class="form-group"><label class="col-lg-3 control-label" for="city">{$_L['City']}</label>

                        <div class="col-lg-9"><input type="text" id="city" name="city" class="form-control" value="{$d['city']}">

                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-3 control-label" for="zip">{$_L['ZIP Postal Code']} </label>

                        <div class="col-lg-9"><input type="text" id="zip" name="zip" class="form-control" value="{$d['zip']}">

                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-3 control-label" for="country">{$_L['Country']}</label>

                        <div class="col-lg-9">

                            <select name="country" id="country" class="form-control">
                                <option value="">{$_L['Select Country']}</option>
                               {$countries}
                            </select>

                        </div>
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