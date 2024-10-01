<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Our Classes.
use App\Models\Survey;
use App\Models\DataHandler;

/**
* @author Reynaldo "Weiss" Pedroza
*
* Gives the user the tools to create, load, edit and save a survey
* linked to its account.
*
*
*/
class Vertebrae extends Controller
{
    private Survey $survey;
    private ?int $surveyID = null;

    /**
    * Creates a New Survey if the users request for it.
    * 
    */
    public function createSurvey(string $title, array $content)
    {
        $this->survey = new Survey($title, $content);
    }

    /**
    * Loads an existent survey based on the user's owned Surveys
    * allocated in the data base.
    *
    */
    public function loadSurvey(int $id)
    {
        $this->surveyID = $id;
        (string) $title = "";
        (array) $content = [];
        $this->survey = new Survey($title, $content);
    }

    public function editSurvey(?string $title, ?int $questionIndex, string $question, 
                               string $type, string $answers)
    {
        $this->survey->title = $title ?? $this->survey->title;

        if ($questionIndex != null)
            $this->survey->editQuestion($questionIndex, $question, $type, 
                                        explode(",", $answers));
    }
    
    public function deleteSurvey()
    {
        
    }
}
