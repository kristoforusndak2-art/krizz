<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    private const OWNER_NAME = 'Kristoforus Serfus Ndak';

    private const OWNER_EMAIL = 'kristoforus.serfus@example.com';

    /**
     * @return array{name: string, initials: string, email: string}
     */
    private function ownerData(): array
    {
        return [
            'name' => self::OWNER_NAME,
            'email' => self::OWNER_EMAIL,
            'initials' => Str::of(self::OWNER_NAME)
                ->explode(' ')
                ->map(fn (string $part): string => $part[0])
                ->join(''),
        ];
    }

    public function home(): View
    {
        return view('home', array_merge($this->ownerData(), [
            'tagline' => 'Creative Developer & Lifelong Learner',
            'isAvailable' => true,
            'currentFocus' => 'Web Development',
            'quickFacts' => [
                ['label' => 'Lokasi', 'value' => 'Indonesia'],
                ['label' => 'Fokus', 'value' => 'Web Development'],
                ['label' => 'Bahasa', 'value' => 'Indonesia & Inggris'],
            ],
            'focusAreas' => [
                ['title' => 'Web Development', 'description' => 'Membangun antarmuka modern dengan HTML, CSS, PHP, dan Laravel.'],
                ['title' => 'UI / UX Design', 'description' => 'Merancang pengalaman yang bersih, konsisten, dan mudah digunakan.'],
                ['title' => 'Continuous Learning', 'description' => 'Terus bereksperimen dengan teknologi baru dan praktik terbaik.'],
            ],
        ]));
    }

    public function about(): View
    {
        $biodata = [
            ['label' => 'Nama Lengkap', 'value' => self::OWNER_NAME],
            ['label' => 'Tempat, Tanggal Lahir', 'value' => 'Indonesia, 2000'],
            ['label' => 'Domisili', 'value' => 'Indonesia'],
            ['label' => 'Email', 'value' => self::OWNER_EMAIL],
            ['label' => 'Pendidikan', 'value' => 'Mahasiswa / Pelajar Aktif'],
            ['label' => 'Minat', 'value' => 'Web Development, UI/UX, Teknologi'],
        ];

        $skills = [
            ['name' => 'HTML & CSS', 'level' => 'Mahir', 'percent' => 90],
            ['name' => 'Laravel & PHP', 'level' => 'Menengah', 'percent' => 75],
            ['name' => 'JavaScript', 'level' => 'Menengah', 'percent' => 68],
            ['name' => 'UI Design', 'level' => 'Dasar', 'percent' => 55],
        ];

        $hobbies = ['Ngoding', 'Desain', 'Belajar hal baru', 'Mendengarkan musik'];

        return view('about', array_merge($this->ownerData(), compact('biodata', 'skills', 'hobbies')));
    }

    public function gallery(): View
    {
        $projects = [
            ['title' => 'Portfolio Pribadi', 'category' => 'Web', 'year' => 2026, 'desc' => 'Website portofolio modern dengan Laravel Blade.', 'featured' => true, 'tone' => 'violet'],
            ['title' => 'Dashboard Akademik', 'category' => 'App', 'year' => 2025, 'desc' => 'Konsep dashboard untuk mengelola data akademik.', 'featured' => false, 'tone' => 'mint'],
            ['title' => 'Landing Page Produk', 'category' => 'Design', 'year' => 2025, 'desc' => 'Desain landing page yang bersih dan responsif.', 'featured' => true, 'tone' => 'rose'],
            ['title' => 'Sistem Kuis Online', 'category' => 'Web', 'year' => 2026, 'desc' => 'Prototipe aplikasi kuis interaktif.', 'featured' => false, 'tone' => 'sky'],
        ];

        $categories = collect($projects)
            ->pluck('category')
            ->unique()
            ->prepend('Semua')
            ->values()
            ->all();

        $highlights = [
            'Menyelesaikan proyek web pertama',
            'Belajar framework Laravel',
            'Konsisten meningkatkan skill desain',
        ];

        $stats = [
            ['label' => 'Proyek', 'value' => 4],
            ['label' => 'Tahun Aktif', 'value' => 2],
            ['label' => 'Skill Utama', 'value' => 4],
        ];

        return view('gallery', array_merge($this->ownerData(), compact('projects', 'categories', 'highlights', 'stats')));
    }
}
