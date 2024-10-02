<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function createQuestion(Survey $survey)
    {
        try {
            $data['prompt'] = "newQuestion";
            $data['surveyID'] = $survey->surveyID;
            $data['prompt'] = strip_tags($data['prompt']);
            $data['type'] = "text";  // Ensure "text" is a valid enum
            
            // Attempt to create a Question
            Question::create($data);

            return redirect()->route('edit.survey', $survey);
        } catch (\Exception $e) {
            // Catch and display any errors
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Survey $survey, Question $question)
    {
        $request->validate([
            'prompt' => 'required',
            'type' => 'required'
        ]);

        $question->update([
            'prompt' => $request->prompt,
            'type' => $request->type
        ]);

        return redirect()->route('edit.survey', $survey);
    }

    public function destroy(Survey $survey, Question $question)
    {
        $question->delete();

        return redirect()->route('edit.survey', $survey);
    }
}

