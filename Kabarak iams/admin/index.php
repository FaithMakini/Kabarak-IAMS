<?php
include '../database_connection/database_connection.php';

if(isset($_POST["btn_login"])){
  if($_POST["admin_password"]!=""){
	$entered_password = $_POST["admin_password"];
    $check_password_query = "SELECT * FROM system_admin WHERE password='$entered_password' LIMIT 1";
    $execute_check_password_query = mysqli_query($conn,$check_password_query);
    $check_admin_validity = mysqli_num_rows($execute_check_password_query);

    if($check_admin_validity==1){
      header("Location:view_registered_students/view_registered_students.php");
    }else{
		echo "<script>alert('Entered Password Is Incorrect')</script>";
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
  <link rel="stylesheet" href="login.css" />

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="info">
      <h1>Administrator </h1>
    </div>
  </div>
  <div class="form">
    <div class="thumbnail"><img src="../images/manager.png" /></div>
    <form class="login-form" action="" method="post">
      <input type="text" placeholder="Username" name="username" required />
      <input type="password" class="form-control form-control-adjusted" id="admin_password" name="admin_password" placeholder="Enter Password"/>
      <input type="submit" class="btn btn-primary" value="Login" id="btn_visiting_login" name="btn_login"/>

    </form>

  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/index.js'></script>
</body>

</html>