<!DOCTYPE html>
<html>
  <head>
    <title>Status Posted.</title>
  </head>
  <body>
<?php
	$db = new mysqli('localhost', 'root', 'onetwo21', 'jpd3201');
	if($db ->connect_errno > 0 ){
		die('Unable to connect to db :'. $db->connect_error .'.' );
	}
	if ( strcmp( $_POST[ 'share' ], "public") == 0 )
	{	
		$sql = "INSERT INTO status(statusCode, status, date, share ) VALUES ('". $_POST['statusCode' ]."','". $_POST[ 'status' ]."','".date( "Y-m-d", strtotime( $_POST[ 'date' ])) ."', 0 );";
	}else if ( strcmp( $_POST[ 'share' ], "friends" ) == 0 )
	{
		$sql = "INSERT INTO status(statusCode, status, date, share ) VALUES ('". $_POST['statusCode' ]."','". $_POST[ 'status' ]."','".date( "Y-m-d", strtotime( $_POST[ 'date' ])) ."', 1 );";
	}else if ( strcmp( $_POST[ 'share' ], "onlyme" ) == 0)
	{
		$sql = "INSERT INTO status(statusCode, status, date, share ) VALUES ('". $_POST['statusCode' ]."','". $_POST[ 'status' ]."','".date( "Y-m-d", strtotime(  $_POST[ 'date' ])) ."', 2 );";
	}
	if( $result = $db->query($sql))
	{
		echo "<h3>New Status Stored.</h3><p>Status Code: ". $_POST['statusCode']."</p><p>Status: ".$_POST[ 'status' ].".<p>Date: ".$_POST[ 'date' ]."</p>";
		$result->close();
	}else
	{
		header("Location: poststatusform.php?err=1");
		echo "Error ".$db->error; 
	}
    ?>
    <a href="./index.php">Homepage</a>
  </body>
</html>
