@extends('layouts.admin.admin')

@section('title', '作品情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>映画作品情報編集</h2>
                <form action="{{ action('Admin\MovieController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">映画タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">製作国</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="country_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('country_id', $movie->country_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if(old('country_id', $movie->country_id) == $country->id) selected="selected" @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">映画ジャンル</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="genre_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('genre_id', $movie->genre_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" @if(old('genre_id', $movie->genre_id) == $genre->id) selected="selected" @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">公開日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="release" value="{{ $movie->release }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">上映時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="movietime" value="{{ $movie->movietime }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">監督</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="director" value="{{ $movie->director }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">公式HP</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="HP" value="{{ $movie->HP }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $movie->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                        <div class="col-ml-md-5">
                            {{ csrf_field() }}
                            <a href={{ url('/admin/movie') }}>一覧へ戻る</a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection