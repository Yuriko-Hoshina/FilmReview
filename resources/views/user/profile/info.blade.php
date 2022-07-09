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
            
            <div class="card-header"><h4>{{ $profile->name??'' }}さん</h4></div>
            
            <div class="card-body">
                <table class="table table-light mt-4">
                    
                    <tr><img src="{{ asset('storage/image/' . optional($profile)->image_path) }}" width="200" height="200"></tr>
                    
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
                    <table class="table table-light mt-4">
                        
                        <tr>
                            
                            <th>タイトル</th>
                            
                            @foreach($comments as $comment)
                                <td>{{ $comment['title'] }}</td><br>
                            @endforeach
                            
                        </tr>    
                        <tr>
                            <th>点数</th>
                            {{--
                            @foreach($comments as $comment)
                                <td>{{ $comment['score_id'] . "点" }}</td>
                            @endforeach
                            --}}
                        </tr>
                        
                    </table>
                </div>
            </div>
            
            
            <div class="card">
                <div class="card-header"><h4>オススメ！した映画</h4></div>
                <div class="card-body">
                    <table class="table table-light mt-4">
                        
                        <tr>
                            
                            <th>タイトル</th>
                            
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
                    
    </div>
@endsection