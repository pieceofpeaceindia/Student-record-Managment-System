<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "majorproject";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	}
	
	function changeselectinput(){
		global $conn;
		$output='';
		$branch= mysqli_real_escape_string($conn, $_POST["branch"]);
		$year= mysqli_real_escape_string($conn, $_POST["year"]);
		$sem = mysqli_real_escape_string($conn, $_POST["sem"]);
		$query ="SELECT * FROM subjects
				WHERE branch='$branch' AND year ='$year' AND semester='$sem'";
		// die($query);
		$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$query));
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}else{
				if($count_if_exsist>0)
				{
					$output .='<option value="default" selected>Select Subject</option>';
					$result=mysqli_query($conn,$query);
					while ($row=mysqli_fetch_array($result)) 
					{
						$output .='<option value="'.$row["subjectode"].'">'.$row["subjectode"].'</option>';
					}
				}else{
					$output .='<option>Something went wrong</option>';
				}
		}
		echo $output;
	}

	function addstudent(){
		global $conn;
		$output ='';
		$name =mysqli_real_escape_string($conn,$_POST["studentname"]);
		$year = mysqli_real_escape_string($conn, $_POST["studentyear"]);
		$branch = mysqli_real_escape_string($conn , $_POST["studentbranch"]);
		$rollno = mysqli_real_escape_string($conn, $_POST["studentrollno"]);
		$addstudentquery = "INSERT INTO studentdetails(rollno, nameofstudent, studentbranch, studentyear)
					VALUES('$rollno','$name','$branch','$year')";
		if (mysqli_query($conn,$addstudentquery)){
			$output .='<p class="text-success"><br>Student Details Added Successfully</p>';
		}else{
			// $output .='<p class="text-danger"><br>Something went wrong</p>';
			$output .= mysqli_error($conn);
		}
		echo $output;
	}

	function addfaculty(){
		global $conn;
		$output ='';
		$name =mysqli_real_escape_string($conn, $_POST["facultyname"]);
		$emailid = mysqli_real_escape_string($conn, $_POST["facultyemailid"]);
		$uid = mysqli_real_escape_string($conn, $_POST["facultyid"]);
		$pass = mysqli_real_escape_string($conn , $_POST["facultyassignpassword"]);
		$options = [
			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
		    'cost' => 12,
		];
		$hash = password_hash($pass, PASSWORD_BCRYPT, $options);
		$checkexistance ="SELECT * FROM facultydetails
						WHERE emailid='$emailid' OR username='$uid'";
		if (mysqli_query($conn,$checkexistance)){
			if ($conn->connect_error) 
			{
			    die("Connection failed: " . $conn->connect_error);
			}else{
					$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$checkexistance));
					if($count_if_exsist>0)
					{
						$output .='<p class="text-danger">The given details already exsist in database</p>';
					}else{
						$addfacultyquery ="INSERT INTO facultydetails(facultyname,username,facultypassword, emailid)
							VALUES ('$name','$uid','$hash','$emailid')";
							if (mysqli_query($conn,$addfacultyquery)){
								$output .='<p class="text-success"><br>Faculty Details Added Successfully</p>';
							}else{
								// $output .='<p class="text-danger"><br>Something went wrong</p>';
								$output .= mysqli_error($conn);
							}		
					}
			}
		}
		echo $output;
	}
	function checkpass(){
	// 	global $conn;
	// 	$output ='';
	// 	$name =mysqli_real_escape_string($conn, $_POST["facultyname"]);
	// 	$emailid = mysqli_real_escape_string($conn, $_POST["facultyemailid"]);
	// 	$uid = mysqli_real_escape_string($conn, $_POST["facultyid"]);
	// 	$pass = mysqli_real_escape_string($conn , $_POST["facultyassignpassword"]);
	// 	$options = [
	// 	    'cost' => 10,
	// 	];
	// 	$hash = password_hash($pass, PASSWORD_BCRYPT, $options);
	// 	// echo $hash;
	// 	$query = "SELECT * FROM facultydetails
	// 				WHERE emailid='$emailid'";
	// 	if (mysqli_query($conn,$query)) {
	// 		$result=mysqli_query($conn,$query);
	// 		$row=mysqli_fetch_array($result);
	// 		$strdpass = $row["facultypassword"];
	// 		// echo $strdpass;
	// 	}
	// 	if (password_verify($pass, $strdpass)) {
	// 		echo 'Password is valid!';
	// 	} else {
	// 		echo 'Invalid password.';
	// 	}
	}

	function storefeedback(){
		global	$conn;
		$name = mysqli_real_escape_string($conn, $_POST["feedname"]);
		$email = mysqli_real_escape_string($conn, $_POST["feedemail"]);
		$subject = mysqli_real_escape_string($conn, $_POST["feedsubject"]);
		$messege =mysqli_real_escape_string($conn, $_POST["feedbackmsg"]);
		// echo $name.', '.$email.', '.$subject.', '.$messege;
		$submitquery = "INSERT INTO feedback(name, email, subject, messege)
						VALUES ('$name', '$email', '$subject', '$messege')";
		if(mysqli_query($conn,$submitquery)){
			if ($conn->connect_error) {
				echo $conn->connect_error;
			}else{
				echo "Thank you for submitting your query you will be contacted soon";
			}
		}
	}

	function showfeedbacks(){
		global $conn;
		$output ='';
		$showfeed ="SELECT * FROM feedback
					ORDER BY id DESC";
		if(mysqli_query($conn, $showfeed)){
			if ($conn->connect_error) {
				$output .="Connection Error : ". $conn->connect_error;
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$showfeed));
					if($count_if_exsist>0){
						$result=mysqli_query($conn,$showfeed);
						$output .='<br>';
						while ($row=mysqli_fetch_array($result)) 
						{
							$output .='<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<p>Name :&nbsp;'.$row["name"].'</p>
											<p> Messege :&nbsp;'.$row["messege"].'</p>
											<button type="button" class="btn btn-sm reply" name="reply" value="'.$row["email"].'">Reply</button>
											<br>
											<hr>
									   </div>';
						}
					}else{
						$output .='<p class="text-primary">No feedback is available<p>';
					}
			}
		}
		echo $output;
	}

	function showattendance(){

	}

	function showmarks(){

	}

	function getstudents(){
		global $conn;
		$i ='1';
		$output ='';
		$year= mysqli_real_escape_string($conn, $_POST["attendanceyear"]);
		$branch =mysqli_real_escape_string($conn, $_POST["attendancebranch"]);
		$sem = mysqli_real_escape_string($conn, $_POST["attendancesem"]);
		$subject = mysqli_real_escape_string($conn, $_POST["attendancesubject"]);
		$date = mysqli_real_escape_string($conn, $_POST["dateofattendance"]);
		$getstudentsquery ="SELECT * FROM studentdetails
							WHERE studentbranch='$branch' AND studentyear='$year' 
							ORDER BY rollno ASC";
		// die($getstudentsquery);
		if(mysqli_query($conn, $getstudentsquery)){
			if ($conn->connect_error) {
				$output .="Connection Error : ". $conn->connect_error;
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$getstudentsquery));
					if($count_if_exsist>0){
						$result=mysqli_query($conn,$getstudentsquery);
						$output .='<br>';
						$output .='<form id="submitattendance" style="color:teal;">
										<input type="hidden" id="subjectcodeattendance" name="subjectcodeattendance" value="'.$subject.'">
										<input type="hidden" id="yearattendance" name="yearattendance" value="'.$year.'">
										<input type="hidden" id="semattendance" name="semattendance" value="'.$sem.'">
										<input type="hidden" id="branchattendance" name="branchattendance" value="'.$branch.'">
										<input type="hidden" id="dateattendance" name="dateattendance" value="'.$date.'">
										<div class="row">
										';
						while ($row=mysqli_fetch_array($result)) 
						{			
							$output .=	'	<div class="form-check form-check-inline col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
										  		<input class="form-check-input" type="checkbox" name="studentrollnumber" value="'.$row["rollno"].'">
												<label class="form-check-label" for="inlineCheckbox1">'.$row["nameofstudent"].'</label>
											</div>';
						}
						$output .='		</div>
									</form>';
					}else{
						$output .='<p class="text-primary">Sorry No student details are available<p>';
					}
			}
		}
		echo $output;
	}
?>