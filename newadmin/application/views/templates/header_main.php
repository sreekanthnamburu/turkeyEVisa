        <!-- Page Container -->
        <!--
            Available Classes:

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="side-header side-content">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <span>
                            <img class="img-avatar img-avatar32" src="<?php echo base_url();?>assets/img/avatars/avatar10.jpg" alt="">
                            <span class="font-w600 push-10-l"><?=$user->username;?></span>
                        </span>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content remove-padding-t">
                    <div class="block pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" data-toggle="block-option" id="refreshapps" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                    </li>
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Recent Count</h3>
                            </div>
                            <div class="block-content block-content-full" id="appsupdate">
                                <!-- Users Navigation -->
                                <ul class="nav-users">
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="<?php echo base_url();?>assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right"><?=$recent_urgent_count?></span>
                                            <div class="font-w400 text-muted">Urgent applications</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="<?php echo base_url();?>assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right"><?=$recent_immediate_count?></span>
                                            <div class="font-w400 text-muted">Immediate applications</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img class="img-avatar" src="<?php echo base_url();?>assets/img/avatars/avatar5.jpg" alt="">
                                            <i class="fa fa-circle text-success"></i> <span class="badge badge-primary pull-right"><?=$recent_normal_count?></span>
                                            <div class="font-w400 text-muted">Normal applications</div>
                                        </a>
                                    </li>  
                                </ul>
                                <!-- END Users Navigation -->
                            </div>
                        </div>
                        <!-- Notifications -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" id="refreshmessages" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                    </li>
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Recent Messages</h3>
                            </div>
                            <div class="block-content" id="msgsupdate">
                                <!-- Activity List -->
                                <ul class="list list-activity">
                                <?php foreach($recent_messages as $message):?>
                                    <li>
                                        <i class="si si-mail-envelope text-success"></i>
                                        <div class="font-w600"><?=$message->name;?></div>
                                        <div><a href="<?=site_url('messages/view/'.$message->id);?>"><?=$message->subject;?></a></div>
                                        <div><small class="text-muted"><?=$message->createddate;?></small></div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                <div class="text-center">
                                    <small><a href="<?=site_url('messages');?>">Load More..</a></small>
                                </div>
                                <!-- END Activity List -->
                            </div>
                        </div>
                        <!-- END Notifications -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="<?php echo base_url();?>assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="<?php echo base_url();?>assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="<?php echo base_url();?>assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="<?php echo base_url();?>assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="<?php echo base_url();?>assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a class="h5 text-white" href="<?=site_url('/');?>">
                                Visa <span class="text-primary">Admin</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a href="<?php echo base_url();?>"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Applications</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('application/pending_applications');?>">Pending</a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo site_url('application/processing_applications');?>">Processing</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo site_url('application/completed_applications');?>">Completed</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('template');?>"><i class="si si-grid"></i><span class="sidebar-mini-hide">Templates</span></a>
                                </li>
                                <li>
                                    <a  href="<?php echo site_url('auth/users');?>"><i class="si si-note"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('settings');?>"><i class="si si-grid"></i><span class="sidebar-mini-hide">Settings</span></a>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('countries');?>"><i class="si si-grid"></i><span class="sidebar-mini-hide">Countries</span></a>
                                </li>
                                 <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Messages</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo site_url('messages');?>">Received</a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo site_url('messages/sent');?>">Sent</a>
                                        </li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="<?php echo site_url('reports');?>"><i class="si si-grid"></i><span class="sidebar-mini-hide">Reports</span></a>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                <img src="<?php echo base_url();?>assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="<?=site_url('application/my_applications');?>">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right"><?=$application_count;?></span>Applications
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?=site_url('auth/edit_user/'.$user->id);?>">
                                        <i class="si si-user pull-right"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="<?=site_url('settings');?>">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="<?=base_url();?>index.php/auth/logout">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                            <i class="fa fa-tasks"></i>
                        </button>
                    </li>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                    <li class="visible-xs">
                        <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                    <li class="js-header-search header-search">
                        <form class="form-horizontal" action="<?=site_url('application/search');?>" method="post">
                            <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                <input class="form-control" type="text" id="base-material-text" name="s" placeholder="Click Enter Search..">
                                <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->