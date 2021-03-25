<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'year',
    ];

    public function question()
    {
        return $this->hasMany('App\Question');
    }
}
