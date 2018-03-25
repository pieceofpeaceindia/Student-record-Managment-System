$(document).ready(function(){
	console.log("no prblem in jquery");
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
				alert("form submitted");
				document.getElementById('facultyloginform').reset();
				document.getElementById("mmsg").innerHTML='<h3 class="alert alert-danger">Password are not same</h3>';
				document.getElementById("successmmsg").innerHTML=result;
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
				alert("form submitted");
				document.getElementById('adminloginform').reset();
			}
		});			
	});
	$(".viewrecords").click(function(){
		// location.href="viewrecords.php";
	});

	// $("#printstatus").click(function(){
	// 	window.print();
	// });
	
	document.getElementById("printstatus").onclick = function () {
		printElement(document.getElementById("attendancediv"));
	};
	document.getElementById("printmarksstatus").onclick = function () {
		printElement(document.getElementById("marksdiv"));
	};

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

	$("#attendancebranch").on("change",function(){
		var year = $("#attendancebranch").val();
		var branch =$("#attendanceyear").val();
		var sem =$("#attendancesem").val();
		var dataString = 'action=selectinput&'+'year='+year+'&branch='+branch+'&sem='+sem;
		console.log(dataString);
		$.ajax({
			type:"POST",
			url:"ajax.php",
			data : dataString,
			success : function(result){
				console.log(result);
				$("#size").html(result);
			}
		});
	});

});  