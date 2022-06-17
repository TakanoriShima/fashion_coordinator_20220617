@extends('layouts.app')
@section('title', 'famatching')
@section('content')
    <div class="text-center">
        <h1>質問一覧</h1>
        <div class="row mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>質問者</th>
                    <th>タイトル</th>
                    <th>相談したいこと</th>
                    <th>希望のスタイル</th>
                    <th>投稿日時</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{!! link_to_route('posts.show', $post->id , ['id' => $post->id ],[]) !!}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->style }}</td>
                    <td>{{ $post->created_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection