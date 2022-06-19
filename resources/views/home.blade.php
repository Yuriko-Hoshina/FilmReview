@extends('layouts.user.user')

@section('title', 'HOME')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                    <h2>オススメ！数が多い映画</h2>
                </div>
                <div class="card">
                    オススメされた数が多い映画を取得
                </div>
            </div>
        </div>
        
        <div class="group col-md-12 row-inline">
            <div class="col-md-3 mt-4">
                <h2>UpComing??</h2>
            </div>
            
            <div class="col-md-10">
                <table class="table table-striped table-light mt-4">
                    <tr>
                        <th width=20%>タイトル</th>
                        <th width=20%>公開日</th>
                        <th width=30%>ジャンル</th>
                        <th width=10%>ポスター</th>
                        <th width=20%>詳細リンク</th>
                    </tr>
                    @foreach($posts['results'] as $tmdb)
                    <tr>
                        <td>{{ $tmdb['title'] }}</td>
                        <td>{{ $tmdb['release_date'] }}</td>
                        <td>
                        @foreach($tmdb['genre_ids'] as $genre)
                            {{ App\Genre::getName($genre) }}
                        @endforeach
                        </td>
                        <td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $tmdb['poster_path'] }}"></td>
                        <td><a href="{{ action('PageController@detail', ['movie_id' => $tmdb['id']]) }}">詳細画面へ</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
            
            {{--
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    HOME画面表示
                    
                </div>
            </div>
            --}}
            
            
        </div>
    </div>
</div>
@endsection

