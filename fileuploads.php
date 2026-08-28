<?php
//----------------------------------------------------------------------
//	Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης
//----------------------------------------------------------------------
	session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] ||
	!isset($_SESSION["currentuser"]) || $_SESSION["currentuser"]==''
	) die(); 

if (!isset($_POST['idaitisis'])) die();

$ds = DIRECTORY_SEPARATOR;  
$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
// arxeia/2023_2024/9999999

if ( !file_exists( $storeFolder.$ds ) ) //create dir if it doesnt exist
{
	if (mkdir( $storeFolder.$ds, 0777, true)==FALSE) die();
}
 

/* 
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    move_uploaded_file($tempFile,$targetFile); //6
}
*/

const MAX_SIZE = 10 * 1024 * 1024; //  10MB

$allowed_mimetypes = array(
    'application/excel' ,
    'application/msexcel',                                                  
    'application/x-msexcel',                                                
    'application/x-ms-excel' ,                                              
    'application/x-excel'    ,                                              
    'application/x-dos_ms_excel',                                           
    'application/xls'            ,                                          
    'application/x-xls'           ,                                         
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'    ,
    'application/vnd.ms-excel',
	'application/msword' ,
	'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	'application/pdf',
	'text/plain'
);

$files = $_FILES['file'];
$file_count = count($files['name']);

// validation
$error = false;
for ($i = 0; $i < $file_count; $i++) {

    // get the uploaded file info
    $status = $files['error'][$i];
    $filename = $files['name'][$i];
    $tmp = $files['tmp_name'][$i];

    // an error occurs
    if ($status !== UPLOAD_ERR_OK) {
		$error=true;
        break;
    }
    // validate the file size
    $filesize = filesize($tmp);

    if ($filesize > MAX_SIZE) {
		$error=true;
        break;
    }

    // validate the file type
    if (!in_array(mime_content_type($tmp), $allowed_mimetypes)) {
        $error=true;
		break;
    }
}

if ($error) die();

// move the files
$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
for($i = 0; $i < $file_count; $i++)
{
    $filename = $files['name'][$i];
    $tempFile = $files['tmp_name'][$i];  
	$targetFile =  $targetPath. $_POST['idaitisis']. 'U_'. $filename; //add xxU_ to user uploaded files 

	move_uploaded_file($tempFile,$targetFile);
}

?>