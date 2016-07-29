<?php

	//check if token is valid
	eval_token();

	$resp=null;

	$resp["result"]="Error";


	//check if parameters are valid
	if(!isset($_POST['from']) || !isset($_POST['to']) || !isset($_POST['message'])){


		$resp["error_msg"] = "Parameters incomplete.";
		echo json_encode($resp);
		exit();


	}




	$from=(int)$_POST['from'];
	$to=(int)$_POST['to'];
	$message=htmlentities($_POST['message'],ENT_QUOTES);


	$query = "INSERT INTO messages (sfrom,sto,message,rcvd,stime) VALUES (:sfrom,:sto,:message,0,:stime)";

	$stmt = $dbh->prepare($query);
	$stmt -> bindParam(':sfrom', $from);
	$stmt -> bindParam(':sto', $to);
	$stmt -> bindParam(':message', $message);
	$time=time();
	$stmt -> bindParam(':stime', $time);

	try{

		$stmt -> execute();
	}
	catch  (PDOException $e) {
	  	die ("DataBase Error: The user could not be added.<br>".$e->getMessage());
	} catch (Exception $e) {
  		die ("General Error: The user could not be added.<br>".$e->getMessage());
	}

	$resp["result"] = "ok";

	echo json_encode($resp);


	exit();

