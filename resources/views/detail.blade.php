@extends('layouts.user.user')

@section('title', '映画詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="group row col-md-12 row-inline mt-4">
            <div class="col-md-3">
                <h2>映画詳細</h2>
            </div>
            <div class="col-md-4">
                
                <button type="submit" class="btn btn-primary">
                <a href="{{ action('User\CommentController@add', ['movie_id' => $posts['id']]) }}">コメントする</a>
                </burron>
               
               {{--
                @if( != null)
                    <button type="submit" class="btn btn-primary">
                    <a href="{{ action('User\CommentController@edit', ['movie_id' => $posts['id']]) }}">編集</a>
                    </button>
                @else
                    <button type="submit" class="btn btn-primary">
                    <a href="{{ action('User\CommentController@add', ['movie_id' => $posts['id']]) }}">コメントする</a>
                    </burron>
                @endif
                --}}
            </div>
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
        
        
        <div class="group row col-md-12 row-inline">
            <div class="col-md-12" style="text-align: right;">
                <a href="{{ url('movie/search') }}">検索画面へ戻る</a>
            </div>
        </div>
        
        <div class="group col-md-12 m-4">
            <div>
                <h2>この映画へのコメント</h2>
            </div>
            
            @if(Auth::user() != null)
            <div>
                <table class="table table-striped table-light mt-4">
                    <thead class="table table-striped table-light">
                        <tr>
                            <th width="30%">コメント</th>
                            <th width="15%">ユーザーネーム</th>
                            <th width="10%">投稿日時</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment['body'] }}</td>
                                <td>{{ $comment['user_id'] }}</td>
                                <td>{{ $comment['updated_at'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
            @else
            <div>ログインすると見れます</div>
            @endif
        
        </div>
        
    </div>
</div>
@endsection

