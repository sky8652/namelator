<?php
require_once("constants.php");
require_once("checkSession.php");
require_once("push/sendMessage.php");

$link=mysqli_connect('localhost',$DB_USER, $DB_PASSWORD, $DATABASE);
// if(!$link){
//     die("连接失败" . mysqli_connect_errno());
// }
if (mysqli_connect_errno($link)) 
{
    
    die("connect to db error");
}

mysqli_query($link, "SET NAMES UTF8");


$mail = $_POST['mail'];

$session = $_GET['session'];
$family_name = $_POST['family_name'];
$last_name = $_POST['last_name'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];
$remark = $_POST['remark'];
$cost = $_POST['cost'];
$orderID = $_POST['orderID'];
$create_time = $_POST['create_time'];
$wuxing = $_POST['wuxing'];
// if(checkSession($link, $mail, $session) == true){
    
//     $hours = date("H");
        $sql = "select * from record where orderID='".$orderID."'";
        $result = mysqli_query($link, $sql);
        $num_rows = mysqli_num_rows($result);
        // echo('aa'.$sql);
        if($num_rows>0){
            // $arr = array ('result'=>"failed", 'reason'=>"orderID has exist", 'code'=>2, 'debug'=>$sql);
            // echo json_encode($arr);
            return;
        }
        
    $querystring="insert into record(`orderID`, `mail`, `family_name`, `last_name`, `birth`, `sex`, `remark`,`cost`,`create_time`,`wuxing`) values('".$orderID."','". $mail."', '".$family_name."','".$last_name."','".
     $birth."', '". $sex."','".$remark."','".$cost."','".$create_time."','".$wuxing."')";
    
    $result = mysqli_query($link, $querystring);

    if($result){
        $arr = array ('result'=>"OK");
        echo json_encode($arr);
        // sendMessage("新翻译任务", $words."个文字翻译任务", "admin", "", 1);
    }else{
        $arr = array ('result'=>"failed", 'reason'=>"创建数据错误", 'code'=>2, 'debug'=>$querystring,'hours'=>$hours);
	    echo json_encode($arr);
    }

// }else{
//     // echo($session);
//     // $arr = array ('result'=>"failed", 'reason'=>"session 失效", 'code'=>1);
// 	echo json_encode($session);
// }
?>