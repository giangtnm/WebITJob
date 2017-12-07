<?php
set_time_limit(1000);
include("crawl_data.php");
include("mysqli.php");
//$host = 'localhost';
//$user = 'root';
//$pass = '';
//$dbName = 'WebITJob';
//
//$conn = connect_sql($host, $user, $pass);
//create_db($conn, $dbName);
//create_tables($conn);

//crawl_data('https://www.topitworks.com/vi');
crawl_data('https://itviec.com/');
//readfile("template/index.html")

//close_connection($conn);
?>
