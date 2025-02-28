<div class="col-md-4">
    <div class="card">
        <h5 class="card-header">
            التصنيفات
        </h5>
        <div class="card-body">
            <ul class="nav flex-column p-0">
                <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link text-dark">
                    جميع التصنيفات ({{$post_number}})
                    </a>
                </li>
                @foreach ($categories as $cat)
                <li class="nav-item">
                    <a href="{{--  --}}" class=" text-dark nav-link">
                        {{$cat->title}} ({{$cat->posts()->count()}})
                    </a>
                </li>
                    
                @endforeach
            </ul>
        </div>
    </div>
</div>