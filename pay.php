<?php
require_once("hgutil.php");
require_once("constants.php");
//require_once("checkSession.php");

$link=mysqli_connect("localhost", $DB_USER, $DB_PASSWORD, $DATABASE);
if (mysqli_connect_errno($link)) 
{
    die("connect to db error");
}
mysqli_query($link, "SET NAMES UTF8");
$querystring="insert into trytopay(`price`) values(".$_GET[price].")";
mysqli_query($link, $querystring);
mysqli_close($link);



$merID = "800039289992039";

$debug = $_GET['debug'];
if(isset($debug))
    $merID = "800039253112072";



$para = array(
"acqID" => "99020344",
"backURL" => "http://www.necta.online/namelator/callback.php",
"charSet" => "UTF-8",
"frontURL" => "http://www.necta.online/namelator/success.html",
"merID" => $merID,
"merReserve" => "namelator",
"orderAmount" => $_GET['price'],
"orderCurrency"=> "USD",
"orderNum" => $_GET['orderID'],
"paymentSchema" => "FC",
"signType" => "MD5",
"transTime" => $_GET['payTime'],
"transType" => "PURC",
"version" => "VER000000002",
"goodsInfo"=>"Necta namelator Service",
"detailInfo"=>"W3siZ29vZHNfbmFtZSI6IuiLueaenCIsInF1YW50aXR5IjoiMyJ9LHsiZ29vZHNfbmFtZSI6IuapmOWtkCIsInF1YW50aXR5IjoiNyJ9XQ==",
);
$key = "zfpCQUOoAMrzRcSxgUQWDvn58Dhds5Lv";
if(isset($debug))
    $key = "4c8439822c1244e19db5e97a4b39dfe4";

$ht = new hgutil($para, $key, "MD5", isset($debug));
//print_r($para);
$url = $ht->create_url();
$url ="Location:".$url;
//echo $url;
header($url);

?>
