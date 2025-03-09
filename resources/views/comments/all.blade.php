<div class="CommentBody">
    @foreach ($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <img src="{{ $comment->user->profile_photo_path ? : $comment->user->profile_photo_url }}" alt="" class="rounded-full " height="50px" width="50px" style="float:right">
                <p class="mt-2 me-3" style="display: inline-block"><strong>{{ $comment->user->name }}</strong></p>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <i class="bi bi-clock"></i> <span
                                class="comment_date text-secondary">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="col-4">
                            <span class="cursor-pointer reply-button">
                                <i class="bi bi-reply"></i><span class="comment_date text-secondary">اضافة رد</span>
                            </span>
                        </div>
                    </div>
                    <p class="mt-3">{{ $comment->body }}</p>
                    @auth
                        <form action="{{ route('replay.add') }}" class="replay" id="replay" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment_body" rows="5" placeholder="اضف ردا"
                                    class="form-control  @error('comment_body') is-invalid @enderror"></textarea>
                                @error('comment_body')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-dark my-2" value="تعليق">
                            </div>


                        </form>
                    @else
                        <div class="alert alert-info replay" role="alert">
                            الرجاء تسجيل الدخول
                        </div>
                    @endauth
                    {{-- الردود على التعليقات --}}
                    @include('comments.all', ['comments' => $comment->replies])


                </div>
            </div>
        </div>
    @endforeach
</div>

@section('script')
    <script>
        $(document).ready(function(){
            $(".replay").hide();
            $(".reply-button").click(function(event){
                ele = $(this).parents("div.row").nextAll().slice(1,2).slideToggle('slow');
            });
        });
    </script>
@endsection