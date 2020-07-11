@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Text</th>
            <th>UserID</th>
            <th>Likes</th>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post['id']}}</td>
                    <td>{{$post['text']}}</td>
                    <td>{{$post['user_id']}}</td>
                    <td>
                        <span id="likes_count_{{$post['id']}}">{{$post['likes']}}</span> <img id="ico_{{$post['id']}}" width="20" src="@if($post['liked_by_me'])hr.png @else hw.png @endif" style="cursor:pointer;" onclick="setLike({{$post['id']}})">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    <script>
        function setLike(postId) {
            let src = $("#ico_" + postId).attr('src').trim();
            let likesCount = parseInt($("#likes_count_" + postId).text());
            if (src === "hr.png") {
                //disliked
                $("#ico_" + postId).attr('src', 'hw.png');
                likesCount--;
            } else {
                //liked
                $("#ico_" + postId).attr('src', 'hr.png');
                likesCount++;
            }
            $("#likes_count_" + postId).text(likesCount);
            $.post("/posts/" + postId + '/like', function (res) {
                console.log(res);
            })
        }
    </script>
@endsection
