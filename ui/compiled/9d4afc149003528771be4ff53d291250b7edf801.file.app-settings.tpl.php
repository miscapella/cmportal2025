<?php /* Smarty version Smarty-3.1.13, created on 2024-01-10 14:00:44
         compiled from "ui\theme\softhash\app-settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1696547919659e175dd3eb20-01076299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d4afc149003528771be4ff53d291250b7edf801' => 
    array (
      0 => 'ui\\theme\\softhash\\app-settings.tpl',
      1 => 1704869890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1696547919659e175dd3eb20-01076299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_659e175de35924_23012878',
  'variables' => 
  array (
    '_L' => 0,
    '_url' => 0,
    '_c' => 0,
    'ai' => 0,
    'idate' => 0,
    'idate1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_659e175de35924_23012878')) {function content_659e175de35924_23012878($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row">
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['General Settings'];?>
</h5>

            </div>
            <div class="ibox-content">

                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app-post">
                    <div class="form-group">
                        <label for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Application Name'];?>
</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['CompanyName'];?>
">
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['This Name will be'];?>
</span>
                    </div>


                    <div class="form-group">
                        <label for="theme"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Theme'];?>
</label>
                        <select name="theme" id="theme" class="form-control">
                            <option value="softhash" <?php if ($_smarty_tpl->tpl_vars['_c']->value['theme']=='softhash'){?>selected="selected" <?php }?>>Softhash</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nstyle"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Style'];?>
</label>
                        <select name="nstyle" id="nstyle" class="form-control">
                            <option value="dark" <?php if ($_smarty_tpl->tpl_vars['_c']->value['nstyle']=='dark'){?>selected="selected" <?php }?>>Dark</option>
                            

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="caddress"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Pay To Address'];?>
</label>

                        <textarea class="form-control" id="caddress" name="caddress" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['caddress'];?>
</textarea>
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['You can use html tag'];?>
</span>
                    </div>

                    <div class="form-group">

                        <label for="invoice_terms"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default Invoice Terms'];?>
</label>

                        <textarea class="form-control" id="invoice_terms" name="invoice_terms" rows="3"><?php echo $_smarty_tpl->tpl_vars['_c']->value['invoice_terms'];?>
</textarea>

                    </div>

                    <div class="form-group">
                        <label for="iai"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Starting'];?>
 #</label>
                        <input type="text" class="form-control" id="iai" name="iai">
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enter to set the next invoice'];?>
 - <strong><?php echo $_smarty_tpl->tpl_vars['ai']->value;?>
</strong> (<?php echo $_smarty_tpl->tpl_vars['_L']->value['Keep Blank for'];?>
)</span>
                    </div>

                    <div class="form-group">
                        <label for="pdf_font"><?php echo $_smarty_tpl->tpl_vars['_L']->value['PDF Font'];?>
</label>
                        <select name="pdf_font" id="pdf_font" class="form-control">
                            <option value="default" <?php if ($_smarty_tpl->tpl_vars['_c']->value['pdf_font']=='default'){?>selected="selected" <?php }?>>Default [Faster PDF Creation with Less Memory]</option>
                            <option value="Helvetica" <?php if ($_smarty_tpl->tpl_vars['_c']->value['pdf_font']=='Helvetica'){?>selected="selected" <?php }?>>Helvetica</option>
                            <option value="dejavusanscondensed" <?php if ($_smarty_tpl->tpl_vars['_c']->value['pdf_font']=='dejavusanscondensed'){?>selected="selected" <?php }?>>dejavusanscondensed [Embed fonts with supports UTF8]</option>
                            

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="i_driver"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Creation Method'];?>
</label>
                        <select name="i_driver" id="i_driver" class="form-control">
                            <option value="default" <?php if ($_smarty_tpl->tpl_vars['_c']->value['i_driver']=='default'){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default'];?>
</option>
                            <option value="v2" <?php if ($_smarty_tpl->tpl_vars['_c']->value['i_driver']=='v2'){?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['V2'];?>
</option>


                        </select>
                    </div>






                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>

            </div>
        </div>



         <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Maintenance</h5>
            </div>
            <div class="ibox-content">
                <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/maintenance-post">
                    <div class="form-group">
                        <label for="company">Waktu Maintenance</label>
                        <input type="text" class="form-control" name="idate" id="idate" value="<?php echo $_smarty_tpl->tpl_vars['idate']->value;?>
" />
						<input type="text" class="form-control" placeholder="Isi Waktu Berakhir" id="idate1" name="idate1" data-date-format="dd-mm-yyyy" data-auto-close="true" value="<?php echo $_smarty_tpl->tpl_vars['idate1']->value;?>
">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>
            </div>
        </div>

       <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Logo'];?>
</h5>


            </div>
            <div class="ibox-content">

                <img class="logo" src="sysfrm/uploads/system/logo.png" alt="Logo">
                <br><br>
                <form role="form" name="logo" enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/logo-post">
                    <div class="form-group">
                        <label for="exampleInputFile">Upload New Logo</label>
                        <input type="file" id="file" name="file">
                        <p class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['This will replace existing logo'];?>
 - sysfrm/uploads/system/logo.png</p>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                </form>


            </div>
        </div>

        <div class="ibox float-e-margins" id="ui_settings">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['User Interface'];?>
</h5>


            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>

                    <tr>
                        <td width="80%"><label for="config_animate"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enable Page Loading Animation'];?>
 </label></td>
                        <td> <input type="checkbox" <?php if (get_option('animate')=='1'){?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_animate"></td>
                    </tr>

                    <tr>
                        <td width="80%"><label for="config_rtl"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enable RTL'];?>
 </label></td>
                        <td> <input type="checkbox" <?php if (get_option('rtl')=='1'){?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_rtl"></td>
                    </tr>

                    </tbody>
                </table>



            </div>
        </div>


        <div class="ibox float-e-margins" id="additional_settings">
            <div class="ibox-title">
                <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Additional Settings'];?>
</h5>


            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>

                    <tr>
                        <td width="80%"><label for="console_notify_invoice_created"><?php echo $_smarty_tpl->tpl_vars['_L']->value['cron_invoice_created'];?>
 </label></td>
                        <td> <input type="checkbox" <?php if (get_option('console_notify_invoice_created')=='1'){?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="console_notify_invoice_created"></td>
                    </tr>


                    </tbody>
                </table>



            </div>
        </div>


    </div>



</div>




<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>