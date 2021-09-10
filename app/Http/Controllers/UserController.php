<?php

namespace App\Http\Controllers;

use App\Video;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function channel($user_id){
        var_dump($user_id);
        $user = User::find($user_id);
        if (!is_object($user)){
            return redirect()->route('home');
        }
        $video = Video::where('user_id',$user_id)->paginate(5);
        return view('user.channel',array(
            'user' => $user,
            'videos' => $video
        ));
    }
}
