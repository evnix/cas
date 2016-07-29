<?php

	//check if token is valid
	eval_token();

	$resp=null;

	$resp["result"]="Error";








	$time=time()-60;

	$from = (int)$_POST['from'];
	$query = "select id,username FROM users where lastseen>$time AND id!=".$from;

	$stmt = $dbh->prepare($query);

	try{

		$stmt -> execute();
		$users = $stmt->fetchAll();
		

	}
	catch  (PDOException $e) {
	  	die ("DataBase Error: The user could not be added.<br>".$e->getMessage());
	} catch (Exception $e) {
  		die ("General Error: The user could not be added.<br>".$e->getMessage());
	}

	$resp["result"] = "ok";
	$resp["users"] = $users;

	echo json_encode($resp);


	exit();
