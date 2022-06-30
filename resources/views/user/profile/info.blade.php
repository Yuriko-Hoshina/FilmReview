@extends('layouts.user.user')

@section('title', 'マイプロフィール')

@section('content')
    <div class="container">
        <div class="group row inline">
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
                {{--<div class="row">--}}
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
                                <th width="15%">マイベストムービー</th>
                                <td>{{ \Str::limit($profile->best_movie??'', 100) }}</td>
                            </tr>    
                            <tr>        
                                <th width="10%">自己紹介</th>
                                <td>{{ \Str::limit($profile->introduction??'', 100) }}</td>
                                {{-- <th width="15%">操作</th>
                                <td>
                                    <div>
                                        <a href="{{ action('User\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('User\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                    </div>
                                </td> --}}
                            </tr>
                            
                        </table>
                    </div>
                {{--</div>--}}
        </div>
        
        <div class="group row inline m-4">
            <div class="card mr-4">
                <div class="card-header">コメントした映画</div>
                <div class="card-body">
                    
                </div>
            </div>
            
            
            <div class="card">
                <div class="card-header">オススメ！した映画</div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
                    
    </div>
@endsection