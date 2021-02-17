<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = "posts";
    
    //primery key
    public $primeryKey = "item_id";
    
    //Timestamps
    public $timestamps = true;
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
