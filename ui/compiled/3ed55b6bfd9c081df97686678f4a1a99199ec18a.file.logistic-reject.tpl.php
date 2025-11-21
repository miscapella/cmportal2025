<?php /* Smarty version Smarty-3.1.13, created on 2024-07-31 16:47:03
         compiled from "ui\theme\softhash\prog\KEBUN\logistic-reject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142356967266a203c4c7c035-83021622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ed55b6bfd9c081df97686678f4a1a99199ec18a' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\logistic-reject.tpl',
      1 => 1722418891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142356967266a203c4c7c035-83021622',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_66a203c52ee643_91189128',
  'variables' => 
  array (
    'id' => 0,
    'msg' => 0,
    '_url' => 0,
    'es' => 0,
    'clist' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66a203c52ee643_91189128')) {function content_66a203c52ee643_91189128($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp7.4.8\\htdocs\\cmportal\\sysfrm\\lib\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<input type="hidden" id="idtpl" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="form-control" />

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
			<div class="panel-body blue-bg">
				<div class="col-lg-6"><h3>LOGISTIK REJECT UR</h3></div>
    			<div class="col-lg-6" style="text-align: right"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pengeluaranbarang/list-ur-approved" class="btn btn-primary btn-sm">Back</a></div>				
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Unit Kerja</label>
					<div class="col-lg-3">
						<input type="text" name="unitkerja" id="unitkerja" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['unit_kerja'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label">Nomor</label>
					<div class="col-lg-3">
						<input type="text" name="nomor" id="nomor" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['es']->value['nomor'];?>
" style="background-color: #ccc;" disabled>
					</div>
				</div><br>
				<div class="form-group">
					<label class="col-md-2 control-label" for="tgl_pr">Tanggal</label>
					<div class="col-lg-3"><input style="background-color: #ccc;" type="text" id="tgl" name="tgl" class="form-control" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['es']->value['tanggal'],'%d-%m-%Y');?>
" data-auto-close="true" disabled>
					</div>
				</div>

            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="overflow:auto;white-space:nowrap;">
                <form class="form-horizontal" id="rform">
					<table id='table-add-mr' class="table table-bordered table-hover sys_table">
						<thead>
						<tr>
							<th style="width:2%">#</th>
							<th>Keperluan</th>
							<th>Bagian</th>
							<th>Item Stock</th>
							<th>Qty Reject</th>
							<th>Tanggal Diperlukan</th>
							<th>Keterangan Permintaan</th>
						</tr>
						</thead>
						<tbody>
								<?php echo $_smarty_tpl->tpl_vars['clist']->value;?>

						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="pesan">Alasan Reject</label>
					<div class="col-lg-10"><textarea type="text" id="pesan" name="pesan" class="form-control" rows="5"></textarea>
					</div>
				</div>
                <div class="col-lg-12" style="text-align: right">
                    <br>                    
                    <button type="button" class="btn btn-primary btn-sm" id="btnsimpan">Simpan</button>
                </div>				

                

            

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