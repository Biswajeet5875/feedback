<?php 

define('DB_HOST','localhost');
define('DB_USER','kingo');
define('DB_PASS','5875');
define('DB_NAME','php_dev');

//create connetion

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn -> connect_error){
    die('connection failed'. $conn->connect_error);
}

?>