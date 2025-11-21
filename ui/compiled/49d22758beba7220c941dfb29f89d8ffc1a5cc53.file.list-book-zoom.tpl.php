<?php /* Smarty version Smarty-3.1.13, created on 2025-09-17 14:11:59
         compiled from "ui\theme\softhash\list-book-zoom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4726325906305d7b9433140-55262633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49d22758beba7220c941dfb29f89d8ffc1a5cc53' => 
    array (
      0 => 'ui\\theme\\softhash\\list-book-zoom.tpl',
      1 => 1747101796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4726325906305d7b9433140-55262633',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6305d7b94dfa04_31102579',
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
<?php if ($_valid && !is_callable('content_6305d7b94dfa04_31102579')) {function content_6305d7b94dfa04_31102579($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form
          class="form-horizontal"
          method="post"
          action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/list/"
        >
          <div class="form-group">
            <div class="col-md-8"></div>
            <div class="col-md-4">
              <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/add/" class="btn btn-success btn-block"
                ><i class="fa fa-plus"></i> Book Meetings</a
              >
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
        <?php if ($_smarty_tpl->tpl_vars['d']->value){?> <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?> <?php if ($_smarty_tpl->tpl_vars['tanggal_sementara']->value==changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])){?>
        <div class="body-zoom row">
          <div class="col-md-2">
            <?php echo rangeMeeting($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'],$_smarty_tpl->tpl_vars['ds']->value['durasi']);?>

          </div>
          <div class="col-md-5">
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['subjek'];?>
<br />
            <span class="pinjaman_zoom"
              >Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>
</span
            >
            <!-- <span class="pinjaman_zoom"
              >Meeting ID : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['meeting_id']);?>
</span
            > -->
          </div>
          <div class="col-md-2 pinjaman_zoom">
            <?php if ($_smarty_tpl->tpl_vars['ds']->value['direksi']=='TRUE'){?>Direksi mengikuti Meeting ini<?php }?><br />
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

          </div>
          <div class="col-md-2">
            <?php if (($_smarty_tpl->tpl_vars['ds']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value)||(_auth2('GET-ZOOM-LINK',$_smarty_tpl->tpl_vars['user_id']->value))){?>
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"
              class="btn btn-primary btn-xs"
            >
              Get Link</a
            >
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/cancel/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"
              class="btn btn-danger btn-xs cdelete"
              id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
              ><i class="fa fa-trash"></i> Cancel</a
            >
            <?php }?>
          </div>
          <div class="col-md-1">
            <span
              class="status-zoom"
              style="background-color: <?php if (($_smarty_tpl->tpl_vars['ds']->value['status'])=='PEND'){?> #ffc107 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='DONE'){?> #28a745 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='READY'){?> #007bff <?php }else{ ?> #dc3545 <?php }?>"
              ><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span
            >
          </div>
        </div>
        <?php }else{ ?> <?php $_smarty_tpl->tpl_vars['tanggal_sementara'] = new Smarty_variable(changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting']), null, 0);?>
        <div class="header-zoom">
          <?php if (cekTanggal($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])==1){?> Today <?php }elseif(cekTanggal($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'])==2){?> Tomorrow <?php }else{ ?>
          <?php echo changeFormat($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting']);?>
 <?php }?>
        </div>
        <div class="body-zoom row">
          <div class="col-md-2">
            <?php echo rangeMeeting($_smarty_tpl->tpl_vars['ds']->value['tanggal_meeting'],$_smarty_tpl->tpl_vars['ds']->value['durasi']);?>

          </div>
          <div class="col-md-5">
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['subjek'];?>
<br />
            <span class="pinjaman_zoom"
              >Oleh : <?php echo namaBooking($_smarty_tpl->tpl_vars['ds']->value['user_id']);?>
</span
            >
          </div>
          <div class="col-md-2 pinjaman_zoom">
            <?php if ($_smarty_tpl->tpl_vars['ds']->value['direksi']=='TRUE'){?>Direksi mengikuti Meeting ini<?php }?><br />
            <?php echo $_smarty_tpl->tpl_vars['ds']->value['pinjaman'];?>

          </div>
          <div class="col-md-2">
            <?php if (($_smarty_tpl->tpl_vars['ds']->value['user_id']==$_smarty_tpl->tpl_vars['user_id']->value)||(_auth2('GET-ZOOM-LINK',$_smarty_tpl->tpl_vars['user_id']->value))){?>
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"
              class="btn btn-primary btn-xs"
            >
              Get Link</a
            >
            <a
              href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/cancel/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"
              class="btn btn-danger btn-xs cdelete"
              id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"
              ><i class="fa fa-trash"></i> Cancel</a
            >
            <?php }?>
          </div>
          <div class="col-md-1">
            <span
              class="status-zoom"
              style="background-color: <?php if (($_smarty_tpl->tpl_vars['ds']->value['status'])=='PEND'){?> #ffc107 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='DONE'){?> #28a745 <?php }elseif(($_smarty_tpl->tpl_vars['ds']->value['status'])=='READY'){?> #007bff <?php }else{ ?> #dc3545 <?php }?>"
              ><?php echo $_smarty_tpl->tpl_vars['ds']->value['status'];?>
</span
            >
          </div>
        </div>
        <?php }?> <?php } ?> <?php }else{ ?> Tidak Ada Meeting <?php }?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>