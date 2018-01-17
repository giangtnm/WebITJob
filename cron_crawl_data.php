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

//Delete duplicate record (topitworks and itviec)
$conn = new mysqli('localhost', 'root', '', 'webitjob');
if ($conn->connect_error)
    die("Connection failed: ".$conn->connect_error);
$sql = "DELETE n2
FROM company n1, company n2
WHERE n1.company_name = n2.company_name AND n1.id_company > n2.id_company";
$conn->query($sql);
$conn->close();

//Delete duplicate record (topitworks and itviec)
$conn = new mysqli('localhost', 'root', '', 'webitjob');
if ($conn->connect_error)
    die("Connection failed: ".$conn->connect_error);
$sql = "DELETE n2
FROM job n1, job n2
WHERE n1.title = n2.title AND n1.id_job > n2.id_job";
$conn->query($sql);
$conn->close();
?>
