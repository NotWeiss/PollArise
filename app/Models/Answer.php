<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $primaryKey = 'answerID';
    public $timestamps = false;

    protected $fillable = ['answer'];

    public function respone()
    {
        return $this->belongsTo(Response::class);
    }

    public function question()
    {
        return $this->hasOne(Question::class);
    }

    public function choice()
    {
        return $this->hasOne(Choice::class);
    }

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
