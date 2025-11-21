<?php /* Smarty version Smarty-3.1.13, created on 2023-12-27 16:12:45
         compiled from "ui\theme\softhash\prog\KEBUN\list-mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1605306352658bea8d9d5648-08259044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff19cb7cec6c7bdd8bff7f2e26dda3b54b0b3a67' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\list-mintabarang.tpl',
      1 => 1703063685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605306352658bea8d9d5648-08259044',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_658bea8e169477_01144625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_658bea8e169477_01144625')) {function content_658bea8e169477_01144625($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/list-mintabarang/">
					<div class="form-group">
						<div class="col-md-8">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="fa fa-search"></span>
								</div>
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor UR..."/>
								<div class="input-group-btn">
									<button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
permintaanbarang/add-mintabarang/" class="btn btn-success btn-block"><i class="fa fa-plus"></i>  Tambah Baru</a>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR USER REQUEST</h2>
                <table id='list-mintabarang' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. Request</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>                        
                        <th style="width: 10%">Status</th>                                                
                        <th class="text-right" style="width: 15%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                     <tbody>
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