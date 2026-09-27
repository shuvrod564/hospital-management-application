<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:#0D9488;--primary-dark:#0F766E;--primary-light:#99F6E4;--primary-glow:rgba(13,148,136,0.25);
            --accent:#F97316;--accent-light:#FED7AA;
            --dark:#0F172A;--dark-soft:#1E293B;--gray-900:#111827;--gray-700:#374151;
            --gray-500:#6B7280;--gray-300:#D1D5DB;--gray-100:#F3F4F6;--white:#FFFFFF;
            --card-shadow:0 1px 3px rgba(0,0,0,0.06),0 8px 24px rgba(0,0,0,0.06);
            --card-shadow-hover:0 4px 12px rgba(0,0,0,0.08),0 20px 48px rgba(0,0,0,0.1);
            --hero-gradient:linear-gradient(135deg,#0F172A 0%,#134E4A 50%,#0D9488 100%);
            --section-alt:#F8FAFB;
        }
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Plus Jakarta Sans',sans-serif;color:var(--gray-700);overflow-x:hidden;-webkit-font-smoothing:antialiased;}
        h1,h2,h3,h4,h5,h6{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;}
        ::-webkit-scrollbar{width:8px;}::-webkit-scrollbar-track{background:var(--gray-100);}::-webkit-scrollbar-thumb{background:var(--primary);border-radius:99px;}

        .navbar-custom{background:rgba(255,255,255,0.85);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid rgba(0,0,0,0.05);padding:.75rem 0;transition:all .4s ease;z-index:1050;}
        .navbar-custom.scrolled{background:rgba(255,255,255,0.95);box-shadow:0 1px 20px rgba(0,0,0,0.08);padding:.5rem 0;}
        .navbar-brand-text{font-weight:900;font-size:1.5rem;color:var(--dark)!important;letter-spacing:-.5px;}
        .navbar-brand-text span{color:var(--primary);}
        .nav-link-custom{color:var(--gray-700)!important;font-weight:600;font-size:.9rem;padding:.5rem 1rem!important;border-radius:8px;transition:all .3s ease;}
        .nav-link-custom:hover{color:var(--primary)!important;background:var(--primary-glow);}
        .btn-nav-cta{background:var(--primary);color:var(--white)!important;font-weight:700;font-size:.875rem;padding:.6rem 1.5rem;border-radius:12px;border:none;transition:all .3s ease;box-shadow:0 4px 15px var(--primary-glow);}
        .btn-nav-cta:hover{background:var(--primary-dark);color:var(--white)!important;transform:translateY(-2px);box-shadow:0 8px 25px var(--primary-glow);}

        .mobile-menu-overlay{position:fixed;inset:0;background:rgba(15,23,42,0.6);backdrop-filter:blur(5px);z-index:9998;opacity:0;visibility:hidden;transition:all .3s ease;}
        .mobile-menu-overlay.active{opacity:1;visibility:visible;}
        .mobile-menu-panel{position:fixed;top:0;right:-320px;width:300px;max-width:85vw;height:100%;background:var(--white);z-index:9999;padding:2rem;transition:right .4s cubic-bezier(.25,.46,.45,.94);overflow-y:auto;box-shadow:-10px 0 40px rgba(0,0,0,0.15);}
        .mobile-menu-panel.active{right:0;}
        .mobile-close-btn{background:none;border:none;font-size:1.25rem;color:var(--dark);cursor:pointer;padding:.5rem;border-radius:8px;transition:background .3s;}
        .mobile-close-btn:hover{background:var(--gray-100);}
        .mobile-nav-links{list-style:none;padding:0;margin:2rem 0;}
        .mobile-nav-links li{border-bottom:1px solid var(--gray-100);}
        .mobile-nav-links a{display:block;padding:1rem 0;color:var(--dark);font-weight:600;text-decoration:none;transition:color .3s;}
        .mobile-nav-links a:hover{color:var(--primary);}

        .page-hero{background:var(--hero-gradient);padding:8rem 0 5rem;position:relative;overflow:hidden;}
        .page-hero::before{content:'';position:absolute;top:-40%;right:-15%;width:600px;height:600px;background:radial-gradient(circle,rgba(13,148,136,0.25) 0%,transparent 70%);border-radius:50%;animation:hp 8s ease-in-out infinite;}
        @keyframes hp{0%,100%{transform:scale(1);opacity:.5;}50%{transform:scale(1.12);opacity:1;}}
        .page-hero h1{font-family:'Playfair Display',serif;color:var(--white);font-size:clamp(2rem,5vw,3.25rem);line-height:1.15;margin-bottom:1rem;}
        .page-hero p{color:rgba(255,255,255,0.65);font-size:1.1rem;max-width:600px;line-height:1.7;}
        .breadcrumb-custom{display:flex;gap:.5rem;align-items:center;margin-bottom:1.5rem;}
        .breadcrumb-custom a{color:rgba(255,255,255,0.5);text-decoration:none;font-size:.875rem;font-weight:500;transition:color .3s;}
        .breadcrumb-custom a:hover{color:var(--primary-light);}
        .breadcrumb-custom .separator{color:rgba(255,255,255,0.3);font-size:.75rem;}
        .breadcrumb-custom .current{color:var(--primary-light);font-size:.875rem;font-weight:600;}

        .section-padding{padding:5rem 0;}
        .section-tag{display:inline-flex;align-items:center;gap:.4rem;background:var(--primary-glow);color:var(--primary);font-weight:700;font-size:.8rem;padding:.4rem 1rem;border-radius:99px;text-transform:uppercase;letter-spacing:.5px;margin-bottom:1rem;}
        .section-title{font-size:clamp(1.75rem,3.5vw,2.5rem);color:var(--dark);line-height:1.15;margin-bottom:1rem;letter-spacing:-.5px;}
        .section-desc{color:var(--gray-500);font-size:1.05rem;line-height:1.7;}

        /* Contact info cards */
        .contact-info-card{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:20px;
            padding:2rem;text-align:center;transition:all .4s ease;height:100%;
        }
        .contact-info-card:hover{transform:translateY(-6px);box-shadow:var(--card-shadow-hover);border-color:var(--primary);}
        .contact-info-icon{
            width:64px;height:64px;border-radius:18px;display:inline-flex;align-items:center;
            justify-content:center;font-size:1.4rem;margin-bottom:1.25rem;transition:transform .3s;
        }
        .contact-info-card:hover .contact-info-icon{transform:scale(1.1) rotate(-5deg);}
        .contact-info-card h5{color:var(--dark);font-size:1.05rem;margin-bottom:.4rem;}
        .contact-info-card p{color:var(--gray-500);font-size:.9rem;margin:0;line-height:1.6;}
        .contact-info-card a{color:var(--primary);text-decoration:none;font-weight:600;transition:color .3s;}
        .contact-info-card a:hover{color:var(--primary-dark);}

        /* Contact form */
        .contact-form-wrap{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:24px;
            padding:2.5rem;box-shadow:var(--card-shadow);
        }
        .form-group{margin-bottom:1.25rem;}
        .form-group label{display:block;font-weight:700;font-size:.85rem;color:var(--dark);margin-bottom:.4rem;}
        .form-group label .req{color:#EF4444;}
        .form-input{
            width:100%;padding:.8rem 1rem;border:2px solid var(--gray-300);border-radius:14px;
            font-family:inherit;font-size:.9rem;color:var(--dark);background:var(--white);
            transition:all .3s ease;-webkit-appearance:none;
        }
        .form-input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px var(--primary-glow);}
        .form-input.error{border-color:#EF4444;box-shadow:0 0 0 4px rgba(239,68,68,0.12);}
        .form-input::placeholder{color:var(--gray-500);}
        textarea.form-input{resize:vertical;min-height:140px;}
        select.form-input{
            cursor:pointer;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right 1rem center;
        }
        .form-error{color:#EF4444;font-size:.78rem;font-weight:600;margin-top:.35rem;display:none;}
        .form-error.show{display:block;}
        .btn-submit{
            background:var(--primary);color:var(--white);font-weight:700;font-size:1rem;
            padding:1rem 2.5rem;border-radius:14px;border:none;transition:all .3s ease;
            box-shadow:0 6px 20px var(--primary-glow);display:inline-flex;align-items:center;gap:.5rem;
            width:100%;justify-content:center;
        }
        .btn-submit:hover{background:var(--primary-dark);transform:translateY(-2px);box-shadow:0 10px 30px var(--primary-glow);}
        .btn-submit:disabled{opacity:.6;cursor:not-allowed;transform:none!important;}
        .btn-submit .spinner{display:none;width:20px;height:20px;border:2.5px solid rgba(255,255,255,0.3);border-top-color:var(--white);border-radius:50%;animation:spin .7s linear infinite;}
        .btn-submit.loading .spinner{display:block;}
        .btn-submit.loading .btn-text{display:none;}
        @keyframes spin{to{transform:rotate(360deg);}}
        .form-success{
            display:none;text-align:center;padding:2rem 0;
        }
        .form-success.show{display:block;}
        .form-success .check-circle{
            width:80px;height:80px;border-radius:50%;background:rgba(52,211,153,0.12);
            display:inline-flex;align-items:center;justify-content:center;
            font-size:2rem;color:#34D399;margin-bottom:1rem;
            animation:popIn .5s cubic-bezier(.68,-.55,.27,1.55);
        }
        @keyframes popIn{from{transform:scale(0);}to{transform:scale(1);}}
        .form-success h4{color:var(--dark);margin-bottom:.5rem;}
        .form-success p{color:var(--gray-500);font-size:.95rem;}
        .btn-reset{
            background:none;border:2px solid var(--gray-300);color:var(--dark);font-weight:700;
            font-size:.9rem;padding:.7rem 1.75rem;border-radius:12px;cursor:pointer;
            transition:all .3s;margin-top:1rem;display:inline-flex;align-items:center;gap:.4rem;
        }
        .btn-reset:hover{border-color:var(--primary);color:var(--primary);}

        /* Map */
        .map-wrap{
            border-radius:24px;overflow:hidden;height:100%;min-height:400px;
            box-shadow:var(--card-shadow);border:1px solid rgba(0,0,0,0.06);position:relative;
        }
        .map-placeholder{
            width:100%;height:100%;min-height:400px;
            background:linear-gradient(135deg,var(--section-alt) 0%,#E0F2FE 100%);
            display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1rem;
        }
        .map-placeholder i{font-size:3rem;color:var(--primary);opacity:.4;}
        .map-placeholder p{color:var(--gray-500);font-size:.95rem;font-weight:500;}
        .map-pin-badge{
            position:absolute;top:1.5rem;left:1.5rem;background:rgba(255,255,255,0.95);
            backdrop-filter:blur(8px);padding:.75rem 1.25rem;border-radius:14px;
            box-shadow:0 4px 20px rgba(0,0,0,0.1);display:flex;align-items:center;gap:.75rem;
        }
        .map-pin-badge i{color:var(--accent);font-size:1.1rem;}
        .map-pin-badge .pin-label{font-weight:700;color:var(--dark);font-size:.9rem;}
        .map-pin-badge .pin-addr{font-size:.78rem;color:var(--gray-500);}

        /* FAQ */
        .faq-item{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:16px;
            margin-bottom:.75rem;overflow:hidden;transition:all .3s;
        }
        .faq-item:hover{border-color:rgba(13,148,136,0.2);}
        .faq-question{
            width:100%;background:none;border:none;padding:1.25rem 1.5rem;
            display:flex;align-items:center;justify-content:space-between;gap:1rem;
            cursor:pointer;font-family:inherit;font-weight:700;font-size:.95rem;color:var(--dark);
            text-align:left;transition:color .3s;
        }
        .faq-question:hover{color:var(--primary);}
        .faq-question .faq-icon{
            width:32px;height:32px;border-radius:10px;background:var(--section-alt);
            display:flex;align-items:center;justify-content:center;font-size:.75rem;
            color:var(--gray-500);transition:all .3s;flex-shrink:0;
        }
        .faq-item.open .faq-question .faq-icon{background:var(--primary-glow);color:var(--primary);transform:rotate(180deg);}
        .faq-answer{
            max-height:0;overflow:hidden;transition:max-height .4s ease,padding .3s ease;
        }
        .faq-answer-inner{
            padding:0 1.5rem 1.25rem;color:var(--gray-500);font-size:.9rem;line-height:1.75;
        }
        .faq-item.open .faq-answer{max-height:300px;}

        /* Emergency banner */
        .emergency-banner{
            background:linear-gradient(135deg,#FEF2F2 0%,#FEE2E2 100%);
            border:1px solid rgba(239,68,68,0.15);border-radius:20px;padding:2rem 2.5rem;
            display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;
        }
        .emergency-icon{
            width:56px;height:56px;border-radius:16px;background:rgba(239,68,68,0.12);
            display:flex;align-items:center;justify-content:center;font-size:1.4rem;color:#EF4444;
            flex-shrink:0;animation:emPulse 2s ease-in-out infinite;
        }
        @keyframes emPulse{0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,0.2);}50%{box-shadow:0 0 0 12px rgba(239,68,68,0);}}
        .emergency-banner h5{color:#991B1B;font-size:1.1rem;margin-bottom:.25rem;}
        .emergency-banner p{color:#B91C1C;font-size:.9rem;margin:0;opacity:.8;}
        .emergency-phone{
            margin-left:auto;font-weight:900;font-size:1.25rem;color:#DC2626;
            text-decoration:none;display:flex;align-items:center;gap:.5rem;transition:all .3s;white-space:nowrap;
        }
        .emergency-phone:hover{color:#991B1B;transform:scale(1.05);}

        /* Footer */
        .footer-section{background:var(--dark);color:rgba(255,255,255,0.6);padding:5rem 0 0;}
        .footer-brand{font-weight:900;font-size:1.5rem;color:var(--white);margin-bottom:1rem;}
        .footer-brand span{color:var(--primary);}
        .footer-desc{font-size:.9rem;line-height:1.7;max-width:320px;margin-bottom:1.5rem;}
        .footer-socials{display:flex;gap:.75rem;}
        .footer-socials a{width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);transition:all .3s ease;text-decoration:none;}
        .footer-socials a:hover{background:var(--primary);color:var(--white);transform:translateY(-3px);}
        .footer-heading{color:var(--white);font-weight:700;font-size:1rem;margin-bottom:1.25rem;}
        .footer-links{list-style:none;padding:0;margin:0;}
        .footer-links li{margin-bottom:.6rem;}
        .footer-links a{color:rgba(255,255,255,0.5);text-decoration:none;font-size:.9rem;transition:all .3s ease;display:inline-flex;align-items:center;gap:.4rem;}
        .footer-links a:hover{color:var(--primary-light);transform:translateX(4px);}
        .footer-contact-item{display:flex;align-items:flex-start;gap:.85rem;margin-bottom:1rem;font-size:.9rem;}
        .footer-contact-item i{color:var(--primary);margin-top:.2rem;width:18px;text-align:center;}
        .footer-bottom{border-top:1px solid rgba(255,255,255,0.08);padding:1.5rem 0;margin-top:4rem;font-size:.85rem;}
        .footer-bottom a{color:var(--primary-light);text-decoration:none;}
        .footer-bottom a:hover{text-decoration:underline;}

        .reveal{opacity:0;transform:translateY(40px);transition:all .8s cubic-bezier(.25,.46,.45,.94);}
        .reveal.visible{opacity:1;transform:translateY(0);}
        .reveal-delay-1{transition-delay:.1s;}.reveal-delay-2{transition-delay:.2s;}.reveal-delay-3{transition-delay:.3s;}.reveal-delay-4{transition-delay:.4s;}

        .custom-toast{position:fixed;bottom:2rem;right:2rem;background:var(--dark);color:var(--white);padding:1rem 1.5rem;border-radius:14px;font-size:.9rem;font-weight:600;display:flex;align-items:center;gap:.75rem;box-shadow:0 15px 50px rgba(0,0,0,0.3);z-index:9999;transform:translateY(120%);opacity:0;transition:all .5s cubic-bezier(.68,-.55,.27,1.55);}
        .custom-toast.show{transform:translateY(0);opacity:1;}
        .custom-toast .toast-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:.85rem;flex-shrink:0;}
        .custom-toast .toast-icon.success{background:rgba(52,211,153,0.2);color:#34D399;}
        .custom-toast .toast-icon.info{background:rgba(59,130,246,0.2);color:#60A5FA;}

        .back-to-top{position:fixed;bottom:2rem;left:2rem;width:48px;height:48px;border-radius:14px;background:var(--primary);color:var(--white);border:none;font-size:1.1rem;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 6px 20px var(--primary-glow);z-index:999;opacity:0;transform:translateY(20px);transition:all .4s ease;pointer-events:none;}
        .back-to-top.visible{opacity:1;transform:translateY(0);pointer-events:all;}
        .back-to-top:hover{background:var(--primary-dark);transform:translateY(-3px);}

        @media(max-width:767.98px){
            .section-padding{padding:3.5rem 0;}
            .page-hero{padding:7rem 0 3.5rem;}
            .contact-form-wrap{padding:1.5rem;}
            .emergency-banner{flex-direction:column;text-align:center;padding:1.5rem;}
            .emergency-phone{margin-left:0;margin-top:.5rem;}
            .map-wrap{min-height:300px;}
            .map-placeholder{min-height:300px;}
        }
        @media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:.01ms!important;transition-duration:.01ms!important;}.reveal{opacity:1;transform:none;}}
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand navbar-brand-text" href="#">Medi<span>Care</span></a>
            <div class="d-none d-lg-flex align-items-center gap-1 ms-auto">
                <a href="#" class="nav-link nav-link-custom">Features</a>
                <a href="#" class="nav-link nav-link-custom">How It Works</a>
                <a href="#" class="nav-link nav-link-custom">Specialties</a>
                <a href="#" class="nav-link nav-link-custom">Doctors</a>
                <a href="#" class="nav-link nav-link-custom">Reviews</a>
            </div>
            <div class="d-none d-lg-flex align-items-center gap-2 ms-3">
                <a href="#" class="nav-link nav-link-custom">Sign In</a>
                <a href="#" class="btn btn-nav-cta">Book Appointment</a>
            </div>
            <button class="d-lg-none border-0 bg-transparent fs-5" id="mobileMenuBtn" aria-label="Open menu"><i class="fas fa-bars" style="color:var(--dark);"></i></button>
        </div>
    </nav>
    <div class="mobile-menu-overlay" id="mobileOverlay"></div>
    <div class="mobile-menu-panel" id="mobilePanel">
        <div class="d-flex justify-content-between align-items-center">
            <span class="navbar-brand-text" style="font-size:1.25rem;">Medi<span>Care</span></span>
            <button class="mobile-close-btn" id="mobileCloseBtn" aria-label="Close menu"><i class="fas fa-xmark"></i></button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="#">Features</a></li><li><a href="#">How It Works</a></li><li><a href="#">Specialties</a></li><li><a href="#">Doctors</a></li><li><a href="#">Reviews</a></li><li><a href="#">Sign In</a></li>
        </ul>
        <a href="#" class="btn btn-nav-cta w-100 text-center">Book Appointment</a>
    </div>

    <!-- HERO -->
    <section class="page-hero">
        <div class="container">
            <div class="breadcrumb-custom">
                <a href="#">Home</a><span class="separator"><i class="fas fa-chevron-right"></i></span><span class="current">Contact Us</span>
            </div>
            <h1>Get in Touch With Us</h1>
            <p>Have a question, feedback, or need assistance? Our support team is here to help you 24/7.</p>
        </div>
    </section>

    <!-- EMERGENCY -->
    <section style="padding:2rem 0 0;">
        <div class="container">
            <div class="emergency-banner reveal">
                <div class="emergency-icon"><i class="fas fa-phone-volume"></i></div>
                <div>
                    <h5>Medical Emergency?</h5>
                    <p>If you're experiencing a life-threatening emergency, please call 911 immediately.</p>
                </div>
                <a href="tel:911" class="emergency-phone"><i class="fas fa-phone"></i> 911</a>
            </div>
        </div>
    </section>

    <!-- CONTACT INFO CARDS -->
    <section class="section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 reveal reveal-delay-1">
                    <div class="contact-info-card">
                        <div class="contact-info-icon" style="background:rgba(13,148,136,0.1);color:var(--primary);"><i class="fas fa-phone"></i></div>
                        <h5>Call Us</h5>
                        <p><a href="tel:+18001234567">+1 (800) 123-4567</a><br><a href="tel:+18009876543">+1 (800) 987-6543</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 reveal reveal-delay-2">
                    <div class="contact-info-card">
                        <div class="contact-info-icon" style="background:rgba(249,115,22,0.1);color:var(--accent);"><i class="fas fa-envelope"></i></div>
                        <h5>Email Us</h5>
                        <p><a href="mailto:support@medicare.com">support@medicare.com</a><br><a href="mailto:help@medicare.com">help@medicare.com</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 reveal reveal-delay-3">
                    <div class="contact-info-card">
                        <div class="contact-info-icon" style="background:rgba(59,130,246,0.1);color:#3B82F6;"><i class="fas fa-location-dot"></i></div>
                        <h5>Visit Us</h5>
                        <p>123 Healthcare Blvd,<br>Suite 400, New York, NY 10001</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 reveal reveal-delay-4">
                    <div class="contact-info-card">
                        <div class="contact-info-icon" style="background:rgba(139,92,246,0.1);color:#8B5CF6;"><i class="fas fa-clock"></i></div>
                        <h5>Working Hours</h5>
                        <p>Mon — Sat: 8 AM — 10 PM<br>Sunday: 9 AM — 6 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FORM + MAP -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7 reveal">
                    <div class="section-tag"><i class="fas fa-paper-plane"></i> Send a Message</div>
                    <h2 class="section-title">We'd Love to Hear From You</h2>
                    <p class="section-desc mb-4">Fill out the form below and our team will get back to you within 24 hours.</p>

                    <div class="contact-form-wrap" id="contactFormWrap">
                        <form id="contactForm" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name <span class="req">*</span></label>
                                        <input type="text" class="form-input" id="formName" placeholder="John Doe">
                                        <div class="form-error" id="errorName">Please enter your full name</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address <span class="req">*</span></label>
                                        <input type="email" class="form-input" id="formEmail" placeholder="john@example.com">
                                        <div class="form-error" id="errorEmail">Please enter a valid email address</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-input" id="formPhone" placeholder="+1 (555) 000-0000">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Subject <span class="req">*</span></label>
                                        <select class="form-input" id="formSubject">
                                            <option value="">Select a subject</option>
                                            <option value="appointment">Appointment Issue</option>
                                            <option value="billing">Billing Question</option>
                                            <option value="technical">Technical Support</option>
                                            <option value="doctor">Doctor Feedback</option>
                                            <option value="partnership">Partnership Inquiry</option>
                                            <option value="other">Other</option>
                                        </select>
                                        <div class="form-error" id="errorSubject">Please select a subject</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Message <span class="req">*</span></label>
                                        <textarea class="form-input" id="formMessage" placeholder="Tell us how we can help you..." rows="5"></textarea>
                                        <div class="form-error" id="errorMessage">Please enter your message (min 10 characters)</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-submit" id="btnSubmit">
                                        <span class="btn-text"><i class="fas fa-paper-plane"></i> Send Message</span>
                                        <span class="spinner"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-success" id="formSuccess">
                            <div class="check-circle"><i class="fas fa-check"></i></div>
                            <h4>Message Sent Successfully!</h4>
                            <p>Thank you for reaching out. Our team will review your message and respond within 24 hours.</p>
                            <button class="btn-reset" id="btnReset"><i class="fas fa-rotate-left"></i> Send Another Message</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 reveal reveal-delay-2">
                    <div class="map-wrap">
                        <div class="map-placeholder">
                            <i class="fas fa-map-location-dot"></i>
                            <p>Interactive map loads here</p>
                            <p style="font-size:.8rem;opacity:.6;">(Replace with Google Maps embed in production)</p>
                        </div>
                        <div class="map-pin-badge">
                            <i class="fas fa-location-dot"></i>
                            <div>
                                <div class="pin-label">MediCare HQ</div>
                                <div class="pin-addr">123 Healthcare Blvd, NY 10001</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="section-padding" style="background:var(--section-alt);">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 reveal">
                    <div class="section-tag"><i class="fas fa-circle-question"></i> FAQ</div>
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-desc">Find quick answers to the most common questions about our platform and services.</p>
                    <p class="section-desc" style="margin-top:1rem;">Can't find what you're looking for? <a href="#" style="color:var(--primary);font-weight:700;">Contact our support team</a>.</p>
                </div>
                <div class="col-lg-8 reveal reveal-delay-1">
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            How do I book an appointment?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">Simply search for a doctor by name or specialty, select a convenient time slot from their real-time calendar, and confirm your booking. You'll receive an instant confirmation via SMS and email with all the details.</div></div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            Can I cancel or reschedule my appointment?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">Yes, you can cancel or reschedule up to 2 hours before your appointment at no charge. Go to "My Appointments" in your dashboard and click the reschedule or cancel button. Refunds are processed within 5-7 business days.</div></div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            Is my personal health data secure?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">Absolutely. MediCare is fully HIPAA-compliant and SOC 2 Type II certified. All data is encrypted with AES-256 at rest and TLS 1.3 in transit. We never share your data with third parties without explicit consent.</div></div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            How does video consultation work?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">Look for the "Video" badge on a doctor's profile. Book a video slot, and at the scheduled time, click "Join Call" from your dashboard. No app download needed — it works directly in your browser on any device. Prescriptions are shared digitally after the call.</div></div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            What payment methods do you accept?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">We accept all major credit/debit cards (Visa, Mastercard, Amex), Apple Pay, Google Pay, PayPal, and select insurance plans. You can also pay at the clinic in some cases. All online payments are processed through Stripe with PCI-DSS compliance.</div></div>
                    </div>
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false">
                            How can I become a MediCare partner doctor?
                            <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                        </button>
                        <div class="faq-answer"><div class="faq-answer-inner">If you're a licensed physician interested in joining our platform, visit our "For Doctors" page or email <strong>doctors@medicare.com</strong>. Our onboarding team will verify your credentials and get you set up within 48 hours.</div></div>
                    </div>
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
                    <ul class="footer-links"><li><a href="#">Home</a></li><li><a href="#">Find Doctors</a></li><li><a href="#">Specialties</a></li><li><a href="#">Teleconsult</a></li><li><a href="#">Pricing</a></li></ul>
                </div>
                <div class="col-6 col-lg-2">
                    <div class="footer-heading">For Patients</div>
                    <ul class="footer-links"><li><a href="#">My Appointments</a></li><li><a href="#">Medical Records</a></li><li><a href="#">Prescriptions</a></li><li><a href="#">Health Blog</a></li><li><a href="#">FAQs</a></li></ul>
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
        window.addEventListener('scroll',()=>mainNav.classList.toggle('scrolled',window.scrollY>50));
        const btt=document.getElementById('backToTop');
        window.addEventListener('scroll',()=>btt.classList.toggle('visible',window.scrollY>600));
        btt.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));
        const mo=document.getElementById('mobileOverlay'),mp=document.getElementById('mobilePanel');
        function openM(){mo.classList.add('active');mp.classList.add('active');document.body.style.overflow='hidden';}
        function closeM(){mo.classList.remove('active');mp.classList.remove('active');document.body.style.overflow='';}
        document.getElementById('mobileMenuBtn').addEventListener('click',openM);
        document.getElementById('mobileCloseBtn').addEventListener('click',closeM);
        mo.addEventListener('click',closeM);
        mp.querySelectorAll('a').forEach(l=>l.addEventListener('click',closeM));
        document.querySelectorAll('a[href^="#"]').forEach(a=>{a.addEventListener('click',function(e){const t=document.querySelector(this.getAttribute('href'));if(t){e.preventDefault();window.scrollTo({top:t.getBoundingClientRect().top+window.scrollY-mainNav.offsetHeight-20,behavior:'smooth'});}});});

        // FAQ accordion
        document.querySelectorAll('.faq-question').forEach(btn=>{
            btn.addEventListener('click',function(){
                const item=this.closest('.faq-item');
                const isOpen=item.classList.contains('open');
                // Close all
                document.querySelectorAll('.faq-item').forEach(i=>i.classList.remove('open'));
                document.querySelectorAll('.faq-question').forEach(q=>q.setAttribute('aria-expanded','false'));
                // Toggle current
                if(!isOpen){item.classList.add('open');this.setAttribute('aria-expanded','true');}
            });
        });

        // Contact form validation & submission
        const form=document.getElementById('contactForm');
        const btnSubmit=document.getElementById('btnSubmit');
        const formSuccess=document.getElementById('formSuccess');

        function clearErrors(){
            document.querySelectorAll('.form-input').forEach(i=>i.classList.remove('error'));
            document.querySelectorAll('.form-error').forEach(e=>e.classList.remove('show'));
        }
        function showError(inputId,errorId){
            document.getElementById(inputId).classList.add('error');
            document.getElementById(errorId).classList.add('show');
        }

        // Live clear error on input
        ['formName','formEmail','formSubject','formMessage'].forEach(id=>{
            document.getElementById(id).addEventListener('input',function(){
                this.classList.remove('error');
                const errId='error'+id.charAt(4).toUpperCase()+id.slice(5);
                const errEl=document.getElementById(errId);
                if(errEl)errEl.classList.remove('show');
            });
        });

        form.addEventListener('submit',function(e){
            e.preventDefault();
            clearErrors();
            let valid=true;

            const name=document.getElementById('formName').value.trim();
            const email=document.getElementById('formEmail').value.trim();
            const subject=document.getElementById('formSubject').value;
            const message=document.getElementById('formMessage').value.trim();

            if(!name){showError('formName','errorName');valid=false;}
            if(!email||!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){showError('formEmail','errorEmail');valid=false;}
            if(!subject){showError('formSubject','errorSubject');valid=false;}
            if(!message||message.length<10){showError('formMessage','errorMessage');valid=false;}

            if(!valid)return;

            // Simulate submission
            btnSubmit.classList.add('loading');
            btnSubmit.disabled=true;

            setTimeout(()=>{
                btnSubmit.classList.remove('loading');
                btnSubmit.disabled=false;
                form.style.display='none';
                formSuccess.classList.add('show');
                showToast('Your message has been sent successfully!','success');
                // In Laravel: this would be an axios/fetch POST to /contact
            },1800);
        });

        document.getElementById('btnReset').addEventListener('click',()=>{
            form.reset();clearErrors();
            form.style.display='block';
            formSuccess.classList.remove('show');
        });

        // Scroll reveal
        const ro=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible');});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
        document.querySelectorAll('.reveal').forEach(e=>ro.observe(e));
    </script>
</body>
</html>