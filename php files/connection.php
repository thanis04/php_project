<?php

$sname = "localhost";
$uname = "thanis";
$password = "Thanis123";

$db_name = "surveillance";
$port = "306";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
