<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

    	'body',
    	'slug',
    	'category'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
