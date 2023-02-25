<?php
include 'connection.php';
if (isset($_POST['submit'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$person_Id= validate($_POST['ID_Num']);
    $Link= validate($_POST['WantFileLink']);
    $Special_fea= validate($_POST['Special_Fac']);



		$sql = "INSERT INTO miss_per VALUES('$person_Id', '$Link', '$Special_fea')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
            header('Location:succesful.php');

		}else {
            header('Location:succesful_not.php');

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
      height: 320px;
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
    <br/><br/><br/><br/>
    <div class="input-box">
        <form method="post" action="add_miss_Person.php">
        <form>
        <h3 align = "center">Add Missing Person to Database</h3>
            <table>
                <tr>
                    <td><h4>Person ID:</h4></td>
                    <td><input type="text" name="ID_Num"></td>
                </tr>
                <tr>
                    <td><h4>File Link:</h4></td>
                    <td><input type="text" name="WantFileLink" /></td>
                </tr>
                <tr>
                    <td><h4>Special Factors:</h4></td>
                    <td><input type="text" name="Special_Fac" /></td>
                </tr>



            </table>
          <input type="Submit" value="ADD" name="submit">
        </form>
      </div>

      <!--footer part common to all pages-->
      <br/><br/><br/><br/><br/>
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
