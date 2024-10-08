<?php

namespace App\Models;

// Laravel Integrations.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOption\Option;

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

    protected $primaryKey = 'questionID';
    public $timestamps = false;

    protected $fillable = [
        'surveyID',
        'prompt',
        'type'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'surveyID');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'questionID');
    }
}

