<?php /* Smarty version Smarty-3.1.13, created on 2025-02-19 13:05:43
         compiled from "ui\theme\softhash\list-book-alat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6995601276318006f1fee55-16018552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2501a7b7a452187cb3ff5792d334f8bb537e35e5' => 
    array (
      0 => 'ui\\theme\\softhash\\list-book-alat.tpl',
      1 => 1739945049,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6995601276318006f1fee55-16018552',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6318006f2687c3_75403448',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'tanggal_sementara' => 0,
    'ds' => 0,
    'user_id' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6318006f2687c3_75403448')) {function content_6318006f2687c3_75403448($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/pinjaman/">
					<div class="form-group">
						<div class="col-md-8">
						</div>
						<div class="col-md-4">
							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/addPinjaman/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Tambah Pinjaman</a>
<!--							<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/kirimemail" class="btn btn-success btn-block"><i class="fa fa-plus"></i> Kirim Email</a>-->
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
                <?php if ($_smarty_tpl->tpl_vars['d']->value){?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['tanggal_sementara']->value==changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])){?>
                            <div class="body-zoom row">
                                <div class="col-md-2"><?php echo rangeMeeting($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'],$_smarty_tpl->tpl_vars['ds']->value['durasi']);?>
</div>
                                <div class="col-md-3">
                                    Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>

                                </div>
                                <div class="col-md-5">
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

                                </div>
                                <div class="col-md-1">
                                    <?php if ((($_smarty_tpl->tpl_vars['ds']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value)||(_auth2('GET-ZOOM-LINK',$_smarty_tpl->tpl_vars['user_id']->value)))&&($_smarty_tpl->tpl_vars['ds']->value['subjek']=='Pinjam Barang Inventaris')){?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/cancelPinjaman/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                                    <i class="fa fa-trash"></i> Cancel</a>
                                    <?php }?>
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: <?php if (($_smarty_tpl->tpl_vars['ds']->value['status'])=='PEND'){?> #ffc107 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='DONE'){?> #28a745 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='READY'){?> #007bff <?php }else{ ?> #dc3545 <?php }?>"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span></div>
                            </div>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['tanggal_sementara'] = new Smarty_variable(changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting']), null, 0);?>
                            <div class="header-zoom">
                                <?php if (cekTanggal($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])==1){?>
                                    Today
                                <?php }elseif(cekTanggal($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])==2){?>
                                    Tomorrow
                                <?php }else{ ?>
                                    <?php echo changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting']);?>

                                <?php }?>
                            </div>
                            <div class="body-zoom row">
                                <div class="col-md-2"><?php echo rangeMeeting($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'],$_smarty_tpl->tpl_vars['ds']->value['durasi']);?>
</div>
                                <div class="col-md-3">
                                    Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>

                                </div>
                                <div class="col-md-5">
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

                                </div>
                                <div class="col-md-1">
                                    <?php if (($_smarty_tpl->tpl_vars['ds']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value)||(_auth2('GET-ZOOM-LINK',$_smarty_tpl->tpl_vars['user_id']->value))&&($_smarty_tpl->tpl_vars['ds']->value['subjek']=='Pinjam Barang Inventaris')){?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/cancelPinjaman/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> Cancel</a>
                                    <?php }?>
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: <?php if (($_smarty_tpl->tpl_vars['ds']->value['status'])=='PEND'){?> #ffc107 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='DONE'){?> #28a745 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='READY'){?> #007bff <?php }else{ ?> #dc3545 <?php }?>"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span></div>
                            </div>
                        <?php }?>
                    <?php } ?>
                <?php }else{ ?>
                    Tidak Ada Pinjaman
                <?php }?>
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