<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('real_not.{user_id}',function($user , $user_id){
    return (int) $user->id === (int) $user_id;
});
