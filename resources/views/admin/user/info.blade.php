@extends('layouts.admin.admin')

@section('title', '登録済みユーザー一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>登録済みユーザー一覧</h2>
        </div>
        {{--<div class="group row">
            
            <div class="col-md-6">
                <a href="{{ action('Admin\UserController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            
            <div class="col-md-6">
                <form action="{{ action('Admin\UserController@search') }}" method="get">
                    <div class="form-group row">
                        <label>検索</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="q" value="{{ $q }}">
                        </div>
                        <div class="col-md-4">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>--}}
        
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead class="table table-light">
                            <tr>
                                <th width="5%">UserID</th>
                                <th width="10%">メールアドレス</th>
                                <th width="5%">アプリネーム</th>
                                <th width="5%">ProfileID</th>
                                <th width="10%">ユーザーネーム</th>
                                <th width="10%">性別</th>
                                <th width="10%">年代</th>
                                <th width="10%">好きなジャンル</th>
                                <th width="15%">MyBestMovie</th>
                                <th width="10%">自己紹介</th>
                                <th width="5%">操作</th>
                            </tr>
                        </thead>
                        <tbody class="table table-secondary">
                            @foreach($posts as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ \Str::limit($user->email??'', 100) }}</td>
                                    <td>{{ $user->name??'' }}</td>
                                    <th>{{ $user->profile->id??'' }}</th>
                                    <td>{{ \Str::limit($user->profile->name??'', 100) }}</td>
                                    <td>{{ \Str::limit($user->profile->gender->name??'', 100) }}</td>
                                    <td>{{ \Str::limit($user->profile->age->name??'', 100) }}</td>
                                    <td>{{ \Str::limit($user->profile->genre->name??'', 100) }}</td>
                                    <td>{{ \Str::limit($user->profile->best_movie??'', 100) }}</td>
                                    <td>{{ \Str::limit($user->profile->introduction??'', 100) }}</td>
                                    {{--
                                    <td>    
                                        <div>
                                            <a href="{{ action('Admin\UserController@delete', ['user_id' => $user->id]) }}">削除</a>
                                        </div>
                                    </td>
                                    --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection