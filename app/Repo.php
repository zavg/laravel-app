<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'comment', 'user_id'
    ];

}
