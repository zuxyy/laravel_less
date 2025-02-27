<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css">
    <!-- CSS va JSni Vite orqali yuklash -->
    @vite(['resources/sass/app.scss','resources/css/custom.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('main.index') }}" class="nav-link">Main</a></li>
                    <li class="nav-item"><a href="{{ route('post.index') }}" class="nav-link">Post</a></li>
                    <li class="nav-item"><a href="{{ route('contact.index') }}" class="nav-link">Contacts</a></li>
                    <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">About</a></li>\
                    @can('view', auth()->user())
                    <li class="nav-item"><a href="{{ route('about.index') }}" class="nav-link">Admin</a></li>
                    @endcan
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.custom_selects').niceSelect();
    });
</script>
</body>
</html>
