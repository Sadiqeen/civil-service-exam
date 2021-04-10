<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|exists:subjects,id|max:255',
            'question' => 'required|min:5|max:255',
            'choice_1' => 'required|min:1|max:255',
            'choice_2' => 'required|min:1|max:255',
            'choice_3' => 'required|min:1|max:255',
            'choice_4' => 'required|min:1|max:255',
            'correct' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $question = Question::create([
            'question' => $request->question,
            'guest_ip' => $request->ip(),
            'subject_id' => $request->subject,
        ]);

        $question->answer()->create([
            'answer' => $request->choice_1,
            'is_correct' => $request->correct == 1 ? true : false,
        ]);

        $question->answer()->create([
            'answer' => $request->choice_2,
            'is_correct' => $request->correct == 2 ? true : false,
        ]);

        $question->answer()->create([
            'answer' => $request->choice_3,
            'is_correct' => $request->correct == 3 ? true : false,
        ]);

        $question->answer()->create([
            'answer' => $request->choice_4,
            'is_correct' => $request->correct == 4 ? true : false,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}
