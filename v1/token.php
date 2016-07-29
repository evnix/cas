<?php



	function verify_token($token){

		global $secret;
		$words=explode("::", $token);

		$t=$words[0];
		$uid=$words[2];

		if(md5($uid.$secret.$t)==$words[1]){

			return true;

		}else{

			return false;
		}


	}