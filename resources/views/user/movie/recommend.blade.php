@extends('layouts.user.user')

@section('title', 'オススメした映画一覧')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-8 mt-4">
                    <h2>{{ Auth::user()->profile->name }}さんのオススメした映画</h2>
                </div>
                
                <div class="group row col-md-12 mt-4">
                    <div class="row col-md-5 mt-4">
                        <table class="table table-light">
                            <thead class="table table-light">
                                <tr>
                                    <th width="70%">映画タイトル</th>
                                    <th width="30%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-md-7 mt-4 ml-4">
                        <table class="table table-light">
                            <thead class="table table-light">
                                <tr>
                                    <th width="35%">映画タイトル</th>
                                    <th width="15%">点数</th>
                                    <th width="35%">どんな時に？</th>
                                    <th width="15%">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--
                                @foreach($user->commentedMovies() as $movie)
                                @php $comment = $user->getComment($movie['id']); @endphp
                                    <tr>
                                        <td><a href={{ url('movie/detail?movie_id=' . $movie['id'] . '') }}>{{ \Str::limit($movie['title'], 100) }}</a></td>
                                        <td>{{ $user->getScore($movie['id']). "点" }}</td>
                                        <td>{{ \Str::limit($user->getFeeling($movie['id']), 100) }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ action('User\CommentController@edit', ['id' => $comment->id]) }}">編集</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection