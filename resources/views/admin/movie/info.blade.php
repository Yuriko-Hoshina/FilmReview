@extends('layouts.admin.admin')

@section('title', '登録済み映画作品一覧')

@section('content')
    <div class="container">
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                <h2>映画作品一覧</h2>
            </div>
            {{--
            <div class="col-md-5">
                <a href="{{ action('Admin\MovieController@add') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
            <div class="col-md-4">
                <form action="{{ action('Admin\MovieController@info') }}" method="get">
                    <div class="form-group row form-inline">
                        <label>検索</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="q" placeholder="映画を検索" value="{{ $q }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
            --}}
        </div>
        <div>*TMDbから情報をとってきています</div>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-striped table-light">
                        <thead class="table table-striped table-light">
                            <tr>
                                <th width="10%">TMDbのid</th>
                                <th width="15%">映画タイトル</th>
                                <th width="10%">ジャンル*</th>
                                <th width="30%">あらすじ</th>
                                <th width="10%">公開日</th>
                                <th width="5%">上映時間*</th>
                                <th width="10%">製作国*</th>
                                <th width="10%">公式HP</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $movie)
                                <tr>
                                    <th>{{ $movie->id }}</th>
                                    <td>{{ $movie->title }}</td>
                                    @foreach($genres as $genre)
                                    <td>{{ $genre->name }}/td>
                                    @endforeach
                                    <td>{{ $movie->overview }}</td>
                                    <td>{{ $movie->release_date }}</td>
                                    <td>{{ $movie->runtime }}</td>
                                    @foreach($countries as $country)
                                    <td>{{ $country->name }}</td>
                                    @endforeach
                                    <td><a href="{{ $movie->homepage }}">{{ $movie->homepage }}</a></td>
                                    
                                    <td>
                                        {{--
                                        <div>
                                            <a href="{{ action('Admin\MovieController@edit', ['id' => $movie->id]) }}">編集</a>
                                        </div>
                                        --}}
                                        <div>
                                            <a href="{{ action('Admin\MovieController@delete', ['id' => $movie->id]) }}">削除</a>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div style="float: right;">{{ $posts->links() }}</div>
            
        </div>
    </div>
    

@endsection