<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('RabbitMQClient.php');

$bookname = $_GET['bookname'];

$response = search($bookname);

header('Content-Type: application/json;charset=utf-8');
//echo json_decode($data);
echo ($response);
?>
