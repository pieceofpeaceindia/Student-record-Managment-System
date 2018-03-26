<?php
	require 'functions.php';
	if(isset($_POST["action"]))
	{
		switch ($_POST["action"]) {
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
			default:
				echo "<h3 class='alert alert-danger'>Something went wrong</h3>";
				break;
		}
	}else{
		echo "no action found";
	}
?>