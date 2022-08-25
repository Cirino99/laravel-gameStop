<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'image', 'price', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User'); // il belongs to sta dalla parte dell'1 della relazione e il nome deve essere singolare
    }

    public function platforms()
    {
        return $this->belongsToMany('App\Models\Platform');
    }
}
