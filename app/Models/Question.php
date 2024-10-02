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

    protected $fillable = [
        'question',
        'type'
    ];

    public function Survey()
    {
        return $this->belongsTo(Survey::class);
    }

}
