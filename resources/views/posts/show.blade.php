@extends('layouts.main')
@section('content')
<p class="h4 my-4">{{$post->title}}</p>
<input id="postId" value="{{$post->id}}" type="hidden">
<div class="col-md-8">
    <div class="bg-white p-5">
        <div class="user-profile">
            <img src="{{$post->user->profile_photo_path ? : $post->user->profile_photo_url}}" 
                 alt="{{$post->user->name}}" 
                 class="profile-img">
            <div class="profile-info">
                <p class="username">{{$post->user->name}}</p>
                <span class="post-time">{{$post->created_at->diffForHumans()}}</span>
            </div>
        </div>

        <div class="post-content">
            <h3 class="post-title">
                <a href="{{route('post.show' , $post->id)}}" class="title-link text-xl">{{$post->title}}</a>
            </h3>
            <div class="excerpt ">
                @if (file_exists(public_path('storage/images/'.$post->image_path)))
                    <img class='mb-4 mx-auto post-img' src="{{ asset('storage/images/' . $post->image_path)}}" alt="">
                @endif
                <p class="h6">{!!$post->body !!}</p>
            </div>
        </div>

        <div class="post-footer">
            <div class="meta-item">
                <i class="bi bi-table category-icon"></i>
                <span class="category-name">{{$post->category->title}}</span>
            </div>
            <div class="meta-item comments-count">
                <i class="bi bi-chat comment-icon"></i>
                <span>{{$post->comments->count()}}</span>
            </div>
        </div>
    </div>
</div>



@include('partiaks.sidebar')
@endsection

@section('style')
<style>
    .post-img{
        text-align: justify;
        max-width: 600px;
        max-height: 600px ;
    }
</style>
@endsection