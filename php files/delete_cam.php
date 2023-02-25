<?php session_start();?>
<?php 	require_once("connection.php"); ?>
<?php



if (isset($_POST['submit1'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    $id=validate($_POST['Id']);


            $query1 = "delete from detector_cam where Cam_ID='$id' limit 1";


            $excecute1 = mysqli_query($conn,$query1);

            if($excecute1){
				      header('Location:deleted.php');
           }else{
            header('Location:deleted_not.php');

           }

        }


?>



<!DOCTYPE html>
<html>
	<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="css/delete_page.css">
	</head>
	<body link="white" alink="black" vlink="#F8F8FF"> <!--link color formatting-->

    <!--Moving Heading-->
    <font color="#A6ACAF" size="4">
      <marquee><b><i>Delete Detector Camera Information</i></b></marquee>
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
    <br /><br /><br /><br /><br /><br/><br/>

    <div class="login-box">
      <h1>Delete Detector Cam Details</h1>
      <form method="post" action="delete_cam.php">

	  <label for="uname"><b>Cam ID</b></label>
	  <input type="text"  name="Id" ><br/><br/>
      <input type="submit" name="submit1" value="Delete">

      </form>
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
