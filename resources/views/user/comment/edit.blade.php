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
                        
                        <ul>
                            <li>段落を変えて表示させる場合は行の終わりに「&lt;br&gt;」とつけてください。</li>
                            <li>コメントにはネタバレが含まれる場合があります。ご自身で十分にご注意ください。</li>
                            <li>不適切な内容があった場合、該当コメントは予告なく削除される場合があります。</li>
                            <li>ユーザー間での交流の際は「>>>(ユーザーネーム)さん」を最初につけるようにしてください。</li>
                        </ul>
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">映画タイトル</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" readonly="readonly" value="{{ $comment->title }}">
                            </div>
                        </div>
                        
                        {{--
                        <div class="form-group row mt-4">
                            <label class="col-md-4">10点中何点？</label>
                            <div class="col-md-6">
                                <select type="text" class="form-control" name="score_id"> --}}
                                    {{-- プルダウンメニュー --}}{{--
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
                                <select type="text" class="form-control" name="feeling_id">--}}
                                    {{-- プルダウンメニュー --}}{{--
                                    <option value=" " @if(old('feeling_id', $comment->feeling_id) == " ") selected="selected" @endif>選択してください</option>
                                    @foreach($feelings as $feeling)
                                        <option value="{{ $feeling->id }}" @if(old('feeling_id', $comment->feeling_id) == $feeling->id) selected="selected" @endif>{{ $feeling->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>--}}
                        
                        <div class="form-group row mt-4">
                            <label class="col-md-4">コメント</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="body" rows="20">{{ $comment->body }}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-group m-4" style="float: right;">
                            <div class="col-md-10">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $comment->id }}">
                                
                                <input type="submit" class="btn btn-primary" value="更新">
                            </div>
                        </div>
                    
                        <table class="table table-striped table-light mt-4">
                            <thead class="table table-striped table-light">
                                <tr>
                                    <th width="10%">ユーザーネーム</th>
                                    <th width="70%">コメント</th>
                                    <th width="10%">投稿日時</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->user->profile->name }}</td>
                                        <td>{{ $comment['body'] }}</td>
                                        <td>{{ $comment['updated_at'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                </div>
            </div>
            
        </div>
    </div>
@endsection

