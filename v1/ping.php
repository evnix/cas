<?php

	//check token
	eval_token();

	$resp=null;

	$resp["result"]="Error";


	//check if parameters are valid
	if(!isset($_POST['from'])){


		$resp["error_msg"] = "Parameters incomplete.";
		echo json_encode($resp);
		exit();


	}


	$query ="UPDATE users SET lastseen=:lastseen WHERE id=:uid";

	$stmt = $dbh->prepare($query);
	$stmt -> bindParam(':uid', $_POST['from']);

	$time=time();
	$stmt -> bindParam(':lastseen', $time);

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
