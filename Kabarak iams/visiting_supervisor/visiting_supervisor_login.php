<?php
include '../database_connection/database_connection.php';
$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];

if(isset($_POST["btn_login"])){
  if($_POST["txtvisiting_supervisor_password"]!=""){
    $supervisors_password = $_POST["txtvisiting_supervisor_password"];
    $supervisor_login_details = "SELECT * FROM supervisors_login WHERE password='$supervisors_password'";
    $execute_supervisors_login = mysqli_query($conn,$supervisor_login_details);
    $check_query = mysqli_num_rows($execute_supervisors_login);

    if($check_query==1){
      header("Location:visiting_supervisor_grade.php");
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
  <link rel="stylesheet" href="visiting_supervisor.css" />
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
      <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php">
        <li class="menu_items_list">Company Supervisor</li>
      </a>
      <a class="menu_items_link" href="visiting_supervisor_login.php">
        <li class="menu_items_list" style="background-color:#3cb4fb;padding-left:16px">Visiting Supervisor</li>
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
          <h2 class="panel-title ptitle">Login - Visiting Supervisor</h2>
        </div>
        <form method="post" action="">
          <div class="panel-body pbody">
            <div class="panel">
              <div class="panel-body pbody_login_holder">
                <br>
                <div style="text-align:center;font-size:1.2em"><strong>PASSWORD</strong></div>
                <hr>
                <input type="password" class="form-control form-control-adjusted" id="txtvisiting_supervisor_password"
                  name="txtvisiting_supervisor_password" placeholder="Enter Password" /><br>
                <div id="btn_login_holder">
                  <input type="submit" class="btn btn-primary" value="Login" id="btn_visiting_login" name="btn_login" />
                </div>
              </div>
              </panel>
            </div>
          </div>
        </form>
      </div>
    </div>
</body>

</html>