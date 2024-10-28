<?php

 include('../includes/sidebar.php'); 
 include('../../config/connection.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="">

    <!-- third party css -->
    <link href="../adminassets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../adminassets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../adminassets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="../adminassets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../adminassets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="../adminassets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" 
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   



    <!-- <link href="./adminassets/css/app.min.css" rel="stylesheet" type="text/css"/> -->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    
    <style>
        table .form-check {
            display: none;
        }

        .leftside-menu {
            background:#000!important;
        }

        .side-nav-item a:hover {
            color:green!important;
        }

       
    </style>
</head>
<body>
<div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">


                    <li class="notification-list">
                        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                            <i class="dripicons-gear noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <!-- <span class="account-user-avatar">
                                        <img src="../adminassets/images/users/avatar-1.jpg" alt="user-image"
                                             class="rounded-circle">
                                    </span> -->
                            <span>
                                        <span class="account-user-name">Aftklassik</span>
                                        <span class="account-position">Adminstrator</span>
                                    </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="../logout" class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>

            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
                    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="../pages/home.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../pages/users.php">İstifadəçilər</a></li>
                        <!-- <li class="breadcrumb-item active">FutureArt </li> -->
                    </ol>
                </div>
                <h4 class="page-title">Aftklassik </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<?php
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "SELECT * FROM admin_user WHERE id=:user_id LIMIT 1";
    $statement = $conn->prepare($query);
    $data = [
        ":user_id" => $user_id
    ];

    $statement->execute($data);

    $result = $statement->fetch(PDO::FETCH_OBJ);


}


?>
                    <form action="../Admin/controller/admin_user.php" method="POST"
                          enctype="multipart/form-data">
                        
                        <input type="hidden" name="_token" value="n3wFwIBQG07HiMrxd4UBfrZmDPB6g1IysFDbnzEJ">   
                                            <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="tab-content">
                                                <div class="mb-3">
                                                        <label for="name" class="form-label">Id</label>
                                                        <input type="hidden" id="name" class="form-control"
                                                               placeholder="#" name="user_id"
                                                               value="<?= $result->id ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Ad </label>
                                                        <input type="text" id="name" class="form-control"
                                                               placeholder="Ad" name="user_name"
                                                               value="<?= $result->user_name ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">E-mail</label>
                                                        <input type="text" id="email" class="form-control"
                                                               placeholder="E-mail" name="user_email"
                                                               value="<?= $result->user_email ?>">
                                                    </div>
                                                </div>
                                            </div> <!-- end tab-content-->

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                </div> <!-- end card-body-->
                            </div> <!-- end card -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="tab-content">
                                                                                                      <div class="mb-3">
                                                        <label for="password" class="form-label">Şifrə</label>
                                                        <input type="password" id="password" class="form-control"
                                                               placeholder="Şifrə" name="user_password"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->

                        <div class="col-xl-12 d-flex justify-content-end">
                            <button value = "" type="submit" name="user_edit" class="btn btn-primary">Submit</button>
                        </div>
              
                    </form>
                </div>
                <!-- end row -->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
    </div>
    <!-- end row-->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

              <!-- Footer Start -->
       <!-- <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © İşinizdəki müsbət zərrəcik - <a href="#"><strong>proton.az</strong></a>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </footer> -->
        <!-- end Footer -->

    </div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->




<!-- bundle -->
<script src="../Admin/adminassets/js/vendor.min.js"></script>
<script src="../Admin/adminassets/js/app.min.js"></script>

<!-- third party js -->
<script src="../Admin/adminassets/js/vendor/apexcharts.min.js"></script>
<script src="../Admin/adminassets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../Admin/adminassets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="../Admin/adminassets/js/vendor/jquery.dataTables.min.js"></script>
<script src="../Admin/adminassets/js/vendor/dataTables.bootstrap4.js"></script>
<script src="../Admin/adminassets/js/vendor/dataTables.responsive.min.js"></script>
<script src="../Admin/adminassets/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="../Admin/adminassets/js/pages/demo.datatable-init.js"></script>
<script src="../Admin/adminassets/js/vendor/dataTables.checkboxes.min.js"></script>
<script src="../Admin/adminassets/js/vendor/dropzone.min.js"></script>
<script src="../Admin/adminassets/js/ui/component.fileupload.js"></script>
<script src="../Admin/adminassets/js/pages/demo.dashboard.js"></script>
<script src="../Admin/adminassets/js/pages/demo.products.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $('.js-example-basic-multiple').select2();
});
$(document).ready(function () {
    $('.js-example-basic-single').select2();
});
</script>



    
</body>
</html>

