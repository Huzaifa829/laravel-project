<div class="col-12 col-lg-3 d-flex">
    <div class="account-nav flex-grow-1">
        <h4 class="account-nav__title">Navigation Menu</h4>
        <ul class="account-nav__list">
            <li class="account-nav__item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="account-nav__item">
                <a href="{{ route('user.profile') }}">Edit Profile</a>
            </li>
            <li class="account-nav__item">
                <a href="{{ route('user.orders') }}">Order History</a>
            </li>
            {{-- <li class="account-nav__item">
                <a href="{{ route('wishlist') }}">Wishlist</a>
            </li> --}}
            {{-- <li class="account-nav__item">
                <a href="{{ route('user.address') }}">Addresses</a>
            </li> --}}
            <li class="account-nav__item">
                <a href="{{ route('user.password') }}">Password</a>
            </li>
            <li class="account-nav__divider" role="presentation"></li>
            <li class="account-nav__item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
