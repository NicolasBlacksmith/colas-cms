<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:48:58
         compiled from "application/views/templates/login/lockscreen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17254885725418b04a051a85-91267101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62d909cad8274dc89121a32db2d9e4a24fdf53c9' => 
    array (
      0 => 'application/views/templates/login/lockscreen.tpl',
      1 => 1410854482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17254885725418b04a051a85-91267101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'show_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418b04a0e7795_50096527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418b04a0e7795_50096527')) {function content_5418b04a0e7795_50096527($_smarty_tpl) {?> <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                         <?php if ($_smarty_tpl->tpl_vars['user']->value->avatar_id==1) {?><img src="assets/img/avatars/avatar1_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==2) {?><img src="assets/img/avatars/avatar2_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==3) {?><img src="assets/img/avatars/avatar3_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==4) {?><img src="assets/img/avatars/avatar4_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==5) {?><img src="assets/img/avatars/avatar5_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==6) {?><img src="assets/img/avatars/avatar6_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==7) {?><img src="assets/img/avatars/avatar7_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==8) {?><img src="assets/img/avatars/avatar8_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==9) {?><img src="assets/img/avatars/avatar9_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==10) {?><img src="assets/img/avatars/avatar10_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==11) {?><img src="assets/img/avatars/avatar11_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==12) {?><img src="assets/img/avatars/avatar12_big.png"/>
                        <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->avatar_id==13) {?><img src="assets/img/avatars/avatar13_big.png"/><?php }?>

                    </div>
                    <div>
                        <i class="glyph-icon flaticon-padlock23"></i>
                    </div>
                    <h3><?php echo $_smarty_tpl->tpl_vars['user']->value->nickname;?>
</h3>
                    <hr />
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div <?php if ($_smarty_tpl->tpl_vars['show_error']->value) {?>class="alert alert-danger"<?php } else { ?>class="alert alert-danger hide"<?php }?>>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Wrong password. Please try again.
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="login/lockscreen" method="post">
                            <div class="col-md-12 form-input">
                                <input type="hidden" name="last_path" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->last_path;?>
">
                                <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->nickname;?>
">
                                <input type="password" name="password" class="input-field form-control width-100p password" placeholder="Password" required/>
                            </div>
                            <button type="submit" class="btn btn-login btn-reset">Unlock</button>
                        </form>
                        
                        <div class="login-links">
                            <a href="login/index">Sign in using another account</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php }} ?>
