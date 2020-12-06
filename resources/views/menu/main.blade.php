@section('default_vars')
    {{ $activeMenu = $activeMenu ?? 'user' }}
    {{ $submenu = $submenu ?? 'admin' }}
@endsection

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navCollapse">
            <div class="navbar-nav mr-auto flex-column">

                <ul class="navbar-nav" id="nav1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i title="{{ __('menu.home') }}" class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ $activeMenu === 'admin' ? ' active' : '' }}" href="{{ url('/') }}">
                            Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link{{ $activeMenu === 'user' ? ' active' : '' }}" href="{{ url('/') }}">
                            Test
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-lg-row" id="nav2">
                    @if($submenu !== '')
                        @include('menu.sub.'.$submenu)
                    @endif
                </ul>

            </div>

            <ul class="navbar-nav navbar-right" id="nav3">
                <li class="nav-item dropdown">
                    <ul id="flags">
                        <li class="mx-3 mx-lg-1"><a href="{{ url('/') }}" title="English"><img src="/img/app/flags/en.png" alt="en"></a></li>
                        <li class="mx-3 mx-lg-1"><a href="{{ url('/') }}" title="Français"><img src="/img/app/flags/fr.png" alt="fr"></a></li>
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" title="{{ 'menu.my_account' }}" href="{{ url('/') }}">{{ __('my_account') }}</a>
                            {{-- <a class="dropdown-item" title="{{ 'menu.logout' }}" href="{{ route('logout') }}">{{ __('logout') }} <i class="fa fa-sign-out-alt"></i></a>--}}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="{{ __('logout') }}" href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i></a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
