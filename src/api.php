<?php
/**
 * Created by PhpStorm.
 * User: snail
 * Date: 16/8/10
 * Time: 下午9:08
 */
function getData($url)
{
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    return $data;
}
function getQuanminData($url)
{
//    http://www.quanmin.tv/json/rooms/1312406/info.json
    return getData($url);
}

function getDouyuData()
{
    $obj = json_decode(getData("http://capi.douyucdn.cn/api/v1/login?username=war3bbs&password=" . md5("zhuzhu520")));
    $token = $obj->{'data'}->{'token'};
    //http://capi.douyucdn.cn/api/v1/followRoom?token=<token>&live=1 live(1是正在直播的，0是没开直播的 )
    return getData("http://capi.douyucdn.cn/api/v1/remind_list?token=" . $token . "&limit=1&offset=1");
}

function getHuyaData()
{
    $FollowDataUrl = "http://fw.huya.com/dispatch?do=userHistoryuid=1596806337&pageSize=100&page=1";
    $FollowListUrl = "http://fw.huya.com/dispatch?do=userSubscribeAid&uid=1596806337&callback=jQuery1720036349078451689554_1471067116543&_=1471067176707";
    $FollowDataJsonStr = str_replace(")","",strstr(getData($FollowDataUrl),"{"));
    return $FollowDataJsonStr;
}
function getZhanqiData($url)
{
    //从数据库取出保存的roomId 45583 330 14796 40565
//    "http://www.zhanqi.tv/api/static/live.roomid/330.json"
    getData($url);

}
?>