<?php
//    echo "Hello World";
set_time_limit(1000);

include("PHPCrawl/libs/PHPCrawler.class.php");
include("simplehtmldom_1_5/simple_html_dom.php");
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

crawl_data('https://www.topitworks.com/vi')

//close_connection($conn);
?>
