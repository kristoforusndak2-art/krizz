<header class="site-header">
    <div class="container nav">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand-mark">{{ $initials }}</span>
            <span class="brand-name">{{ $name }}</span>
        </a>
        <nav class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Welcome</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Data Diri</a>
            <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
            <a href="mailto:{{ $email }}" class="header-cta">Kontak Saya</a>
        </nav>
    </div>
</header>
