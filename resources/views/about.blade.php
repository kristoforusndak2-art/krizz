@extends('layouts.app')

@section('title', 'Data Diri')

@section('content')
    <div class="section-head reveal">
        <div>
            <span class="eyebrow">Tentang saya</span>
            <h1 style="font-size:clamp(2rem,4vw,3.2rem)">Data Diri</h1>
            <p class="section-sub">Sedikit informasi tentang siapa saya, apa yang saya kuasai, dan hal yang saya sukai.</p>
        </div>
        <a href="{{ route('gallery') }}" class="btn btn-ghost">Lihat gallery <span class="arrow" aria-hidden="true">&rarr;</span></a>
    </div>

    <div class="grid grid-2">
        <article class="card reveal">
            <div style="display:flex;gap:16px;align-items:center;margin-bottom:24px">
                <div class="avatar" style="width:80px;height:80px;border-radius:22px;transform:none;flex:none;overflow:hidden;padding:0">
                    <img src="{{ asset('images/foto-saya.jpg') }}" alt="Foto {{ $name }}" style="width:100%;height:100%;object-fit:cover;object-position:center top;display:block;transform:none">
                </div>
                <div>
                    <h2 style="font-size:1.5rem">{{ $name }}</h2>
                    <p class="muted">Personal Portfolio</p>
                </div>
            </div>

            <div class="info-list">
                @foreach ($biodata as $data)
                    @php
                        $customValues = [
                            1 => 'Kristoforus Servus Ndak',
                            2 => 'Tolok, 24 Juli 2007',
                            3 => 'Bali',
                        ];
                        $displayValue = $customValues[$loop->iteration] ?? $data['value'];
                    @endphp
                    <div class="info-row">
                        <span class="info-dot">{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <div>
                            <div class="info-label">{{ $data['label'] }}</div>
                            <div class="info-value">{{ $displayValue }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>

        <div class="skills-stack">
            <article class="card reveal delay-1">
                <span class="eyebrow">Keahlian</span>
                <h2 style="font-size:1.6rem">Skill saya</h2>
                <div class="skills-stack" style="margin-top:22px;gap:18px">
                    @foreach ($skills as $skill)
                        <div>
                            <div class="skill-top">
                                <span>{{ $skill['name'] }}</span>
                                <small>{{ $skill['level'] }}</small>
                            </div>
                            <div class="bar" role="progressbar" aria-label="{{ $skill['name'] }}" aria-valuenow="{{ $skill['percent'] }}" aria-valuemin="0" aria-valuemax="100">
                                <span style="--level: {{ $skill['percent'] }}%"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </article>

            <article class="card reveal delay-2">
                <span class="eyebrow">Di luar layar</span>
                <h2 style="font-size:1.6rem">Hobi</h2>
                <div class="chips" style="margin-top:18px">
                    @for ($hobbyIndex = 0; $hobbyIndex < count($hobbies); $hobbyIndex++)
                        <span class="chip">{{ $hobbies[$hobbyIndex] }}</span>
                    @endfor
                </div>
                <p class="muted" style="margin-top:18px">Keseluruhan hobi ini membantu saya tetap kreatif dan terus membuka sudut pandang baru.</p>
            </article>
        </div>
    </div>

    <section class="section">
        <div class="hero-banner reveal">
            <div>
                <span class="eyebrow">Langkah berikutnya</span>
                <h2>Performa dan karya</h2>
                <p class="section-sub">Lihat proyek, pencapaian, dan angka yang merangkum perjalanan saya.</p>
            </div>
            <a href="{{ route('gallery') }}" class="btn btn-primary">Buka gallery <span class="arrow" aria-hidden="true">&rarr;</span></a>
        </div>
    </section>
@endsection