<?php
include 'connection.php';
if (isset($_POST['submit'])) {

	function validate($data){
     $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$Owner_ID= validate($_POST['owner_ID']);
    $Veh_Id= validate($_POST['Veh_ID']);
    $Veh_Type= validate($_POST['Veh_Type']);
    $Veh_Des= validate($_POST['Veh_Des']);
    $Veh_Link= validate($_POST['link']);

		$sql = "INSERT INTO vehicle VALUES('$Veh_Id', '$Veh_Type', '$Veh_Des', '$Veh_Link', '$Owner_ID')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
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
      height: 450px;
      margin: auto;
      border-radius: 3px;
      background-color: white;
    }
    form {
      width: 700px;
      margin-left: 20px;
    }

    form input {
      width: 500px;
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
    <br/>
    <div class="input-box">
        <form method="post" action="add_vehicle.php">
        <form>
        <h2 align = "center">Add Vehicle to Database</h2>
            <table>
                <tr>
                    <td><h4>Owner ID:</h4></td>
                    <td><input type="text" name="owner_ID"></td>
                </tr>
                <tr>
                    <td><h4>Vehicle ID:</h4></td>
                    <td><input type="text" name="Veh_ID" /></td>
                </tr>
                <tr>
                    <td><h4>Vehicle Type:</h4></td>
                    <td><input type="text" name="Veh_Type" /></td>
                </tr>
                <tr>
                    <td><h4>Vehicle Description:</h4></td>
                    <td><input type="text" name="Veh_Des" /></td>
                </tr>
                <tr>
                    <td><h4>File link:</h4></td>
                    <td><input type="text" name="link" /></td>
                </tr>

            </table>
          <input type="Submit" value="ADD" name="submit">
        </form>
      </div>

      <!--footer part common to all pages-->
      <br/><br/><br/><br/>
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
</html>
<?php mysqli_close($conn);?>
