<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Jan 2023 16:37:59 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login | Web Perkap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?= site_url("/assets/css/bootstrap.min.css")?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        <style>
            iframe{
                display: initial!important;
            }
        </style>
    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="" class="mb-5 d-block auth-logo">
                                <img src="<?= site_url('assets/images/web-perkap.png'); ?>" alt="" height="50" class="logo logo-dark">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue.</p>
                                </div>
                                <div class="p-2 mt-4 text-center">
                                    
                                    <?php if(session()->getFlashdata('error') !== null): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="uil uil-exclamation-octagon me-2"></i>
                                        <?= session()->getFlashdata('error'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php endif; ?>

                                    <script src="https://accounts.google.com/gsi/client" async defer></script>
                                    <div id="g_id_onload"
                                        data-client_id="422658755343-sitjrg8qkcie4pcdd0htihnrqucjrml3.apps.googleusercontent.com"
                                        data-context="signin"
                                        data-ux_mode="redirect"
                                        data-login_uri="<?=site_url("/auth2")?>"
                                        data-auto_prompt="false">
                                    </div>

                                    <div class="g_id_signin"
                                        data-type="standard"
                                        data-shape="rectangular"
                                        data-theme="outline"
                                        data-text="signin_with"
                                        data-size="large"
                                        data-logo_alignment="left">
                                    </div>
    
                                    <?php if(0): ?>
                                        <a href="<?= $link ?>"> test </a>
                                    <?php endif; ?>

                                </div>
            
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> IT WGG</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <script src="<?=site_url('assets/libs/jquery/jquery.min.js')?>"></script>
        <script src="<?=site_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    </body>
</html>
