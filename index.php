<!DOCTYPE html>
<html>
<head>
	<title>Student Record Managment </title>
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
  			<a class="navbar-brand" href="#" style="font-family: 'Itim', cursive; font-weight: bold; font-size: 20px;">Student Record Managment System</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>
		  	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			    <ul class="nav justify-content-end" style="padding-right: 100px;font-family: 'Itim', cursive; font-size: 20px;">
			      	<li class="nav-item active">
			        	<a class="nav-link" href="#facultylogin" style="color: #fff;" data-toggle="modal">Faculty Login<span class="sr-only">(current)</span></a>
			      	</li>
			      	<li class="nav-item">
			        	<!-- <a class="nav-link" href="#" style="color: #fff;">Link</a> -->
			      	</li>
			      	<li class="nav-item">
			       		<a class="nav-link" href="#adminlogin" style="color: #fff;" data-toggle="modal">Admin Login</a>
			      	</li>
			    </ul>
		  </div>
		</nav>		
	</header>
	<div class="main_div">
		<div class="row">
			<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12">
				<p class="maintext">Welcome<br>to<br>&quot;Student Record Managment System&quot;</p>
			</div>
		</div>
		<h3 style="padding-top: 40px; font-family: 'Indie Flower', cursive; font-weight:bolder;">About Project</h3>
		<span class="sectiondivider"></span>
		<div class="row">
			<p class="maindivtext">
				A portal which is connected through Raspberry Pi and touch screen LCD. Faculty can login to the system and mark attendance in lecture through touch input. As the system is hosted on a server faculty can access the portal to add marks of the student, check the attendance of the student and check the status of the student failing to full fill the attendance criteria time to time.
			</p>
		</div>
		<h3 style="padding-top: 50px; font-family: 'Indie Flower', cursive; font-weight:bolder;">Problem Statement</h3>
		<span class="sectiondivider"></span>
		<div class="row">
			<p class="maindivtext">
				Every Engineering college has numbers of student and managing their data i.e. marks and attendance involves paperwork and consumption of lots of paper, irrespective of paperwork there is also mental exercise for calculating attendance, setting threshold and finding student failing to fulfill the criteria.
			</p>
		</div>
		<h3 style="padding-top: 50px; font-family: 'Indie Flower', cursive; font-weight:bolder;">Requirements</h3>
		<span class="sectiondivider"></span>
		<div class="row">
			<p class="maindivtext">
				An online portal should be made, where admin can add student details, add marks and check attendance. The portal consists of modules for sending mail and printing the details. For marking attendance there will be Raspberry Pi based microcomputer in every classroom which will take input through touch LCD screen.
			</p>
		</div>
	</div>
	<footer class="sticky-bottom">
		<div class="site_footer">
			<div class="row footertext">
				<div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-6">
					<h4>Student Record Managment System</h4>
					<p class="foocoltext">
						Developed &amp; Designed by ECE Department.&nbsp;
						<span class="d-none d-lg-block">Major Project Batch 2014-18</span>
					</p>
				</div>
				<div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-6">
					<span class="foocolext">
						<i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;THDC IHET<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tehri Garhwal, Uttarakhand <br><br>
						<i class="far fa-envelope"></i>&nbsp;&nbsp;info@thdcihet.in<br><br>
						<i class="fas fa-phone"></i>&nbsp;&nbsp;(+91) 1376 246850
					</span>
				</div>
				<div class="col-lg-5 col-xl-5 col-md-12 col-sm-12 col-12">
					<form id="feedbackform">
						<div class="form-row">
							<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
								<input class="form-control" type="text" name="feedname" id="feedname" placeholder="Your Name" required>
							</div>
							<div class="form-group col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12">
								<input class="form-control" type="email" name="feedemail" id="feedeamil" placeholder="Your Email" required>
							</div>							
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="feedsubject" id="feedsubject" placeholder="Subject" required>	
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="2" placeholder="Message" id="feedbackmsg" name="feedbackmsg" required></textarea>
						</div>
					</form>
					<center>
						<button type="submit" title="Send Message" id="feedsubmit" name="feedsubmit">Send Message</button>
					</center>
				</div>
			</div>
			<hr>
			<center>
				<p class="copyrighttext">
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
        				<input class="form-control" type="text" name="adminusername" id="adminusername" placeholder="Your User Name">
        			</div>
        			<div class="form-group">
        				<input class="form-control" type="password" name="adminpassword" id="adminpassword" placeholder="Your Password">
        			</div>
        		</form>
        		<div id="adminloginalert">
        			
        		</div>
      		</div>
      		<div class="modal-footer modalstyle">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-success" id="adminloginbutton">Log In</button>
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