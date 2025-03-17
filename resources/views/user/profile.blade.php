@extends('layouts.main')


@section('content')
    <div class="container text-muted">
        <div class="row mb-4">
            <div>
                <img src="{{ $content->profile_photo_path ?: $content->profile_photo_url}}" 
                                     class="rounded-full mx-auto border " 
                                     width="150" 
                                     alt="{{$content->name}}">
                <h2 class="text-center mt-1">{{$content->name}}</h2>
            </div>
        </div>
        <div class="row p-3">
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item" style="list-style: none">
                    <a href="#" class="nav-link">منشوراتي</a>
                </li>
                <li class="nav-item" style="list-style: none">
                    <a href="#" class="nav-link">تعليقاتي</a>
                </li>

            </ul>
            @include('user.post-section',['contents' => $content])
        </div>
    </div>
@endsection