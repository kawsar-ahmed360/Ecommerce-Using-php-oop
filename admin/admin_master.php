<?php 
ob_start(); 
session_start();

$Admin_id = $_SESSION['admin_id'];

if ($Admin_id==Null) {
    
    header('location:index.php');
}

          include '../classes/Super_Admin.php';
          $obj_SuperAdmin = new Super_Admin();
 if (isset($_GET['status'])) {
     
     if ($_GET['status']=='logout') {
          $obj_SuperAdmin->logout();
      } 
 }

 ?>


<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:08:50 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/backend_assets/images/favicon.ico">

        <link href="../assets/backend_assets/libs/chartist/chartist.min.css" rel="stylesheet">
         <link href="../assets/backend_assets/css/app-dark.min.css" rel="stylesheet" type="text/css" />

                 <link href="../assets/backend_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/backend_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="../assets/backend_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 

        <!-- Bootstrap Css -->
        <!-- <link href="../assets/backend_assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" type="text/css" href="../assets/backend_assets/css/bootstrap-dark.min.css">
        <!-- Icons Css -->
        <link href="../assets/backend_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/backend_assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <script type="text/javascript">
        function delte_item(){

            var alert = confirm('Are You Sure Delete This Item!!!');
            if (alert) {
                return true;
            }else{

                return false;
            }
        }

        function deactive_item(){

            var alrm = "If You Want ot deactive this itme";
            if (confirm(alrm)) {
                return true;
            }else{

                return false;
            }
        }

        function active_item(){
            var alrm = "if you wnat to active this Item";

            if (confirm(alrm)) {
                return true;
            }else{

                return false;
            }
        }
    </script>

    <body data-sidebar="dark">



        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include 'include/header.php' ?>

            <!-- ========== Left Sidebar Start ========== -->
            
            <?php include 'include/sidebar.php' ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                 <div class="page-content">

                  <?php 
                   
                    if (isset($pages)) {
                        if ($pages=='category') {
                            
                            include 'pages/category_section.php';
                        }elseif($pages=='add_category'){
                            include 'pages/add_category.php';
                        }elseif($pages=='view_brand'){
                            include 'pages/view_brand.php';
                        }elseif($pages=='brand_add'){
                            include 'pages/brand_add.php';
                        }elseif($pages=='view_product'){
                            include 'pages/view_product.php';
                        }elseif($pages=='product_add'){
                            include 'pages/add_product.php';
                        }elseif($pages=='eye_product'){
                            include 'pages/eye_product.php';
                        }

                    }else{

                        include 'pages/home_content.php';
                    }
             
                   ?>
                <!-- End Page-content -->

               </div>
                
               <?php include 'include/footer.php' ?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="../assets/backend_assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="../assets/backend_assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="../assets/backend_assets/css/bootstrap-dark.min.css" 
                            data-appStyle="../assets/backend_assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="../assets/backend_assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="../assets/backend_assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/grNDB" class="btn btn-primary btn-block mt-3" target="_blank"><i class="mdi mdi-cart mr-1"></i> Purchase Now</a>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="../assets/backend_assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/backend_assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/backend_assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/backend_assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/backend_assets/libs/node-waves/waves.min.js"></script>

        <!-- Peity chart-->
        <script src="../assets/backend_assets/libs/peity/jquery.peity.min.js"></script>

            <script src="../assets/backend_assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="../assets/backend_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="../assets/backend_assets/libs/jszip/jszip.min.js"></script>
        <script src="../assets/backend_assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="../assets/backend_assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="../assets/backend_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/backend_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="../assets/backend_assets/js/pages/datatables.init.js"></script> 

        <!-- Plugin Js-->
        <script src="../assets/backend_assets/libs/chartist/chartist.min.js"></script>
        <script src="../assets/backend_assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

        <script src="../assets/backend_assets/js/pages/dashboard.init.js"></script>

        <script src="../assets/backend_assets/js/app.js"></script>

    </body>


<!-- Mirrored from themesbrand.com/veltrix/layouts/vertical/index-dark.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 May 2020 12:09:31 GMT -->
</html>