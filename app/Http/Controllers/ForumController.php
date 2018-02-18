<?php

namespace App\Http\Controllers;

use App\Forum;
use App\ForumUser;
use App\Thread;
use App\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function index($id)
    {
        $forum = Forum::findOrFail($id);
        return view('forum', [
            'forum' => $forum,
            'user' => \Auth::user()
        ]);
    }
    public function addPost(Request $request, $id)
    {
        $title = $request->post('title');

        $thread = new Thread();
        $thread->title = $title;
        $thread->user_id = \Auth::id();
        $thread->forum_id = $id;
        $thread->save();

        $post = new Post();
        $content = $request->post('content');
        $post->content = $content;
        $post->user_id = \Auth::id();
        $post->thread_id = $thread->id;
        $post->save();

        return \Response::redirectTo('/forum/'.$id);
    }
    public function follow($id)
    {
        if(\Gate::denies('allow-post-thread-in-forum', $id)) {
            $forumUser = new ForumUser();
            $forumUser->user_id = \Auth::id();
            $forumUser->forum_id = $id;
            $forumUser->save();
        }
        return \Response::redirectTo('/forum/'.$id);
    }
}
