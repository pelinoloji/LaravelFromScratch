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

  public function show($id)
  {
    // Show a single resource...
    $article = Article::find($id);

    return view('articles.show', ['article' => $article]);
  }

  public function create()
  {
    return view('articles.create');
  }

  public function store()
  {
    request()->validate([
      'title' => 'required',
      'excerpt' => 'required',
      'body' => 'required',
    ]);
    //dump(request()->all());
    $article = new Article();
    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save();

    return redirect('/articles');
  }

  public function edit($id)
  {
    $article = Article::find($id);

    // return view('articles.edit', ['article' => $article]);
    return view('articles.edit', compact('article'));
  }

  public function update($id)
  {
    $article = Article::find($id);

    $article->title = request('title');
    $article->excerpt = request('excerpt');
    $article->body = request('body');

    $article->save();

    return redirect('/articles/' . $article->id);
  }

  public function destroy()
  {
    // Delete resources...
  }
}
