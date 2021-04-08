<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Question;
use App\FacebookPostLog;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::count();
        $question = Question::count();
        $log_post = FacebookPostLog::count();

        return view('dashboard.index',[
            'subject' => $subject,
            'question' => $question,
            'log_post' => $log_post
        ]);
    }
}
