@extends('layouts.admin')

@section('title', '映画作品の新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>映画作品新規登録</h1>
                <form action="{{ action('Admin\MovieController@create') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">映画タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">製作国</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="country_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('country_id') == " ") selected="selected" @endif>選択してください</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" @if(old('country_id') == ($country->id)) selected="selected" @endif>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">映画ジャンル</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="genre_id">
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('genre_id') == " ") selected="selected" @endif>選択してください</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" @if(old('genre_id') == ($genre->id)) selected="selected" @endif>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">公開日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="release" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">上映時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="movietime" value="{{ old('movietime') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">監督</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="director" value="{{ old('director') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">公式HP</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="HP">{{ old('HP') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection

