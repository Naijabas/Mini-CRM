<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee', 'company_id');
    }
}
