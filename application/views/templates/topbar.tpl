<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
            <div class="navbar-center">{$displayName}</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    
                    <!-- BEGIN USER DROPDOWN -->
                    <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username">{$currentUser->nickname}</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="users/edit_user/{$currentUser->user_id}">
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
    </nav>