<?php session_start();?>
<?php 	require_once("connection.php"); ?>
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
      width: 570px;
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
        <font color="#CBC3E3" size="3">
            <table  align="center" style='font-size:30px;text-align:center;'>
                <tr>
                    <th><font color="#ec88d7" size="7">Offenses</font></th>
                    <th><font color="#ec88d7" size="7">Fine Amount</font></th>
                </tr>
                <?php $sql3 = "SELECT FineAmount,OffenDes FROM public_sus WHERE Pub_ID='{$_SESSION['person']}'";
                    $res3 = mysqli_query($conn, $sql3);
                    if(!empty($res3)){
                    while ($row3 = mysqli_fetch_array($res3,MYSQLI_NUM)) {?>
                        <tr>
                        <td><?php echo $row3[1]; ?></td>
                        <td ><?php echo $row3[0]; ?></td>
                        </tr>
                <?php }}?>
                <?php $sql4 = "SELECT FineAmount,OffenDes FROM traffic_sus WHERE Owner_ID='{$_SESSION['person']}'";
		        $res4 = mysqli_query($conn, $sql4);
                if(!empty($res4)){
                    while ($row4 = mysqli_fetch_array($res4,MYSQLI_NUM)) {?>
                    <tr>
                        <td><?php echo $row4[1]; ?></td>
                        <td ><?php echo $row4[0]; ?></td>
                        </tr>
                <?php }}?>
                    </table>
                </font>
                <div align="center">
                <button class="button"  onclick="location.href='Display_Fine.php'" name="Back" style="color:CBC3E3;width:150px">Back</button><br/>
                    </div>


      <br/>

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
