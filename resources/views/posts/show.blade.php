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
        @auth
        <div class="row form-group mt-5">
            <div class="col-lg-12 col-md-6 col-xs-11">
                <form action="{{route('comment.store')}}" method="post" id="comments">
                    @csrf
                    <div class="form-group">
                        <textarea name="body" rows="5" placeholder="اضف تعليقا ..." class="form-control @error('body') is-invalid @enderror" id=""></textarea>
                        @error('body')
                            <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror 
                    </div>
                    <button type="submit" class="btn btn-outline-dark mt-3" >اضف تعليق</button>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                </form>
            </div>
        </div>
            
        @else
        <div class="alert alert-info" role="alert">
            يجب عليك تسجيل الدخول لتتمكن من التعليق
        </div>
        @endauth


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
    <div id="comments" class="p-0 word-break container mt-5">
        <h4 class="mb-5">تعليقات</h4>
        @include('comments.all' , ['comments' => $comments])
    </div>
</div>



@include('partiaks.sidebar')
@endsection

@section('style')
<style>
        
        .reply-button:hover {
            color: #1a73e8 !important;
            text-decoration: underline;
        }
        
        .reply-form {
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        
        .form-control:focus {
            border-color: #3490dc;
            box-shadow: 0 0 0 2px rgba(52, 144, 220, 0.25);
        }
    
    .post-img{
        text-align: justify;
        max-width: 600px;
        max-height: 600px ;
    }
</style>
@endsection

@section('script')
<script>

</script>
@endsection