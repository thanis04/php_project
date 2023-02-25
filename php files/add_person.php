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
	$ID_Number= validate($_POST['ID']);
    $Name= validate($_POST['name']);
    $Address= validate($_POST['address']);
    $File_Link= validate($_POST['link']);
    $Person_type= validate($_POST['Per_type']);
    $Email= validate($_POST['email']);
    $Status= validate($_POST['status']);
    $password= validate($_POST['psw']);


		$sql = "INSERT INTO surv_person VALUES('$ID_Number', '$Name', '$Address', '$File_Link', '$Person_type', '$Email', '$Status', '$password')";
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
      height: 630px;
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
        <marquee><b><i>Add Person Details to the Database System</i></b></marquee>
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
        <form method="post" action="add_person.php">
        <h3 align = "center">Add Person to Database</h3>
            <table>
                <tr>
                    <td><h4>Name:</h4></td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td><h4>ID Number:</h4></td>
                    <td><input type="text" name="ID" /></td>
                </tr>
                <tr>
                    <td><h4>Address:</h4></td>
                    <td><input type="text" name="address" /></td>
                </tr>
                <tr>
                    <td><h4>Person type:</h4></td>
                    <td><input type="text" name="Per_type" /></td>
                </tr>
                <tr>
                    <td><h4>Email:</h4></td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td><h4>Status:</h4></td>
                    <td><input type="text" name="status" /></td>
                </tr>
                <tr>
                    <td><h4>File link:</h4></td>
                    <td><input type="text" name="link" /></td>
                </tr>
                <tr>
                    <td><h4>Password:</h4></td>
                    <td><input type="text" name="psw" /></td>
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
