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

    protected $fillable = [
        'userID',
        'title',
        'description'
    ];

}
