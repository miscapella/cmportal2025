<?php /* Smarty version Smarty-3.1.13, created on 2023-01-10 13:43:25
         compiled from "ui\theme\softhash\edit-book-zoom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191328781363bd090dd901a1-14349755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28bc8a407f834762fc9af90021a7b2ec435b446' => 
    array (
      0 => 'ui\\theme\\softhash\\edit-book-zoom.tpl',
      1 => 1659513179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191328781363bd090dd901a1-14349755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    'cid' => 0,
    'd' => 0,
    'user' => 0,
    '_L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_63bd090de34f88_55482561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63bd090de34f88_55482561')) {function content_63bd090de34f88_55482561($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Link Zoom</h5>
				<div class="ibox-tools">
					<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
book_zoom/list" class="btn btn-primary btn-xs">Back</a>
				</div>
            </div>
            <div class="ibox-content" id="ibox_form">
                <div class="alert alert-danger" id="emsg">
                    <span id="emsgbody"></span>
                </div>

                <form class="form-horizontal form-zoom" id="rform">
                    <input type="hidden" name="cid" id="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
					<div class="form-group">
                        <label class="control-label" for="subjek">Subjek Meeting</label>
                        <input type="text" id="subjek" name="subjek" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['subjek'];?>
">
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label" for="linkzoom">Link Zoom</label><br>
                        <textarea class="ckeditor" id="link_zoom" name="link_zoom" rows="10"><?php echo $_smarty_tpl->tpl_vars['d']->value['link_zoom'];?>

                        </textarea>
                        <p>Note : Link Meeting akan muncul pada kolom diatas dalam waktu 1x24jam, jika link masih belum muncul maka hubungi administrator</p>
                    </div>
                    <?php if (_auth2('ADD-ZOOM-LINK',$_smarty_tpl->tpl_vars['user']->value['id'])){?>
                    <button class="btn btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                    <div class="form-group">
                        <label class="control-label" for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['username'];?>
">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fullname">Fullname</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['d']->value['fullname'];?>
">
                    </div>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>