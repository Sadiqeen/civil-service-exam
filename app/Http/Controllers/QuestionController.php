<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionsDataTable;
use App\Http\Requests\StoreQuestion;
use App\Question;
use Illuminate\Http\Request;
use App\Subject;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionsDataTable $dataTable)
    {
        return $dataTable->render('question.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();

        return view('question.create', [
            'subjects' => $subjects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request, Question $question)
    {
        $question = Question::create([
            'question' => $request->question,
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

        toast('Add new question success', 'success');
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::with('answer')->findOrFail($id);
        $subjects = Subject::all();

        return view('question.edit', [
            'question_store' => $question,
            'subjects' => $subjects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->subject_id = $request->subject;
        $question->save();

        $question->answer()->delete();

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

        toast('Update question success', 'success');
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        toast('Delete question success', 'success');
        return redirect()->route('question.index');
    }
}
