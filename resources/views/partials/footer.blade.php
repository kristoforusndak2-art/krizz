<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <p>&copy; {{ date('Y') }} {{ $name }}. Personal Portfolio.</p>
            <p class="muted" style="font-size:.85rem">Dibuat dengan Laravel &amp; Blade.</p>
        </div>
        <nav class="footer-links" aria-label="Navigasi bawah">
            <a href="{{ route('home') }}">Welcome</a>
            <a href="{{ route('about') }}">Data Diri</a>
            <a href="{{ route('gallery') }}">Gallery</a>
            <a href="mailto:{{ $email }}">{{ $email }}</a>
        </nav>
        <a href="#top" class="back-top">Ke atas <span aria-hidden="true">&uarr;</span></a>
    </div>
</footer>
