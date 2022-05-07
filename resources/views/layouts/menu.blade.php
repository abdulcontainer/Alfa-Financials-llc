<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('candidate.index') }}" class="nav-link {{ Request::is('candidate') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Candidates</p>
    </a>
</li>
