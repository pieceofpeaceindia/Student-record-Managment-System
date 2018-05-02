<?php
	session_start();
	require 'functions.php';
	if(isset($_POST["action"]))
	{
		switch ($_POST["action"]) {
			case 'facultylogin':
				loginfaculty();
				break;
			case 'adminlogin':
				loginadmin();
				break;
			case 'selectinput':
				changeselectinput();
				break;
			case 'addstudent' :
				addstudent();
				break;
			case 'addfaculty' :
				addfaculty();
				checkpass();
				break;
			case 'feedback' :
				storefeedback();
				break;
			case 'showmsgs' :
				showfeedbacks();
				break;
			case 'showattendance':
				showattendanceoverall();
				break;
			case 'showmarks':
				showmarks();
				break;
			case 'attendance':
				getstudents();
				break;
			case 'addmarks':
				addmarks();
				break;
			case 'saveattendance':
				saveattendance();
				break;
			case 'savemarks':
				savemarks();
				break;
			case 'getsubjects':
				getsubjects();
				break;
			case 'showthismuch':
				showparticularmarks();
				break;
			case "thissubject":
				showattendance();
				break;
			default:
				echo "<p class='alert alert-danger'>Something went wrong</p>";
				break;
		}
	}else{
		echo "no action found";
	}
?>