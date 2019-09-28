<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=[
        'title','source','content'
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
