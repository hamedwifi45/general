<?php

namespace App\Http\ViewComposer;

use App\Models\Page;
use Illuminate\View\View;

class PageComposer {
    protected $pages;

    public function __construct(Page $page){
        $this->pages = $page;
    }
    public function compose(View $view){
        return $view->with('pages' , $this->pages->all());
    }

}



?>