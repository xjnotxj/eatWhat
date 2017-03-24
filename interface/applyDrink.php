<?php

/**
 * 报名
 *
 */

include('applydb.php');

$db = new ApplyDB();

header('Access-Control-Allow-Origin: *');

date_default_timezone_set('Asia/Shanghai');

//后台自动产生
$ip_param = getClientIP();
$month_param = date('y-m', time());


$month_number = $db->getDrinkNumber($month_param);

$month_number_flag = true;


if ($month_number && $month_number >= 2) {

    $month_number_flag = false;

} else if ($month_number) {
    $array = array();
    $array['month'] = $month_param;
    $db->saveDrink2($array);
} else {
    $array = array();
    $array['month'] = $month_param;
    $array['ip'] = $ip_param;
    $db->saveDrink($array);
}


$status_code = $month_number_flag;
echo $status_code;
return;


/**
 * 获取客户端IP地址
 *
 * @return string
 */
function getClientIP()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
        $ip = getenv("HTTP_CLIENT_IP");
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
        $ip = getenv("REMOTE_ADDR");
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = "unknown";
    }
    return $ip;
}


?>
