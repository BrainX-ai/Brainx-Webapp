<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestions;
use Illuminate\Http\Request;
use App\Models\AssessmentCateory;
use Auth;
use Carbon\Carbon;

class AssesmentController extends Controller
{

    public function assessment($category_id)
    {
        $category = AssessmentCateory::find($category_id);

        return view('pages.talent.assessment-init')->with('category', $category);
    }

    public function generateQuestions($category_id)
    {

        $questions = Question::where('assessment_category_id', $category_id)->inRandomOrder()->limit(10)->get();

        session([
            'questions' => $questions
        ]);

        $quiz = Quiz::create([
            'user_id' => Auth::user()->id,
            'assessment_cateory_id' => $category_id
        ]);
        // dd();
        $endTime = ($quiz->created_at->addMinutes(45)->format("d F Y H:i:s"));
        
        session(['endTime' => $endTime]);
        foreach ($questions as $question) {
            QuizQuestions::create([
                'quiz_id' => $quiz->id,
                'question_id' => $question->id,
            ]);
        }

        return redirect()->route('assessment.progress', ['index' => 0]);
    }

    public function getQuestion($index)
    {

        $questions = session('questions');
        
        $quiz_question_id = QuizQuestions::where('question_id', $questions[$index]->id)->first()->id;


        return view('pages.talent.question-page')->with('question', $questions[$index])->with('index', $index)->with('quiz_question_id', $quiz_question_id)->with('endTime', session('endTime'));

    }

    public function getAnswer(Request $request)
    {

        $quiz_question = QuizQuestions::find($request->quiz_question_id)->update([
            'given_answer' => $request->answer
        ]);
        return response()->json(['message' => $quiz_question], 200);
    }

    public function results()
    {

        $quiz = Quiz::where('user_id', Auth::user()->id)->latest()->get();
        
        $quizQuestions = QuizQuestions::where('quiz_id', $quiz[0]->id)->with('question')->get();
        $score = 0;
        foreach ($quizQuestions as $quizQuestion) {
            if ($quizQuestion->given_answer == $quizQuestion->question->answer) {
                $score++;
            }
        }

        $quiz = Quiz::find($quiz[0]->id);
        $quiz->score = $score;
        $quiz->remarks = ($score/sizeof($quizQuestions))*100 >= 80 ? 'PASSED' : 'FAILED';
        $quiz->save();

        return view('pages.talent.assessment-result')->with('score', $score);

    }
}