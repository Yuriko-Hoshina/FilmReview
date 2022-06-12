@extends('layouts.user.user')

@section('title', 'オススメした映画一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>{{ Auth:user()->name }}さんのオススメ！した映画</h2>
            </div>
        </div>
    </div>
@endsection