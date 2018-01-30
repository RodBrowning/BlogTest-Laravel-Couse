<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [

    	'body',
    	'slug',
    	'category_id'
    ];

    public function category()
    {	
    	//Caso a coluna category tenha sido especificada como foreign deve ser adicionadas as colunas relacionadas.
    	//2º argumento coluna nesta tabela, "category_id", e sua refêrencia na tabela de destino, "id", respectivamente.
    	//Se a coluna 'category_id' for adicionada apos a criação deste model o mesmo deve ser recriado.
    	/*return $this->belongsTo('App\Category','category_id','id');*/
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}


