<?php

require __DIR__ . '/sdk/vendor/autoload.php';
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
/**
 * 第一步：设置一个全局客户端
 * 使用阿里云RAM账号的AccessKey ID和AccessKey Secret进行鉴权
 * 
 */

function getToken(){
    AlibabaCloud::accessKeyClient(
        "LTAI2t3Ei3NT8QyT",
        "xOsBmzGdRdKJn6eNahUUJKAK1oiK8i")
        ->regionId("cn-shanghai")
        ->asDefaultClient();
        try {
        $response = AlibabaCloud::nlsCloudMeta()
                                ->v20180518()
                                ->createToken()
                                ->request();
        // print $response . "\n";
        $token = $response["Token"];
        if ($token != NULL) {
            // print "Token 获取成功：\n";
            return $token;
            // print_r($token['Id']);
        
        }
        else {
            return '';
            // print "token 获取失败\n";
        }
        } catch (ClientException $exception) {
        // 获取错误消息
        print_r($exception->getErrorMessage());
        } catch (ServerException $exception) {
        // 获取错误消息
        print_r($exception->getErrorMessage());
        }
}


?>