<?php
/**
 * Created by PhpStorm.
 * User: snail
 * Date: 16/8/10
 * Time: 下午11:35
 */
require 'vendor/autoload.php';
// 参数依次为 AppId, AppKey, MasterKey
LeanClient::initialize("lEosXaVHjTFifebFQYQojDdv-gzGzoHsz", "qgFkDIsVBzMEPLo8vodz1oDP", "7nd3iJj4Sh45GUSb10kwcx70");

$testObject = new LeanObject("TestObject");
$testObject->set("words", "Hello World!");
try {
    $testObject->save();
    echo "Save object success!";
} catch (Exception $ex) {
    echo "Save object fail!";
}