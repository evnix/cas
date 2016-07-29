<?php

	//check if token is valid
	eval_token();


	//check if parameters are valid
	if(!isset($_POST['from']) || !isset($_POST['to']) || !isset($_POST['message'])){


		$resp["error_msg"] = "Parameters incomplete.";
		echo json_encode($resp);
		exit();


	}



