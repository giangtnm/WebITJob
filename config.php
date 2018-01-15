<?php
/**
* Created by PhpStorm.
* User: Giang Thai
* Date: 12/25/2017
* Time: 4:41 PM
*/
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'webitjob';

$conn = mysqli_connect($host, $user, $pass, $dbName) or die ("Can't connect to database");
mysqli_select_db($conn, $dbName);
mysqli_set_charset($conn,"utf8");
?>
