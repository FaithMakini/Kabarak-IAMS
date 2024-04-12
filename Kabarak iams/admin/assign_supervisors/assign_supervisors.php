
			<?php

include '../../database_connection/database_connection.php';

$regions = array("Greater Accra Region","Central Region","Eastern Region","Western Region",
  "Ashanti Region","Northern Region","Upper East Region","Upper West","Volta Region","Brong Ahafo Region");

$regions_2 = array("-- Select Resident Region --","Greater Accra Region","Central Region","Eastern Region","Western Region",
  "Ashanti Region","Northern Region","Upper East Region","Upper West Region","Volta Region","Brong Ahafo Region");

$faculties = array("-- Select Lecturer Faculty --","FAST","FOE","FBMS","FBNE","FHAS");

	$departments = array("-- Select Lecturer Department -- ","Applied Mathematics","Computer Science","Hospitality","Marketing","Accountancy","Professional Studies","Liberal Studies","Secretariaship","Management Studies","Purchasing and Supply","Electrical/Electronic Engineering","Civil Engineering","Energy Systems Engineering","Automotive Engineering","Mechanical Engineering");

$mysql_query_1 = "SELECT * FROM visiting_lecturers";

$mysql_query_fast = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty = 'FAST'";
$mysql_query_fbms = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty = 'FBMS'";
$mysql_query_foe = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty = 'FOE'";
$mysql_query_fbne = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty = 'FBNE'";
$mysql_query_fhas = "SELECT * FROM visiting_lecturers WHERE lecturer_faculty = 'FHAS'";

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
  <a class="menu_items_link" href="../students_assumptions/students_assumptions.php"><li class="menu_items_list" >Student Assumptions</li></a>
  <a class="menu_items_link" href="assign_supervisors.php"><li class="menu_items_list" style="background-color:#3CB4FB;padding-left:16px">Assign Supervisors</li></a>
  <a class="menu_items_link" href="../visiting_score/visiting_supervisors_score.php"><li class="menu_items_list">Visiting Superviors Score</li></a>
  <a class="menu_items_link" href="../company_score/company_supervisor_score.php"><li class="menu_items_list">Company Supervisor Score</li></a>
  <a class="menu_items_link" href="../change_password/change_password.php"><li class="menu_items_list">Change Password</li></a>
  <a class="menu_items_link" href="../../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div class="container-fluid">
<div id="main_content">
	<div class = "panel">
	   <div class = "panel-heading phead">
		  <h2 class = "panel-title ptitle"> Assign Supervisors</h2>
	   </div>
			<div class = "panel-body pbody">

			<div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Students Statistics</h2>
		   </div>
				<div class = "panel-body pbody">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center">Nairobi</th>
						<th style="text-align:center">Central</th>
						<th style="text-align:center">Eastern</th>
						<th style="text-align:center">Western</th>
						<th style="text-align:center">Ashanti</th>
						<th style="text-align:center">Northern</th>
						<th style="text-align:center">Upper East</th>
						<th style="text-align:center">Upper West</th>
						<th style="text-align:center">Volta</th>
						<th style="text-align:center">Brong Ahafo</th>

					</tr>

				  </thead>

				  <tbody>
					<?php

					echo "<tr style='text-align:center;font-size:1.1em' width='100%'>";

					$mycounter = 0;                
					while($mycounter < 10){	
					$selected_item = $regions[$mycounter];
					$mysql_query_command_1 = "SELECT company_region FROM students_assumption WHERE company_region='$selected_item'";				
					$execute_result_query = mysqli_query($conn,$mysql_query_command_1);
					$row_cnt = mysqli_num_rows($execute_result_query); 					
					echo "<td>".$row_cnt."</td>";						
					$mycounter++;							
					}

					echo "</tr>";

					 ?>
				  </tbody>
			</table>
	 </div>
   </div>


			   <div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Registered Lecturers</h2>
		   </div>
				<div class = "panel-body pbody">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center">Name</th>
						<th style="text-align:center">Faculty</th>
						<th style="text-align:center">Department</th>
						<th style="text-align:center">Phone Number</th>
						<th style="text-align:center">Residence Region</th>
						<th style="text-align:center">E-mail</th>

					</tr>

				  </thead>

				  <tbody>
					<?php

					echo "<tr style='text-align:center;font-size:1.1em' width='100%'>";

					$mysql_query_command_1 = $mysql_query_1;
					$execute_result_query = mysqli_query($conn,$mysql_query_command_1);
					while ($row_set = mysqli_fetch_array($execute_result_query)){

					  echo "<tr style='text-align:center;font-size:1.1em'>";

					  echo "<td>".$row_set["lecturer_name"]."</td>";
					  echo "<td>".$row_set["lecturer_faculty"]."</td>";
					  echo "<td>".$row_set["lecturer_department"]."</td>";
					  echo "<td>".$row_set["lecturer_phone_number"]."</td>";
					  echo "<td>".$row_set["lecturer_region_residence"]."</td>";
					  echo "<td>".$row_set["lecturer_email"]."</td>";

					  echo "</tr>";

					}


					echo "</tr>";

					 ?>
				  </tbody>
			</table>
	 </div>
   </div>

   <div class="panel">
	 <div class = "panel-heading phead phead-adjusted">
		  <h2 class = "panel-title ptitle"> Add Lecturer</h2>
	   </div>
			<div class = "panel-body">

			<form method="post" action="">

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="text" placeholder="Enter Name" name="txt_lecturer_name" class="form-control"/>
			</div>

			<div class="col-md-5">
			 <select class="form-control" id="lecturers_department" name="lecturers_department">
			  <?php
			  foreach($departments as $val) { echo "<option>".$val."</option>";};
			  ?>
			</select>
			</div>


			</div>
			</div>
			<br>

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="text" placeholder="Enter Contact (0200000000)" name="txt_lecturer_contact" class="form-control"/>
			</div>

			<div class="col-md-5">
			<select class="form-control" id="lecturers_faculty" name="lecturers_faculty">
			  <?php
				foreach($faculties as $val) { echo "<option>".$val."</option>";};
			   ?>
			</select>
			</div>


			</div>
			</div>
			<br>

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="email" placeholder="Enter valid email address" name="txt_lecturer_email" class="form-control"/>
			</div>

			<div class="col-md-5">
			<select class="form-control" id="selected_region" name="selected_region">
			<?php
			foreach($regions_2 as $val) { echo "<option>".$val."</option>";};
			?>
			</select>
			</div>

			</div>
			</div>

			<div style="float: right">
			<input type="submit" value="Add" name="btn_add_lecturer" class="btn btn-primary"/>
			</div>

			</div>           

	   </div>

			</form>	
   </div>

 </div>



 <div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Assign Supervisors</h2>
		   </div>
				<div class = "panel-body pbody">
			  
			  <form method="post" action="">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center" width="10%">Regions</th>
						<th colspan="5" style="text-align:center">Faculties</th>

					</tr>

				  </thead>
		  
				  <tbody>


				  <tr style='text-align:center;font-size:1.1em' width='100%'>

						<td></td>
						<td>FAST</td>
						<td>FBMS</td>
						<td>FOE</td>
						<td>FBNE</td>
						<td>FHAS</td>

				  </tr>

				  <tr>

					<td>Greater Accra Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_accra_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_accra_fast">                  	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_accra_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_accra_fbms">                  	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_accra_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_accra_foe">                  	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_accra_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_accra_fbne">                  	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_accra_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_accra_fhas">                  	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>                 

				  <tr>

					<td>Central Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_fbms">                  	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_foe">                 	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_fbne">                	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_fhas">                	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Eastern Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_fbms">                	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_foe">                 	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_fbne">                	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_fhas">                	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Western Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_fbms">                	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_foe">                 	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_fbne">                	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_fhas">                	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Ashanti Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_ashanti_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_ashanti_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_ashanti_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_ashanti_fbms">                	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_ashanti_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_ashanti_foe">                 	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_ashanti_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_ashanti_fbne">                	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_ashanti_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_ashanti_fhas">                	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Northern Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_northern_fast">              	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_northern_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_northern_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_northern_fbms">               	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_northern_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_northern_foe">                	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_northern_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_northern_fbne">               	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_northern_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_northern_fhas">               	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Upper East Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_east_fast">              
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_east_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_east_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_east_fbms">               	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_east_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_east_foe">                	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_east_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_east_fbne">               	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_east_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_east_fhas">               	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Upper West Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_west_fast">              
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_west_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_west_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_west_fbms">               	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_west_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_west_foe">                	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_west_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_west_fbne">               	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_upper_west_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_upper_west_fhas">               	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Volta Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_volta_fast">              
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_volta_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_volta_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_volta_fbms">               	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_volta_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_volta_foe">                	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_volta_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_volta_fbne">               	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_volta_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_volta_fhas">               	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Brong Ahafo Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_brong_fast">              
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_brong_fast">               	
					<?php
					$execute_mysql_query_fast = mysqli_query($conn,$mysql_query_fast);
					while($get_fast_details = mysqli_fetch_array($execute_mysql_query_fast)){								
						echo "<option>".$get_fast_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_brong_fbms">              	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_brong_fbms">               	
					<?php
					$execute_mysql_query_fbms = mysqli_query($conn,$mysql_query_fbms);
					while($get_fbms_details = mysqli_fetch_array($execute_mysql_query_fbms)){								
						echo "<option>".$get_fbms_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>

					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_brong_foe">              	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_brong_foe">                	
					<?php
					$execute_mysql_query_foe = mysqli_query($conn,$mysql_query_foe);
					while($get_foe_details = mysqli_fetch_array($execute_mysql_query_foe)){								
						echo "<option>".$get_foe_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_brong_fbne">              	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_brong_fbne">               	
					<?php
					$execute_mysql_query_fbne = mysqli_query($conn,$mysql_query_fbne);
					while($get_fbne_details = mysqli_fetch_array($execute_mysql_query_fbne)){								
						echo "<option>".$get_fbne_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_brong_fhas">              	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_brong_fhas">               	
					<?php
					$execute_mysql_query_fhas = mysqli_query($conn,$mysql_query_fhas);
					while($get_fhas_details = mysqli_fetch_array($execute_mysql_query_fhas)){								
						echo "<option>".$get_fhas_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  </tbody>
				  
			</table>

			  <div style="float: right">
			<input type="submit" name="btn-assign-lecturers" class="btn btn-primary" value="Assign Supervisors"/>
			</div>
			
			</form>
	 </div>
	</div>
 </div>

<?php 

	if(isset($_POST["btn_add_lecturer"])){

		$lecturer_name = $_POST["txt_lecturer_name"];
		$lecturer_department = $_POST["lecturers_department"];
		$lecturer_contact = $_POST["txt_lecturer_contact"];
		$lecturer_faculty = $_POST["lecturers_faculty"];
		$lecturer_email = $_POST["txt_lecturer_email"];
		$lecturer_region = $_POST["selected_region"];

		if($lecturer_name!=""&&$lecturer_department!=""&&$lecturer_contact!=""&&$lecturer_faculty!=""&&$lecturer_region!=""){
			$my_insert_query = "INSERT INTO `visiting_lecturers` (`id`, `lecturer_name`, `lecturer_faculty`, `lecturer_phone_number`, `lecturer_region_residence`, `lecturer_department`, `lecturer_email`) VALUES (NULL, '$lecturer_name', '$lecturer_faculty', '$lecturer_contact', '$lecturer_region', '$lecturer_department', '$lecturer_email')";
			if($execute_my_insert_query = mysqli_query($conn,$my_insert_query)){				
				echo "<script>alert ('Lecturer Has Been Added Successfully');</script>";
			}
		}else{
			echo "<script>alert ('Please Fill All Required Spaces');</script>";
		}
	}

	if(isset($_POST["btn-assign-lecturers"])){
		
		$lecturer_1_accra_fast = $_POST["selected_lecturer_1_accra_fast"];
		$lecturer_2_accra_fast = $_POST["selected_lecturer_2_accra_fast"];
		$lecturer_1_accra_fbms = $_POST["selected_lecturer_1_accra_fbms"];
		$lecturer_2_accra_fbms = $_POST["selected_lecturer_2_accra_fbms"];
		$lecturer_1_accra_foe = $_POST["selected_lecturer_1_accra_foe"];
		$lecturer_2_accra_foe = $_POST["selected_lecturer_2_accra_foe"];
		$lecturer_1_accra_fbne = $_POST["selected_lecturer_1_accra_fbne"];
		$lecturer_2_accra_fbne = $_POST["selected_lecturer_2_accra_fbne"];
		$lecturer_1_accra_fhas = $_POST["selected_lecturer_1_accra_fhas"];
		$lecturer_2_accra_fhas = $_POST["selected_lecturer_2_accra_fhas"];

		$lecturer_1_central_fast = $_POST["selected_lecturer_1_central_fast"];
		$lecturer_2_central_fast = $_POST["selected_lecturer_2_central_fast"];
		$lecturer_1_central_fbms = $_POST["selected_lecturer_1_central_fbms"];
		$lecturer_2_central_fbms = $_POST["selected_lecturer_2_central_fbms"];
		$lecturer_1_central_foe = $_POST["selected_lecturer_1_central_foe"];
		$lecturer_2_central_foe = $_POST["selected_lecturer_2_central_foe"];
		$lecturer_1_central_fbne = $_POST["selected_lecturer_1_central_fbne"];
		$lecturer_2_central_fbne = $_POST["selected_lecturer_2_central_fbne"];
		$lecturer_1_central_fhas = $_POST["selected_lecturer_1_central_fhas"];
		$lecturer_2_central_fhas = $_POST["selected_lecturer_2_central_fhas"];

		$lecturer_1_eastern_fast = $_POST["selected_lecturer_1_eastern_fast"];
		$lecturer_2_eastern_fast = $_POST["selected_lecturer_2_eastern_fast"];
		$lecturer_1_eastern_fbms = $_POST["selected_lecturer_1_eastern_fbms"];
		$lecturer_2_eastern_fbms = $_POST["selected_lecturer_2_eastern_fbms"];
		$lecturer_1_eastern_foe = $_POST["selected_lecturer_1_eastern_foe"];
		$lecturer_2_eastern_foe = $_POST["selected_lecturer_2_eastern_foe"];
		$lecturer_1_eastern_fbne = $_POST["selected_lecturer_1_eastern_fbne"];
		$lecturer_2_eastern_fbne = $_POST["selected_lecturer_2_eastern_fbne"];
		$lecturer_1_eastern_fhas = $_POST["selected_lecturer_1_eastern_fhas"];
		$lecturer_2_eastern_fhas = $_POST["selected_lecturer_2_eastern_fhas"];

		$lecturer_1_western_fast = $_POST["selected_lecturer_1_western_fast"];
		$lecturer_2_western_fast = $_POST["selected_lecturer_2_western_fast"];
		$lecturer_1_western_fbms = $_POST["selected_lecturer_1_western_fbms"];
		$lecturer_2_western_fbms = $_POST["selected_lecturer_2_western_fbms"];
		$lecturer_1_western_foe = $_POST["selected_lecturer_1_western_foe"];
		$lecturer_2_western_foe = $_POST["selected_lecturer_2_western_foe"];
		$lecturer_1_western_fbne = $_POST["selected_lecturer_1_western_fbne"];
		$lecturer_2_western_fbne = $_POST["selected_lecturer_2_western_fbne"];
		$lecturer_1_western_fhas = $_POST["selected_lecturer_1_western_fhas"];
		$lecturer_2_western_fhas = $_POST["selected_lecturer_2_western_fhas"];

		$lecturer_1_ashanti_fast = $_POST["selected_lecturer_1_ashanti_fast"];
		$lecturer_2_ashanti_fast = $_POST["selected_lecturer_2_ashanti_fast"];
		$lecturer_1_ashanti_fbms = $_POST["selected_lecturer_1_ashanti_fbms"];
		$lecturer_2_ashanti_fbms = $_POST["selected_lecturer_2_ashanti_fbms"];
		$lecturer_1_ashanti_foe = $_POST["selected_lecturer_1_ashanti_foe"];
		$lecturer_2_ashanti_foe = $_POST["selected_lecturer_2_ashanti_foe"];
		$lecturer_1_ashanti_fbne = $_POST["selected_lecturer_1_ashanti_fbne"];
		$lecturer_2_ashanti_fbne = $_POST["selected_lecturer_2_ashanti_fbne"];
		$lecturer_1_ashanti_fhas = $_POST["selected_lecturer_1_ashanti_fhas"];
		$lecturer_2_ashanti_fhas = $_POST["selected_lecturer_2_ashanti_fhas"];

		$lecturer_1_northern_fast = $_POST["selected_lecturer_1_northern_fast"];
		$lecturer_2_northern_fast = $_POST["selected_lecturer_2_northern_fast"];
		$lecturer_1_northern_fbms = $_POST["selected_lecturer_1_northern_fbms"];
		$lecturer_2_northern_fbms = $_POST["selected_lecturer_2_northern_fbms"];
		$lecturer_1_northern_foe = $_POST["selected_lecturer_1_northern_foe"];
		$lecturer_2_northern_foe = $_POST["selected_lecturer_2_northern_foe"];
		$lecturer_1_northern_fbne = $_POST["selected_lecturer_1_northern_fbne"];
		$lecturer_2_northern_fbne = $_POST["selected_lecturer_2_northern_fbne"];
		$lecturer_1_northern_fhas = $_POST["selected_lecturer_1_northern_fhas"];
		$lecturer_2_northern_fhas = $_POST["selected_lecturer_2_northern_fhas"];

		$lecturer_1_upper_east_fast = $_POST["selected_lecturer_1_upper_east_fast"];
		$lecturer_2_upper_east_fast = $_POST["selected_lecturer_2_upper_east_fast"];
		$lecturer_1_upper_east_fbms = $_POST["selected_lecturer_1_upper_east_fbms"];
		$lecturer_2_upper_east_fbms = $_POST["selected_lecturer_2_upper_east_fbms"];
		$lecturer_1_upper_east_foe = $_POST["selected_lecturer_1_upper_east_foe"];
		$lecturer_2_upper_east_foe = $_POST["selected_lecturer_2_upper_east_foe"];
		$lecturer_1_upper_east_fbne = $_POST["selected_lecturer_1_upper_east_fbne"];
		$lecturer_2_upper_east_fbne = $_POST["selected_lecturer_2_upper_east_fbne"];
		$lecturer_1_upper_east_fhas = $_POST["selected_lecturer_1_upper_east_fhas"];
		$lecturer_2_upper_east_fhas = $_POST["selected_lecturer_2_upper_east_fhas"];

		$lecturer_1_upper_west_fast = $_POST["selected_lecturer_1_upper_west_fast"];
		$lecturer_2_upper_west_fast = $_POST["selected_lecturer_2_upper_west_fast"];
		$lecturer_1_upper_west_fbms = $_POST["selected_lecturer_1_upper_west_fbms"];
		$lecturer_2_upper_west_fbms = $_POST["selected_lecturer_2_upper_west_fbms"];
		$lecturer_1_upper_west_foe = $_POST["selected_lecturer_1_upper_west_foe"];
		$lecturer_2_upper_west_foe = $_POST["selected_lecturer_2_upper_west_foe"];
		$lecturer_1_upper_west_fbne = $_POST["selected_lecturer_1_upper_west_fbne"];
		$lecturer_2_upper_west_fbne = $_POST["selected_lecturer_2_upper_west_fbne"];
		$lecturer_1_upper_west_fhas = $_POST["selected_lecturer_1_upper_west_fhas"];
		$lecturer_2_upper_west_fhas = $_POST["selected_lecturer_2_upper_west_fhas"];

		$lecturer_1_volta_fast = $_POST["selected_lecturer_1_volta_fast"];
		$lecturer_2_volta_fast = $_POST["selected_lecturer_2_volta_fast"];
		$lecturer_1_volta_fbms = $_POST["selected_lecturer_1_volta_fbms"];
		$lecturer_2_volta_fbms = $_POST["selected_lecturer_2_volta_fbms"];
		$lecturer_1_volta_foe = $_POST["selected_lecturer_1_volta_foe"];
		$lecturer_2_volta_foe = $_POST["selected_lecturer_2_volta_foe"];
		$lecturer_1_volta_fbne = $_POST["selected_lecturer_1_volta_fbne"];
		$lecturer_2_volta_fbne = $_POST["selected_lecturer_2_volta_fbne"];
		$lecturer_1_volta_fhas = $_POST["selected_lecturer_1_volta_fhas"];
		$lecturer_2_volta_fhas = $_POST["selected_lecturer_2_volta_fhas"];

		$lecturer_1_brong_fast = $_POST["selected_lecturer_1_brong_fast"];
		$lecturer_2_brong_fast = $_POST["selected_lecturer_2_brong_fast"];
		$lecturer_1_brong_fbms = $_POST["selected_lecturer_1_brong_fbms"];
		$lecturer_2_brong_fbms = $_POST["selected_lecturer_2_brong_fbms"];
		$lecturer_1_brong_foe = $_POST["selected_lecturer_1_brong_foe"];
		$lecturer_2_brong_foe = $_POST["selected_lecturer_2_brong_foe"];
		$lecturer_1_brong_fbne = $_POST["selected_lecturer_1_brong_fbne"];
		$lecturer_2_brong_fbne = $_POST["selected_lecturer_2_brong_fbne"];
		$lecturer_1_brong_fhas = $_POST["selected_lecturer_1_brong_fhas"];
		$lecturer_2_brong_fhas = $_POST["selected_lecturer_2_brong_fhas"];
		
		$check_database_table_for_assignment = "SELECT * FROM assigned_lecturers WHERE id='1' LIMIT 1";
		$execute_check_database = mysqli_query($conn,$check_database_table_for_assignment);
		$get_check_database_details = mysqli_num_rows($execute_check_database);
		
		if($get_check_database_details == 1){
			
			
		$mysql_update_accra_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_accra_fast', `second_supervisor_fast` = '$lecturer_2_accra_fast', `first_supervisor_fbms` = '$lecturer_1_accra_fbms', `second_supervisor_fbms` = '$lecturer_2_accra_fbms', `first_supervisor_foe` = '$lecturer_1_accra_foe', `second_supervisor_foe` = '$lecturer_2_accra_foe', `first_supervisor_fbne` = '$lecturer_1_accra_fbne', `second_supervisor_fbne` = '$lecturer_2_accra_fbne', `first_supervisor_fhas` = '$lecturer_1_accra_fhas', `second_supervisor_fhas` = '$lecturer_2_accra_fhas' WHERE `regions` = 'Greater Accra Region'"; 			
		
		$execute_update_for_accra_query = mysqli_query($conn,$mysql_update_accra_query);
			
			//
		
		
		$mysql_update_central_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_central_fast', `second_supervisor_fast` = '$lecturer_2_central_fast', `first_supervisor_fbms` = '$lecturer_1_central_fbms', `second_supervisor_fbms` = '$lecturer_2_central_fbms', `first_supervisor_foe` = '$lecturer_1_central_foe', `second_supervisor_foe` = '$lecturer_2_central_foe', `first_supervisor_fbne` = '$lecturer_1_central_fbne', `second_supervisor_fbne` = '$lecturer_2_central_fbne', `first_supervisor_fhas` = '$lecturer_1_central_fhas', `second_supervisor_fhas` = '$lecturer_2_central_fhas' WHERE `regions` = 'Central Region'"; 			
		
		$execute_update_for_central_query = mysqli_query($conn,$mysql_update_central_query);
			
			//
	
		$mysql_update_eastern_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_eastern_fast', `second_supervisor_fast` = '$lecturer_2_eastern_fast', `first_supervisor_fbms` = '$lecturer_1_eastern_fbms', `second_supervisor_fbms` = '$lecturer_2_eastern_fbms', `first_supervisor_foe` = '$lecturer_1_eastern_foe', `second_supervisor_foe` = '$lecturer_2_eastern_foe', `first_supervisor_fbne` = '$lecturer_1_eastern_fbne', `second_supervisor_fbne` = '$lecturer_2_eastern_fbne', `first_supervisor_fhas` = '$lecturer_1_eastern_fhas', `second_supervisor_fhas` = '$lecturer_2_eastern_fhas' WHERE `regions` = 'Eastern Region'"; 
		
		$execute_update_for_eastern_query = mysqli_query($conn,$mysql_update_eastern_query);
			
			//
		
		
		$mysql_update_western_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_western_fast', `second_supervisor_fast` = '$lecturer_2_western_fast', `first_supervisor_fbms` = '$lecturer_1_western_fbms', `second_supervisor_fbms` = '$lecturer_2_western_fbms', `first_supervisor_foe` = '$lecturer_1_western_foe', `second_supervisor_foe` = '$lecturer_2_western_foe', `first_supervisor_fbne` = '$lecturer_1_western_fbne', `second_supervisor_fbne` = '$lecturer_2_western_fbne', `first_supervisor_fhas` = '$lecturer_1_western_fhas', `second_supervisor_fhas` = '$lecturer_2_western_fhas' WHERE `regions` = 'Western Region'"; 
					
		$execute_update_for_western_query = mysqli_query($conn,$mysql_update_western_query);
			
			//
		
		
		$mysql_update_ashanti_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_ashanti_fast', `second_supervisor_fast` = '$lecturer_2_ashanti_fast', `first_supervisor_fbms` = '$lecturer_1_ashanti_fbms', `second_supervisor_fbms` = '$lecturer_2_ashanti_fbms', `first_supervisor_foe` = '$lecturer_1_ashanti_foe', `second_supervisor_foe` = '$lecturer_2_ashanti_foe', `first_supervisor_fbne` = '$lecturer_1_ashanti_fbne', `second_supervisor_fbne` = '$lecturer_2_ashanti_fbne', `first_supervisor_fhas` = '$lecturer_1_ashanti_fhas', `second_supervisor_fhas` = '$lecturer_2_ashanti_fhas' WHERE `regions` = 'Ashanti Region'"; 
					
		$execute_update_for_ashanti_query = mysqli_query($conn,$mysql_update_ashanti_query);
			
			//
		
		
		$mysql_update_northern_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_northern_fast', `second_supervisor_fast` = '$lecturer_2_northern_fast', `first_supervisor_fbms` = '$lecturer_1_northern_fbms', `second_supervisor_fbms` = '$lecturer_2_northern_fbms', `first_supervisor_foe` = '$lecturer_1_northern_foe', `second_supervisor_foe` = '$lecturer_2_northern_foe', `first_supervisor_fbne` = '$lecturer_1_northern_fbne', `second_supervisor_fbne` = '$lecturer_2_northern_fbne', `first_supervisor_fhas` = '$lecturer_1_northern_fhas', `second_supervisor_fhas` = '$lecturer_2_northern_fhas' WHERE `regions` = 'Northern Region'"; 
					
		$execute_update_for_northern_query = mysqli_query($conn,$mysql_update_northern_query);
			
			//
		
		
		$mysql_update_upper_east_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_upper_east_fast', `second_supervisor_fast` = '$lecturer_2_upper_east_fast', `first_supervisor_fbms` = '$lecturer_1_upper_east_fbms', `second_supervisor_fbms` = '$lecturer_2_upper_east_fbms', `first_supervisor_foe` = '$lecturer_1_upper_east_foe', `second_supervisor_foe` = '$lecturer_2_upper_east_foe', `first_supervisor_fbne` = '$lecturer_1_upper_east_fbne', `second_supervisor_fbne` = '$lecturer_2_upper_east_fbne', `first_supervisor_fhas` = '$lecturer_1_upper_east_fhas', `second_supervisor_fhas` = '$lecturer_2_upper_east_fhas' WHERE `regions` = 'Upper East Region'"; 
					
		$execute_update_for_upper_east_query = mysqli_query($conn,$mysql_update_upper_east_query);
			
			//
		
		
		$mysql_update_upper_west_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_upper_west_fast', `second_supervisor_fast` = '$lecturer_2_upper_west_fast', `first_supervisor_fbms` = '$lecturer_1_upper_west_fbms', `second_supervisor_fbms` = '$lecturer_2_upper_west_fbms', `first_supervisor_foe` = '$lecturer_1_upper_west_foe', `second_supervisor_foe` = '$lecturer_2_upper_west_foe', `first_supervisor_fbne` = '$lecturer_1_upper_west_fbne', `second_supervisor_fbne` = '$lecturer_2_upper_west_fbne', `first_supervisor_fhas` = '$lecturer_1_upper_west_fhas', `second_supervisor_fhas` = '$lecturer_2_upper_west_fhas' WHERE `regions` = 'Upper West Region'"; 
					
		$execute_update_for_upper_west_query = mysqli_query($conn,$mysql_update_upper_west_query);
			
			//
		
		
		$mysql_update_volta_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_volta_fast', `second_supervisor_fast` = '$lecturer_2_volta_fast', `first_supervisor_fbms` = '$lecturer_1_volta_fbms', `second_supervisor_fbms` = '$lecturer_2_volta_fbms', `first_supervisor_foe` = '$lecturer_1_volta_foe', `second_supervisor_foe` = '$lecturer_2_volta_foe', `first_supervisor_fbne` = '$lecturer_1_volta_fbne', `second_supervisor_fbne` = '$lecturer_2_volta_fbne', `first_supervisor_fhas` = '$lecturer_1_volta_fhas', `second_supervisor_fhas` = '$lecturer_2_volta_fhas' WHERE `regions` = 'Volta Region'"; 
				
		$execute_update_for_volta_query = mysqli_query($conn,$mysql_update_volta_query);
			
			//
							
		$mysql_update_brong_query = "UPDATE `assigned_lecturers` SET `first_supervisor_fast` = '$lecturer_1_brong_fast', `second_supervisor_fast` = '$lecturer_2_brong_fast', `first_supervisor_fbms` = '$lecturer_1_brong_fbms', `second_supervisor_fbms` = '$lecturer_2_brong_fbms', `first_supervisor_foe` = '$lecturer_1_brong_foe', `second_supervisor_foe` = '$lecturer_2_brong_foe', `first_supervisor_fbne` = '$lecturer_1_brong_fbne', `second_supervisor_fbne` = '$lecturer_2_brong_fbne', `first_supervisor_fhas` = '$lecturer_1_brong_fhas', `second_supervisor_fhas` = '$lecturer_2_brong_fhas' WHERE `regions` = 'Brong Ahafo Region'"; 
				
		$execute_update_for_brong_query = mysqli_query($conn,$mysql_update_brong_query);
								
								
		}else{


		$mysql_insert_accra_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Greater Accra Region', '$lecturer_1_accra_fast', '$lecturer_2_accra_fast', '$lecturer_1_accra_fbms', '$lecturer_2_accra_fbms', '$lecturer_1_accra_foe', '$lecturer_2_accra_foe', '$lecturer_1_accra_fbne', '$lecturer_2_accra_fbne', '$lecturer_1_accra_fhas', '$lecturer_2_accra_fhas', CURRENT_TIMESTAMP)"; 			
		
		$execute_insert_for_accra_query = mysqli_query($conn,$mysql_insert_accra_query);
			
			//
		
		
		$mysql_insert_central_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Central Region', '$lecturer_1_central_fast', '$lecturer_2_central_fast', '$lecturer_1_central_fbms', '$lecturer_2_central_fbms', '$lecturer_1_central_foe', '$lecturer_2_central_foe', '$lecturer_1_central_fbne', '$lecturer_2_central_fbne', '$lecturer_1_central_fhas', '$lecturer_2_central_fhas', CURRENT_TIMESTAMP)"; 			
		
		$execute_insert_for_central_query = mysqli_query($conn,$mysql_insert_central_query);
			
			//
		
		
		$mysql_insert_eastern_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Eastern Region', '$lecturer_1_eastern_fast', '$lecturer_2_eastern_fast', '$lecturer_1_eastern_fbms', '$lecturer_2_eastern_fbms', '$lecturer_1_eastern_foe', '$lecturer_2_eastern_foe', '$lecturer_1_eastern_fbne', '$lecturer_2_eastern_fbne', '$lecturer_1_eastern_fhas', '$lecturer_2_eastern_fhas', CURRENT_TIMESTAMP)"; 
		
		$execute_insert_for_eastern_query = mysqli_query($conn,$mysql_insert_eastern_query);
			
			//
		
		
		$mysql_insert_western_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Western Region', '$lecturer_1_western_fast', '$lecturer_2_western_fast', '$lecturer_1_western_fbms', '$lecturer_2_western_fbms', '$lecturer_1_western_foe', '$lecturer_2_western_foe', '$lecturer_1_western_fbne', '$lecturer_2_western_fbne', '$lecturer_1_western_fhas', '$lecturer_2_western_fhas', CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_western_query = mysqli_query($conn,$mysql_insert_western_query);
			
			//
		
		
		$mysql_insert_ashanti_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Ashanti Region', '$lecturer_1_ashanti_fast', '$lecturer_2_ashanti_fast', '$lecturer_1_ashanti_fbms', '$lecturer_2_ashanti_fbms', '$lecturer_1_ashanti_foe', '$lecturer_2_ashanti_foe', '$lecturer_1_ashanti_fbne', '$lecturer_2_ashanti_fbne', '$lecturer_1_ashanti_fhas', '$lecturer_2_ashanti_fhas', CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_ashanti_query = mysqli_query($conn,$mysql_insert_ashanti_query);
			
			//
		
		
		$mysql_insert_northern_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Northern Region', '$lecturer_1_northern_fast', '$lecturer_2_northern_fast', '$lecturer_1_northern_fbms', '$lecturer_2_northern_fbms', '$lecturer_1_northern_foe', '$lecturer_2_northern_foe', '$lecturer_1_northern_fbne', '$lecturer_2_northern_fbne', '$lecturer_1_northern_fhas', '$lecturer_2_northern_fhas', CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_northern_query = mysqli_query($conn,$mysql_insert_northern_query);
			
			//
		
		
		$mysql_insert_upper_east_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Upper East Region', '$lecturer_1_upper_east_fast', '$lecturer_2_upper_east_fast', '$lecturer_1_upper_east_fbms', '$lecturer_2_upper_east_fbms', '$lecturer_1_upper_east_foe', '$lecturer_2_upper_east_foe', '$lecturer_1_upper_east_fbne', '$lecturer_2_upper_east_fbne', '$lecturer_1_upper_east_fhas', '$lecturer_2_upper_east_fhas', CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_upper_east_query = mysqli_query($conn,$mysql_insert_upper_east_query);
			
			//
		
		
		$mysql_insert_upper_west_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Upper West Region', '$lecturer_1_upper_west_fast', '$lecturer_2_upper_west_fast', '$lecturer_1_upper_west_fbms', '$lecturer_2_upper_west_fbms', '$lecturer_1_upper_west_foe', '$lecturer_2_upper_west_foe', '$lecturer_1_upper_west_fbne', '$lecturer_2_upper_west_fbne', '$lecturer_1_upper_west_fhas', '$lecturer_2_upper_west_fhas', CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_upper_west_query = mysqli_query($conn,$mysql_insert_upper_west_query);
			
			//
		
		
		$mysql_insert_volta_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Volta Region', '$lecturer_1_volta_fast', '$lecturer_2_volta_fast', '$lecturer_1_volta_fbms', '$lecturer_2_volta_fbms', '$lecturer_1_volta_foe', '$lecturer_2_volta_foe', '$lecturer_1_volta_fbne', '$lecturer_2_volta_fbne', '$lecturer_1_volta_fhas', '$lecturer_2_volta_fhas', CURRENT_TIMESTAMP)"; 
				
		$execute_insert_for_volta_query = mysqli_query($conn,$mysql_insert_volta_query);
			
			//
		
		
		$mysql_insert_brong_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `first_supervisor_fast`, `second_supervisor_fast`, `first_supervisor_fbms`, `second_supervisor_fbms`, `first_supervisor_foe`, `second_supervisor_foe`, `first_supervisor_fbne`, `second_supervisor_fbne`, `first_supervisor_fhas`, `second_supervisor_fhas`, `date`) VALUES (NULL, 'Brong Ahafo Region', '$lecturer_1_brong_fast', '$lecturer_2_brong_fast', '$lecturer_1_brong_fbms', '$lecturer_2_brong_fbms', '$lecturer_1_brong_foe', '$lecturer_2_brong_foe', '$lecturer_1_brong_fbne', '$lecturer_2_brong_fbne', '$lecturer_1_brong_fhas', '$lecturer_2_brong_fhas', CURRENT_TIMESTAMP)"; 
				
		$execute_insert_for_brong_query = mysqli_query($conn,$mysql_insert_brong_query);
							
		}
		
		// Assigning lecturers to vira students
			
			
		$assign_vira_students_lecturers_western_fast = "UPDATE vira_registration SET visiting_supervisor_name = '$lecturer_1_western_fast' WHERE faculty='FAST' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_western_fast = mysqli_query($conn,$assign_vira_students_lecturers_western_fast);
			
			//
			
		$assign_vira_students_lecturers_western_fbms = "UPDATE vira_registration SET visiting_supervisor_name = '$lecturer_1_western_fbms' WHERE faculty='FBMS' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_western_fbms = mysqli_query($conn,$assign_vira_students_lecturers_western_fbms);
			
			//
			
		$assign_vira_students_lecturers_western_foe = "UPDATE vira_registration SET visiting_supervisor_name = '$lecturer_1_western_foe' WHERE faculty='FOE' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_western_foe = mysqli_query($conn,$assign_vira_students_lecturers_western_foe);
			
			//
			
		$assign_vira_students_lecturers_western_fbne = "UPDATE vira_registration SET visiting_supervisor_name = '$lecturer_1_western_fbne' WHERE faculty='FBNE' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_western_fbne = mysqli_query($conn,$assign_vira_students_lecturers_western_fbne);
			
			//
			
		$assign_vira_students_lecturers_western_fhas = "UPDATE vira_registration SET visiting_supervisor_name = '$lecturer_1_western_fhas' WHERE faculty='FHAS' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_western_fhas = mysqli_query($conn,$assign_vira_students_lecturers_western_fhas);
		
		
		
		
			//  Assigning for industrial students
		
		$assign_vira_students_lecturers_accra_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_accra_fast' WHERE faculty='FAST' AND attachment_region='Greater Accra Region'";
			
		$execute_assign_vira_students_lecturers_accra_fast = mysqli_query($conn,$assign_vira_students_lecturers_accra_fast);
			
			//
			
		$assign_vira_students_lecturers_accra_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_accra_fbms' WHERE faculty='FBMS' AND attachment_region='Greater Accra Region'";
			
		$execute_assign_vira_students_lecturers_accra_fbms = mysqli_query($conn,$assign_vira_students_lecturers_accra_fbms);
			
			//
			
		$assign_vira_students_lecturers_accra_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_accra_foe' WHERE faculty='FOE' AND attachment_region='Greater Accra Region'";
			
		$execute_assign_vira_students_lecturers_accra_foe = mysqli_query($conn,$assign_vira_students_lecturers_accra_foe);
			
			//
			
		$assign_vira_students_lecturers_accra_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_accra_fbne' WHERE faculty='FBNE' AND attachment_region='Greater Accra Region'";
			
		$execute_assign_vira_students_lecturers_accra_fbne = mysqli_query($conn,$assign_vira_students_lecturers_accra_fbne);
			
			//
			
		$assign_vira_students_lecturers_accra_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_accra_fhas' WHERE faculty='FHAS' AND attachment_region='Greater Accra Region'";
			
		$execute_assign_vira_students_lecturers_accra_fhas = mysqli_query($conn,$assign_vira_students_lecturers_accra_fhas);
			
			//  central region
			
		$assign_vira_students_lecturers_central_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_fast' WHERE faculty='FAST' AND attachment_region='Central Region'";
			
		$execute_assign_vira_students_lecturers_central_fast = mysqli_query($conn,$assign_vira_students_lecturers_central_fast);
			
			//
			
		$assign_vira_students_lecturers_central_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_fbms' WHERE faculty='FBMS' AND attachment_region='Central Region'";
			
		$execute_assign_vira_students_lecturers_central_fbms = mysqli_query($conn,$assign_vira_students_lecturers_central_fbms);
			
			//
			
		$assign_vira_students_lecturers_central_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_foe' WHERE faculty='FOE' AND attachment_region='Central Region'";
			
		$execute_assign_vira_students_lecturers_central_foe = mysqli_query($conn,$assign_vira_students_lecturers_central_foe);
			
			//
			
		$assign_vira_students_lecturers_central_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_fbne' WHERE faculty='FBNE' AND attachment_region='Central Region'";
			
		$execute_assign_vira_students_lecturers_central_fbne = mysqli_query($conn,$assign_vira_students_lecturers_central_fbne);
			
			//
			
		$assign_vira_students_lecturers_central_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_fhas' WHERE faculty='FHAS' AND attachment_region='Central Region'";
			
		$execute_assign_vira_students_lecturers_central_fhas = mysqli_query($conn,$assign_vira_students_lecturers_central_fhas);
		
		
		
		// Eastern Region
		
		$assign_vira_students_lecturers_eastern_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_fast' WHERE faculty='FAST' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_eastern_fast = mysqli_query($conn,$assign_vira_students_lecturers_eastern_fast);
			
			//
			
		$assign_vira_students_lecturers_eastern_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_fbms' WHERE faculty='FBMS' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_eastern_fbms = mysqli_query($conn,$assign_vira_students_lecturers_eastern_fbms);
			
			//
			
		$assign_vira_students_lecturers_eastern_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_foe' WHERE faculty='FOE' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_eastern_foe = mysqli_query($conn,$assign_vira_students_lecturers_eastern_foe);
			
			//
			
		$assign_vira_students_lecturers_eastern_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_fbne' WHERE faculty='FBNE' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_eastern_fbne = mysqli_query($conn,$assign_vira_students_lecturers_eastern_fbne);
			
			//
			
		$assign_vira_students_lecturers_eastern_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_fhas' WHERE faculty='FHAS' AND attachment_region='Eastern Region'";
			
		$execute_assign_vira_students_lecturers_eastern_fhas = mysqli_query($conn,$assign_vira_students_lecturers_eastern_fhas);
			
			// Western Region
			
		$assign_vira_students_lecturers_western_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_fast' WHERE faculty='FAST' AND attachment_region='Western Region'";
			
		$execute_assign_vira_students_lecturers_western_fast = mysqli_query($conn,$assign_vira_students_lecturers_western_fast);
			
			//
			
		$assign_vira_students_lecturers_western_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_fbms' WHERE faculty='FBMS' AND attachment_region='Western Region'";
			
		$execute_assign_vira_students_lecturers_western_fbms = mysqli_query($conn,$assign_vira_students_lecturers_western_fbms);
			
			//
			
		$assign_vira_students_lecturers_western_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_foe' WHERE faculty='FOE' AND attachment_region='Western Region'";
			
		$execute_assign_vira_students_lecturers_western_foe = mysqli_query($conn,$assign_vira_students_lecturers_western_foe);
			
			//
			
		$assign_vira_students_lecturers_western_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_fbne' WHERE faculty='FBNE' AND attachment_region='Western Region'";
			
		$execute_assign_vira_students_lecturers_western_fbne = mysqli_query($conn,$assign_vira_students_lecturers_western_fbne);
			
			//
			
		$assign_vira_students_lecturers_western_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_fhas' WHERE faculty='FHAS' AND attachment_region='Western Region'";
			
		$execute_assign_vira_students_lecturers_western_fhas = mysqli_query($conn,$assign_vira_students_lecturers_western_fhas);
			
			// Ashanti Region
			
		$assign_vira_students_lecturers_ashanti_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_ashanti_fast' WHERE faculty='FAST' AND attachment_region='Ashanti Region'";
			
		$execute_assign_vira_students_lecturers_ashanti_fast = mysqli_query($conn,$assign_vira_students_lecturers_ashanti_fast);
			
			//
			
		$assign_vira_students_lecturers_ashanti_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_ashanti_fbms' WHERE faculty='FBMS' AND attachment_region='Ashanti Region'";
			
		$execute_assign_vira_students_lecturers_ashanti_fbms = mysqli_query($conn,$assign_vira_students_lecturers_ashanti_fbms);
			
			//
			
		$assign_vira_students_lecturers_ashanti_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_ashanti_foe' WHERE faculty='FOE' AND attachment_region='Ashanti Region'";
			
		$execute_assign_vira_students_lecturers_ashanti_foe = mysqli_query($conn,$assign_vira_students_lecturers_ashanti_foe);
			
			//
			
		$assign_vira_students_lecturers_ashanti_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_ashanti_fbne' WHERE faculty='FBNE' AND attachment_region='Ashanti Region'";
			
		$execute_assign_vira_students_lecturers_ashanti_fbne = mysqli_query($conn,$assign_vira_students_lecturers_ashanti_fbne);
			
			//
			
		$assign_vira_students_lecturers_ashanti_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_ashanti_fhas' WHERE faculty='FHAS' AND attachment_region='Ashanti Region'";
			
		$execute_assign_vira_students_lecturers_ashanti_fhas = mysqli_query($conn,$assign_vira_students_lecturers_ashanti_fhas);
			
			// Northern Region
			
		$assign_vira_students_lecturers_northern_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_northern_fast' WHERE faculty='FAST' AND attachment_region='Northern Region'";
			
		$execute_assign_vira_students_lecturers_northern_fast = mysqli_query($conn,$assign_vira_students_lecturers_northern_fast);
			
			//
			
		$assign_vira_students_lecturers_northern_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_northern_fbms' WHERE faculty='FBMS' AND attachment_region='Northern Region'";
			
		$execute_assign_vira_students_lecturers_northern_fbms = mysqli_query($conn,$assign_vira_students_lecturers_northern_fbms);
			
			//
			
		$assign_vira_students_lecturers_northern_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_northern_foe' WHERE faculty='FOE' AND attachment_region='Northern Region'";
			
		$execute_assign_vira_students_lecturers_northern_foe = mysqli_query($conn,$assign_vira_students_lecturers_northern_foe);
			
			//
			
		$assign_vira_students_lecturers_northern_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_northern_fbne' WHERE faculty='FBNE' AND attachment_region='Northern Region'";
			
		$execute_assign_vira_students_lecturers_northern_fbne = mysqli_query($conn,$assign_vira_students_lecturers_northern_fbne);
			
			//
			
		$assign_vira_students_lecturers_northern_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_northern_fhas' WHERE faculty='FHAS' AND attachment_region='Northern Region'";
			
		$execute_assign_vira_students_lecturers_northern_fhas = mysqli_query($conn,$assign_vira_students_lecturers_northern_fhas);
			
			// Upper East
			
		$assign_vira_students_lecturers_upper_east_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_east_fast' WHERE faculty='FAST' AND attachment_region='Upper East Region'";
			
		$execute_assign_vira_students_lecturers_upper_east_fast = mysqli_query($conn,$assign_vira_students_lecturers_upper_east_fast);
			
			//
			
		$assign_vira_students_lecturers_upper_east_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_east_fbms' WHERE faculty='FBMS' AND attachment_region='Upper East Region'";
			
		$execute_assign_vira_students_lecturers_upper_east_fbms = mysqli_query($conn,$assign_vira_students_lecturers_upper_east_fbms);
			
			//
			
		$assign_vira_students_lecturers_upper_east_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_east_foe' WHERE faculty='FOE' AND attachment_region='Upper East Region'";
			
		$execute_assign_vira_students_lecturers_upper_east_foe = mysqli_query($conn,$assign_vira_students_lecturers_upper_east_foe);
			
			//
			
		$assign_vira_students_lecturers_upper_east_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_east_fbne' WHERE faculty='FBNE' AND attachment_region='Upper East Region'";
			
		$execute_assign_vira_students_lecturers_upper_east_fbne = mysqli_query($conn,$assign_vira_students_lecturers_upper_east_fbne);
			
			//
			
		$assign_vira_students_lecturers_upper_east_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_east_fhas' WHERE faculty='FHAS' AND attachment_region='Upper East Region'";
			
		$execute_assign_vira_students_lecturers_upper_east_fhas = mysqli_query($conn,$assign_vira_students_lecturers_upper_east_fhas);
			
			// Upper west
			
			
		$assign_vira_students_lecturers_upper_west_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_west_fast' WHERE faculty='FAST' AND attachment_region='Upper West Region'";
			
		$execute_assign_vira_students_lecturers_upper_west_fast = mysqli_query($conn,$assign_vira_students_lecturers_upper_west_fast);
			
			//
			
		$assign_vira_students_lecturers_upper_west_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_west_fbms' WHERE faculty='FBMS' AND attachment_region='Upper West Region'";
			
		$execute_assign_vira_students_lecturers_upper_west_fbms = mysqli_query($conn,$assign_vira_students_lecturers_upper_west_fbms);
			
			//
			
		$assign_vira_students_lecturers_upper_west_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_west_foe' WHERE faculty='FOE' AND attachment_region='Upper West Region'";
			
		$execute_assign_vira_students_lecturers_upper_west_foe = mysqli_query($conn,$assign_vira_students_lecturers_upper_west_foe);
			
			//
			
		$assign_vira_students_lecturers_upper_west_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_west_fbne' WHERE faculty='FBNE' AND attachment_region='Upper West Region'";
			
		$execute_assign_vira_students_lecturers_upper_west_fbne = mysqli_query($conn,$assign_vira_students_lecturers_upper_west_fbne);
			
			//
			
		$assign_vira_students_lecturers_upper_west_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_upper_west_fhas' WHERE faculty='FHAS' AND attachment_region='Upper West Region'";
			
		$execute_assign_vira_students_lecturers_upper_west_fhas = mysqli_query($conn,$assign_vira_students_lecturers_upper_west_fhas);
			
			// Volta Region
			
								
		$assign_vira_students_lecturers_volta_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_volta_fast' WHERE faculty='FAST' AND attachment_region='Volta Region'";
			
		$execute_assign_vira_students_lecturers_volta_fast = mysqli_query($conn,$assign_vira_students_lecturers_volta_fast);
			
			//
			
		$assign_vira_students_lecturers_volta_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_volta_fbms' WHERE faculty='FBMS' AND attachment_region='Volta Region'";
			
		$execute_assign_vira_students_lecturers_volta_fbms = mysqli_query($conn,$assign_vira_students_lecturers_volta_fbms);
			
			//
			
		$assign_vira_students_lecturers_volta_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_volta_foe' WHERE faculty='FOE' AND attachment_region='Volta Region'";
			
		$execute_assign_vira_students_lecturers_volta_foe = mysqli_query($conn,$assign_vira_students_lecturers_volta_foe);
			
			//
			
		$assign_vira_students_lecturers_volta_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_volta_fbne' WHERE faculty='FBNE' AND attachment_region='Volta Region'";
			
		$execute_assign_vira_students_lecturers_volta_fbne = mysqli_query($conn,$assign_vira_students_lecturers_volta_fbne);
			
			//
			
		$assign_vira_students_lecturers_volta_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_volta_fhas' WHERE faculty='FHAS' AND attachment_region='Volta Region'";
			
		$execute_assign_vira_students_lecturers_volta_fhas = mysqli_query($conn,$assign_vira_students_lecturers_volta_fhas);
			
			// Brong Ahafo Region
			
		
													
		$assign_vira_students_lecturers_brong_fast = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_brong_fast' WHERE faculty='FAST' AND attachment_region='Brong Ahafo Region'";
			
		$execute_assign_vira_students_lecturers_brong_fast = mysqli_query($conn,$assign_vira_students_lecturers_brong_fast);
			
			//
			
		$assign_vira_students_lecturers_brong_fbms = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_brong_fbms' WHERE faculty='FBMS' AND attachment_region='Brong Ahafo Region'";
			
		$execute_assign_vira_students_lecturers_brong_fbms = mysqli_query($conn,$assign_vira_students_lecturers_brong_fbms);
			
			//
			
		$assign_vira_students_lecturers_brong_foe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_brong_foe' WHERE faculty='FOE' AND attachment_region='Brong Ahafo Region'";
			
		$execute_assign_vira_students_lecturers_brong_foe = mysqli_query($conn,$assign_vira_students_lecturers_brong_foe);
			
			//
			
		$assign_vira_students_lecturers_brong_fbne = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_brong_fbne' WHERE faculty='FBNE' AND attachment_region='Brong Ahafo Region'";
			
		$execute_assign_vira_students_lecturers_brong_fbne = mysqli_query($conn,$assign_vira_students_lecturers_brong_fbne);
			
			//
			
		$assign_vira_students_lecturers_brong_fhas = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_brong_fhas' WHERE faculty='FHAS' AND attachment_region='Brong Ahafo Region'";
			
		$execute_assign_vira_students_lecturers_brong_fhas = mysqli_query($conn,$assign_vira_students_lecturers_brong_fhas);	

		
	}
?>
</body>
</html>
