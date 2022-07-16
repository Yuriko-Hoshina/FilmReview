@extends('layouts.user.user')

@section('title', 'マイプロフィール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイプロフィール編集</h2>
                <form action="{{ action('User\ProfileController@edit') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="image">アイコン</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: <img src="{{ asset('storage/image/' . $profile->image_path) }}" width="100px">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    {{--    
                    @if(Auth::user()->profile->image_path = null)
                        <div class="form-group row">
                            <label class="col-md-2" for="image">アイコン</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="image">
                                <div class="form-text text-info">
                                    設定中: <img src="{{ asset('storage/image/' . $profile->image_path) }}" width="100px">
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                    </label>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="form-group row">
                        <label class="col-md-2" for="image">アイコン</label>
                        <div class="col-md-10">
                        <img src="{{ Auth::user()->getAvatar() }}" width="100px">
                        </div>
                    </div>
                    @endif
                    --}}
                    
                    <div class="form-group row">
                        <label class="col-md-2">ユーザーネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="gender_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('gender_id', $profile->gender_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}" @if(old('gender_id', $profile->gender_id) == $gender->id) selected="selected" @endif>{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">年代</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="age_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('age_id', $profile->age_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($ages as $age)
                                    <option value="{{ $age->id }}" @if(old('age_id', $profile->age_id) == $age->id) selected="selected" @endif>{{ $age->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">好きなジャンル</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="genre_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('genre_id', $profile->genre_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" @if(old('genre_id', $profile->genre_id) == $genre->id) selected="selected" @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">マイベストムービー</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="best_movie" value="{{ $profile->best_movie }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                    
                </form>
                
                <div class="row mt-5">
                    <div class="col-md-8 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile->profile_histories != NULL)
                                @foreach ($profile->profile_histories as $profile_history)
                                    <li class="list-group-item">{{ $profile_history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection