<?php

include 'database_connection/database_connection.php';

$_SESSION["wrong_password"]="";

if(isset($_POST["btn_signin"])){
  $login_index_number = $_POST["txtusername"];
  $login_password = $_POST["txtpassword"];

  $check_user_existence = "SELECT * FROM registered_students WHERE index_number='$login_index_number' AND password='$login_password' LIMIT 1";
  $run_query = mysqli_query($conn,$check_user_existence);
  $user_exist = mysqli_num_rows($run_query);
  if($user_exist==1){
    $get_user_details = "SELECT * FROM registered_students WHERE index_number='$login_index_number'";
    $run_get_details = mysqli_query($conn,$get_user_details);
    $get_detail = mysqli_fetch_assoc($run_get_details);

    $user_first_name = $get_detail["first_name"];
    $user_last_name = $get_detail["last_name"];
    setcookie("student_first_name",$user_first_name,time() + (86400 * 30),"/");
    setcookie("student_last_name",$user_last_name,time() + (86400 * 30),"/");
    setcookie("student_index_number",$login_index_number,time() + (86400 * 30),"/");

    header("Location:instructions_page/instructions_page.php");

  }else{
    $_SESSION["wrong_password"]="Wrong Username or Password";
  }
}

if(isset($_POST["btn_signup"])){
  $reg_first_name = $_POST["txt_signup_firstname"];
  $reg_last_name = $_POST["txt_signup_lastname"];
  $reg_index_number = $_POST["txt_signup_indexnumber"];
  $reg_password = $_POST["txt_signup_password"];

  if($reg_first_name !="" && $reg_last_name!="" && $reg_index_number!="" && $reg_password!=""){
  $check_existence = "SELECT * FROM registered_students WHERE index_number='$reg_index_number'";
  $execute_check_existence = mysqli_query($conn,$check_existence);
  $data_existence = mysqli_num_rows($execute_check_existence);

  if($data_existence==1){
      $message ="Sorry, Account Already Exists";
      echo "<script>alert('$message')</script>";

  }else{
    $register_student_query = "INSERT INTO registered_students (first_name,last_name,index_number,password) VALUES ('$reg_first_name','$reg_last_name','$reg_index_number','$reg_password')";
    if($execute_register_student = mysqli_query($conn,$register_student_query)){

      setcookie("student_first_name",$reg_first_name,time() + (86400 * 30),"/");
      setcookie("student_last_name",$reg_last_name,time() + (86400 * 30),"/");
      setcookie("student_index_number",$reg_index_number,time() + (86400 * 30),"/");

      header("Location:instructions_page/instructions_page.php");
    }else{
      $error_message ="Unable to register due to errors";
      echo "<script>alert('$error_message')</script>";
    }
  }
}else{
  $fill_spaces_message ="Provide Details For All Spaces";
  echo "<script>alert('$fill_spaces_message')</script>";
}

  }
 ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>


  <link rel="stylesheet" href="css/style.css">

  <script type="text/javascript" src="js/jquery-3.1.1.min.js">
  </script>
  <script type="text/javascript" src="js/bootstrap.min.js">
  </script>

<style>
  body {
    background-image: url("images/kabarak_iams_bg.jpeg");
    background-repeat: no-repeat;  /* To prevent image tiling */
    background-attachment: fixed;   /* To keep image fixed during scrolling */
    background-size: cover;         /* To scale image to cover the entire area */
    "background-size: 1000px 600px"
  }
</style>

</head>

<body>

  <div class="login-wrap">
    <div class="login-html">
      <div class="log">
        <img src="./images/mksu_logo.png" alt="MKSU" width="30%">
      </div>
      <!---->
      <div id="top">
        <h4>Welcome</h4>
      </div>
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
      <div class="login-form">
        <form method="post" action="">
          <div class="sign-in-htm">
            <div class="group">
              <label for="user" class="label">Regno </label>
              <input id="user" type="text" class="input" name="txtusername" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password" class="input" data-type="password" name="txtpassword" required>
            </div>
            <div class="group">
              <input id="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In" name="btn_signin" id="btn_signin" />
            </div>

            <div class="group" style="text-align: center">
              <a href="admin/index.php" ><u style="color:#007bff;text-decoration:none">Administrator</u></a>
            </div>


            <div class="error_message_holder"><span><?php echo $_SESSION["wrong_password"]?></span></div>
          </div>
        </form>

        <form method="post" action="">
          <div class="sign-up-htm">
            <div class="group">
              <label for="firstname" class="label">First Name</label>
              <input id="firstname" type="text" class="input" name="txt_signup_firstname" required>
            </div>
            <div class="group">
              <label for="lastname" class="label">Last Name</label>
              <input id="lastname" type="text" class="input" name="txt_signup_lastname" required>
            </div>
            <div class="group">
              <label for="index_number" class="label">Registration Number</label>
              <input id="index_number" type="text" class="input" name="txt_signup_indexnumber" required>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input id="pass" type="password" class="input" data-type="password" name="txt_signup_password" required>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign Up" name="btn_signup" id="btn_signup" />
            </div>
            <div class="hr"></div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>