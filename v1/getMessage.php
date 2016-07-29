<?php

	//check if token is valid
	eval_token();

	$resp=null;

	$resp["result"]="Error";


	//check if parameters are valid
	if(!isset($_POST['from']) || !isset($_POST['to'])){


		$resp["error_msg"] = "Parameters incomplete.";
		echo json_encode($resp);
		exit();


	}




	$from=(int)$_POST['from'];
	$to=(int)$_POST['to'];


	$query = "select (select username from users where id=:sfrom) as sfromname ,
	(select username from users where id=:sto) as stoname,
	* from  messages  where rcvd=0 and sfrom=:sfrom and sto=:sto";

	$stmt = $dbh->prepare($query);
	$stmt -> bindParam(':sfrom', $from);
	$stmt -> bindParam(':sto', $to);
	try{

		$stmt -> execute();
		$messages = $stmt->fetchAll();
		

	}
	catch  (PDOException $e) {
	  	die ("DataBase Error: The user could not be added.<br>".$e->getMessage());
	} catch (Exception $e) {
  		die ("General Error: The user could not be added.<br>".$e->getMessage());
	}



//-------------------------------------------------------------------------

		$query = "UPDATE messages SET rcvd=1 where rcvd=0 and sfrom=:sfrom and sto=:sto";

	$stmt = $dbh->prepare($query);
	$stmt -> bindParam(':sfrom', $from);
	$stmt -> bindParam(':sto', $to);
	try{

		$stmt -> execute();
		
		

	}
	catch  (PDOException $e) {
	  	die ("DataBase Error: The user could not be added.<br>".$e->getMessage());
	} catch (Exception $e) {
  		die ("General Error: The user could not be added.<br>".$e->getMessage());
	}

//-----------------------------------------------------------
	$resp["result"] = "ok";
	$resp["messages"] = $messages;

	echo json_encode($resp);


	exit();

