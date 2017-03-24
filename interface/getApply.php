<?php

/**
 * 报名
 *
 */

include('applydb.php');

$db = new ApplyDB();

header('Access-Control-Allow-Origin: *');

date_default_timezone_set('Asia/Shanghai');

$status_code = 0;
//后台自动产生
$ip_param = getClientIP();
$date_param = date('y-m-d', time());
$month_param = date('y-m', time());

//准备插入数据
$array = array();
$array['ip'] = $date_param;
$array['title'] = $ip_param;

// 判断该uuid是否已参与过本活动
$food_number = $db->getFoodNumber($date_param);
$drink_number = $db->getDrinkNumber($month_param);

if (!$food_number) {
    $food_number = 0;
}
if (!$drink_number) {
    $drink_number = 0;
}

$food_number = 2 - $food_number;
$drink_number = 2 - $drink_number;

echo $food_number . '|' . $drink_number;
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
