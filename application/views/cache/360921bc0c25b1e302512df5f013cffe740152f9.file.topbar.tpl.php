<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:19:22
         compiled from "application/views/templates/topbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14612048825418a95a2eaee6-30727829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '360921bc0c25b1e302512df5f013cffe740152f9' => 
    array (
      0 => 'application/views/templates/topbar.tpl',
      1 => 1410854482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14612048825418a95a2eaee6-30727829',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'displayName' => 0,
    'currentUser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a95a31d482_72592618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a95a31d482_72592618')) {function content_5418a95a31d482_72592618($_smarty_tpl) {?><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="menu-medium" class="sidebar-toggle tooltips">
                    <i class="fa fa-outdent"></i>
                </a>
                <a class="navbar-brand" href="dashboard"></a>
            </div>
            <div class="navbar-center"><?php echo $_smarty_tpl->tpl_vars['displayName']->value;?>
</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    
                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username"><?php echo $_smarty_tpl->tpl_vars['currentUser']->value->nickname;?>
</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="users/edit_user/<?php echo $_smarty_tpl->tpl_vars['currentUser']->value->user_id;?>
">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
                                  <a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
                                    <i class="glyph-icon flaticon-fullscreen3"></i>
                                  </a>
                                  <a href="login/lockscreen" title="Lock Screen">
                                    <i class="glyph-icon flaticon-padlock23"></i>
                                  </a>
                                  <a href="login/logout" title="Logout">
                                    <i class="fa fa-power-off"></i>
                                  </a>
                                </li>
                        </ul>
                    </li>
                    <!-- END USER DROPDOWN -->
                  
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav><?php }} ?>
