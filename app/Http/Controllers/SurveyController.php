<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    //
    public function arrive()
    {
        $surveys = Survey::all();
        return view('home', ['surveys' => $surveys]);
    }

    public function createSurvey(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['description'] = "Nueva Encuesta";
        $data['userID'] = Auth::id();

        Survey::create($data);

        return $this->arrive();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////
    
    public function editSurvey()
    {
        $url = url()->current();
        $questions = Question::all();
        $survey = Survey::find(collect(explode('/', $url))->last());
        return view('edit-survey', ['questions' => $questions, 'survey' => $survey]);
    }

    public function createQuestion(Request $request)
    {
        $url = url()->current();
        $survey = Survey::find(collect(explode('/', $url))->last());

        $data = $request->validate([
            'prompt' => 'required',
            'type' => 'required'
        ]);

        Question::create($data);
        
        return $this->editSurvey();
    }


}
