<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Choice;

class ChoiceController extends Controller
{
    public function createChoice($surveyID, $questionID)
    {
        $question = Question::where('questionID', $questionID)->firstOrFail();
        $data['questionID'] = $question->questionID;
        $data['text'] = "New Choice";
        $data['is_other'] = false;

        Choice::create($data);

        return redirect()->route('edit.survey', ['survey' => $surveyID]);
    }

    public function update(Request $request, Question $question, Choice $choice)
    {
        $request->validate([
            'text' => 'required',
            'is_other'
        ]);
        $choice->update([
            'text' => $request->text,
            'is_other' => $request->is_other
        ]);

        return redirect()->route('edit-survey', $question->survey);
    }

    public function destroy(Question $question, Choice $choice)
    {
        $choice->delete();

        return redirect()->route('edit-survey', $question->survey);
    }
}

