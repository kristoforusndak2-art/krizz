@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <style>
        .photo-bg-layer {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .photo-bg-image {
            position: absolute;
            inset: -10%;
            width: 120%;
            height: 120%;
            object-fit: cover;
            object-position: center 20%;
            filter: blur(2px) saturate(1.05) brightness(0.72);
            transform-origin: center center;
            will-change: transform;
            animation: photoBgDrift 12s ease-in-out infinite alternate;
        }

        .photo-bg-overlay {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(16, 185, 129, 0.12), transparent 45%),
                radial-gradient(circle at 80% 30%, rgba(99, 102, 241, 0.12), transparent 50%),
                linear-gradient(180deg, rgba(7, 10, 19, 0.42) 0%, rgba(7, 10, 19, 0.62) 100%);
        }

        @keyframes photoBgDrift {
            0% {
                transform: scale(1.04) translate(-28px, -18px);
            }
            50% {
                transform: scale(1.16) translate(32px, -22px);
            }
            100% {
                transform: scale(1.08) translate(-20px, 24px);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .photo-bg-image {
                animation: none;
            }
        }
    </style>

    <div class="photo-bg-layer" aria-hidden="true">
        <img src="{{ asset('images/foto-saya.jpg') }}" alt="" class="photo-bg-image">
        <div class="photo-bg-overlay"></div>
    </div>

    <section class="hero">
        <div class="reveal">
            @if ($isAvailable)
                <span class="badge">Tersedia untuk kolaborasi</span>
            @else
                <span class="badge off">Sedang tidak menerima proyek</span>
            @endif

            <h1>Halo, saya <span class="name">{{ $name }}</span></h1>
            <p class="lead">{{ $tagline }}. Saya menyukai proses merancang ide sederhana menjadi pengalaman digital yang terasa personal, rapi, dan menyenangkan untuk dipakai.</p>

            <div class="actions">
                <a href="{{ route('gallery') }}" class="btn btn-primary">Lihat karya <span class="arrow" aria-hidden="true">&rarr;</span></a>
                <a href="{{ route('about') }}" class="btn btn-ghost">Kenali saya</a>
            </div>

            <div class="stats" style="margin-top:34px">
                @foreach ($quickFacts as $fact)
                    <div class="stat">
                        <span class="num" style="font-size:1.05rem;font-weight:750">{{ $fact['value'] }}</span>
                        <span class="lab">{{ $fact['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="profile-visual reveal delay-2">
            <div class="orbit one"></div>
            <div class="orbit two"></div>
            <img src="{{ asset('images/foto-saya.jpg') }}" alt="Foto {{ $name }}" style="width: 220px; height: 220px; object-fit: cover; object-position: center top; border-radius: 50%; display: block; margin: auto;">
            <div class="float-card top">
                <strong>{{ $currentFocus }}</strong>
                <small>Fokus saat ini</small>
            </div>
            <div class="float-card bottom">
                <strong>{{ $email }}</strong>
                <small>Hubungi saya</small>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-head">
            <div>
                <span class="eyebrow">Fokus saya</span>
                <h2>Yang saya kerjakan</h2>
            </div>
            <p class="section-sub">{{ $currentFocus }} menjadi jalur utama saya saat ini, berdampingan dengan desain dan pembelajaran berkelanjutan.</p>
        </div>

        <div class="grid grid-3">
            @foreach ($focusAreas as $focus)
                <article class="card reveal delay-{{ $loop->iteration }}">
                    <span class="step-number">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    <h3>{{ $focus['title'] }}</h3>
                    <p>{{ $focus['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section">
        <div class="hero-banner reveal">
            <div>
                <span class="eyebrow">Mari berkenalan</span>
                <h2>Ingin tahu lebih banyak?</h2>
                <p class="section-sub">Lihat data diri dan kumpulan proyek yang sudah saya kerjakan.</p>
            </div>
            <div class="actions">
                <a href="{{ route('about') }}" class="btn btn-primary">Data diri</a>
                <a href="{{ route('gallery') }}" class="btn btn-ghost">Gallery</a>
            </div>
        </div>
    </section>
@endsection