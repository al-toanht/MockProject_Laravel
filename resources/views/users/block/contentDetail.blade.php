@extends('users.layout.index')

@section('content')
<main>
    <div class="page-wrapper">
        <div class="container">
            <article class="the-article">
                <header class="the-article-header">
                    <p class="the-article-category">
                        <a href="">{{$post->category->category_name}}</a>
                    </p>
                    <h1 class="the-article-title">
                        {{$post->title}}
                    </h1>
                    <ul class="the-article-meta">
                        <li class="the-article-author">
                            Nhóm Phóng Viên
                        </li>
                        <li class="the-article-publish">
                            {{$post->created_at}}
                        </li>
                    </ul>
                </header>
                <section class="main">
                    <img class="img-main" alt="" src="images/{{$post->image}}">
                    <p class="the-article-summary">
                        {{$post->content}}
                    </p>
                    <div class="the-article-body">
                        {!!$post->description!!}
                    </div>
                </section>
            </article>
        </div>
    </div>
</main>
@endsection