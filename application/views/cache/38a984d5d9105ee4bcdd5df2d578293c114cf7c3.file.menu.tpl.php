<?php /* Smarty version Smarty-3.1.18, created on 2014-09-23 00:50:36
         compiled from "application/views/templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21431840365418a95a3217d5-17886385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38a984d5d9105ee4bcdd5df2d578293c114cf7c3' => 
    array (
      0 => 'application/views/templates/menu.tpl',
      1 => 1411426231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21431840365418a95a3217d5-17886385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a95a32b5c3_34167337',
  'variables' => 
  array (
    'menu_size' => 0,
    'currentMenu' => 0,
    'currentUser' => 0,
    'currentSubMenu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a95a32b5c3_34167337')) {function content_5418a95a32b5c3_34167337($_smarty_tpl) {?><nav id="sidebar">
    <input type="hidden" id="menu_size" name="menu_size" value="<?php echo $_smarty_tpl->tpl_vars['menu_size']->value;?>
">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <!-- DASHBOARD -->
                    <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::DASHBOARD) {?> class="current" <?php }?>>
                        <a href="dashboard"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>

                    <?php if ($_smarty_tpl->tpl_vars['currentUser']->value->is_foreman||$_smarty_tpl->tpl_vars['currentUser']->value->is_super_user) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::DAILYREPORTS) {?> class="current active hasSub" <?php } else { ?> class="hasSub" <?php }?>>
                        <a href="#"><i class="fa fa-truck"></i><span class="sidebar-text">Napi jelentések</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse" style="height: 0px;">

                            <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::DAILYREPORTS&&$_smarty_tpl->tpl_vars['currentSubMenu']->value==UserSubMenuItems::REPORTLIST) {?> class="current"  <?php }?>>
                                <a href="users/user_list"><span class="sidebar-text">Jelentések listája</span></a>
                            </li>
                            
                            <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::DAILYREPORTS&&$_smarty_tpl->tpl_vars['currentSubMenu']->value==UserSubMenuItems::NEWREPORT) {?> class="current" <?php }?>>
                                <a href="users/edit_user"><span class="sidebar-text">Új jelentés</span></a>
                            </li>
                        </ul>
                    </li>

                    <?php }?>



                    <!--ACCOUNT MANAGER -->
                    <?php if ($_smarty_tpl->tpl_vars['currentUser']->value->is_super_user) {?>
                    <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::USERS) {?> class="current active hasSub" <?php } else { ?> class="hasSub" <?php }?>>
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Felhasználók</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse" style="height: 0px;">

                            <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::USERS&&$_smarty_tpl->tpl_vars['currentSubMenu']->value==UserSubMenuItems::USERLIST) {?> class="current"  <?php }?>>
                                <a href="users/user_list"><span class="sidebar-text">Felhasználók listája</span></a>
                            </li>
                            
                            <li <?php if ($_smarty_tpl->tpl_vars['currentMenu']->value==MenuItems::USERS&&$_smarty_tpl->tpl_vars['currentSubMenu']->value==UserSubMenuItems::NEWUSER) {?> class="current" <?php }?>>
                                <a href="users/edit_user"><span class="sidebar-text">Új felhasználó</span></a>
                            </li>
                        </ul>
                    </li>
                   <?php }?>
                  
                   
                    <br>
                </ul>
            </div>
            <div class="footer-widget">
                <div class="footer-gradient"></div>
                
                <div class="sidebar-footer clearfix">
                    <a class="pull-left" href="dashboard" rel="tooltip" data-placement="top" data-original-title="Settings"><i class="glyph-icon flaticon-settings21"></i></a>
                    <a class="pull-left toggle_fullscreen" href="#" rel="tooltip" data-placement="top" data-original-title="Fullscreen"><i class="glyph-icon flaticon-fullscreen3"></i></a>
                    <a class="pull-left" href="login/lockscreen" rel="tooltip" data-placement="top" data-original-title="Lockscreen"><i class="glyph-icon flaticon-padlock23"></i></a>
                    <a class="pull-left" href="login/logout" rel="tooltip" data-placement="top" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
                </div> 
            </div>
</nav><?php }} ?>
