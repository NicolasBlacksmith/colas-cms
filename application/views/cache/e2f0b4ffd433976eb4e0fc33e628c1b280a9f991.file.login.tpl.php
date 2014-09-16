<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 22:49:08
         compiled from "application/views/templates/login/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18604434475418a244d692a4-82356000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f0b4ffd433976eb4e0fc33e628c1b280a9f991' => 
    array (
      0 => 'application/views/templates/login/login.tpl',
      1 => 1410854482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18604434475418a244d692a4-82356000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_error' => 0,
    'error_msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a244d9dfd1_44349120',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a244d9dfd1_44349120')) {function content_5418a244d9dfd1_44349120($_smarty_tpl) {?><div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                         <img src="assets/img/account/login-logo.png" alt="Company Logo">
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div <?php if ($_smarty_tpl->tpl_vars['show_error']->value) {?>class="alert alert-danger"<?php } else { ?>class="alert alert-danger hide"<?php }?>>
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            <?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>

                        </div>
                        <!-- END ERROR BOX -->
                        <form action="login/index" method="post">
                            <input type="text" name="name" placeholder="Username" class="input-field form-control user" />
                            <input type="password" name="password" placeholder="Password" class="input-field form-control password" />
                            <button type="submit" class="btn btn-login">Login</button>
                        </form>
                        
                    </div>
                </div>
               
            </div>
        </div>
</div>
<script type="text/javascript">
    var ls = window.localStorage;
    
    if (ls) {
        ls.clear();
    }
</script>
<?php }} ?>
