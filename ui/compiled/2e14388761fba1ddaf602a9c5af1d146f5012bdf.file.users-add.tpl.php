<?php /* Smarty version Smarty-3.1.13, created on 2024-10-30 11:09:37
         compiled from "ui\theme\softhash\users-add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1848511127638ff9bb9ebd21-32713450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e14388761fba1ddaf602a9c5af1d146f5012bdf' => 
    array (
      0 => 'ui\\theme\\softhash\\users-add.tpl',
      1 => 1730261376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1848511127638ff9bb9ebd21-32713450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_638ff9bbea4347_58391523',
  'variables' => 
  array (
    '_L' => 0,
    '_url' => 0,
    'department' => 0,
    'cabang' => 0,
    'bagian' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_638ff9bbea4347_58391523')) {function content_638ff9bbea4347_58391523($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New User'];?>
</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/users-post">
                    <div class="form-group">
                        <label for="fullname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
</label>
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="username"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Address'];?>
</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Confirm Password'];?>
</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    <div class="form-group">
						<label for="user_type"><?php echo $_smarty_tpl->tpl_vars['_L']->value['User'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>
						<select name="user_type" id="user_type" class="form-control">
							<option value="Admin"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Administrator'];?>
</option>
							<option value="Employee"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Employee'];?>
</option>

						</select>
					</div>
                    <div class="form-group m-bottom-md">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Pilih Department</option>
                            <?php echo $_smarty_tpl->tpl_vars['department']->value;?>

                        </select>
                    </div>
                    <div class="form-group m-bottom-md">
                        <label for="kode_cabang">Kode Cabang</label>
                        <select name="kode_cabang" id="kode_cabang" class="form-control">
                            <option value="">Pilih Kode cabang</option>
                            <?php echo $_smarty_tpl->tpl_vars['cabang']->value;?>

                        </select>
                    </div>
                    <div class="form-group m-bottom-md">
                        <label for="kode_bagian">Bagian</label>
                        <select name="kode_bagian" id="kode_bagian" class="form-control">
                            <option value="">Pilih Kode Bagian</option>
                            <?php echo $_smarty_tpl->tpl_vars['bagian']->value;?>

                        </select>
                    </div>
                    <div class="form-group m-bottom-md ">
                        <label for="atasan">Atasan</label>
                        <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan" style="background-color: white" readonly>
                    </div>


                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>