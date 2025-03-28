@extends('admin.theme.default')

@section('title')
المنشورات    
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="bi bi-table"></i> المنشورات
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive" id="dataTable" width='100%' collapse="0">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>العنوان</th>
                                <th>الاسم الطيف</th>
                                <th>المحتوى</th>
                                <th>الكاتب</th>
                                <th>التاريخ</th>
                                <th>نشر</th>
                                <th>التصنيف</th>
                                <th>تعديل </th>
                                <th>الحذف</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($posts as $post )
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>
                                        <a href="{{route('post.show' , $post->slug)}}">{{$post->title}}</a></td>
                                    <td>{{$post->slug}}</td>
                                    <td style="height: 88.6px;" class="">{!!Str::limit($post->body , 50 , 'للمزيد لاتضغط')!!}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td><input type="checkbox" value="{{$post->approved}}" {{$post->approved ? 'checked' : ''}} name="approved" id=""></td>
                                    <td>{{$post->category->title}}</td>
                                    <td>
                                        <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="float-left" style="background-color: white;border: none;"><i class="bi bi-pencil-square text-success fa-lg"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المنشور هذا؟')">
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
        </div>
    </div>
@endsection