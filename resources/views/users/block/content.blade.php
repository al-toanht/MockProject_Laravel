@extends('users.layout.index')

@section('content')
<main>
    <div class="news">
        <div class="container">
            <?php $i = 0; ?>
            <div class="row  no-gutters">
                @foreach($newPostsTop as $post)
                <div class="col-xl-6" style="background: 
                    url(images/{{$post->image}});">
                    <div class="about__bignews">
                        <div class="about__category ">
                            <span>{{$post->category->category_name}}</span>
                        </div>
                        <div class="about__date-time___title ">
                            <img alt="" src="css/user/icon/timetable.png "><span
                                class="about__date-time ">{{$post->created_at}}</span>
                            <a href="{{route('home.show', ['home' => $post->id ])}}">
                                <p class="about__title ">{{$post->title}}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-xl-6">
                    <div class="row child no-gutters" style="height:50%">
                        @foreach($newPostsSmallAbove as $post)
                        <div class="col-xl-6 col-xl-3" style="height:100%;
                            background: url(images/{{$post->image}});
                            background-repeat: no-repeat; background-size: cover;">
                            <div class="about__smallnew">
                                <div class="about__category">
                                    <span class="category5">{{$post->category->category_name}}</span>
                                </div>
                                <div class="about__date-time___title ">
                                    <img alt="" src="css/user/icon/timetable.png "><span
                                        class="about__date-time ">{{$post->created_at}}</span>
                                    <a href="{{route('home.show', ['home' => $post->id ])}}">
                                        <p class="about__title ">{{$post->title}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row child no-gutters " style="height:50%">
                        @foreach($newPostsSmallBelow as $post)
                        <div class="col-xl-6 col-xl-3" style="height:100%;
                            background: url(images/{{$post->image}});
                            background-repeat: no-repeat;background-size: cover;">
                            <div class="about__smallnew">
                                <div class="about__category">
                                    <span class="category4">{{$post->category->category_name}}</span>
                                </div>
                                <div class="about__date-time___title ">
                                    <img alt="" src="css/user/icon/timetable.png"><span
                                        class="about__date-time ">{{$post->created_at}}</span>
                                    <a href="{{route('home.show', ['home' => $post->id ])}}">
                                        <p class="about__title ">{{$post->title}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-news">
        <div class="container">
            <div class="search-news-input">
                <input type="text" class="txt" placeholder="&#61442;  What happend in the continent">
                <button class="button ">Search</button>
            </div>
        </div>
    </div>
    <div class="world">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="banner-news normal-banner">
                        <span>Star</span>
                        <div class="nav-slider">
                            <i class="fa fa-angle-left "></i>
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($starPosts as $post)
                        <div class="col-xl-6">
                            <div class="about__news">
                                <div class="about__category-img">
                                    <a href="{{route('home.show', ['home' => $post->id ])}}">
                                        <img alt="" src="images/{{$post->image}}">
                                    </a>
                                    <div class="about__category category2">
                                        <span>{{$post->category->category_name}}</span>
                                    </div>
                                </div>
                                <div class="about__description">
                                    <span class="about__date-time"><i
                                            class="far fa-calendar-alt"></i>{{$post->created_at}}</span>
                                    <span class="comment"><i class="far fa-comment-alt"></i>13</span>
                                    <div class="about__title">
                                        <a href="{{route('home.show', ['home' => $post->id ])}}">
                                            {{$post->title}}
                                        </a>
                                    </div>
                                    <p class="description">{{$post->content}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="weather">
                        <div class="banner-news smallbanner">
                            <span>weather forecast</span>
                        </div>
                        <div class="weather-forecast">
                            <div class="top-forecast">
                                <div class="top-left-forecast">
                                    <span class="big-text">Mostly Sunny</span>
                                    <div class="big-img">
                                        <img alt="" src="images/partly_cloudy.png">
                                        <span class="degree">6</span>
                                        <div class="degree-c-f">
                                            <span class="degree-c">&#8451; /</span>
                                            <span class="degree-f">&#8457;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="top-right-forecast">
                                    <span>
                                        LONDON <br> UNITED KINGDOM <br> 13:00,TUE
                                    </span>
                                </div>
                            </div>
                            <div class="weather-forecast__chart">
                                <img alt="" src="images/chart.png">
                            </div>
                            <div class="bottom-forecast">
                                <div class="weather-forecast__day">
                                    <span class="rank">tue</span>
                                    <div class="weather-forecast__img">
                                        <img alt="" src="images/rain_s_cloudy.png">
                                    </div>
                                    <span class="degree-small_first">6&#176;</span>
                                    <span class="degree-small_second">0&#176;</span>
                                </div>
                                <div class="weather-forecast__day">
                                    <span class="rank">wed</span>
                                    <div class="weather-forecast__img">
                                        <img alt="" src="images/partly_cloudy_small.png">
                                    </div>
                                    <span class="degree-small_first">6&#176;</span>
                                    <span class="degree-small_second">0&#176;</span>
                                </div>
                                <div class="weather-forecast__day">
                                    <span class="rank">thu</span>
                                    <div class="weather-forecast__img">
                                        <img alt="" src="images/rain_light.png">
                                    </div>
                                    <span class="degree-small_first">6&#176;</span>
                                    <span class="degree-small_second">0&#176;</span>
                                </div>
                                <div class="weather-forecast__day">
                                    <span class="rank">fri</span>
                                    <div class="weather-forecast__img">
                                        <img alt="" src="images/partly_cloudy_small.png">
                                    </div>
                                    <span class="degree-small_first">6&#176;</span>
                                    <span class="degree-small_second">0&#176;</span>
                                </div>
                                <div class="weather-forecast__day">
                                    <span class="rank">sat</span>
                                    <div class="weather-forecast__img">
                                        <img alt="" src="images/rain_s_cloudy.png">
                                    </div>
                                    <span class="degree-small_first">6&#176;</span>
                                    <span class="degree-small_second">0&#176;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="radio">
                        <div class="banner-news smallbanner">
                            <span>live content radio</span>
                        </div>
                        <div class="music-player">
                            <button class="button"><i class="fa fa-play-circle-o"></i></button>
                            <div class="music-player-text">
                                Now playing: AVICII - Stories
                            </div>
                            <div class="volume">
                                <div class="volume-text">Volume</div>
                                <div class="img-volume">
                                    <img alt="" src="images/volume.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breaking-news">
        <div class="top-banner">
            <div class="container">
                <div class="top-banner-news">
                    <span class="big">breaking news</span>
                    <div class="top-banner-center">
                        <span class="time">21:13</span>&emsp;
                        <p><i class="fas fa-camera"></i>&ensp;free hour, when our power of choice is umtrammlled and
                            when eing able to do
                        </p>
                    </div>
                    <div class="nav-slider">
                        <i class="fa fa-angle-left"></i>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="banner-news smallbanner" style="margin-bottom: 5%">
                            <span>cine</span>
                        </div>
                        @foreach ($cinePosts as $post)
                        <div class="about__description">
                            <span class="about__date-time"><i
                                    class="far fa-calendar-alt"></i>{{$post->created_at}}</span>
                            <span class="comment"><i class="far fa-comment-alt"></i>13</span>
                            <div class="about__title">
                                <a href="{{route('home.show', ['home' => $post->id ])}}">
                                    {{$post->title}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-xl-8">
                        <div class="banner-news normal-banner">
                            <span>the most popular video</span>
                            <div class="nav-slider">
                                <i class="fa fa-angle-left blue-icon"></i>
                                <i class="fa fa-angle-right blue-icon"></i>
                            </div>
                        </div>
                        <div class="play-triangle">
                            <div class="play-video">
                                <iframe class="big-video" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                </iframe>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="play-triangle">
                                    <div class="play-video">
                                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="play-triangle">
                                    <div class="play-video">
                                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="play-triangle">
                                    <div class="play-video">
                                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="play-triangle">
                                    <div class="play-video">
                                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sport-new">
        <div class="container">
            <div class="banner-news">
                <span>SPORT</span>
                <div class="nav-slider">
                    <i class="fa fa-angle-left blue-icon"></i>
                    <i class="fa fa-angle-right blue-icon"></i>
                </div>
            </div>
            <div class="row">
                @foreach ($sportPosts as $post)
                <div class="col-xl-4">
                    <div class="about__news">
                        <div class="about__category-img">
                            <a href="{{route('home.show', ['home' => $post->id ])}}">
                                <img alt="" src="images/{{$post->image}}">
                            </a>
                            <div class="about__category cate1">
                                <span class="">{{$post->category->category_name}}</span>
                            </div>
                        </div>
                        <div class="about__description">
                            <span class="about__date-time"><i
                                    class="far fa-calendar-alt"></i>{{$post->created_at}}</span>
                            <span class="comment"><i class="far fa-comment-alt"></i>13</span>
                            <div class="about__title ">
                                <a href="{{route('home.show', ['home' => $post->id ])}}">
                                    {{$post->title}}
                                </a>
                            </div>
                            <p class="description">{{$post->content}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="live-concert">
        <div class="container">
            <div class="banner-news">
                <span>live concert</span>
            </div>
            <div class="play-triangle">
                <div class="play-video">
                    <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="group-new">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="banner-news smallbanner">
                        <span>author's post</span>
                    </div>
                    <div class="about__description">
                        <div class="avatar-user">
                            <img src="images/img1.png" alt="Avatar" style="height: 50px">
                        </div>
                        <div>
                            <span class="about__date-time"><i class="far fa-calendar-alt"></i>abc</span>
                            <span class="comment"><i class="far fa-comment-alt"></i>13</span>
                            <div class="about__title">
                                <a href="">
                                    abc
                                </a>
                            </div>
                            <p class="description">abc</p>
                            <span class="author"><i class="fas fa-user"></i>Sara Ware</span>
                        </div>
                    </div>
                    <div class="banner-news smallbanner">
                        <span>trendings on social</span>
                    </div>
                    <div class="dropdown-trending">
                        <div class="dropdown-select">
                            <p class="select">
                                <a href="">
                                    abc
                                </a>
                            </p>
                            <i class=" fa fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="banner-news smallbanner">
                                <span>school</span>
                            </div>
                            <?php $num = 0;?>
                            @foreach($schoolPosts as $post)
                            <?php ++$num ?>
                            @if ($num == 1)
                            <div class="about__smallnew" style="background:
                                 url(images/{{$post->image}});
                                 background-repeat: no-repeat;background-size: cover;">
                                <div class="about__category">
                                    <span class="category7">{{$post->category->category_name}}</span>
                                </div>
                                <div class="about__date-time___title ">
                                    <img alt="" src="css/user/icon/timetable.png"><span
                                        class="about__date-time ">{{$post->created_at}}</span>
                                    <a href="{{route('home.show', ['home' => $post->id])}}">
                                        <p class="about__title ">{{$post->title}}</p>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="title-new">
                                <a href="{{route('home.show', ['home' => $post->id])}}">
                                    <p class="about__title ">{{$post->title}}</p>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-xl-6">
                            <div class="banner-news smallbanner">
                                <span>music</span>
                            </div>
                            <?php $num1 = 0;?>
                            @foreach ($musicPosts as $post)
                            <?php ++$num1 ?>
                            @if ($num1 == 1)
                            <div class="about__smallnew" style="background: 
                                url(images/image12);
                                background-repeat: no-repeat;background-size: cover;">
                                <div class="about__category">
                                    <span class="category4">{{$post->category->category_name}}</span>
                                </div>
                                <div class="about__date-time___title ">
                                    <img alt="" src="css/user/icon/timetable.png"><span
                                        class="about__date-time ">{{$post->created_at}}</span>
                                    <a href="{{route('home.show', ['home' => $post->id])}}">
                                        <p class="about__title ">{{$post->title}}</p>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div class="title-new">
                                <a href="{{route('home.show', ['home' => $post->id])}}">
                                    <p class="about__title ">{{$post->title}}</p>
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-xl-12">
                            <div class="banner-news normal-banner">
                                <span>World</span>
                            </div>
                            <div id="myCarousel" class="carousel slide border" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a href="">
                                            <img class="d-block w-100" style="max-height: 500px;" src="images/image12"
                                                alt="Leopard">
                                        </a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="link-carousel" href="">
                                                <h5>abc</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <a href="">
                                            <img class="d-block w-100" style="max-height: 500px;" src="images/image12"
                                                alt="Leopard">
                                        </a>
                                        <div class="carousel-caption d-none d-md-block">
                                            <a class="link-carousel" href="">
                                                <h5>abc</h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="about__category-img">
                                        <img alt="" src="images/image12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection