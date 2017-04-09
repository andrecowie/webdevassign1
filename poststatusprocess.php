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
	if($db->query("CREATE TABLE IF NOT EXISTS status(statusCode varchar(10),status varchar(40),data DATE,share int,likep BIT(1),commentp BIT(1), sharep BIT(1),PRIMARY KEY (statusCode))")){
	
	}
	if ( strcmp( $_POST[ 'share' ], "public") == 0 )
	{	
		$share = 0;
	}else if ( strcmp( $_POST[ 'share' ], "friends" ) == 0 )
	{
		$share = 1;
	}else if ( strcmp( $_POST[ 'share' ], "onlyme" ) == 0)
	{
		$share = 2;
	}
	$sql = "INSERT INTO status(statusCode, status, date, share"; 
	$sqll = ") VALUES ('". $_POST['statusCode' ]."','". $_POST[ 'status' ]."','".date( "Y-d-m", strtotime( $_POST[ 'date' ])) ."',".$share."";	
	if( !empty($_POST[ 'permission' ])){
		if (in_array("like", $_POST[ 'permission'])){
			$sql = $sql . ", likep";
			$sqll = $sqll . ", 1";
		}else{
			$sql = $sql . ", likep";
			$sqll = $sqll . ", 0";
		}
		if (in_array("comment", $_POST[ 'permission' ])){
			$sql = $sql . ", commentp";
			$sqll = $sqll . ", 1";
		}else{
			$sql = $sql . ", commentp";
			$sqll = $sqll . ", 0";
		}
		if (in_array("share", $_POST[ 'permission' ])){
			$sql = $sql . ", sharep";
			$sqll = $sqll . ", 1";
		}else{
		
			$sql = $sql . ", sharep";
			$sqll = $sqll . ", 0";
		}
		$sql = $sql . $sqll . ");";
	}
	if( $result = $db->query($sql))
	{
		echo "<h3>New Status Stored.</h3><p>Status Code: ". $_POST['statusCode']."</p><p>Status: ".$_POST[ 'status' ]."<p>Date: ".$_POST[ 'date' ]."</p><p>Privacy: ".$_POST[ 'share' ]."</p><p>Permissions: ".implode(" ", $_POST[ 'permission' ])."</p>";
	}else{
		header("Location: poststatusform.php?err=1");
		echo "Error ".$db->error; 
	}
	$db->close();
?>
<a href="./searchstatusform.php">Search for a Status</a>
<a href="./poststatusform.php">Post Another Status</a>
    <a href="./index.php">Homepage</a>
  </body>
</html>
