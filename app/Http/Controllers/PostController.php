<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\UserLikeMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function createPost(Request $request)
    {

        $image_url = "";
        if ($request->hasFile('postImage')) {
            $image_url =  time() . '_' .  $request->postImage->getClientOriginalName();
            request()->postImage->move(public_path('img/post/'), $image_url);
        }

        $post = new Post();
        $post->caption = $request->caption;
        $post->user_id = Auth::id();
        $post->img_url = $image_url;
        $post->status = 1;
        $post->save();
        return Redirect::to('/');
    }

    public function index()
    {
        $posts = Post::withCount('likes')
            ->withCount('comments')
            ->with('user')
            ->orderBy('id', 'DESC')
            ->get();
        return view('pages.welcome', compact('posts'));
    }

    public function like(Request $request)
    {

        if ($request->status == 0) {
            $like = new UserLikeMapping();
            $like->user_id = Auth::id();
            $like->post_id = $request->postId;
            $like->save();
        } else {
            $like = UserLikeMapping::where('post_id', $request->postId)->where('user_id', Auth::id());
            $like->delete();
        }

        $data['count'] = UserLikeMapping::where('post_id', $request->postId)->count();
        return json_encode($data);
    }

    public function getComments($postId)
    {
        $comments = Comment::where('post_id', $postId)->with('user')->get();
        return view('includes.comments', compact('comments'));
    }

    public function postComment(Request $request)
    {

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $request->postId;
        $comment->user_id = Auth::id();

        $comment->save();

        $comments = Comment::where('post_id', $request->postId)->with('user')->get();
        return view('includes.comments', compact('comments'));
    }
}
