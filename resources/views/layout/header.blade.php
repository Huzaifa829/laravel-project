



@if(Route::current()->getName() == 'cart.checkoutorder') 
<checkoutheader
 @showstepone="showStepOne()"
 @showsteptwo="showSteptwo()"
 @showstepthree="showStepthree()"
 > 
</checkoutheader>
@else
<header class="site__mobile-header">
    <div class="mobile-header">
        <div class="container">
            <div class="mobile-header__body">
                <button class="mobile-header__menu-button" type="button">
                    <svg width="18px" height="14px">
                        <path d="M-0,8L-0,6L18,6L18,8L-0,8ZM-0,-0L18,-0L18,2L-0,2L-0,-0ZM14,14L-0,14L-0,12L14,12L14,14Z"/>
                    </svg>
                </button>
                <a class="mobile-header__logo" href="/">
                    <img src="{{ URL::asset('assets/logo/FABT-Logo2.png') }}" width="100">
                </a>
                <div class="mobile-header__search mobile-search">
                    {{-- <form action="{{route('search')}}" method="GET" class="mobile-search__body" autocomplete="off">
                        <input type="text" class="mobile-search__input" name="query" id="query" value="{{request()->input('query')}}" placeholder="Enter Product Name or MFR"/>
                        <button type="submit" class="mobile-search__button mobile-search__button--search">
                            <svg width="20" height="20">
                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                            </svg>
                        </button>
                        <button type="button" class="mobile-search__button mobile-search__button--close">
                            <svg width="20" height="20">
                                <path d="M16.7,16.7L16.7,16.7c-0.4,0.4-1,0.4-1.4,0L10,11.4l-5.3,5.3c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L8.6,10L3.3,4.7c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L10,8.6l5.3-5.3c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L11.4,10l5.3,5.3C17.1,15.7,17.1,16.3,16.7,16.7z"/>
                            </svg>
                        </button>
                        <div class="mobile-search__field"></div>
                    </form> --}}
                    <mobilesearch></mobilesearch>
                </div>
                <div class="mobile-header__indicators">
                    <div class="mobile-indicator mobile-indicator--search d-md-none">
                        <button type="button" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon">
                                <svg width="20" height="20">
                                    <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        @guest
                            <a href="{{ route('login') }}" class="mobile-indicator__button">
                                <span class="mobile-indicator__icon">
                                    <svg width="20" height="20">
                                        <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
                                    </svg>
                                </span>
                            </a>
                        @else
                            <a href="" class="mobile-indicator__button">
                                <span class="mobile-indicator__icon">
                                    <svg width="20" height="20">
                                        <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
                                    </svg>
                                </span>
                            </a>
                        @endguest
                    </div>
                    <div class="mobile-indicator d-none d-md-block">
                        <a href="{{ route('wishlist') }}" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon">
                                <svg width="20" height="20">
                                    <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"/>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="mobile-indicator">
                        <a href="{{ route('cart') }}" class="mobile-indicator__button">
                            <span class="mobile-indicator__icon">
                                <svg width="20" height="20">
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="15" cy="17" r="2" />
                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                </svg>
                                @if (Cart::instance('default')->count() > 0)
                                    <span class="mobile-indicator__counter">{{ Cart::instance('default')->count() }}</span>
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="site__header">
    <div class="header">
        <div class="header__megamenu-area megamenu-area"></div>
        <div class="header__topbar-classic-bg"></div>
        <div class="header__topbar-classic">
            <div class="topbar topbar--classic">
                <div class="topbar__item-text">
                    <a class="topbar__link" href="">About Us</a>
                </div>
                <div class="topbar__item-text">
                    <a class="topbar__link" href="{{ route('contact') }}">Contacts</a>
                </div>
                <div class="topbar__item-text">
                    <a class="topbar__link" href="{{route('contact')}}">Store Location</a>
                </div>
                <div class="topbar__item-text">
                    <a class="topbar__link" href="{{route('user.trackorder')}}">Track Order</a>
                </div>
                <div class="topbar__item-spring"></div>
                <div class="topbar__item-button"></div>
            </div>
        </div>
        <div class="header__navbar">
            <div class="header__navbar-menu">
                <div class="main-menu">
                    <ul class="main-menu__list">
                        <li class="main-menu__item">
                            <a href="/category/cinematography" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/cinemetography.svg') }}" width="35px">
                                <span>CINEMATOGRAPHY</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/pro-video" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/provideo.svg') }}" width="35px">
                                <span>PRO VIDEO</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/photography" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/photography.svg') }}" width="35px">
                                <span>PHOTOGRAPHY</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/lighting-grip" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/lighting.svg') }}" width="35px">
                                <span>LIGHTING & GRIP</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/pro-audio" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/proaudio.svg') }}" width="35px">
                                <span>PRO AUDIO</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/audio-visual" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/audiovisual.svg') }}" width="35px">
                                <span>AUDIO VISUAL</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/computer-editing" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/computer.svg') }}" width="35px">
                                <span>COMPUTER & EDITING</span>
                            </a>
                        </li>
                        <li class="main-menu__item">
                            <a href="/category/used" class="main-menu__link">
                                <img class="icon-img inner-img" src="{{ URL::asset('assets/icons/used.svg') }}" width="35px">
                                <span>USED</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header__logo">
            <a href="/" class="logo">
                <div class="logo__slogan">Future Art Broadcast Trading L.L.C - Professional Video, Broadcast, Cinema, Pro Audio & Photography Equipment Supplier</div>
                <div class="logo__image">
                    <img src="{{ URL::asset('assets/logo/FABT-Logo.png') }}" width="200">
                </div>
            </a>
        </div>

        <div class="header__search">
            <div class="search">
                {{-- <form action="{{ route('search') }}" method="GET" class="search__body" autocomplete="off">
                    <div class="search__shadow"></div>
                    <input class="search__input" type="text" name="query" id="query" value="{{request()->input('query')}}" placeholder="Enter Name or MFR"/>
                    <button class="search__button search__button--end" type="submit">
                        <span class="search__button-icon">
                            <svg width="20" height="20">
                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                            </svg>
                        </span>
                    </button>
                    <div class="search__box"></div>
                    <div class="search__decor">
                        <div class="search__decor-start"></div>
                        <div class="search__decor-end"></div>
                    </div>
                </form> --}}
                <autosearch></autosearch>
            </div>
        </div>

        <div class="header__indicators">
            <div class="indicator">
                <a href="{{ route('wishlist') }}" class="indicator__button">
                    <span class="indicator__icon">
                        <svg width="32" height="32">
                            <path d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2z"/>
                        </svg>
                    </span>
                </a>
            </div>
            <div class="indicator indicator--trigger--click">
                <a href="" class="indicator__button">
                    <span class="indicator__icon">
                        <svg width="32" height="32">
                            <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"/>
                        </svg>
                    </span>
                    @guest
                        <span class="indicator__title">Hello, Log In</span>
                        <span class="indicator__value">My Account</span>
                    @else
                        <span class="indicator__title">Welcome!</span>
                        <span class="indicator__value">{{ Auth()->user()->firstname }}</span>
                    @endguest
                </a>
                <div class="indicator__content">
                    <div class="account-menu">
                        @guest
                            <form method="POST" action="{{ route('login') }}" class="account-menu__form">
                                @csrf
                                <div class="account-menu__form-title">Log In to Your Account</div>
                                <div class="form-group">
                                    <label for="header-signin-email" class="sr-only">Email address</label>
                                    <input id="header-signin-email" type="email" name="email" class="form-control form-control-sm" placeholder="Email address"/>
                                </div>
                                <div class="form-group">
                                    <label for="header-signin-password" class="sr-only">Password</label>
                                    <div class="account-menu__form-forgot">
                                        <input id="header-signin-password" type="password" name="password" class="form-control form-control-sm" placeholder="Password"/>
                                        <a href="{{route('password.request')}}" class="account-menu__form-forgot-link">Forgot?</a>
                                    </div>
                                </div>
                                <div class="form-group account-menu__form-button">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Login</button>
                                </div>
                            </form>
                            <div class="mt-0 mb-4 account-menu__form-link account-menu__form" style="height: 50px;">
                                <a href="{{ route('register') }}">
                                    <button type="button" class="btn btn-primary btn-sm btn-block">Create An Account</button>
                                </a>
                            </div>
                        @else
                            <div class="account-menu__divider"></div>
                            <div class="account-menu__user">
                                <div class="account-menu__user-avatar">
                                    <img src="{{URL::asset('assets/logo/user.png')}}" alt="" />
                                </div>
                                <div class="account-menu__user-info">
                                    <div class="account-menu__user-name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</div>
                                </div>
                            </div>
                            <div class="account-menu__divider"></div>
                            <ul class="account-menu__links">
                                <li>
                                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.profile') }}">Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.orders') }}">Order History</a>
                                </li>
                                {{-- <li>
                                    <a href="{{ route('user.address') }}">Addresses</a>
                                </li> --}}
                            </ul>
                            <div class="account-menu__divider"></div>
                            <ul class="account-menu__links">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="indicator">
                <a href="{{route('cart')}}" class="indicator__button">
                    <span class="indicator__icon">
                        <svg width="32" height="32">
                            <circle cx="10.5" cy="27.5" r="2.5" />
                            <circle cx="23.5" cy="27.5" r="2.5" />
                            <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z"/>
                        </svg>
                        @if (Cart::instance('default')->count() > 0)
                            <span class="indicator__counter">{{ Cart::instance('default')->count() }}</span>
                        @endif
                    </span>
                    <span class="indicator__title">Shopping Cart</span>
                    <span class="indicator__value">AED {{ Cart::subtotal() }}</span>
                </a>
            </div>
        </div>
    </div>
</header>
@endif


