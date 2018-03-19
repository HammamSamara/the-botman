<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class CourseConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("I have exams templates for a few courses. What do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('List the latest courses')->value('courses'),
                Button::create('Give me a template sample')->value('tem'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'courses') {
                    $courses = $this->getLatestCourses();
                    $this->say($courses);
                } else {
                    $sample = $this->getTemplateSample();
                    $this->say($sample);
                }
            }
        });
    }

    /**
     * Get latest 3 courses, and join their names
     *
     * @return string
     */
    public function getLatestCourses()
    {
        // #TODO we can introduce scope latest to shorcut this query
        $courses = \App\Course::orderBy('id', true)->limit(3)->get()->pluck('name');

        $lastCourse = $courses->pop();

        return $courses->implode(', ') . ", and $lastCourse";
    }

    /**
     * Get a random template
     *
     * @return string
     */
    public function getTemplateSample()
    {
        $course = \App\Course::with('templates')->limit(20)->get()->random();

        $template = $course->templates->first();

        return $course->name
            . ' has a template from ' . $template->year
            . ', you can download it from here:' . $template->url;
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
