<?php
use BotMan\BotMan\BotMan;
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Who are you?', function (BotMan $bot) {
    $bot->reply('I am Igub chatbot.. How can i help you?');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');
