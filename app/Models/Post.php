<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
    protected $fillable = [
        'title',
        'body',
        'slug',
        'approved',
        'category_id',
        'image_path',
        'user_id', // إذا كنت تريد تعيين user_id أيضًا
    ];
    protected function title(): Attribute
    {
      return Attribute::make(
        set: fn ($value) => [
          'title' => $value,
          'slug' => Slug::unquiSlug($value,'posts')
        ],
      );
    }
}
