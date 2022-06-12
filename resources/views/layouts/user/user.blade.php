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
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">マイページ</a></li>
                    <li><a href="#">映画検索</a></li>
                </ul>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="p-4" style="display:flex;">
                <div class="col-md-10 mr-0">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます --}}
                @yield('content')
                </div>
                
                <div class="form-group col-md-2 ranking">
                    
                    <div class="border us-ranking">
                        <h4>興行収入ランキング(アメリカ)</h4>
                        <h6>第１位　タイタニック</h6>
                        <h6>第２位　アナと雪の女王</h6>
                        <h6>第３位　ハリー・ポッターと賢者の石</h6>
                        <h6>第４位　ハリー・ポッターと秘密の部屋</h6>
                        <h6>第５位　アバター</h6>
                        <h6>第６位　ラストサムライ</h6>
                        <h6>第７位　Ｅ.Ｔ.</h6>
                        <h6>第７位　アルマゲドン</h6>
                        <h6>第７位　ハリー・ポッターとアズカバンの囚人</h6>
                        <h6>第１０位　アナと雪の女王２</h6>
                    </div>
                    
                    
                    <div class="border ja-ranking">
                        <h4>興行収入ランキング(日本)</h4>
                        <h6>第１位　劇場版「鬼滅の刃」無限列車編</h6>
                        <h6>第２位　千と千尋の神隠し</h6>
                        <h6>第３位　君の名は。</h6>
                        <h6>第４位　もののけ姫</h6>
                        <h6>第５位　ハウルの動く城</h6>
                        <h6>第６位　踊る大捜査線　THE MOVIE2　レインボー・ブリッジを封鎖せよ！</h6>
                        <h6>第７位　崖の上のポニョ</h6>
                        <h6>第８位　天気の子</h6>
                        <h6>第９位　劇場版　呪術廻戦 0</h6>
                        <h6>第１０位　風立ちぬ</h6>
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

