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
		global $conn;
		$output ='';
		$year = mysqli_real_escape_string($conn, $_POST["year"]);
		$branch =mysqli_real_escape_string($conn, $_POST["branch"]);
		$getattendacestatusquery ="SELECT * FROM attendance
									WHERE year='$year' AND branch ='$branch'";
		if(mysqli_query($conn,$getattendacestatusquery)){
			if($conn->connect_error){
				echo "Error";
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$getattendacestatusquery));
				if($count_if_exsist>0){
					$output .='<h4 class="text-center modalheading">'.$branch.'&nbsp;'.$year.'&nbsp;Year Attendance Status</h4>
								<table class="table table-hover table-border text-center">
									<thead class="tablehead">
										<tr>
											<td>Roll No</td>
											<td>Subject</td>
											<td>Attendance</td>
											<td>Total Lecture</td>
										</tr>
									</thead>
									<tbody>';
					$result=mysqli_query($conn,$getattendacestatusquery);
					while ($row =mysqli_fetch_array($result)) {
						$output .='		<tr>
											<td>'.$row["studentrollno"].'</td>
											<td>'.$row["subjectcode"].'</td>
											<td>'.$row["attendance"].'</td>
											<td>'.$row["date"].'</td>
										</tr>';
					}
					$output .='		</tbody>
								</table>';
				}else{
					$output .='<h4 class="modalheading">Please try again later</h4>';
				}
			}
		}
		echo $output;
	}

	function showmarks(){
		global $conn;
		$output ='';
		$year = mysqli_real_escape_string($conn, $_POST["year"]);
		$branch =mysqli_real_escape_string($conn, $_POST["branch"]);
		$getmarksquery ="SELECT * FROM marks
									WHERE branch='$branch' AND year='$year'
									ORDER BY studentrollno ASC";
		// die($getmarksquery);
		if(mysqli_query($conn,$getmarksquery)){
			if($conn->connect_error){
				echo "Error";
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$getmarksquery));
				if($count_if_exsist>0){
					$output .='<h4 class="text-center modalheading">'.$branch.'&nbsp;'.$year.'&nbsp;Year Marks Status</h4>
								<input type="hidden" name="branchmarks" id="branchmarks" value="'.$branch.'">
								<input type="hidden" name="yearmarks" id="yearmarks" value="'.$year.'">
								<table class="table table-hover table-border text-center">
									<thead class="tablehead">
										<tr>
											<td>Roll No</td>
											<td>Subject</td>
											<td>CT 1</td>
											<td>CT 2</td>
											<td>Assignments</td>
										</tr>
									</thead>
									<tbody>
										<h5 class="text-warning text-center">
											Please select a subject
										</h5>
									</tbody>
								</table>';
				}else{
					$output .='<h4 class="modalheading">Please try again later</h4>';
				}
			}
		}
		echo $output;
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
									</form>
										<div class="row">
										';
						while ($row=mysqli_fetch_array($result)) 
						{			
							$output .=	'	<div class="form-check form-check-inline col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">
										  		<input class="form-check-input" type="checkbox" name="studentrollnumber" value="'.$row["rollno"].'">
												<label class="form-check-label" for="inlineCheckbox1">'.$row["nameofstudent"].'</label>
											</div>';
						}
						$output .='		</div>';
					}else{
						$output .='<p class="text-primary">Sorry No student details are available<p>';
					}
			}
		}
		echo $output;
	}

	function addmarks(){
		global $conn;
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
						$output .='<p class="text-warning">If marks not available please set to zero</p>
								   	<table class="table table-hover table-border text-center">
								   		<thead class="tablehead">
								   			<tr>
								   				<th>Name</th>
								   				<th>CT 1</th>
								   				<th>CT 2</th>
								   				<th>Assignment</th>
								   			</tr>
								   		</thead>
								   		<tbody>
								   		<input type="hidden" name="marksbranch" id="marksbranch" value="'.$branch.'">
								   		<input type="hidden" name="marksyear" id="marksyear" value="'.$year.'">';
						while ($row=mysqli_fetch_array($result)) 
						{
						$output .='			<tr>
												<td>'.$row["nameofstudent"].'</td>
												<input type="hidden" name="rollno" value="'.$row["rollno"].'">
												<td><input type="number" class="form-control" name="ctonemarks" max="30" min="0" value="0"></td>
												<td><input type="number" class="form-control" name="cttwomarks" max="30" min="0" value="0"></td>
												<td><input type="number" class="form-control" name="assignmarks" max="10" min="0" value="0"></td>
											</tr>';
						}
						$output .='		</tbody>
									</table>';
					}else{
						$output .='<p class="text-primary">Sorry No student details are available<p>';
					}
			}
		}
		echo $output;	
	}

	function saveattendance(){
		global $conn;
		$subject = mysqli_real_escape_string($conn, $_POST["subjectcodeattendance"]);
		$year = mysqli_real_escape_string($conn, $_POST["yearattendance"]);
		$sem = mysqli_real_escape_string($conn, $_POST["semattendance"]);
		$branch = mysqli_real_escape_string($conn, $_POST["branchattendance"]);
		$date = mysqli_real_escape_string($conn, $_POST["dateattendance"]);
		// $rollno = mysqli_real_escape_string($conn, $_POST["rollno"]);
		$fetchstudentquery = "SELECT * FROM studentdetails
								WHERE studentbranch='$branch' AND studentyear='$year'";
		if (mysqli_query($conn, $fetchstudentquery)) {
			if ($conn->connect_error) {
				echo "Connection Error : ". $conn->connect_error;
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$fetchstudentquery));
					if($count_if_exsist>0){
						$result=mysqli_query($conn,$fetchstudentquery);
						while ($row= mysqli_fetch_array($result)) 
						{
							foreach ($_POST["rollno"] as $rollno) {
								if ($row["rollno"]==$rollno) {
									$presentquery ="INSERT INTO attendance(date, subjectcode, studentrollno, attendance, year, sem, branch)
													VALUES ('$date','$subject','$rollno','P','$year','$sem','$branch')";
									if(mysqli_query($conn, $presentquery)){
										if ($conn->connect_error) {
											echo "Connection Error : ". $conn->connect_error;
										}
									}
								}
							}
							foreach ($_POST["absent"] as $absent) {
								if ($row["rollno"]==$absent) {
									$absentquery ="INSERT INTO attendance(date, subjectcode, studentrollno, attendance, year, sem, branch)
													VALUES ('$date','$subject','$absent','A','$year','$sem','$branch')";
									if(mysqli_query($conn, $absentquery)){
										if ($conn->connect_error) {
											echo "Connection Error : ". $conn->connect_error;
										}
									}
								}
							}
						}
					}else{
						echo "Something Went wrong try again later";
					}
			}
		}
	}

	function savemarks(){
		global $conn;
		$i=0;
		$roll=array();
		$ctone=array();
		$cttwo=array();
		$assign =array();
		$subject =mysqli_real_escape_string($conn,$_POST["subject"]);
		$year =mysqli_real_escape_string($conn,$_POST["year"]);
		$branch = mysqli_real_escape_string($conn, $_POST["branch"]);
		foreach ($_POST["rollno"] as $rollno) {
			$i=$i+1;
			$roll[]=$rollno;
		}
		foreach ($_POST["ctonemarks"] as $ctonemarks) {
			$ctone[]=$ctonemarks;
		}
		foreach ($_POST["cttwomarks"] as $cttwomarks) {
			$cttwo[]=$cttwomarks;
		}
		foreach ($_POST["assignmarks"] as $assignmarks) {
			$assign[]=$assignmarks;
		}
		for ($j=0; $j <$i ; $j++) { 
			$savemarksquery = "INSERT INTO marks(subject, studentrollno, firstsessional, secondsessional,assignment,attendance,year,branch)
								VALUES ('$subject','$roll[$j]','$ctone[$j]','$cttwo[$j]','$assign[$j]','0','$year','$branch')";
			if (mysqli_query($conn, $savemarksquery)) {
				if ($conn->connect_error) {
					echo "Connection Error : ". $conn->connect_error;
				}
			}
		}
	}

	function getsubjects(){
		global $conn;
		$output ='';
		$branch =mysqli_real_escape_string($conn, $_POST["branch"]);
		$year = mysqli_real_escape_string($conn, $_POST["year"]);
		$getsubjectquery ="SELECT * FROM subjects
							WHERE branch='$branch' AND year='$year'";
		if(mysqli_query($conn, $getsubjectquery)){
			if($conn->connect_error){
				echo $conn->connect_error;
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$getsubjectquery));
				if($count_if_exsist>0)
				{
					$output .='<option value="default" selected>Select Subject</option>';
					$result=mysqli_query($conn,$getsubjectquery);
					while ($row=mysqli_fetch_array($result)) 
					{
						$output .='<option value="'.$row["subjectode"].'">'.$row["subjectode"].'</option>';
					}
				}else{
					$output .='<option>Something went wrong</option>';
				} 	
			}
		}
		echo $output;
	}

	function showparticularmarks(){
		global $conn;
		$output ='';
		$year = mysqli_real_escape_string($conn, $_POST["year"]);
		$branch =mysqli_real_escape_string($conn, $_POST["branch"]);
		$subject =mysqli_real_escape_string($conn, $_POST["subject"]);
		$marksfilterquery ="SELECT * FROM marks
							WHERE branch='$branch' AND year='$year' AND subject='$subject'
							ORDER BY studentrollno ASC";
		// die($marksfilterquery);
		$output .='	<input type="hidden" name="branchmarks" id="branchmarks" value="'.$branch.'">
					<input type="hidden" name="yearmarks" id="yearmarks" value="'.$year.'">';
		if(mysqli_query($conn,$marksfilterquery)){
			if($conn->connect_error){
				echo "Error";
			}else{
				$count_if_exsist=mysqli_num_rows(mysqli_query($conn,$marksfilterquery));
				if($count_if_exsist>0){
					$output .='<h4 class="text-center modalheading">'.$branch.'&nbsp;'.$year.'&nbsp;Year Marks Status</h4>
								<table class="table table-hover table-border text-center">
									<thead class="tablehead">
										<tr>
											<td>Roll No</td>
											<td>Subject</td>
											<td>CT 1</td>
											<td>CT 2</td>
											<td>Assignments</td>
										</tr>
									</thead>
									<tbody>';
					$result=mysqli_query($conn,$marksfilterquery);
					while ($row =mysqli_fetch_array($result)) {
						$output .='		<tr>
											<td>'.$row["studentrollno"].'</td>
											<td>'.$row["subject"].'</td>
											<td>'.$row["firstsessional"].'</td>
											<td>'.$row["secondsessional"].'</td>
											<td>'.$row["assignment"].'</td>
										</tr>';
					}
					$output .='		</tbody>
								</table>';
				}else{
					$output .='
					<h4 class="modalheading">Oops!! Its looks like you choosed wrong subject</h4>';
				}
			}
		}
		echo $output;
	}

?>