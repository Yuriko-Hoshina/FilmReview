@extends('layouts.user.user')

@section('title', 'コメント編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-12 m-4">
                    <h2>コメント評価編集</h2>
                        <form action="{{ action('User\CommentController@update') }}" method="post" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">映画タイトル</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" readonly="readonly" value="{{ $comment->title }}">
                            </div>
                        </div>
                        
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">10点中何点？</label>
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="score_id">
                                    {{-- プルダウンメニュー --}}
                                    <option value=" " @if(old('score_id', $comment->score_id) == " ") selected="selected" @endif>選択してください</option>
                                    @foreach($scores as $score)
                                        <option value="{{ $score->id }}" @if(old('score_id', $comment->score_id) == $score->id) selected="selected" @endif>{{ $score->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">どんな気分の時にこの映画を観たい？</label>
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="feeling_id">
                                    {{-- プルダウンメニュー --}}
                                    <option value=" " @if(old('feeling_id', $comment->feeling_id) == " ") selected="selected" @endif>選択してください</option>
                                    @foreach($feelings as $feeling)
                                        <option value="{{ $feeling->id }}" @if(old('feeling_id', $comment->feeling_id) == $feeling->id) selected="selected" @endif>{{ $feeling->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">コメント</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="body" rows="20">{{ $comment->body }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary" value="更新">
                            </div>
                        </div>
                        
                        <div class="form-group row">Twitterに共有する</div>
                        
                        <div class="form-group row">
                            <input type="checkbox" name="recommend" value="オススメ">オススメする
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
@endsection

