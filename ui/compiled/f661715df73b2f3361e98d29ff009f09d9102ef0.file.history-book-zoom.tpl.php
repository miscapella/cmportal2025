<?php /* Smarty version Smarty-3.1.13, created on 2022-12-29 16:32:17
         compiled from "ui\theme\softhash\history-book-zoom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5157679376305d7bc1fe5b2-14618877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f661715df73b2f3361e98d29ff009f09d9102ef0' => 
    array (
      0 => 'ui\\theme\\softhash\\history-book-zoom.tpl',
      1 => 1672306336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5157679376305d7bc1fe5b2-14618877',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6305d7bc25ec34_21828383',
  'variables' => 
  array (
    '_url' => 0,
    'd' => 0,
    'tanggal_sementara' => 0,
    'ds' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6305d7bc25ec34_21828383')) {function content_6305d7bc25ec34_21828383($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">
       <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/history-export/" class="btn btn-xs btn-danger">Export</a>
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
                                <div class="col-md-5">
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['subjek'];?>
<br>
                                    <span class="pinjaman_zoom">Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>
</span>
                                </div>
                                <div class="col-md-2 pinjaman_zoom">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['direksi']=='TRUE'){?>Direksi mengikuti Meeting ini<?php }?><br>
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

                                </div>
                                <div class="col-md-2">
                                    
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
                                <div class="col-md-5">
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['subjek'];?>
<br>
                                    <span class="pinjaman_zoom">Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>
</span>
                                </div>
                                <div class="col-md-2 pinjaman_zoom">
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['direksi']=='TRUE'){?>Direksi mengikuti Meeting ini<?php }?><br>
                                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                                <div class="col-md-1"><span class="status-zoom" style="background-color: <?php if (($_smarty_tpl->tpl_vars['ds']->value['status'])=='PEND'){?> #ffc107 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='DONE'){?> #28a745 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='READY'){?> #007bff <?php }else{ ?> #dc3545 <?php }?>"><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span></div>
                            </div>
                        <?php }?>
                    <?php } ?>
                <?php }else{ ?>
                    History kosong
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