<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portofolio pribadi {{ $name }} - web developer dan lifelong learner.">
    <title>@yield('title', 'Portofolio') · {{ $name }}</title>
    <style>
        :root{--bg:#070b16;--surface:#111a33;--surface-2:#172244;--text:#f3f6ff;--muted:#a8b6d8;--accent:#8b6cff;--accent-2:#25e6b8;--accent-3:#ff7ab8;--border:rgba(255,255,255,.1);--shadow:0 24px 60px rgba(2,6,23,.45)}
        *{box-sizing:border-box;margin:0;padding:0}
        html{scroll-behavior:smooth}
        body{font-family:"Segoe UI",system-ui,-apple-system,Arial,sans-serif;background:var(--bg);color:var(--text);min-height:100vh;line-height:1.65;overflow-x:hidden}
        body::before{content:"";position:fixed;inset:-20%;z-index:-2;background:radial-gradient(900px 600px at 12% 0%,rgba(80,56,190,.42),transparent 62%),radial-gradient(800px 520px at 92% 8%,rgba(14,150,140,.32),transparent 60%),radial-gradient(700px 500px at 60% 100%,rgba(190,60,130,.18),transparent 65%);animation:drift 20s ease-in-out infinite alternate}
        body::after{content:"";position:fixed;inset:0;z-index:-1;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:48px 48px;-webkit-mask-image:linear-gradient(to bottom,#000,transparent 85%);mask-image:linear-gradient(to bottom,#000,transparent 85%);pointer-events:none}
        @keyframes drift{from{transform:translate3d(-2%,-1%,0) scale(1)}to{transform:translate3d(3%,2%,0) scale(1.08)}}
        a{color:inherit;text-decoration:none}
        .container{width:min(1140px,92%);margin:0 auto}
        .site-header{position:sticky;top:0;z-index:30;background:rgba(7,11,22,.74);-webkit-backdrop-filter:blur(18px);backdrop-filter:blur(18px);border-bottom:1px solid var(--border)}
        .nav{display:flex;align-items:center;justify-content:space-between;padding:14px 0;gap:18px}
        .brand{display:flex;align-items:center;gap:11px;font-weight:800;letter-spacing:-.02em}
        .brand-mark{flex:none;display:grid;place-items:center;width:38px;height:38px;border-radius:12px;background:linear-gradient(140deg,var(--accent),var(--accent-2));color:#08101f;font-weight:900;font-size:.95rem;box-shadow:0 8px 24px rgba(139,108,255,.35)}
        .brand-name{font-size:1.02rem;white-space:nowrap}
        .brand-name span{color:var(--accent-2)}
        .nav-links{display:flex;align-items:center;gap:6px;flex-wrap:wrap}
        .nav-links a{padding:9px 15px;border-radius:999px;color:var(--muted);font-size:.92rem;font-weight:600;border:1px solid transparent;transition:.25s ease}
        .nav-links a:hover{color:var(--text);background:rgba(255,255,255,.06)}
        .nav-links a.active{color:#fff;background:linear-gradient(135deg,rgba(139,108,255,.3),rgba(37,230,184,.16));border-color:rgba(139,108,255,.45);box-shadow:0 6px 20px rgba(139,108,255,.18)}
        .nav-links a.header-cta{background:linear-gradient(135deg,var(--accent),var(--accent-2));color:#07101f;font-weight:800;border-color:transparent;box-shadow:0 10px 24px rgba(37,230,184,.18)}
        .nav-links a.header-cta:hover{color:#07101f;filter:brightness(1.1)}
        main{padding:58px 0 78px;min-height:72vh}
        .eyebrow{display:inline-flex;align-items:center;gap:9px;font-size:.76rem;font-weight:800;letter-spacing:.18em;text-transform:uppercase;color:var(--accent-2);margin-bottom:12px}
        .eyebrow::before{content:"";width:26px;height:2px;border-radius:2px;background:currentColor}
        h1,h2,h3,h4{line-height:1.2;letter-spacing:-.03em}
        h1{font-size:clamp(2.4rem,5.4vw,4.2rem);font-weight:800}
        h2{font-size:clamp(1.8rem,3.6vw,2.6rem);font-weight:800}
        h3{font-size:1.18rem;font-weight:750}
        .lead{color:var(--muted);font-size:1.1rem;max-width:58ch;margin:18px 0 28px}
        .section-sub{color:var(--muted);max-width:62ch;margin-top:10px}
        .section{margin-top:58px}
        .section-head{display:flex;align-items:flex-end;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-bottom:24px}
        .hero{display:grid;grid-template-columns:1.25fr .75fr;gap:42px;align-items:center}
        .hero h1 .name{background:linear-gradient(100deg,var(--accent-2),#8ab4ff 48%,var(--accent));-webkit-background-clip:text;background-clip:text;color:transparent}
        .badge{display:inline-flex;align-items:center;gap:9px;padding:7px 14px;border-radius:999px;font-size:.82rem;font-weight:700;background:rgba(37,230,184,.12);color:#a8f7e3;border:1px solid rgba(37,230,184,.28);margin-bottom:18px}
        .badge::before{content:"";width:8px;height:8px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 0 5px rgba(37,230,184,.14);animation:pulse 2s ease-in-out infinite}
        .badge.off{background:rgba(255,255,255,.06);color:var(--muted);border-color:var(--border)}
        .badge.off::before{background:var(--muted);box-shadow:none;animation:none}
        @keyframes pulse{50%{box-shadow:0 0 0 9px rgba(37,230,184,0)}}
        .actions{display:flex;gap:12px;flex-wrap:wrap}
        .btn{display:inline-flex;align-items:center;gap:9px;padding:13px 22px;border-radius:14px;font-weight:700;font-size:.94rem;border:1px solid var(--border);transition:.25s ease}
        .btn-primary{background:linear-gradient(135deg,var(--accent),var(--accent-2));color:#07101f;border-color:transparent;box-shadow:0 14px 30px rgba(139,108,255,.28)}
        .btn-ghost{background:rgba(255,255,255,.04);color:var(--text)}
        .btn:hover{transform:translateY(-3px)}
        .btn-ghost:hover{background:rgba(255,255,255,.09)}
        .arrow{transition:transform .25s ease}
        .btn:hover .arrow{transform:translateX(4px)}
        .profile-visual{position:relative;display:grid;place-items:center;min-height:360px}
        .orbit{position:absolute;border:1px solid rgba(255,255,255,.1);border-radius:50%;pointer-events:none}
        .orbit.one{width:300px;height:300px;animation:spin 24s linear infinite}
        .orbit.two{width:232px;height:232px;border-style:dashed;border-color:rgba(37,230,184,.24);animation:spin 17s linear infinite reverse}
        .orbit::after{content:"";position:absolute;top:-5px;left:50%;width:10px;height:10px;border-radius:50%;background:var(--accent-2);box-shadow:0 0 18px var(--accent-2)}
        @keyframes spin{to{transform:rotate(360deg)}}
        .avatar{position:relative;z-index:1;width:178px;height:178px;border-radius:44px;display:grid;place-items:center;font-size:3.3rem;font-weight:900;letter-spacing:-.06em;background:linear-gradient(145deg,#2b1f66,#0e6d6a);border:2px solid rgba(255,255,255,.16);box-shadow:0 30px 70px rgba(0,0,0,.45),inset 0 1px 0 rgba(255,255,255,.2);transform:rotate(-6deg)}
        .avatar span{transform:rotate(6deg);background:linear-gradient(90deg,#fff,#b9ffe9);-webkit-background-clip:text;background-clip:text;color:transparent}
        .float-card{position:absolute;z-index:2;padding:10px 14px;border-radius:14px;background:rgba(17,26,51,.86);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);border:1px solid var(--border);font-size:.8rem;box-shadow:var(--shadow)}
        .float-card strong{display:block;font-size:.94rem}
        .float-card small{color:var(--muted)}
        .float-card.top{top:24px;right:0}
        .float-card.bottom{bottom:24px;left:0}
        .card{position:relative;overflow:hidden;background:linear-gradient(160deg,rgba(23,34,68,.94),rgba(12,19,40,.94));border:1px solid var(--border);border-radius:22px;padding:26px;box-shadow:var(--shadow);transition:transform .3s ease,border-color .3s ease}
        .card::before{content:"";position:absolute;inset:0;background:radial-gradient(300px 160px at 100% 0,rgba(139,108,255,.14),transparent 70%);pointer-events:none}
        .card:hover{transform:translateY(-6px);border-color:rgba(139,108,255,.36)}
        .grid{display:grid;gap:20px}
        .grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}
        .grid-3{grid-template-columns:repeat(3,minmax(0,1fr))}
        .step-number{display:inline-grid;place-items:center;width:34px;height:34px;border-radius:11px;margin-bottom:18px;background:rgba(139,108,255,.18);color:#d5ccff;font-weight:800;font-size:.9rem}
        .card p{color:var(--muted);font-size:.94rem;margin-top:8px}
        .info-list{display:grid;gap:10px}
        .info-row{display:flex;gap:14px;align-items:center;padding:13px 15px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--border)}
        .info-dot{flex:none;display:grid;place-items:center;width:34px;height:34px;border-radius:10px;background:rgba(139,108,255,.16);color:#cfc4ff;font-weight:800;font-size:.85rem}
        .info-label{color:var(--muted);font-size:.78rem}
        .info-value{font-weight:650}
        .chips{display:flex;flex-wrap:wrap;gap:9px}
        .chip{padding:9px 14px;border-radius:999px;background:rgba(37,230,184,.1);border:1px solid rgba(37,230,184,.24);color:#b9f7e6;font-size:.88rem;font-weight:600}
        .skill-top{display:flex;justify-content:space-between;gap:12px;margin-bottom:10px;font-weight:700;font-size:.94rem}
        .skill-top small{color:var(--accent-2);font-weight:600}
        .bar{height:8px;border-radius:999px;background:rgba(255,255,255,.08);overflow:hidden}
        .bar span{display:block;height:100%;width:var(--level);border-radius:999px;background:linear-gradient(90deg,var(--accent),var(--accent-2));box-shadow:0 0 14px rgba(37,230,184,.35)}
        .skills-stack{display:grid;gap:20px}
        .stats{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:26px}
        .stat{flex:1 1 150px;padding:18px;text-align:center;border-radius:18px;background:rgba(255,255,255,.035);border:1px solid var(--border)}
        .stat .num{display:block;font-size:2rem;font-weight:800;background:linear-gradient(90deg,var(--accent-2),#9ec1ff);-webkit-background-clip:text;background-clip:text;color:transparent}
        .stat .lab{color:var(--muted);font-size:.85rem}
        .filters{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:22px}
        .filter{padding:8px 16px;border:1px solid var(--border);border-radius:999px;background:rgba(255,255,255,.04);color:var(--muted);font:inherit;font-size:.88rem;font-weight:700;cursor:pointer;transition:.2s ease}
        .filter:hover,.filter.is-active{color:#fff;background:rgba(139,108,255,.22);border-color:rgba(139,108,255,.5)}
        .project{min-height:230px}
        .project-cover{position:relative;height:94px;border-radius:14px;margin-bottom:16px;overflow:hidden}
        .project-cover::after{content:"";position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.12) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.12) 1px,transparent 1px);background-size:22px 22px;opacity:.45}
        .tone-violet{background:linear-gradient(135deg,#6c4ce0,#9d7bff)}
        .tone-mint{background:linear-gradient(135deg,#0e8f80,#25e6b8)}
        .tone-rose{background:linear-gradient(135deg,#c14c8a,#ff7ab8)}
        .tone-sky{background:linear-gradient(135deg,#2a63c9,#69b6ff)}
        .meta{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:10px}
        .tag{display:inline-block;font-size:.75rem;font-weight:700;padding:4px 10px;border-radius:999px;background:rgba(139,108,255,.18);color:#d9d0ff;border:1px solid rgba(139,108,255,.3)}
        .tag.alt{background:rgba(37,230,184,.12);color:#bdf7e8;border-color:rgba(37,230,184,.26)}
        .tag.soft{background:rgba(255,255,255,.06);color:var(--muted);border-color:var(--border)}
        .project.is-hidden{display:none}
        .timeline{display:grid;gap:12px}
        .step{display:flex;gap:14px;align-items:flex-start;padding:14px 16px;border-radius:14px;background:rgba(255,255,255,.035);border:1px solid var(--border)}
        .step-num{flex:none;display:grid;place-items:center;width:32px;height:32px;border-radius:10px;background:linear-gradient(135deg,var(--accent),var(--accent-2));color:#07101f;font-weight:900;font-size:.85rem}
        .muted{color:var(--muted)}
        .hero-banner{display:flex;align-items:center;justify-content:space-between;gap:22px;flex-wrap:wrap;padding:28px;border-radius:22px;border:1px solid rgba(37,230,184,.24);background:linear-gradient(120deg,rgba(37,230,184,.12),rgba(139,108,255,.16))}
        .reveal{animation:rise .7s ease both}
        .delay-1{animation-delay:.08s}
        .delay-2{animation-delay:.16s}
        .delay-3{animation-delay:.24s}
        .delay-4{animation-delay:.32s}
        @keyframes rise{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:none}}
        .site-footer{border-top:1px solid var(--border);margin-top:28px;padding:26px 0 34px;background:rgba(7,11,22,.6)}
        .footer-inner{display:flex;align-items:center;justify-content:space-between;gap:18px;flex-wrap:wrap}
        .footer-links{display:flex;gap:16px;flex-wrap:wrap;font-size:.88rem;color:var(--muted)}
        .footer-links a:hover{color:var(--accent-2)}
        .back-top{display:inline-flex;align-items:center;gap:8px;padding:9px 15px;border-radius:999px;border:1px solid var(--border);font-size:.86rem;font-weight:700;color:var(--muted);transition:.2s ease}
        .back-top:hover{color:#fff;background:rgba(255,255,255,.07);transform:translateY(-2px)}
        ::-webkit-scrollbar{width:10px}
        ::-webkit-scrollbar-track{background:#070b16}
        ::-webkit-scrollbar-thumb{background:#2b355c;border-radius:99px}
        @media (max-width:900px){.hero{grid-template-columns:1fr}.grid-2,.grid-3{grid-template-columns:1fr}.profile-visual{min-height:300px}.float-card.top{right:4%}.float-card.bottom{left:4%}}
        @media (max-width:600px){.nav{flex-direction:column;align-items:flex-start}.nav-links{width:100%}.nav-links a.header-cta{margin-left:auto}.float-card{display:none}main{padding:40px 0 60px}}
        @media (prefers-reduced-motion:reduce){*{animation:none!important;scroll-behavior:auto!important}}
    </style>
</head>
<body id="top">
    @include('partials.header')
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    @include('partials.footer')
    @stack('scripts')
</body>
</html>
