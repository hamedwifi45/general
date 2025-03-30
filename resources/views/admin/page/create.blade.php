@extends('admin.theme.default')
@section('title')
    انشاء صفحة جديدة
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-tablet"></i>
            </div>
            <div class="card-body">
                <form action="{{route('page.store')}}" method="post">
                    @csrf
                    <div class="col-lg-5 form-group">
                        <label for="title">الاسم اللطيف للصفحة </label>
                        <input type="text" class="form-control" placeholder="لماذا-يعيش-السمك" name="slug">
                    </div>
                    <div class="col-lg-5 form-group">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control" placeholder=" لماذا يعيش السمك بالماء" name="title" >
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="body">المحتوى</label>
                        <textarea name="content" id="editor" class="form-control"></textarea>
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" class="form-control btn btn-dark mt-3">حفظ</button>
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