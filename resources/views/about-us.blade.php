<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us — MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0D9488;
            --primary-dark: #0F766E;
            --primary-light: #99F6E4;
            --primary-glow: rgba(13, 148, 136, 0.25);
            --accent: #F97316;
            --accent-light: #FED7AA;
            --dark: #0F172A;
            --dark-soft: #1E293B;
            --gray-900: #111827;
            --gray-700: #374151;
            --gray-500: #6B7280;
            --gray-300: #D1D5DB;
            --gray-100: #F3F4F6;
            --white: #FFFFFF;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 8px 24px rgba(0,0,0,0.06);
            --card-shadow-hover: 0 4px 12px rgba(0,0,0,0.08), 0 20px 48px rgba(0,0,0,0.1);
            --hero-gradient: linear-gradient(135deg, #0F172A 0%, #134E4A 50%, #0D9488 100%);
            --section-alt: #F8FAFB;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Plus Jakarta Sans',sans-serif; color:var(--gray-700); overflow-x:hidden; -webkit-font-smoothing:antialiased; }
        h1,h2,h3,h4,h5,h6 { font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; }
        ::-webkit-scrollbar { width:8px; }
        ::-webkit-scrollbar-track { background:var(--gray-100); }
        ::-webkit-scrollbar-thumb { background:var(--primary); border-radius:99px; }

        /* NAVBAR (same) */
        .navbar-custom { background:rgba(255,255,255,0.85); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px); border-bottom:1px solid rgba(0,0,0,0.05); padding:0.75rem 0; transition:all 0.4s ease; z-index:1050; }
        .navbar-custom.scrolled { background:rgba(255,255,255,0.95); box-shadow:0 1px 20px rgba(0,0,0,0.08); padding:0.5rem 0; }
        .navbar-brand-text { font-weight:900; font-size:1.5rem; color:var(--dark)!important; letter-spacing:-0.5px; }
        .navbar-brand-text span { color:var(--primary); }
        .nav-link-custom { color:var(--gray-700)!important; font-weight:600; font-size:0.9rem; padding:0.5rem 1rem!important; border-radius:8px; transition:all 0.3s ease; }
        .nav-link-custom:hover { color:var(--primary)!important; background:var(--primary-glow); }
        .nav-link-custom.active { color:var(--primary)!important; background:var(--primary-glow); }
        .btn-nav-cta { background:var(--primary); color:var(--white)!important; font-weight:700; font-size:0.875rem; padding:0.6rem 1.5rem; border-radius:12px; border:none; transition:all 0.3s ease; box-shadow:0 4px 15px var(--primary-glow); }
        .btn-nav-cta:hover { background:var(--primary-dark); color:var(--white)!important; transform:translateY(-2px); box-shadow:0 8px 25px var(--primary-glow); }

        /* Mobile menu (same) */
        .mobile-menu-overlay { position:fixed; inset:0; background:rgba(15,23,42,0.6); backdrop-filter:blur(5px); z-index:9998; opacity:0; visibility:hidden; transition:all 0.3s ease; }
        .mobile-menu-overlay.active { opacity:1; visibility:visible; }
        .mobile-menu-panel { position:fixed; top:0; right:-320px; width:300px; max-width:85vw; height:100%; background:var(--white); z-index:9999; padding:2rem; transition:right 0.4s cubic-bezier(0.25,0.46,0.45,0.94); overflow-y:auto; box-shadow:-10px 0 40px rgba(0,0,0,0.15); }
        .mobile-menu-panel.active { right:0; }
        .mobile-close-btn { background:none; border:none; font-size:1.25rem; color:var(--dark); cursor:pointer; padding:0.5rem; border-radius:8px; transition:background 0.3s; }
        .mobile-close-btn:hover { background:var(--gray-100); }
        .mobile-nav-links { list-style:none; padding:0; margin:2rem 0; }
        .mobile-nav-links li { border-bottom:1px solid var(--gray-100); }
        .mobile-nav-links a { display:block; padding:1rem 0; color:var(--dark); font-weight:600; text-decoration:none; transition:color 0.3s; }
        .mobile-nav-links a:hover { color:var(--primary); }

        /* Page hero */
        .page-hero {
            background: var(--hero-gradient);
            padding: 8rem 0 5rem;
            position: relative;
            overflow: hidden;
        }
        .page-hero::before {
            content:''; position:absolute; top:-40%; right:-15%; width:600px; height:600px;
            background:radial-gradient(circle,rgba(13,148,136,0.25) 0%,transparent 70%);
            border-radius:50%; animation:heroPulse 8s ease-in-out infinite;
        }
        @keyframes heroPulse { 0%,100%{transform:scale(1);opacity:0.5;} 50%{transform:scale(1.12);opacity:1;} }
        .page-hero h1 {
            font-family:'Playfair Display',serif; color:var(--white); font-size:clamp(2rem,5vw,3.25rem);
            line-height:1.15; margin-bottom:1rem;
        }
        .page-hero p { color:rgba(255,255,255,0.65); font-size:1.1rem; max-width:600px; line-height:1.7; }
        .breadcrumb-custom { display:flex; gap:0.5rem; align-items:center; margin-bottom:1.5rem; }
        .breadcrumb-custom a { color:rgba(255,255,255,0.5); text-decoration:none; font-size:0.875rem; font-weight:500; transition:color 0.3s; }
        .breadcrumb-custom a:hover { color:var(--primary-light); }
        .breadcrumb-custom .separator { color:rgba(255,255,255,0.3); font-size:0.75rem; }
        .breadcrumb-custom .current { color:var(--primary-light); font-size:0.875rem; font-weight:600; }

        .section-padding { padding:5rem 0; }
        .section-tag { display:inline-flex; align-items:center; gap:0.4rem; background:var(--primary-glow); color:var(--primary); font-weight:700; font-size:0.8rem; padding:0.4rem 1rem; border-radius:99px; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:1rem; }
        .section-title { font-size:clamp(1.75rem,3.5vw,2.5rem); color:var(--dark); line-height:1.15; margin-bottom:1rem; letter-spacing:-0.5px; }
        .section-desc { color:var(--gray-500); font-size:1.05rem; line-height:1.7; }

        /* About Story */
        .about-story-img {
            border-radius:24px; width:100%; height:100%; object-fit:cover;
            box-shadow: 0 25px 60px rgba(0,0,0,0.12);
        }
        .about-story-badge {
            position:absolute; bottom:-1.5rem; right:-1rem;
            background:var(--accent); color:var(--white);
            padding:1.25rem 1.75rem; border-radius:18px;
            box-shadow:0 12px 35px rgba(249,115,22,0.35);
            text-align:center;
        }
        .about-story-badge .big { font-weight:900; font-size:2rem; line-height:1; display:block; }
        .about-story-badge .small { font-size:0.8rem; font-weight:600; opacity:0.9; }
        .about-highlight-list { list-style:none; padding:0; margin:1.5rem 0; }
        .about-highlight-list li {
            display:flex; align-items:flex-start; gap:0.85rem;
            padding:0.75rem 0; border-bottom:1px solid var(--gray-100);
            font-size:0.95rem; color:var(--gray-700);
        }
        .about-highlight-list li:last-child { border-bottom:none; }
        .about-highlight-list li i { color:var(--primary); margin-top:0.25rem; width:18px; text-align:center; flex-shrink:0; }

        /* Mission / Vision */
        .mv-card {
            background:var(--white); border:1px solid rgba(0,0,0,0.06);
            border-radius:22px; padding:2.5rem 2rem; height:100%;
            transition:all 0.4s ease; position:relative; overflow:hidden;
        }
        .mv-card::before {
            content:''; position:absolute; top:0; left:0; width:100%; height:4px;
            transition:opacity 0.3s;
        }
        .mv-card.mission::before { background:var(--primary); }
        .mv-card.vision::before { background:var(--accent); }
        .mv-card:hover { transform:translateY(-6px); box-shadow:var(--card-shadow-hover); }
        .mv-icon {
            width:64px; height:64px; border-radius:18px;
            display:flex; align-items:center; justify-content:center;
            font-size:1.5rem; margin-bottom:1.5rem;
        }
        .mv-icon.mission-icon { background:var(--primary-glow); color:var(--primary); }
        .mv-icon.vision-icon { background:rgba(249,115,22,0.12); color:var(--accent); }
        .mv-card h3 { color:var(--dark); font-size:1.35rem; margin-bottom:1rem; }
        .mv-card p { color:var(--gray-500); line-height:1.75; margin:0; }

        /* Values */
        .value-card {
            text-align:center; padding:2rem 1.5rem; border-radius:20px;
            background:var(--white); border:1px solid rgba(0,0,0,0.06);
            transition:all 0.4s ease; height:100%;
        }
        .value-card:hover { transform:translateY(-6px); box-shadow:var(--card-shadow-hover); border-color:var(--primary); }
        .value-icon {
            width:68px; height:68px; border-radius:50%;
            display:inline-flex; align-items:center; justify-content:center;
            font-size:1.5rem; margin-bottom:1.25rem; transition:transform 0.3s;
        }
        .value-card:hover .value-icon { transform:scale(1.12) rotate(-5deg); }
        .value-card h5 { color:var(--dark); font-size:1.05rem; margin-bottom:0.5rem; }
        .value-card p { color:var(--gray-500); font-size:0.88rem; line-height:1.65; margin:0; }

        /* Team */
        .team-card {
            background:var(--white); border:1px solid rgba(0,0,0,0.06);
            border-radius:22px; overflow:hidden; transition:all 0.4s ease; height:100%;
        }
        .team-card:hover { transform:translateY(-6px); box-shadow:var(--card-shadow-hover); }
        .team-img-wrap { height:260px; overflow:hidden; position:relative; background:var(--section-alt); }
        .team-img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform 0.6s ease; }
        .team-card:hover .team-img-wrap img { transform:scale(1.06); }
        .team-socials {
            position:absolute; bottom:1rem; left:50%; transform:translateX(-50%) translateY(20px);
            display:flex; gap:0.5rem; opacity:0; transition:all 0.4s ease;
        }
        .team-card:hover .team-socials { opacity:1; transform:translateX(-50%) translateY(0); }
        .team-socials a {
            width:36px; height:36px; border-radius:10px;
            background:rgba(255,255,255,0.95); color:var(--dark);
            display:flex; align-items:center; justify-content:center;
            font-size:0.85rem; text-decoration:none; transition:all 0.3s;
        }
        .team-socials a:hover { background:var(--primary); color:var(--white); }
        .team-info { padding:1.5rem; text-align:center; }
        .team-info h5 { color:var(--dark); font-size:1.05rem; margin-bottom:0.2rem; }
        .team-info .role { color:var(--primary); font-size:0.85rem; font-weight:600; }
        .team-info .bio { color:var(--gray-500); font-size:0.85rem; line-height:1.6; margin-top:0.75rem; }

        /* Timeline */
        .timeline { position:relative; padding:2rem 0; }
        .timeline::before {
            content:''; position:absolute; left:50%; top:0; bottom:0; width:3px;
            background:linear-gradient(to bottom,var(--primary),var(--accent));
            transform:translateX(-50%); border-radius:99px;
        }
        .timeline-item { position:relative; margin-bottom:3rem; }
        .timeline-item:last-child { margin-bottom:0; }
        .timeline-dot {
            position:absolute; left:50%; top:0; width:18px; height:18px;
            background:var(--white); border:3px solid var(--primary);
            border-radius:50%; transform:translateX(-50%); z-index:2;
        }
        .timeline-item:nth-child(even) .timeline-dot { border-color:var(--accent); }
        .timeline-content {
            width:44%; padding:1.5rem; background:var(--white);
            border:1px solid rgba(0,0,0,0.06); border-radius:18px;
            box-shadow:var(--card-shadow);
        }
        .timeline-item:nth-child(odd) .timeline-content { margin-right:auto; }
        .timeline-item:nth-child(even) .timeline-content { margin-left:auto; }
        .timeline-year {
            display:inline-block; background:var(--primary-glow); color:var(--primary);
            font-weight:800; font-size:0.85rem; padding:0.3rem 0.85rem;
            border-radius:99px; margin-bottom:0.5rem;
        }
        .timeline-item:nth-child(even) .timeline-year { background:rgba(249,115,22,0.12); color:var(--accent); }
        .timeline-content h5 { color:var(--dark); font-size:1.05rem; margin-bottom:0.35rem; }
        .timeline-content p { color:var(--gray-500); font-size:0.88rem; line-height:1.65; margin:0; }

        /* Partners */
        .partner-logo {
            height:56px; opacity:0.35; filter:grayscale(1);
            transition:all 0.3s ease; object-fit:contain;
        }
        .partner-logo:hover { opacity:0.8; filter:grayscale(0); }

        /* Footer (same) */
        .footer-section { background:var(--dark); color:rgba(255,255,255,0.6); padding:5rem 0 0; }
        .footer-brand { font-weight:900; font-size:1.5rem; color:var(--white); margin-bottom:1rem; }
        .footer-brand span { color:var(--primary); }
        .footer-desc { font-size:0.9rem; line-height:1.7; max-width:320px; margin-bottom:1.5rem; }
        .footer-socials { display:flex; gap:0.75rem; }
        .footer-socials a { width:40px; height:40px; border-radius:12px; background:rgba(255,255,255,0.06); display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.6); transition:all 0.3s ease; text-decoration:none; }
        .footer-socials a:hover { background:var(--primary); color:var(--white); transform:translateY(-3px); }
        .footer-heading { color:var(--white); font-weight:700; font-size:1rem; margin-bottom:1.25rem; }
        .footer-links { list-style:none; padding:0; margin:0; }
        .footer-links li { margin-bottom:0.6rem; }
        .footer-links a { color:rgba(255,255,255,0.5); text-decoration:none; font-size:0.9rem; transition:all 0.3s ease; display:inline-flex; align-items:center; gap:0.4rem; }
        .footer-links a:hover { color:var(--primary-light); transform:translateX(4px); }
        .footer-contact-item { display:flex; align-items:flex-start; gap:0.85rem; margin-bottom:1rem; font-size:0.9rem; }
        .footer-contact-item i { color:var(--primary); margin-top:0.2rem; width:18px; text-align:center; }
        .footer-bottom { border-top:1px solid rgba(255,255,255,0.08); padding:1.5rem 0; margin-top:4rem; font-size:0.85rem; }
        .footer-bottom a { color:var(--primary-light); text-decoration:none; }
        .footer-bottom a:hover { text-decoration:underline; }

        /* Reveal */
        .reveal { opacity:0; transform:translateY(40px); transition:all 0.8s cubic-bezier(0.25,0.46,0.45,0.94); }
        .reveal.visible { opacity:1; transform:translateY(0); }
        .reveal-delay-1 { transition-delay:0.1s; }
        .reveal-delay-2 { transition-delay:0.2s; }
        .reveal-delay-3 { transition-delay:0.3s; }
        .reveal-delay-4 { transition-delay:0.4s; }

        /* Toast */
        .custom-toast { position:fixed; bottom:2rem; right:2rem; background:var(--dark); color:var(--white); padding:1rem 1.5rem; border-radius:14px; font-size:0.9rem; font-weight:600; display:flex; align-items:center; gap:0.75rem; box-shadow:0 15px 50px rgba(0,0,0,0.3); z-index:9999; transform:translateY(120%); opacity:0; transition:all 0.5s cubic-bezier(0.68,-0.55,0.27,1.55); }
        .custom-toast.show { transform:translateY(0); opacity:1; }
        .custom-toast .toast-icon { width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:0.85rem; flex-shrink:0; }
        .custom-toast .toast-icon.success { background:rgba(52,211,153,0.2); color:#34D399; }
        .custom-toast .toast-icon.info { background:rgba(59,130,246,0.2); color:#60A5FA; }

        /* Back to top */
        .back-to-top { position:fixed; bottom:2rem; left:2rem; width:48px; height:48px; border-radius:14px; background:var(--primary); color:var(--white); border:none; font-size:1.1rem; display:flex; align-items:center; justify-content:center; cursor:pointer; box-shadow:0 6px 20px var(--primary-glow); z-index:999; opacity:0; transform:translateY(20px); transition:all 0.4s ease; pointer-events:none; }
        .back-to-top.visible { opacity:1; transform:translateY(0); pointer-events:all; }
        .back-to-top:hover { background:var(--primary-dark); transform:translateY(-3px); }

        @media(max-width:991.98px){
            .timeline::before { left:1.5rem; }
            .timeline-dot { left:1.5rem; }
            .timeline-content { width:calc(100% - 4rem); margin-left:3.5rem!important; margin-right:0!important; }
        }
        @media(max-width:767.98px){
            .section-padding { padding:3.5rem 0; }
            .page-hero { padding:7rem 0 3.5rem; }
            .about-story-badge { bottom:-1rem; right:0.5rem; }
        }
        @media(prefers-reduced-motion:reduce){
            *,*::before,*::after { animation-duration:0.01ms!important; transition-duration:0.01ms!important; }
            .reveal { opacity:1; transform:none; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <x-navbar />

    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="container">
            <div class="breadcrumb-custom">
                <a href="#">Home</a>
                <span class="separator"><i class="fas fa-chevron-right"></i></span>
                <span class="current">About Us</span>
            </div>
            <h1>Our Story, Your Health</h1>
            <p>We started with a simple belief: everyone deserves fast, transparent access to quality healthcare — no matter where they live.</p>
        </div>
    </section>

    <!-- ABOUT STORY -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 reveal">
                    <div class="position-relative" style="z-index:2;">
                        <img src="https://picsum.photos/seed/about-office/640/500.jpg" alt="MediCare office" class="about-story-img">
                        <div class="about-story-badge">
                            <span class="big">8+</span>
                            <span class="small">Years of Impact</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 reveal reveal-delay-2">
                    <div class="section-tag"><i class="fas fa-building"></i> Who We Are</div>
                    <h2 class="section-title">Built by Doctors,<br>Designed for Patients</h2>
                    <p class="section-desc">MediCare was founded in 2017 by a team of physicians and engineers who experienced firsthand how broken the appointment booking process was — for both doctors and patients.</p>
                    <ul class="about-highlight-list">
                        <li><i class="fas fa-check-circle"></i> Founded by practicing physicians from Johns Hopkins and Mayo Clinic</li>
                        <li><i class="fas fa-check-circle"></i> Backed by $42M in funding from leading healthcare investors</li>
                        <li><i class="fas fa-check-circle"></i> Operational in 28 cities across the United States</li>
                        <li><i class="fas fa-check-circle"></i> HIPAA-certified and SOC 2 Type II compliant platform</li>
                        <li><i class="fas fa-check-circle"></i> Partnered with 200+ hospital systems and clinics</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION & VISION -->
    <section class="section-padding" style="background:var(--section-alt);">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-tag"><i class="fas fa-compass"></i> Purpose</div>
                <h2 class="section-title">What Drives Us Forward</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 reveal reveal-delay-1">
                    <div class="mv-card mission">
                        <div class="mv-icon mission-icon"><i class="fas fa-bullseye"></i></div>
                        <h3>Our Mission</h3>
                        <p>To eliminate barriers between patients and quality healthcare by building the most intuitive, trustworthy, and technology-driven appointment platform — making every second count when it matters most.</p>
                    </div>
                </div>
                <div class="col-md-6 reveal reveal-delay-2">
                    <div class="mv-card vision">
                        <div class="mv-icon vision-icon"><i class="fas fa-eye"></i></div>
                        <h3>Our Vision</h3>
                        <p>A world where no one waits weeks for a doctor's appointment, where healthcare decisions are powered by data, and where every patient feels informed, empowered, and cared for from the very first click.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CORE VALUES -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-tag"><i class="fas fa-gem"></i> Values</div>
                <h2 class="section-title">The Principles We Live By</h2>
                <p class="section-desc mx-auto">Every decision we make is filtered through these core values that define who we are.</p>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-3 reveal reveal-delay-1">
                    <div class="value-card">
                        <div class="value-icon" style="background:rgba(13,148,136,0.1); color:var(--primary);"><i class="fas fa-heart-pulse"></i></div>
                        <h5>Patient First</h5>
                        <p>Every feature, every design choice starts with one question: does this help the patient?</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal reveal-delay-2">
                    <div class="value-card">
                        <div class="value-icon" style="background:rgba(249,115,22,0.1); color:var(--accent);"><i class="fas fa-shield-halved"></i></div>
                        <h5>Trust & Safety</h5>
                        <p>We verify every doctor, encrypt every record, and never compromise on data privacy.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal reveal-delay-3">
                    <div class="value-card">
                        <div class="value-icon" style="background:rgba(59,130,246,0.1); color:#3B82F6;"><i class="fas fa-lightbulb"></i></div>
                        <h5>Relentless Innovation</h5>
                        <p>We challenge the status quo. If it can be faster, simpler, or smarter — we build it.</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 reveal reveal-delay-4">
                    <div class="value-card">
                        <div class="value-icon" style="background:rgba(139,92,246,0.1); color:#8B5CF6;"><i class="fas fa-handshake-angle"></i></div>
                        <h5>Inclusive Access</h5>
                        <p>Healthcare is a right. We design for all abilities, languages, and socioeconomic backgrounds.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TEAM -->
    <section class="section-padding" style="background:var(--section-alt);">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-tag"><i class="fas fa-users"></i> Leadership</div>
                <h2 class="section-title">Meet the People Behind MediCare</h2>
                <p class="section-desc mx-auto">A diverse team of doctors, engineers, designers, and healthcare strategists united by one purpose.</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3 reveal reveal-delay-1">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://picsum.photos/seed/team-ceo/400/520.jpg" alt="Dr. Richard Hayes">
                            <div class="team-socials">
                                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Dr. Richard Hayes</h5>
                            <div class="role">Co-Founder & CEO</div>
                            <p class="bio">Former Chief of Medicine at Cleveland Clinic. 20+ years in clinical practice and health tech.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 reveal reveal-delay-2">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://picsum.photos/seed/team-cto/400/520.jpg" alt="Priya Sharma">
                            <div class="team-socials">
                                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Priya Sharma</h5>
                            <div class="role">Co-Founder & CTO</div>
                            <p class="bio">Ex-Google engineer. Built healthcare systems serving 10M+ users at scale.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 reveal reveal-delay-3">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://picsum.photos/seed/team-cmo/400/520.jpg" alt="Lisa Chen">
                            <div class="team-socials">
                                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Lisa Chen</h5>
                            <div class="role">Chief Medical Officer</div>
                            <p class="bio">Board-certified internist. Led digital health initiatives at Kaiser Permanente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 reveal reveal-delay-4">
                    <div class="team-card">
                        <div class="team-img-wrap">
                            <img src="https://picsum.photos/seed/team-design/400/520.jpg" alt="Marcus Johnson">
                            <div class="team-socials">
                                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                            </div>
                        </div>
                        <div class="team-info">
                            <h5>Marcus Johnson</h5>
                            <div class="role">VP of Design</div>
                            <p class="bio">Former design lead at Airbnb. Passionate about accessible, human-centered healthcare UX.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TIMELINE -->
    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-tag"><i class="fas fa-timeline"></i> Journey</div>
                <h2 class="section-title">Our Milestones</h2>
            </div>
            <div class="timeline reveal">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2017</div>
                        <h5>The Spark</h5>
                        <p>Three physicians and two engineers meet at a health hackathon and prototype the first version of MediCare in 48 hours.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2018</div>
                        <h5>Seed Funding & Launch</h5>
                        <p>Raised $5M seed round. Launched in New York City with 50 verified doctors and 1,000 patient sign-ups in the first month.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h5>Telehealth Pivot</h5>
                        <p>Fast-tracked video consultation feature in response to COVID-19. Grew from 10K to 200K monthly appointments in 6 months.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2022</div>
                        <h5>Series B & National Expansion</h5>
                        <p>Closed $30M Series B. Expanded to 28 cities. Partnered with 200+ hospital systems and crossed 50K doctors on the platform.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <div class="timeline-year">2025</div>
                        <h5>AI-Powered Matching</h5>
                        <p>Launched AI symptom analyzer and smart doctor-patient matching. Crossed 120K appointments and 50K patient reviews.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PARTNERS -->
    <section class="section-padding" style="background:var(--section-alt);">
        <div class="container">
            <div class="text-center mb-5 reveal">
                <div class="section-tag"><i class="fas fa-handshake"></i> Partners</div>
                <h2 class="section-title">Trusted by Leading Institutions</h2>
            </div>
            <div class="row align-items-center justify-content-center g-4 reveal">
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner1/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner2/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner3/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner4/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner5/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="https://picsum.photos/seed/partner6/200/80.jpg" alt="Partner" class="partner-logo">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-4">
                    <div class="footer-brand">Medi<span>Care</span></div>
                    <p class="footer-desc">Transforming healthcare access through technology. Book appointments, consult doctors online, and manage your health — all in one place.</p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">Quick Links</div>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Find Doctors</a></li>
                        <li><a href="#">Specialties</a></li>
                        <li><a href="#">Teleconsult</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">For Patients</div>
                    <ul class="footer-links">
                        <li><a href="#">My Appointments</a></li>
                        <li><a href="#">Medical Records</a></li>
                        <li><a href="#">Prescriptions</a></li>
                        <li><a href="#">Health Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="footer-heading">Contact Us</div>
                    <div class="footer-contact-item"><i class="fas fa-location-dot"></i><span>123 Healthcare Blvd, Suite 400,<br>New York, NY 10001</span></div>
                    <div class="footer-contact-item"><i class="fas fa-envelope"></i><span>support@medicare.com</span></div>
                    <div class="footer-contact-item"><i class="fas fa-phone"></i><span>+1 (800) 123-4567</span></div>
                    <div class="footer-contact-item"><i class="fas fa-clock"></i><span>Mon — Sat: 8:00 AM — 10:00 PM</span></div>
                </div>
            </div>
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <span>2025 MediCare. All rights reserved.</span>
                <span><a href="#">Privacy Policy</a> &middot; <a href="#">Terms of Service</a> &middot; <a href="#">HIPAA Compliance</a></span>
            </div>
        </div>
    </footer>

    <button class="back-to-top" id="backToTop" aria-label="Back to top"><i class="fas fa-arrow-up"></i></button>
    <div class="custom-toast" id="customToast">
        <div class="toast-icon success"><i class="fas fa-check"></i></div>
        <span id="toastMessage">Action completed!</span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showToast(m,t='success'){const e=document.getElementById('customToast'),s=document.getElementById('toastMessage'),i=e.querySelector('.toast-icon');s.textContent=m;i.className='toast-icon '+t;i.innerHTML=t==='success'?'<i class="fas fa-check"></i>':'<i class="fas fa-info"></i>';e.classList.add('show');clearTimeout(e._t);e._t=setTimeout(()=>e.classList.remove('show'),3500);}
        const mainNav=document.getElementById('mainNav');
        window.addEventListener('scroll',()=>{mainNav.classList.toggle('scrolled',window.scrollY>50);});
        const btt=document.getElementById('backToTop');
        window.addEventListener('scroll',()=>{btt.classList.toggle('visible',window.scrollY>600);});
        btt.addEventListener('click',()=>{window.scrollTo({top:0,behavior:'smooth'});});
        const mo=document.getElementById('mobileOverlay'),mp=document.getElementById('mobilePanel');
        function openM(){mo.classList.add('active');mp.classList.add('active');document.body.style.overflow='hidden';}
        function closeM(){mo.classList.remove('active');mp.classList.remove('active');document.body.style.overflow='';}
        document.getElementById('mobileMenuBtn').addEventListener('click',openM);
        document.getElementById('mobileCloseBtn').addEventListener('click',closeM);
        mo.addEventListener('click',closeM);
        mp.querySelectorAll('a').forEach(l=>l.addEventListener('click',closeM));
        document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',function(e){const t=document.querySelector(this.getAttribute('href'));if(t){e.preventDefault();window.scrollTo({top:t.getBoundingClientRect().top+window.scrollY-mainNav.offsetHeight-20,behavior:'smooth'});}});});
        const ro=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible');});},{threshold:0.12,rootMargin:'0px 0px -40px 0px'});
        document.querySelectorAll('.reveal').forEach(e=>ro.observe(e));
    </script>
</body>
</html>