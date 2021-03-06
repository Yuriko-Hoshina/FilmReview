@extends('layouts.user.user')

@section('title', 'HOME')

@section('content')
    <div class="container">
        <div class="group row justify-content-center">
            <div class="group col-md-12 row-inline">
                <div class="col-md-8 m-4">
                        <h2>オススメ！数が多い映画</h2>
                    </div>
                    <div class="card col-md-8 ml-4">
                        オススメされた数が多い映画を取得<br>
                        映画/何点/オススメ数
                    </div>
                </div>
            </div>
            
            <div class="group row col-md-12 row-inline">
                
                <div class="col-md-3 mt-4 ml-4">
                    <h2>UpComing??</h2>
                </div>
                
                <div class="col-md-12 justify-content-center">
                    <table class="table table-striped table-light mt-4">
                        <tr>
                            <th width=25%>タイトル</th>
                            <th width=15%>公開日</th>
                            <th width=30%>ジャンル</th>
                            <th width=10%>ポスター</th>
                            <th width=20%>詳細リンク</th>
                        </tr>
                        @foreach($posts['results'] as $tmdb)
                            <tr>
                                <td>{{ $tmdb['title'] }}<br>
                                    
                                    <div>
                                        @if($recommend = " ")
                                            <a href="#"><img src="{{ asset('storage/image/heart-black.png') }}" width="20" height="15"></a>
                                        @else
                                            <a href="#"><img src="{{ asset('storage/image/heart-pink.png') }}" width="20" height="15"></a>
                                        @endif
                                    </div>
                                    
                                </td>
                                <td>{{ $tmdb['release_date'] }}</td>
                                <td>
                                @foreach($tmdb['genre_ids'] as $genre)
                                    {{ App\Genre::getName($genre) }}
                                @endforeach
                                </td>
                                <td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $tmdb['poster_path'] }}"></td>
                                <td>
                                    <a href="{{ action('PageController@detail', ['movie_id' => $tmdb['id']]) }}">詳細画面へ</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

