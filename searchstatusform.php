<!DOCTYPE html>
<html>

<head>
	<title>Search for Status</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap.min.css">
</head>

<body>
	<div class="container-fluid">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3" style="text-align:center;">
			<h1>Status Posting System</h1>
			<form action='./searchstatusprocess.php' method='post'>
				<input class="form-control" type="text" id="search" name="Search Status'" placeholder="search" />
				<button type="submit">Search</button>
			</form>
			<div class="row">
				<div class="col-lg-3">
					<a href="./poststatusform.php">Post A Status</a>
				</div>
				<div class="col-lg-3 col-lg-offset-6">
					<a href="./index.php">Homepage</a>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
