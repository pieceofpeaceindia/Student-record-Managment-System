<?php
	session_start();
	if(isset($_SESSION["id"])||isset($_SESSION["admin"])){
		session_destroy();
		header("location:index.php");
	}else{
?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Wrong Path Entered</title>
			<meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="https://fonts.googleapis.com/css?family=Farsan|Indie+Flower|Itim|Mina|Sacramento|Nunito" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
			<link rel="stylesheet" type="text/css" href="style.css">
		</head>
		<body style="background: #1de099;">
			<div class="textcenter">
				<div>
					<h1>Error 404 !</h1>
				</div>
			</div>
		</body>
		</html>
<?php
	}
?>