<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
  public function index()
  {
    if (request('tag')) {
      $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
    } else {
      $articles = Article::latest()->get();
    }
    return view('articles.index', ['articles' => $articles]);
  }

  public function show(Article $article) //(Article is a model name $article is the wildcard name. Wildcard name should be the same as variable)
  {
    // Show a single resource...
    // $article = Article::find($id); If you want to use models such as (Article $article) you don't need to use it.

    return view('articles.show', ['article' => $article]);
  }

  public function create()
  {
    $tags = Tag::all();
    return view('articles.create', ['tags' => $tags]);
  }

  public function store()
  {


    $this->validateArticle();

    $article = new Article(request(['title', 'body', 'excerpt']));
    $article->user_id = 1;
    $article->save();
    $article->tags()->attach(request('tags'));
    //Article::create($this->validateArticle());

    return redirect(route('articles.index'));
  }

  public function edit(Article $article)
  {

    // return view('articles.edit', ['article' => $article]);
    return view('articles.edit', compact('article'));
  }

  public function update(Article $article)
  {


    $article->update($this->validateArticle());

    // $article->title = request('title');
    // $article->excerpt = request('excerpt');
    // $article->body = request('body');
    // $article->save();

    // return redirect('/articles/' . $article->id);
    return redirect(route('articles.show', $article));
  }

  public function validateArticle()
  {
    return request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required',
      'tags' => 'exists:tags,id'
    ]);
  }
}
