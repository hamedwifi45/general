@extends('layouts.main')
@section('content')
<div class="col-md-12">
    <p class='h4 my-4'>
        {{$title}}
    </p>
</div>
<div class="col-md-8">
    @foreach ($posts as $post )
    <div class="card mb-3 animated-card">
        <div class="card-body position-relative">
            <div class="user-profile">
                <img src="{{asset('storage/' . $post->user->profile_photo_path ? : $post->user->profile_photo_url)}}" 
                     alt="{{$post->user->name}}" 
                     class="profile-img">
                <div class="profile-info">
                    <p class="username">{{$post->user->name}}</p>
                    <span class="post-time">{{$post->created_at->diffForHumans()}}</span>
                </div>
            </div>
    
            <div class="post-content">
                <h3 class="post-title">
                    <a href="{{route('post.show' , $post->slug)}}" class="title-link text-xl">{{$post->title}}</a>
                </h3>
                <div class="excerpt">
                    {!! Str::limit($post->body, 200, '...') !!}
                </div>
            </div>
    
            <div class="post-footer">
                <div class="meta-item">
                    <i class="bi bi-table category-icon"></i>
                    <span class="category-name">{{$post->category->title}}</span>
                </div>
                <div class="meta-item comments-count">
                    <i class="bi bi-chat comment-icon"></i>
          </div>
                           <span>{{$post->comments->count()}}</span>
           </div>
    
            <div class="card-overlay"></div>
        </div>
    </div>
    @endforeach

    {{-- pagenate --}}
        
            <ul
                class="pagination  justify-content-center  "
            >
            {{$posts->links()}}
            </ul>
        
        
</div>

@include('partiaks.sidebar')

@endsection