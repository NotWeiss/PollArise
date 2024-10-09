<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Survey;
use App\Models\Country;

class ResponseController extends Controller
{
    //
    public function answerSurvey($surveyID)
    {
        $survey = Survey::with('questions.choices')->where(
                  'surveyID', $surveyID)->first();

        $countries = Country::all();

        return view('answerSurvey', ['survey' => $survey, 'countries' => $countries]);
    }

    public function createAnswer(Request $request, Survey $survey)
    {

    }
}
