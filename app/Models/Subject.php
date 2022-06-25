<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $primaryKey = 'subject_id';

    protected $fillable = [
        'name',
    ];

    public function metarials()
    {

        return $this->hasMany(StudyMaterial::class, 'id');
    }


    public static function getSubjectByid($id)
    {

        $subject =  Subject::where('subject_id', $id)->first();
        if (!is_null($subject)) {
            return $subject->name;
        } else {
            return $subject;
        }
    }


    public function chapters()
    {
        return $this->hasMany(Chapter::class,'subject_id');
    }
}
