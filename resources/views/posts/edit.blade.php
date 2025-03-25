@extends('layouts.main')
@section('content')
<div class="col-md-12">
    <h2 class="h4 my-4">
        تعديل موضوعا 
    </h2>
</div>
<div class="col-md-8 bg-white py-3">
<form action="{{route('post.update' , $post->id)}}" enctype="multipart/form-data" method="post">
    @method('PATCH')
    @csrf
    <label for="category_id" class="mb-2">تصنيف</label>
    <div class="input-group mb-3">
        <select name="category_id" class="form-select" id="">
            <option value="{{$post->category->id}}">{{$post->category->title}}</option>
            @include('lists.categories')
        </select>
    </div>
    <label for="title">عنوان المنشور</label>
    <div class="input-group mb-3">
        <input type="text" name="title" id="title" placeholder="حدد عنوان الموضوع" value="{{$post->title}}"
        class="input-group mb-3 @error('title')is-invalid @enderror">
        @error('title')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <label for="editor" class="mb-2">محتوى المنشور</label>
    <div class="input-group d-inline">
        <textarea name="body" id='editor'  class="form-control @error('body') is-invalid @enderror" id="">{{$post->body}}</textarea>
        @error('body')
        <span class="invalid-feedback">
            <strong>{{$message}}</strong>
        </span>
        @enderror
    </div>
    <div class="input-group my-3 file-area">
        <label for="image" class="mb-2">صورة الغلاف</label>
        <input type="file" name="image"  onchange="readCoverImage(this);" accept="image/*" id="image">
        <div class="input-title">اسحب الصورة او ضعها هنا</div>
    </div>
    <div class="row">
        <img id="cover-image-thumb" src="{{asset('storage/images/'.$post->image_path)}}" class="col-2" width="100" height="100"> 
        <span class="input-name col-6"></span>
    </div>
    <button class="btn btn-outline-dark my-3" type="submit">انشر</button>
    </form>
    
</div>
@include('partiaks.sidebar')

@endsection
@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#cover-image-thumb').setAttribute('src', e.target.result);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        language: {ui:"ar",
            content:'ar',

        } ,
        toolbar: {
            items: [
                'heading',
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'bulletedList','numberedList',"|"
            ]
        }
    } )
    .then( /* ... */ )
    .catch( /* ... */ );
</script>
@endsection