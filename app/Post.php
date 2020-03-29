<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $dates = ['published_at'];

    protected static function boot(){

        parent::boot();

        static::deleting(function($post){
            $post->photos->each->delete();
         
            
        });
    }


    public function getRouteKeyName(){
        return 'url';
    }

    public function category() { // $post->category->name
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query) {
        $query->latest('published_at')
        ->where('published_at', '<=', Carbon::now());
       
    }

    public function setPublishedAtAttribute($published_at){
       
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category){
       
        $this->attributes['category_id'] = Category::find($category)
            ? $category
            : Category::create(['name' => $category])->id;
    }

}
