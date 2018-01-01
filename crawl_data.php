<?php
/**
 * Created by PhpStorm.
 * User: giangtnm
 * Date: 12/7/17
 * Time: 2:18 PM
 */
include("PHPCrawl/libs/PHPCrawler.class.php");
include("simplehtmldom_1_5/simple_html_dom.php");

function crawl_data($link) {
    $html = file_get_html($link);
    get_link_company($link, $html);
    get_link_job($link, $html);
}

function get_link_company($link, $html) {
    if (strpos($link, 'topitworks') !== false) {
        $company_link = $html->find(
            '.itw_page .navbar .container-fluid div.hidden-xs ul.itw_main_nav li[2] a', 0)->href;
        get_data_company($company_link);
    } elseif (strpos($link, 'itviec') !== false) {
        foreach ($html->find('#container div.top-companies div.row div.col-xs-12') as $company) {
            $link_suffix = $company->find('a.top-company', 0)->href;
            $company_link = $link.''.$link_suffix;
            get_data_company($company_link);
        }
    }
}

function get_data_company($link) {
    $conn = new mysqli('localhost', 'root', '','WebITJob');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connection successfully";
    if (strpos($link, 'topitworks') !== false) {
        $company_list = file_get_html($link);
        foreach ($company_list->find(
            'div#ajaxlistcompany div.companies-items div.row ul#company-profile-list li.col-xs-12') as $company) {
            $company_link = $company->find('a', 0)->href;
            $company_logo_link = $company->find('a div.cp-item-detail div.cp-item-banner div.cp-logo span img', 0)->src;
            $company_name = $company->find('a div.cp-item-detail div.cp-company-info h3', 0)->innertext;
            $company_location = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis', 0)->innertext;
            $company_job = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis[2]', 0)->innertext;

            $conn = new mysqli('localhost', 'root', '','WebITJob');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connection successfully";
            $sql = "INSERT INTO `company` (`company_name`, `address`, `company_logo_link`, `company_link`, `company_job`) 
VALUES ('$company_name', '$company_location', '$company_logo_link', '$company_link', '$company_job')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    } elseif (strpos($link, 'itviec') !== false) {
        $company = file_get_html($link);
        $company_logo_link = $company->find(
            'div#container div.company-content div.company-page div.headers div.logo-container div.logo img', 0)->src;
        $company_name = $company->find(
            'div#container div.company-content div.company-page div.headers div.name-and-info h1.title', 0)->innertext;
        $company_location = $company->find(
            'div#container div.company-content div.company-page div.headers div.name-and-info span', 0)->plaintext;
        $company_link = $link;

        $conn = new mysqli('localhost', 'root', '','WebITJob');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connection successfully";
        $sql = "INSERT INTO `company` (`company_name`, `address`, `company_logo_link`, `company_link`) 
VALUES ('$company_name', '$company_location', '$company_logo_link', '$company_link')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

        get_data_job($link);
    }
}

function get_link_job($link, $html) {
    if (strpos($link, 'topitworks') !== false) {
        $link_job = $html->find('.itw_page .navbar .hidden-xs ul.nav li.dropdown ul.dropdown-menu li[1] a', 0)->href;
        get_data_job($link_job);
    }
}

function get_data_job($link) {
    if (strpos($link, 'topitworks') !== false) {
        $job_list = file_get_html($link);
        foreach ($job_list->find('.container #hits .hit') as $a){
            echo $a;
        }
        foreach ($job_list->find('#hits .hit') as $job) {
            echo "***********************************";
            echo $job;
            $job_link = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.job-basic-detail h4.hit-name a', 0)->href;
            $job_name = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.job-basic-detail h4.hit-name a', 0)->innertext;
            $job_company = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.job-basic-detail h4.hit-company', 0)->innertext;
            $job_location = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.job-basic-detail h4.hit-company
                span.location-label span.result-label', 0)->innertext;
            $job_salary = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.col-md-3 div.hit-salary', 0)->innertext;
            $job_date = $job->find(
                'div.hit-content div.row div.col-xs-12 div.row div.col-md-3 div.hit-date-posting', 0)->innertext;

            $conn = new mysqli('localhost', 'root', '','WebITJob');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connection successfully";
            $sql = "INSERT INTO `job` (`title`, `address`, `salary`, `time_posted`, `company_name`) 
VALUES ('$job_name', '$job_location', '$job_salary', '$job_date', '$job_company')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    } elseif (strpos($link, 'itviec') !== false) {
        $job_list = file_get_html($link);
        echo $link."<br>";
        $link_itviec = 'https://itviec.com';
        foreach ($job_list->find(
            'div#container div.company-content div.company-page div.row div.col-xs-12 div.jobs div.panel-body 
            div.job') as $job) {
            $job_company_logo = $job->find('div.job_content div.logo div.logo-wrapper a img', 0)->src;
            $job_name = $job->find('div.job_content div.job__description div.job__body div.details h4.title a', 0)->innertext;
            $job_link_suffix = $job->find('div.job_content div.job__description div.job__body div.details h4.title a', 0)->href;
            $job_link = $link_itviec.''.$job_link_suffix;
            $job_company = $job_list->find(
                'div#container div.company-content div.company-page div.headers div.name-and-info h1.title', 0)->innertext;
            $job_location_city = $job->find('div.job_content div.job__description div.job__body div.city_and_posted_date 
            div.city div.address div.text[1]', 0)->innertext;
            $job_location_street = $job->find('div.job_content div.job__description div.job__body div.city_and_posted_date 
            div.city div.address div.text[2]', 0)->innertext;
            $job_location = $job_location_street.''.$job_location_city;
            $job_description = '';
            foreach ($job->find('div.job_content div.job__description div.job-bottom div.tag-list a') as $details_job) {
                $detail = $details_job->find('span', 0)->innertext;
                $job_description = $job_description.' '.$detail.'|';
            }

            $conn = new mysqli('localhost', 'root', '','WebITJob');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connection successfully";
            $sql = "INSERT INTO `job` (`title`, `address`, `company_name`) 
VALUES ('$job_name', '$job_location', '$job_company')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
}
?>
