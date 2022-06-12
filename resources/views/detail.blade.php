@extends('layouts.user.user')

@section('title', '映画詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                <h2>映画詳細</h2>
            </div>
            
            <div class="col-md-10">
                <table class="table table-striped table-light">
                    <thead class="table table-light">
                        <tr>
                            <th width=15%>タイトル</th>
                            <th width=15%>公開日</th>
                            <th width=20%>ジャンル</th>
                            <th width=10%>上映時間</th>
                            <th width=40%>あらすじ</th>
                            <th width=10%>公式HP</th>
                        </tr>
                    </thead>
                    <tbody class="table table-secondary table-light">
                        <tr>
                            <td>{{ $posts['title'] }}<img src="{{ 'https://image.tmdb.org/t/p/w185' . $posts['poster_path'] }}"></td>
                            <td>{{ $posts['release_date'] }}</td>
                            <td>
                            @foreach($posts['genres'] as $genre)
                                {{ App\Genre::getName($genre) }}
                            @endforeach
                            </td>
                            <td>{{ $posts['runtime']??'' }}</td>
                            {{--<td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $posts['poster_path'] }}"></td>--}}
                            <td>{{ $posts['overview'] }}</td>
                            <td><a href="{{ $posts['homepage'] }}">{{ $posts['homepage'] }}</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                <a href="{{ url('movie/search') }}">一覧へ戻る</a>
            </div>
            <div>
                <a href="#">コメントする</a>
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

