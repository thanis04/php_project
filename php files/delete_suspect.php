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
    $user_id=validate($_POST['uId']);
    $type=validate($_POST['type']);

     if($type=='Public'){
        $query1 = "delete from public_sus where Pub_Index='$user_id'";
        $excecute1 = mysqli_query($conn,$query1);

        $query2 = "delete from caught_pub where Pub_Index='$user_id'";
        $excecute2 = mysqli_query($conn,$query2);


        if($excecute1 and $excecute2){
          header('Location:deleted.php');
            }else{
             header('Location:deleted_not.php');
            }

     }else if($type=='Traffic'){
        $query1 = "delete from traffic_sus where Traf_Index='$user_id'";
        $excecute1 = mysqli_query($conn,$query1);

        $query2 = "delete from caught_traff where Traf_Index='$user_id'";
        $excecute2 = mysqli_query($conn,$query2);


        if($excecute1 and $excecute2){
          header('Location:deleted.php');
            }else{
             header('Location:deleted_not.php');
            }

     }

        }


?>



<!DOCTYPE html>
<html>
	<head>
	<title>Login Page</title>
    <style>
        body {
    background-image: url('https://cdn.wallpapersafari.com/55/90/srHJTi.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    font-family: "Roboto", sans-serif;
}

.login-box {
width: 360px;
height: 350px;
margin: auto;
border-radius: 3px;
background-color: white;
}

h1 {
text-align: center;
padding-top: 15px;
}

form {
width: 300px;
margin-left: 20px;
}

form label {
display: flex;
margin-top: 20px;
font-size: 18px;
}

form input {
width: 100%;
padding: 7px;
border: none;
border: 1px solid gray;
border-radius: 6px;
outline: none;
}
form input[type="submit"] {
width: 100%;
height: 35px;
margin-top: 20px;
border: none;
background-color: #DA70D6;
color: white;
font-size: 18px;
}
.para-2 {
text-align: center;
color: white;
font-size: 15px;
margin-top: -10px;
}
.para-2 a {
color: #DA70D6;
}
#bottom {
position:absolute;
bottom:0;
}
input[type="radio"]{
    width:5%;
    }
    </style>
	</head>
	<body link="white" alink="black" vlink="#F8F8FF"> <!--link color formatting-->

    <!--Moving Heading-->
    <font color="#A6ACAF" size="4">
      <marquee><b><i>Delete Suspect Information</i></b></marquee>
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
      <h1>Delete Suspect Details</h1>
      <form method="post" action="delete_suspect.php">

	  <label for="uname"><b>Index</b></label>
	  <input type="text"  name="uId" ><br/>
      <label for="uname"><b>Offense Type of suspect:</b></label>
        <input type="radio" name="type" value="Public">Public </br>
        <input type="radio" name="type" value="Traffic" >Traffic
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
