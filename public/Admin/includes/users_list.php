
<?php 
include('../../config/connection.php');
include('../controller/admin_user.php');
?>
<head>
    
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="Coderthemes" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="">

    <!-- third party css -->
    <link href="../Admin/adminassets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../Admin/adminassets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css"/>
    <link href="../Admin/adminassets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>

    <!-- App css -->
    <link href="../Admin/adminassets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../adminassets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="../Admin/adminassets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"/>
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


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

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
                            <a href="./logout" class="dropdown-item notify-item">
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
                        <li class="breadcrumb-item active">İstifadəçilər</li>
                    </ol>
                </div>
                <h4 class="page-title">İstifadəçilər</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
                        <div class="card">
                <div class="card-body">
                    <div class="col-sm-4">
                        <a href="./user_create" class="btn btn-danger mb-2">
                           
                        <i class="mdi mdi-plus-circle me-2"></i>
                        Add
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" method="GET" action="..login/user_controll">
                            <thead class="table-light">
                            <tr>
                                <th style="display:none;" class="all">#</th>
                                <th>Ad</th>
                                <th>Email</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <form action="..login/user_controll" method="POST">
                                    
                            <?php if (isset($result) && !empty($result)) { ?>
                                <?php foreach ($result as $row) { ?>

                                                             <tr>
                                    <td style="display: none;">
                                        <p  class="m-0 d-inline-block align-middle font-16">
                                        <?php echo $row['id']; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                        <?php echo $row['user_name']; ?>
                                        </p>
                                    </td>

                                    <td>
                                        <p class="m-0 d-inline-block align-middle font-16">
                                        <?php echo $row['user_email']; ?>
                                        </p>
                                    </td>

                                    <td class="table-action">
                                      <a onclick="showSuccessAlert()" name="user_edit" value="" class="btn btn-primary" href="../login/user_edit?id=<?php echo $row['id']; ?>">Edit</a>
                                
                                    </td>
<!-- <form action="../../admin_user.php" method="POST">
<td class="table-action">
                                        <a href=""
                                           class="action-icon" name="user_delete" value = ""><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
</form> -->
<td>
<form action="../login/user_delete?id=<?php echo $row['id']; ?>" method = "POST">
 
<button onclick="confirmDeleteUser(<?php echo $row['id']; ?>)"   name="user_delete" value = "" class="btn btn-danger">Delete</button>
</form>
</td>



                                 
                                </tr> 

                                
        
                                <?php } ?>
                                <?php } else { ?>
            <tr>
                <td colspan="4">No users found.</td>
            </tr>
        <?php } ?>
                                </form>

                                
                                                        </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        
                    </div>
                </div> 
                <!-- end card-body-->


            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>



            </div>
            <!-- container -->

        </div>
        <!-- content -->

   

    </div>

    <script>
    function showSuccessAlert() {
        swal("Success!", "New user has been inserted.", "success");
    }


    function confirmDeleteUser(userId) {
        var confirmation = confirm("Are you sure you want to delete this user?");

        if (confirmation) {
            // Perform the deletion by making an AJAX request to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../login/user_delete', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response from the server
                    // You can display a success message or update the table, etc.
                    console.log(xhr.responseText);
                }
            };
            xhr.send('user_delete=' + userId);
        }
    }
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>








  
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->