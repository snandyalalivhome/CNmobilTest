<?php 

if(!isset($_SESSION)) 
{ 
        session_start(); 
} 

if (!isset($_SESSION['cauthToken']) ) {
  // $_SESSION['flash_error'] = "Please sign in";

    header("Location: login.php");
    exit; 
    
}
else 
{
  
    $username= $_SESSION['cusername'];
    $userid=$_SESSION['cuserid'];
    $profilepic=$_SESSION['profilepic'];
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1440)) 
    {   
        //1800 for 30 mins // 1440 for 24 mins
        // last activity was more than 24 minutes ago
        session_unset();     // unset $_SESSION variable 
        session_destroy();   // destroy session 
         header("Location: ../Views/login.php");
    }
    
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
	
  }
  ?>
<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>LivHOME - CareNetwork</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" />
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/global/plugins/typeahead/typeahead.css">
    <link href="../assets/admin/pages/css/profile.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="../assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css" />
    <link id="style_color" href="../assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css" />
    <link href="../assets/admin/layout2/css/custom.css" rel="stylesheet" type="text/css" />
    
    
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body class="page-boxed page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner container">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="../Config/routing.php?action=Landing">
                            <img alt="logo" class="logo-default" src=<?php echo $_SESSION['companyLogo']?>  />
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
	
		<!-- BEGIN PAGE TOP --> 
		<div class="page-top">  <!-- updated by GL on 04/21/2015. removed the class value of page-top. -->
			
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src=<?php echo $profilepic?>>
						<span class="username ">
						 <?php echo $username ?> </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
                                                            <a href=<?php echo '../Views/CompleteProfile.php?UserID='.urldecode($userid)?>>
								<i class="icon-user"></i> My Profile </a>
							</li>
<!--							<li>
								<a href="../Config/routing.php?action=SecurityQuestions">
								<i class="fa fa-lock"></i>Security Questions
								</a>
							</li>-->
							
							<li>
                                                            <a href="../config/routing.php?action=Logout">
								<i class="icon-key"></i> Log Out </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>


