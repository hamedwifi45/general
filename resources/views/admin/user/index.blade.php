@extends('admin.theme.default')
@section('title')
    اضافة مستخدم جديد
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="name">ادخل اسم المستخدم</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span> <strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email">ادخل البريد الكتروني</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span> <strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password">ادخل كلمة القرش</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span> <strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="role_id">اختر الدور</label>
                            <select name="role_id" class="form-select">
                                @include('lists.roles')
                            </select>
                            
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-danger">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <td>الرقم</td>
                            <td>الأسم</td>
                            <td>البريد الكتروني</td>
                            <td>تاريخ التفعيل</td>
                            <td>الدور</td>
                            <td>تاريخ الانشاء</td>
                            <td>تعديل</td>
                            <td>حذف</td>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>{{$user->role->role}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <form method="GET" action="{{ route('user.edit', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="float-left" style="background-color: white;border: none;"><i class="bi bi-pencil-square text-success fa-lg"></i></button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف المنشور هذا؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="float-left" style="background-color: white;border: none;"><i class="bi bi-trash3-fill p-1  text-danger fa-lg"></i></button>
                            </form>
                          </td>
                    </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
@endsection