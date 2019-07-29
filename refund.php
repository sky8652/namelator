<?php
require_once("hgRefundutil.php");

$merID = "800039289992039";
$debug = $_GET['debug'];
if(isset($debug))
    $merID = "800039253112072";

$para = array(
"acqID" => "99020344",
"charSet" => "UTF-8",
"merID" => $merID,
"merReserve" => "namelator",
"returnAmount" => $_GET['price'],
"refundNum"=>time().".".rand(1000,20000),
"orderCurrency"=> "USD",
"orderNum" => $_GET['orderNum'],
"paymentSchema" => "FC",
"signType" => "MD5",
"transTime" => $_GET['transTime'],
"transType" => "REFD",
"version" => "VER000000002",
);
$key = "zfpCQUOoAMrzRcSxgUQWDvn58Dhds5Lv";
if(isset($debug))
    $key = "4c8439822c1244e19db5e97a4b39dfe4";

$ht = new hgutil($para, $key, "MD5", isset($debug));
//print_r($para);
$url = $ht->create_url();
//$url ="Location:".$url;
//echo $url;
//header($url);

$res = curl_file_get_contents($url); 
$arrResult = convertUrlQuery($res);

echo json_encode($arrResult);

function curl_file_get_contents($durl){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $durl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
    $r = curl_exec($ch);
    curl_close($ch);
    return $r;
}

function convertUrlQuery($query)
{
   $queryParts = explode('&', $query);

   $params = array();
   foreach ($queryParts as $param) {
      $item = explode('=', $param);
      $params[$item[0]] = $item[1];
   }

   return $params;
}

?>
