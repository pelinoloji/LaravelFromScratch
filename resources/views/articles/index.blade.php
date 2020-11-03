@extends ('layout')

@section ('content')
<div id="wrapper">
  <div id="page" class="container">
    
    <div id="sidebar">
      <ul class="style1">
        @foreach ($articles as $article)
       <div class="content">
         <div class="title">
          <li class="first">
            <h3> 
              <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
            </h3>
            <p>{!! $article->excerpt !!}</p>
          </li>
          </div>
          <p>
        <img src="/images/banner.jpg" alt="" class="image image-full" /> 
      </p>
          
        </div> 
        @endforeach
      </ul>
    
    </div>
  </div>
</div>

@endsection