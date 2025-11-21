<?php /* Smarty version Smarty-3.1.13, created on 2023-10-05 10:15:26
         compiled from "ui\theme\softhash\prog\KEBUN\List_mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1937356809651e2a4e62c111-02514178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b399047fc44c00abf24a6a0b3cde581974c3835' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\List_mintabarang.tpl',
      1 => 1695790091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1937356809651e2a4e62c111-02514178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'cd' => 0,
    'd' => 0,
    'nourut' => 0,
    'ds' => 0,
    '_c' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_651e2a4e752f57_51052391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651e2a4e752f57_51052391')) {function content_651e2a4e752f57_51052391($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
								<input type="text" name="name" id="name" class="form-control" placeholder="Cari Nomor Permintaan..."/>
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

<?php if ($_smarty_tpl->tpl_vars['cd']->value!=0){?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>DAFTAR PERMINTAAN BARANG</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. Permintaan</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 15%">Diminta Oleh</th>                        
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>                    </tr>
                    </thead>                    
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
 </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['no_mintabarang'];?>
</td>
                            <td><?php echo date($_smarty_tpl->tpl_vars['_c']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['tanggal']));?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['unit_kerja'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['nomor'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['diminta_oleh'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</td>                            
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/detail-pr/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs"><i class="fa fa-book"></i> Detail</a>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='PENDING'||$_smarty_tpl->tpl_vars['ds']->value['status']=='REVISI'){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/edit-pr/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='REJECT'){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/revisi-pr/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i> Revisi</a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']!='APPROVE'){?>
                                <a href="delete/pembelian/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status']=='APPROVE'&&$_smarty_tpl->tpl_vars['ds']->value['posisi']=='PR'){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pembelian/supplier-pr/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-warning btn-xs"><i class="fa fa-user"></i> Pilih Supplier</a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                    <?php } ?>
                    </tbody>
                </table>
                
			</div>
		</div>
	</div>
</div>
<?php }else{ ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR PERMINTAAN BARANG</h2>
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th style="width: 2%">#</th>
                        <th style="width: 13%">No. Permintaan</th>
                        <th style="width: 15%">Tanggal</th>
						<th style="width: 15%">Unit Kerja</th>
                        <th style="width: 15%">Nomor</th>
                        <th style="width: 15%">Diminta Oleh</th>                        
                        <th style="width: 10%">Status</th>
                        <th class="text-right" style="width: 20%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                </table>
			</div>
		</div>
	</div>
</div>
<?php }?>

<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>