@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <h1>Update Article</h1>

      <form method="POST" action="/articles/{{ $article->id }}">
        @csrf
        @method('PUT')
        <div class="field">
          <label class="label" for="title">Title</label>

          <div class="control">
            <input class="input" type="text" name="title" id="title" value={{$article->title}}>
            @$error('title')
            <!-- $error is a global variable, you can react anywhere, laravel's variable. -->
            <p>{{ $errors->first('title') }}</p>
            @end
          </div>
        </div>

        <div class="field">
          <label class="label" for="excerpt">Excerpt</label>

          <div class="control">
            <textarea class="textarea" name="excerpt" id="excerpt">{{$article->excerpt}}</textarea>
          </div>
        </div>

        <div class="field">
          <label class="label" for="body">Body</label>

          <div class="control">
            <textarea class="textarea" name="body" id="body">{{$article->body}}</textarea>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection