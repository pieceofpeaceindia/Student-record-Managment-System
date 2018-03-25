<?php
	require 'functions.php';
	if(isset($_POST["action"]))
	{
		switch ($_POST["action"]) {
			case 'selectinput':
				changeselectinput();
				break;
			default:
				echo "<h3 class='alert alert-danger'>Something went wrong</h3>";
				break;
		}
	}else{
		echo "no action found";
	}
?>