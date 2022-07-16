@extends('layouts.user.user')

@section('title', 'マイプロフィール')

@section('content')
    <div class="container">
        <div class="group row inline m-4">
            <div class="col-md-5">
                <h2>マイプロフィール</h2>
            </div>
            <div class="col-md-6">
                @if(Auth::user()->profile)
                {{-- <input type="submit" class="btn btn-primary" value="編集" action="{{ action('User\ProfileController@edit') }}"> --}}
                    <button type="submit" class="btn btn-primary">
                    <a href="{{ action('User\ProfileController@edit') }}">編集</a>
                    </button>
                @else
                    {{-- <input type="submit" class="btn btn-primary" value="作成" action="{{ action('User\ProfileController@create') }}"> --}}
                    <button type="submit" class="btn btn-primary">
                    <a href="{{ action('User\ProfileController@create') }}">作成</a>
                    </button>
                @endif
            </div>
        </div>
        
        <div class="card mt-4 list-profile col-md-12 mx-auto">
            @php $profile = Auth::user()->profile; @endphp
            
            <div class="card-header">
                @if(Auth::user()->profile)
                    <h4>{{ $profile->name }}さん</h4>
                @else
                    <h4>ユーザーネーム未設定さん</h4>
                @endif
            </div>
            
            <div class="card-body">
                <table class="table table-light mt-4">
                    <tr>
                        @if(Auth::user()->profile->image_path != null)
                        <img src="{{ asset('storage/image/' . $profile->image_path) }}" width="200" height="200">
                        @else
                        <img src="{{ Auth::user()->getAvatar() }}" width="200" height="200">
                        @endif
                    </tr>
                    
                    <tr>
                        <th width="10%">性別</th>
                        <td>{{ \Str::limit($profile->gender->name??'', 100) }}</td>
                    </tr>    
                    <tr>        
                        <th width="10%">年代</th>
                        <td>{{ \Str::limit($profile->age->name??'', 100) }}</td>
                    </tr>   
                    <tr>
                        <th width="15%">好きなジャンル</th>
                        <td>{{ \Str::limit($profile->genre->name??'', 100) }}</td>
                    </tr>    
                    <tr>        
                        <th width="20%">マイベストムービー</th>
                        <td>{{ \Str::limit($profile->best_movie??'', 100) }}</td>
                    </tr>    
                    <tr>        
                        <th width="10%">自己紹介</th>
                        <td>{{ $profile->introduction??'' }}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
        
        <div class="col-md-12 group row inline mt-4">
            <div class="card mr-4">
                <div class="card-header"><h4>コメントした映画</h4></div>
                <div class="card-body">
                        <ul style="padding-left: 20px;">
                            @foreach($comments as $comment)
                                <li>
                                    <td><a href={{ url('movie/detail?movie_id=' . $comment['movie_id'] . '') }}>{{ $comment['title'] }}</a></td>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ action('User\CommentController@info') }}">もっとみる</a>
                </div>
            </div>
            
            
            <div class="card">
                <div class="card-header"><h4>オススメ！した映画</h4></div>
                <div class="card-body">
                    <table class="table table-light mt-4">
                        
                        <tr>
                            
                            <th>タイトル</th>
                            <a href="#}">もっとみる</a>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
                    
    </div>
@endsection