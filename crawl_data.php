<?php
/**
 * Created by PhpStorm.
 * User: Giang Thai
 * Date: 1/8/2018
 * Time: 4:57 AM
 */
include("simplehtmldom_1_5/simple_html_dom.php");

function crawl_data($link)
{
    if (strpos($link, 'topitworks') !== false)
        get_data_companies_topitworks($link);
    elseif (strpos($link, 'itviec') !== false)
        get_data_company_itviec($link);
}

function get_data_company_itviec($link)
{
    $html = file_get_html($link);

    foreach ($html->find('#container div.top-companies div.row div.col-xs-12') as $company) {
        $link_suffix = $company->find('a.top-company', 0)->href;
        $company_link = $link.''.$link_suffix;

        //delete suffix "?track_action=Click+Hiring"
        $company_link = substr($company_link, 0, strpos($company_link, "?"));

        //Get information about company
        get_info_company_itviec($company_link);
        get_info_job_from_company_itviec($company_link);
    }
}

function get_info_company_itviec($link)
{
    $html = file_get_html($link);

    $company_logo_link = $html->find(
        '#container div.company-content div.company-page div.headers div.logo-container div.logo img', 0)->src;

    $company_name = $html->find(
        '#container div.company-content div.company-page div.headers div.name-and-info h1', 0)->plaintext;

    $company_address = $html->find(
        '#container div.company-content div.company-page div.headers div.name-and-info span', 0)->plaintext;

    $company_source = "itviec";

    $conn = new mysqli('localhost', 'root', '', 'webitjob');
    if ($conn->connect_error)
        die("Connection failed: ".$conn->connect_error);
    mysqli_set_charset($conn,"utf8");

    $sql = "INSERT INTO `company` (`company_name`, `company_address`, `company_logo_link`, `company_link`, `source`)
VALUES ('$company_name', '$company_address', '$company_logo_link', '$link', '$company_source')";
    $conn->query($sql);
    $conn->close();
}

function get_info_job_from_company_itviec($link)
{
    $html = file_get_html($link);

    $company_name = $html->find(
        '#container div.company-content div.company-page div.headers div.name-and-info h1', 0)->plaintext;

    foreach ($html->find(
        '#container div.company-content div.company-page div.company-container div.col-md-8 div.jobs div.panel-body div.job') as $job) {
        $job_link = $job->find('div.job_content div.job__description div.job__body div.details h4.title a', 0)->href;
        $job_link = "https://itviec.com".''.$job_link;

        $job_name = $job->find('div.job_content div.job__description div.job__body div.details h4.title a', 0)->plaintext;

        $job_address = $job->find('div.job_content div.city_and_posted_date div.city div.address div.text', 0)->plaintext;
        if ($job->find('div.job_content div.city_and_posted_date div.city div.address div.other-address', 0)->plaintext)
            $job_address2 = $job->find('div.job_content div.city_and_posted_date div.city div.address div.other-address', 0)->plaintext;
        if ($job_address2)
            $job_address = $job_address2.'- '.$job_address;

        $job_source = "itviec";

        $conn = new mysqli('localhost', 'root', '', 'webitjob');
        if ($conn->connect_error)
            die("Connection failed: ".$conn->connect_error);
        mysqli_set_charset($conn,"utf8");

        $sql = "INSERT INTO `job` (`title`, `address`, `job_link`, `source`, `company_name`) 
VALUES ('$job_name', '$job_address', '$job_link', '$job_source', '$company_name')";
        $conn->query($sql);
        $conn->close();
    }
}

function get_data_companies_topitworks($link)
{
    $html = file_get_html($link);

    $companies_link = $html->find('.itw_page .navbar .container-fluid div.hidden-xs ul.itw_main_nav li[2] a', 0)->href;
    get_data_company_topitworks($companies_link);
}

function get_data_company_topitworks($link)
{
    $html = file_get_html($link);
    foreach ($html->find('ul#company-profile-list li.col-xs-12') as $company) {
        $company_link = $company->find('a', 0)->href;
        get_info_company_topitworks($company_link);
        get_info_job_from_company_topitworks($company_link);
    }
}

function get_info_company_topitworks($link)
{
    $html = file_get_html($link);

    $company_name = $html->find('h2#cp_company_name', 0)->plaintext;

    $company_logo_link = $html->find('div.container div.row div.cp_logo div img', 0)->src;

    $company_address = $html->find('div.container div.row div.cp_basic_info_details ul li span', 0)->title;

    $company_link = $html->find('div.container div.row div.cp_basic_info_details ul li a.website-company', 0)->href;

    $company_source = "topitworks";

    $conn = new mysqli('localhost', 'root', '', 'webitjob');
    if ($conn->connect_error)
        die("Connection failed: ".$conn->connect_error);
    mysqli_set_charset($conn,"utf8");

    $sql = "INSERT INTO `company` (`company_name`, `company_address`, `company_logo_link`, `company_link`, `source`)
VALUES ('$company_name', '$company_address', '$company_logo_link', '$company_link', '$company_source')";
    $conn->query($sql);
    $conn->close();
}

function get_info_job_from_company_topitworks($link)
{
    $html = file_get_html($link);

    $company_name = $html->find('h2#cp_company_name', 0)->plaintext;

    foreach ($html->find('div#ajax_cp_our_jobs_listing div.jobs_listing_block div.cp_our_job_item') as $job)
    {
        $job_link = $job->find('div.rơ div.cp_Job_summary_info h4 a', 0)->href;
        $job_link = substr($job_link, 0, strpos($job_link, "?"));

        $job_name = $job->find('div.rơ div.cp_Job_summary_info h4 a', 0)->plaintext;

        $job_address = $job->find('div.rơ div.cp_Job_summary_info ul li', 1)->plaintext;

        //Delete all spaces
        //$job_address = preg_replace('/\s+/', '', $job_address);

        $job_source = "topitworks";

        $conn = new mysqli('localhost', 'root', '', 'webitjob');
        if ($conn->connect_error)
            die("Connection failed: ".$conn->connect_error);
        mysqli_set_charset($conn,"utf8");

        $sql = "INSERT INTO `job` (`title`, `address`, `job_link`, `source`, `company_name`) 
VALUES ('$job_name', '$job_address', '$job_link', '$job_source', '$company_name')";
        $conn->query($sql);
        $conn->close();
    }
}
