<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
  public function index()
  {
    // Render a list of resource...
    $articles = Article::latest()->get();

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
    return view('articles.create');
  }

  public function store()
  {
    $validatedAttributes = request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required',
    ]);


    // $article = new Article();
    // $article->title = request('title');
    // $article->excerpt = request('excerpt');
    // $article->body = request('body');
    // $article->save(); 

    //You can use Article::create method instead of this

    // Article::create([
    //   'title' => request('title'),
    //   'excerpt' => request('excerpt'),
    //   'body' => request('body')
    // ]);

    Article::create($this->validateArticle());

    return redirect('/articles');
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

    return redirect('/articles/' . $article->id);
  }

  public function validateArticle()
  {
    return request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required',
    ]);
  }
}
