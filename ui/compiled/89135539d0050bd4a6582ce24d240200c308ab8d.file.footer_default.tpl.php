<?php /* Smarty version Smarty-3.1.13, created on 2023-09-08 12:36:52
         compiled from "ui\theme\softhash\sections\footer_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18899879676374fd140dc012-10733285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89135539d0050bd4a6582ce24d240200c308ab8d' => 
    array (
      0 => 'ui\\theme\\softhash\\sections\\footer_default.tpl',
      1 => 1694151400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18899879676374fd140dc012-10733285',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6374fd140fd3f2_51049563',
  'variables' => 
  array (
    'tpl_footer' => 0,
    '_L' => 0,
    '_c' => 0,
    '_url' => 0,
    '_url1' => 0,
    '_theme' => 0,
    'jsvar' => 0,
    'xfooter' => 0,
    'xjq' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6374fd140fd3f2_51049563')) {function content_6374fd140fd3f2_51049563($_smarty_tpl) {?><div id="ajax-modal" class="modal container fade" tabindex="-1" style="display: none;"></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['tpl_footer']->value){?>
    <div class="footer">
        <div>
            <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Copyright'];?>
</strong> &copy; <?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>

        </div>
    </div>
<?php }?>
</div>
</div>
</section>
<!-- BEGIN PRELOADER -->
<?php if (($_smarty_tpl->tpl_vars['_c']->value['animate'])=='1'){?>
    <div class="loader-overlay">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
<?php }?>
<input type="hidden" id="_url" name="_url" value="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
">
<input type="hidden" id="_url1" name="_url1" value="<?php echo $_smarty_tpl->tpl_vars['_url1']->value;?>
">
<input type="hidden" id="_theme" name="_theme" value="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
">
<input type="hidden" id="_df" name="_df" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['df'];?>
">
<input type="hidden" id="_lan" name="_lan" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['language'];?>
">
<!-- END PRELOADER -->
<!-- Mainly scripts -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-1.10.2.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery-ui-1.10.4.min.js"></script>
<script>
    var _L = [];
    var config_animate = 'No';
    <?php if (($_smarty_tpl->tpl_vars['_c']->value['animate'])=='1'){?>
    var config_animate = 'Yes';
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['jsvar']->value;?>

</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/bootstrap.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/metisMenu.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/moment.js"></script>
<script src="ui/lib/blockui.js"></script>
<script src="ui/lib/toggle/bootstrap-toggle.min.js"></script>
<script src="ui/lib/btn-top/btn-top.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/app.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/menu.js"></script>
<script src="ui/lib/DataTables/datatables.min.js"></script>
<?php if (($_smarty_tpl->tpl_vars['_c']->value['animate'])=='1'){?>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/js/pace.min.js"></script>
<?php }?>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/progress.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/bootbox.min.js"></script>

<!-- iCheck -->
<script src="<?php echo $_smarty_tpl->tpl_vars['_theme']->value;?>
/lib/icheck/icheck.min.js"></script>
<?php if (isset($_smarty_tpl->tpl_vars['xfooter']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['xfooter']->value;?>

<?php }?>
<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins

        <?php if (isset($_smarty_tpl->tpl_vars['xjq']->value)){?>
        <?php echo $_smarty_tpl->tpl_vars['xjq']->value;?>

        <?php }?>
	});
</script>
</body>

</html>
<?php }} ?>