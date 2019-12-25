<?php
    // if($this->session->userdata('status') != "login"){redirect('admin/login');} 
    $page = strtolower($this->uri->segment(1));
    $page2 = strtolower($this->uri->segment(2));

    if ($this->session->userdata('username') != 'admin') {
        redirect('login');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            CIAMIK - DPRKP Kabupaten Batang
        </title>
        <meta name="description" content="Page Titile">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/images/')?>favicon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/images/')?>favicon.png">
        <link rel="mask-icon" href="<?=base_url('assets/backend/')?>img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/fa-regular.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/datagrid/datatables/datatables.bundle.css">
        <link href="<?=base_url('assets/backend/')?>/libs/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/formplugins/summernote/summernote.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend/')?>css/formplugins/select2/select2.bundle.css">
        <style type="text/css">
            @media (min-width: 768px) {
              .modal-xl {
                width: 90%;
               max-width:1200px;
              }
            }
        </style>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWcWBbOq-dZBEGsVT4HT9bOGwSFtpS5_c&libraries=places"></script> 


        <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
    </head>
    <body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="<?=base_url()?>" class="page-logo-link press-scale-down d-flex align-items-center position-relative">
                            <img src="<?=base_url('assets/backend/')?>img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">CIAMIK - SmartAdmin</span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <nav id="js-primary-nav" class="primary-nav" role="navigation">
                        <div class="nav-filter">
                            <div class="position-relative">
                                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                                    <i class="fal fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="info-card">
                            <img src="<?=base_url('assets/backend/')?>img/logo-hd.png" class="profile-image">
                            <div class="info-card-text">
                                <span class="d-inline-block text-truncate text-truncate-sm">Administrator</span>
                            </div>
                            <img src="<?=base_url('assets/backend/')?>img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
                            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                                <i class="fal fa-angle-down"></i>
                            </a>
                        </div>
                        <ul id="js-nav-menu" class="nav-menu">
                            <li <?= ($page=='') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('')?>" title="Peta" data-filter-tags="peta">
                                    <i class="far fa-map"></i>
                                    <span class="nav-link-text" data-i18n="nav.peta">Peta</span>
                                </a>
                            </li>
                            <li <?= ($page=='perumahan') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('perumahan')?>" title="Perumahan" data-filter-tags="perumahan">
                                    <i class="far fa-home"></i>
                                    <span class="nav-link-text" data-i18n="nav.perumahan">Perumahan</span>
                                </a>
                            </li>
                            <li <?= ($page=='pemakaman') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('pemakaman')?>" title="Pemakaman" data-filter-tags="pemakaman">
                                    <i class="far fa-band-aid"></i>
                                    <span class="nav-link-text" data-i18n="nav.pemakaman">Pemakaman</span>
                                </a>
                            </li>
                            <li <?= ($page=='ipal') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('ipal')?>" title="Ipal" data-filter-tags="ipal">
                                    <i class="far fa-braille"></i>
                                    <span class="nav-link-text" data-i18n="nav.ipal">IPAL</span>
                                </a>
                            </li>
                            <li <?= ($page=='jalan') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('jalan')?>" title="Jalan" data-filter-tags="jalan">
                                    <i class="far fa-road"></i>
                                    <span class="nav-link-text" data-i18n="nav.jalan">Jalan</span>
                                </a>
                            </li>
                            <li <?= ($page=='pamsimas') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('pamsimas')?>" title="PAMSIMAS" data-filter-tags="pamsimas">
                                    <i class="far fa-badge"></i>
                                    <span class="nav-link-text" data-i18n="nav.pamsimas">PAMSIMAS</span>
                                </a>
                            </li>
                            <li <?= ($page=='taman') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('taman')?>" title="Taman" data-filter-tags="taman">
                                    <i class="far fa-tree-alt"></i>
                                    <span class="nav-link-text" data-i18n="nav.taman">Taman</span>
                                </a>
                            </li>
                            <li <?= ($page=='rtlh') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('rtlh')?>" title="RTLH" data-filter-tags="rtlh">
                                    <i class="far fa-conveyor-belt"></i>
                                    <span class="nav-link-text" data-i18n="nav.rtlh">RTLH</span>
                                </a>
                            </li>
                            <li <?= ($page=='siteplan') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('siteplan')?>" title="Izin Site Plan" data-filter-tags="izin site plan">
                                    <i class="far fa-info"></i>
                                    <span class="nav-link-text" data-i18n="nav.izin_site_plan">Izin Site Plan</span>
                                </a>
                            </li>
                            <li <?= ($page=='publik') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('publik')?>" title="Pelayanan Publik" data-filter-tags="pelayanan publik">
                                    <i class="far fa-phone-square"></i>
                                    <span class="nav-link-text" data-i18n="nav.pelayanan_publik">Pelayanan Publik</span>
                                </a>
                            </li>
                            <li class="nav-title">Media</li>
                            <li <?= ($page=='carousel') ? 'class="active"' : '' ?>>
                                <a href="<?=base_url('carousel')?>" title="Carousel" data-filter-tags="carousel">
                                    <i class="far fa-images"></i>
                                    <span class="nav-link-text" data-i18n="nav.carousel">Carousel</span>
                                </a>
                            </li>
                        </ul>
                        <div class="filter-message js-filter-message bg-success-600"></div>
                    </nav>
                    <!-- END PRIMARY NAVIGATION -->
                    <!-- NAV FOOTER -->
                    <div class="nav-footer shadow-top">
                        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                            <i class="ni ni-chevron-right"></i>
                            <i class="ni ni-chevron-right"></i>
                        </a>
                        <ul class="list-table m-auto nav-footer-buttons">
                            <li>
                                <a href="<?=base_url('login/logout')?>" data-toggle="tooltip" data-placement="top" title="Keluar">
                                    <i class="far fa-sign-out"> Keluar</i>
                                </a>
                            </li>
                        </ul>
                    </div> <!-- END NAV FOOTER -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="<?=base_url('assets/backend/')?>img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>
                            <!-- app settings -->
                            <div class="hidden-md-down">
                                <a href="#" class="header-icon" data-toggle="modal" data-target=".js-modal-settings">
                                    <i class="fal fa-cog"></i>
                                </a>
                            </div>
                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <img src="<?=base_url('assets/images/favicon.png')?>" class="profile-image" alt="Dr. Codex Lantern">
                                    <!-- you can also add username next to the avatar with the codes below:
                                    <span class="ml-1 mr-1 text-truncate text-truncate-header hidden-xs-down">Me</span>
                                    <i class="ni ni-chevron-down hidden-xs-down"></i> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                        <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                            <span class="mr-2">
                                                <img src="<?=base_url('assets/')?>images/favicon.png" class="profile-image" alt="Dr. Codex Lantern">
                                            </span>
                                            <div class="info-card-text">
                                                <span class="text-truncate text-truncate-md opacity-80">Administrator</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-reset">
                                        <span data-i18n="drpdwn.reset_layout">Reset Layout</span>
                                    </a>
                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target=".js-modal-settings">
                                        <span data-i18n="drpdwn.settings">Settings</span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print">Print</span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>
                                    <div class="dropdown-multilevel dropdown-multilevel-left">
                                        <div class="dropdown-item">
                                            Language
                                        </div>
                                        <div class="dropdown-menu">
                                            <a href="#?lang=fr" class="dropdown-item" data-action="lang" data-lang="fr">Français</a>
                                            <a href="#?lang=en" class="dropdown-item active" data-action="lang" data-lang="en">English (US)</a>
                                            <a href="#?lang=es" class="dropdown-item" data-action="lang" data-lang="es">Español</a>
                                            <a href="#?lang=ru" class="dropdown-item" data-action="lang" data-lang="ru">Русский язык</a>
                                            <a href="#?lang=jp" class="dropdown-item" data-action="lang" data-lang="jp">日本語</a>
                                            <a href="#?lang=ch" class="dropdown-item" data-action="lang" data-lang="ch">中文</a>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item fw-500 pt-3 pb-3" href="page_login-alt.html">
                                        <span data-i18n="drpdwn.page-logout">Logout</span>
                                        <span class="float-right fw-n">&commat;codexlantern</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->