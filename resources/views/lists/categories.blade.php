@foreach ($categories as $cate) 
<option value="{{$cate->id}}">{{$cate->title}}</option>
@endforeach