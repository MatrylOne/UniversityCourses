<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function course(){
    	return $this->belongsTo("App\Course");
    }

    protected $fillable = ['firstName', 'lastName'];
}
