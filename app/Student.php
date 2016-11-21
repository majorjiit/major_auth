<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $table = "student";
     
    protected $fillable = [
        'username','college','year','branch',
    ];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /*
    protected $hidden = [
        'password', 'remember_token',
    ];
    */
}
