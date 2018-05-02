$(document).ready(function(){
	console.log("no prblem in jquery");
	getfeedback();
	$('#addstudenterror').html('');
	$("#facultyloginbutton").click(function(){
		var facultyform =$("#facultyloginform");
		if(!facultyform[0].checkValidity()){
			facultyform[0].reportValidity();
			return;
		}
		var dataString = 'action=facultylogin&' + $("#facultyloginform").serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data : dataString,
			success : function(result){
				if (result=="success") {
					window.location.href="faculty.php";
				}else{
					$('#facultyloginalert').html(result);
					window.setTimeout(givedealy, 2000);
					function givedealy(){
						$('#facultyloginalert').html('');
					}
				}
				document.getElementById('facultyloginform').reset();
			}
		});			
	});

	$("#adminloginbutton").click(function(){
		var adminform =$("#adminloginform");
		if(!adminform[0].checkValidity()){
			adminform[0].reportValidity();
			return;
		}
		var dataString = 'action=adminlogin&' + $("#adminloginform").serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data : dataString,
			success : function(result){
				if (result=="success") {
					window.location.href="admin.php"
				}else{
					$('#adminloginalert').html(result);
					window.setTimeout(givedealy, 2000);
					function givedealy(){
						$('#adminloginalert').html('');
					}
				}
				document.getElementById('adminloginform').reset();
			}
		});			
	});

	$('#addstudentbutton').click(function(){
		$('#addstudenterror').html('');
		var studentname =$('#studentname').val();
		var studentyear =$('#studentyear').val();
		var studentbranch =$('#studentbranch').val();
		var studentrollno =$('#studentrollno').val();
		// console.log(studentname+studentyear+studentbranch+studentrollno);
		if(studentname =='' || studentyear =='default' || studentrollno =='' || studentbranch =='default'){
			$('#addstudenterror').html('<br><p class="text-danger">All fields are mandetory</p>');
			var studentform =$("#addstudentform");
			if(!studentform[0].checkValidity()){
				studentform[0].reportValidity();
				return;
			}
			window.setTimeout(givedealy, 2000);
			function givedealy(){
				$('#addstudenterror').html('');
			}
			return;
		}
		var studentform =$("#addstudentform");
		if(!studentform[0].checkValidity()){
			studentform[0].reportValidity();
			return;
		}
		var dataString = 'action=addstudent&' + $("#addstudentform").serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data: dataString,
			success:function(result){
				$('#addstudenterror').html(result);
				document.getElementById('addstudentform').reset();
				window.setTimeout(givedealy, 2000);
				function givedealy(){
					$('#addstudenterror').html('');
				}
			}
		});
	});

	$("#addfacultybutton").click(function(){
		$('#addfacultyerror').html('');
		var facultyname =$('#facultyname').val();
		var facultyemailid =$('#facultyemailid').val();
		var facultyid =$('#facultyid').val();
		var password =$('#facultyassignpassword').val();
		if (facultyname=='' || facultyemailid =='' || facultyid=='' || password =='') {
			$('#addfacultyerror').html('<br><p class="text-danger">All fields are mandetory</p>');
			var facultyform =$("#addfacultyform");
			if(!facultyform[0].checkValidity()){
				facultyform[0].reportValidity();
				return;
			}
			window.setTimeout(givedealy, 2000);
			function givedealy(){
				$('#addfacultyerror').html('');
			}	
			return;
		}
		var facultyform =$("#addfacultyform");
		if(!facultyform[0].checkValidity()){
			facultyform[0].reportValidity();
			return;
		}
		var dataString = 'action=addfaculty&' + $('#addfacultyform').serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data : dataString,
			success:function(result){
				// console.log(result);
				$('#addfacultyerror').html(result);
				document.getElementById('addfacultyform').reset();
				window.setTimeout(givedealy, 2000);
				function givedealy(){
					$('#addfacultyerror').html('');
				}
			}
		})
	});

	function printElement(elem) {
		var domClone = elem.cloneNode(true);

	    var $printSection = document.getElementById("printSection");

	    if (!$printSection) {
	        var $printSection = document.createElement("div");
	        $printSection.id = "printSection";
	        document.body.appendChild($printSection);
	    }

	    $printSection.innerHTML = "";
	    $printSection.appendChild(domClone);
	    window.print();
	}

	$("#attendanceyear").on("change",function(){
		var year =$("#attendanceyear").val();
		if(year =="First"){
			console.log("First year");
$("#attendancesem").html('<option value="default" selected>Select Semester</option><option value="First">First</option><option value="Second">Second</option>');
		}else{
			if(year =="Second"){
$("#attendancesem").html('<option value="default" selected>Select Semester</option><option value="Third">Third</option><option value="Fourth">Fourth</option>');
			}else{
				if(year =="Third"){
$("#attendancesem").html('<option value="default" selected>Select Semester</option><option value="Fifth">Fifth</option><option value="Sixth">Sixth</option>');
				}else{
					if(year =="Fourth"){
$("#attendancesem").html('<option value="default" selected>Select Semester</option><option value="Seventh">Seventh</option><option value="Eighth">Eighth</option>');
					}
				}				
			}
		}
	});


	$("#attendancebranch").on("change",function(){
		var branch = $("#attendancebranch").val();
		var year =$("#attendanceyear").val();
		var sem =$("#attendancesem").val();
		var dataString = 'action=selectinput&'+'year='+year+'&branch='+branch+'&sem='+sem;
		// console.log(dataString);
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data : dataString,
			success : function(result){
				// console.log(result);
				$("#attendancesubject").html(result);
			}
		});
	});

	$("#attendancebutton").click(function(){
		var year = $("#attendanceyear").val();
		var sem = $("#attendancesem").val();
		var branch =$("#attendancebranch").val();
		var subject =$("#attendancesubject").val();
		if (year == "default" || sem == "default" || branch =="default" || subject =="default") {
			$("#attendanceerror").html('<p class="text-danger">Select appropiate option</p>');
			window.setTimeout(givedealy,2000);
			function givedealy(){
				$("#attendanceerror").html('');
			}
			return;
		}
		$("#markattendancemodaltitle").html(branch+'&nbsp;&nbsp;'+year+'&nbsp; Year');
		var dataString = 'action=attendance&' + $("#facultypageform").serialize();
		// console.log(dataString);
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:dataString,
			success:function(result){
				$("#markattendancemodal").modal('show');
				$("#getstudentsrollno").html(result);
			}
		});
	});

	$("#addmarksbutton").click(function(){
		var year = $("#attendanceyear").val();
		var sem = $("#attendancesem").val();
		var branch =$("#attendancebranch").val();
		var subject =$("#attendancesubject").val();
		if (year == "default" || sem == "default" || branch =="default" || subject =="default") {
			$("#attendanceerror").html('<p class="text-danger">Select appropiate option</p>');
			window.setTimeout(givedealy,2000);
			function givedealy(){
				$("#attendanceerror").html('');
			}
			return;
		}
		$("#addmarksmodaltitle").html(branch+'&nbsp;&nbsp;'+year+'&nbsp;Year&nbsp;&nbsp;'+subject+'&nbsp;marks');
		var dataString = 'action=addmarks&' + $("#facultypageform").serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:dataString,
			success:function(result){
				$("#addmarksmodal").modal('show');
				$("#addmarksdiv").html(result);
				$("#savemarks").val(subject);
			}
		});
	});

	$('#viewattendancebutton').click(function(){
		var year = $('#recordyear').val();
		var branch =$("#recordbranch").val();
		if (year == 'default' || branch =='default') {
			$('#viewrecorderror').html('<br><p class="text-danger">Selcet appropiate option</p>');
			window.setTimeout(givedealy, 2000);
			function givedealy(){
				$('#viewrecorderror').html('');
			}
			return;
		}else{
			var action="getsubjects";
			$.ajax({
				type:"POST",
				url:"ajax.php",
				data:{action:action,year:year,branch:branch},
				success:function(result){
					$("#subselect").html(result);
				}
			});			
		}
		var action="showattendance";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,year:year,branch:branch},
			success:function(result){
				$('#attendancemodal').modal('show');
				$("#attendancedatadiv").html(result);
			}
		});
	});

	$("#subselect").on("change",function(){
		var branch = $("#subfilterbranch").val();
		var year =$("#subfilteryear").val();
		var subject =$("#subselect").val();
		if (subject=='default' ) {
			var action="showmarks";
			var action="showattendance";
			$.ajax({
				type:"POST",
				url:"ajax.php",
				data:{action:action,year:year,branch:branch},
				success:function(result){
					$('#attendancemodal').modal('show');
					$("#attendancedatadiv").html(result);
				}
			});
		}
		var action ="thissubject";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,branch:branch,year:year,subject:subject},
			success:function(result){
				$("#attendancedatadiv").html(result);
			}
		});
	});

	$("#viewmarksbutton").click(function(){
		var year = $('#recordyear').val();
		var branch =$("#recordbranch").val();
		if (year == 'default' || branch =='default') {
			$('#viewrecorderror').html('<br><p class="text-danger">Selcet appropiate option</p>');
			window.setTimeout(givedealy, 2000);
			function givedealy(){
				$('#viewrecorderror').html('');
			}
			return;
		}else{
			$('#marksmodal').modal('show');
			var action="getsubjects";
			$.ajax({
				type:"POST",
				url:"ajax.php",
				data:{action:action,year:year,branch:branch},
				success:function(result){
					$("#sbjectselect").html(result);
					// console.log(result);
				}
			});
		}
		var action="showmarks";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,year:year,branch:branch},
			success:function(result){
				$("#marksdiv").html(result);
			}
		});
	});

	$("#sbjectselect").on("change",function(){
		var branch= $("#branchmarks").val();
		var year =$("#yearmarks").val();
		var subject = $("#sbjectselect").val();
		var action ="showthismuch";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,branch:branch,year:year,subject:subject},
			success:function(result){
				$("#marksdiv").html(result);
			}
		});
	});

	$("#datefilterbutton").click(function(){
		var firstdate = $("#firstdate").val();
		var lastdate = $("#seconddate").val();
		if (firstdate ) {

		}
	});

	$("#feedsubmit").click(function(){
		var feedform= $("#feedbackform");
		if(!feedform[0].checkValidity()){
		feedform[0].reportValidity();
		return;
		}
		var feedback ="action=feedback&"+ $("#feedbackform").serialize();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data: feedback,
			success:function(result){
				alert(result);
				document.getElementById("feedbackform").reset();
			}
		});
	});

	$("#datefilterbutton").click(function(){
		var filterform =$("#datefilterform");
		if (!filterform[0].checkValidity()) {
			filterform[0].reportValidity();
			return;
		}
	});

	$("#percentagefilterbutton").click(function(){
		var filterform =$("#precentagefilterform");
		if (!filterform[0].checkValidity()) {
			filterform[0].reportValidity();
			return;
		}
	});

	$("#saveattendance").click(function(){
		var rollno= [];
		var absent =[];
		$(':checkbox:checked').each(function(i){
			rollno[i]=$(this).val();
		});
		$("input:checkbox:not(:checked)").each(function(j){
			absent[j]=$(this).val();
		});
		// console.log(absent);
		var action="saveattendance";
		// var attendancevalue=$("#submitattendance").serialize();
		// console.log(rollno+attendancevalue);
		var subjectcodeattendance =$("#subjectcodeattendance").val();
		var yearattendance =$("#yearattendance").val();
		var semattendance = $("#semattendance").val();
		var branchattendance =$("#branchattendance").val();
		var dateattendance = $("#dateattendance").val();
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,absent:absent,rollno:rollno,subjectcodeattendance:subjectcodeattendance,yearattendance:yearattendance,semattendance:semattendance,branchattendance:branchattendance,dateattendance:dateattendance},
			success:function(result){
					$("#getstudentsrollno").html("<p>Thank you for submiting attendance</p>");
					window.setTimeout(givedealy, 2000);
					function givedealy(){
						$("#markattendancemodal").modal("toggle");
						document.getElementById('facultypageform').reset();
					}
				}
		});
	});

	$("#savemarks").click(function(){
		var subject = $("#savemarks").val();
		var branch = $("#marksbranch").val();
		var year =$("#marksyear").val();
		var ctonemarks=[];
		var cttwomarks=[];
		var assignmarks=[];
		var rollno=[];
		// console.log(subject);
		$("input[name='ctonemarks']").each(function(){
			ctonemarks.push($(this).val());
		});
		$("input[name='cttwomarks']").each(function(){
			cttwomarks.push($(this).val());
		});
		$("input[name='assignmarks']").each(function(){
			assignmarks.push($(this).val());
		});
		$("input[name='rollno']").each(function(){
			rollno.push($(this).val());
		});
		var action ="savemarks";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data:{action:action,cttwomarks:cttwomarks,ctonemarks:ctonemarks,assignmarks:assignmarks,subject:subject,rollno:rollno,branch:branch,year:year},
			success:function(result){
				$("#addmarksdiv").html('<p class="text-success">Records have been updated successfully</p>');
				window.setTimeout(givedealy,2000);
				function givedealy(){
				$("#addmarksmodal").modal("toggle");
				document.getElementById('facultypageform').reset();
				}
			}
		});
	});

	function getfeedback(){
		var action = "showmsgs";
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data: {action:action},
			success:function(result){
				// console.log(result);
				document.getElementById("feedbacks").innerHTML=result;
			}
		});
	}

	document.getElementById("printstatus").onclick = function () {
		printElement(document.getElementById("attendancediv"));
	};
	document.getElementById("printmarksstatus").onclick = function () {
		printElement(document.getElementById("marksdiv"));
	};
});  