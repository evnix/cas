<?php


$secret = "axyz";
$dir = 'sqlite:./data.db';
$dbh  = new PDO($dir) or die("cannot open the database");
