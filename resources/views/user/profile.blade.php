@extends('layouts.main')


@section('content')
    <div class="container text-muted">
        <div class="row mb-4">
            <div>
                
                <img src="{{asset('storage/'. $content->profile_photo_path ? : $content->profile_photo_url)}}" 
                                     class="rounded-full mx-auto border " 
                                     width="150" 
                                     alt="{{$content->name}}">
                <h2 class="text-center mt-1">{{$content->name}}</h2>
                
            </div>
        </div>
        <div class="row p-3">
            <ul class="nav nav-tabs mb-3">
                @php
                    $user_id = $content->id;
                    $comments = Route::current()->getName() == 'Comments';
                @endphp
                <li class="nav-item" style="list-style: none">
                    <a href="{{route('profile' , $user_id)}}" class="nav-link {{$comments ? '' : 'active'}}">منشوراتي</a>
                </li>
                <li class="nav-item" style="list-style: none">
                    <a href="{{route('Comments' , $user_id)}}" class="nav-link {{$comments ? 'active' : ''}}">تعليقاتي</a>
                </li>

            </ul>
            @if ($comments)
                @include('user.comment_section' , ['contents' => $content])
            @else
            
            @include('user.post_section' , ['contents' => $content])
            @endif
        </div>
    </div>
@endsection