<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use App\User;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return Auth::check();
});


Broadcast::channel('chat{id}', function ($user, $id) {
    if(User::where('id',$user->id)&&(User::where('id',explode('-',$id)[0])||User::where('id',explode('-',$id)[1]))){
        return true;
    }
    else
        return false;
});