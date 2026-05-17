<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../resources/views/partials/_header.php");
include("../resources/views/partials/_sidebar.php");
include("../resources/views/partials/_main_panel_banner.php");
include("../resources/views/partials/_footer.php");

?> 

