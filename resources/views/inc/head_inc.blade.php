@section('head')
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">Новости</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    {{-- <a class="nav-link  text-white" href="{{ route('cart') }}">Корзина</a> --}}
                </li>
                @auth("web")
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{ route('logout') }}">Выйти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('profile.index')}}" aria-expanded="false">
                            Мой профиль
                        </a>
                    </li>
                @endauth
                @guest("web")
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="{{route('registration')}}" aria-expanded="false">
                            Регистрация
                        </a>
                    </li>
                @endguest
            </ul>                  
        </div>
    </div>
</nav>