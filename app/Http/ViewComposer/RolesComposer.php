<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Models\Post;
use App\Models\Role;

class RolesComposer
{
    protected $roles ;
    protected $post_number ;

    public function __construct(Role $roles ){
        $this->roles = $roles ;
    }

    public function compose(View $view){
        $view->with('roles' , $this->roles->all())->with('post_number' );
    }

}