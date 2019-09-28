<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
      'author','content'
    ];
    protected $guarded=[];
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
