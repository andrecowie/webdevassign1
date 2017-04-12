<!DOCTYPE html>
<html>

<head>
	<title>Status Posting System</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
			<h1>Status Posting System</h1>
			<form action="./poststatusprocess.php" method="post">
				<div class="form-group">
					<label for="statusCode">Status Code (Required):</label>
					<input class="form-control" type="text" pattern="S{1}\d{4}" required name="statusCode" id="statusCode" />
				</div>
				<div class="form-group">
					<label for="status">Status (Required):</label>
					<input class="form-control" type="text" pattern="([a-zA-Z0-9]| |,|.|!|?)+" required name="status" id="status" />
				</div>
				<div class="form-group">
					<label for="radiodiv">Privacy</label>
					<div class="radio" id="radiodiv">
						<label><input type="radio" name="share" checked value="public" id="public">Public</label>
						<label><input type="radio" name="share" value="friends" id="friends">Friends</label>
						<label><input type="radio" name="share" value="onlyme" id="onlyme">Only Me</label>
					</div>
				</div>
				<div class="form-group">
					<label for="date">Date: </label>
					<?php
		date_default_timezone_set( 'Pacific/Auckland' );
		echo "<input class=\"form-control\" type=\"text\" pattern=\"(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{2}\" name=\"date\" id=\"date\" value=\"". date('d/m/y') ."\"></input>"
	?>
				</div>
				<div class="form-group">
					<label for="permission">Permissions Type: </label>
					<div class="checkbox">
						<label><input type="checkbox" id="permission" name="permission[]" value="like" >Like</label>
						<label><input type="checkbox" id="permission" name="permission[]" value="comment" >Comment</label>
						<label><input type="checkbox" id="permission" name="permission[]" value="share" >Share</label>
					</div>
				</div>
				<button class="btn btn-default" type="submit">Submit</button>
				<input class="btn btn-warning" onClick="window.location.reload()" type="reset"></input>
			</form>
			<?php
$error_id = isset( $_GET[ 'err' ]) ? (int)$_GET['err'] : 0;
if ($error_id == 1)
{
	echo "<p style=\"color: red;\" >It seems that status code is already in use try another!</p>";
}else
{

}

?>
				<a href="./index.php">Return to HomePage</a>
		</div>
	</div>
</body>

</html>
