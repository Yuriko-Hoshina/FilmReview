@extends('layouts.user.user')

@section('title', 'コメントした映画一覧')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-6 mt-4">
                    <h2>{{ Auth::user()->profile->name }}さんのコメントした映画</h2>
                </div>
            </div>
            
            <div class="group row col-md-12 row-inline">
            
                <div class="list col-md-12 mt-4">
                    <div class="row">
                        <table class="table table-light">
                            <thead class="table table-light">
                                <tr>
                                    <th width="30%">映画タイトル</th>
                                    <th width="60%">コメント</th>
                                    <th width="10%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--
                                @foreach($user->commentedMovies() as $movie)
                                @php $comment = $user->getComment($movie['id']); @endphp 
                                    <tr>
                                        <td><a href={{ url('movie/detail?movie_id=' . $movie['id'] . '') }}>{{ \Str::limit($movie['title'], 100) }}</a></td> --}}
                                @foreach($comments as $comment)    
                                    <tr>    
                                        <td><a href={{ url('movie/detail?movie_id=' . $comment['movie_id'] . '') }}>{{ $comment->title }}</a></td>
                                        <td>{{ $comment->body }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ action('User\CommentController@edit', ['id' => $comment->id]) }}">編集</a>
                                            </div>
                                            <div>
                                                <a href="{{ action('User\CommentController@delete', ['id' => $comment->id]) }}">削除</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>
            
            {{--
            <div style="float: right;">{{ $->links() }}</div>
            --}}
        </div>
    </div>
@endsection