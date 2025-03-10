<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Comment;
use App\Models\Post;

class CommentComposer
{
    protected $comments ;
    protected $post_number ;

    public function __construct(Comment $comment ){
        $this->comments = $comment ;
    }

    public function compose(View $view){
        return $view->with('recent_comments' , $this->comments::with('user','post:id')->take(8)->latest()->get());
    }

}