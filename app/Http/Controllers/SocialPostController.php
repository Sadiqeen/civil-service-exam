<?php

namespace App\Http\Controllers;

use App\FacebookPostLog;
use App\Question;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class SocialPostController extends Controller
{
    public function post($token)
    {
        $token_validate = "21C399qZ5DHDUbWgfwnSME0NhoovwfKfmFGUh3cojkcwuQi8s6ciDIuS8seDquG3";

        if ($token !== $token_validate) {
            return false;
        }

        $question = $this->randomQuestion();
        $message = $this->generateMessage($question);

        $facebook = new FacebookController();
        $facebook->postToPage($message, $question[0]->id);
        return true;
    }

    public function comment($token) {
        $token_validate = "21C399qZ5DHDUbWgfwnSME0NhoovwfKfmFGUh3cojkcwuQi8s6ciDIuS8seDquG3";

        if ($token !== $token_validate) {
            return false;
        }

        $log = FacebookPostLog::latest('created_at')->first();

        $message = "คำตอบคือข้อ ";
        $question = Question::with('answer')->find($log->question_id);

        foreach ($question->answer as $key => $answer) {
            if ($answer->is_correct) {
                $message .=  ($key + 1) . ". " .  $answer->answer;
            }
        }

        $facebook = new FacebookController();
        $facebook->commentToPost($log->post_id, $message);
        return true;
    }

    public function randomQuestion()
    {
        $question = Question::with('answer')->inRandomOrder()->limit(1)->get();
        return $question;
    }

    private function generateMessage($question)
    {
        $message = $question[0]->question . '
';

        foreach ($question[0]->answer as $key => $answer) {
            $message .= '
'. ($key + 1) . '. ';
            $message .= $answer->answer . '
';
        }

        return $message;
    }
}
