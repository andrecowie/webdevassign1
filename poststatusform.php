<!DOCTYPE html>
<html>
  <head>
    <title>Status Posting System</title>
  </head>
  <body>
    <h1>Status Posting System</h1>
    <form action="./poststatusprocess.php" method="post">
      <label for="statusCode">Status Code (Required):</label>
      <input type="text" pattern="S{1}\d{4}" required name="statusCode" id="statusCode" />
      <br />
      <label for="status">Status (Required):</label>
      <input type="text" pattern="([a-zA-Z0-9]| |,|.|!|?)+" required name="status" id="status" />
      <br />
      <label for="share">Share: </label>
      <input type="radio" name="share" checked value="public" id="public">Public
      <input type="radio" name="share" value="friends" id="friends">Friends
      <input type="radio" name="share" value="onlyme" id="onlyme">Only Me
      <br />
      <label for="date">Date: </label>
     <?php 
		date_default_timezone_set( 'Pacific/Auckland' );
		echo "<input type=\"text\" pattern=\"(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{2}\" name=\"date\" id=\"date\" value=\"". date('d/m/y') ."\"></input>"
	?>
      <br />
      <label for="permission">Permissions Type: </label>
      <input type="checkbox" id="permission" name="permission[]" value="like" >Like
      <input type="checkbox" id="permission" name="permission[]" value="comment" >Comment
      <input type="checkbox" id="permission" name="permission[]" value="share" >Share
      <br />
      <button type="submit">Submit</button>
      <button type="button">Reset</button>
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
  </body>
</html>
