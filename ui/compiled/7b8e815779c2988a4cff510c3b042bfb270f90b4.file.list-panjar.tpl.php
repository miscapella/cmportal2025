<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:12:22
         compiled from "ui\theme\softhash\prog\KUBOTA\list-panjar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10322783066358a5963385d8-26941417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b8e815779c2988a4cff510c3b042bfb270f90b4' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\list-panjar.tpl',
      1 => 1564034694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10322783066358a5963385d8-26941417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    'cari' => 0,
    'jfilter' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    'flag' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a5963beb37_99342599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a5963beb37_99342599')) {function content_6358a5963beb37_99342599($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
panjar/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
								<select id="filter" name="filter">
									<option value="no_pjr">No. Panjar</option>
									<option value="no_pesan">No. Pesan</option>
									<option value="b.account">Nama</option>
									<option value="no_cetak">No. Cetak</option>
								</select>&nbsp;&nbsp;
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Filter No. Panjar ..."/ style="margin-top:5px">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
panjar/add/" class="btn btn-success btn-block" style="margin-top:5px"><i class="fa fa-plus"></i> Tambah Panjar</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['cari']->value!=''){?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
<h3><?php echo $_smarty_tpl->tpl_vars['jfilter']->value;?>
 : <?php echo $_smarty_tpl->tpl_vars['cari']->value;?>
</h3>
            </div>
        </div>

    </div>
</div>
<?php }?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>No. Panjar</th>
                        <th>Tgl KW</th>
                        <th>No. Cetak</th>
                        <th>No. Pesan</th>
                        <th>Nama</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["flag"] = new Smarty_variable(0, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_pjr'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['tgl_kw'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_cetak'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_pesan'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                            <td class="text-right">
								<?php if ($_smarty_tpl->tpl_vars['ds']->value['tgl_batal']!=null){?>
									<i class="fa fa-exclamation-circle" title='Telah Batal' style="color:red"></i>&nbsp;
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ds']->value['no_jual']==null&&$_smarty_tpl->tpl_vars['ds']->value['tgl_batal']==null){?>
									<a href="panjar/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-remove"></i> Batal</a>
								<?php }?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
panjar/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["flag"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
					<?php if ($_smarty_tpl->tpl_vars['flag']->value==0){?>
						<tr>
							<td colspan='6'><b>Tidak ada data</b></td>
						</tr>
					<?php }?>
                    </tbody>
                </table>

                </div>
            </div>
        </div>

	</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>