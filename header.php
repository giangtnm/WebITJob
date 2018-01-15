<?php
/**
 * Created by PhpStorm.
 * User: Giang Thai
 * Date: 12/25/2017
 * Time: 5:27 PM
 */
?>
<header>
    <div class="container_12">
        <div class="grid_12" id="header">
            <h1><a href="index.php">
<!--                    Can put image here <img src="" alt="">-->
                </a></h1>
            <div class="menu_block">
                <nav>
                    <ul class="sf-menu">
                        <li class="current">
                            <a href="index.php">HOME</a>
                        </li>
                        <form action="search_job.php" method="post" enctype="multipart/form-data" id="search">
                            <input class="input" name="searchtext" type="text" placeholder="Tìm tên công việc..."
                                   style="left: 400px; top: -5px">
                            <button name="search" id="btn-search"><i class="icon-search"></i>Job</button>
                        </form>
                        <form action="search_company.php" method="post" enctype="multipart/form-data" id="search">
                            <input class="input" name="searchtext" type="text" placeholder="Tìm tên công ty..."
                                   style="left: 400px; top: -5px">
                            <button name="search" id="btn-search"><i class="icon-search"></i>Company</button>
                        </form>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</header>
