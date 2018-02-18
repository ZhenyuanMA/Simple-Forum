<?php

namespace App\Http\Controllers;

use App\Post;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    //
    public function index($id)
    {
        $thread = Thread::findOrFail($id);
        return view('thread', [
            'thread' => $thread
        ]);
    }
    public function addPost(Request $request, $id)
    {
        $content = $request->post('content');
        $post = new Post();
        $post->content = $content;
        $post->user_id = \Auth::id();
        $post->thread_id = $id;
        $post->save();

        return \Response::redirectTo('/thread/'.$id);
    }
}
