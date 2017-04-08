<!DOCTYPE html>
<html>
  <head>
    <title>Status Search.</title>
  </head>
  <body>
<?php
	$db = new mysqli('localhost', 'root', 'onetwo21', 'jpd3201');
	if($db ->connect_errno > 0 ){
		die('Unable to connect to db :'. $db->connect_error .'.' );
	}
	$sql = "SELECT * from status where strcmp(status, '".$_POST[ 'search' ]."') = 0 ";
	
	if( $result = $db->query($sql))
	{
		while( $row = $result->fetch_assoc())
		{
			if( $row[ 'share' ] == 0 ){
				echo "<p>Status Code: ".$row[ 'statusCode' ]."</p>";
				echo "<p>Status: ".$row[ 'status' ]."</p>";
				echo "<p>Date: ".$row[ 'date' ]."</p>";
				if( $row[ 'likep' ] == 1 ){
					echo "<button type=\"button\">Like</button>";
				}
				if( $row[ 'sharep' ] == 1 ){
					echo "<button type=\"button\">Share</button>";
				}
				if( $row[ 'commentp' ] == 1 )
				{
					echo "<input type=\"text\" placeholder=\"comment\">";
				}
				echo "<br>";
			}else if( $row[ 'share' ] == 1 ){

			}else{
			
			}
		}
	
	}

?>
    <a href="./index.php">Homepage</a>
  </body>
</html>
