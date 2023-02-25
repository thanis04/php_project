<?php session_start(); ?>
<?php require_once('connection.php');?>
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
            color: CBC3E3;
            padding: 3px 8px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
            width: 200px;
            display: inline-block;
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
    <br /><br /><br />

    <!--home page description-->

    <!--code for links to select to login-->
    <h3 align="center">
        <br />
        <font face="Lato" color="#CBC3E3" size="6">
            DELETE DETECTED DETAILS FROM DATABASE
        </font><br /><br />
        <div>
            <button class="button"  onclick="location.href='delete_suspect.php'"  style="color:CBC3E3">Suspect</button>
            <button class="button"  onclick="location.href='delete_detected.php'" style="color:CBC3E3">Detected Details</button>

</div>
<br/>
        <font face="Lato" color="#CBC3E3" size="6">
            DELETE REGISTERED DETAILS FROM DATABASE
        </font><br /><br />
        <div>
            <button class="button"  onclick="location.href='delete_person.php'" style="color:CBC3E3">Public</button>
            <button class="button"  onclick="location.href='delete_vehicle.php'" style="color:CBC3E3">Vehicle</button>
            <button class="button"  onclick="location.href='delete_offense.php'" style="color:CBC3E3">Offense</button><br/>
            <button class="button"  onclick="location.href='delete_admin.php'" style="color:CBC3E3">Admin</button>
            <button class="button"  onclick="location.href='delete_cam.php'" style="color:CBC3E3">Camera</button>
            <button class="button"  onclick="location.href='delete_drone.php'" style="color:CBC3E3">Drone</button><br/>
            <button class="button"  onclick="location.href='delete_mostWanted.php'"  style="color:CBC3E3">Most wanted</button>
            <button class="button"  onclick="location.href='delete_MissPerson.php'"  style="color:CBC3E3">Missing Person</button>
            <button class="button"  onclick="location.href='delete_MissVehicle.php'" style="color:CBC3E3">Missing Vehicle</button>
            <button class="button"  onclick="location.href='delete_missObject.php'" style="color:CBC3E3">Missing Object</button>
        </div>
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
