<!DOCTYPE html>
<html>
  <head>
    <title>Status Search.</title>
  </head>
  <body>
<?php

	date_default_timezone_set( 'Pacific/Auckland' );
	$db = new mysqli('localhost', 'root', 'onetwo21', 'jpd3201');
	if($db ->connect_errno > 0 ){
		die('Unable to connect to db :'. $db->connect_error .'.' );
	}
	$sql = "SELECT * from status where status LIKE '%".$_POST[ 'search' ]."%'";
	
	if( $result = $db->query($sql))
	{
		while( $row = $result->fetch_assoc())
		{
			echo "<p>Status Code: ".$row[ 'statusCode' ]."</p>";
			echo "<p>Status: ".$row[ 'status' ]."</p>";
			if( $row[ 'share' ] == 0 ){
				echo "<p>Share: Public</p>";
			}else if( $row[ 'share' ] == 1 ){
				echo "<p>Share: Friends</p>";
			}else{	
				echo "<p>Share: Only Me</p>";
			}
			echo "<p>Date Posted: ".date("F j, Y", strtotime($row[ 'date' ]))."</p>";
			$permissions = "<p>Permission: ";
			if( $row[ 'likep' ] == 1 ){
				$permissions = $permissions . "Like ";
			}
			if( $row[ 'sharep' ] == 1 ){
				$permissions = $permissions . "Share ";
			}
			if( $row[ 'commentp' ] == 1 ){
				$permissions = $permissions . "Comment ";
			}
			$permissions = $permissions . " are Allowed.</p>";
			echo $permissions;
		}
	
	}
?>
<a href="./searchstatusform.php">Search for a Status</a>
<a href="./poststatusform.php">Post Another Status</a>
    <a href="./index.php">Homepage</a>
  </body>
</html>
