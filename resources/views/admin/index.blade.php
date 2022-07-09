@extends('layouts.admin.admin')

@section('title', '管理者ページ')

@section('content')
    <div class="container">
        <div class="group row">
            <h2>管理者ページ</h2>
            <div class="col-md-6" style="float: right;">{{ $comments->links() }}</div>
        </div>
        <div class="group row">
            <div class="col-md-12">
                <div class="row">
                    <table class="table table-striped table-light mt-4">
                    <tr>
                        <th width=5%>コメントID</th>
                        <th width=20%>タイトル</th>
                        <th width=30%>コメント内容</th>
                        <th width=10%>コメントしたユーザー</th>
                        <th width=10%>投稿日時</th>
                    </tr>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment['id'] }}</td>
                        <td>{{ $comment['title'] }}</td>
                        <td>{{ $comment['body'] }}</td>
                        <td>{{ $comment->user->profile->name }}</td>
                        <td>{{ $comment['updated_at'] }}</td>
                    </tr>
                    @endforeach
                </div>
            </div>
        </div>
            
        <div class="group row">    
            <div class="col-md-12">
                <div class="row">
                    {{--<div><h2>Popular</h2></div>--}}
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
            </div>
        </div>
    </div>
@endsection