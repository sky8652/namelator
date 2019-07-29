<?php
require_once("constants.php");
// require_once("checkSession.php");
// require_once("push/sendMessage.php");

$link=mysqli_connect("localhost", $DB_USER, $DB_PASSWORD, $DATABASE);
    

if (mysqli_connect_errno($link)) 
{
    die("connect to db error");
}

mysqli_query($link, "SET NAMES UTF8");

$orderID = $_POST['orderID'];
$name = $_POST['name'];
// return;
if(!$orderID){
    $arr = array('result'=>'fail','reason'=>'订单ID不能为空');
    echo json_encode($arr);
}

// $sql="select * from record where orderID='".$orderID+"'";
// $result = mysqli_query($link,$querystring);
// $num_rows = mysqli_num_rows($result);
// if($num_rows <= 0){
//     return '',
// }else{
//     while($row = mysqli_fetch_array($result)){
//         $user = $row['mail'];
//         return $user;
//     }
// }
date_default_timezone_set('Asia/Shanghai');

$sql2 = "update record set status=2, name='".$name."',notify_time= '".date("Y-m-d H:i:s",time())."' where orderID=".$orderID;
$result = mysqli_query($link,$sql2);
// echo $sql2;
// echo $result;
if($result){
    $arr = array('result'=>'OK');
    echo json_encode($arr);
}else{
    $arr = array('result' => 'failed','reason'=>'上传失败','code'=>2,'debug'=>$sql2);
    echo json_enncode($arr);
}

mysqli_close($link);
?>