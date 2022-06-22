@extends('layouts.user.user')

@section('title', '映画詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3 mt-4">
                <h2>映画詳細</h2>
            </div>
            
            <div class="col-md-10 mt-4">
                <table class="table table-light">
                    
                    <tr>
                        <th><img src="{{ 'https://image.tmdb.org/t/p/w185' . $posts['poster_path'] }}"></th>
                        <td>{{ $posts['title'] }}</td>
                    </tr>
                    <tr>
                        <th width=15%>公開日</th>
                        <td>{{ $posts['release_date'] }}</td>
                    </tr>
                    <tr>
                        <th width=20%>ジャンル</th>
                        <td>
                        @foreach($posts['genres'] as $genre)
                            {{ App\Genre::getName($genre) }}
                        @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th width=10%>上映時間</th>
                        <td>{{ $posts['runtime']??'' }}</td>
                    </tr>
                    <tr>
                        <th width=40%>あらすじ</th>
                        <td>{{ $posts['overview'] }}</td>
                    </tr>
                    <tr>
                        <th width=10%>公式HP</th>
                        <td><a href="{{ $posts['homepage'] }}">{{ $posts['homepage'] }}</a></td>
                    </tr>
                    
                </table>
            </div>
        </div>
        
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                <a href="{{ url('movie/search') }}">検索画面へ戻る</a>
            </div>
            
            <div>
                <a href="{{ action('User\CommentController@add', ['movie_id' => $posts['id']]) }}">コメントする</a>
                {{--action('User\CommentController@add', ['movie_id' => $posts['id']])--}}
            </div>
            
        </div>
        
        <div class="group col-md-12">
            <div>
                <h2>この映画へのコメント</h2>
            </div>
            <div>
                最新3件のコメントとコメントした人のアイコン、投稿日時、ユーザーネームを取得して表示
            </div>  
            
        
        </div>
        
    </div>
</div>
@endsection

