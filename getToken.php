<?php
require_once('token.php');

// if(file_exists('token.txt')){
    $file = fopen("token.txt", "r") or exit("无法打开文件!");
    // 读取文件每一行，直到文件结尾
    while(!feof($file))
    {
        $a=fgets($file);
        $b = json_decode($a);
        if(($b->ExpireTime) && ($b->ExpireTime > time())){
            // echo('<script>console.log("没过期");</script>');
            $arr = array('result'=>'OK','token'=>$b);
            echo json_encode($arr);
        }else{
            echo('<script>console.log("过期");</script>');
            $c=json_encode(getToken());
            $files = fopen("token.txt", "w") or exit("无法打开文件!");
            fwrite($files,$c);
            $arr = array('result'=>'OK','token'=>json_decode($c));
            echo json_encode($arr); 
           
        }
        
    }
    fclose($file);
// }else{
    
//     echo '不存在';
// }



?>