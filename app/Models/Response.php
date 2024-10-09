<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $primaryKey = 'responseID';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
