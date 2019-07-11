<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{

    protected $fillable = [
        'title', 'slug', 'body', 'category_id', 'user_id'
    ];

//    protected $guarded = [];

    protected static function boot(){
        parent::boot();

        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });
    }

    public function getRouteKeyName (){
        return 'slug';
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getPathAttribute(){
        return "/question/$this->slug";
    }



}
