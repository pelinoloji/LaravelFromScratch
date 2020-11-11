@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">

    <div id="sidebar">
      <ul class="style1">
        <!-- forelse => inclues if statement -->
        @forelse ($articles as $article)
        <div class="content">
          <div class="title">
            <li class="first">
              <h3>
                <!-- <a href="/articles/{{ $article->id }}"> -->
                <a href="{{ route('articles.show',$article)}}">
                  {{ $article->title }}
                </a>
              </h3>
              <p>{!! $article->excerpt !!}</p>
            </li>
          </div>
          <p>
            <img src="/images/banner.jpg" alt="" class="image image-full" />
          </p>

        </div>
        @empty
        <h3>No relevant articles, sorry!</h3>
        @endforelse
      </ul>

    </div>
  </div>
</div>

@endsection