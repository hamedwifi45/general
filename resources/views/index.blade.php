@extends('layouts.main')
@section('content')
<div class="col-md-12">
    <p class='h4 my-4'>
        {{$title}}
    </p>
</div>
<div class="col-md-8">
    @foreach ($posts as $post )
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img src="{{$post->user->profile_photo_path}}" alt="{{$post->user->name}}" width="50px" class="rounded-full" style="float: right" alt="">
                        <p class="mt-2 me-3" style="display: inline-block"><strong>{{$post->user->name}}</strong></p>
                        <div class="row mt-2">
                            <div class="col-3">
                                <i class="bi bi-clock""></i> <span class="text-secondary">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <div class="col-3">
                                <span class="text-secondary">{{$post->category->title}}</span>
                            </div>
                            <div class="col-3">
                                <i class="bi bi-command"></i> <span class="text-secondary">{{$post->comments->count() }} تعليقات</span>
                            </div>
                        </div>
                        <h4 class="my-2 h4"><a href="#">{{$post->title}}</a></h4>
                        <p class="card-text mb-2">{!! Str::limit($post->body, 200, '...') !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('partiaks.sidebar')

@endsection