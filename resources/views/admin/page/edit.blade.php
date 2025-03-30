@extends('admin.theme.default')
@section('title')
    تعديل صفحة جديدة
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-tablet"></i>
            </div>
            <div class="card-body">
                <form action="{{route('page.update' , $page->slug)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="col-lg-5 form-group">
                        <label for="title">الاسم اللطيف للصفحة </label>
                        <input type="text" class="form-control" value="{{$page->slug}}" placeholder="لماذا-يعيش-السمك" name="slug">
                    </div>
                    <div class="col-lg-5 form-group">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" value="{{$page->title}}" placeholder=" لماذا يعيش السمك بالماء" name="title" >
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="body">المحتوى</label>
                        <textarea name="content" id="editor" class="form-control">{{$page->content}}</textarea>
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" class="form-control btn btn-dark mt-3">تعديل</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
@section('script')

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        language: {ui:"ar",
            content:'ar',

        } ,
        toolbar: {
            items: [
                'heading',
                'undo', 'redo', '|', 'bold', '|', 'codeBlock', 'italic' , '|',
                'bulletedList','numberedList',"|"
            ]
        }
    } )
    .then( /* ... */ )
    .catch( /* ... */ );
</script>
@endsection