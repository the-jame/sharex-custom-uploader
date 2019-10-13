<?php
$domainUrl = 'EXAMPLE.COM/';	//your domain
$fileDir = "S/";  		//directory for screenshots, here it's EXAMPLE.com/s/
$fileNameLength = 5;		// length of the file name when complete
$secretKey = "password"; 	//key
function RandomString($length) {
	$keys = array_merge(range(0,9), range('a', 'z'));
	$key = "";

	for ($i=0; $i < $length; $i++) {
	    $key .= $keys[mt_rand(0, count($keys) - 1)];
	}
	return $key;
}
if (isset($_POST['k'])) {
	if($_POST['k'] == $secretKey) {
		$filename = RandomString($fileNameLength);
		$target_file = $_FILES["d"]["name"];
		$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
		if (move_uploaded_file($_FILES["d"]["tmp_name"], $fileDir.$filename.'.'.$fileType)) {
		  echo $domainUrl.$fileDir.$filename.'.'.$fileType;
	} else {
		echo 'File upload failed';
		}
	} else {
		echo 'Invalid secret';
	}
	} else {
	echo 'No post data received';
}
