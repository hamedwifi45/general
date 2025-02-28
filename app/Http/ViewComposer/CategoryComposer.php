<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;

class CategoryComposer
{
    protected $categories ;
    protected $post_number ;

    public function __construct(Category $category ,Post $post_number){
        $this->categories = $category ;
        $this->post_number = $post_number ;
    }

    public function compose(View $view){
        $view->with('categories' , $this->categories->all())->with('post_number', $this->post_number->where('approved' , 1)->count() );
    }

}