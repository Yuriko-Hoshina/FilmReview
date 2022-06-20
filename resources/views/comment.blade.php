@extends('layouts.user.user')

@section('title', 'コメント評価')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="group row col-md-12 row-inline">
            <div class="col-md-3">
                <h2>コメント評価</h2>
                    {{--<form action="{{ action('User\CommentController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif--}}
                    
                    <div class="form-group row">
                        <label class="col-md-2">映画タイトル</label>
                        <div class="col-md-10">
                            {{--<input type="text" class="form-control" name="title" value="{{ $posts['title'] }}">--}}
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2">10点中何点？</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="score_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('score_id') == " ") selected="selected" @endif>選択してください</option>
                                @foreach($scores as $score)
                                    <option value="{{ $score->id }}" @if(old('score_id') == ($score->id)) selected="selected" @endif>{{ $score->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">どんな気分の時にこの映画を観たい？</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="feeling_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('feeling_id') == " ") selected="selected" @endif>選択してください</option>
                                @foreach($feelings as $feeling)
                                    <option value="{{ $feeling->id }}" @if(old('feeling_id') == ($feeling->id)) selected="selected" @endif>{{ $feeling->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="評価する">
                    </div>
                    
                    <div>Twitterに共有する</div>
                    <div>オススメ！する</div>
                    
            </div>
        </div>
    </div>
</div>
@endsection

