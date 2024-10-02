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

    protected $fillable = [
        'surveyID',
        'prompt',
        'type'
    ];

    protected $primaryKey = 'questionID';  // Set the primary key explicitly
    public $timestamps = false;  // If you're not using created_at/updated_at

    public function survey()
    {
        return $this->belongsTo(Survey::class, 'surveyID');  // Specify foreign key
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'questionID');
    }

    public function getRouteKeyName()
    {
        return 'questionID';
    }
}

