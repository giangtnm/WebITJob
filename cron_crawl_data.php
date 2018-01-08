<?php
/**
* Created by PhpStorm.
* User: Giang Thai
* Date: 12/31/2017
* Time: 3:14 PM
*/
function cron_crawl()
{
    $conn = new mysqli('localhost', 'root', '', 'webitjob');
    if ($conn->connect_error)
        die("Connection failed: ".$conn->connect_error);
    $sql = "TRUNCATE TABLE company; TRUNCATE TABLE job;";
    $conn->query($sql);
    $conn->close();

    set_time_limit(0);
    $work_file = 'run.cn';
    if (file_exists($work_file) == false) {
        $fs = fopen($work_file, 'w') or die();
        fclose($fs);
    }
    while (true) {
        if (file_exists($work_file)) {
            crawl_data('https://www.topitworks.com/vi');
            crawl_data('https://itviec.com');
            sleep(86400);
        } else {
            break;
        }
    }
}
?>