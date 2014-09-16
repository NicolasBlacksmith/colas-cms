<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <base href="{$baseurl}" />
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>{$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />

    {$_metas}
    
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

    {$_styles}

    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <script src="assets/plugins/jquery-1.11.js"></script>
    <script src="assets/plugins/jquery-migrate-1.2.1.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>

    <!--<script src="assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>-->

    <script src="assets/plugins/jnotify/jNotify.jquery.min.js"></script>
    <script src="assets/js/notifications.js"></script>
    {$_scripts}

    <script src="js/heartbeat.js"></script>     
</head>

<body data-page="dashboard">
    <!-- BEGIN TOP MENU -->
    {$topbar}
    <!-- END TOP MENU -->

    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        {$menu}
        <!-- END MAIN SIDEBAR -->

        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content" class="dashboard">
            
                {$content}
                
        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->

    <!-- BEGIN CHAT MENU -->
    {$chat}
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

</html>