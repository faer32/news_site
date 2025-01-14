<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/my_css.css', 'resources/css/app.css','resources/css/my_footer_css.css', 'resources/css/bootstrap.min.css','resources/css/app.css', 
            'resources/css/dashboard.css', 'resources/js/app.js'])
    <title>@yield('title-block')</title>
</head>
<body>
    @if(!Request::is('admin*'))
        <header >
            @include('inc.head_inc')
        </header>   
    @endif   
    
    <!-- Контент -->
    <section>
        @if(Request::is('home*'))
            <header class=" margin-right-small">
                @include('inc.category_inc')
            </header> 
        @endif
        @yield('content') 
    </section>  
    {{-- <footer class="bg-dark">
        @include('inc.footer_inc')
    </footer> --}}
</body>

</html>