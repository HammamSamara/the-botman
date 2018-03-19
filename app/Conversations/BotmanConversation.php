<?php

namespace App\Conversations;

use BotMan\BotMan\BotMan;

class BotmanConversation
{
    public function handle(BotMan $bot)
    {
        // $bot->startConversation(new ExampleConversation());

        $bot->startConversation(new CourseConversation());
    }
}
