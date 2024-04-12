<?php

include '../database_connection/database_connection.php';

$btn_update_status = "";
$btn_save_status = "";

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];

$student_full_name = $student_fname." ".$student_lname;
$student_index_number = $_COOKIE["student_index_number"];

$check_content_existence = "SELECT * FROM week8_table WHERE index_number='$student_index_number'";
$check_existence_query = mysqli_query($conn,$check_content_existence);
$check_query_presence = mysqli_num_rows($check_existence_query);

if($check_query_presence==1){

  $btn_update_status = "enabled";
  $btn_save_status = "disabled";

}else{

  $btn_update_status = "disabled";
  $btn_save_status = "enabled";
}


if(isset($_POST["btn_save"])){

  $monday_job_assigned = $_POST["job_assigned_1"];
  $monday_skill_acquired = $_POST["skill_acquired_1"];
  $tuesday_job_assigned = $_POST["job_assigned_2"];
  $tuesday_skill_acquired = $_POST["skill_acquired_2"];
  $wednesday_job_assigned = $_POST["job_assigned_3"];
  $wednesday_skill_acquired = $_POST["skill_acquired_3"];
  $thursday_job_assigned = $_POST["job_assigned_4"];
  $thursday_skill_acquired = $_POST["skill_acquired_4"];
  $friday_job_assigned = $_POST["job_assigned_5"];
  $friday_skill_acquired = $_POST["skill_acquired_5"];

  if($monday_job_assigned!=""&& $monday_skill_acquired!=""&& $tuesday_job_assigned!=""
  &&$tuesday_skill_acquired!=""&&$wednesday_job_assigned!=""&&$wednesday_skill_acquired!=""
  &&$thursday_job_assigned!=""&&$thursday_skill_acquired!=""&&$friday_job_assigned!=""&&$friday_skill_acquired!=""){

	    $insert_details_command = "INSERT INTO `week8_table` (`id`, `username`, `index_number`, `monday_job_assigned`, `date`, `monday_special_skill_acquired`, `tuesday_job_assigned`, `tuesday_special_skill_acquired`, `wednesday_job_assigned`, `wednesday_special_skill_acquired`, `thursday_job_assigned`, `thursday_special_skill_acquired`, `friday_job_assigned`, `friday_special_skill_acquired`) VALUES (NULL, '$student_full_name', '$student_index_number', '$monday_job_assigned', CURRENT_TIMESTAMP, '$monday_skill_acquired', '$tuesday_job_assigned', '$tuesday_skill_acquired', '$wednesday_job_assigned', '$wednesday_skill_acquired', '$thursday_job_assigned', '$thursday_skill_acquired', '$friday_job_assigned', '$friday_skill_acquired')";
	  
  		$execute_insert_query = mysqli_query($conn,$insert_details_command);
	  
  }else{
     echo "<script>alert('You need to Fill All Spaces')</script>";
  }
}


if(isset($_POST["btn_update"])){

  $monday_job_assigned = $_POST["job_assigned_1"];
  $monday_skill_acquired = $_POST["skill_acquired_1"];
  $tuesday_job_assigned = $_POST["job_assigned_2"];
  $tuesday_skill_acquired = $_POST["skill_acquired_2"];
  $wednesday_job_assigned = $_POST["job_assigned_3"];
  $wednesday_skill_acquired = $_POST["skill_acquired_3"];
  $thursday_job_assigned = $_POST["job_assigned_4"];
  $thursday_skill_acquired = $_POST["skill_acquired_4"];
  $friday_job_assigned = $_POST["job_assigned_5"];
  $friday_skill_acquired = $_POST["skill_acquired_5"];

  if($monday_job_assigned!=""&& $monday_skill_acquired!=""&& $tuesday_job_assigned!=""
  &&$tuesday_skill_acquired!=""&&$wednesday_job_assigned!=""&&$wednesday_skill_acquired!=""
  &&$thursday_job_assigned!=""&&$thursday_skill_acquired!=""&&$friday_job_assigned!=""&&$friday_skill_acquired!=""){

  $update_details_command = "UPDATE `week8_table` SET `monday_job_assigned` = '$monday_job_assigned', `monday_special_skill_acquired` = '$monday_skill_acquired', `tuesday_job_assigned` = '$tuesday_job_assigned', `tuesday_special_skill_acquired` = '$tuesday_skill_acquired', `wednesday_job_assigned` = '$wednesday_job_assigned', `wednesday_special_skill_acquired` = '$wednesday_skill_acquired', `thursday_job_assigned` = '$thursday_job_assigned', `thursday_special_skill_acquired` = '$thursday_skill_acquired', `friday_job_assigned` = '$friday_job_assigned', `friday_special_skill_acquired` = '$friday_skill_acquired' WHERE `index_number`='$student_index_number'";

  $execute_update_query = mysqli_query($conn,$update_details_command);

  }else{
     echo "<script>alert('You need to Fill All Spaces')</script>";
  }
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MKSU</title>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-select.css" />
  <link rel="stylesheet" href="../css/main_page_style.css" />
  <link rel="stylesheet" href="elogbook.css" />
  <link rel="stylesheet" href="../css/styler.css" />

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>

<Body>
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
      <a class="menu_items_link" href="../instructions_page/instructions_page.php">
        <li class="menu_items_list">Instructions</li>
      </a>
      <a class="menu_items_link" href="../Register_page/Register_page.php">
        <li class="menu_items_list">Register</li>
      </a>
      <a class="menu_items_link" href="../student_assumption/student_assumption.php">
        <li class="menu_items_list">Submit Assupmtion</li>
      </a>
      <a class="menu_items_link" href="elogbook.php">
        <li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">E-Logbook</li>
      </a>
      <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php">
        <li class="menu_items_list">Company Supervisor</li>
      </a>
      <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php">
        <li class="menu_items_list">Visiting Supervisor</li>
      </a>
      <a class="menu_items_link" href="../submit_report/submit_report.php">
        <li class="menu_items_list">Submit Report</li>
      </a>
      <a class="menu_items_link" href="../index.php">
        <li class="menu_items_list">Logout</li>
      </a>
    </ul>
  </div>

  <div id="main_content">
    <div class="container-fluid">
      <div class="panel">
        <div class="panel-heading phead">
          <h2 class="panel-title ptitle"> E-LogBook</h2>
        </div>
        <div class="panel-body pbody">
          <div id="navigation_holder">
            <ul class="pager">
              <li class="previous"><a href="elogbook_week7.php">&larr; Previous</a></li>
              <li class="next"><a href="elogbook_week9.php">Next &rarr;</a></li>
            </ul>
          </div>
          <div id="week_holder">
            <span style="font-size:1.3em;font-weight:bold;">Week 8</span>
          </div>
          <hr>
          <form method="post" action="">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style='text-align:center'>Day</th>
                  <th style='text-align:center'>Job Assigned To Student</th>
                  <th style='text-align:center'>Special Skill Acquired</th>

                </tr>

              </thead>
              <tbody>
                <?php
 
                  $get_previous_data = "SELECT * FROM week8_table WHERE index_number='$student_index_number'";
                  $execute_get_query = mysqli_query($conn,$get_previous_data);
                  $get_data = mysqli_fetch_assoc($execute_get_query);

                  $monday_job_assigned_holder = isset($cOTLdata['monday_job_assigned']);
				  $monday_skill_acquired_holder = isset($cOTLdata['monday_special_skill_acquired']);
			
			      $tuesday_job_assigned_holder = isset($cOTLdata['tuesday_job_assigned']);
				  $tuesday_skill_acquired_holder = isset($cOTLdata['tuesday_special_skill_acquired']);
			
			      $wednesday_job_assigned_holder = isset($cOTLdata['wednesday_job_assigned']);
				  $wednesday_skill_acquired_holder = isset($cOTLdata['wednesday_special_skill_acquired']);
			
			      $thursday_job_assigned_holder = isset($cOTLdata['thursday_job_assigned']);
				  $thursday_skill_acquired_holder = isset($cOTLdata['thursday_special_skill_acquired']);
			
			      $friday_job_assigned_holder = isset($cOTLdata['friday_job_assigned']);
				  $friday_skill_acquired_holder = isset($cOTLdata['friday_special_skill_acquired']);
                 
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Monday"."</td>";
                echo "<td><textarea name='job_assigned_1' class='form-control adjusted_text_area'>$monday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_1' class='form-control adjusted_text_area'>$monday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Tuesday"."</td>";
                echo "<td><textarea name='job_assigned_2' class='form-control adjusted_text_area'>$tuesday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_2' class='form-control adjusted_text_area'>$tuesday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Wednesday"."</td>";
                echo "<td><textarea name='job_assigned_3' class='form-control adjusted_text_area'>$wednesday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_3' class='form-control adjusted_text_area'>$wednesday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Thursday"."</td>";
                echo "<td><textarea name='job_assigned_4' class='form-control adjusted_text_area'>$thursday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_4' class='form-control adjusted_text_area'>$thursday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
			
				echo "<tr>";
				echo "<td style='padding:20px;text-align:center'>"."Friday"."</td>";
                echo "<td><textarea name='job_assigned_5' class='form-control adjusted_text_area'>$friday_job_assigned_holder</textarea>"."</td>";
                echo "<td><textarea name='skill_acquired_5' class='form-control adjusted_text_area'>$friday_skill_acquired_holder</textarea>"."</td>";
                echo "</tr>";
    
           ?>

              </tbody>
            </table>
            <div id="buttons_holder">
              <input type="submit" value="Update" class="btn btn-primary" name="btn_update"
                <?php echo $btn_update_status; ?>>
              <input type="submit" value="Save" class="btn btn-primary" name="btn_save" <?php echo $btn_save_status; ?>>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

</html>