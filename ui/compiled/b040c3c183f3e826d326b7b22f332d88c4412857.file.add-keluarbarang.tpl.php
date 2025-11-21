<?php /* Smarty version Smarty-3.1.13, created on 2024-05-16 15:56:38
         compiled from "ui\theme\softhash\prog\KEBUN\add-keluarbarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3412026056630c59abe39a4-15161732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b040c3c183f3e826d326b7b22f332d88c4412857' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\add-keluarbarang.tpl',
      1 => 1715849796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3412026056630c59abe39a4-15161732',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6630c59ac4cf13_06013833',
  'variables' => 
  array (
    'msg' => 0,
    'event_kbs' => 0,
    '_url' => 0,
    'es' => 0,
    'clist' => 0,
    'clist_detail' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6630c59ac4cf13_06013833')) {function content_6630c59ac4cf13_06013833($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['msg']->value!=''){?>
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['event_kbs']->value=="detail"){?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>DETAIL KELUAR BARANG</h3></div>
				<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-keluarbarang" class="btn btn-primary btn-sm">Back</a></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">No Keluar barang</label>
					<div class="col-lg-3">
						<input type="text" id="no_keluarbarang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['no_keluarbarang'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="Tanggal">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl"  class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['es']->value['tanggal'],'%d-%m-%Y');?>
" data-auto-close="true" disabled>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<?php }else{ ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>TAMBAH PENGELUARAN BARANG</h3>
					<!-- <div class="alert alert-danger" id="emsg">
						<a href="#"><i class="fal fa-times" style="float:right" id="closeMsg" ></i></a>
						<span id="emsgbody"></span>
					</div> -->
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor UR </label>
					<div class="col-lg-3">
						<select name="nomor_ur" class="form-control nomor_ur" id="nomor_ur">
							<?php echo $_smarty_tpl->tpl_vars['clist']->value;?>

						</select>
					</div>
					
					<ul style="padding: 0;list-style-type:none">
						<li><button class="btn btn-success btn-sm" name="add" id="add"><i class="fa fa-plus"></i> Ambil Data UR</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-danger btn-sm" name="save" id="save">Simpan</button></li>
					 </ul>
	 
				</div><br>

            </div>
        </div>
    </div>
</div>
<?php }?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
               <h2>DAFTAR PENGELUARAN BARANG</h2>
                <table id='list-mintabarang' class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
						<?php if ($_smarty_tpl->tpl_vars['event_kbs']->value=="detail"){?>
							<th style="width: 2%">#</th>
							<th style="width: 15%">Kode Item</th>
							<th style="width: 23%">Nama Item</th>
							<th style="width: 10%">Qty Dipenuhi</th>
							<th style="width: 15%">No. UR</th>					
						<?php }else{ ?>
	                        <th style="width: 2%">#</th>
    	                    <th style="width: 23%">Nama Item</th>
        	                <th style="width: 15%">Qty Req</th>
							<th style="width: 15%">Qty On Hand</th>
							<th style="width: 15%">Qty Dipenuhi</th>
							<th style="width: 15%">No. UR</th>
						<?php }?>                        
                    </tr>
                    </thead>
                     <tbody>
						<?php if ($_smarty_tpl->tpl_vars['event_kbs']->value=="detail"){?>			
							 <?php echo $_smarty_tpl->tpl_vars['clist_detail']->value;?>
 
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