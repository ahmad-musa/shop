<?php
     include '../lib/Session.php';
     Session::checkSession();
?>


<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/fontawesome.min.css">

    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->

    <!-- Font Awesome Icons -->

    <!-- <script src="assets/fontawesome/js/fontawesome.min.js"></script> -->

    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                <a href="dashboard.php"> <img class="logo" src="img/livelogo.png" alt="Logo"> </a> 
				</div>
				<div class="floatleft middle">
					<h1>Pushtalk</h1>
					<p>www.pushtalk.com</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <i class="fas fa-user-circle logo_icon"></i>
                        <!-- <img src="img/img-profile.jpg" alt="Profile Pic" /> -->
                    </div>

                <?php
                    if (isset($_GET['action']) && $_GET['action']=='logout') {
                        Session::destroy();
                    }
                
                ?>

                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo Session::get('adminName'); ?></li>
                            <li><a class="btn_logout" href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li ><a href="dashboard.php"> <i class="fas fa-chart-line"></i> <span>Dashboard</span></a> </li>
                <li ><a href=""> <i class="fas fa-user-cog"> </i> <span>User Profile</span></a></li>
				<li ><a href="changepassword.php"> <i class="fas fa-key"></i> <span>Change Password</span></a></li>
				<li ><a href="inbox.php"> <i class="fas fa-envelope"></i> <span>Inbox</span></a></li>
                <li ><a href=""> <i class="fas fa-globe"></i> <span>Visit Website</span></a></li>
            </ul>
            <!-- <ul class="nav main">
                <li class="ic-dashboard"><a href="dashboard.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
            </ul> -->
        </div>
        <div class="clear">
        </div>
    