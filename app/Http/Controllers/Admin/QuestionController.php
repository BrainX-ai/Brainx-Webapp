<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentCateory;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{

    public function index(){

        $questions = Question::all();
        $categories = AssessmentCateory::all();

        return view('pages.admin.questions')->with('questions', $questions)->with('categories', $categories);
    }

    public function categories(){

        $categories = AssessmentCateory::all();
        
        return view('pages.admin.assessment-category')->with('categories', $categories);
    }
    
    public function store(Request $request){


        $question = Question::create([
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'answer' => $request->answer,
            'note' => $request->note,
            'explanation' => $request->explanation,
            'assessment_category_id' => $request->assessment_category_id
        ]);

        return redirect()->route('admin.questions');
    }

    public function storeAssessmentCategory(Request $request){


        $question = AssessmentCateory::create([
            'category_name' => $request->category_name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.assessment.categories');
    }

}
