@extends('layouts.admin')

@section('title', '登録済み映画作品一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>映画作品一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\MovieController@add') }}" role="button" class="btn1">新規登録</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\MovieController@info') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="q" value="{{ $q }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead class="table table-light">
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">映画タイトル</th>
                                <th width="10%">製作国</th>
                                <th width="10%">映画ジャンル</th>
                                <th width="10%">公開日</th>
                                <th width="10%">上映時間</th>
                                <th width="15%">監督</th>
                                <th width="15%">公式HP</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $movie)
                                <tr>
                                    <th>{{ $movie->id }}</th>
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
    </div>
@endsection