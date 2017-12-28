<!--
Created by PhpStorm.
User: Giang Thai
Date: 12/28/2017
Time: 11:37 AM-->
<div class="tab-content">
    <?php
        $content="select * from company";
        $query_all=mysql_query($content);
    ?>
    <div class="content-item" id="section3">
        <?php
            while($row_all=mysql_fetch_array($query_all)) {
                ?>
                <div class="item">
                    <div class="company-detail">
                        <img src="<?php echo $row_all['company_logo_link']; ?>" style="width: 100px;">
                        <div>
                            <a href="<?php echo $row_all['company_link']; ?>">Tên công ty: <?php echo $row_all['company_name']; ?></a>
                            <p>Địa chỉ: <?php echo $row_all['address']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
