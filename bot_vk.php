<?php
include_once 'include/vk.php';
$vk = new VK();

$data = json_decode(file_get_contents('php://input'), true);
$chatId = 2000000001;

if(isset($data))
{
    $vk->send($chatId, 'чет пришло');
    $vk->send($chatId, $data['message']);
}