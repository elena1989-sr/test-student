<?php 

$path="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$database_name = 'test_student';	

$user_name = 'root';
$pass_word = "";
$host_name = 'localhost';

$mysqliObj = new mysqli($host_name, $user_name, $pass_word, $database_name); 
$mysqliObj->set_charset("utf8");

?>
