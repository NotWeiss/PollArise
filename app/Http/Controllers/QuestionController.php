<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function createQuestion(Survey $survey)
    {
        $data['prompt'] = "newQuestion";
        $data['surveyID'] = $survey->surveyID;
        $data['prompt'] = strip_tags($data['prompt']);
        $data['type'] = "text";
        
        // Attempt to create a Question
        Question::create($data);

        return redirect()->route('survey.open', $survey);
    }


///////////////////////////////////////////////////////////////////////


    public function updateQuestion(Survey $survey, Request $request, $questionID)
    {

        $request->validate([
            'prompt' => 'required',
            'type' => 'required'
        ]);

        $question = Question::where('questionID', $questionID)->firstOrFail();

        $question->update([
            'prompt' => $request->prompt,
            'type' => $request->type
        ]);



        return redirect()->route('survey.open', $survey);
    }


///////////////////////////////////////////////////////////////////////


    public function destroyQuestion(Survey $survey, $questionID)
    {
        $question = Question::where('questionID', $questionID)->firstOrFail();
        
        $question->delete();

        return redirect()->route('survey.open', $survey);
    }
}

