<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('style')
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{!! asset('theme/css/sb-admin-2.min.css') !!}">
    <style>
         body {
                font-family: 'Cairo', sans-serif;
                background-color: #f0f0f0;
            }

            a { 
                text-decoration: none !important; 
                color: black;
            }
         ol, ul, menu {
                list-style: decimal !important;
                padding-right: 2rem !important;
            }

            ul, menu {
                list-style: inside !important;
                padding-right: 2rem !important;
            }

            input[type=file] {
                position: absolute !important;
                width: 100% !important;
                height: 100% !important;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                opacity: 0;
                cursor: pointer;
            }

            .input-title {
                width: 100%;
                padding: 30px;
                background: rgba(255,255,255,0.2);
                border: 2px dashed rgba(255,255,255,0.2);
                text-align: center;
                transition: background 0.3s ease-in-out;
            }

            .file-area:hover .input-title {
                background: rgba(255,255,255,0.1);
            }

            input[type=file] + .input-title {
                border-color: #f0f0f0;
                background-color: #f0f0f0;
            }
        .animated-card {
            border: none;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    overflow: hidden;
    position: relative;
}

.animated-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
}

.profile-img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.profile-img:hover {
    transform: rotate(15deg) scale(1.1);
}

.user-profile {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}

.username {
    font-weight: 700;
    margin: 0;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.post-time {
    font-size: 0.9rem;
    color: #6c757d;
}

.post-title {
    position: relative;
    margin-bottom: 20px;
}

.title-link {
    color: #2d3748;
    text-decoration: none;
    font-weight: 800;
    position: relative;
}

.title-link::before {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 3px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    transition: width 0.4s ease;
}

.title-link:hover::before {
    width: 100%;
}

.excerpt {
    color: #4a5568;
    line-height: 1.7;
    position: relative;
    padding-left: 20px;
}

.excerpt::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: linear-gradient(180deg, #667eea, #764ba2);
}

.post-footer {
    display: flex;
    gap: 25px;
    margin-top: 25px;
    padding-top: 15px;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 15px;
    border-radius: 10px;
    background: rgba(118, 75, 162, 0.05);
    transition: all 0.3s ease;
}

.meta-item:hover {
    background: rgba(118, 75, 162, 0.15);
    transform: translateX(5px);
}

.category-icon {
    color: #667eea;
    font-size: 1.2rem;
}

.comment-icon {
    color: #764ba2;
    font-size: 1.2rem;
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, 
        rgba(102, 126, 234, 0.05) 0%,
        rgba(118, 75, 162, 0.05) 100%);
    pointer-events: none;
    z-index: 0;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}
</style>
</head>
<body dir="rtl" style="text-align: right">
    
    <div>
        @include('partiaks.navbar')
        <main class="py-4 mb-5">
            <div class="container">
                <div class="row">
                    @include('alerts.success')

                    @yield('content')

                </div>
            </div>
        </main>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- pusher --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('6990f7332b32e2674464', {
          cluster: 'mt1'
        });
    
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
          alert(JSON.stringify(data));
        });
      </script>
      <script src="{!! asset('theme/js/sb-admin-2.min.js') !!}"></script>

    @yield('script')
</body>
</html>