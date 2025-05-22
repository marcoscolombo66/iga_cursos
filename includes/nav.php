 
<?php  
   
require_once ('../Mobile_Detect.php');  
$detect = new Mobile_Detect();
if ($detect->isMobile()) { 
echo "<style>
.dropdown-menu {min-width: 20rem;}
.opciones_user {font-size: 22px;}
.avatar {width: 40px;height: 40px;font-size: 22px;}
.menu_btnlogin{font-size: 22px;}
.nav-link{font-size: 22px;} 
</style>";

include_once('includes/nav_movil.php');
}
else{include_once('includes/nav_pc.php');}

/*if ($detect->isTablet()) {
	//echo "<script>alert('tablet');</script>";
// Si es un tablet
}
if ($detect->isAndroidOS()) {
// Si es Android
//echo "<script>alert('android');</script>";
}
if ($detect->isiOS()){
	//echo "<script>alert('iOS');</script>";
 //Si es iOS
}*/
?>



