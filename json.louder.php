<?php
/**
 * Created by PhpStorm.
 * User: Xepcoh
 * Date: 24.09.2017
 * Time: 11:19
 */

require_once('ArticleList.php');

$lang = $_GET['lang'] ?? 'en';

$articleJsonList = new ArticleList();
$articleJsonList->setLang($lang);
$result = $articleJsonList->getList();

header('Content-Type: application/json');
echo json_encode($result);
