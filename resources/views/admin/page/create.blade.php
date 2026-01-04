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
                        <label for="slug">الاسم اللطيف للصفحة </label>
                        <input type="text" class="form-control @error('slug')is-invalid @enderror" placeholder="لماذا-يعيش-السمك" name="slug">
                        @error('slug')
                            <span role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-5 form-group">
                        <label for="title">العنوان</label>
                        <input type="text" class="form-control @error('title')is-invalid @enderror" placeholder=" لماذا يعيش السمك بالماء" name="title" >
                        @error('title')
                            <span role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="body">المحتوى</label>
                        <textarea name="content" id="editor" class="form-control @error('content')is-invalid @enderror"></textarea>
                        @error('content')
                            <span role="alert">{{$message}}</span>
                        @enderror
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