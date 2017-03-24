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
$date_param = date('y-m-d', time());


$date_number = $db->getFoodNumber($date_param);

$date_number_flag = true;

if ($date_number && $date_number >= 2) {

    $date_number_flag = false;

} else if ($date_number) {
    $array = array();
    $array['date'] = $date_param;
    $db->saveFood2($array);
} else {
    $array = array();
    $array['date'] = $date_param;
    $array['ip'] = $ip_param;
    $db->saveFood($array);
}


$status_code = $date_number_flag;
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
