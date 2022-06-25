<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Chapter extends Model
{
    use HasFactory;
    protected $primaryKey = 'chapter_id';
    public function metarials()
    {

        return $this->hasMany(StudyMaterial::class, 'id');
    }
   
    public function units()
    {
        return $this->hasMany(Unit::class, 'chapter_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
