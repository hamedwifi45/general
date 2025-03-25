@extends('admin.theme.default')

@section('title')
التصنيفات
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-table" ></i>اضافة التصنيفات
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    
                    <div class="row">
                        <div class="col">
                            <input type="text"  class="form-control @error('title') is-invalid @enderror" placeholder='اكتب العنوان' name="title">
                            @error('title')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-dark">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100" collapse='0'> 
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم اللطيف</th>
                                <th>التصنيف</th>
                                <th>تاريخ الانشاء</th>
                                <th>الحذف</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->created_at}}</td>
                                    <td>
                                        <form action="{{route('category.destroy' , $category->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                            <button type="submit" class="btn btn-link bg-white p-0 m-0"><i class="bi bi-trash3-fill text-danger p-1 fa-lg"  ></i></button>
                                        </form>
                                    </td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
