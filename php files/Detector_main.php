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
            font-size: 30px;
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
        <marquee><b><i>Main Page for Admin</i></b></marquee>
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
    <br /><br /><br /><br /><br />

    <!--home page description-->
    <!--code for links to select to login-->
    <h3 align="center">
    <br />
        <font face="Lato" color="#CBC3E3" size="6">
            ADD DETECTED SUSPECT
        </font><br /><br />
        <div>
            <button class="button"  onclick="location.href='add_Suspect.php'"  style="color:CBC3E3">ADD</button><br/>
        </div>
        <br />
        <font face="Lato" color="#CBC3E3" size="6">
            ADD DETECTED MISSING OR MOSTWANTED
        </font><br /><br />
        <div>
            <button class="button"  onclick="location.href='add_detected_wanted.php'"  style="color:CBC3E3">ADD</button><br/>
        </div>
        <br />


        <!--footer part common to all pages-->
        <div id="bottom">
            <hr width="1540px">
            <center>
                <b>
                    <font face="cinzel" size="4">
                        <a href="#">About Us|
                            <a href="#"> Services |
                                <a href="#">Fine Details |
                                    <a href="#"> How to Use |
                                        <a href="#">Help
                                        </a><br />
                                        <font color="#CBC3E3">Done by SC/2019/11129</font>
                    </font>
                </b>
            </center>
        </div>

</body>
</html>
<?php mysqli_close($conn);?>
