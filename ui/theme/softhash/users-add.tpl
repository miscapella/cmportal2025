
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{$_L['Add New User']}</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="{$_url}settings/users-post">
                    <div class="form-group">
                        <label for="fullname">{$_L['Full Name']}</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="username">{$_L['Email Address']}</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">{$_L['Password']}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">{$_L['Confirm Password']}</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <div class="form-group">
						<label for="user_type">{$_L['User']} {$_L['Type']}</label>
						<select name="user_type" id="user_type" class="form-control">
							<option value="Admin">{$_L['Full Administrator']}</option>
							<option value="Employee">{$_L['Employee']}</option>

						</select>
					</div>
                    <div class="form-group m-bottom-md">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Pilih Department</option>
                            {$department}
                        </select>
                    </div>
                    <!-- <div class="form-group m-bottom-md">
                        <label for="kode_cabang">Kode Cabang</label>
                        <select name="kode_cabang" id="kode_cabang" class="form-control">
                            <option value="">Pilih Kode cabang</option>
                            {$cabang}
                        </select>
                    </div>
                    <div class="form-group m-bottom-md">
                        <label for="kode_bagian">Bagian</label>
                        <select name="kode_bagian" id="kode_bagian" class="form-control">
                            <option value="">Pilih Kode Bagian</option>
                            {$bagian}
                        </select>
                    </div> -->
                    <div class="form-group m-bottom-md ">
                        <label for="atasan">Atasan</label>
                        <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan" style="background-color: white" readonly>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                </form>

            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}