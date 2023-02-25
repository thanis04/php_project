<?php session_start(); ?>
<?php   require_once("connection.php"); ?>
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
            background-color: #b1509c;
            border: 2px solid #CBC3E3;
            color: black;
            padding: 5px 10px;
            text-align: center;
            display: inline-block;
            font-size: 25px;
            margin: 10px 30px;
            cursor: pointer;
        }

        .box {
            width: 360px;
            height: 280px;
            margin: auto;
            border-radius: 3px;
            background-color: white;
        }

        #bottom {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body link="white" alink="black" vlink="#F8F8FF">

    <!--moving heading-->
    <font color="#A6ACAF" size="5">
        <marquee><b><i>Welcome to Human Surveillance System</i></b></marquee>
    </font>
    <br />

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

    <!--code for button links-->
    <h3 align="center"><br />

        <font face="Lato" color="#CBC3E3" size="6">
            Fine Details
        </font><br />
        <div>
         <button type="button1" class="button" onclick="location.href='Display_Fine.php'" style="color: #CBC3E3"> My Fine</button>
        <br/>
         <br/>
         <font face="Lato" color="#CBC3E3" size="6">
            Add Missing Person or Objects
        </font>
        <br/>
         <button type="button3" class="button" onclick="location.href='add_miss_Vehicle.php'" style="color: #CBC3E3">Add Missing Vehicle</button>
         <br/>
         <button  class="button" onclick="location.href='add_miss_Object.php'" style="color: #CBC3E3">Add Missing Object</button>
         <br/>
         <button  class="button" onclick="location.href='add_miss_Person.php'" style="color: #CBC3E3">Add Missing Person</button>

        </div>

        <!--footer common for all-->
        <div id="bottom">
            <hr width="1540px">
            <center>
                <b>
                <font face="cinzel" size="4">
                        <a href="login_person.php">Back to previous page|
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
