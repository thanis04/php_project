<?php session_start();?>
<?php 	require_once("connection.php"); ?>
<?php

$user_id = $password = "";
$user_id_err = $password_err = $query1_err = $result1_err = "";

if (isset($_POST['submit1'])) {


        if(!isset($_POST['uId']) || strlen(trim($_POST['uId']))<1){
            $user_id_err = "*ID Required!";
        }
        else{
            $user_id = mysqli_real_escape_string($conn,$_POST['uId']);
        }

    if(!isset($_POST['psw']) || strlen(trim($_POST['psw']))<1){
            $password_err = "*Password Required!";
        }
        else{
            $password = mysqli_real_escape_string($conn,$_POST['psw']);
        }

        if (empty($user_id_err) && empty($password_err)) {
            $query1 = "select Admin_ID from admin where Admin_ID='$user_id' and Password='$password' limit 1";


            $excecute1 = mysqli_query($conn,$query1);

            $result1 = mysqli_fetch_assoc($excecute1);

            if($result1){
                $_SESSION['admin']=$result1['Admin_ID'];
				        header('Location:Admin_main_base.php');
           }

            else{$result1_err = "*Invalid User ID or Password";}
            }
        else{$query1_err = "*Database query failed";}
        }


?>



<!DOCTYPE html>
<html>
	<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="css/loginpage.css">
	</head>
	<body link="white" alink="black" vlink="#F8F8FF"> <!--link color formatting-->

    <!--Moving Heading-->
    <font color="#A6ACAF" size="5">
      <marquee><b><i>Human Surveillance System Admin Login Page</i></b></marquee>
    </font>

    <!--Top Right corner link set-->
    <h3 align="right">
    <font face="cinzel" size="4">
            <a href="home.php">HOME </a>
            &nbsp;
            <a href="Services.php">SERVICES </a>
            &nbsp;
            <a href="All_Fine.php">FINE DETAILS </a>
            &nbsp;
            <a href="#">HOW TO USE </a>
            &nbsp;
        </font>
    <br /><br /><br /><br /><br />

    <div class="login-box">
      <h1>Login As Admin</h1>
      <form method="post" action="login_Admin.php">
	  <label for="uname"><b>Admin ID</b></label>
	  <input type="text" <?php echo 'value="'.$user_id.'"';?>placeholder="Enter Admin ID" name="uId" required><br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required><br><br>
      <?php echo "<span><b>". $password_err . "</b></span>"; ?>
      <input type="submit" name="submit1" value="Login">

      </form>
    </div>

        <div>
        <?php echo "<span><b>". $query1_err . "</b></span>"; ?>
        <?php  echo "<span><b>". $result1_err . "</b></span>"; ?>
    </div>
 </form>
 <!--Footer common for all pages-->
 <div id="bottom">
      <hr width="1540px">
      <center>
        <b>
        <font face="cinzel" size="4">
                        <a href="home.php">Back to previous page|
                            <a href="home.php"> Home
                                </a><br /><br/>
                                    <font color="#CBC3E3">Done by SC/2019/11129</font>
                    </font>
        </b>
      </center>
    </div>
</body>
</html
<?php mysqli_close($conn);?>
