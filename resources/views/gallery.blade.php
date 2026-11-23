@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <div class="section-head reveal">
        <div>
            <span class="eyebrow">Kumpulan karya</span>
            <h1 style="font-size:clamp(2rem,4vw,3.2rem)">Gallery</h1>
            <p class="section-sub">Beberapa proyek dan pencapaian yang menggambarkan perjalanan saya membangun hal-hal kecil menjadi karya nyata.</p>
        </div>
        <a href="{{ route('about') }}" class="btn btn-ghost">Tentang saya <span class="arrow" aria-hidden="true">&rarr;</span></a>
    </div>

    <div class="stats reveal delay-1">
        @php($statIndex = 0)
        @while ($statIndex < count($stats))
            <div class="stat">
                <span class="num">{{ $stats[$statIndex]['value'] }}</span>
                <span class="lab">{{ $stats[$statIndex]['label'] }}</span>
            </div>
            @php($statIndex++)
        @endwhile
    </div>

    <section class="section" style="margin-top:34px">
        <div class="section-head">
            <div>
                <span class="eyebrow">Proyek pilihan</span>
                <h2 style="font-size:1.8rem">Yang pernah saya buat</h2>
            </div>
        </div>

        <div class="filters reveal" role="group" aria-label="Filter kategori proyek">
            @foreach ($categories as $category)
                <button type="button" class="filter {{ $loop->first ? 'is-active' : '' }}" data-filter="{{ $category }}">{{ $category }}</button>
            @endforeach
        </div>

        <div class="grid grid-2">
            @forelse ($projects as $project)
                <article class="card project reveal delay-{{ $loop->iteration }}" data-category="{{ $project['category'] }}">
                    <div class="project-cover tone-{{ $project['tone'] }}"></div>
                    <div class="meta">
                        <span class="tag">{{ $project['category'] }}</span>
                        @if ($project['featured'])
                            <span class="tag alt">Featured</span>
                        @else
                            <span class="tag soft">Proyek</span>
                        @endif
                        <span class="tag soft">{{ $project['year'] }}</span>
                    </div>
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ $project['desc'] }}</p>
                </article>
            @empty
                <article class="card">
                    <h3>Belum ada proyek untuk ditampilkan</h3>
                    <p class="muted">Karya baru akan segera ditambahkan di sini.</p>
                </article>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="grid grid-2">
            <article class="card reveal">
                <span class="eyebrow">Perjalanan</span>
                <h2 style="font-size:1.7rem">Highlight</h2>
                <div class="timeline" style="margin-top:20px">
                    @for ($highlightIndex = 1; $highlightIndex <= count($highlights); $highlightIndex++)
                        <div class="step">
                            <span class="step-num">{{ str_pad((string) $highlightIndex, 2, '0', STR_PAD_LEFT) }}</span>
                            <div>
                                <h3 style="font-size:1rem">{{ $highlights[$highlightIndex - 1] }}</h3>
                                <p class="muted" style="font-size:.88rem">Bagian dari proses belajar saya.</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </article>

            <article class="card reveal delay-1">
                <span class="eyebrow">Selanjutnya</span>
                <h2 style="font-size:1.7rem">Terus berkarya</h2>
                <p style="margin-top:14px">Setiap proyek adalah kesempatan untuk mencoba pendekatan baru, merapikan detail kecil, dan memahami kebutuhan pengguna dengan lebih baik.</p>
                <div class="actions" style="margin-top:24px">
                    <a href="mailto:{{ $email }}" class="btn btn-primary">Hubungi saya</a>
                    <a href="{{ route('home') }}" class="btn btn-ghost">Kembali ke welcome</a>
                </div>
            </article>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const filterButtons = document.querySelectorAll('.filter');
    const projectCards = document.querySelectorAll('.project');

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const selected = button.dataset.filter;

            filterButtons.forEach((item) => item.classList.toggle('is-active', item === button));

            projectCards.forEach((card) => {
                const matches = selected === 'Semua' || card.dataset.category === selected;
                card.classList.toggle('is-hidden', !matches);
            });
        });
    });
</script>
@endpush
