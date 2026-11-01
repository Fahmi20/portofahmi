<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#080d22">
    <meta name="description" content="Portofolio Muh Fahmi — Full Stack Developer. Pengalaman di Laravel, .NET, Android, REST API, dan integrasi sistem.">
    <title>Muh Fahmi — Full Stack Developer</title>
    <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='16' fill='%23080d22'/%3E%3Ctext x='32' y='43' font-size='31' text-anchor='middle' fill='%236de5f0' font-family='Arial' font-weight='bold'%3EMF%3C/text%3E%3C/svg%3E">
    <link rel="stylesheet" href="{{ asset('css/portfolio-lanyard.css') }}?v=2">
    <script src="{{ asset('js/portfolio-lanyard.js') }}?v=2" defer></script>
</head>
<body>
    @php
        $skills = [
            ['name' => 'PHP & Laravel', 'type' => 'Backend'],
            ['name' => 'C# & ASP.NET Core', 'type' => 'Backend'],
            ['name' => 'JavaScript', 'type' => 'Frontend'],
            ['name' => 'CodeIgniter', 'type' => 'Backend'],
            ['name' => 'REST API / BRIAPI', 'type' => 'Integration'],
            ['name' => 'SQL Server & MySQL', 'type' => 'Database'],
            ['name' => 'Android & QR Code', 'type' => 'Mobile'],
            ['name' => 'Git', 'type' => 'Workflow'],
        ];
        $projects = [
            [
                'number' => '01',
                'tag' => 'API INTEGRATION',
                'name' => 'Registrasi & Pembayaran BRIAPI',
                'text' => 'Membangun web service yang menghubungkan alur registrasi dan pembayaran di lingkungan pendidikan dengan layanan BRIAPI.',
                'stack' => ['REST API', 'PHP', 'Integration'],
                'visual' => 'payment',
            ],
            [
                'number' => '02',
                'tag' => 'ANDROID APPLICATION',
                'name' => 'Inventaris Aset dengan QR Code',
                'text' => 'Aplikasi inventaris Android untuk pencatatan dan pelacakan aset melalui pemindaian QR Code.',
                'stack' => ['Android', 'QR Code', 'SQL'],
                'visual' => 'qr',
            ],
            [
                'number' => '03',
                'tag' => 'SYSTEM INTEGRATION',
                'name' => 'Sinkronisasi Data PDDIKTI',
                'text' => 'Web service untuk membantu proses pengiriman dan sinkronisasi data kampus ke PDDIKTI secara otomatis.',
                'stack' => ['Web Service', 'Database', 'API'],
                'visual' => 'data',
            ],
            [
                'number' => '04',
                'tag' => 'WEB DEVELOPMENT',
                'name' => 'Website Renovki',
                'text' => 'Mengembangkan website Renovki dalam proyek freelance sesuai kebutuhan fungsional dan desain dari klien.',
                'stack' => ['Web', 'Freelance', 'Development'],
                'visual' => 'web',
            ],
        ];
        $experiences = [
            ['date' => 'Des 2025 — Mar 2026', 'role' => '.NET Developer', 'company' => 'PT Prima Solusi Computindo (RADSOFT)', 'detail' => 'Pengembangan dan pemeliharaan aplikasi .NET, debugging, serta integrasi dengan sistem yang digunakan klien.'],
            ['date' => 'Feb 2024 — Nov 2025', 'role' => 'IT Programmer', 'company' => 'Yayasan Pendidikan Gunung Sari', 'detail' => 'Sistem informasi pendidikan, web service BRIAPI, dan aplikasi inventaris Android dengan QR Code.'],
            ['date' => 'Jun 2024 — Agu 2024', 'role' => 'Web Developer · Freelance', 'company' => 'CV Booble Mitra Kreatif', 'detail' => 'Pengembangan website renovki.com berdasarkan kebutuhan dan spesifikasi proyek.'],
            ['date' => 'Apr 2024 — Jun 2024', 'role' => 'Web Developer · Freelance', 'company' => 'CV KAT Makassar', 'detail' => 'Web service integrasi data PDDIKTI dan website inventaris aset perusahaan.'],
            ['date' => 'Okt 2022 — Nov 2023', 'role' => 'Finance Accounting & IT Staff', 'company' => 'PT CKL Indonesia Raya', 'detail' => 'Mendukung kebutuhan IT sekaligus operasional administrasi dan keuangan perusahaan.'],
        ];
    @endphp

    <a class="skip-link" href="#main">Lewati ke konten</a>
    <div class="page-ambient" aria-hidden="true"></div>
    <div class="grain-layer" aria-hidden="true"></div>

    <header class="site-header" id="top">
        <nav class="nav-container container" aria-label="Navigasi utama">
            <a class="brand" href="#home" aria-label="Muh Fahmi, kembali ke beranda">Fahmi<span>.</span></a>
            <button class="nav-toggle" id="nav-toggle" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="nav-links">
                <span></span><span></span><span></span>
            </button>
            <div class="nav-links" id="nav-links">
                <a class="active" href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#experience">Experience</a>
                <a href="#contact">Contact</a>
            </div>
            <a class="nav-cta" href="mailto:fahmi4331@gmail.com">Let's talk <span aria-hidden="true">↗</span></a>
        </nav>
    </header>

    <main id="main">
        <section class="hero container" id="home">
            <div class="hero-copy" data-reveal>
                <div class="eyebrow"><span class="sparkle" aria-hidden="true">✦</span> WELCOME TO MY PORTFOLIO <span class="eyebrow-line"></span></div>
                <h1>Hi, I'm<br><span class="hero-gradient">Muh Fahmi.</span></h1>
                <p class="hero-role"><span class="role-dot"></span> Full Stack Developer <span class="role-separator">/</span> Problem Solver</p>
                <p class="hero-intro">Saya mengembangkan pengalaman digital yang <strong>fungsional, rapi, dan berdampak</strong> — dari aplikasi web dan Android hingga integrasi API yang menghubungkan berbagai sistem.</p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="#projects"><span aria-hidden="true">✦</span> Explore My Work <span aria-hidden="true">↗</span></a>
                    <a class="btn btn-secondary" href="{{ asset('cv/muh-fahmi-cv.pdf') }}" download>↓ Download CV</a>
                </div>
                <div class="hero-meta"><span class="online-dot"></span> Based in Makassar, Indonesia <span class="meta-divider"></span> Open to opportunities</div>
            </div>

            <div class="hero-art" data-reveal>
                <div class="hero-orbit orbit-one" aria-hidden="true"></div>
                <div class="hero-orbit orbit-two" aria-hidden="true"></div>
                <span class="art-star art-star-a" aria-hidden="true">✧</span>
                <span class="art-star art-star-b" aria-hidden="true">✦</span>
                <span class="art-star art-star-c" aria-hidden="true">✧</span>
                <span class="art-star art-star-d" aria-hidden="true">+</span>
                <div class="lanyard-stage" id="lanyard-stage">
                    <svg class="lanyard-svg" id="lanyard-svg" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <defs>
                            <linearGradient id="strap-shine" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0" stop-color="#05070d"/>
                                <stop offset=".26" stop-color="#32394c"/>
                                <stop offset=".58" stop-color="#0c1019"/>
                                <stop offset="1" stop-color="#05070c"/>
                            </linearGradient>
                        </defs>
                        <path id="strap-outer" fill="none" stroke="#04070e" stroke-width="19" stroke-linecap="round"></path>
                        <path id="strap-center" fill="none" stroke="url(#strap-shine)" stroke-width="15" stroke-linecap="round"></path>
                        <path id="strap-text-path" fill="none" stroke="none"></path>
                        <text class="strap-writing"><textPath href="#strap-text-path" startOffset="11%">FAHMI • DEVELOPER • FAHMI • DEVELOPER •</textPath></text>
                    </svg>
                    <div class="strap-anchor" aria-hidden="true"></div>
                    <div class="lanyard-assembly" id="lanyard-assembly">
                        <div class="clip-holder" aria-hidden="true">
                            <span class="clip-ring"></span><span class="clip-metal"></span><span class="clip-tab"></span>
                        </div>
                        <div class="lanyard-card" id="lanyard-card" tabindex="0" role="img" aria-label="Kartu identitas Muh Fahmi yang menggantung dan dapat digerakkan dengan mouse atau sentuhan">
                            <div class="card-face">
                                <div class="id-ribbon"><span>DEVELOPER ID</span><span>NO. 001 / 026</span></div>
                                <div class="id-hologram" aria-hidden="true"></div>
                                <div class="id-photo">
                                    <img src="{{ asset('images/muh-fahmi.png') }}" alt="" width="334" height="425" loading="eager" fetchpriority="high">
                                </div>
                                <div class="id-signature">
                                    <div class="id-script">Fahmi.</div>
                                    <div class="id-name">MUH FAHMI</div>
                                    <div class="id-title">FULL STACK DEVELOPER</div>
                                </div>
                                <div class="id-card-footer"><span>BUILDING DIGITAL EXPERIENCES</span><span>✦ ✦ ✦</span></div>
                                <div class="card-glare" aria-hidden="true"></div>
                            </div>
                            <div class="card-edge" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
                <div class="drag-hint"><span class="drag-symbol" aria-hidden="true">↔</span> Move your cursor or drag the lanyard</div>
            </div>
            <a class="scroll-cue" href="#about"><span class="scroll-line"></span> SCROLL TO EXPLORE <span aria-hidden="true">↓</span></a>
        </section>

        <section class="section about-section" id="about">
            <div class="container">
                <div class="section-intro" data-reveal><span class="section-overline">01 / THE PERSON BEHIND THE CODE</span><h2>About <span>Me.</span></h2><p>Saya percaya bahwa kode terbaik adalah kode yang memudahkan kehidupan manusia.</p></div>
                <div class="about-grid">
                    <div class="about-story" data-reveal>
                        <p>Halo! Saya <strong>Muh Fahmi</strong>, seorang Full Stack Developer dengan pengalaman lebih dari 2 tahun mengembangkan aplikasi web, Android, dan solusi integrasi sistem.</p>
                        <p>Saya terbiasa menerjemahkan kebutuhan bisnis menjadi produk yang dapat digunakan — mulai dari dashboard dan layanan API hingga sistem informasi pendidikan dan inventaris.</p>
                        <div class="about-summary">
                            <div><span class="summary-icon">⌘</span><span><strong>Web & Mobile</strong><small>Development experience</small></span></div>
                            <div><span class="summary-icon">◎</span><span><strong>API Integration</strong><small>Connecting real systems</small></span></div>
                        </div>
                    </div>
                    <div class="about-side" data-reveal>
                        <div class="about-stat-card"><span class="stat-star">✳</span><strong>2<span>+</span></strong><span>Years of experience</span><p>Crafting digital solutions for real-world needs.</p></div>
                        <div class="education-card"><span class="education-icon">✺</span><div><small>EDUCATION</small><strong>Universitas Negeri Makassar</strong><span>S1 Pendidikan Teknik Informatika dan Komputer</span><em>2017 — 2024 · IPK 3,61</em></div></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section skill-section" id="skills">
            <div class="container">
                <div class="section-intro" data-reveal><span class="section-overline">02 / MY TOOLKIT</span><h2>Skills & <span>Technologies.</span></h2><p>Teknologi dan pendekatan yang saya gunakan untuk membuat produk bekerja dengan baik.</p></div>
                <div class="skills-grid">
                    @foreach ($skills as $skill)
                        <div class="skill-tile" data-reveal><span class="skill-orb" aria-hidden="true">{{ ['✦','⌘','{ }','◇','↗','▦','▣','⑂'][$loop->index] }}</span><span class="skill-copy"><strong>{{ $skill['name'] }}</strong><small>{{ $skill['type'] }}</small></span><span class="skill-arrow" aria-hidden="true">↗</span></div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section project-section" id="projects">
            <div class="container">
                <div class="section-intro section-intro-split" data-reveal><div><span class="section-overline">03 / SELECTED WORK</span><h2>Featured <span>Projects.</span></h2></div><p>Beberapa kontribusi dalam proyek profesional dan freelance, mencakup aplikasi dan integrasi sistem.</p></div>
                <div class="projects-grid">
                    @foreach ($projects as $project)
                        <article class="project-card" data-reveal>
                            <div class="project-visual visual-{{ $project['visual'] }}">
                                <span class="visual-index">{{ $project['number'] }} / 04</span>
                                @if ($project['visual'] === 'payment')
                                    <div class="visual-window"><span class="window-dots">● ● ●</span><div class="payment-lines"><i></i><i></i><i></i></div><span class="payment-checked">✓ <small>PAYMENT CONNECTED</small></span></div>
                                @elseif ($project['visual'] === 'qr')
                                    <div class="visual-phone"><div class="qr-grid" aria-hidden="true">▣ ▦ ▣<br>▦ ▣ ▦<br>▣ ▦ ▣</div><span>ASSET SCANNED ✓</span></div>
                                @elseif ($project['visual'] === 'data')
                                    <div class="visual-nodes"><span>DATABASE</span><i>⇄</i><span>PDDIKTI API</span></div>
                                @else
                                    <div class="visual-browser"><div class="visual-browser-bar">● ● ● <span>renovki.com</span></div><div class="visual-browser-body"><span></span><b>BUILD SOMETHING<br>BETTER.</b><i></i></div></div>
                                @endif
                                <div class="visual-shimmer"></div>
                            </div>
                            <div class="project-info"><div class="project-label"><span>{{ $project['tag'] }}</span><span>{{ $project['number'] }}</span></div><h3>{{ $project['name'] }}</h3><p>{{ $project['text'] }}</p><div class="project-tags">@foreach ($project['stack'] as $technology)<span>{{ $technology }}</span>@endforeach</div></div>
                        </article>
                    @endforeach
                </div>
                <p class="project-note">* Sebagian proyek dikerjakan untuk organisasi atau klien; demo publik dan kode sumber tidak ditampilkan tanpa izin.</p>
            </div>
        </section>

        <section class="section experience-section" id="experience">
            <div class="container">
                <div class="section-intro" data-reveal><span class="section-overline">04 / THE JOURNEY SO FAR</span><h2>Experience <span>Timeline.</span></h2><p>Pengalaman yang membentuk cara saya merancang, membangun, dan memelihara sistem.</p></div>
                <div class="timeline">
                    @foreach ($experiences as $experience)
                        <article class="timeline-item" data-reveal><div class="timeline-date">{{ $experience['date'] }}</div><div class="timeline-track"><span></span></div><div class="timeline-content"><span class="timeline-type">{{ $loop->first ? 'RECENT EXPERIENCE' : 'WORK EXPERIENCE' }}</span><h3>{{ $experience['role'] }}</h3><strong>{{ $experience['company'] }}</strong><p>{{ $experience['detail'] }}</p></div></article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section contact-section" id="contact">
            <div class="container">
                <div class="contact-panel" data-reveal>
                    <div class="contact-glow" aria-hidden="true"></div>
                    <span class="section-overline">05 / WHAT'S NEXT?</span>
                    <h2>Let's build something <span>amazing.</span></h2>
                    <p>Punya ide proyek, peluang kolaborasi, atau ingin berdiskusi tentang teknologi? Saya senang mendengarnya.</p>
                    <div class="contact-actions"><a class="btn btn-primary" href="mailto:fahmi4331@gmail.com">Say Hello <span aria-hidden="true">↗</span></a><a class="btn btn-secondary" href="https://github.com/Fahmi20" target="_blank" rel="noopener noreferrer">Explore GitHub <span aria-hidden="true">↗</span></a></div>
                    <a class="contact-email" href="mailto:fahmi4331@gmail.com">fahmi4331@gmail.com</a>
                    <span class="contact-decoration" aria-hidden="true">✦</span>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer container"><a class="brand" href="#home">Fahmi<span>.</span></a><p>© {{ date('Y') }} Muh Fahmi · Designed with passion & built with Laravel.</p><a href="#top">Back to top ↑</a></footer>
</body>
</html>
