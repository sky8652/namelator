<?php

require_once ('XingeApp.php');


$accessID=2100329940;
$secretKey="11478afdead36ceef50ac3950408acf1";

function sendSingleMessage($title='', $content = 'hello', $target='13480697068', $param = 'nb', $type = '1')
{
	global $accessID, $secretKey;

	$resAndroid = XingeApp::PushAccountAndroidWithParamType($accessID, $secretKey, $title, $content, $target, $param, $type);
  //var_dump($resAndroid);
  
  $ajson = $resAndroid;
    
  $ret_code=$ajson['ret_code'];
  
  $resIOS = XingeApp::PushAccountIos($accessID, $secretKey, $content, $target, XingeApp::IOSENV_DEV);
  
  
  if($ret_code === 0){
	  /*
	  $link=mysqli_connect("localhost", "nectaus1", "XYt96583!", "nectaus1_lejun");
		
		if (mysqli_connect_errno($link)) 
		{ 
			//$arraryshow = array ('result'=>"failed", 'reason'=>"connect to db error");
			//echo json_encode($arraryshow);
		}else{
			mysqli_query($link, "SET NAMES UTF8");
			
			$querystring="INSERT INTO messages(`target`, `title`,`content`, `param`, `type`)
		        VALUES('"  . $target . "','" . $title . "','" . $content . "', '". $param . "', " . $type . ")";
		        
			$result = mysqli_query($link, $querystring);
			//$arraryshow = array ('result'=>"OK", 'reason'=>"send succesful");
			//echo json_encode($arraryshow);
			
		}
		
		mysqli_close($link);
		*/
	}
}


function sendTagMessage($title='', $content = 'hello', $tag='yezhu', $param = '', $type = '1000')
{
	global $accessID, $secretKey;
	$resAndroid = XingeApp::PushTagAndroidWithParamType($accessID, $secretKey, $title, $content, $tag, $param, $type);
   //var_dump($resAndroid);
  
  $ajson = $resAndroid;
    
  $ret_code=$ajson['ret_code'];
  
  $resIOS = XingeApp::PushTagIosWithParamType($accessID, $secretKey, $content, $tag, XingeApp::IOSENV_DEV, $param, $type);
  
  
  if($ret_code === 0){
	  /*
	  $link=mysqli_connect("localhost", "nectaus1", "XYt96583!", "nectaus1_lejun");
		
		if (mysqli_connect_errno($link)) 
		{ 
			//$arraryshow = array ('result'=>"failed", 'reason'=>"connect to db error");
			//echo json_encode($arraryshow);
		}else{
			mysqli_query($link, "SET NAMES UTF8");
			
			$querystring="INSERT INTO messages(`target`, `title`,`content`, `param`, `type`)
		        VALUES('"  . $target . "','" . $title . "','" . $content . "', '". $param . "', " . $type . ")";
		    
			$result = mysqli_query($link, $querystring);
			//$arraryshow = array ('result'=>"OK", 'reason'=>"send succesful");
			//echo json_encode($arraryshow);
			
		}
		
		mysqli_close($link);
		*/
	}
}

function sendAllMessage($content = 'hello')
{
	global $accessID, $secretKey;
	
	$res = XingeApp::PushAllAndroid($accessID, $secretKey, $content, "好一个装修app，彻底让我好用起来。");
            
  //var_dump($res);
  
  XingeApp::PushAllIos($accessID, $secretKey, $content, XingeApp::IOSENV_DEV);
   
}

function getPhoneByUserID($link, $userID){

}

/*
$type = $_GET['type'];
//singe message
if($type < 1000){
	sendSingleMessage($_GET['title'], $_GET['content'], $_GET['phone'], $_GET['param'], $type);
}else{
//tag message
	sendTagMessage($_GET['title'], $_GET['content'], $_GET['tag'], $_GET['param'], $type);
}*/

function sendMessage($title, $content, $target, $param, $type){
	//user single message
	if($type < 1000){
		sendSingleMessage($title, $content, $target, $param, $type);
	}else{
	//tag message
		sendTagMessage($title, $content,$target, $param, $type);
	}
}


?>