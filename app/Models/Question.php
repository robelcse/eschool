<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'grade_id',
        'chapter_id',
        'user_id',
        'question',
        'type',
        'options',
        'answer',
        'unit_id',
        'admin_approve',
        'teacher_approve'
    ];


    // public function unit(){
    //     return $this->belongsTo(Unit::class);
    // }

    
}
