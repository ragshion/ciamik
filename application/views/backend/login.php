
<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.0
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Login - Citra Manajemen Perumahan dan Kawasan Permukiman
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend//css')?>/vendors.bundle.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend//css')?>/app.bundle.css">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/backend//img')?>/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/backend//img')?>/logo.png">
        <link rel="mask-icon" href="<?=base_url('assets/backend//img')?>/logo.png" color="#5bbad5">
        <!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="<?=base_url('assets/backend//css')?>/page-login.css">
    </head>
    <body>
        <div class="blankpage-form-field">
            <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
                <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                    <img src="<?=base_url('assets/backend//img')?>/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                    <span class="page-logo-text mr-1">CIAMIK SmartAdmin</span>
                    <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                </a>
            </div>
            <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
                <form method="post" action="<?=base_url('login/cek_login')?>">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        <span class="help-block">
                            Username Anda
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password">
                        <span class="help-block">
                            Password Anda
                        </span>
                    </div>
                    <button type="submit" class="btn btn-default float-right">Login</button>
                </form>
            </div>
        </div>
        <div class="login-footer p-2">
            <div class="row">
                <div class="col col-sm-12 text-center">
                    
                </div>
            </div>
        </div>
        <video poster="<?=base_url('assets/backend//img')?>/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
            <source src="<?=base_url('assets/backend//media')?>/video/cc.webm" type="video/webm">
            <source src="<?=base_url('assets/backend//media')?>/video/cc.mp4" type="video/mp4">
        </video>
        <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
        <script src="<?=base_url('assets/backend//js')?>/vendors.bundle.js"></script>
        <script src="<?=base_url('assets/backend//js')?>/app.bundle.js"></script>
        <!-- Page related scripts -->
        <script type="text/javascript">
            $(function(){
                <?= $this->session->flashdata('berhasil'); ?>
            })
        </script>
    </body>
</html>
