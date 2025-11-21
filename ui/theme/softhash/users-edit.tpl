
{include file="sections/header.tpl"}
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content" id="sysfrm_ajaxrender">
                {if _auth2('EDIT-USER',$user['id'])}
                <a href="{$_url}settings/users" class="btn btn-xs btn-success"> Manage User</a>
                {/if}
                <form class="form-profile" role="form" name="accadd" method="post" action="{$_url}settings/users-edit-post">
                    <div class="row">
                        <div class="form-group">

                            <div id="croppic" style="margin-left:auto;margin-right:auto; max-width: 180px; max-height: 180px">
                            {if $d['img'] neq ''}
                                <img id="img-profile" src="{$d['img']}" class="img-circle" style="max-width: 180px;margin-left:auto;margin-right:auto;display:block" alt="{$d['fullname']}">
                            {/if}
                            </div>

                            <div style="text-align: center;">
                                
                                <button type="button" id="cropContainerHeaderButton" class="btn btn-info" style="margin: 0px;">
                                {if $d['img'] neq ''}
                                Change Profile Picture
                                {else}
                                Upload Profile Picture
                                {/if}
                                </button>
                                {if $d['img'] neq ''}
                                <button type="button" id="no_image" class="btn btn-default">Remove Profile Picture</button>
                                {/if}
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tess">
                        <div class="form-group col-md-3">
                            <label for="username">{$_L['Username']}</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="username" name="username" value="{$d['username']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="fullname">{$_L['Full Name']}</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{$d['fullname']}">
                        </div>
                    </div>

                    {if _auth2('EDIT-MANAGE-USER',$user['id'])}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="emp">Employee Id</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="emp" name="emp" value="{$d['emp_id']}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="user_type">User {$_L['Type']}</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="Admin" {if $d['user_type'] eq 'Admin'}selected="selected" {/if}>{$_L['Full Administrator']}</option>
                                <option value="Employee" {if $d['user_type'] eq 'Employee'}selected="selected" {/if}>{$_L['Employee']}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="department">Unit Usaha</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="department" id="department" class="form-control">
                                <option value="">Pilih Unit Usaha</option>
                                {$department}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cabang">Kode cabang</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="cabang" id="cabang" class="form-control">
                                <option value="">Pilih Kode cabang</option>
                                {$cabang}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bagian">Kode bagian</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="bagian" id="bagian" class="form-control">
                                <option value="">Pilih Kode bagian</option>
                                {$bagian}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="golongan">Tingkatan</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="golongan" id="golongan" class="form-control">
                                <option value="">Pilih Tingkatan</option>
                                {$golongan}
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="atasan">Atasan Langsung</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="atasan" name="atasan" value="{$e['atasan']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="supervisor">Atasan Langsung Berikutnya</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="supervisor" id="supervisor" class="form-control">
                                <option value="">Pilih Supervisor</option>
                                {$supervisor}
                            </select>
                        </div>
                    </div>
                    {else}
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="emp">Employee Id</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="emp" name="emp" value="{$d['emp_id']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_dept">Unit Usaha</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="department" value="{$e['kode_dept']}">
                            <input type="text" class="form-control" id="nama_dept" name="nama_dept" value="{$e['nama_dept']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cabang">Kode Cabang</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="cabang" value="{$user_cabang['kode_cabang']}">
                            <input type="text" class="form-control" id="cabang" name="cabang" value="{$user_cabang['nama_cabang']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bagian">Kode Bagian</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="bagian" value="{$user_bagian['kode_bagian']}">
                            <input type="text" class="form-control" id="bagian" name="bagian" value="{$user_bagian['nama_bagian']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_golongan">Tingkatan</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="golongan" value="{$d['golongan']}">
                            <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" value="{$d['golongan']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="atasan">Atasan Langsung</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="hidden" name="atasan" value="{$e['atasan']}">
                            <input type="text" class="form-control" id="nama_atasan" name="nama_atasan" value="{$e['atasan']}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_supervisor">Atasan Langsung Berikutnya</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="hidden" name="supervisor" value="{$d['supervisor']}">
                            <input type="text" class="form-control" id="nama_supervisor" name="nama_supervisor" value="{$d['supervisor']}" readonly>
                        </div>
                    </div>
                    {/if}
                    <div class="form-group" style="visibility: hidden">
                        <label for="picture">{$_L['Picture']}</label>
                        <input type="text" class="form-control picture" id="picture" readonly name="picture" value="{$d['img']}">
                    </div>
                    <input type="hidden" name="id" value="{$d['id']}">
                    <input type="hidden" id="_url1" value="{$_url1}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
{include file="sections/footer.tpl"}