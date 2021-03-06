<?php
session_start();
if(!isset($_SESSION["id"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Record Managment</title>
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
<body style="background-color:aliceblue;">
	<header class="fixed-top">
		<nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
  			<a class="navbar-brand" href="#" style="font-family: 'Itim', cursive; font-weight: bold; font-size: 18px;">Student Record Management System</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>
		  	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			    <ul class="nav justify-content-end" style="padding-right: 100px;font-family: 'Itim', cursive; font-size: 20px;">
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#facultypage" style="color: #fff;" data-toggle="modal">Edit<span class="sr-only">(current)</span></a>
			      	</li>
			      	<li class="nav-item">
			       		<a class="nav-link" href="logout.php" style="color: #fff;">Logout</a>
			      	</li>
			    </ul>
		  </div>
		</nav>		
	</header>
	<div class="admin_main_div">
		<div class="row" id="admindiv">
			<div class="col-xl-12 col-lg-12col-md-12 col-sm-12 col-12" id="firstdiv">
				<h3 style="padding-top: 40px; font-family: 'Nunito', cursive; font-weight:bolder;">Greetings for the day! <br><?php echo $_SESSION["name"];?></h3>
				<span class="sectiondivider"></span>
				<div class="row facultypage container">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<p style="font-size: 50px;"><i class="fa fa-graduation-cap float-right"></i></p>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
						<h5>Hello <?php echo $_SESSION["name"];?>, here you can mark the attendance and add marks of the student by selecting branch, year and respective button.</h5>
					</div>
				</div>
				<div id="facultypagediv" class="container col-lg-8">
					<center><br>
					<div id="attendanceerror">
						
					</div>
			      	<form id="facultypageform">
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
			      			<select class="custom-select" name="attendanceyear" id="attendanceyear">
							  	<option value="default" selected>Select Year</option>
							  	<option value="First">First</option>
							  	<option value="Second">Second</option>
							  	<option value="Third">Third</option>
							  	<option value="Fourth">Fourth</option>
							</select>
			      		</div>
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
			      			<select class="custom-select" name="attendancesem" id="attendancesem">
			      				<option value="default" selected>Select Semester</option>
			      				<option value="First">First</option>
			      				<option value="Second">Second</option>
			      				<option value="Third">Third</option>
			      				<option value="Fourth">Fourth</option>
			      				<option value="Fifth">Fifth</option>
			      				<option value="Sixth">Sixth</option>
			      				<option value="Seventh">Seventh</option>
			      				<option value="Eighth">Eighth</option>
			      			</select>
			      		</div>
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
			      			<select class="custom-select" name="attendancebranch" id="attendancebranch">
							  	<option value="default" selected>Select Branch</option>
							  	<option value="CSE">CSE</option>
							  	<option value="ECE">ECE</option>
							  	<option value="EE">EE</option>
							  	<option value="ME">ME</option>
							  	<option value="Civil">Civil</option>
							</select>
			      		</div>
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12" id="subject_select">
			      			<select class="custom-select" name="attendancesubject" id="attendancesubject">
			      				<option value="default" selected>Subject</option>
			      			</select>
			      		</div>
			      		<input type="hidden" name="dateofattendance" id="dateofattendance" value="<?php echo date('y-m-d');?>">
			      	</form>
			      	<button type="submit" title="Mark Attendance" id="attendancebutton" name="attendancebutton">Mark Attendance</button>&nbsp;&nbsp;
			      	<button type="submit" title="Add Marks" id="addmarksbutton" name="addmarksbutton">Add Marks</button>
			      	</center>
			      	<br>
			    </div>
			    <div class="container lastdiv">
			    	<div class="row" style="font-family: 'Nunito', cursive; font-size: 25px;">
			    		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 float-right">
			    			<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php date_default_timezone_set('Asia/Calcutta'); echo date("l").",&nbsp;"; echo date("Y-m-d"); ?></p>
			    		</div>
			    		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 float-left">
			    			<p><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php 
			    			date_default_timezone_set('Asia/Calcutta');
							 echo date("h:i:sa"); ?></p>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
	<footer id="footer_faculty">
		<div class="site_footer">
			<center>
				<p class="copyrighttext" style="padding-bottom: 20px;margin-bottom: 0px;">
					&copy; THDC IHET || <?php echo date('Y');?> || <a href="#developermodal" data-toggle="modal">Team</a>
				</p>
			</center>
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
<div class="modal fade" id="facultypage" tabindex="-1" role="dialog" aria-labelledby="facultypageTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="facultypagemodaltitle">Manage Account</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body">
      			<div class="row">
      				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
      					<p class="modal-title" style="color: teal; font-size: 20px;">Change Password</p>
      					<div id="facultychangepassmsg">
      						
      					</div>
		        		<form id="changefacultypassform">
		        			<input type="hidden" name="facultyid" id="facultyid" value="<?php echo $_SESSION["id"]?>">
		        			<div class="form-group">
		        				<input class="form-control" type="password" name="facultypreviouspass" id="facultypreviouspass" placeholder="Old Password" required>
		        			</div>
		        			<div class="form-group">
		        				<input class="form-control" type="password" name="facultynewpass" id="facultynewpass" placeholder="New Password" required>
		        			</div>
		        			<button type="button" class="btn btn-sm" id="changefacultypass">Change password</button>
		        		</form>
		        		<br><br>
      				</div>
	        		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	        			<p class="modal-title" style="color: teal; font-size: 20px;">Add a trusted device</p>
      					<br>
      					<div id="lastlogin">
      						<input class="form-control" type="text" name="trusteddevice" id="trusteddevice" placeholder="Add device Mac Address like 28-F1-0E-3F-7C-80" required>
      					</div>
      					<p style="color: teal; font-size: 15px;">
      						You can add only one device, if you change the device it will overwrite the previous one.
      					</p>
      					<button type="button" class="btn btn-sm" name="updatedevice" id="updatedevice">Add Device</button>
	        		</div>
      			</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-success dismissbtn" data-dismiss="modal">Close</button>
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
        		<button type="button" class="btn btn-success dismissbtn" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="markattendancemodal" tabindex="-1" role="dialog" aria-labelledby="markattendanceTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="markattendancemodaltitle"></h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body" id="attendancediv">
      			<div id="getstudentsrollno">
      				
      			</div>
      		</div>
      		<div class="modal-footer modalstyle" id="attendancemodalfooter">
        		<button type="button" class="btn btn-secondary" id="saveattendance" name="saveattendance">Submit</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="addmarksmodal" tabindex="-1" role="dialog" aria-labelledby="addmarksTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="addmarksmodaltitle">Marks Panel</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body">
      			<div id="addmarksdiv">
      				
      			</div>
      		</div>
      		<div class="modal-footer modalstyle" id="submitmarksmodalfooter">
        		<button type="button" class="btn btn-success dismissbtn" id="savemarks" value="">Save Marks</button>
      		</div>
    	</div>
  	</div>
</div>
</html>