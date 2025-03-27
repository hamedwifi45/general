@extends('admin.theme.default')
@section('title')
    الأدوار
@endsection
@section('content')
    <div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="bi bi-tablet-fill"></i>  الأدوار
            <form action="{{route('roles.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder='اسم الدور'>
                        @error('name')
                            <span class="invalid-feedback" >
                                <strong>
                                    {{$message}}
                                </strong>
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
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>الدور</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($roles as $role)
                      <tr>
                          <td>{{$role->role}}</td>
                          <td>
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف الدور هذا؟')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" style="background-color: white;border: none;"><i class="far fa-trash-alt text-danger fa-lg"></i></button>
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