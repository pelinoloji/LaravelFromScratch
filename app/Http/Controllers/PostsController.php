<?php

namespace App\Http\Controllers;

// use DB;
use App\Models\Post;

class PostsController
{
  public function show($slug)
  {
    // $post = DB::table('posts')->where('slug', $slug)->first(); the same thing with above
    $post = Post::where('slug', $slug)->firstOrFail();

    // dd($post);

    // if (!array_key_exists($post, $posts)) {
    //   abort(404);
    // }

    // if (!$post) {
    //   abort(404);
    // }

    return view('post', [
      'post' => $post
    ]);
  }
}
