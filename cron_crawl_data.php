<?php
/**
 * Created by PhpStorm.
 * User: Giang Thai
 * Date: 12/31/2017
 * Time: 3:14 PM
 */
include("crawl_data.php");
$conn = new mysqli('localhost', 'root', '', 'webitjob');
if ($conn->connect_error)
    die("Connection failed: ".$conn->connect_error);
$sql = "TRUNCATE TABLE company; TRUNCATE TABLE job;";
$conn->query($sql);
$conn->close();

set_time_limit(0);
crawl_data('https://www.topitworks.com/vi');
crawl_data('https://itviec.com');
?>
