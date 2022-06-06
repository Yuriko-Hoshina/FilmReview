@extends('layouts.user.user')

@section('title', 'HOME')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{--
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    HOME画面表示
                    
                </div>
            </div>
            --}}
            
            
            <div {{--class="col-md-10"--}}>
                <table class="table table-striped table-dark mt-5">
                    <tr>
                        <th width=20%>タイトル</th>
                        <th width=20%>公開予定日</th>
                        <th width=30%>ジャンル</th>
                        <th width=30%>ポスター</th>
                    </tr>
                    @foreach($posts['results'] as $tmdb)
                    <tr>
                        <td>{{ $tmdb['title'] }}</td>
                        <td>{{ $tmdb['release_date'] }}</td>
                        <td>
                        @foreach($tmdb['genre_ids'] as $genre)
                            {{ App\Genre::getName($genre) }}
                        @endforeach
                        </td>
                        <td><img src="{{ 'https://image.tmdb.org/t/p/w185' . $tmdb['poster_path'] }}"></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            
            
        </div>
    </div>
</div>
@endsection

