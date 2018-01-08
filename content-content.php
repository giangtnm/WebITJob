<!--
Created by PhpStorm.
User: Giang Thai
Date: 12/28/2017
Time: 11:37 AM-->
<div class="tab-content">
    <?php
        $company="select distinct * from company";
        $query_company=mysql_query($company);
    ?>
    <div class="content-item" id="section3">
        <h3>Companies</h3>
        <?php
            while($row_company=mysql_fetch_array($query_company)) {
                ?>
<!--                <div class="item">-->
                    <div class="company-detail">
                        <img src="<?php echo $row_company['company_logo_link']; ?>" style="width: 100px;">
                        <div>
                            Tên công ty: <a href="<?php echo $row_company['company_link']; ?>"><?php echo $row_company['company_name']; ?></a>
                            <p>Địa chỉ: <?php echo $row_company['company_address']; ?><br/>
                            Source: <?php echo $row_company['source']; ?></p>
                        </div>
                    </div>
<!--                </div>-->
                <?php
            }
        ?>
    </div>

    <?php
        $job="select distinct * from job";
        $query_job=mysql_query($job);
    ?>
    <div class="content-item" id="section1">
        <h3>Jobs</h3>
        <?php
            while ($row_job=mysql_fetch_array($query_job)) {
                ?>
<!--                <div class="item">-->
                    <div class="job-detail">
                        <div>
                            Tên công việc: <a href="<?php echo $row_job['job_link']; ?>"><?php echo $row_job['title']; ?></a>
                            <p>Địa chỉ: <?php echo $row_job['address']; ?><br/>
                            Source: <?php echo $row_job['source']; ?></p>
                        </div>
                    </div>
<!--                </div>-->
                <?php
            }
        ?>
    </div>
</div>
