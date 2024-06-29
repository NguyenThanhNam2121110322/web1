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
    $list_post = Post::where([['status', '=', 1], ['type','=','post']])
    ->orderBy('created_at','desc')
    ->paginate(9);
    return view("frontend.post", compact('list_post'));
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

//     public function getlisttopicid($rowid)
// {
//     $listtopid = [];

//     array_push($listtopid, $rowid);

//     $list1 = Topic::where([['id', '=', $rowid], ['status', '=', 1]])
//         ->select("id")
//         ->get();

//     if (count($list1) > 0) {
//         foreach ($list1 as $row1) {
//             array_push($listtopid, $row1->id);
//         }
//     }

//     return $listtopid;
// }

// public function topic($slug)
// {
//     $row = Topic::where('slug', '=', $slug)
//         ->select("id", "name", "slug")
//         ->first();

//     $list_post = [];

//     if ($row != null) {
//         $listtopid = $this->getlisttopicid($row->id);

//         $list_post = Post::where('status', '=', 1)
//             ->where('topic_id', $listtopid)
//             ->orderBy('created_at', 'desc')
//             ->paginate(9);
//     }

//     return view("frontend.post_topic", compact('list_post', 'row'));
// }

public function topic ($slug)
{

$topic = Topic::where([['slug', '=', $slug], ['status','=',1]])->first();
$list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
->orderBy('created_at', 'desc')
->paginate (9);
return view('frontend.post_topic', compact ('list_post', 'topic'));
}




}
