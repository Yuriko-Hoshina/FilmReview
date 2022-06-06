@extends('layouts.user.user')

@section('title', '映画作品詳細')

@section('content')
    <div class="container">
         <div class="group row inline">
            <div class="col-md-5">
                <h2>映画作品詳細</h2>
            </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
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
                                    {{--
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\MovieController@edit', ['id' => $movie->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\MovieController@delete', ['id' => $movie->id]) }}">削除</a>
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


???????????