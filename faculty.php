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
  			<a class="navbar-brand" href="#" style="font-family: 'Itim', cursive; font-weight: bold; font-size: 21px;">Student Record Managment System</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>
		  	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			    <ul class="nav justify-content-end" style="padding-right: 100px;font-family: 'Itim', cursive; font-size: 20px;">
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#facultylogin" style="color: #fff;" data-toggle="modal">Edit<span class="sr-only">(current)</span></a>
			      	</li>
			      	<li class="nav-item">
			       		<a class="nav-link" href="#adminlogin" style="color: #fff;" data-toggle="modal">Logout</a>
			      	</li>
			    </ul>
		  </div>
		</nav>		
	</header>
	<div class="admin_main_div">
		<div class="row" id="admindiv">
			<div class="col-xl-12 col-lg-12col-md-12 col-sm-12 col-12" id="firstdiv">
				<h3 style="padding-top: 40px; font-family: 'Nunito', cursive; font-weight:bolder;">Grretings for the day! <br>Mr. Purnendu</h3>
				<span class="sectiondivider"></span>
				<div class="row facultypage container">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
						<p style="font-size: 50px;"><i class="fa fa-graduation-cap float-right"></i></p>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
						<h5>Hello Mr. Purnendu, here you can mark the attendance and add marks of the student by selecting branch, year and respective button.</h5>
					</div>
				</div>
				<div id="facultypagediv" class="container col-lg-8">
					<center><br>
			      	<form id="facultypageform">
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
			      			<select class="custom-select" name="attendanceyear" id="attendanceyear">
							  	<option selected>Select Year</option>
							  	<option value="First">First</option>
							  	<option value="Second">Second</option>
							  	<option value="Third">Third</option>
							  	<option value="Fourth">Fourth</option>
							</select>
			      		</div>
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
			      			<select class="custom-select" name="attendancesem" id="attendancesem">
			      				<option selected>Select Semester</option>
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
							  	<option selected>Select Branch</option>
							  	<option value="CSE">CSE</option>
							  	<option value="ECE">ECE</option>
							  	<option value="EE">EE</option>
							  	<option value="ME">ME</option>
							  	<option value="Civil">Civil</option>
							</select>
			      		</div>
			      		<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12" id="subject_select">
			      			<select class="custom-select" name="attendancesubject" id="attendancesubject">
			      				<option selected>Subject</option>
			      			</select>
			      		</div>
			      	</form>
			      	<button type="submit" title="Mark Attendance" id="attendancebutton" name="attendancebutton">Mark Attendance</button>&nbsp;&nbsp;
			      	<button type="submit" title="Add Marks" id="addmarksbutton" name="addmarksbutton">Add Marks</button>
			      	</center>
			      	<br>
			    </div>
			    <div class="container lastdiv">
			    	<div class="row" style="font-family: 'Nunito', cursive; font-size: 25px;">
			    		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 float-right">
			    			<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php echo date("l").",&nbsp;"; echo date("Y-m-d"); ?></p>
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
				<p class="copyrighttext" style="padding-bottom: 20px;">
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
        				<input class="form-control" type="text" name="faultyusername" id="faultyusername" placeholder="Your User Name">
        			</div>
        			<div class="form-group">
        				<input class="form-control" type="password" name="facultypassword" id="facultypassword" placeholder="Your Password">
        			</div>
        		</form>
        		<div id="facultyloginalert">
        			
        		</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="facultyloginbutton">Log In</button>
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
<div class="modal fade" id="attendancemodal" tabindex="-1" role="dialog" aria-labelledby="attedanceTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="attedancemodaltitle">Attendance Panel</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body" id="attendancediv">
      			<div class="form_div" id="attendanceformdiv">
      				<div class="row">
      					<center>
      					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		      				<form class="form-inline my-2 my-lg-0">
		      					<input class="form-control mr-sm-2" type="date" name="firstdate" id="firstdate" placeholder="Select First Date">
		      					<input class="form-control mr-sm-2" type="date" name="seconddate" id="seconddate" placeholder="Select Second Date">
		      					<button class="my-2 my-sm-0 btn-sm" type="submit" title="Date Filter" id="datefilterbutton" name="datefilterbutton">Date Filter
						      	</button>
		      				</form>      						
      					</div>
      					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		      				<form class="form-inline my-2 my-lg-0">
		      					<input class="form-control mr-sm-2" type="number" name="percent" id="percent" placeholder="Select Percentage Threshold" max="100" min="0">
		      					<button class="my-2 my-sm-2 btn-sm" type="submit" title="Percentage Filter" name="percentagefilterbutton" id="percentagefilterbutton">Percentage Filter</button>
		      				</form>      						
      					</div>
      					</center>
      				</div>
      			</div>
      			<div class="data_div" id="attendancedatadiv">

      			</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="printstatus">Print</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="marksmodal" tabindex="-1" role="dialog" aria-labelledby="marksTitle" aria-hidden="true" style="background: linear-gradient(45deg, #1de099, #1dc8cd);">
 	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
      		<div class="modal-header  modalstyle">
	        	<h5 class="modal-title" id="marksmodaltitle">Marks Panel</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          	<span aria-hidden="true">&times;</span>
	        	</button>
      		</div>
      		<div class="modal-body" id="marksdiv">
      			<h1>Marks Panel</h1>
      			<p>
      				Build responsive, mobile-first projects on the web with the world's most popular front-end component library.

					Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.
      			</p>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="printmarksstatus">Print</button>
      		</div>
    	</div>
  	</div>
</div>
</html>