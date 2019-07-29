<?php
require_once("constants.php");
require_once("checkSession.php");

$link=mysqli_connect("localhost", $DB_USER, $DB_PASSWORD, $DATABASE);
    

if (mysqli_connect_errno($link)) 
{
    die("connect to db error");
}

mysqli_query($link, "SET NAMES UTF8");

$mail = $_GET['mail'];
$sql="select * from record where mail='".$mail."' order by create_time desc";

$result = mysqli_query($link, $sql);

$num_rows = mysqli_num_rows($result);
if($num_rows <= 0){
    $arr = array ('result'=>"OK", 'number'=>0);
    echo json_encode($arr);
}else{
    $members = array();
    
    while($row = mysqli_fetch_array($result)){
        $orderID=$row['orderID'];
        $status=$row['status'];
        $name=$row['name'];
        $cost=$row['cost'];
        $family_name=$row['family_name'];
        $last_name=$row['last_name'];
        $remark=$row['remark'];
        $birth=$row['birth'];
        $sex=$row['sex'];
        $create_time=$row['create_time'];
        $notify_time = $row['notify_time'];
        $wuxing = $row['wuxing'];
        $arr = array ('create_time'=>$create_time,'orderID'=>$orderID, 'status'=>$status,'name'=>$name, 'create_time'=>$create_time,'cost'=>$cost,
        'family_name'=>$family_name,'last_name'=>$last_name,'remark'=>$remark,'birth'=>$birth,'sex'=>$sex,'notify_time'=>$notify_time,'wuxing'=>$wuxing);
                
        array_push($members, $arr);
    }
    $arr = array ('result'=>"OK", 'number'=>$num_rows, 'list'=>$members);
    echo json_encode($arr);
}

mysqli_close($link);
?>