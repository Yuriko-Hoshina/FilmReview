@extends('layouts.admin.admin')

@section('title', '全コメント一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>全コメント一覧</h2>
        </div>
        <div class="group row">
            <div class="col-md-12">
                <div class="row">
                    <table class="table table-striped table-light mt-4">
                        <tr>
                            <th width=5%>コメントID</th>
                            <th width=20%>タイトル</th>
                            <th width=30%>コメント内容</th>
                            <th width=10%>コメントしたユーザー</th>
                            <th width=10%>投稿日時</th>
                            <th width=5%>操作</th>
                        </tr>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment['id'] }}</td>
                            <td>{{ $comment['title'] }}</td>
                            <td>{{ $comment['body'] }}</td>
                            <td>{{ $comment->user->profile->name }}</td>
                            <td>{{ $comment['updated_at'] }}</td>
                            <td>
                            <div>
                                <a href="{{ action('Admin\HomeController@commentDelete', ['id' => $comment->id]) }}">削除</a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div style="float: right;">{{ $comments->links() }}</div>
            </div>
        </div>
    </div>
    
@endsection