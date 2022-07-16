@extends('layouts.user.user')

@section('title', '映画検索')

@section('content')
　　<div class="container">
　　    <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline mt-4">
                <div class="col-md-3">
                    <h2>映画検索</h2>
                </div>
                <div class="col-md-4">
                    <form action="{{ action('PageController@search') }}" method="get">
                        <div class="form-group row form-inline">
                            <div class="col-md-8 mr-4">
                                <input type="text" class="form-control" name="search" placeholder="映画タイトルで検索" value="{{ $search }}">
                            </div>
                            <div class="col-md-2 ml-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                
                
                <div class="col-md-10">
                    <table class="table table-striped table-light mt-4">
                        <tr>
                            <th width=20%>タイトル</th>
                            <th width=20%>公開日</th>
                            <th width=20%>ジャンル</th>
                            <th width=10%>ポスター</th>
                            <th width=20%>詳細リンク</th>
                        </tr>
                        @foreach($posts['results'] as $tmdb)
                        <tr>
                            <td>{{ $tmdb['title'] }}</td>
                            <td>{{ $tmdb['release_date']??'' }}</td>
                            <td>
                            @foreach($tmdb['genre_ids'] as $genre)
                                {{ App\Genre::getName($genre) }}
                            @endforeach
                            </td>
                            <td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $tmdb['poster_path']??'' }}"></td>
                            <td><a href="{{ action('PageController@detail', ['movie_id' => $tmdb['id']]) }}">詳細画面へ</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
            
@endsection
