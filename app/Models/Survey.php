<?php

namespace App\Models;

// Laravel Integrations.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Our Classes.
use App\Models\Question;

/**
* @author Reynaldo "Weiss" Pedroza
*
* Constructs a survey from scratch or DB data.
* @var string $title
* @var array $content
*/
class Survey extends Model
{
    use HasFactory;

    public string $title = "New Survey";
    private array $content = [];

    /**
    * Constructs a Class Instance 
    */
    public function __construct(string $title, array $content = [])
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
    * Returns the Data of the Survey for future CRUD Ops.
    * 
    */
    public function getContent() : array
    {
        return [$this->title, $this->content];
    }

    
    /**
    * Lets the user add Questions to the Survey.
    *
    */
    public function addQuestion(string $question, string $type, 
                                array $answers)
    {
        array_push($this->content, new Question($question, $type, $answers));
    }

    /**
    * Lets the user edit previously created Questions in the survey.
    *
    */
    public function editQuestion(int $questionIndex, string $question, string $type, 
                                 array $answers)
    {
        $this->content[$questionIndex]->updateQuestion($question, $type, $answers);
    }


    /**
    * Lets the user remove a specific Question to the Survey.
    *
    */
    public function removeQuestion(int $position)
    {
        if (isset($this->content[$position]))
            array_splice($this->content, $position, 1);
    }


    /**
    * Lets the user switch the position of two Questions from the Survey.
    *
    */
    public function switchPosition(int $origin, int $finality)
    {
        if ($origin != $finality)
            array_replace($this->content, $this->content[$origin], 
                          $this->content[$finality]);
    }

}
