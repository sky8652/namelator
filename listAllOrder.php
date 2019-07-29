<?php
require_once("constants.php");
$link=mysqli_connect("localhost", $DB_USER, $DB_PASSWORD, $DATABASE);

if (mysqli_connect_errno($link)) 
{
    die("connect to db error");
}

mysqli_query($link, "SET NAMES UTF8");

$querystring='select * from record order by create_time DESC,notify_time';
 $result = mysqli_query($link, $querystring);
 $num_rows = mysqli_num_rows($result);
if($num_rows <= 0){
    $arr = array ('result'=>"OK", 'number'=>0);
    echo json_encode($arr);
}else{

    $members = array();
    
    while($row = mysqli_fetch_array($result)){
        $orderID=$row['orderID'];
        $mail=$row['mail'];
        $family_name=$row['family_name'];
        $last_name=$row['last_name'];
        $birth=$row['birth'];
        $sex=$row['sex'];
        $remark=$row['remark'];
        $cost = $row['cost'];
        $status = $row['status'];
        $create_time=$row['create_time'];
        $name = $row['name'];
        $notify_time = $row['notify_time'];
        $wuxing = $row['wuxing'];

        $arr = array ('orderID'=>$orderID, 'mail'=>$mail,'family_name'=>$family_name, 
                'last_name'=>$last_name,'birth'=>$birth, 'sex'=>$sex,'remark'=>$remark,'cost'=>$cost,'status'=>$status,'create_time'=>$create_time,'name'=>$name,'notify_time'=>$notify_time,'wuxing'=>$wuxing);
                
        array_push($members, $arr);
    }
    $arr = array ('result'=>"OK", 'number'=>$num_rows, 'list'=>$members);
    echo json_encode($arr);
}

?>