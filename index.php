<!--
Created by PhpStorm.
User: Giang Thai
Date: 12/28/2017
Time: 11:37 AM-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebITJob</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        set_time_limit(1000);
        include("crawl_data.php");
        include("mysqli.php");
        include("cron_crawl_data.php");
        initial('localhost', 'root', '', 'webitjob');

    ?>
    <div id="content">
        <?php
            include("config.php");
            include("header.php");
            include("content.php");
            // cron_crawl();
            crawl_data('https://www.topitworks.com/vi');
//            crawl_data('https://itviec.com');
        ?>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>
