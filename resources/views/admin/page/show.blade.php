@extends('layouts.main')

@section('content')
    <div class="col-md-8 p-3 bg-white" style="height: fit-content;>">
        <h2 class="my-2"> {{ $page->title }} </h2>

        {!! $page->content !!}

    </div>

    @include('partiaks.sidebar')

@endsection