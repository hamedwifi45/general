@extends('admin.theme.default')
@section('title')
    الصفحات
@endsection

@section('content')
    <div class="card">
        <div class="card-header mb-3 ">
            <div class="row text-center"><p><a href="{{route('page.create')}}" class="btn btn-dark ">انشاء صفحة جديدة</a></p></div>
        </div>
        <div class="card-body">
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>عنوان الصغحة</td>
                        <td>موضوع الصفحة</td>
                        <td>تعديل</td>
                        <td>حذف</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page )
                        <tr>
                            <td>{{$page->title}}</td>
                            <td><a href="{{route('page.show' , $page->slug)}}">{{$page->slug}}</a></td>
                            <td>
                                <form method="GET" action="{{ route('page.edit', $page->slug) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="float-left" style="background-color: white;border: none;"><i class="bi bi-pencil-square text-success fa-lg"></i></button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('page.destroy', $page->slug) }}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المنشور هذا؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="float-left" style="background-color: white;border: none;"><i class="bi bi-trash3-fill p-1  text-danger fa-lg"></i></button>
                                </form>
                              </td>
    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
    </div>
@endsection