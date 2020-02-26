<?php
/*
require 'ISO7064Mod97_10.php'
$c = new ISO7064Mod97_10()

$n = 107571
$yourNum = $c->encode($n)
var_dump($yourNum)
//int(10757107)
var_dump($c->verify($yourNum))

$validNumber = '10757107'
$invalidNumber = '10767107'
var_dump($c->verify($validNumber))
var_dump($c->verify($invalidNumber))

*/
class ISO7064Mod97_10{
	
	function encode($str){
		
	  $c = $this->checkCode("$str");
	  if($c == 0){
	    return (int)"${str}00";
	  }elseif($c < 10) {
	    return (int)"${str}0${c}";
	  }else{
	    return (int)"${str}${c}";
	  }
	}
	function verify($str){
		return ((($this->computeCheck("$str")) % 97)==1);
	}
	
	function checkCode($str){
		return ( 98 - ($this->computeCheck("${str}00") % 97 ) );
	}
	
	function computeCheck($str)
	{
		$ai=1;
		$ch = ord($str[strlen($str)-1]) - 48;
		
		if ($ch < 0 || $ch > 9) return 0;
		
		$check=$ch;
		for($i=strlen($str)-2;$i>=0;$i--){
			$ch = ord($str[$i]) - 48;
			if ($ch < 0 || $ch > 9) return 0;
			$ai=($ai*10)%97;
			$check+= ($ai * ((int)$ch));
		}
		return $check;
	}
	
	function getCheck($str){
		return (int)substr("$str", strlen("$str")-2);
	}
	
	function getData($str){
		return (int)substr("$str", 0, strlen("$str")-2);
	}
}

/*
$codClient = 123456;

require 'ISO7064Mod97_10.php';
$checkISOMod97_10 = new Simple_ISO7064Mod97_10();

$number = $checkISOMod97_10->encode($codClient);//12345676
$getClientNumber = 12345675
var_dump($checkISOMod97_10->verify($getClientNumber))

*/
class Simple_ISO7064Mod97_10{
	
	function encode($str){
	  $c = $this->computeCheck($str);
	  if($c == 0){
	    return (int)"${str}00";
	  }elseif($c < 10) {
	    return (int)"${str}0${c}";
	  }else{
	    return (int)"${str}${c}";
	  }
	}
	function verify($str) {
		return ((((int)$str) % 97)==1);
	}
	
	function computeCheck($str){
		return ( 98 - (((int)$str*100)%97) )%97;
	}
	
	function getCheck($str){
		return (int)substr($str, strlen($str)-2);
	}
	
	function getData($str){
		return (int)substr($str, 0, strlen($str)-2);
	}
}
