<?php

namespace App\Models;

// Laravel Integrations.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
* @author Reynaldo "Weiss" Pedroza
*
* Defines what's a 'Question', which are the content of a survey.
*
* @var string $question
* @var null|array $answers
* @var string $type
*/
class Question extends Model
{
    use HasFactory;

    private string $question;
    private string $type;
    private ?array $answers = null;

    /**
    * Constructs a Class Instance 
    */
    public function __construct(string $question, string $type, 
                                ?array $answers = null)
    {
        $this->question = $question;
        $this->type = $type;
        $this->answers = $answers;
    }

    /**
    * Constructs a Class Instance 
    */
    public function getComponents()
    {
        return [$this->question, $this->type, $this->answers];
    }

    /**
    * Constructs a Class Instance 
    */
    public function updateQuestion(?string $newQuestion, ?string $newType, 
                                   ?array $newAnswers)
    {
        $this->question = $newQuestion ?? $this->question;
        $this->type = $newType ?? $this->type;
        $this->answers = $newAnswers ?? $this->answers;
    }

}
