<?php


try{

	require "connection.php";

}catch(Exception $e){


	die("Error Connecting to DB".$e);
}



	require "token.php";

if(isset($_REQUEST['u'])){


	$r = $_REQUEST['u'];

	if($r=="/login"){


		require "login.php";
	}
	else if($r=="/postMessage"){


		require "postMessage.php";
	}
	else if($r=="/getMessage"){


		require "getMessage.php";
	}
	else if($r=="/getConversationHistory"){


		require "getConversationHistory.php";
	}
	else{

		die("Route not found.");
	}


}