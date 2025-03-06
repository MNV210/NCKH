<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Head_Contents;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nga',
        'viet',
        'phienam',
        'head_content',
    ];

    public function headcontent()
    {
        return $this->belongsTo(Head_Contents::class,'head_content');
    }
   
    public function userMakeQuestions()
    {
        return $this->hasMany(UserMakeQuestion::class);
    }
}
