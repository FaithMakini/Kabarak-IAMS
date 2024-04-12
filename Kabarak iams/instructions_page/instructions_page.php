<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$student_index_number = $_COOKIE["student_index_number"];


$mysql_check_supervisor_assigned = "SELECT * FROM vira_registration WHERE index_number='$student_index_number' LIMIT 1";

$execute_check_supervisor_assigned = mysqli_query($conn,$mysql_check_supervisor_assigned);

// $check_presence = mysqli_num_rows($execute_check_supervisor_assigned);

// if($check_presence == 1){

// $get_entire_results = mysqli_fetch_array($execute_check_supervisor_assigned);

// $student_faculty = $get_entire_results["faculty"];
// $student_company_region = $get_entire_results["attachment_region"];
// $student_visiting_supervisor_name = $get_entire_results["visiting_supervisor_name"];

// if($student_company_region!="unassigned" && $student_visiting_supervisor_name!="unassigned"){

// 	$contains_data = "true";

// 	$get_supervisors_contact_query = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty='$student_faculty' AND lecturer_name='$student_visiting_supervisor_name' LIMIT 1";

// 	$execute_get_supervisor_contact = mysqli_query($conn,$get_supervisors_contact_query);

// 	$get_supervisors_contact = mysqli_fetch_array($execute_get_supervisor_contact);

// 	$lecturers_contact = $get_supervisors_contact["lecturer_phone_number"];

// 	$assign_contact_to_student = "UPDATE `vira_registration` SET `visiting_supervisor_contact` = '$lecturers_contact' WHERE `index_number` = '$student_index_number'";

// 	$execute_assign_contact = mysqli_query($conn,$assign_contact_to_student);

// }else{
// 	$contains_data = "true";
// }

// }else{

// 	$mysql_check_supervisor_assigned = "SELECT * FROM industrial_registration WHERE index_number='$student_index_number' LIMIT 1";

// 	$execute_check_supervisor_assigned = mysqli_query($conn,$mysql_check_supervisor_assigned);

// 	$get_entire_results = mysqli_fetch_array($execute_check_supervisor_assigned);

// 	$student_faculty = isset($cOTLdata['faculty']);

// 	$student_company_region = isset($cOTLdata['attachment_region']);

// 	$student_visiting_supervisor_name = isset($cOTLdata['visiting_supervisor_name']);

// 	if($student_company_region!="unassigned" && $student_visiting_supervisor_name!="unassigned"){

// 	$contains_data = "true";

// 	$get_supervisors_contact_query = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty='$student_faculty' AND lecturer_name='$student_visiting_supervisor_name' LIMIT 1";

// 	$execute_get_supervisor_contact = mysqli_query($conn,$get_supervisors_contact_query);

// 	$get_supervisors_contact = mysqli_fetch_array($execute_get_supervisor_contact);

// 	$lecturers_contact = isset($cOTLdata['lecturer_phone_number']);

// 	$assign_contact_to_student = "UPDATE `industrial_registration` SET `visiting_supervisor_contact` = '$lecturers_contact' WHERE `index_number` = '$student_index_number'";

// 	$execute_assign_contact = mysqli_query($conn,$assign_contact_to_student);

// }else{
// 		$contains_data = "true";
// 	}

// }


 ?>

<!DOCTYPE html>
<html lang="en" class="bg-pink">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>MKSU</title>

   <link rel="stylesheet" href="../css/bootstrap-theme.min.css" />
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/main_page_style.css" />
   <link rel="stylesheet" href="instructions_page.css" />
   <link rel="stylesheet" href="../css/styler.css" />

   <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
   <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>

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
<div class="content">
   <div>
      Responsive Navigation Menu Bar Design
   </div>
   <div>
      using only HTML & CSS
   </div>
</div>


<div id="left_side_bar">
   <ul id="menu_list">
      <a class="menu_items_link" href="instructions_page.php">
         <li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">Instructions</li>
      </a>
      <a class="menu_items_link" href="../Register_Page/register_page.php">
         <li class="menu_items_list">Register</li>
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


<!-- Main Body Content -->

<div id="main_content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading ">
                  <h4 class="panel-title ptitle">Step 1</h4>
               </div>

               <div class="panel-body pbody">
                  <span> Once you have been able to login into the system, click on <span
                        style="font-weight:bold;color:#2B3775">"Register"</span> if you havent
                     registered yet for the industrial attachment </span>
                  <br><br>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading pheading">
                  <h4 class="panel-title ptitle">Step 2</h4>
               </div>

               <div class="panel-body pbody">
                  <span>There are two (2) options, choose <span style="font-weight:bold;color:#2B3775">INTERNAL</span>
                     if you a taking internal attachment in the school or <span
                        style="font-weight:bold;color:#2B3775">INDUSTRIAL</span>
                     if you are taking industrial attachment with a company of your choice.</span>
                  <br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle"> Step 3</h4>
               </div>

               <div class="panel-body pbody">
                  <span>In case you select <span style="font-weight:bold;color:#2B3775">INTERNAL</span> in Step 2,
                     you will be asked to enter your fee clearence code and click on <span
                        style="font-weight:bold;color:#2B3775">VALIDATE</span>
                     before you will be able to fill the form. </span>
                  <br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle">Step 4 </h4>
               </div>

               <div class="panel-body pbody">
                  <span>In case you select <span style="font-weight:bold;color:#2B3775">INDUSTRIAL</span> in Step 2,
                     you will be provided with a form to fill after which you should click on <span
                        style="font-weight:bold;color:#2B3775">SUBMIT</span>
                     to submit the form to the Cordination Office</span>
               </div>
            </div>
         </div>
      </div>

      <br>

      <div class="row">
         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading pheading">
                  <h4 class="panel-title ptitle">Step 5</h4>
               </div>

               <div class="panel-body pbody">
                  <span>After you have successfully submitted your registration details,
                     click on <span style="font-weight:bold;color:#2B3775">Submit Assumption</span> if you have not
                     yet submitted your assumption form. </span>
                  <br><br><br><br>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading pheading">
                  <h4 class="panel-title ptitle">Step 6</h4>
               </div>

               <div class="panel-body pbody">
                  <span>Once you have clicked on <span style="font-weight:bold;color:#2B3775">Submit
                        Assumption</span> in Step 5</span>,
                  a form will be given to you fill after which you have to click on <span
                     style="font-weight:bold;color:#2B3775">SUBMIT</span>
                  to submit it to the Cordination Office.
                  <br><br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle"> Step 7</h4>
               </div>

               <div class="panel-body pbody">
                  <span>You can also click <span style="font-weight:bold;color:#2B3775">E-Logbook</span> to record
                     all the activities done per day for the week. You should make sure you click on <span
                        style="font-weight:bold;color:#2B3775">SAVE</span> after you are done
                     to avoid loosing your data</span>
                  <br><br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle">Step 8 </h4>
               </div>

               <div class="panel-body pbody">
                  <span>Clicking on <span style="font-weight:bold;color:#2B3775">Company Supervisor</span> will open
                     a page where officials supervising attachees
                     can grade the student. Students can't access this page unless a <span
                        style="font-weight:bold;color:#2B3775">Visiting Supervisor</span>
                     gives the password to the supervisor accessing you </span>
               </div>
            </div>
         </div>
      </div>

      <br>

      <div class="row">
         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading pheading">
                  <h4 class="panel-title ptitle">Step 9</h4>
               </div>

               <div class="panel-body pbody">
                  <span> Clicking on the <span>Visiting Supervisors</span> would enable to graded by the Supervisor
                     the school has choosen to supervise the student. This page would not be accessible by the
                     student, only <thead>
                        visiting supervisor can login with a password.
                     </thead> </span>
                  <br><br>
               </div>
            </div>
         </div>

         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading pheading">
                  <h4 class="panel-title ptitle">Step 10</h4>
               </div>

               <div class="panel-body pbody">
                  <span>Clicking on the submit report would enable you the student to submit
                     your industrial attachment report to the Industrial Cordination Office directly
                     without having to print it and hand it in physically, now can do it online.</span>
                  <br><br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle"> Step 11</h4>
               </div>

               <div class="panel-body pbody">
                  <span>Your password is protects your account from any unauthorised
                     access,
                     In case you want to change your account password, just click on <span>Change Password</span> and
                     fill in your details</span>
                  <br><br>
               </div>
            </div>
         </div>


         <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="panel">
               <div class="panel-heading">
                  <h4 class="panel-title ptitle">Step 12 </h4>
               </div>

               <div class="panel-body pbody">
                  <span>After you have finished with everything you want to do in the online cordination system, it is
                     advisable
                     for you to logout your account. This will prevent other users from accessing your account without
                     your approval.</span>
               </div>
            </div>
         </div>
      </div>

      <br>
      <br>



   </div>
</div>

<?php



 ?>

</body>

</html>