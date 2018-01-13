<header id="header" class="header header-floating header-floating-text-dark">
    <div class="header-nav navbar-sticky navbar-sticky-animated">
        <div class="header-nav-wrapper">
            <div class="container">
                <nav id="menuzord-right" class="menuzord blue no-bg">
                    <a class="menuzord-brand switchable-logo pull-left flip mb-15" href="/">
                        <img class="logo-default" src="{{URL::to('images/logo-wide-white.png')}}" alt="">
                        <img class="logo-scrolled-to-fixed" src="{{URL::to('images/logo-wide.png')}}" alt="">
                    </a>
                    <ul class="menuzord-menu onepage-nav">
                        <li class="active"><a href="/">Нүүр хуудас</a></li>
                        <li><a href="#about">Бидний тухай</a></li>
                        <li><a href="#courses">Сургалтууд</a></li>
                        <li><a href="#team">Багш нар</a></li>
                        
                        <li><a href="login">Хэрэглэгч
                            <ul class="dropdown">
                                @guest
                                    <li><a href="{{ route('login') }}">Нэвтрэх</a></li>
                                    <li><a href="{{ route('register') }}">Бүртгүүлэх</a></li>
                                @else
                                <li><a href="/changepassword">Нууц үгээ солих</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Гарах
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                </ul>
                        </a></li>
                        @endguest

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>