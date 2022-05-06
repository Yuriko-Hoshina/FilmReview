@extends('layouts.user.user')

@section('title', 'マイプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>マイプロフィール</h2>
        </div>
        <div class="group row">
            <div class="col-md-6">
                @if(Auth::user()->profile)
                    <a href="{{action('User\ProfileController@edit')}}">編集</a>
                @else
                    <a href="{{action('User\ProfileController@create')}}">作成</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead class="table table-light">
                            <tr>
                                <th width="10%">ユーザーネーム</th>
                                <th width="10%">性別</th>
                                <th width="10%">年代</th>
                                <th width="15%">好きなジャンル</th>
                                <th width="15%">マイベストムービー</th>
                                <th width="10%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody class="table table-secondary">
                            @foreach($posts as $profile)
                                <tr>
                                    <td>{{ \Str::limit($profile->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->gender->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->age->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->genre->name, 100) }}</td>
                                    <td>{{ \Str::limit($profile->best_movie, 100) }}</td>
                                    <td>{{ \Str::limit($profile->introduction, 100) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection