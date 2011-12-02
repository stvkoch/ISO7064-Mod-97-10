<?php
/*
require 'ISO7064Mod97_10.php';



*/
class ISO7064Mod97_10{
	
	function encode($str){
	  $c = $this->computeCheck($str);
	  if($c == 0){
	    return $str . "00";
	  }elseif($c < 10) {
	    return $str . "0" . $c;
	  }else{
	    return $str . $c;
	  }
	}
	function verify($str) {
	  $check = 0;
	  for ($i = 0; $i < strlen($str) -1; ++$i) {
	    $ch = ord($str[$i]) - 48;
	    if ($ch < 0 || $ch > 9) return false;
	    $check = (($check + $ch) * 10) % 97;
	  }
	  $check += ord($str[strlen($str)-1])- 48;
	  return ($check % 97) == 1;
	}
	
	function computeCheck($str) {
		$check = 0;//var check = 0;
		for($i=0; $i<strlen($str);$i++){
			$ch = ord( $str[$i] ) - 48 ;
			$check = (($check + $ch) * 10) % 97;
		}
	  return (98 - (($check*10) % 97)) % 97;
	}
	
	function getCheck($str){
		return (int)substr($str, strlen($str)-2);
	}
	
	function getData($str){
		return substr($str, 0, strlen($str)-2);
	}
}