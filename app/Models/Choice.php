<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionID',
        'text',
        'is_other'
    ];

    protected $primaryKey = 'choiceID';  // Set the primary key explicitly
    public $timestamps = false;  // If you're not using created_at/updated_at

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
