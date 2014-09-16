<?php /* Smarty version Smarty-3.1.18, created on 2014-09-16 23:11:24
         compiled from "application/views/templates/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7109131655418a77ca17aa9-41890211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f4d61325180270d3669b50100420575cc03324b' => 
    array (
      0 => 'application/views/templates/layout.tpl',
      1 => 1410881076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7109131655418a77ca17aa9-41890211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl' => 0,
    'title' => 0,
    '_metas' => 0,
    '_styles' => 0,
    '_scripts' => 0,
    'topbar' => 0,
    'menu' => 0,
    'content' => 0,
    'chat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5418a77ca30174_73037966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5418a77ca30174_73037966')) {function content_5418a77ca30174_73037966($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <base href="<?php echo $_smarty_tpl->tpl_vars['baseurl']->value;?>
" />
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />

    <?php echo $_smarty_tpl->tpl_vars['_metas']->value;?>

    
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins.min.css" rel="stylesheet">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">   

    <!-- END  MANDATORY STYLE -->

    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="assets/plugins/metrojs/metrojs.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <link href="assets/plugins/jnotify/jNotify.jquery.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/font-awesome-animation/font-awesome-animation.min.css">

    <?php echo $_smarty_tpl->tpl_vars['_styles']->value;?>


    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>

    <!--<script src="assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>-->

    <script src="assets/plugins/jnotify/jNotify.jquery.min.js"></script>
    <script src="assets/js/notifications.js"></script>
    <?php echo $_smarty_tpl->tpl_vars['_scripts']->value;?>


    <script src="js/heartbeat.js"></script>     
</head>

<body data-page="dashboard">
    <!-- BEGIN TOP MENU -->
    <?php echo $_smarty_tpl->tpl_vars['topbar']->value;?>

    <!-- END TOP MENU -->

    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

        <!-- END MAIN SIDEBAR -->

        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content" class="dashboard">
            
                <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                
        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->

    <!-- BEGIN CHAT MENU -->
    <?php echo $_smarty_tpl->tpl_vars['chat']->value;?>

    <!-- END CHAT MENU -->
    
    <div class="md-overlay"></div>

    <!-- BEGIN MANDATORY SCRIPTS -->
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/plugins/icheck/icheck.js"></script>
    <script src="assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
    <script src="assets/plugins/nprogress/nprogress.js"></script>
    <script src="assets/plugins/charts-sparkline/sparkline.min.js"></script>
    <script src="assets/plugins/breakpoints/breakpoints.js"></script>
    <script src="assets/plugins/numerator/jquery-numerator.js"></script>
    <script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
    <script src="js/bootstrap3-confirmation.js"></script>
    <!-- END MANDATORY SCRIPTS -->



    <!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--    
    <script src="assets/plugins/metrojs/metrojs.min.js"></script>
    <script src='assets/plugins/fullcalendar/moment.min.js'></script>
    <script src='assets/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script src="assets/plugins/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/plugins/google-maps/markerclusterer.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="assets/plugins/google-maps/gmaps.js"></script>
    <script src="assets/plugins/charts-flot/jquery.flot.js"></script>
    <script src="assets/plugins/charts-flot/jquery.flot.animator.min.js"></script>
    <script src="assets/plugins/charts-flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/charts-flot/jquery.flot.time.min.js"></script>
    <script src="assets/plugins/charts-morris/raphael.min.js"></script>
    <script src="assets/plugins/charts-morris/morris.min.js"></script>
    <script src="assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/calendar.js"></script>
   <!-- <script src="assets/js/dashboard.js"></script> -->
    <!-- END  PAGE LEVEL SCRIPTS -->
   <script src="assets/js/application.js"></script>
</body>

</html><?php }} ?>
