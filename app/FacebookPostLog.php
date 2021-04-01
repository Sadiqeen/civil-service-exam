<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPostLog extends Model
{
    protected $fillable = [
        'post_id', 'question_id',
    ];
}
