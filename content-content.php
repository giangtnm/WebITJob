<!--
Created by PhpStorm.
User: Giang Thai
Date: 12/28/2017
Time: 11:37 AM-->
<div class="tab-content">
    <?php
    $company="select distinct * from company";
    $query_company=mysqli_query($conn, $company);
    ?>
    <div class="content-item" id="section3">
        <h3>Công ty</h3>
        <?php
        while($row_company=mysqli_fetch_array($query_company)) {
            ?>
            <div class="company-detail">
                <img src="<?php echo $row_company['company_logo_link']; ?>" style="width: 100px;">
                <div>
                    Tên công ty: <a href="<?php echo $row_company['company_link']; ?>"><?php echo $row_company['company_name']; ?></a>
                    <p>Địa chỉ: <?php echo $row_company['company_address']; ?><br/>
                        Source: <?php echo $row_company['source']; ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <?php
    $job="select distinct * from job";
    $query_job=mysqli_query($conn, $job);
    ?>
    <div class="content-item" id="section1">
        <h3>Công việc</h3>
        <?php
        while ($row_job=mysqli_fetch_array($query_job)) {
            ?>
            <div class="job-detail">
                <div>
                    Tên công việc: <a href="<?php echo $row_job['job_link']; ?>"><?php echo $row_job['title']; ?></a>
                    <p>Địa chỉ: <?php echo $row_job['address']; ?><br/>
                        Source: <?php echo $row_job['source']; ?><br/>
                        Công ty: <?php echo $row_job['company_name']; ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
