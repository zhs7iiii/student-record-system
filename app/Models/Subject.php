<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=[
        'course_id',
        'subject1',
        'subject2',
        'subject3',
        'subject4',
    ];
    
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
