<?php
echo "OK";




require_once("constants.php");
// require_once("checkSession.php");

$link=mysqli_connect("localhost", $DB_USER, $DB_PASSWORD, $DATABASE);
    

if (mysqli_connect_errno($link)) 
{
    die("connect to db error");
}

mysqli_query($link, "SET NAMES UTF8");

$orderNum = $_GET['orderNum'];
$price = $_GET['orderAmount'];
$RespCode = $_GET['RespCode'];
$payTime = $_GET['transTime'];

if($RespCode == "00" && strlen($orderNum)>0){
    $querystring="insert into payrecord(`orderID`,`price`,`RespCode`,`payTime`) values('". $orderNum."', '".$price."','".$RespCode."','".$payTime."')";
    echo $querystring;
    $result = mysqli_query($link, $querystring);
}

mysqli_close($link);


?>