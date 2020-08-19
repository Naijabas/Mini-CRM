<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    public function employees()
    {
        return $this->belongsToMany(['App\Company', 'company_id', 'user_id']);
    }
}
