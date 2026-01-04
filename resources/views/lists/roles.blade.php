@foreach ($roles as $cate) 
    <option class="text-center" value="{{$cate->id}}">{{$cate->role}}</option>
@endforeach