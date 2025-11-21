<?php /* Smarty version Smarty-3.1.13, created on 2024-12-27 11:21:35
         compiled from "ui\theme\softhash\users-edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12451409446464344a9e8a03-21143777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79bc735a408be2938cf5a27ef7cbe1b5317cd193' => 
    array (
      0 => 'ui\\theme\\softhash\\users-edit.tpl',
      1 => 1735273295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12451409446464344a9e8a03-21143777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6464344aa3a476_42111471',
  'variables' => 
  array (
    'user' => 0,
    '_url' => 0,
    'd' => 0,
    '_L' => 0,
    'department' => 0,
    'cabang' => 0,
    'bagian' => 0,
    'golongan' => 0,
    'e' => 0,
    'supervisor' => 0,
    'user_cabang' => 0,
    'user_bagian' => 0,
    '_url1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6464344aa3a476_42111471')) {function content_6464344aa3a476_42111471($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content" id="sysfrm_ajaxrender">
                <?php if (_auth2('EDIT-USER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users" class="btn btn-xs btn-success"> Manage User</a>
                <?php }?>
                <form class="form-profile" role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-edit-post">
                    <div class="row">
                        <div class="form-group">

                            <div id="croppic" style="margin-left:auto;margin-right:auto; max-width: 180px; max-height: 180px">
                            <?php if ($_smarty_tpl->tpl_vars['d']->value['img']!=''){?>
                                <img id="img-profile" src="<?php echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
" class="img-circle" style="max-width: 180px;margin-left:auto;margin-right:auto;display:block" alt="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                            <?php }?>
                            </div>

                            <div style="text-align: center;">
                                
                                <button type="button" id="cropContainerHeaderButton" class="btn btn-info" style="margin: 0px;">
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['img']!=''){?>
                                Change Profile Picture
                                <?php }else{ ?>
                                Upload Profile Picture
                                <?php }?>
                                </button>
                                <?php if ($_smarty_tpl->tpl_vars['d']->value['img']!=''){?>
                                <button type="button" id="no_image" class="btn btn-default">Remove Profile Picture</button>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tess">
                        <div class="form-group col-md-3">
                            <label for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                        </div>
                    </div>

                    <?php if (_auth2('EDIT-MANAGE-USER',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="emp">Employee Id</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="emp" name="emp" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['emp_id'];?>
">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="user_type">User <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="user_type" id="user_type" class="form-control">
                                <option value="Admin" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type']=='Admin'){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Administrator'];?>
</option>
                                <option value="Employee" <?php if ($_smarty_tpl->tpl_vars['d']->value['user_type']=='Employee'){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Employee'];?>
</option>
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
                                <?php echo $_smarty_tpl->tpl_vars['department']->value;?>

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
                                <?php echo $_smarty_tpl->tpl_vars['cabang']->value;?>

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
                                <?php echo $_smarty_tpl->tpl_vars['bagian']->value;?>

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
                                <?php echo $_smarty_tpl->tpl_vars['golongan']->value;?>

                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="atasan">Atasan Langsung</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="atasan" name="atasan" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['atasan'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="supervisor">Atasan Langsung Berikutnya</label>
                        </div>
                        <div class="form-group col-md-3" style="padding-left: 25px;">
                            <select name="supervisor" id="supervisor" class="form-control">
                                <option value="">Pilih Supervisor</option>
                                <?php echo $_smarty_tpl->tpl_vars['supervisor']->value;?>

                            </select>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="emp">Employee Id</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="emp" name="emp" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['emp_id'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_dept">Unit Usaha</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="department" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['kode_dept'];?>
">
                            <input type="text" class="form-control" id="nama_dept" name="nama_dept" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['nama_dept'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="cabang">Kode Cabang</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="cabang" value="<?php echo $_smarty_tpl->tpl_vars['user_cabang']->value['kode_cabang'];?>
">
                            <input type="text" class="form-control" id="cabang" name="cabang" value="<?php echo $_smarty_tpl->tpl_vars['user_cabang']->value['nama_cabang'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="bagian">Kode Bagian</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="bagian" value="<?php echo $_smarty_tpl->tpl_vars['user_bagian']->value['kode_bagian'];?>
">
                            <input type="text" class="form-control" id="bagian" name="bagian" value="<?php echo $_smarty_tpl->tpl_vars['user_bagian']->value['nama_bagian'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_golongan">Tingkatan</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="hidden" name="golongan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['golongan'];?>
">
                            <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['golongan'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="atasan">Atasan Langsung</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="hidden" name="atasan" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['atasan'];?>
">
                            <input type="text" class="form-control" id="nama_atasan" name="nama_atasan" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['atasan'];?>
" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="nama_supervisor">Atasan Langsung Berikutnya</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="hidden" name="supervisor" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['supervisor'];?>
">
                            <input type="text" class="form-control" id="nama_supervisor" name="nama_supervisor" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['supervisor'];?>
" readonly>
                        </div>
                    </div>
                    <?php }?>
                    <div class="form-group" style="visibility: hidden">
                        <label for="picture"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Picture'];?>
</label>
                        <input type="text" class="form-control picture" id="picture" readonly name="picture" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['img'];?>
">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
">
                    <input type="hidden" id="_url1" value="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>