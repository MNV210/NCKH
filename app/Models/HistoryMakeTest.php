<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryMakeTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exercise_id',
        'question_id',
        'answer_id',
        'score',
        'total_question'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
}
