<?php

if (session_status()!==PHP_SESSION_ACTIVE)
    session_start();

$host="localhost"; // Host name 
$username="user"; // Mysql username 
$password="secret"; // Mysql password 
$db_name="db"; // Database name 
//DEV VERSION:
//$db_name="didevweb_db3_dev"; // Database name  
//will also require update in ekdromesfunctions.php for "addToProtocol" code

// Connect to server and select databse.
try {
    $mySqlConnection = mysqli_connect("$host", "$username", "$password") or die("cannot connect to DB"); 
} catch (\Exception $e) {
    $host="mariadb";
    $mySqlConnection = mysqli_connect("$host", "$username", "$password") or die("cannot connect to DB"); 
}
mysqli_select_db($mySqlConnection, "$db_name") or die("cannot select DB");
mysqli_set_charset($mySqlConnection,'utf8');

if (isset($_SESSION['ekdromes_currentYear'])) $sx_etos=$_SESSION['ekdromes_currentYear'];
else {
	$sql = "select max(sxoliko_etos) from schoolyears";
	$resultCurrentYear = mysqli_query($mySqlConnection, $sql);
	$rowCurrentYear = mysqli_fetch_row($resultCurrentYear);
	$sx_etos=$rowCurrentYear[0];
	
	//override:
	$sx_etos = "2025_2026";
	$_SESSION['ekdromes_currentYear'] = $sx_etos;
	$_SESSION['ekdromes_actualCurrentYear'] = $sx_etos;
}

$pinakas_ekdromes= "ekdromes_ait$sx_etos";
$pinakas_sx = "sxoleia$sx_etos";

$base_url = "http://e-protocol/protocol"; // also requires "addNewProtocolEntryIN_ekdromes.php"
//FOR DEV VERSION:
//$base_url = "http://e-protocol/protocol_dev2";// also requires "addNewProtocolEntryIN_ekdromes.php"
