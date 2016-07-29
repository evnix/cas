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



	function eval_token(){

			if(isset($_POST['token'])){


				if(verify_token($_POST['token'])){

				}else{

					die("{result:'error',error_msg:'invalid token'}");

				}

			}else{

				die("{result:'error',error_msg:'invalid token'}");
			}

	}