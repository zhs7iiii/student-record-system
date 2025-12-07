<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded =[];
    
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }



    public function season(){
        return $this->belongsTo(Season::class);
    }
}
