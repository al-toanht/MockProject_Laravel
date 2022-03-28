@extends('users.layout.index')

@section('content')
<div class="container">
    <section id="section-latest" class="section has-sidebar">
        <header class="section-title">
            @foreach($detailCategories as $category)
            <h3>{{$category->category_name}}</h3>
            @if ($category->children)
            @foreach($category->children as $subCategory)
            <h3>{{$subCategory->category_name}}</h3>
            @endforeach
            @endif
            @endforeach
        </header>
        <section class="section-content">
            <div class="article-list listing-layout responsive unique">
                @foreach ($postsByCategory as $post)
                <article class="article-item  type-text">
                    <p class="article-thumbnail">
                        <a href="{{route('home.show', ['home' => $post->id])}}">
                            <img src="images/{{$post->image}}">
                        </a>
                    </p>
                    <header>
                        <p class="article-title">
                            <a href="{{route('home.show', ['home' => $post->id])}}">
                                {{$post->title}}
                            </a>
                        </p>
                        <p class="article-meta">
                            <span class="article-publish">
                                <span class="date">
                                    {{$post->created_at}}
                                </span>
                            </span>
                            <a href="{{route('home.detailscategory', ['category' => $post->category->id])}}">
                                {{$post->category->category_name}}
                            </a>
                        </p>
                        <p class="article-summary">
                            {{$post->content}}
                        </p>
                    </header>
                </article>
                @endforeach
            </div>
        </section>
    </section>
</div>
@endsection