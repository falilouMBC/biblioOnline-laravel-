<li class="nav-item">
    <a href="{{ route('home') }}"
       class="nav-link ">
        <p><i class="fas fa-book-reader"></i> Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admin') }}"
       class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
        <p><i class="fa fa-envelope" aria-hidden="true"></i> Newsletter</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('myUsers.index') }}"
       class="nav-link {{ Request::is('myUsers*') ? 'active' : '' }}">
        <p>My Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('epreuves.index') }}"
       class="nav-link {{ Request::is('epreuves*') ? 'active' : '' }}">
        <p>Epreuves</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('corrections.index') }}"
       class="nav-link {{ Request::is('corrections*') ? 'active' : '' }}">
        <p>Corrections</p>
    </a>
</li>


