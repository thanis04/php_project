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
    $type= validate($_POST['type']);
    $link= validate($_POST['Link']);
    $date= validate($_POST['date']);
    $time= validate($_POST['time']);
    $location= validate($_POST['location']);
    $cam= validate($_POST['cam']);
    $cam1= validate($_POST['cam1']);
    $cam2= validate($_POST['cam2']);
    $cam3= validate($_POST['cam3']);
    $cam4= validate($_POST['cam4']);
    $cam5= validate($_POST['cam5']);
    $drone= validate($_POST['drone']);
    $drone1= validate($_POST['drone1']);
    $drone2= validate($_POST['drone2']);
    $drone3= validate($_POST['drone3']);
    $drone4= validate($_POST['drone4']);
    $drone5= validate($_POST['drone5']);
    $accuracy= 14*$cam + 30*$drone;
    if($accuracy>100){
        $accuracy=100;
    }


    //$Fine = $Initial+$MidPer+$EndPer;

    if($type=="Most_Wanted"){
        $sql02="SELECT ID_Num FROM most_wanted WHERE File_Link= '$link' ";
        $result02 = mysqli_query($conn, $sql02);
        $row02 = mysqli_fetch_array($result02,MYSQLI_NUM);
            $ID_Num=$row02[0];

        $sql = "INSERT INTO detected (ID_Type,DetectedFileLink,Num_Of_Cam,Time,Detected_Accuracy,Date,Num_Of_Drone,Last_Loc,Detected_ID)
         VALUES('Most Wanted','$link','$cam','$time','$accuracy','$date', '$drone','$location','$ID_Num')";
		$res = mysqli_query($conn, $sql);


		if ($res) {

            $sql13="SELECT DETECTED_INDEX FROM detected WHERE DetectedFileLink= '$link' ";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Index=$row13[0];
            if($result13){
                if(!empty($cam1)){
                    $sql15 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }
            header('Location:succesful.php');
            }else{
                header('Location:succesful_not.php');
            }
		}else {
			header('Location:succesful_not.php');
        }
    }else if($type=="Miss_Person"){
        $sql02="SELECT ID_Num FROM miss_per WHERE File_Link= '$link' ";
        $result02 = mysqli_query($conn, $sql02);
        $row02 = mysqli_fetch_array($result02,MYSQLI_NUM);
            $ID_Num=$row02[0];

        $sql = "INSERT INTO detected (ID_Type,DetectedFileLink,Num_Of_Cam,Time,Detected_Accuracy,Date,Num_Of_Drone,Last_Loc,Detected_ID)
         VALUES('Missing Person','$link','$cam','$time','$accuracy','$date', '$drone','$location','$ID_Num')";
		$res = mysqli_query($conn, $sql);


		if ($res) {

            $sql13="SELECT DETECTED_INDEX FROM detected WHERE DetectedFileLink= '$link' ";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Index=$row13[0];
            if($result13){
                if(!empty($cam1)){
                    $sql15 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }
            header('Location:succesful.php');
            }else{
                header('Location:succesful_not.php');
            }
		}else {
			header('Location:succesful_not.php');
        }
    }else if($type=="Miss_Vehicle"){
        $sql02="SELECT Veh_ID FROM miss_veh WHERE File_Link= '$link' ";
        $result02 = mysqli_query($conn, $sql02);
        $row02 = mysqli_fetch_array($result02,MYSQLI_NUM);
            $ID_Num=$row02[0];

        $sql = "INSERT INTO detected (ID_Type,DetectedFileLink,Num_Of_Cam,Time,Detected_Accuracy,Date,Num_Of_Drone,Last_Loc,Detected_ID)
         VALUES('Missing Vehicle','$link','$cam','$time','$accuracy','$date', '$drone','$location','$ID_Num')";
		$res = mysqli_query($conn, $sql);


		if ($res) {
            $sql13="SELECT DETECTED_INDEX FROM detected WHERE DetectedFileLink= '$link' ";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Index=$row13[0];
            if($result13){
                if(!empty($cam1)){
                    $sql15 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }
            header('Location:succesful.php');
            }else{
                header('Location:succesful_not.php');
            }
		}else {
			header('Location:succesful_not.php');
        }
    }else if($type=="Miss_Object"){
        $sql02="SELECT Owner_ID FROM miss_obj WHERE File_Link= '$link' ";
        $result02 = mysqli_query($conn, $sql02);
        $row02 = mysqli_fetch_array($result02,MYSQLI_NUM);
            $ID_Num=$row02[0];

        $sql = "INSERT INTO detected (ID_Type,DetectedFileLink,Num_Of_Cam,Time,Detected_Accuracy,Date,Num_Of_Drone,Last_Loc,Detected_ID)
         VALUES('Missing Object','$link','$cam','$time','$accuracy','$date', '$drone','$location','$ID_Num')";
		$res = mysqli_query($conn, $sql);
		if ($res) {
            $sql13="SELECT DETECTED_INDEX FROM detected WHERE DetectedFileLink= '$link' ";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Index=$row13[0];
            if($result13){
                if(!empty($cam1)){
                    $sql15 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO found(DETECTED_INDEX,Detector_Id)  VALUES('$Traff_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }
            header('Location:succesful.php');
            }else{
                header('Location:succesful_not.php');
            }
		}else {
			header('Location:succesful_not.php');
        }
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
      height: 750px;
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
        <form method="post" action="add_detected_wanted.php">
        <form>
        <h3 align = "center">Add Detected to Database</h3>
            <table>
                <tr>
                    <td><h4>File Link: </h4></td>
                    <td><input type="text" name="Link" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Detected Type:</h4></td>
                    <td colspan="4"><input type="radio" name="type" value="Most_Wanted">Most Wanted
                        <input type="radio" name="type" value="Miss_Person">Missing Person
                        <input type="radio" name="type" value="Miss_Vehicle">Missing Vehicle
                        <input type="radio" name="type" value="Miss_Object">Missing Object</td>
                </tr>
                <tr>
                    <td><h4>Date: </h4></td>
                    <td><input type="text" name="date" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Time: </h4></td>
                    <td><input type="text" name="time" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Last Location: </h4></td>
                    <td><input type="text" name="location" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Number of Cam: </h4></td>
                    <td><input type="text" name="cam" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Cam Ids:</h4></td>
                    <td colspan="5">
                        <input type="text" name="cam1" size="10">
                        <input type="text" name="cam2" size="10">
                        <input type="text" name="cam3" size="10">
                        <input type="text" name="cam4" size="10">
                        <input type="text" name="cam5" size="10">
                    </td>
                </tr>
                <tr>
                    <td><h4>Number Of Drones: </h4></td>
                    <td><input type="text" name="drone" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Drone Ids:</h4></td>
                    <td colspan="5">
                        <input type="text" name="drone1" size="10">
                        <input type="text" name="drone2" size="10">
                        <input type="text" name="drone3" size="10">
                        <input type="text" name="drone4" size="10">
                        <input type="text" name="drone5" size="10">
                    </td>
                </tr>


            </table>
          <input type="Submit" value="ADD" name="submit">
        </form>
      </div>

      <!--footer part common to all pages-->
      <br/><br/>

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
