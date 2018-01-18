<?php
/**
 * Created by PhpStorm.
 * User: Giang Thai
 * Date: 1/17/2018
 * Time: 10:18 PM
 */
include("simplehtmldom_1_5/simple_html_dom.php");

$username = "minhgiangthainguyen@gmail.com";
$password = "abc123ABC!@#";
$url = "https://www.topitworks.com/en/job/hot-120-fresher-c-sharp-net-developers-1-1-892745?utm_source=company_profile";
$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
));
$html = file_get_html($url, false, $context);
echo $html;
