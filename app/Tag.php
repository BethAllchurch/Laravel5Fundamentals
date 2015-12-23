<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = [ // which attributes it's ok to mass assign (Model::create(...etc...))
    	'name'
    ];

    public function articles()
    {
    	return $this->belongsToMany('App\Article');
    }
}
