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
	$ID= validate($_POST['ID']);
    $type= validate($_POST['type']);
    $link= validate($_POST['link']);
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
    $sql01="SELECT OffDes,RedZone FROM offense WHERE OffenID= '$ID' ";
    $result = mysqli_query($conn, $sql01);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);
            $OffenceDes=$row[0];
            $RedZone = $row[1];

    $RedZone_part=$RedZone/3;
    //$Fine = $Initial+$MidPer+$EndPer;

    if($type=="Public"){
        $sql02="SELECT ID_Num,Per_Type FROM surv_person WHERE File_Link= '$link' ";
        $result02 = mysqli_query($conn, $sql02);
        $row02 = mysqli_fetch_array($result02,MYSQLI_NUM);
            $ID_Num=$row02[0];
            $Person_Type=$row02[1];
        $sql03="SELECT Int_Amount,MidPer,EndPer FROM fine WHERE OffenID= '$ID' AND Per_Type='$Person_Type' ";
        $result03 = mysqli_query($conn, $sql03);
        $row03 = mysqli_fetch_array($result03,MYSQLI_NUM);
            $Initial=$row03[0];
            $MidPer=$row03[1];
            $EndPer=$row03[2];


        $sql = "INSERT INTO public_sus (ID_Status,PubFileLink,OffenDes,Date,Detected_Accuracy,Num_Of_Cam,Num_Of_Drone,Time,Location,Pub_ID)
         VALUES('A','$link','$OffenceDes','$date','$accuracy','$cam', '$drone', '$time', '$location','$ID_Num')";
		$res = mysqli_query($conn, $sql);
        $query="UPDATE public_sus SET days=DATEDIFF(NOW(),Date) WHERE PubFileLink= '$link' AND OffenDes='$OffenceDes'";
        $resultnew= mysqli_query($conn, $query);


		if ($res) {
            $sql13="SELECT Pub_Index FROM public_sus WHERE PubFileLink= '$link' AND OffenDes='$OffenceDes'";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Pub_Index=$row13[0];

            $query6="UPDATE public_sus SET FineAmount=$Initial WHERE Pub_Index=$Pub_Index AND days<=$RedZone_part";
            $resultnew6= mysqli_query($conn, $query6);


            $query7="UPDATE public_sus SET FineAmount=$Initial+$Initial*$MidPer/100 WHERE Pub_Index=$Pub_Index AND days>$RedZone_part AND days<=2*$RedZone_part";
            $resultnew7= mysqli_query($conn, $query7);


            $query8="UPDATE public_sus SET FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Pub_Index=$Pub_Index AND days>2*$RedZone_part AND days<=$RedZone";
            $resultnew8= mysqli_query($conn, $query8);

            $query5="UPDATE public_sus SET ID_Status='I',FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Pub_Index=$Pub_Index AND days>$RedZone";
            $resultnew5= mysqli_query($conn, $query5);

            if($result13){
                $sql12 = "INSERT INTO commited_by_pub(Pub_Index,Offence_Id)  VALUES('$Pub_Index','$ID')";
                $res12 = mysqli_query($conn, $sql12);
                if(!empty($cam1)){
                    $sql15 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO caught_pub(Pub_Index,Detector_Id)  VALUES('$Pub_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }

             header("Location: succesful.php");

            }else{
                header("Location: succesful_not.php");
            }
		}else {
            header("Location: succesful_not.php");
        }

    }else if($type=="Traffic"){

        $sql04="SELECT Veh_ID,Owner_ID FROM vehicle WHERE Veh_Link= '$link' ";
        $result04 = mysqli_query($conn, $sql04);
        $row04 = mysqli_fetch_array($result04,MYSQLI_NUM);
            $Vehicle_ID=$row04[0];
            $ID_Num=$row04[1];

        $sql06="SELECT Per_Type FROM surv_person WHERE ID_Num= '$ID_Num' ";
        $result06 = mysqli_query($conn, $sql06);
        $row06 = mysqli_fetch_array($result06,MYSQLI_NUM);
                $Person_Type=$row06[0];

        $sql05="SELECT Int_Amount,MidPer,EndPer FROM fine WHERE OffenID= '$ID' AND Per_Type='$Person_Type' ";
        $result05 = mysqli_query($conn, $sql05);
        $row05 = mysqli_fetch_array($result05,MYSQLI_NUM);
            $Initial=$row05[0];
            $MidPer=$row05[1];
            $EndPer=$row05[2];

        $sql11 = "INSERT INTO traffic_sus (ID_Status,TraffFileLink,OffenDes,Date,Detected_Accuracy,Num_Of_Cam,Num_Of_Drone,Time,Location,Owner_ID)
         VALUES('A','$link','$OffenceDes','$date','$accuracy','$cam', '$drone', '$time', '$location','$ID_Num')";
		$res11= mysqli_query($conn, $sql11);

        $query="UPDATE traffic_sus SET days=DATEDIFF(NOW(),Date) WHERE TraffFileLink= '$link' AND OffenDes='$OffenceDes'";
        $resultnew= mysqli_query($conn, $query);

		if ($res11) {
            $sql13="SELECT Traf_Index FROM traffic_sus WHERE TraffFileLink= '$link' AND OffenDes='$OffenceDes'";
            $result13 = mysqli_query($conn, $sql13);
            $row13 = mysqli_fetch_array($result13,MYSQLI_NUM);
            $Traff_Index=$row13[0];

            $query6="UPDATE traffic_sus SET FineAmount=$Initial WHERE Traf_Index=$Traff_Index AND days<=$RedZone_part";
            $resultnew6= mysqli_query($conn, $query6);


            $query7="UPDATE traffic_sus SET FineAmount=$Initial+$Initial*$MidPer/100 WHERE Traf_Index=$Traff_Index AND days>$RedZone_part AND days<=2*$RedZone_part";
            $resultnew7= mysqli_query($conn, $query7);


            $query8="UPDATE traffic_sus SET FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Traf_Index=$Traff_Index AND days>2*$RedZone_part AND days<=$RedZone";
            $resultnew8= mysqli_query($conn, $query8);

            $query5="UPDATE traffic_sus SET ID_Status='I',FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Traf_Index=$Traff_Index AND days>$RedZone";
            $resultnew5= mysqli_query($conn, $query5);

            if($result13){
                $sql12 = "INSERT INTO commited_by_traf(Traff_Index,Offence_Id)  VALUES('$Traff_Index','$ID')";
                $res12 = mysqli_query($conn, $sql12);

                if(!empty($cam1)){
                    $sql15 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$cam1')";
                    $res15 = mysqli_query($conn, $sql15);
                }
                if(!empty($cam2)){
                    $sql16 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$cam2')";
                    $res16 = mysqli_query($conn, $sql16);
                }
                if(!empty($cam3)){
                    $sql17 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$cam3')";
                    $res17 = mysqli_query($conn, $sql17);
                }
                if(!empty($cam4)){
                    $sql18 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$cam4')";
                    $res18 = mysqli_query($conn, $sql18);
                }
                if(!empty($cam5)){
                    $sql19 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$cam5')";
                    $res19 = mysqli_query($conn, $sql19);
                }
                if(!empty($drone1)){
                    $sql20 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$drone1')";
                    $res20 = mysqli_query($conn, $sql20);
                }
                if(!empty($drone2)){
                    $sql21 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$drone2')";
                    $res21 = mysqli_query($conn, $sql21);
                }
                if(!empty($drone3)){
                    $sql22 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$drone3')";
                    $res22 = mysqli_query($conn, $sql22);
                }
                if(!empty($drone4)){
                    $sql23= "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$drone4')";
                    $res23= mysqli_query($conn, $sql23);
                }
                if(!empty($drone5)){
                    $sql24 = "INSERT INTO caught_traff(Traf_Index,Detector_Id)  VALUES('$Traff_Index','$drone5')";
                    $res24 = mysqli_query($conn, $sql24);
                }
                if($res12){
                    header("Location: succesful.php");
                    //header("Location: succesful.php");
                }
            }else{
                header("Location: succesful_not.php");
                //header("Location: succesful_not.php");
            }

		}else {
			header("Location: succesful_not.php");
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

    input[type="radio"]{
    width:5%;
    }
    </style>
</head>

<body link="white" alink="black" vlink="#F8F8FF"><br />

    <!--moving heading-->
    <font color="#A6ACAF" size="5">
        <marquee><b><i>Add Suspect to the Database System</i></b></marquee>
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
        <form method="post" action="add_Suspect.php">
        <form>
            <table>
                <tr>
                    <td><h4>Offense ID:</h4></td>
                    <td><input type="text" name="ID" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Offense Type:</h4></td>
                    <td colspan="2"><input type="radio" name="type" value="Public">Public
                        <input type="radio" name="type" value="Traffic">Traffic</td>
                </tr>

                <tr>
                    <td><h4>File Link:</h4></td>
                    <td><input type="text" name="link" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Date:</h4></td>
                    <td><input type="text" name="date" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Time:</h4></td>
                    <td><input type="text" name="time" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Location:</h4></td>
                    <td><input type="text" name="location" size="80"></td>
                </tr>
                <tr>
                    <td><h4>Number of Cam:</h4></td>
                    <td ><input type="text" name="cam" size="80">
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
                    <td><h4>Number of Drone:</h4></td>
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
