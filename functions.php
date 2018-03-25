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

?>