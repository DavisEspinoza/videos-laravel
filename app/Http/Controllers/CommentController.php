<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $validate = $this->validate($request,[
            'body' => 'required'
        ]);
        $comment = new Comment();
        $User = \Auth::user();

        $comment->user_id = $User->id;
        $comment->body = $request->input('body');
        $comment->video_id = $request->input('video_id');

        $comment -> save();

        return redirect()->route('detailVideo',['video_id' => $comment->video_id])->with(array(
            'message' => 'Comentario añadido correctamente !!'
        ));
    }
    public function delete($comment_id){
        $user = \Auth::user();
        $comment = Comment::find($comment_id);
        if ($user && ($comment->user_id == $user->id || $comment->video->video_id == $user->id)){
            $comment->delete();
        }
        return redirect()->route('detailVideo',['video_id' => $comment->video_id])->with(array(
            'message' => 'Comentario borrado correctamente !!'
        ));
    }
}
