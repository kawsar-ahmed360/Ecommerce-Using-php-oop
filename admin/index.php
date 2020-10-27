<?php 
session_start();


if (isset($_SESSION['admin_id'])) {
    header('location:admin_master.php');
}

if (isset($_POST['btn'])) {
    
    require '../classes/admin.php';

    $obj_admin = new Admin();
   $message=$obj_admin->Admin_login_check($_POST);
  
}

 ?>

<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:29 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login 2 | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/backend_assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/backend_assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/backend_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/backend_assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-pages">

        <!-- Begin page -->
        <div class="accountbg" style="background: url('../assets/backend_assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="wrapper-page account-page-full">

            <div class="card shadow-none">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box shadow-none p-4">
                            <div class="p-2">
                                <div class="text-center mt-4">
                                    <a href="index.html"><img src="../assets/backend_assets/images/logo-dark.png" height="22" alt="logo"></a>
                                </div>

                                <h4 class="font-size-18 mt-5 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue to Veltrix.</p>

                                <h4>
                                    <div class="alert-danger">
                                         <?php 
                                            if (isset($message)) {
                                                echo $message;
                                            }
                                          ?>
                                    </div>
                                </h4>

                              <form class="mt-4" action="" method="POST">

                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter username">
                                </div>
    

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
    
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="btn" value="btn">Log In</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3">
                                        <a href="pages-recoverpw-2.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>

                            </form>

                            <div class="mt-5 pt-4 text-center">
                                <p>Don't have an account ? <a href="pages-register-2.html" class="font-weight-medium text-primary"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>

                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    

        <!-- JAVASCRIPT -->
        <script src="../assets/backend_assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/backend_assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/backend_assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/backend_assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/backend_assets/libs/node-waves/waves.min.js"></script>

        <script src="../assets/backend_assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:11:30 GMT -->
</html>
