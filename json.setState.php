<?php
/**
 * Created by PhpStorm.
 * User: Xepcoh
 * Date: 24.09.2017
 * Time: 21:08
 */



if(!isset($_POST['pid']) || !isset($_POST['state'])){
    exit;
}
$pid = $_POST['pid'];
$state = $_POST['state'];
$lang = $_POST['lang'] ?? 'en';

require_once ('ArticleUpdate.php');

$articleUpdate = new ArticleUpdate($pid, $lang);
$articleUpdate->updateState($state);
echo 'OK';