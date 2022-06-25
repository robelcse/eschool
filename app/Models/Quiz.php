<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizes';


    protected $fillable = [
        'subject_id',
        'grade_id',
        'chapter_id',
        'user_id',
        'unit_id',
        'score'
        
    ];


    // public function unit(){
    //     return $this->belongsTo(Unit::class);
    // }

    
}
