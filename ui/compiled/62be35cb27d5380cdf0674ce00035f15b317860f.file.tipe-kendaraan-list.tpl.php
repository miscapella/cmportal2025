<?php /* Smarty version Smarty-3.1.13, created on 2025-11-10 10:42:03
         compiled from "ui\theme\softhash\prog\SERVICE\tipe-kendaraan-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:882913570690863d2a359f8-15101116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62be35cb27d5380cdf0674ce00035f15b317860f' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\SERVICE\\tipe-kendaraan-list.tpl',
      1 => 1762746043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '882913570690863d2a359f8-15101116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_690863d2c1be22_80228017',
  'variables' => 
  array (
    'user' => 0,
    '_url' => 0,
    '_L' => 0,
    'items' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_690863d2c1be22_80228017')) {function content_690863d2c1be22_80228017($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (_auth2('UPDATE-MASTERDATA-TIPE-KENDARAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/export/" class="btn btn-success btn-block"><i class="fa fa-file-excel-o"></i> Export Excel</a>
    </div>
    <div class="col-md-3">
        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/add/" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Tipe Kendaraan</a>
    </div>
</div>
<?php }?>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="card-body panel-body">
                <h1>Daftar Tipe Kendaraan</h1>
                <br>
                <table id="datatable" class="table table-bordered table-hover sys_table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Merek</th>
                            <th width="20%">Kategori</th>
                            <th width="35%">Nama Tipe Mobil</th>
                            <th width="30%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>
                        <tr>
                            <td></td>
                            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value['merek'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value['kategori'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value['nama_tipe_mobil'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                            <td>
                                <?php if (_auth2('UPDATE-MASTERDATA-TIPE-KENDARAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/edit/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <?php }?>
                                <?php if (_auth2('DELETE-MASTERDATA-TIPE-KENDARAAN',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tipe-kendaraan/delete/uid<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?');"><i class="fa fa-trash"></i> Hapus</a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>