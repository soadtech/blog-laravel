<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $guarded = [];

    
    public function getRoutekeyName(){

        return 'url';
    }

    public function posts(){
        
        return $this->hasMany(Post::class);
    }

  
    //mutador
    public function setNameAttribute($name){
        
        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);

    }
}
