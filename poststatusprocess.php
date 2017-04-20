<!DOCTYPE html>
<html>

<head>
	<title>Status Posted.</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
	<style>
		th {
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" style="text-align:center;">
<?php
    require_once("../../settings.php");
    $db = new mysqli($host, $user, $pswd, $dbnm);
    if ($db ->connect_errno > 0) {
        die('Unable to connect to db :'. $db->connect_error .'.');
    }
    if ($db->query("CREATE TABLE IF NOT EXISTS status(statusCode varchar(10),status varchar(40),date DATE,share int,likep BIT(1),commentp BIT(1), sharep BIT(1),PRIMARY KEY (statusCode))")) {
    }
    if (strcmp($_POST[ 'share' ], "public") == 0) {
        $share = 0;
    } elseif (strcmp($_POST[ 'share' ], "friends") == 0) {
        $share = 1;
    } elseif (strcmp($_POST[ 'share' ], "onlyme") == 0) {
        $share = 2;
    }
    $sql = "INSERT INTO status(statusCode, status, date, share";
    list($dd, $mm, $yy) = explode('/', $_POST['date']);
    $sqll = ") VALUES ('". $_POST['statusCode' ]."','". $_POST[ 'status' ]."','".date("Y-m-d", strtotime($mm.'/'.$dd.'/20'.$yy)) ."',".$share."";
    if (!empty($_POST[ 'permission' ])) {
        if (in_array("like", $_POST[ 'permission'])) {
            $sql = $sql . ", likep";
            $sqll = $sqll . ", 1";
        } else {
            $sql = $sql . ", likep";
            $sqll = $sqll . ", 0";
        }
        if (in_array("comment", $_POST[ 'permission' ])) {
            $sql = $sql . ", commentp";
            $sqll = $sqll . ", 1";
        } else {
            $sql = $sql . ", commentp";
            $sqll = $sqll . ", 0";
        }
        if (in_array("share", $_POST[ 'permission' ])) {
            $sql = $sql . ", sharep";
            $sqll = $sqll . ", 1";
        } else {
            $sql = $sql . ", sharep";
            $sqll = $sqll . ", 0";
        }
    }
    $sql = $sql . $sqll . ");";
    foreach ($_POST[ 'permission' ] as &$value) {
        $value = ucfirst($value);
    }
    if ($result = $db->query($sql)) {
        echo $dd.'/'.$mm.'/20'.$yy.'<br>';
        echo $sql;

        echo "<h3>New Status</h3><table class=\"table\"><tr style=\"text-align: center\"><th>Status Code</th><th>Status</th><th>Date</th><th>Privacy</th><th>Permissions</th></tr><tr><td> ". $_POST['statusCode']."</td><td>".$_POST[ 'status' ]."</td><td>".$_POST[ 'date' ]."</td><td>".ucfirst($_POST[ 'share' ])."</td><td>".implode(" ", $_POST[ 'permission' ])."</td></tr></table>";
    } else {
        header("Location: poststatusform.php?err=1");
        echo "Error ".$db->error;
        echo "".$sql;
    }
    $db->close();
?>
		</div>
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
