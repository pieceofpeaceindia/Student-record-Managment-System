<!DOCTYPE html>
<html>
<head>
	<title>Student Record Managment</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Farsan|Indie+Flower|Itim|Mina|Sacramento|Nunito" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:aliceblue;">
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
  			<a class="navbar-brand" href="#" style="font-family: 'Itim', cursive; font-weight: bold; font-size: 20px;">Student Record Management System</a>
		</nav>		
	</header>
	<div class="main_div">
		<div class="row">
			<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
				<p class="maintext">Welcome<br>to<br>&quot;Student Record Managment System&quot;</p>
			</div>
		</div>
		<div id="facultypagediv" class="container col-lg-8">

			<?php
				$output='';
				if(isset($_GET["passkey"]))
				{
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "majorproject";
					$receivedcode=$_GET['passkey'];
					$conn = new mysqli($servername, $username, $password, $dbname);
					$decryptcode=base64_decode($receivedcode);
					if ($conn->connect_error) 
					{
					    die("Connection failed: " . $conn->connect_error);
					}

					$checkadmin=" SELECT * FROM admincredentials
						   WHERE passkey='$decryptcode'";
					$checkfaculty=" SELECT * FROM facultydetails
						   WHERE passkey='$decryptcode'";
					$resultadmin=mysqli_query($conn,$checkadmin);
					$resultfaculty=mysqli_query($conn,$checkfaculty);
					$rowadmin = $resultadmin->fetch_assoc();
					$rowfaculty = $resultfaculty->fetch_assoc();
					$count_if_exsist_admin=mysqli_num_rows(mysqli_query($conn,$checkadmin));
					$count_if_exsist_faculty=mysqli_num_rows(mysqli_query($conn,$checkfaculty));
					if(($count_if_exsist_faculty>0)||($count_if_exsist_admin>0)){	
        	?>
			<center><br>
			<div class="">
	      			<p style="font-size: 18px; line-height: 18px; color: ghostwhite;">Please set new pass word here and remeber this one correctly!</p>
	      	</div>
			<div style="font-size: 18px; line-height: 18px; color: ghostwhite;" >
				<p id="recoverpageerror"></p>
			</div>
	      	<form id="changerecoverform">
	      	<?php
	      		if ($count_if_exsist_faculty > 0) {
	      	?>
	      		<input type="hidden" name="uservalue" id="uservalue" value="faculty">
	      	<?php		
	      		}
	      		if ($count_if_exsist_admin > 0) {
	      	?>	
	      		<input type="hidden" name="uservalue" id="uservalue" value="admin">
	      	<?php
	      		}
	      	?>
	      		<input type="hidden" name="recoverkey" id="recoverkey" value="<?php echo $decryptcode;?>">
	      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
	      			<input class="form-control" type="password" name="newpass" id="newpass" placeholder="Enter a new password" required>
	      		</div>
	      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
	      			<input class="form-control" type="password" name="confrmpass" id="confrmpass" placeholder="Confirm password" required>
	      		</div>
	      	</form>
	      	<button class="btn btn-sm dismissbtn" type="submit" title="Chnage Password" id="updatepass" name="updatepass">Change Password</button>&nbsp;&nbsp;
	      	<?php
	      		}else{
	      	?>
            	<center>
            		<br>
            		<h4 class="card-title text-danger">WARNING!</h4>
                    <h4 class="card-text text-danger">The token has been expired please go back to home and try again !<h4>
                </center>
	      	<?php
	      		}
	      	?>
	      	<a href="index.php"><button class="btn btn-sm dismissbtn" type="submit" title="Home">Back to home</button></a>
	      	</center>
	      	<br>
	      	<?php
	      		}else {
	      	?>
            	<center>
            		<br>
            		<h4 class="card-title text-danger">WARNING!</h4>
                    <p class="card-text text-danger">ONLY SPECIFIC USERS ARE AUTHORIZED TO THIS PAGE. THANK YOU<p>
                    <div class="card-block">
                        <a class="btn btn-success dismissbtn" href="http://localhost/majorproject/index.php">Get Back</a>
                    </div>
                    <br>
                </center>            
        	<?php
        		}
			?>
		</div>
	</div>
	<br>
	<footer id="footer_faculty">
		<div class="site_footer">
				<p class="copyrighttext text-center" style="padding-bottom: 10px; margin-bottom: 0px;">
					&copy; THDC IHET || <?php echo date('Y');?> || <a href="#developermodal" data-toggle="modal">Team</a>
				</p>
		</div>
	</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>



<!-- Modal -->
<div class="modal fade" id="facultylogin" tabindex="-1" role="dialog" aria-labelledby="facultyloginTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="Facultyloginmodaltitle">Faculty Login</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body">
        		<form id="facultyloginform">
        			<div class="form-group">
        				<input class="form-control" type="text" name="faultyusername" id="faultyusername" placeholder="Your User Name" required>
        			</div>
        			<div class="form-group">
        				<input class="form-control" type="password" name="facultypassword" id="facultypassword" placeholder="Your Password" required>
        			</div>
        		</form>
        		<div class="text-danger" id="facultyloginalert">
        			
        		</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="facultyloginbutton" href="faculty.php">Log In</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="adminlogin" tabindex="-1" role="dialog" aria-labelledby="adminloginTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header modalstyle">
	        	<h5 class="modal-title" id="adminloginmodaltitle">Admin Login</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body">
        		<form id="adminloginform">
        			<div class="form-group">
        				<input class="form-control" type="text" name="adminusername" id="adminusername" placeholder="Your User Name" required>
        			</div>
        			<div class="form-group">
        				<input class="form-control" type="password" name="adminpassword" id="adminpassword" placeholder="Your Password" required>
        			</div>
        		</form>
        		<div class="text-danger" id="adminloginalert">
        			
        		</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="adminloginbutton" href='admin.php'>Log In</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="developermodal" tabindex="-1" role="dialog" aria-labelledby="developermodalTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
      		<div class="modal-header modalstyle">
	        	<h5 class="modal-title" id="developermodaltitle">Developers</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body">
      			<div class="container-fluid">
	      			<div class="row">
	      				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	      				<center>
		      				<h3 style="padding-top: 40px; font-family: 'Indie Flower', cursive; font-weight:bolder;">Guide</h3>
							<span class="sectiondivider"></span>
							<img src="images/pspandey.jpg" class="img-thumbnail rounded-circle">
							<p class="foocolext">Mr. P. S. Pandey<br>Assitant Prof. ECE Dept.</p>
						</center>
						</div>
	      			</div>
	      			<center>
	      			<h3 style="padding-top: 40px; font-family: 'Indie Flower', cursive; font-weight:bolder;">Students</h3>
					<span class="sectiondivider"></span>
					</center>
	      			<div class="row">
	      				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	      					<center>
		      					<img src="images/ankuj.jpg" class="img-thumbnail rounded-circle">
								<p class="foocolext">Ankuj Bisht</p>
							</center>
	      				</div>
	      				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	      					<center>
		      					<img src="images/nidhi.jpeg" class="img-thumbnail rounded-circle">
								<p class="foocolext">Nidhi Gagat</p>
							</center>
	      				</div>
	      				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	      					<center>
		      					<img src="images/vkg.jpeg" class="img-thumbnail rounded-circle">
								<p class="foocolext">Vivek Kumar Gupta</p>
							</center>
	      				</div>
	      			</div>
      			</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>
</html>