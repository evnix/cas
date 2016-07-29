<?php


$secret = "axyz";
$dir = 'sqlite:./data.db';
$dbh  = new PDO($dir) or die("cannot open the database");
$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
