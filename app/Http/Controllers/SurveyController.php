<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    //
    public function openSurvey(Survey $survey)
    {
        $survey->load('questions.choices');
        return view('survey', ['survey' => $survey]);
    }

    public function updateDetails(Request $request, Survey $survey)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['description'] = strip_tags($data['description']);

        $survey->update($data);
        return $this->openSurvey($survey); // test later
    }
}
