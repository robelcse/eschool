<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class StudyMaterial extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'subject_id',
        'chapter_id',
        'user_id',
        'unit_id',
        'documents',
        'video',
        'video_link'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['documents'] = json_encode($value);
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function subject(){

         return $this->belongsTo(Subject::class,'subject_id');
    }
    public function grade(){

        return $this->belongsTo(Grade::class,'grade_id');
   }
   public function chapter(){

    return $this->belongsTo(Chapter::class,'chapter_id');
}


}//end class
