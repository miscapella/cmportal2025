<?php /* Smarty version Smarty-3.1.13, created on 2024-12-27 13:32:38
         compiled from "ui\theme\softhash\prog\KEBUN\List-mintabarang.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1127582965669a385b2fc579-45240845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bb9881d0a99cdb736a4b10d227a6db51a6c8b77' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KEBUN\\List-mintabarang.tpl',
      1 => 1735203827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1127582965669a385b2fc579-45240845',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_669a385b35e4f9_23464730',
  'variables' => 
  array (
    'msg' => 0,
    '_url' => 0,
    '_L' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_669a385b35e4f9_23464730')) {function content_669a385b35e4f9_23464730($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
						<label  class="control-label col-md-2" for="cbstatus">Status User Request :</label>
						<div class="col-md-2">
							<select class="form-control" id="cbstatus">
							<option value="All" selected>All</option>
							<option value="Pending">Pending</option>
							<option value="Approved">Approved</option>
							<option value="Reject">Reject</option>							
							</select>
						</div>
						<div class="col-md-2">
							<button class="btn btn-success btn-block btnrefresh"><i class="fa fa-refresh"></i>  Refresh</button>
						</div>
						<div class="col-md-3"></div>
						<div class="col-md-3">
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