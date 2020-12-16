@section('default_vars')
    {{ $activeMenu2 = $activeMenu2 ?? 'user' }}
@endsection

<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'users' ? ' active' : '' }}" href="{{ url('/') }}">
        {{ __('Users') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'milestones' ? ' active' : '' }}" href="{{ url('/') }}">
        {{ __('Milestones') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'projects' ? ' active' : '' }}" href="{{ url('/') }}">
        {{ __('Projects') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link{{ $activeMenu2 == 'profiles' ? ' active' : '' }}" href="{{ url('/') }}">
        {{ __('Profiles') }}
    </a>
</li>
