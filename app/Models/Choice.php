<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $primaryKey = 'choiceID';
    public $timestamps = false;

    protected $fillable = [
        'questionID',
        'text',
        'is_other'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
