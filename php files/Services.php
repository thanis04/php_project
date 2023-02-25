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
            Services we provide<br />
        </font>
    </h1>

    <!--code for links to select to login-->
    <h3 align="center">
        <br />
        <font face="Lato" color="#CBC3E3" size="5">
            We help to identify and notify the suspects who violates public rules inorder to mainatain a violation free environment<br/>
            We help to detect most wanted criminals through our system<br/>
            we help to find missing people, missing vehicle and missing objects<br/>
            public can update the system with the missing things belongs to them which helps us to find their belongings<br/>
            All individual can view their Fine details and they can apply for reconsideration if they wish<br/>

        </font><br /><br />

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
