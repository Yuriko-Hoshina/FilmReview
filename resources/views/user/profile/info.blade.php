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
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    @php $profile = Auth::user()->profile; @endphp
                    <table class="table table-light">
                        <thead class="table table-light">
                            <tr>
                                <th width="10%">ユーザーネーム</th>
                                <th width="10%">性別</th>
                                <th width="10%">年代</th>
                                <th width="15%">好きなジャンル</th>
                                <th width="15%">マイベストムービー</th>
                                <th width="10%">自己紹介</th>
                                {{-- <th width="15%">操作</th> --}}
                            </tr>
                        </thead>
                        <tbody class="table table-secondary">
                            
                            <tr>
                                <td>{{ \Str::limit($profile->name??'', 100) }}</td>
                                <td>{{ \Str::limit($profile->gender->name??'', 100) }}</td>
                                <td>{{ \Str::limit($profile->age->name??'', 100) }}</td>
                                <td>{{ \Str::limit($profile->genre->name??'', 100) }}</td>
                                <td>{{ \Str::limit($profile->best_movie??'', 100) }}</td>
                                <td>{{ \Str::limit($profile->introduction??'', 100) }}</td>
                                {{--<td>
                                        <div>
                                            <a href="{{ action('User\ProfileController@edit', ['id' => $profile->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('User\ProfileController@delete', ['id' => $profile->id]) }}">削除</a>
                                        </div>
                                    </td>--}}
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection