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
    $link_company = get_link_company($html);
//    echo $link_company;
//    get_data_company($link_company);
//    $link_job =  get_link_job($html);
//    echo $link_job;
//    get_data_job($link_job);
}

function get_link_company($link) {
    if (strpos($link, 'topitworks') !== false) {
        return $link->find(
            '.itw_page .navbar .container-fluid div.hidden-xs ul.itw_main_nav li[2] a', 0)->href;
    } elseif (strpos($link, 'itviec') !== false) {
        foreach ($link->find('#container div.top-companies div.row div.col-md-4') as $company) {
            $link_suffix = $company->find('a', 0)->href;
            $company_link = $link.''.$link_suffix;
            echo $company_link;
//            return $company_link;
        }
    }
}

function get_data_company($link) {
    if (strpos($link, 'topitworks') !== false) {
        $company_list = file_get_html($link);
        foreach ($company_list->find(
            'div#ajaxlistcompany div.companies-items div.row ul#company-profile-list li.col-xs-12') as $company) {
            $company_link = $company->find('a', 0)->href;
            $company_logo = $company->find('a div.cp-item-detail div.cp-item-banner div.cp-logo span img', 0)->src;
            $company_name = $company->find('a div.cp-item-detail div.cp-company-info h3', 0)->innertext;
            $company_location = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis', 0)->innertext;
            $company_job = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis[2]', 0)->innertext;
            echo $company_link . "<br>";
            echo $company_name . "<br>";
            echo $company_logo."<br>";
            echo $company_location . "<br>";
            echo $company_job . "<br>";
        }
    } elseif (strpos($link, 'itviec') !== false) {

    }
}

function get_link_job($link) {
    if (strpos($link, 'topitworks') !== false) {
        return $link->find('.itw_page .navbar .hidden-xs ul.nav li.dropdown ul.dropdown-menu li[1] a', 0)->href;
    }
}

function get_data_job($link) {
    if (strpos($link, 'topitworks') !== false) {
        $job_list = file_get_html($link);
//        echo $job_list;
        echo $job_list->find('div#hits div.hit', 0);
        foreach ($job_list->find('div#hits div.hit') as $job) {
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
            echo $job_list."<br>";
            echo $job_link."<br>";
            echo $job_name."<br>";
            echo $job_company."<br>";
            echo $job_location."<br>";
            echo $job_salary."<br>";
            echo $job_date."<br>";
        }
    }
}
?>
