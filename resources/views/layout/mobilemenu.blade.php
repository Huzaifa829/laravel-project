<div class="mobile-menu">
    <div class="mobile-menu__backdrop"></div>
    <div class="mobile-menu__body">
        <button class="mobile-menu__close" type="button">
            <svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z"/>
            </svg>
        </button>
        <div class="mobile-menu__panel">
            <div class="mobile-menu__panel-header">
                <div class="mobile-menu__panel-title">Menu</div>
            </div>
            <div class="mobile-menu__panel-body">
                <div class="mobile-menu__divider"></div>
                <div class="mobile-menu__indicators">
                    <a class="mobile-menu__indicator" href="{{ route('wishlist') }}">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M14,3c2.2,0,4,1.8,4,4c0,4-5.2,10-8,10S2,11,2,7c0-2.2,1.8-4,4-4c1,0,1.9,0.4,2.7,1L10,5.2L11.3,4C12.1,3.4,13,3,14,3 M14,1c-1.5,0-2.9,0.6-4,1.5C8.9,1.6,7.5,1,6,1C2.7,1,0,3.7,0,7c0,5,6,12,10,12s10-7,10-12C20,3.7,17.3,1,14,1L14,1z"/>
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Wishlist</span>
                    </a>
                    @guest
                    <a class="mobile-menu__indicator" href="{{ route('login') }}">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Account</span>
                    </a>
                    @else
                    <a class="mobile-menu__indicator" href="{{ route('user.dashboard') }}">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <path d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"/>
                            </svg>
                        </span>
                        <span class="mobile-menu__indicator-title">Account</span>
                    </a>
                    @endguest

                    <a class="mobile-menu__indicator" href="{{ route('cart') }}">
                        <span class="mobile-menu__indicator-icon">
                            <svg width="20" height="20">
                                <circle cx="7" cy="17" r="2" />
                                <circle cx="15" cy="17" r="2" />
                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                            </svg>
                            @if (Cart::instance('default')->count() > 0)
                            <span class="mobile-menu__indicator-counter">{{ Cart::instance('default')->count() }}</span>
                            @endif
                        </span>
                        <span class="mobile-menu__indicator-title">Cart</span>
                    </a>
                </div>
                <div class="mobile-menu__divider"></div>
                <ul class="mobile-menu__links">
                    <li data-mobile-menu-item>
                        <a href="/category/cinematography">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/cinemetography.svg') }}" width="35px">
                            <span>CINEMATOGRAPHY</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/pro-video">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/provideo.svg') }}" width="35px">
                            <span>PRO VIDEO</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/photography">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/photography.svg') }}" width="35px">
                            <span>PHOTOGRAPHY</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/lighting-grip">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/lighting.svg') }}" width="35px">
                            <span>LIGHTING & GRIP</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/pro-audio">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/proaudio.svg') }}" width="35px">
                            <span>PRO AUDIO</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/audio-visual">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/audiovisual.svg') }}" width="35px">
                            <span>AUDIO VISUAL</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/computer-editing">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/computer.svg') }}" width="35px">
                            <span>COMPUTER & EDITING</span>
                        </a>
                    </li>
                    <li data-mobile-menu-item>
                        <a href="/category/used">
                            <img class="icon-img" src="{{ URL::asset('assets/icons/used.svg') }}" width="35px">
                            <span>USED</span>
                        </a>
                    </li>
                </ul>
                <div class="mobile-menu__spring"></div>
                <div class="mobile-menu__divider"></div>
                <a class="mobile-menu__contacts" href="#">
                    <div class="mobile-menu__contacts-subtitle">Free call 24/7</div>
                    <div class="mobile-menu__contacts-title">+971 42722039</div>
                </a>
            </div>
        </div>
    </div>
</div>
