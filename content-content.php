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

                <?php
            }
        ?>
    </div>
</div>
