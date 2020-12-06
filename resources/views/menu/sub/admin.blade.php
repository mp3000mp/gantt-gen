@section('default_vars')
    {{ $activeMenu2 = $activeMenu2 ?? 'user' }}
@endsection

<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'users' ? ' active' : '' }}" href="{{ url('/') }}">
        Users
    </a>
</li>
<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'projects' ? ' active' : '' }}" href="{{ url('/') }}">
        Projects
    </a>
</li>
<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'profiles' ? ' active' : '' }}" href="{{ url('/') }}">
        Profiles
    </a>
</li>
