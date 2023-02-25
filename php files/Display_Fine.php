<?php session_start();?>
<?php 	require_once("connection.php"); ?>
<?php

		$sql = "SELECT ID_Num,Name,Address,Per_Type,Email,Status FROM surv_person WHERE ID_Num='{$_SESSION['person']}'";
		$res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res,MYSQLI_NUM);
        if($row[3]=="R"){
            $Type="Residant";
        }else if($row[3]=="F"){
            $Type="Foreigner";
        }
        if($row[5]=="A"){
            $status="Active";
        }else if($row[5]=="D"){
            $status="Disabled";
        }
        $abc="SELECT Traf_Index,ID_Status,OffenDes,Date FROM traffic_sus WHERE Owner_ID='{$_SESSION['person']}'";
        $abc_res=mysqli_query($conn, $abc);

        if(mysqli_num_rows($abc_res) != 0){
            while ($row_12 = mysqli_fetch_array($abc_res,MYSQLI_NUM)){
            $Traff_Index=$row_12[0];
            $Status=$row_12[1];
            $OffenDes=$row_12[2];
            $date=$row_12[3];

            $def="SELECT OffenID,RedZone FROM offense WHERE OffDes='$OffenDes'";
            $def_res=mysqli_query($conn, $def);
            $row_def = mysqli_fetch_array($def_res,MYSQLI_NUM);

            $offenID=$row_def[0];
            $RedZone=$row_def[1];
            $RedZone_part=$RedZone/3;

            $ghi="SELECT MidPer,EndPer,Int_Amount FROM fine WHERE OffenID='$offenID' AND Per_Type='$row[3]'";
            $ghi_res=mysqli_query($conn, $ghi);
            $row_ghi = mysqli_fetch_array($ghi_res,MYSQLI_NUM);
            $Initial=$row_ghi[2];
            $MidPer=$row_ghi[0];
            $EndPer=$row_ghi[1];


            $query="UPDATE traffic_sus SET days=DATEDIFF(NOW(),Date) WHERE Traf_Index=$Traff_Index";
            $resultnew= mysqli_query($conn, $query);

            $query6="UPDATE traffic_sus SET FineAmount=$Initial WHERE Traf_Index=$Traff_Index AND days<=$RedZone_part";
            $resultnew6= mysqli_query($conn, $query6);
            $query7="UPDATE traffic_sus SET FineAmount=$Initial+$Initial*$MidPer/100 WHERE Traf_Index=$Traff_Index AND days>$RedZone_part AND days<=2*$RedZone_part";
            $resultnew7= mysqli_query($conn, $query7);
            $query8="UPDATE traffic_sus SET FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Traf_Index=$Traff_Index AND days>2*$RedZone_part AND days<=$RedZone";
            $resultnew8= mysqli_query($conn, $query8);
            $query5="UPDATE traffic_sus SET ID_Status='I',FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Traf_Index=$Traff_Index AND days>$RedZone";
            $resultnew5= mysqli_query($conn, $query5);
            }
        }
        $abc2="SELECT Pub_Index,ID_Status,OffenDes,Date FROM public_sus WHERE Pub_ID='{$_SESSION['person']}'";
        $abc_res2=mysqli_query($conn, $abc2);

        if(mysqli_num_rows($abc_res2) != 0){
            while ($row_12 = mysqli_fetch_array($abc_res2,MYSQLI_NUM)){
            $Pub_Index=$row_12[0];
            $Status=$row_12[1];
            $OffenDes=$row_12[2];
            $date=$row_12[3];

            $def="SELECT OffenID,RedZone FROM offense WHERE OffDes='$OffenDes'";
            $def_res=mysqli_query($conn, $def);
            $row_def = mysqli_fetch_array($def_res,MYSQLI_NUM);

            $offenID=$row_def[0];
            $RedZone=$row_def[1];
            $RedZone_part=$RedZone/3;

            $ghi="SELECT MidPer,EndPer,Int_Amount FROM fine WHERE OffenID='$offenID' AND Per_Type='$row[3]'";
            $ghi_res=mysqli_query($conn, $ghi);
            $row_ghi = mysqli_fetch_array($ghi_res,MYSQLI_NUM);
            $Initial=$row_ghi[2];
            $MidPer=$row_ghi[0];
            $EndPer=$row_ghi[1];


            $query="UPDATE public_sus SET days=DATEDIFF(NOW(),Date) WHERE Pub_Index=$Pub_Index";
            $resultnew= mysqli_query($conn, $query);

            $query6="UPDATE public_sus SET FineAmount=$Initial WHERE Pub_Index=$Pub_Index AND days<=$RedZone_part";
            $resultnew6= mysqli_query($conn, $query6);
            $query7="UPDATE public_sus SET FineAmount=$Initial+$Initial*$MidPer/100 WHERE Pub_Index=$Pub_Index AND days>$RedZone_part AND days<=2*$RedZone_part";
            $resultnew7= mysqli_query($conn, $query7);
            $query8="UPDATE public_sus SET FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Pub_Index=$Pub_Index AND days>2*$RedZone_part AND days<=$RedZone";
            $resultnew8= mysqli_query($conn, $query8);
            $query5="UPDATE public_sus SET ID_Status='I',FineAmount=$Initial+$Initial*$MidPer/100+$Initial*$EndPer/100 WHERE Pub_Index=$Pub_Index AND days>$RedZone";
            $resultnew5= mysqli_query($conn, $query5);
            }
        }
        $sql3 = "SELECT FineAmount,OffenDes FROM public_sus WHERE Pub_ID='{$_SESSION['person']}'";
		$res3 = mysqli_query($conn, $sql3);
        $Fine_pub=0;
        if(!empty($res3)){
            while ($row3 = mysqli_fetch_array($res3,MYSQLI_NUM)) {
                $Fine_pub=$Fine_pub + $row3[0];
            }
        }else{
            $Fine_pub=0;
        }
        $sql4 = "SELECT FineAmount,OffenDes FROM traffic_sus WHERE Owner_ID='{$_SESSION['person']}'";
		$res4 = mysqli_query($conn, $sql4);
        $Fine_traf=0;
        if(!empty($res4)){
            while ($row4 = mysqli_fetch_array($res4,MYSQLI_NUM)) {
                $Fine_traf=$Fine_traf + $row4[0];
            }
        }else{
            $Fine_traf=0;
        }

        $Fine=$Fine_pub+$Fine_traf;

        $sql2 = "SELECT Veh_ID,Veh_Type FROM vehicle WHERE Owner_ID='{$_SESSION['person']}'";
		$res2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($res2) != 0){
            $row2 = mysqli_fetch_array($res2,MYSQLI_NUM);
            $vehicle_type=$row2[1];
            $vehicle_ID=$row2[0];
            $text=", Vehicle_ID ";
        }else{
            $vehicle_type="doesn't have vehicle";
            $vehicle_ID="";
            $text="";
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
      width: 600px;
      height: 380px;
      margin: auto;
      border-radius: 3px;
      background-color: white;
    }
    form {
      width: 800px;
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
    .button {
            width:100%;
            background-color: #DA70D6;
            border: 2px solid #CBC3E3;
            color: black;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
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
    <br/><br/><br/><br/>
    <div class="input-box">

            <table style='font-size:30px'>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $row[1]; ?></td>
                </tr>
                <tr>
                    <td>ID Number:</td>
                    <td><?php echo $row[0]; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $row[2]; ?></td>
                </tr>
                <tr>
                    <td>Vehicle:</td>
                    <td><?php echo $vehicle_type; ?><?php echo $text; ?><?php echo $vehicle_ID; ?></td>
                </tr>
                <tr>
                    <td>Person type:</td>
                    <td><?php echo $Type; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $row[4]; ?></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><?php echo $status; ?></td>
                </tr>

                <tr>
                    <td>Total Fine:</td>
                    <td><?php echo $Fine; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><button class="button"  onclick="location.href='commited_offenses.php'"  style="color:CBC3E3">DETECTED OFFENSES</button><br/></td>
                </tr>

            </table>
      </div>

      <br/>
        <div align="center">
        <font face="Lato" color="#CBC3E3" size="5">
        Apply For Reconsideration to Recheck the detected accuracy
        </font>
            <button class="button"  onclick="location.href='reconsideration.php'" name="reconsider" style="color:CBC3E3;width:150px">Reconsider</button><br/>
        </div>

      <!--footer part common to all pages-->
      <br/>
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
