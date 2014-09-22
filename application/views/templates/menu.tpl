<nav id="sidebar">
    <input type="hidden" id="menu_size" name="menu_size" value="{$menu_size}">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <!-- DASHBOARD -->
                    <li {if $currentMenu == MenuItems::DASHBOARD} class="current" {/if}>
                        <a href="dashboard"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>

                    {if $currentUser->is_foreman || $currentUser->is_super_user}
                        <li {if $currentMenu == MenuItems::DAILYREPORTS} class="current active hasSub" {else} class="hasSub" {/if}>
                        <a href="#"><i class="fa fa-truck"></i><span class="sidebar-text">Napi jelentések</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse" style="height: 0px;">

                            <li {if $currentMenu == MenuItems::DAILYREPORTS AND $currentSubMenu==UserSubMenuItems::REPORTLIST} class="current"  {/if}>
                                <a href="users/user_list"><span class="sidebar-text">Jelentések listája</span></a>
                            </li>
                            
                            <li {if $currentMenu == MenuItems::DAILYREPORTS AND $currentSubMenu==UserSubMenuItems::NEWREPORT} class="current" {/if}>
                                <a href="users/edit_user"><span class="sidebar-text">Új jelentés</span></a>
                            </li>
                        </ul>
                    </li>

                    {/if}



                    <!--ACCOUNT MANAGER -->
                    {if $currentUser->is_super_user}
                    <li {if $currentMenu == MenuItems::USERS} class="current active hasSub" {else} class="hasSub" {/if}>
                        <a href="#"><i class="glyph-icon flaticon-account"></i><span class="sidebar-text">Felhasználók</span><span class="fa arrow"></span></a>
                        <ul class="submenu collapse" style="height: 0px;">

                            <li {if $currentMenu == MenuItems::USERS AND $currentSubMenu==UserSubMenuItems::USERLIST} class="current"  {/if}>
                                <a href="users/user_list"><span class="sidebar-text">Felhasználók listája</span></a>
                            </li>
                            
                            <li {if $currentMenu == MenuItems::USERS AND $currentSubMenu==UserSubMenuItems::NEWUSER} class="current" {/if}>
                                <a href="users/edit_user"><span class="sidebar-text">Új felhasználó</span></a>
                            </li>
                        </ul>
                    </li>
                   {/if}
                  
                   
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
</nav>