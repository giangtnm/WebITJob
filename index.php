<?php
    set_time_limit(1000);
    include("crawl_data.php");
    include("mysqli.php");

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'WebITJob';

    initial($host, $user, $pass, $dbName);
    crawl_data('https://www.topitworks.com/vi');
    crawl_data('https://itviec.com');
    readfile("index.html");
?>
