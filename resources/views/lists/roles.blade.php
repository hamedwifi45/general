@foreach ($roles as $cate) 
<option value="{{$cate->id}}">{{$cate->role}}</option>
@endforeach