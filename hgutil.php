<?php

class hgutil {
	var $gateway = "https://api.allpayx.com/pay?"; //Purchase gateway address
	var $parameter;       
	var $security_code;  	
	var $mysign;             

	
	function hgutil($parameter,$security_code,$sign_type = "MD5",$debug=false) {
		$this->parameter      = $this->para_filter($parameter);
		$this->security_code  = $security_code;
		$this->sign_type      = $sign_type;
		$this->mysign         = '';
		//$this->transport      = $transport;
		if($parameter['charSet'] == "")
		$this->parameter['charSet']='UTF-8';
		
		if($debug == true)
			$this->gateway = "https://testapi.allpayx.com/pay?";

		$sort_array = array();
		$arg = "";
		$sort_array = $this->arg_sort($this->parameter);
		while (list ($key, $val) = each ($sort_array)) {
			$arg.=$key."=".$this->charset_encode($val,$this->parameter['charSet'])."&";
		}
		$prestr = substr($arg,0,count($arg)-2); 
	//	echo $prestr.$this->security_code;
		$this->mysign = $this->sign($prestr.$this->security_code);
	}


	function create_url() {
		$url = $this->gateway;
		$sort_array = array();
		$arg = "";
		$sort_array = $this->arg_sort($this->parameter);
		while (list ($key, $val) = each ($sort_array)) {
			$arg.=$key."=".urlencode($this->charset_encode($val,$this->parameter['charSet']))."&";
		}
		$url.= $arg."signature=" .$this->mysign;
		return $url;

	}

	function arg_sort($array) {
		ksort($array);
		reset($array);
		return $array;

	}

	function sign($prestr) {
		$mysign = "";
		if($this->sign_type == 'MD5') {
			$mysign = md5($prestr);
		}elseif($this->sign_type =='DSA') {
			
			die("DSA is not supported today,please use MD5");
		}else {
			die("Not supported today".$this->sign_type."signature algorithm");
		}
		return $mysign;

	}
	function para_filter($parameter) { 
		$para = array();
		while (list ($key, $val) = each ($parameter)) {
			if($key == "sign" || $key == "sign_type" || $val == "")continue;
			else	$para[$key] = $parameter[$key];

		}
		return $para;
	}
	//using multiply encoding. 
	function charset_encode($input,$_output_charset ,$charSet ="UTF-8" ) {
		$output = "";
		if(!isset($_output_charset) )$_output_charset  = $this->parameter['charSet'];
		if($charSet == $_output_charset || $input ==null) {
			$output = $input;
		} elseif (function_exists("mb_convert_encoding")){
			$output = mb_convert_encoding($input,$_output_charset,$charSet);
		} elseif(function_exists("iconv")) {
			$output = iconv($charSet,$_output_charset,$input);
		} else die("sorry, you have no libs support for charset change.");
		return $output;
	}
	

}


?>
