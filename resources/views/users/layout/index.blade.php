<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <base href=" {{ asset('') }} ">
    <link rel="stylesheet" href="css/user/app.css">
    <link rel="stylesheet" href="css/user/header.css">
    <link rel="stylesheet" href="css/user/main.css">
    <link rel="stylesheet" href="css/user/maindetail.css">
    <link rel="stylesheet" href="css/user/detailcategory.css">
    <link rel="stylesheet" href="css/user/footer.css">
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 text-top">
                        <span class="text-left">Currency rates</span>
                    </div>
                    <div class="col-xl-10">
                        <ul class="top-bar__rates-list">
                            <li>
                                <i class="fa fa-angle-left"></i>
                            </li>
                            <li>
                                <span class="text-rate">USD/EUR</span>
                            </li>
                            <li>
                                <span>1.07724</span>
                            </li>
                            <li>
                                <span class="num-down">-0.00305
                                    <i class="fa fa-caret-down"></i>
                                </span>
                            </li>
                            <li>
                                <span class="text-rate">USD/JPY</span>
                            </li>
                            <li>
                                <span>122.831</span>
                            </li>
                            <li>
                                <span class="num-down">-0.00305
                                    <i class="fa fa-caret-down"></i>
                                </span>
                            </li>
                            <li>
                                <span class="text-rate">GBP/USD</span>
                            </li>
                            <li>
                                <span>1.52214</span>
                            </li>
                            <li>
                                <span class="num-down">-0.00305
                                    <i class="fa fa-caret-down"></i>
                                </span>
                            </li>
                            <li>
                                <span class="text-rate">UAH/USD</span>
                            </li>
                            <li>
                                <span>122.831</span>
                            </li>
                            <li>
                                <span class="num-up">+0.00305
                                    <i class="fa fa-caret-up"></i>
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="top-nav">
            <div class="top_nav_menu_logo">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2">
                            <span class="top-nav__logo">
                                <a href="">
                                    c<img alt="" class="logo" src="css/user/icon/Forma-1.png">ntient
                                </a>
                            </span>
                        </div>
                        <div class="col">
                            <ul class="top_nav__menu">
                                @foreach ($categories as $category)
                                <li class="menu-item">
                                    @if (!$category->parent)
                                    <a
                                        href="{{route('home.detailscategory', ['category' => $category->id])}}">{{$category->category_name}}</a>
                                    <ul class="submenu-header_list">
                                        @foreach ($category->children as $subcategory)
                                        <li>
                                            <a
                                                href="{{route('home.detailscategory', ['category' => $subcategory->id])}}">
                                                {{$subcategory->category_name}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-xl-3 ">
                            <div class="top-nav__links ">
                                <a href="">EN</a> &emsp;
                                <a href="{{route('categories.index')}}" class="user "><i class="fa fa-user icon "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="social-logo">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="social-logo_list">
                            <li>
                                <a href=""><i class="fab fa-vine"></i>

                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-vk"></i>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-footer">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="menu-footer_list">
                            <li>
                                <a href="">categories:</a>
                            </li>
                            @foreach ($categories as $category)
                            <li class="menu-item">
                                @if (!$category->parent)
                                <a href="/">{{$category->category_name}}</a>
                                <ul class="submenu-footer_list">
                                    @foreach ($category->children as $subcategory)
                                    <li>
                                        <a href="">
                                            {{$subcategory->category_name}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <span class="top-nav__logo">c<img alt="" class="logo2"
                                src="css/user/icon/Forma-1.png">ntient</span>
                    </div>
                    <div class="col-xl-8">
                        <div class="contact-us__link">
                            <a href="">Contact us</a>
                            <a href="">Staff index</a>
                            <a href="">Get Home delivery</a>
                            <a href="">Manage My subcriptions</a>
                            <a href="">New sletters & Alerts</a>
                            <a href="">Mobile Apps</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="reserved-created">
                            <div class="reserved">
                                <span>Continent 2015 All rightserved</span>
                            </div>
                            <div class="created">
                                <span>Created by</span>&nbsp;<img alt="" class="logo1" src="images/logo1.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

</html>