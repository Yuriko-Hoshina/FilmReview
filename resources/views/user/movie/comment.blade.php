@extends('layouts.user.user')

@section('title', 'コメントした映画一覧')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-3">
                    <h2>{{ Auth:user()->name }}さんのコメントした映画</h2>
                </div>
                
                <div class="col-md-10 mt-4">
                    各個人がコメントした映画を取得
                </div>
            </div>
        </div>
    </div>
@endsection