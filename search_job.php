<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebITJob &#169;2017 | Thai Nguyen Minh Giang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Giang Thai
 * Date: 12/25/2017
 * Time: 5:31 PM
 */
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'webitjob';

$conn1 = mysqli_connect($host, $user, $pass, $dbName) or die ("Can't connect to database");
mysqli_select_db($conn1, $dbName);
mysqli_set_charset($conn1,"utf8");
if(isset($_POST['search']))
{
    $search=$_POST['searchtext'];
    $sql_search="select * from `job` where title LIKE '%$search%'";
    $query_search=mysqli_query($conn1, $sql_search);
}
include("header.php");
?>
<div class="content1 page">
    <div class="container_12">
        <?php
        if($count=mysqli_num_rows($query_search)==0 || $search==''){
        ?>
        <p>Không tìm thấy công việc nào</p>
        <?php
        }else{
        ?>
        <?php
        while($dong_search=mysqli_fetch_array($query_search)){
        ?>
            <div class="job-detail">
                <div>
                    Tên công việc: <a href="<?php echo $dong_search['job_link']; ?>"><?php echo $dong_search['title']; ?></a>
                    <p> Địa chỉ: <?php echo $dong_search['address']; ?><br/>
                        Source: <?php echo $dong_search['source']; ?><br/>
                        Công ty: <?php echo $dong_search['company_name']; ?></p>
                </div>
            </div>
            <?php
            }
        }
        ?>
    </div>
</div>
</body>
</html>
