@extends('layouts.user.user')

@section('title', 'マイプロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>マイプロフィール</h2>
        </div>
        <div class="group row">
            <div class="col-md-6">
                <a href="{{ action('User\ProfileController@edit', ['id' => $profile->id]) }}" role="button" class="btn btn-primary">編集</a>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
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
                        <tbody>
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