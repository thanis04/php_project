<?php session_start(); ?>
<?php require_once('connection.php');?>
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
    <br /><br /><br /><br /><br /><br />

    <!--home page description-->
    <h1 align="center">
        <font color="#DA70D6" size="8">
            Database system for Human surveillance <br />
            which detects violances and penalize the suspect
        </font>
    </h1>

    <!--code for links to select to login-->
    <h3 align="center">
        <br />
        <font face="Lato" color="#CBC3E3" size="6">
            login to the system as
        </font><br /><br />
        <div>
            <input class="button" type="button1" onclick="location.href='login_Person.php'" value="Public" style="color:CBC3E3"><br/>
            <input class="button" type="button2"  onclick="location.href='login_Admin.php'" value="Admin" style="color:CBC3E3"><br/>
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
