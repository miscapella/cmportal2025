<?php /* Smarty version Smarty-3.1.13, created on 2022-10-26 10:11:48
         compiled from "ui\theme\softhash\prog\KUBOTA\list-contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18266051526358a574bf8ea1-02564440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2c4693c3b7ea53a1bc7b1b7ed94db5fe8ad4e41' => 
    array (
      0 => 'ui\\theme\\softhash\\prog\\KUBOTA\\list-contacts.tpl',
      1 => 1565321971,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18266051526358a574bf8ea1-02564440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_url' => 0,
    '_L' => 0,
    't' => 0,
    'ts' => 0,
    '_c' => 0,
    'd' => 0,
    'ds' => 0,
    'nourut' => 0,
    'flag' => 0,
    'app_url' => 0,
    'paginator' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_6358a574cb03a1_29016391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6358a574cb03a1_29016391')) {function content_6358a574cb03a1_29016391($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("sections/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">

                <form class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
customers/list/">
                    <div class="form-group">
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search by Name'];?>
..."/>
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/" class="btn btn-success btn-block"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Contact'];?>
</a>

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
<h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter by Tags'];?>
</h3>
                <ul class="tag-list" style="padding: 0">
                 <?php  $_smarty_tpl->tpl_vars['ts'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ts']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['t']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ts']->key => $_smarty_tpl->tpl_vars['ts']->value){
$_smarty_tpl->tpl_vars['ts']->_loop = true;
?>
                     <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/list/<?php echo $_smarty_tpl->tpl_vars['ts']->value['account'];?>
/"><i class="fa fa-tag"></i> <?php echo $_smarty_tpl->tpl_vars['ts']->value['account'];?>
</a></li>
                 <?php } ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="row">

    <?php if (($_smarty_tpl->tpl_vars['_c']->value['contact_set_view_mode'])=='tbl'){?>

    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable(1, null, 0);?>
					<?php $_smarty_tpl->tpl_vars["flag"] = new Smarty_variable(0, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>

                        <tr>

                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['nourut']->value;?>
</a> </td>

                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</a> </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['company'];?>
</td>

                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>


                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['ds']->value['phone'];?>

                            </td>
                            <td class="text-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>

                                <a href="delete/crm-user/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                            </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars["nourut"] = new Smarty_variable($_smarty_tpl->tpl_vars['nourut']->value+1, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars["flag"] = new Smarty_variable($_smarty_tpl->tpl_vars['flag']->value+1, null, 0);?>
                    <?php } ?>
					<?php if ($_smarty_tpl->tpl_vars['flag']->value==0){?>
						<tr>
							<td colspan='6'><b>Tidak ada data</b></td>
						</tr>
					<?php }?>
                    </tbody>
                </table>

                </div>
            </div>
        </div>


        <?php }else{ ?>

        <?php  $_smarty_tpl->tpl_vars['ds'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ds']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['d']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->key => $_smarty_tpl->tpl_vars['ds']->value){
$_smarty_tpl->tpl_vars['ds']->_loop = true;
?>
            <div class="col-md-3 sdiv">
                <!-- CONTACT ITEM -->
                <div class="panel panel-default">
                    <div class="panel-body profile">
                        <div class="profile-image">
                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['img']=='gravatar'){?>
                                <img src="http://www.gravatar.com/avatar/<?php echo md5(($_smarty_tpl->tpl_vars['ds']->value['email']));?>
?s=200" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['lname'];?>
">
                            <?php }elseif($_smarty_tpl->tpl_vars['ds']->value['img']==''){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
sysfrm/uploads/system/profile-icon.png" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['ds']->value['lname'];?>
">
                            <?php }else{ ?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['ds']->value['img'];?>
" class="img-thumbnail img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
">
                            <?php }?>
                        </div>
                        <div class="profile-data">

                            <div class="profile-data-name"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</div>

                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="contact-info">

                            <p><small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</small><br/><?php if ($_smarty_tpl->tpl_vars['ds']->value['email']!=''){?><?php echo $_smarty_tpl->tpl_vars['ds']->value['email'];?>
 <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['_L']->value['n_a'];?>
 <?php }?></p>

                            <p>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>

                                <a href="delete/crm-user/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-xs cdelete" id="uid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    <?php }?>

</div>
<div class="row">
    <div class="col-md-12">
       <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("sections/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>