@extends('layouts.user.user')

@section('title', 'オススメした映画一覧')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="group row col-md-12 row-inline">
                <div class="col-md-8 mx-auto">
                    <h2>{{ Auth::user()->profile->name }}さんのオススメした映画</h2>
                </div>
                
                <div class="col-md-10 mt-4">
                        各個人がオススメした映画を取得
                </div>
            </div>
        </div>
    </div>
@endsection