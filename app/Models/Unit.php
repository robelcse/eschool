<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Unit extends Model
{
    use HasFactory;
    protected $primaryKey = 'unit_id';

   
    public function metarial(){

        return $this->hasOne(StudyMaterial::class, 'unit_id');
    } 

    public function questions(){

        return $this->hasMany(Question::class, 'unit_id');
    }

    public function marks(){
        return $this->hasMany(Attemp::class, 'unit_id')->where("user_id",Auth::user()->id);
    }


    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id');
    }


}//end class
