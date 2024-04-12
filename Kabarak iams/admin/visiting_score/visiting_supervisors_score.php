<?php

include '../../database_connection/database_connection.php';

$mysql_query_1 = "SELECT * FROM vira_registration";
$mysql_query_2 = "SELECT * FROM industrial_registration";

if(isset($_POST["btn_search"])){

  $search_by = $_POST["filter-by"];
  $search_term = $_POST["txt_search_term"];

  if($search_by!=""&& $search_term!=""){

    switch ($search_by) {
      case 'Filter By':
        $mysql_query_1 = "SELECT * FROM vira_registration";
        $mysql_query_2 = "SELECT * FROM industrial_registration";

        break;

      case 'First Name':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE first_name LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE first_name LIKE '%$search_term%'";

      break;

      case 'Last Name':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE last_name LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE last_name LIKE '%$search_term%'";

      break;

      case 'Index Number':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE index_number LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE index_number LIKE '%$search_term%'";

        break;

      case 'Programme':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE programme LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE programme LIKE '%$search_term%'";

        break;

      case 'Level':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE level LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE level LIKE '%$search_term%'";

        break;

      case 'Session':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE session LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE session LIKE '%$search_term%'";

        break;
			
	  case 'Score':

      $mysql_query_1 = "SELECT * FROM vira_registration WHERE visiting_supervisor_grade LIKE '%$search_term%'";
      $mysql_query_2 = "SELECT * FROM industrial_registration WHERE visiting_supervisor_grade LIKE '%$search_term%'";

        break;

      default:

      $mysql_query_1 = "SELECT * FROM vira_registration";
      $mysql_query_2 = "SELECT * FROM industrial_registration";

        break;
    }
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" class="bg-pink">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MKSU</title>

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/main_page_style.css"/>
  <link rel="stylesheet" href="assign_supervisors.css"/>
  <link rel="stylesheet" href="../../css/styler.css"/>

  <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>


</head>
<body>
<nav>
   <div class="logo">
      <img src="../../images/mksu_horizontal_bg.png" alt="Logo" class="d-inline-block align-text-top">
   </div>
   <input type="checkbox" id="click">
   <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
   </label>
   <ul>
     
	  <div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin"?></span></div>
      </div>
   </ul>
</nav>

<div id="left_side_bar">
<ul id="menu_list">
  <a class="menu_items_link" href="../view_registered_students/view_registered_students.php"><li class="menu_items_list">Registered Students</li></a>
  <a class="menu_items_link" href="../students_assumptions/students_assumptions.php"><li class="menu_items_list">Student Assumptions</li></a>
  <a class="menu_items_link" href="../assign_supervisors/assign_supervisors.php"><li class="menu_items_list">Assign Supervisors</li></a>
  <a class="menu_items_link" href="visiting_supervisors_score.php"><li class="menu_items_list" style="background-color:#3CB4FB;padding-left:16px">Visiting Superviors Score</li></a>
  <a class="menu_items_link" href="../company_score/company_supervisor_score.php"><li class="menu_items_list">Company Supervisor Score</li></a>
  <a class="menu_items_link" href="../change_password/change_password.php"><li class="menu_items_list">Change Password</li></a>
  <a class="menu_items_link" href="../../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle"> Visiting Supervisors Score </h2>
       </div>
            <div class = "panel-body pbody">

              <form method="post" action="">
              <div class="container">
                  <div class="row">
                      <div class="col-xs-5 col-xs-offset-6">
              		    <div class="input-group">
                              <div class="input-group-btn search-panel">
                                  <select class="form-control search_by_side" name="filter-by">
                                    <option>FilterBy</option>
                                    <option>First Name</option>
                                    <option>Last Name</option>
                                    <option>Index Number</option>
                                    <option>Programme</option>
                                    <option>Level</option>
                                    <option>Session</option>
                                    <option>Score</option>

                                  </select>

                              </div>
                              <input type="hidden" name="search_param" value="all" id="search_param">
                              <input type="text" class="form-control" name="txt_search_term" placeholder="Search term...">
                              <span class="input-group-btn">
                                  <input type="submit" class="btn btn-primary" value="search" name="btn_search" id="btn_search">
                              </span>
                            </form>
                          </div>
                      </div>
              	</div>
              </div>
              <br>
              <table class="table table-bordered table-hover">

                  <thead>
                    <tr>

                        <th style="text-align:center">Student Name</th>
                        <th style="text-align:center">Index Number</th>
                        <th style="text-align:center">Programme</th>
                        <th style="text-align:center">Level</th>
                        <th style="text-align:center">Session</th>
                        <th style="text-align:center">Registration Type </th>
                        <th style="text-align: center">Visting Supervisor Name</th>
                        <th style="text-align: center">Visting Supervisor Contact</th>
                        <th style="text-align: center">Score</th>

                    </tr>

                  </thead>

                  <tbody>

                    <?php
                    $mysql_query_command_1 = $mysql_query_1;
                    $execute_result_query = mysqli_query($conn,$mysql_query_command_1);
                    while ($row_set = mysqli_fetch_array($execute_result_query)){

                      echo "<tr style='text-align:center;font-size:1.1em'>";

                      echo "<td>".$row_set["first_name"]."&nbsp;".$row_set["last_name"]."</td>";
                      echo "<td>".$row_set["index_number"]."</td>";
                      echo "<td>".$row_set["programme"]."</td>";
                      echo "<td>".$row_set["level"]."</td>";
                      echo "<td>".$row_set["session"]."</td>";
                      echo "<td>"."Vira Registration"."</td>";
					  echo "<td>".$row_set["visiting_supervisor_name"]."</td>";
                      echo "<td>".$row_set["visiting_supervisor_contact"]."</td>";
					  echo "<td>".$row_set["visiting_supervisor_grade"]."</td>";
						

                      echo "</tr>";

                    }

                    $mysql_query_command_2 = $mysql_query_2;
                    $execute_result_query_2 = mysqli_query($conn,$mysql_query_command_2);
                    while($row_set_2 = mysqli_fetch_array($execute_result_query_2)){

                      echo "<tr style='text-align:center;font-size:1.1em'>";

                      echo "<td>".$row_set_2["first_name"]."&nbsp;".$row_set_2["last_name"]."</td>";
                      echo "<td>".$row_set_2["index_number"]."</td>";
                      echo "<td>".$row_set_2["programme"]."</td>";
                      echo "<td>".$row_set_2["level"]."</td>";
                      echo "<td>".$row_set_2["session"]."</td>";
                      echo "<td>"."Industrial Registration"."</td>";
                      echo "<td>".$row_set_2["visiting_supervisor_name"]."</td>";
                      echo "<td>".$row_set_2["visiting_supervisor_contact"]."</td>";
					  echo "<td>".$row_set_2["visiting_supervisor_grade"]."</td>";
                      echo "</tr>";

                    }
                     ?>
                     
                  </tbody>
            </table>
            <button onclick="window.print()" class= "btn btn-primary">Print</button>
     </div>
   </div>
 </div>
 
</body>
</html>
