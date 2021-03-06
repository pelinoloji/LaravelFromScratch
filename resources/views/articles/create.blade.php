@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <h1>New Article</h1>

      <form method="POST" action="/articles">
        @csrf
        <div class="field">
          <label class="label" for="title">Title</label>

          <div class="control">
            <input class="input" type="text" name="title" id="title">
          </div>
        </div>

        <div class="field">
          <label class="label" for="excerpt">Excerpt</label>

          <div class="control">
            <textarea class="textarea" name="excerpt" id="excerpt"></textarea>
          </div>
        </div>

        <div class="field">
          <label class="label" for="tags">Tags</label>

          <div class="control">
            <select name="tags[]" id="tags" multiple>
              @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="field">
          <label class="label" for="body">Body</label>

          <div class="control">
            <textarea class="textarea" name="body" id="body"></textarea>
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