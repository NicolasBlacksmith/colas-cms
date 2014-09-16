<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:20:25
         compiled from "application/views/templates/users/user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15216518745418a999eeaf05-58746676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb33798589c44d7a5dcc7dec33e382ee097aa972' => 
    array (
      0 => 'application/views/templates/users/user_list.tpl',
      1 => 1410864508,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15216518745418a999eeaf05-58746676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user_list' => 0,
    'user' => 0,
    'current_user' => 0,
    'user_manager_edit_user_manager' => 0,
    'super_edit_super' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a99a037198_57890338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a99a037198_57890338')) {function content_5418a99a037198_57890338($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_zengo_date_short')) include '/Users/Miki/GitHub/colas-cms/application/libraries/Smarty-3.1.18/libs/plugins/modifier.zengo_date_short.php';
?><div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-gray">
                            <h3 class="panel-title"><strong>Felhasználók</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-gray">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>Felhasználónév</th>
                                                <th>Teljes név</th>
                                                <th>Utoljára bejelentkezett</th>
                                                <th>Aktív</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['user']->value->nickname;?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['user']->value->full_name;?>
</td>
                                                <td><?php if ($_smarty_tpl->tpl_vars['user']->value->last_login>0) {?> <?php echo smarty_modifier_zengo_date_short($_smarty_tpl->tpl_vars['user']->value->last_login);?>
 <?php } else { ?>never<?php }?></td>
                                                <td><input type="checkbox" class="switch is_user_active" <?php if ($_smarty_tpl->tpl_vars['user']->value->is_active) {?>checked<?php }?> <?php if ($_smarty_tpl->tpl_vars['user']->value->user_id==$_smarty_tpl->tpl_vars['current_user']->value->user_id||$_smarty_tpl->tpl_vars['user']->value->is_super_user||($_smarty_tpl->tpl_vars['user']->value->is_user_manager&&!$_smarty_tpl->tpl_vars['user_manager_edit_user_manager']->value&&!$_smarty_tpl->tpl_vars['current_user']->value->is_super_user)) {?>readonly<?php }?> data-size="small" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
"></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-default"
                                                            <?php if (($_smarty_tpl->tpl_vars['user']->value->is_super_user&&!$_smarty_tpl->tpl_vars['current_user']->value->is_super_user)||($_smarty_tpl->tpl_vars['user']->value->is_super_user&&$_smarty_tpl->tpl_vars['user']->value->user_id!=$_smarty_tpl->tpl_vars['current_user']->value->user_id&&!$_smarty_tpl->tpl_vars['super_edit_super']->value)||($_smarty_tpl->tpl_vars['user']->value->is_user_manager&&!$_smarty_tpl->tpl_vars['user_manager_edit_user_manager']->value&&!$_smarty_tpl->tpl_vars['current_user']->value->is_super_user&&$_smarty_tpl->tpl_vars['user']->value->user_id!=$_smarty_tpl->tpl_vars['current_user']->value->user_id)) {?>
                                                                disabled
                                                            <?php } else { ?>
                                                                onclick="location.href='users/edit_user/<?php echo $_smarty_tpl->tpl_vars['user']->value->user_id;?>
'"
                                                            <?php }?>
                                                            ><i class="fa fa-gears"></i> Módosítás</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div><?php }} ?>
