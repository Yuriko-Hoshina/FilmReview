<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel"> {{-- fixed-topつけたいけどタイトル消えちゃう --}}
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                        @auth
                        <div>
                            @if(Auth::user()->unique_id != null)
                            <img src="{{ Auth::user()->getAvatar() }}" width="48" height="48">
                            @else
                            <img src="{{ asset('storage/image/' . Auth::user()->getAvatar()) }}" width="48" height="48">
                            @endif
                        </div>
                        @endauth
                        
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="sub">
                <ul>
                    <li><a href="{{ action('PageController@info') }}">HOME</a></li>
                    <li><a href="{{ action('PageController@mypage') }}">マイページ</a></li>
                    <li><a href="{{ action('PageController@search') }}">映画検索</a></li>
                </ul>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="main" style="display: flex; margin: 15px;">
                <div class="group col-md-10">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます --}}
                @yield('content')
                </div>
                
                <div class="group col-md-2 ranking mt-4">
                    
                    <div class="card border us-ranking">
                        <div class="card-header"><h4>興行収入ランキング(国内洋画)</h4></div>
                        <div class="card-body">
                            <h6><a href={{ url("movie/detail?movie_id=597") }}>第１位　タイタニック</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=109445") }}>第２位　アナと雪の女王</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=671") }}>第３位　ハリー・ポッターと賢者の石</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=672") }}>第４位　ハリー・ポッターと秘密の部屋</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=19995") }}>第５位　アバター</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=616") }}>第６位　ラストサムライ</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=601") }}>第７位　Ｅ.Ｔ.</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=95") }}>第７位　アルマゲドン</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=673") }}>第７位　ハリー・ポッターとアズカバンの囚人</a></h6>
                            <h6><a href={{ url("movie/detail?movie_id=330457") }}>第１０位　アナと雪の女王２</a></h6>
                        </div>
                    </div>
                    
                    <div class="card border ja-ranking">
                        <div class="card-header"><h4>興行収入ランキング(国内邦画)</h4></div>
                        <div class="card-body">
                            <h6><a href={{ url("movie/detail?movie_id=635302") }}>第１位　劇場版「鬼滅の刃」無限列車編</h6>
                            <h6><a href={{ url("movie/detail?movie_id=129") }}>第２位　千と千尋の神隠し</h6>
                            <h6><a href={{ url("movie/detail?movie_id=372058") }}>第３位　君の名は。</h6>
                            <h6><a href={{ url("movie/detail?movie_id=128") }}>第４位　もののけ姫</h6>
                            <h6><a href={{ url("movie/detail?movie_id=4935") }}>第５位　ハウルの動く城</h6>
                            <h6><a href={{ url("movie/detail?movie_id=55384") }}>第６位　踊る大捜査線　THE MOVIE2　レインボー・ブリッジを封鎖せよ！</h6>
                            <h6><a href={{ url("movie/detail?movie_id=12429") }}>第７位　崖の上のポニョ</h6>
                            <h6><a href={{ url("movie/detail?movie_id=568160") }}>第８位　天気の子</h6>
                            <h6><a href={{ url("movie/detail?movie_id=810693") }}>第９位　劇場版　呪術廻戦 0</h6>
                            <h6><a href={{ url("movie/detail?movie_id=149870") }}>第１０位　風立ちぬ</h6>
                        </div>
                    </div>
                    
                </div>
                
            </main>
            
        </div>
    </body>
    
    <footer>
        <nav class="navbar navbar-expand-md navbar-sns">
            <div class="footer">
                <p class="copyright"><i class="fab fa-twitter-square fa-2x fa-fw twiiter"></i>(C) 2022 MovieReview.</p>
            </div>
        </nav>
    </footer>
</html>

