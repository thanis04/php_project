<?php session_start();?>
<?php require_once('connection.php');?>
<?php

$sql = "SELECT Detected_Accuracy FROM public_sus WHERE Pub_ID='{$_SESSION['person']}'";
$res = mysqli_query($conn, $sql);
$count1=0;
if(!empty($res)){
    while ($row = mysqli_fetch_array($res,MYSQLI_NUM)) {
        if($row[0]<=60){
            $count1=$count1+1;
        }
    }
}
$sql1 = "SELECT Detected_Accuracy FROM traffic_sus WHERE Owner_ID='{$_SESSION['person']}'";
$res1 = mysqli_query($conn, $sql1);
$count2=0;
if(!empty($res1)){
    while ($row = mysqli_fetch_array($res1,MYSQLI_NUM)) {
        if($row[0]<=60){
            $count2=$count2+1;
        }
    }
}
$count=$count1+$count2;

if($count>0){
    $message="Your Reconsideration query is accepted";
}else if($count==0){
    $message="Your Reconsideration query is denied";
}


$sql2 = "SELECT Veh_ID,Veh_Type FROM vehicle WHERE Owner_ID='{$_SESSION['person']}'";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2,MYSQLI_NUM);

if ($res) {
    echo "Your message was sent successfully!";
}else {
    echo "Your message could not be sent!";
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

        .button {
            background-color: rgb(177, 80, 156);
            border: 2px solid #CBC3E3;
            color: black;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
        }

        #bottom {
            position: absolute;
            bottom: 0;
        }
        div{
	padding: 5px;
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
    </h3>
    <br /><br /><br /><br /><br /><br/><br/><br/><br/><br/><br/>

    <!--home page description-->
    <h1 align="center">
        <font color="#DA70D6" size="8">
        <?php echo $message; ?><br />
        </font>
    </h1>

        <!--footer part common to all pages-->
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
