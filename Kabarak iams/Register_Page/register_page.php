<?php
$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
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
  <link rel="stylesheet" href="register_page.css" />
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
      <a class="menu_items_link" href="register_page.php">
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
      <div class="row">
        <div class="col-lg-6">
          <div class="panel">
            <div class="panel-body pbody pbody_vira">
              <span>This is for the students taking Programmes with Internal Attachment Workshop
                at Kabarak Univeristy,<br><em style="font-weight:bold;color:#2B3775"> Please
                  Click On The Button Below </em></span>
              <br><br>
              <button type="button" class="btn btn-primary btn-medium" style="padding:10px;color:white"
                id="btn_vira">INTERNAL</button>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="panel">
            <div class="panel-body pbody pbody_industrial">
              <span>This is for students going for External Industrial Attachment,<br><em style="font-weight:bold;color:#2B3775"> Please Click On The Button Below </em></span>
              <br><br>
              <button type="button" class="btn btn-primary btn-medium" style="padding:10px;color:white"
                id="btn_industrial">INDUSTRIAL</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function () {
      $("#btn_vira").click(function () {
        var url = "vira_registration_page.php";
        $(location).attr('href', url);
      });

      $("#btn_industrial").click(function () {
        var url = "industrial_registration_page.php";
        $(location).attr('href', url);
      });
    });
  </script>

</body>

</html>