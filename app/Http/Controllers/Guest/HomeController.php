<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subject;

class HomeController extends Controller
{
    public function home()
    {
        $subject = Subject::all();

        return view('welcome', [
            'subject' => $subject
        ]);
    }
}
