@extends('layouts.main')
@section('style')
<style>
    .hover-shadow {
    transition: box-shadow 0.2s ease;
}
.hover-shadow:hover {
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15)!important;
}
.hover-text-primary:hover {
    color: #0d6efd!important;
}
</style>
@endsection
@section('content')
{{-- Container رئيسي مع padding عمودي --}}
<div class="container py-4">
    {{-- عنوان الصفحة مع margin-bottom ووزن خط غامط ولون رئيسي --}}
    <h4 class="mb-4 fw-bold text-primary">{{$title}}</h4>
    
    {{-- صف لمركزة المحتوى --}}
    <div class="row justify-content-center">
        {{-- عمود بعرض 8/12 على الشاشات الكبيرة --}}
        <div class="col-lg-8">
            @forelse ($nots as $not)
                {{-- بطاقة إشعار مع margin-bottom وظل خفيف --}}
                <div class="card mb-3 shadow-sm hover-shadow">
                    {{-- جسم البطاقة --}}
                    <div class="card-body">
                        {{-- ترتيب العناصر باستخدام Flexbox مع محاذاة للأعلى --}}
                        <div class="d-flex align-items-start">
                            {{-- حاوية الصورة (ثابتة العرض لا تنكمش) --}}
                            <div class="flex-shrink-0 me-3">
                                {{-- صورة مستديرة مع إطار --}}
                                <img src="{{ $not->user->profile_photo_path ?: $not->user->profile_photo_url}}" 
                                     class="rounded-circle border" 
                                     width="60" 
                                     height="60"
                                     alt="{{$not->user->name}}">
                            </div>
                            
                            {{-- محتوى الاشعار (يأخذ المساحة المتبقية) --}}
                            <div class="flex-grow-1">
                                {{-- سطر التاريخ مع ترتيب أفقي --}}
                                <div class="d-flex align-items-center mb-2">
                                    {{-- أيقونة الساعة بلون خافت --}}
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    {{-- نص التاريخ بلون ثانوي --}}
                                    <small class="text-muted">{{$not->created_at->diffForHumans()}}</small>
                                </div>
                                
                                {{-- رابط الإشعار بدون تزيين مع تأثير hover --}}
                                <a href="{{route('post.show' , $not->post->slug)}}#comments" 
                                   class="text-decoration-none text-dark hover-text-primary">
                                    {{-- نص الإشعار مع تنسيقات الخط --}}
                                    <h6 class="mb-0">
                                        {{-- اسم المستخدم بخط شبه غامط --}}
                                        <span class="fw-semibold">{{$not->user->name}}</span>
                                        علّق على المنشور:
                                        {{-- عنوان المنشور باللون الرئيسي --}}
                                        <span class="text-primary">"{{$not->post->title}}"</span>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- رسالة عدم وجود إشعارات --}}
                <div class="alert alert-info text-center py-3">
                    <i class="bi bi-bell-fill me-2"></i>
                    لا توجد إشعارات لعرضها
                </div>
            @endforelse
            
            {{-- ترقيم الصفحات مع margin-top --}}
            <div class="mt-4">
                {{$nots->links()}}
            </div>
        </div>
    </div>
</div>
@endsection