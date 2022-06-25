<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
     protected $primaryKey = 'grade_id';

    protected $fillable = [
        'subject_id',
        'grade'
    ];

    public function metarials(){

        return $this->hasMany(StudyMaterial::class, 'id');
    }

    
}
