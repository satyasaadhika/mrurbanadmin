<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
  $service = new mysqli("mysql-32e81533-mrurbanadmin.g.aivencloud.com:23888", "avnadmin", "AVNS_InWrLeGIpjduQX8gNuB", "defaultdb");
  $service->set_charset("utf8mb4");

} catch(Exception $e) {
  error_log($e->getMessage());
  //Should be a message a typical user could understand
}
    
$set = $service->query("SELECT * FROM `tbl_setting`")->fetch_assoc();print_r($set);
// date_default_timezone_set($set['timezone']);
	
	
	if(isset($_SESSION['stype']))
	{
		if($_SESSION['stype'] == 'sowner')
		{
			$sdata = $service->query("SELECT * FROM `service_details` where email='".$_SESSION['servicename']."'")->fetch_assoc();
		}
	}
	// $main = $service->query("SELECT * FROM `tbl_validate`")->fetch_assoc();
?>
