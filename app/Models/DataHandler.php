<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* @author Reynaldo "Weiss" Pedroza
*
* Handles all SQL Queries for the project.
*/
class DataHandler extends Model
{
    use HasFactory;

    /**
    * Makes a Set Type Query for a Survey.
    */
    public function doCreateSurvey(int $userID, string $surveyTitle)
    {
        
    }

    /**
    * Makes a Create Type Query for a Question.
    */
    public function doCreateQuestions(int $userID, string $surveyTitle, 
                                       array $questionContent)
    {
        
    }
    

    /**
    * Makes a Reading Type Query to a complete Survey.
    */
    public function doRead(int $userID, int $surveyID)
    {

    }

    /**
    * Makes an Update Type Query to a Survey Metadata 
    */
    public function doUpdateSurvey(int $userID, int $surveyID, string $surveyTitle)
    {

    }

    /**
    * Makes an Update Type Query to a question data
    */
    public function doUpdateQuestion(int $userID, int $surveyID, int $questionID, 
                             array $questionContent)
    {

    }

    /**
    * Makes a Drop Type Query to a specific Survey.
    */
    public function doDeleteSurvey(int $userID, int $surveyID)
    {

    }

    /**
    * Makes a Drop Type Query to a specific question.
    */
    public function doDeleteQuestion(int $userID, int $surveyID, int $questionID)
    {

    }


    ////////////////////////////////////////////////////////////////////////////////

    /**
    * Warning: DONT REALLY KNOW IF I NEED TO MAKE THIS KINDA FUNCTION
    */
    private function disassemble($data)
    {

    }
}
