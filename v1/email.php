<?php

    require "php-redis-client/src/autoloader.php";
    
  

use RedisClient\RedisClient;
use RedisClient\Client\Version\RedisClient2x6;

// Example 1. Create new Instance for Redis version 2.8.x with config via factory

$Redis = new RedisClient([
    'server' => 'tcp://127.0.0.1:6379', // or 'unix:///tmp/redis.sock'
    'timeout' => 2
]);


    
    if(isset($_POST['email']) && isset($_POST['msg'])){


$Redis->executeRaw(['rpush', 'elist', $_POST['email']."$$$".$_POST['msg']]);

    echo "ok";
}else{


      echo "nok";
}


