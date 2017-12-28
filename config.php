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

    $conn = mysql_connect($host, $user, $pass, $dbName) or die ("Can't connect to database");
    mysql_select_db($dbName, $conn);
    mysql_set_charset('utf8', $conn);
?>
