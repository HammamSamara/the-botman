<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;

class ConversationsController extends Controller
{
    /**
     * POST api/v1/conversations
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        $botman = app('botman');

        // Begining Conversation
        // Type Yo to get hints
        $botman->hears('Yo', function (BotMan $bot) {
            $bot->reply('Hi! I am the BOT MAN, still in development, you now ask me about courses only');
        });

        // Ask about courses in the databases
        // Find the direction of the conversation in BotmanConversation
        $botman->hears('what courses', \App\Conversations\BotmanConversation::class.'@handle');


        // More sophisticated example
        // parsing params, and answering queries!
        $botman->hears('show me {course}', function($bot, $courseName) {
            $bot->reply('#TODO Find course by name using Laravel ORM queries ;)');
        });


        // If bot doesn't recognise the given statement/command,
        // then display generic message
        $botman->fallback(function(BotMan $bot) {
            $bot->reply('Sorry, I did not understand these phrases');
        });

        $botman->listen();
    }
}
