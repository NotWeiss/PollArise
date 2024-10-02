<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
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
    
    public function editSurvey(Survey $survey)
    {
        $questions = $survey->questions;
        $survey = Survey::with('questions')->find($survey->surveyID);
        return view('edit-survey', compact('survey', 'questions'));
    }

    public function update(Request $request, Survey $survey)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['description'] = strip_tags($data['description']);

        $survey->update($data);
        return redirect()->route('edit.survey', $survey);
    }
    
}
