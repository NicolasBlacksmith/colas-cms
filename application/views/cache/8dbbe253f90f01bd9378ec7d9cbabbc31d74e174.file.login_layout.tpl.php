<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 22:49:08
         compiled from "application/views/templates/login_layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10737637185418a244dae7f4-57423652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dbbe253f90f01bd9378ec7d9cbabbc31d74e174' => 
    array (
      0 => 'application/views/templates/login_layout.tpl',
      1 => 1410854482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10737637185418a244dae7f4-57423652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'title' => 0,
    'type' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a244dbf2a7_13506430',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a244dbf2a7_13506430')) {function content_5418a244dbf2a7_13506430($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
     <base href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
" />
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body <?php if ($_smarty_tpl->tpl_vars['type']->value=="lock") {?>class="login lockscreen fade-in" data-page="lockscreen"<?php } else { ?> class="login fade-in" data-page="login" <?php }?>>
    <!-- BEGIN LOCKSCREEN BOX -->

   <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/backstretch/backstretch.min.js"></script>
    <script src="assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
<?php }} ?>
