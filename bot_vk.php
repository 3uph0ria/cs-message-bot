<?php
include_once 'include/vk.php';
$vk = new VK();

$data = json_decode(file_get_contents('php://input'), true);
$chatSend = 2000000001; // в этот чат будут приходить сообщения с сервера

$chatId = $vk->data['object']['message']['peer_id'];                   // ID чата
$fromId = $vk->data['object']['message']['from_id'];                   // ID пользователя, которая написал сообщение
$text = mb_strtolower($vk->data['object']['message']['text'], 'utf-8'); // Текст сообщения

// Отправка сообщения с плагина
if(isset($data))
{
    $vk->send($chatSend, $data['message']);
}

// Команда чтоб ид чата узнать
if($vk->data['type'] == 'message_new')
{
    if($text)
    {
        if($text == 'ид чата') $vk->send($chatId, $chatId);
    }
}
