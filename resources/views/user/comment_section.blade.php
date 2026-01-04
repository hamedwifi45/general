@includeWhen(!count($contents->comments),'alerts.empty', ['msg'=> "لاتوجد اي مشاركات بعد"] )
<div class="commentsBody">
    @foreach ($contents->comments as $comment)
        <div class="card mt-5 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <img src="{{asset('storage/'. $comment->user->profile_photo_path ?: $comment->user->profile_photo_url)}}" 
                        class="rounded-full mx-auto border " 
                        width="150" 
                        alt="{{$comment->user->name}}">
                    </div>
                    <div class="col-10">
                        @can('delete-post' , $comment)
                            
                            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف التعليق هذا؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="float-left"><i class="bi bi-trash3-fill text-xl text-danger fa-lg">l</i></button>
                            </form>
                        @endcan
                        <p class="mt-3 mb-2"><strong>{{$comment->user->name}}</strong></p>
                        <i class="bi bi-clock-fill" style=" color: #007bff;"></i><span class="comment_date text-secondary">{{$comment->created_at->diffForHumans()}}</span>
                        <a class="d-block text-bg-secondary" href="{{route('post.show',$comment->post->slug)}}#comments">{!!Str::limit($comment->body,100,'اضغط للمزيد')!!}</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>