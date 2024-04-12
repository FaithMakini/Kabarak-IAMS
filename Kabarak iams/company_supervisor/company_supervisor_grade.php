<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];

$student_index_number = $_COOKIE["student_index_number"];

$student_full_name = $student_fname.$student_lname;

if(isset($_POST["btn_submit"])){

	$specific_skill_1 = $_POST["txtSpecific_Skill_1"];
	$specific_skill_1_score = $_POST["1-Skill-radio"];

	$specific_skill_2 = $_POST["txtSpecific_Skill_2"];
	$specific_skill_2_score = $_POST["2-Skill-radio"];

	$specific_skill_3 = $_POST["txtSpecific_Skill_3"];
	$specific_skill_3_score = $_POST["3-Skill-radio"];

	$specific_skill_4 = $_POST["txtSpecific_Skill_4"];
	$specific_skill_4_score = $_POST["4-Skill-radio"];

	$specific_skill_5 = $_POST["txtSpecific_Skill_5"];
	$specific_skill_5_score = $_POST["5-Skill-radio"];


	$ability_to_complete_work_on_time = $_POST["section-B-1-radio"];
	$ability_to_follow_instructions_carefully = $_POST["section-B-2-radio"];
	$ability_to_take_initiatives = $_POST["section-B-3-radio"];
	$ability_to_work_with_little_supervision = $_POST["section-B-4-radio"];
	$adherence_to_organizations_rules = $_POST["section-B-5-radio"];
	$adherence_to_safety = $_POST["section-B-6-radio"];
	$resourcefulness = $_POST["section-B-7-radio"];

	$attendance_to_work = $_POST["section-C-1-radio"];
	$punctuality = $_POST["section-C-2-radio"];
	$desire_to_work = $_POST["section-C-3-radio"];
	$willingness_to_accept_ideas = $_POST["section-C-4-radio"];

	$relationship_with_colleagues = $_POST["section-D-1-radio"];
	$relationship_with_superiors = $_POST["section-D-2-radio"];
	$ability_to_control_emotions = $_POST["section-D-3-radio"];


	$grade_score = $ability_to_complete_work_on_time+$ability_to_follow_instructions_carefully+$ability_to_take_initiatives+$ability_to_work_with_little_supervision+$adherence_to_organizations_rules+$adherence_to_safety+$resourcefulness+$attendance_to_work+$punctuality+$desire_to_work+$willingness_to_accept_ideas+$relationship_with_colleagues+$relationship_with_superiors+$ability_to_control_emotions+$specific_skill_1_score+$specific_skill_2_score+$specific_skill_3_score+$specific_skill_4_score+$specific_skill_5_score+5;


	$mysql_query1 = "INSERT INTO `company_supervisor_grade` (`id`, `username`, `user_index`, `specific_skill_1`, `specific_skill_1_score`, `specific_skill_2`, `specific_skill_2_score`, `specific_skill_3`, `specific_skill_3_score`, `specific_skill_4`, `specific_skill_4_score`, `specific_skill_5`, `specific_skill_5_score`, `ability_to_complete_work_on_time`, `ability_to_follow_instructions_carefully`, `ability_to_take_initiatives`, `ability_to_work_with_little_supervision`, `adherence_to_organizations_rules`, `adherence_to_safety`, `resourcefulness`, `attendance_to_work`, `punctuality`, `desire_to_work`, `williness_to_accept_new_ideas`, `relationship_with_colleagues`, `relationship_with_supervisors`, `ability_to_control_emotions_when_provoked`, `grade`, `date`) VALUES (NULL, '$student_full_name', '$student_index_number', '$specific_skill_1', '$specific_skill_1_score', '$specific_skill_2', '$specific_skill_2_score', '$specific_skill_3', '$specific_skill_3_score', '$specific_skill_4', '$specific_skill_4_score', '$specific_skill_5', '$specific_skill_5_score', '$ability_to_complete_work_on_time', '$ability_to_follow_instructions_carefully', '$ability_to_take_initiatives', '$ability_to_work_with_little_supervision', '$adherence_to_organizations_rules', '$adherence_to_safety', '$resourcefulness', '$attendance_to_work', '$punctuality', '$desire_to_work', '$willingness_to_accept_ideas', '$relationship_with_colleagues', '$relationship_with_superiors', '$ability_to_control_emotions', '$grade_score', CURRENT_TIMESTAMP)";


	if($execute_mysql_query1 = mysqli_query($conn,$mysql_query1)){

		$mysql_query2 = "SELECT * FROM industrial_registration WHERE index_number='$student_index_number'";
		$execute_mysql_query2 = mysqli_query($conn,$mysql_query2);
		$check_existence = mysqli_num_rows($execute_mysql_query2);

		if($check_existence==1){
			$mysql_query3 = "UPDATE `industrial_registration` SET `company_supervisor_grade` = '$grade_score' WHERE index_number = '$student_index_number'";
			$execute_mysql_query3 = mysqli_query($conn,$mysql_query3);
		}else{

		$mysql_query4 = "SELECT * FROM vira_registration WHERE index_number='$student_index_number'";
		$execute_mysql_query4 = mysqli_query($conn,$mysql_query4);
		$check_existence2 = mysqli_num_rows($execute_mysql_query4);

		if($check_existence2==1){
			$mysql_query5 = "UPDATE `vira_registration` SET `company_supervisor_grade` = '$grade_score' WHERE index_number = '$student_index_number'";
			$execute_mysql_query5 = mysqli_query($conn,$mysql_query5);
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
  <link rel="stylesheet" href="company_supervisor.css" />
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
      <a class="menu_items_link" href="../e-logbook/elogbook.php">
        <li class="menu_items_list">E-Logbook</li>
      </a>
      <a class="menu_items_link" href="company_supervisor_login.php">
        <li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">Company Supervisor</li>
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
          <h2 class="panel-title ptitle">Company Supervisor Grades</h2>
        </div>
        <div class="panel-body pbody">
          <form method="post" action="">
            <table class="table table-bordered">

              <caption><strong><u> DIRECTIONS </u> &nbsp; : </strong>&nbsp;Please indicate by clicking the options below
                to indicate the degree to which the student best measures up to the competencies stated below</caption>
              <tr>
                <td rowspan="2" style="padding-top:30px;padding-bottom:20px;text-align:center;width:60%"> COMPETENCIES
                </td>
                <td style="width:40%" colspan="6"> 0&nbsp;-&nbsp;ABSENT &nbsp;&nbsp;&nbsp;&nbsp; 1&nbsp;-&nbsp;WEAK
                  &nbsp;&nbsp; 2&nbsp;-&nbsp;BELOW AVERAGE</td>
              </tr>
              <tr>
                <td colspan="6"> 3&nbsp;-&nbsp;AVERAGE &nbsp;&nbsp; 4&nbsp;-&nbsp;GOOD &nbsp;&nbsp;
                  5&nbsp;-&nbsp;OUTSTANDING</td>
              </tr>

              <tr style="text-align:center;font-weight:bold">
                <td>Grade Points</td>
                <td>0</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
              </tr>

              <tr style="font-weight:bold">
                <td colspan="7" style="font-weight:bold">A. &nbsp; SPECIFIC SKILLS ( Skills related to work assigned to
                  student )</td>
              </tr>

              <tr style="text-align:center">
                <td><input type="text" class="form-control form-control-adjusted-company" name="txtSpecific_Skill_1"
                    id="txtSpecific_Skill_1" placeholder="Enter first specific skill"></td>
                <td><input type="radio" name="1-Skill-radio" value="0"></td>
                <td><input type="radio" name="1-Skill-radio" value="1"></td>
                <td><input type="radio" name="1-Skill-radio" value="2"></td>
                <td><input type="radio" name="1-Skill-radio" value="3"></td>
                <td><input type="radio" name="1-Skill-radio" value="4"></td>
                <td><input type="radio" name="1-Skill-radio" value="5"></td>
              </tr>

              <tr style="text-align:center">
                <td><input type="text" class="form-control form-control-adjusted-company" name="txtSpecific_Skill_2"
                    id="txtSpecific_Skill_2" placeholder="Enter second specific skill"></td>
                <td><input type="radio" name="2-Skill-radio" value="0"></td>
                <td><input type="radio" name="2-Skill-radio" value="1"></td>
                <td><input type="radio" name="2-Skill-radio" value="2"></td>
                <td><input type="radio" name="2-Skill-radio" value="3"></td>
                <td><input type="radio" name="2-Skill-radio" value="4"></td>
                <td><input type="radio" name="2-Skill-radio" value="5"></td>
              </tr>

              <tr style="text-align:center">
                <td><input type="text" class="form-control form-control-adjusted-company" name="txtSpecific_Skill_3"
                    id="txtSpecific_Skill_3" placeholder="Enter third specific skill"></td>
                <td><input type="radio" name="3-Skill-radio" value="0"></td>
                <td><input type="radio" name="3-Skill-radio" value="1"></td>
                <td><input type="radio" name="3-Skill-radio" value="2"></td>
                <td><input type="radio" name="3-Skill-radio" value="3"></td>
                <td><input type="radio" name="3-Skill-radio" value="4"></td>
                <td><input type="radio" name="3-Skill-radio" value="5"></td>
              </tr>

              <tr style="text-align:center">
                <td><input type="text" class="form-control form-control-adjusted-company" name="txtSpecific_Skill_4"
                    id="txtSpecific_Skill_4" placeholder="Enter fourth specific skill"></td>
                <td><input type="radio" name="4-Skill-radio" value="0"></td>
                <td><input type="radio" name="4-Skill-radio" value="1"></td>
                <td><input type="radio" name="4-Skill-radio" value="2"></td>
                <td><input type="radio" name="4-Skill-radio" value="3"></td>
                <td><input type="radio" name="4-Skill-radio" value="4"></td>
                <td><input type="radio" name="4-Skill-radio" value="5"></td>
              </tr>

              <tr style="text-align:center">
                <td><input type="text" class="form-control form-control-adjusted-company" name="txtSpecific_Skill_5"
                    id="txtSpecific_Skill_5" placeholder="Enter fifth specific skill"></td>
                <td><input type="radio" name="5-Skill-radio" value="0"></td>
                <td><input type="radio" name="5-Skill-radio" value="1"></td>
                <td><input type="radio" name="5-Skill-radio" value="2"></td>
                <td><input type="radio" name="5-Skill-radio" value="3"></td>
                <td><input type="radio" name="5-Skill-radio" value="4"></td>
                <td><input type="radio" name="5-Skill-radio" value="5"></td>
              </tr>

              <tr style="font-weight:bold">
                <td colspan="7" style="font-weight:bold">B. &nbsp; GENERAL EMPLOYABLE SKILLS</td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Ability to complete work on time</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-1-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Ability to follow instructions carefully</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-2-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Ability to make initiatives</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-3-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Ability to work with little supervision</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-4-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Adherence to organization's rules and regulations</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-5-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Adherence to safety and environmental rules</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-6-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Resourcefulness</span></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-B-7-radio" value="5"></td>
              </tr>

              <tr style="font-weight:bold">
                <td colspan="7" style="font-weight:bold">C. &nbsp; ATTITUDE TO WORK</td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Attendance to work</span></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-C-1-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Punctuality</span></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-C-2-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Desire to work</span></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-C-3-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Williness to accept new ideas</span></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-C-4-radio" value="5"></td>
              </tr>

              <tr style="font-weight:bold">
                <td colspan="7" style="font-weight:bold">D. &nbsp; HUMAN RELATIONS</td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Relationship with colleagues</span></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-D-1-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Relationship with superiors</span></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-D-2-radio" value="5"></td>
              </tr>

              <tr>
                <td><span style="font-size:1.1em">Ability to control emotions when provoked</span></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="0"></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="1"></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="2"></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="3"></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="4"></td>
                <td style="text-align:center"><input type="radio" name="section-D-3-radio" value="5"></td>
              </tr>
            </table>

            <div class="form-group">
              <label for="general_remarks">General Remarks :</label>
              <textarea class="form-control" id="general_remarks" width="100%"></textarea>
            </div>
            <input type="submit" value="Submit" name="btn_submit" id="btn_submit" class="btn btn-primary btn-sm"
              style="float:right" />
          </form>
        </div>
      </div>

    </div>
  </div>

</body>

</html>