<?php session_start();?>
<?php 	require_once("connection.php"); ?>
<?php
if (isset($_POST['submit'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$Offense_ID= validate($_POST['OffenID']);
    $Offense_Type= validate($_POST['Off_Type']);
    $OffDes= validate($_POST['OffDes']);
    $Person_Type1= validate($_POST['Per_type1']);
    $Person_Type2= validate($_POST['Per_type2']);
    $Red_Zone= validate($_POST['Red_Zone']);
    $Initial_Amount1= validate($_POST['int_Amount1']);
    $Initial_Amount2= validate($_POST['int_Amount2']);
    $Mid_Percentage1= validate($_POST['MidPer1']);
    $Mid_Percentage2= validate($_POST['MidPer2']);
    $End_Percentage1= validate($_POST['EndPer1']);
    $End_Percentage2= validate($_POST['EndPer2']);


		$sql1 = "INSERT INTO offense VALUES('$Offense_ID', '$OffDes', '$Offense_Type', '$Red_Zone')";
		$sql2 = "INSERT INTO fine VALUES('$Offense_ID', '$Person_Type1', '$Mid_Percentage1', '$End_Percentage1','$Initial_Amount1');";
        $sql2 .="INSERT INTO fine VALUES('$Offense_ID', '$Person_Type2', '$Mid_Percentage2', '$End_Percentage2','$Initial_Amount2')";
        $res1 = mysqli_query($conn, $sql1);
        $res2 = mysqli_multi_query($conn, $sql2);

		if ($res1 && $res2) {
			header("Location: succesful.php");
		}else {
			header("Location: succesful_not.php");
		}


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>www.DatabaseProject.com</title>
    <style>
        body {
        background-image: url('https://cdn.wallpapersafari.com/55/90/srHJTi.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        }

    .input-box {
      width: 750px;
      height: 650px;
      margin: auto;
      border-radius: 3px;
      background-color: white;
    }
    form {
      width: 700px;
      margin-left: 20px;
    }

    form input {
      padding: 6px;
      border: none;
      border: 1px solid gray;
      border-radius: 6px;
      outline: none;
    }

    #bottom {
            position: absolute;
            bottom: 0;
        }

    input[type="submit"]{
        width: 100%;
  height: 35px;
  margin-top: 20px;
  border: none;
  background-color: #DA70D6;
  color: white;
  font-size: 18px;
    }
    </style>
</head>

<body link="white" alink="black" vlink="#F8F8FF"><br />

    <!--moving heading-->
    <font color="#A6ACAF" size="5">
        <marquee><b><i>Welcome to Human Surveillance System</i></b></marquee>
    </font>

    <!--top right corner link set-->
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
    </h4>

    <!--login box-->
    <div class="input-box">
        <form method="post" action="add_offense.php">
        <form>
        <h3 align = "center">Add Offense to Database</h3>
            <table>
                <tr>
                    <td><h4>Offence ID:</h4></td>
                    <td colspan="2"><input type="text" name="OffenID" size="73"></td>
                </tr>
                <tr>
                    <td><h4>Offence Type:</h4></td>
                    <td colspan="2"><input type="text" name="Off_Type" size="73"></td>
                </tr>
                <tr>
                    <td><h4>Offence Description:</h4></td>
                    <td colspan="2"><input type="text" name="OffDes" size="73"></td>
                </tr>
                <tr>
                    <td><h4>Red Zone:</h4></td>
                    <td colspan="2"><input type="text" name="Red_Zone" size="73"></td>
                </tr>
                <tr>
                    <td><h4>Person Type:</h4></td>
                    <td><input type="text" name="Per_type1" size="33"></td>
                    <td><input type="text" name="Per_type2" size="33"></td>
                </tr>
                <tr>
                    <td><h4>Initial Fine:</h4></td>
                    <td><input type="text" name="int_Amount1" size="33"></td>
                    <td><input type="text" name="int_Amount2" size="33"></td>
                </tr>
                <tr>
                    <td><h4>Mid Percentage:</h4></td>
                    <td><input type="text" name="MidPer1" size="33"></td>
                    <td><input type="text" name="MidPer2" size="33"></td>
                </tr>
                <tr>
                    <td><h4>End Percentage:</h4></td>
                    <td><input type="text" name="EndPer1" size="33"></td>
                    <td><input type="text" name="EndPer2" size="33"></td>
                </tr>

            </table>
          <input type="Submit" value="ADD" name="submit">
        </form>
      </div>

      <!--footer part common to all pages-->
      <br/>
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


</body>
</html>
<?php mysqli_close($conn);?>
