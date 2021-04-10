<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'guest_ip', 'subject_id',
    ];

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
