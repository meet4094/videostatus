<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="nav-item start <?php echo $SelectedMenu['MainMenu'] == "dashboard" ? "active" : ""; ?>">
                <a href="<?php echo BASE_URL . "admin/welcome/dashboard"; ?>" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "user" ? "active" : ""; ?>">
                <a href="<?php echo BASE_URL . "admin/user/view"; ?>" class="nav-link ">
                    <i class="icon-user" aria-hidden="true"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "slider" ? "active" : ""; ?>">
                <a href="<?php echo BASE_URL . "admin/slider/view"; ?>" class="nav-link ">
                    <i class="icon-docs" aria-hidden="true"></i>
                    <span class="title">Slider</span>
                </a>
            </li>
            <li class="nav-item <?php echo in_array($SelectedMenu['MainMenu'], array('festivalcategory', 'festivalimage', 'festivalvideo')) ? "active" : ""; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span class="title">Festival</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "festivalcategory" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/festivalcategory/view"; ?>" class="nav-link ">
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "festivalimage" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/festivalimage/view"; ?>" class="nav-link ">
                            <span class="title">Image</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "festivalvideo" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/festivalvideo/view"; ?>" class="nav-link ">
                            <span class="title">Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo in_array($SelectedMenu['MainMenu'], array('businesscategory', 'businessimage', 'businessvideo')) ? "active" : ""; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    <span class="title">Business</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "businesscategory" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/businesscategory/view"; ?>" class="nav-link ">
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "businessimage" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/businessimage/view"; ?>" class="nav-link ">
                            <span class="title">Image</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "businessvideo" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/businessvideo/view"; ?>" class="nav-link ">
                            <span class="title">Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo in_array($SelectedMenu['MainMenu'], array('greetingcategory', 'greetingimage', 'greetingvideo')) ? "active" : ""; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                    <span class="title">Greeting</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "greetingcategory" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/greetingcategory/view"; ?>" class="nav-link ">
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "greetingimage" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/greetingimage/view"; ?>" class="nav-link ">
                            <span class="title">Image</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "greetingvideo" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/greetingvideo/view"; ?>" class="nav-link ">
                            <span class="title">Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo in_array($SelectedMenu['MainMenu'], array('settings', 'app_settings', 'android_settings', 'mobile_ads_settings', 'push_notification_settings', 'support_settings', 'database_backup')) ? "active" : ""; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/view"; ?>" class="nav-link">
                            <span class="title">Profile Information</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "app_settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/app_settings"; ?>" class="nav-link">
                            <span class="title">APP Setting</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "android_settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/android_settings"; ?>" class="nav-link">
                            <span class="title">Android Setting</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "mobile_ads_settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/mobile_ads_settings"; ?>" class="nav-link">
                            <span class="title">Mobile Ads Setting</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "push_notification_settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/push_notification_settings"; ?>" class="nav-link">
                            <span class="title">Push Notification Setting</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "support_settings" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/support_settings"; ?>" class="nav-link">
                            <span class="title">Support Setting</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $SelectedMenu['MainMenu'] == "database_backup" ? "active" : ""; ?>">
                        <a href="<?php echo BASE_URL . "admin/settings/database_backup"; ?>" class="nav-link">
                            <span class="title">Database Backup</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item <?php echo in_array($SelectedMenu['MainMenu'], array('festivalcategory', 'festivalimage', 'festivalvideo')) ? "active" : ""; ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <!-- <i class="fa-solid fa-face-exhaling" aria-hidden="true"></i> -->
                    <span class="title">Festival</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="<?php echo BASE_URL . "admin/category/view"; ?>" class="nav-link ">
                            <span class="title">Category</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>