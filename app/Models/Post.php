<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class , 'commentable')->whereNull('parent_id');
    }
    public function scopeApproved($query){
        return $this->query()->where('approved' ,1)->latest();
    }
}
