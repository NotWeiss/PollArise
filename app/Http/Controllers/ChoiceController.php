<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Choice;
use App\Models\Survey;
use PhpParser\Node\Stmt\Echo_;

use function PHPUnit\Framework\isNull;

class ChoiceController extends Controller
{
    public function createChoice(Survey $survey, $questionID)
    {
        $data['questionID'] = $questionID;
        $data['text'] = "New Choice";
        $data['is_other'] = false;

        Choice::create($data);

        return redirect()->route('survey.open', $survey);
    }


///////////////////////////////////////////////////////////////////////


    public function updateChoice(Survey $survey, Request $request, 
                                 $questionID, $choiceID)
    {
        
        $request->validate([
            'text' => 'required',
            'is_other' => 'nullable' 
        ]);

        $choice = Choice::where('choiceID', $choiceID)->first();

        $choice->update([
            'text' => $request->text,
            'is_other' => $request->has('is_other')
        ]);
        
        return redirect()->route('survey.open', $survey);
    }


///////////////////////////////////////////////////////////////////////


    public function destroyChoice(Survey $survey, $questionID, $choiceID)
    {
        $choice = Choice::where('choiceID', $choiceID)->first();

        $choice->delete();

        return redirect()->route('survey.open', $survey);
    }
}

