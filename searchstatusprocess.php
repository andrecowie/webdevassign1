<!DOCTYPE html>
<html>

<head>
	<title>Status Search.</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<?php

	date_default_timezone_set( 'Pacific/Auckland' );
	#require_once ("../../settings.php");
	#$db = new mysqli($host, $user, $pswd, $dbnm);
	$db = new mysqli('localhost', 'root', 'onetwo21', 'jpd3201');
	if($db ->connect_errno > 0 ){
		die('Unable to connect to db :'. $db->connect_error .'.' );
	}
	$sql = "SELECT * from status where status LIKE '%".$_POST[ 'search' ]."%'";

	if( $result = $db->query($sql))
	{
		echo "<table class=\"table\"><tr><th>Code</th><th>Status</th><th>Share</th><th>Date</th><th>Permissions</th></tr>";
		while( $row = $result->fetch_assoc())
		{
			echo "<tr><td>".$row[ 'statusCode' ]."</td>";
			echo "<td>".$row[ 'status' ]."</td>";
			if( $row[ 'share' ] == 0 ){
				echo "<td>Public</td>";
			}else if( $row[ 'share' ] == 1 ){
				echo "<td>Friends</td>";
			}else{
				echo "<td>Only Me</td>";
			}
			echo "<td>".date("F j, Y", strtotime($row[ 'date' ]))."</td>";
			$permissions = "<td>";
			$anypermissions = False;
			if( $row[ 'likep' ] == 1 ){
				$permissions = $permissions . "Like ";
				$anypermissions = True;
			}
			if( $row[ 'sharep' ] == 1 ){
				$permissions = $permissions . "Share ";
				$anypermissions = True;
			}
			if( $row[ 'commentp' ] == 1 ){
				$permissions = $permissions . "Comment ";
				$anypermissions = True;
			}
			if($anypermissions){
				$permissions = $permissions . " are Allowed.</td>";
			}else{
				$permissions = $permissions . "No Permissions</td>";
			}
			echo $permissions."</tr>";
		}
		echo "</table>";
	}
?>
			<div class="row">
				<div class="col-lg-3 col-lg-offset-1">
					<a href="./searchstatusform.php">Search for a Status</a>
				</div>
				<div class="col-lg-3 col-lg-offset-1">
					<a href="./poststatusform.php">Post Another Status</a>
				</div>
				<div class="col-lg-3 col-lg-offset-1">
					<a href="./index.php">Homepage</a>
				</div>
			</div>
	</div>
</body>

</html>
