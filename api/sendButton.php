<?php
// PHPReadBeans
require_once 'connection.php';

$button = $_POST["button"];
$uuid = $_POST["uuid"];
$image = $_POST["image"];

$loginAttempt = R::getAll( 'SELECT * FROM attempt
  Where attemptid = :uuid',
[':uuid' => $uuid  ]);

## $mysqlTime is the string you get back from sql database
function secDiffMySqlNow($mysqlTime) {

  $dbDT = new DateTime($mysqlTime);
	$dbTime = $dbDT->format("Y-m-d H:i:s");

	$now = new DateTime();
	$nowTime = $now->format('Y-m-d H:i:s');

	$diffSec = strtotime($nowTime) - strtotime($dbTime);
	return $diffSec;
}

function getCurrentTimeForSendToMySQL(){
	$now = new DateTime();
	$nowTime = $now->format('Y-m-d H:i:s');
	return $nowTime;
}


# Theres already an attempt
if ($loginAttempt != []){

	#Check the time difference of the first attempt
	# Must be within 2 minutes
	$dbTime  = $loginAttempt[0]['timefirstentered'];
	$dbId  = $loginAttempt[0]['id'];
	$dbImage  = $loginAttempt[0]['image'];
	$currentCode = $loginAttempt[0]['code'];

	$nowTime = getCurrentTimeForSendToMySQL();

	# If not within 2 minutes restart with this guid
 	if (secDiffMySqlNow($dbTime)/60 > 2){
		$update = R::load( 'attempt',$dbId);
		$currentCode = $button;
		$update['code'] = $currentCode;
		$update['timefirstentered'] = $nowTime;
		R::store( $update );
 	}
 	else{ # If within 2 minutes keep adding to the value and check if it matches a login
		$update = R::load( 'attempt',$dbId);
		$currentCode = $currentCode . $button;
		$update['code'] = $currentCode;
		R::store( $update );

 	}

}
else{ # Add an attempt to the database

	$nowTime = getCurrentTimeForSendToMySQL();
	$currentCode = $button;

	$firstSave = R::load( 'attempt');
	$firstSave->image = $image;
	$firstSave->code = $currentCode;
	$firstSave->timefirstentered = $nowTime;
	$firstSave->attemptid = $uuid;

	R::store( $firstSave );
}


## Check if the image/code match a login in the database
$loginAttempt = R::getAll( 'SELECT * FROM login
Where image = :image and code = :currentCode',
[':image' => $image, ':currentCode' => $currentCode  ]);


if ($loginAttempt != []){
	session_start();

	ini_set('session.cookie_httponly', 'On');
	ini_set('session.cookie_secure', 'On');
	ini_set('session.use_cookies', 'On');
	ini_set('session.use_only_cookies', 'On');
	$_SESSION["name"] = $loginAttempt[0]['user'];
	echo "refresh";
}
?>
