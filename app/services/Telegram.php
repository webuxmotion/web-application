<?php

namespace app\services;

use wfm\TSingleton;

class Telegram
{
    use TSingleton;

    public static $service;

    private function __construct()
    {
        self::$service = new \TelegramBot\Api\BotApi($_ENV['BOT_TOKEN']);
    }

    public static function sendMessage($chatId, $messageText) {
        self::$service->sendMessage($chatId, $messageText);

        return self::$service;
    }
}