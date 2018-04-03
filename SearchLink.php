<?php
ini_set("allow_url_fopen", 1);
$url = "https://www.goodreads.com/search.xml?key=vkocu8cqXPKDJc7wnPw&bookname=$bookname";

$data = file_get_contents($url);

header('Content-Type: application/json;charset=utf-8');

echo ($data);


?>
