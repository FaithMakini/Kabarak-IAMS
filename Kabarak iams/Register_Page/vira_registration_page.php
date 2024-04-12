<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$other_name_status = "disabled";
$index_status = "disabled";
$first_name_holder = "";
$last_name_holder = "";
$index_number_holder = "";
$submit_status = "disabled";


  $programmes = array("-","Accountancy","Applied Mathematics","Building Technology","Civil Engineering","Computer Science","Computer Networking",
  "Electrical/Electronic Engineering","Hospitality","Liberal Studies","Marketing","Purchasing & Supply","Secretaryship");

  $faculties = array("-","FAST","FBMS","FOE","FBNE","FHAS");

  $sessions = array("-","Morning","Evening","Weekend");

  $levels = array("-","100","200","300");

  if(isset($_POST["btn-check-receipt"])){
    $entered_receipt_number = $_POST["txtreceipt"];
    $check_receipt = "SELECT * FROM vira_receipts_paid WHERE receipt_number='$entered_receipt_number'";
    $execute_check_receipt = mysqli_query($conn,$check_receipt);
    $get_receipt_details = mysqli_num_rows($execute_check_receipt);
    if($get_receipt_details == 1){
      $other_name_status = "";
      $first_name_holder = $_COOKIE["student_first_name"];
      $last_name_holder = $_COOKIE["student_last_name"];
      $index_number_holder = $_COOKIE["student_index_number"];
      $index_status="";
      $submit_status = "";
    }else{
      $other_name_status="disabled";
      $index_status="disabled";
      $first_name_holder = "";
      $last_name_holder = "";
      $index_number_holder = "";
      $submit_status = "disabled";
    }
  }

  if(isset($_POST["btn_submit"])){
    if($_POST["student_programme"]!="" && $_POST["student_level"]!="" && $_POST["student_session"]!=""){

      $other_name = $_POST["student_other_name"];
      $student_programme_selected = $_POST["student_programme"];
      $student_level_selected = $_POST["student_level"];
      $student_session_selected = $_POST["student_session"];
      $student_index = $_POST["txt_index_number"];
	  $student_faculty = $_POST["student_faculty"];

      $check_user_existence = "SELECT * FROM vira_registration WHERE index_number='$student_index' LIMIT 1";
      $execute_check_existence = mysqli_query($conn,$check_user_existence);
      $check_user = mysqli_num_rows($execute_check_existence);
      if($check_user==1){
       echo "<script>alert('Sorry You Have Registered Already')</script>";
     }else{
       $insert_details_command = "INSERT INTO vira_registration (`id`, `first_name`, `last_name`, `other_name`, `index_number`, `programme`, `level`, `session`,`faculty`,`date`) VALUES (NULL,'$student_fname', '$student_lname', '$other_name','$student_index', '$student_programme_selected', '$student_level_selected', '$student_session_selected','$student_faculty', CURRENT_TIMESTAMP)";
      if($run_query = mysqli_query($conn,$insert_details_command)){
        echo "<script>alert('Details Have Been Submitted Successfully')</script>";
      }else{
        echo "<script>alert('Details Not Submitted ')</script>";
      }
    }
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
  <link rel="stylesheet" href="vira_and_industrial_registration.css" />
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
        <li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">Register</li>
      </a>
      <a class="menu_items_link" href="../student_assumption/student_assumption.php">
        <li class="menu_items_list">Submit Assupmtion</li>
      </a>
      <a class="menu_items_link" href="../e-logbook/elogbook.php">
        <li class="menu_items_list">E-Logbook</li>
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
        <div class="panel-heading vira_phead">
          <h2 class="panel-title vira_ptitle"> Vira Registration</h2>
        </div>
        <div class="panel-body vira_pbody">
          <div class="row">
            <div id="vira_receipt_holder">
              <form class="form-inline" method="post" action="">
                <div class="form-group">
                  <label class="sr-only">Receipt Number</label>
                  <p class="form-control-static"><strong>Receipt No.</strong></p>
                </div>
                <div class="form-group">
                  <label for="txtreceipt" class="sr-only">Receipt Number</label>
                  <input type="text" class="form-control form-control-adjusted" id="txtreceipt"
                    placeholder="Receipt number" name="txtreceipt">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="Validate" name="btn-check-receipt" />
              </form>
            </div>
          </div>
          <br>
          <br>
          <div class="panel">
            <div class="panel-body">
              <form method="post" action="">
                <div class="form-group">
                  <label for="txtfname">First Name </label>
                  <input type="text" class="form-control form-control-adjusted" id="txtfname"
                    placeholder="Enter first name" disabled <?php echo "value='$first_name_holder'"?>>
                </div>

                <div class="form-group">
                  <label for="txtlname">Last Name </label>
                  <input type="text" class="form-control form-control-adjusted" id="txtlname"
                    placeholder="Enter last name" disabled value=<?php echo $last_name_holder;?>>
                </div>

                <div class="form-group">
                  <label for="txtothername">Other Name(s) </label>
                  <input type="text" class="form-control form-control-adjusted" id="txtothername"
                    placeholder="Enter other name(s)" <?php echo $other_name_status; ?> name="student_other_name">
                </div>

                <div class="form-group">
                  <label for="txtindexnumber">Index Number </label>
                  <input type="text" class="form-control form-control-adjusted" id="txtindexnumber"
                    placeholder="Enter index number" name="txt_index_number" <?php echo $index_status; ?>
                    value=<?php echo $index_number_holder;?>>
                </div>

                <div class="form-group">
                  <label for="selected_programme">Select Programme:</label>
                  <select class="form-control form-control-adjusted" id="selected_programme" name="student_programme">
                    <?php
            foreach($programmes as $val) { echo "<option>".$val."</option>";};
           ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="selected_level">Select Level:</label>
                  <select class="form-control form-control-adjusted" id="selected_level" name="student_level">
                    <?php
      foreach($levels as $val) { echo "<option>".$val."</option>";};
         ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="selected_session">Select Session:</label>
                  <select class="form-control form-control-adjusted" id="selected_session" name="student_session">
                    <?php
      foreach($sessions as $val) { echo "<option>".$val."</option>";};
         ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="selected_session">Select Faculty :</label>
                  <select class="form-control form-control-adjusted" id="selected_faculty" name="student_faculty">
                    <?php
      foreach($faculties as $val) { echo "<option>".$val."</option>";};
         ?>
                  </select>
                </div>

                <div id="btn_submit_holder">
                  <input type="submit" class="btn btn-primary" value="Submit" <?php echo $submit_status; ?>
                    name="btn_submit" />
                </div>
              </form>
            </div>
            </panel>

          </div>
        </div>
      </div>
    </div>

</body>

</html>