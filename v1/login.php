<?php

	$resp=null;

	$resp["result"]="Error";



	if(!isset($_POST['username']) || !isset($_POST['password'])){


		$resp["error_msg"] = "username or password not mentioned.";
		echo json_encode($resp);
		exit();


	}



	$query = "SELECT * FROM users WHERE username=:username AND password=:password";
	$stmt = $dbh->prepare($query);
	$stmt -> bindParam(':username', $_POST['username']);
	$pwd=md5($_POST['password']);
	$stmt -> bindParam(':password',$pwd);
	$stmt -> execute();


	$res=$stmt->fetchAll();



	if(count($res)>0){

		$resp["result"]="ok";
		$time = time()+60*60;
		$uid= substr( md5(rand()), 0, 7);
		$token=$time."::".md5($uid.$secret.$time)."::".$uid;
		$resp["token"] = $token;
		echo json_encode($resp);
		exit();

	}else{



		//expiry::md5(uid+secret)::uid


		$resp["error_msg"] = "username or password do not match.";
		echo json_encode($resp);
		exit();

	}


