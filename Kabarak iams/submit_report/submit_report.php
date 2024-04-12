<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$index_number_holder = $_COOKIE["student_index_number"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MKSU</title>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap-select.css"/>
  <link rel="stylesheet" href="../css/main_page_style.css"/>
  <link rel="stylesheet" href="submit_report.css"/>
  <link rel="stylesheet" href="../css/styler.css" />

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.form.min.js"></script>

</head>
<body>

<nav>
    <div class="logo">
      <img src="../images/mksu_horizontal_bg.png" alt="Logo" class="d-inline-block align-text-top">
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <ul>
      <li><a class="active" href="../instructions_page/instructions_page.php">Home</a></li>
      <li><a href="../Downloads/mksu_logbk.pdf">Logbook</a></li>
      <li><a href="../Downloads/mksu_attachment_form.pdf">Introduction letter</a></li>
      <div id="student_name_adjusted"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp;
        </span><span style="font-family:serif"><?php echo $student_fname." ".$student_lname;?></span></div>
      </div>
    </ul>
  </nav>

<div id="left_side_bar">
<ul id="menu_list">
  <a class="menu_items_link" href="../instructions_page/instructions_page.php"><li class="menu_items_list">Instructions</li></a>
  <a class="menu_items_link" href="../Register_page/Register_page.php"><li class="menu_items_list">Register</li></a>
  <a class="menu_items_link" href="../student_assumption/student_assumption.php"><li class="menu_items_list">Submit Assupmtion</li></a>
  <a class="menu_items_link" href="../e-logbook/elogbook.php"><li class="menu_items_list">E-Logbook</li></a>
  <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php"><li class="menu_items_list">Company Supervisor</li></a>
  <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php"><li class="menu_items_list">Visiting Supervisor</li></a>
  <a class="menu_items_link" href="submit_report.php"><li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">Submit Report</li></a>
  <a class="menu_items_link" href="../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
	<div class = "panel">
	   <div class = "panel-heading industrial_phead">
		  <h2 class = "panel-title industrial_ptitle"> Submit Report</h2>
	   </div>

		<div class = "panel-body industrial_pbody">
			
			<form method="POST" enctype="multipart/form-data" id="form">
				<h1 style="text-align: center">Upload Report</h1>
				<input type="file" name="file[]" multiple required>
				<input type="submit" value="Upload" id="sub-but">
				<h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That your report is in a Portable Document Format with your index number as its name before uploading it</strong></h4>
				<h4 style="text-align: center">Follow the Instructions </h4>
				
				<progress id="prog" max="100" value="0" style="display: none"></progress>
				<div id="amount_reached"></div>
			</form>

		 </div>
   </div>
 </div>

<script>
$(document).ready(function () {
	$(document).ready(function(){
		$("#form").on('submit',function(e){
			e.preventDefault();
			$(this).ajaxSubmit({
				url:'upload.php',
				beforeSend:function(){
					$("#prog").show();
					$("#prog").attr('value','0');
				},
				uploadProgress:function(event,position,total,percentComplete){
					$("#prog").attr('value',percentComplete);
					$('#sub-but').val(percentComplete+'%');
				},
				success:function(){
					$('#sub-but').val('Files Uploaded!!');
					setTimeout(function(){
						$('#sub-but').val('Upload');
					},1000);
				},
			});
		});
	});
});
</script>


</body>
</html>
