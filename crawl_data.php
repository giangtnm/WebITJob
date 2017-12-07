<?php
/**
 * Created by PhpStorm.
 * User: giangtnm
 * Date: 12/7/17
 * Time: 2:18 PM
 */
function crawl_data($link) {
    $html = file_get_html($link);
    $link_company = get_link_company($html);
    get_data_company($link_company);
    $link_job =  get_link_job($link);
    get_data_job($link_job);
}

function get_link_company($link) {
    if (strpos($link, 'topitworks') !== false) {
        return $link->find(
            '.itw_page .navbar .container-fluid div.hidden-xs ul.itw_main_nav li[2] a', 0)->href;
    } elseif (strpos($link, 'itviec') !== false) {

    }
}

function get_data_company($link) {
    if (strpos($link, 'topitworks') !== false) {
        $company_list = file_get_html($link);
        foreach ($company_list->find(
            'div#ajaxlistcompany div.companies-items div.row ul#company-profile-list li.col-xs-12') as $company) {
            $company_link = $company->find('a', 0)->href;
            $company_name = $company->find('a div.cp-item-detail div.cp-company-info h3', 0)->innertext;
            $company_location = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis', 0)->innertext;
            $company_job = $company->find('a div.cp-item-detail div.cp-company-info ul li.ellipsis[2]', 0)->innertext;
            echo $company_link . "<br>";
            echo $company_name . "<br>";
            echo $company_location . "<br>";
            echo $company_job . "<br>";
        }
    } elseif (strpos($link, 'itviec') !== false) {

    }
}

function get_link_job($link) {
    if (strpos($link, 'topitworks') !== false) {
        
    }
}

function get_data_job($link) {
    if (strpos($link, 'topitworks') !== false) {

    }
}
?>
