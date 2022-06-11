@extends('layouts.user.user')

@section('title', '映画検索')

@section('content')
　　<div class="container">
　　    <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-3">
                    <h2>映画検索</h2>
                </div>
                <div class="col-md-4">
                    <form action="{{ action('PageController@search') }}" method="get">
                        <div class="form-group row form-inline">
                            <div class="col-md-8 mr-4">
                                <input type="text" class="form-control" name="search" placeholder="映画を検索" value="{{ $search }}">
                            </div>
                            <div class="col-md-2 ml-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                
                
                <div class="col-md-10">
                    <table class="table table-striped table-dark mt-5">
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
                            <td>{{ $tmdb['release_date'] }}</td>
                            <td>
                            @foreach($tmdb['genre_ids'] as $genre)
                                {{ App\Genre::getName($genre) }}
                            @endforeach
                            </td>
                            <td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $tmdb['poster_path'] }}"></td>
                            <td>{{ $tmdb['id'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                
                
                {{-- adminの映画一覧
                <div class="row">
                    <div class="list-news col-md-12 mx-auto">
                        <div class="row">
                            <table class="table table-light">
                                <thead class="table table-light">
                                    <tr>
                                        <th width="15%">映画タイトル</th>
                                        <th width="10%">製作国</th>
                                        <th width="10%">映画ジャンル</th>
                                        <th width="10%">公開日</th>
                                        <th width="10%">上映時間</th>
                                        <th width="15%">監督</th>
                                        <th width="15%">公式HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $movie)
                                        <tr>
                                            <td>{{ \Str::limit($movie->title, 100) }}</td>
                                            <td>{{ \Str::limit($movie->country->name, 100) }}</td>
                                            <td>{{ \Str::limit($movie->genre->name, 100) }}</td>
                                            <td>{{ \Str::limit($movie->release, 100) }}</td>
                                            <td>{{ \Str::limit($movie->movietime, 100) }}</td>
                                            <td>{{ \Str::limit($movie->director, 100) }}</td>
                                            <td>{{ \Str::limit($movie->HP, 100) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                --}}
                
            </div>
        </div>
    </div>
            
@endsection
