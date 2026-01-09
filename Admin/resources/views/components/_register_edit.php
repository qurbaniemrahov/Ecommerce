<?php 
include(__DIR__ . '/../../../config/connection.php');
require("../../../app/Http/Controllers/user/user_edit_controller.php");





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <h2>Admin Panel</h2>
            </div>
            <ul class="nav">
                <li class="nav-item nav-category"><span class="nav-link">Navigation</span></li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="../index.html">
                        <span class="menu-icon"><i class="mdi mdi-speedometer"></i></span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="#">
                        <span class="menu-icon"><i class="mdi mdi-table-large"></i></span>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid page-body-wrapper">
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Search users">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
            
                <form method="POST" action="../../../app/Http/Controllers/user/user_edit_controller.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

    <label>Password:</label>
    <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>" required><br><br>

    <button type="submit" name="update" value="1">Update</button>
</form>

                </div>
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>

</body>
</html>











