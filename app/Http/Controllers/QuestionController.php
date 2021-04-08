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
    public function index(Subject $subject, QuestionsDataTable $dataTable)
    {
        // dd($subject->toArray());
        return $dataTable->with('id', $subject->id)->render('question.index', [
            'subject' => $subject
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subject $subject)
    {
        return view('question.create', [
            'subject' => $subject
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestion $request, Subject $subject, Question $question)
    {
        $question = Question::create([
            'question' => $request->question,
            'subject_id' => $subject->id,
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
        return redirect()->route('subject.question.index', $subject);
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
    public function edit(Subject $subject, $id)
    {
        $question = Question::with('answer')->findOrFail($id);

        return view('question.edit', [
            'question_store' => $question,
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject, Question $question)
    {
        $question->question = $request->question;
        $question->subject_id = $subject->id;
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
        return redirect()->route('subject.question.index', $subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject, Question $question)
    {
        $question->delete();

        toast('Delete question success', 'success');
        return redirect()->route('subject.question.index', $subject);
    }
}
