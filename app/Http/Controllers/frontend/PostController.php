<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{

    public function index()
    {
        $topic = Topic::where([['status','=',1]])->get();
    $list_post = Post::where([['status', '=', 1], ['type','=','post']])
    ->orderBy('created_at','desc')
    ->paginate(9);
    return view("frontend.post", compact('list_post','topic'));
    }

    public function detail($slug)
    {
        $post=Post::where([['status','=',1], ['slug', '=', $slug]])->first();

         $args=[
            ['status', '=', 1], ['type', '=', 'post'],
            ['topic_id', '=', $post->_topic_id], ['id', '!=', $post->id]
        ];
        $list_post = Post::where($args)
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
        return view('frontend.post_detail', compact('post', 'list_post'));
    }


public function topic ($slug)
{

$topic = Topic::where([['slug', '=', $slug], ['status','=',1]])->first();
$list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
->orderBy('created_at', 'desc')
->paginate (9);
return view('frontend.post_topic', compact ('list_post', 'topic'));
}




}
