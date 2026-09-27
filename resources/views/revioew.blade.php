<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Reviews — MediCare</title>
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
        .nav-link-custom.active{color:var(--primary)!important;background:var(--primary-glow);}
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

        /* Rating overview */
        .rating-overview{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:24px;
            padding:2.5rem;box-shadow:var(--card-shadow);
        }
        .big-rating{font-weight:900;font-size:4rem;color:var(--dark);line-height:1;}
        .big-rating .decimal{color:var(--accent);font-size:2.5rem;}
        .big-stars{color:#F59E0B;font-size:1.1rem;margin:.5rem 0;}
        .total-reviews{color:var(--gray-500);font-size:.9rem;}
        .rating-bar-row{display:flex;align-items:center;gap:.75rem;margin-bottom:.6rem;}
        .rating-bar-label{font-weight:700;font-size:.85rem;color:var(--dark);width:2rem;text-align:right;flex-shrink:0;}
        .rating-bar-track{flex:1;height:10px;background:var(--gray-100);border-radius:99px;overflow:hidden;}
        .rating-bar-fill{height:100%;border-radius:99px;background:#F59E0B;transition:width 1.2s cubic-bezier(.25,.46,.45,.94);width:0;}
        .rating-bar-count{font-size:.82rem;color:var(--gray-500);width:2.5rem;text-align:right;flex-shrink:0;}

        /* Category ratings */
        .cat-rating-card{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:18px;
            padding:1.25rem 1.5rem;transition:all .3s ease;
        }
        .cat-rating-card:hover{box-shadow:var(--card-shadow-hover);transform:translateY(-3px);}
        .cat-rating-card .cat-label{font-size:.88rem;color:var(--gray-500);margin-bottom:.4rem;}
        .cat-rating-card .cat-bar-track{height:6px;background:var(--gray-100);border-radius:99px;overflow:hidden;margin-bottom:.35rem;}
        .cat-rating-card .cat-bar-fill{height:100%;border-radius:99px;transition:width 1.2s ease;width:0;}
        .cat-rating-card .cat-value{font-weight:800;font-size:.9rem;color:var(--dark);}

        /* Filter bar */
        .review-filters{
            display:flex;flex-wrap:wrap;gap:.75rem;align-items:center;
            padding:1.25rem 1.5rem;background:var(--white);border:1px solid rgba(0,0,0,0.06);
            border-radius:16px;margin-bottom:1.5rem;
        }
        .filter-chip{
            display:inline-flex;align-items:center;gap:.35rem;padding:.5rem 1rem;
            border:2px solid var(--gray-300);border-radius:99px;background:var(--white);
            font-family:inherit;font-size:.82rem;font-weight:600;color:var(--gray-700);
            cursor:pointer;transition:all .2s;white-space:nowrap;
        }
        .filter-chip:hover{border-color:var(--primary);color:var(--primary);}
        .filter-chip.active{background:var(--primary);border-color:var(--primary);color:var(--white);}
        .filter-chip i{font-size:.7rem;}
        .filter-divider{width:1px;height:28px;background:var(--gray-300);flex-shrink:0;}
        .filter-select-sm{
            padding:.45rem 2rem .45rem .75rem;border:2px solid var(--gray-300);border-radius:99px;
            font-family:inherit;font-size:.82rem;font-weight:600;color:var(--dark);background:var(--white);
            -webkit-appearance:none;cursor:pointer;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='10' viewBox='0 0 10 10'%3E%3Cpath fill='%236B7280' d='M5 7L1 3h8z'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right .75rem center;transition:all .2s;
        }
        .filter-select-sm:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 3px var(--primary-glow);}

        /* Review card */
        .review-card{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);border-radius:20px;
            padding:2rem;transition:all .3s ease;margin-bottom:1rem;
        }
        .review-card:hover{box-shadow:var(--card-shadow-hover);transform:translateY(-3px);}
        .review-header{display:flex;align-items:flex-start;gap:1rem;margin-bottom:1rem;}
        .review-avatar{width:52px;height:52px;border-radius:50%;object-fit:cover;border:2.5px solid var(--primary-light);flex-shrink:0;}
        .review-author-info{flex:1;}
        .review-author-name{font-weight:700;color:var(--dark);font-size:1rem;}
        .review-meta{display:flex;flex-wrap:wrap;gap:.75rem;align-items:center;margin-top:.2rem;font-size:.8rem;color:var(--gray-500);}
        .review-meta .review-doctor-link{color:var(--primary);text-decoration:none;font-weight:600;}
        .review-meta .review-doctor-link:hover{text-decoration:underline;}
        .review-date{display:flex;align-items:center;gap:.3rem;}
        .review-verified{
            display:inline-flex;align-items:center;gap:.3rem;background:rgba(52,211,153,0.1);
            color:#059669;font-size:.72rem;font-weight:700;padding:.2rem .6rem;border-radius:99px;
        }
        .review-stars{color:#F59E0B;font-size:.85rem;margin-bottom:.75rem;}
        .review-text{color:var(--gray-700);font-size:.93rem;line-height:1.75;margin-bottom:1rem;}
        .review-footer{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:.75rem;padding-top:1rem;border-top:1px solid var(--gray-100);}
        .helpful-btn{
            display:inline-flex;align-items:center;gap:.4rem;padding:.4rem .9rem;
            border:1.5px solid var(--gray-300);border-radius:99px;background:var(--white);
            font-family:inherit;font-size:.8rem;font-weight:600;color:var(--gray-500);
            cursor:pointer;transition:all .2s;
        }
        .helpful-btn:hover{border-color:var(--primary);color:var(--primary);}
        .helpful-btn.liked{background:var(--primary-glow);border-color:var(--primary);color:var(--primary);}
        .review-reply{
            background:var(--section-alt);border-radius:14px;padding:1rem 1.25rem;margin-top:1rem;
            border-left:3px solid var(--primary);
        }
        .review-reply .reply-label{font-size:.75rem;font-weight:700;color:var(--primary);text-transform:uppercase;letter-spacing:.5px;margin-bottom:.35rem;}
        .review-reply .reply-text{font-size:.88rem;color:var(--gray-700);line-height:1.65;}
        .review-reply .reply-author{font-weight:700;color:var(--dark);}

        /* Write review modal */
        .modal-custom .modal-content{border:none;border-radius:24px;overflow:hidden;box-shadow:0 25px 80px rgba(0,0,0,0.2);}
        .modal-custom .modal-header{background:var(--dark);border:none;padding:1.5rem 2rem;}
        .modal-custom .modal-title{color:var(--white);font-weight:800;font-size:1.25rem;}
        .modal-custom .btn-close{filter:invert(1);opacity:.7;}
        .modal-custom .modal-body{padding:2rem;}
        .modal-custom .modal-footer{border:none;padding:0 2rem 2rem;}
        .star-rating-input{display:flex;gap:.35rem;margin-bottom:1.5rem;}
        .star-rating-input .star-btn{
            background:none;border:none;font-size:1.75rem;color:var(--gray-300);
            cursor:pointer;transition:all .15s;padding:0;
        }
        .star-rating-input .star-btn.active{color:#F59E0B;transform:scale(1.15);}
        .star-rating-input .star-btn:hover{transform:scale(1.25);}
        .form-group{margin-bottom:1.25rem;}
        .form-group label{display:block;font-weight:700;font-size:.85rem;color:var(--dark);margin-bottom:.4rem;}
        .form-group label .req{color:#EF4444;}
        .form-input{
            width:100%;padding:.75rem 1rem;border:2px solid var(--gray-300);border-radius:12px;
            font-family:inherit;font-size:.9rem;color:var(--dark);background:var(--white);
            transition:all .3s;-webkit-appearance:none;
        }
        .form-input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px var(--primary-glow);}
        .form-input.error{border-color:#EF4444;}
        .form-input::placeholder{color:var(--gray-500);}
        textarea.form-input{resize:vertical;min-height:120px;}
        select.form-input{
            cursor:pointer;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right 1rem center;
        }
        .form-error{color:#EF4444;font-size:.78rem;font-weight:600;margin-top:.3rem;display:none;}
        .form-error.show{display:block;}
        .btn-submit-review{
            background:var(--primary);color:var(--white);font-weight:700;font-size:.95rem;
            padding:.85rem 2rem;border-radius:14px;border:none;transition:all .3s;
            box-shadow:0 6px 20px var(--primary-glow);display:inline-flex;align-items:center;gap:.5rem;
        }
        .btn-submit-review:hover{background:var(--primary-dark);transform:translateY(-2px);box-shadow:0 10px 30px var(--primary-glow);}

        /* Pagination */
        .pagination-custom{display:flex;align-items:center;justify-content:center;gap:.35rem;margin-top:2.5rem;}
        .page-btn{
            width:42px;height:42px;border:2px solid var(--gray-300);border-radius:12px;
            background:var(--white);display:flex;align-items:center;justify-content:center;
            font-weight:700;font-size:.875rem;color:var(--gray-700);cursor:pointer;
            transition:all .2s;font-family:inherit;
        }
        .page-btn:hover{border-color:var(--primary);color:var(--primary);background:var(--primary-glow);}
        .page-btn.active{background:var(--primary);border-color:var(--primary);color:var(--white);box-shadow:0 4px 15px var(--primary-glow);}
        .page-btn:disabled{opacity:.4;cursor:default;pointer-events:none;}
        .page-btn.dots{border:none;background:none;cursor:default;}

        .no-reviews{text-align:center;padding:4rem 2rem;}
        .no-reviews i{font-size:3rem;color:var(--gray-300);margin-bottom:1rem;}

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
            .rating-overview{padding:1.5rem;}
            .big-rating{font-size:3rem;}
            .big-rating .decimal{font-size:1.75rem;}
            .review-filters{padding:1rem;gap:.5rem;}
            .review-card{padding:1.5rem;}
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
                <a href="#" class="nav-link nav-link-custom active">Reviews</a>
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
                <a href="#">Home</a><span class="separator"><i class="fas fa-chevron-right"></i></span><span class="current">Patient Reviews</span>
            </div>
            <h1>What Patients Say About Us</h1>
            <p>Real, verified reviews from patients who experienced the MediCare difference.</p>
        </div>
    </section>

    <!-- RATING OVERVIEW -->
    <section style="padding:3rem 0 0;margin-top:-2rem;position:relative;z-index:10;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5 reveal">
                    <div class="rating-overview h-100 d-flex flex-column justify-content-center">
                        <div class="text-center">
                            <div class="big-rating">4.8<span class="decimal">.5</span></div>
                            <div class="big-stars">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-stroke"></i>
                            </div>
                            <div class="total-reviews">Based on <strong>12,847</strong> verified reviews</div>
                        </div>
                        <div style="margin-top:2rem;">
                            <div class="rating-bar-row"><span class="rating-bar-label">5</span><div class="rating-bar-track"><div class="rating-bar-fill" data-width="72"></div></div><span class="rating-bar-count">9,250</span></div>
                            <div class="rating-bar-row"><span class="rating-bar-label">4</span><div class="rating-bar-track"><div class="rating-bar-fill" data-width="20"></div></div><span class="rating-bar-count">2,570</span></div>
                            <div class="rating-bar-row"><span class="rating-bar-label">3</span><div class="rating-bar-track"><div class="rating-bar-fill" data-width="5"></div></div><span class="rating-bar-count">642</span></div>
                            <div class="rating-bar-row"><span class="rating-bar-label">2</span><div class="rating-bar-track"><div class="rating-bar-fill" data-width="2"></div></div><span class="rating-bar-count">257</span></div>
                            <div class="rating-bar-row"><span class="rating-bar-label">1</span><div class="rating-bar-track"><div class="rating-bar-fill" data-width="1"></div></div><span class="rating-bar-count">128</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 reveal reveal-delay-2">
                    <div class="row g-3 h-100 align-content-center">
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Doctor Knowledge</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="96" style="background:var(--primary);"></div></div>
                                <div class="cat-value">4.9 / 5.0</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Bedside Manner</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="94" style="background:var(--accent);"></div></div>
                                <div class="cat-value">4.8 / 5.0</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Ease of Booking</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="92" style="background:#3B82F6;"></div></div>
                                <div class="cat-value">4.7 / 5.0</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Clinic Environment</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="90" style="background:#8B5CF6;"></div></div>
                                <div class="cat-value">4.6 / 5.0</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Wait Time</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="85" style="background:#EC4899;"></div></div>
                                <div class="cat-value">4.4 / 5.0</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cat-rating-card">
                                <div class="cat-label">Value for Money</div>
                                <div class="cat-bar-track"><div class="cat-bar-fill" data-width="88" style="background:#22C55E;"></div></div>
                                <div class="cat-value">4.5 / 5.0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- REVIEWS LIST -->
    <section class="section-padding">
        <div class="container">
            <!-- Write review CTA -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4 reveal">
                <div>
                    <h2 class="section-title" style="font-size:1.5rem;margin-bottom:0;">All Reviews</h2>
                    <p style="color:var(--gray-500);font-size:.9rem;margin:0;" id="reviewCountText">Showing 8 reviews</p>
                </div>
                <button class="btn-submit-review" data-bs-toggle="modal" data-bs-target="#writeReviewModal">
                    <i class="fas fa-pen-to-square"></i> Write a Review
                </button>
            </div>

            <!-- Filters -->
            <div class="review-filters reveal">
                <span style="font-size:.82rem;font-weight:700;color:var(--dark);margin-right:.25rem;">Filter:</span>
                <button class="filter-chip active" data-rating="all">All Ratings</button>
                <button class="filter-chip" data-rating="5"><i class="fas fa-star" style="color:#F59E0B;font-size:.65rem;"></i> 5 Stars</button>
                <button class="filter-chip" data-rating="4"><i class="fas fa-star" style="color:#F59E0B;font-size:.65rem;"></i> 4 Stars</button>
                <button class="filter-chip" data-rating="3"><i class="fas fa-star" style="color:#F59E0B;font-size:.65rem;"></i> 3 Stars</button>
                <button class="filter-chip" data-rating="2"><i class="fas fa-star" style="color:#F59E0B;font-size:.65rem;"></i> 2 Stars</button>
                <button class="filter-chip" data-rating="1"><i class="fas fa-star" style="color:#F59E0B;font-size:.65rem;"></i> 1 Star</button>
                <div class="filter-divider d-none d-md-block"></div>
                <select class="filter-select-sm" id="filterSpecialty">
                    <option value="">All Specialties</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Pediatrics">Pediatrics</option>
                </select>
                <select class="filter-select-sm" id="filterSort">
                    <option value="recent">Most Recent</option>
                    <option value="highest">Highest Rated</option>
                    <option value="lowest">Lowest Rated</option>
                    <option value="helpful">Most Helpful</option>
                </select>
            </div>

            <!-- Review cards container -->
            <div id="reviewsContainer"></div>

            <!-- No results -->
            <div class="no-reviews d-none" id="noReviews">
                <i class="fas fa-comment-slash"></i>
                <h4 style="color:var(--dark);">No Reviews Match Your Filters</h4>
                <p style="color:var(--gray-500);margin-bottom:1rem;">Try adjusting your filters to see more reviews.</p>
                <button class="btn-submit-review" id="btnClearFilters" style="font-size:.85rem;padding:.65rem 1.5rem;"><i class="fas fa-rotate-left"></i> Clear Filters</button>
            </div>

            <!-- Pagination -->
            <div class="pagination-custom" id="pagination"></div>
        </div>
    </section>

    <!-- WRITE REVIEW MODAL -->
    <div class="modal fade modal-custom" id="writeReviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm" novalidate>
                        <div class="text-center mb-2">
                            <label style="font-weight:700;font-size:.9rem;color:var(--dark);display:block;margin-bottom:.5rem;">Your Rating <span style="color:#EF4444;">*</span></label>
                            <div class="star-rating-input justify-content-center" id="starInput">
                                <button type="button" class="star-btn" data-star="1"><i class="fas fa-star"></i></button>
                                <button type="button" class="star-btn" data-star="2"><i class="fas fa-star"></i></button>
                                <button type="button" class="star-btn" data-star="3"><i class="fas fa-star"></i></button>
                                <button type="button" class="star-btn" data-star="4"><i class="fas fa-star"></i></button>
                                <button type="button" class="star-btn" data-star="5"><i class="fas fa-star"></i></button>
                            </div>
                            <div class="form-error" id="errorRating" style="text-align:center;">Please select a rating</div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Your Name <span class="req">*</span></label>
                                    <input type="text" class="form-input" id="reviewName" placeholder="Jane Doe">
                                    <div class="form-error" id="errorReviewName">Please enter your name</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Doctor <span class="req">*</span></label>
                                    <select class="form-input" id="reviewDoctor">
                                        <option value="">Select a doctor</option>
                                        <option value="Dr. Sarah Mitchell">Dr. Sarah Mitchell — Cardiology</option>
                                        <option value="Dr. James Carter">Dr. James Carter — Neurology</option>
                                        <option value="Dr. Emily Zhang">Dr. Emily Zhang — Dermatology</option>
                                        <option value="Dr. Michael Brooks">Dr. Michael Brooks — Orthopedics</option>
                                        <option value="Dr. Aisha Patel">Dr. Aisha Patel — Pediatrics</option>
                                        <option value="Dr. Robert Kim">Dr. Robert Kim — Cardiology</option>
                                    </select>
                                    <div class="form-error" id="errorDoctor">Please select a doctor</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Review Title <span class="req">*</span></label>
                                    <input type="text" class="form-input" id="reviewTitle" placeholder="Summarize your experience">
                                    <div class="form-error" id="errorTitle">Please enter a review title</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Your Review <span class="req">*</span></label>
                                    <textarea class="form-input" id="reviewText" placeholder="Share the details of your experience..." rows="4"></textarea>
                                    <div class="form-error" id="errorReviewText">Please write at least 20 characters</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-end gap-2">
                    <button type="button" class="btn-submit-review" style="background:var(--gray-300);color:var(--dark);box-shadow:none;" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-submit-review" id="btnSubmitReview"><i class="fas fa-paper-plane"></i> Submit Review</button>
                </div>
            </div>
        </div>
    </div>

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
        // ===== Toast =====
        function showToast(m,t='success'){const e=document.getElementById('customToast'),s=document.getElementById('toastMessage'),i=e.querySelector('.toast-icon');s.textContent=m;i.className='toast-icon '+t;i.innerHTML=t==='success'?'<i class="fas fa-check"></i>':'<i class="fas fa-info"></i>';e.classList.add('show');clearTimeout(e._t);e._t=setTimeout(()=>e.classList.remove('show'),3500);}

        // ===== Navbar =====
        const mainNav=document.getElementById('mainNav');
        window.addEventListener('scroll',()=>mainNav.classList.toggle('scrolled',window.scrollY>50));
        const btt=document.getElementById('backToTop');
        window.addEventListener('scroll',()=>btt.classList.toggle('visible',window.scrollY>600));
        btt.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));

        // ===== Mobile menu =====
        const mo=document.getElementById('mobileOverlay'),mp=document.getElementById('mobilePanel');
        function openM(){mo.classList.add('active');mp.classList.add('active');document.body.style.overflow='hidden';}
        function closeM(){mo.classList.remove('active');mp.classList.remove('active');document.body.style.overflow='';}
        document.getElementById('mobileMenuBtn').addEventListener('click',openM);
        document.getElementById('mobileCloseBtn').addEventListener('click',closeM);
        mo.addEventListener('click',closeM);
        mp.querySelectorAll('a').forEach(l=>l.addEventListener('click',closeM));

        // ===== Animate rating bars on scroll =====
        const barObserver=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){e.target.querySelectorAll('[data-width]').forEach(bar=>{bar.style.width=bar.dataset.width+'%';});barObserver.unobserve(e.target);}});},{threshold:.3});
        document.querySelectorAll('.rating-overview, .col-lg-7 .row').forEach(el=>barObserver.observe(el));

        // ===== REVIEWS DATA =====
        const reviews=[
            {id:1,name:"Anna Roberts",avatar:"review-anna",rating:5,doctor:"Dr. Sarah Mitchell",specialty:"Cardiology",title:"Life-changing cardiology care",text:"Dr. Mitchell identified a heart condition that three other doctors missed. Her thoroughness and genuine concern for my wellbeing made me feel safe for the first time in months. The entire booking process was seamless — I had an appointment within 24 hours.",date:"2025-01-15",helpful:47,liked:false,verified:true,reply:{author:"Dr. Sarah Mitchell",text:"Thank you so much, Anna. I'm glad we caught it early. Please don't hesitate to reach out for your follow-up next month."}},
            {id:2,name:"David Thompson",avatar:"review-david",rating:5,doctor:"Dr. Aisha Patel",specialty:"Pediatrics",title:"Best pediatrician we've ever had",text:"As first-time parents, we were anxious about everything. Dr. Patel was incredibly patient with all our questions, never rushed us, and gave us practical advice that actually worked. My daughter loves her! The teleconsultation option has been a lifesaver for minor concerns.",date:"2025-01-12",helpful:38,liked:false,verified:true,reply:null},
            {id:3,name:"Maria Gonzalez",avatar:"review-maria",rating:4,doctor:"Dr. James Carter",specialty:"Neurology",title:"Excellent neurologist, long wait time",text:"Dr. Carter is extremely knowledgeable and took the time to explain my MRI results in detail. My only complaint is the 45-minute wait past my appointment time. The diagnosis and treatment plan were spot-on though, and I'm feeling much better after 3 months of treatment.",date:"2025-01-10",helpful:29,liked:false,verified:true,reply:null},
            {id:4,name:"James Wilson",avatar:"review-james",rating:5,doctor:"Dr. Emily Zhang",specialty:"Dermatology",title:"Finally clear skin after years of struggling",text:"I've seen countless dermatologists over 8 years for my chronic acne. Dr. Zhang took a completely different approach — she looked at my full health picture including diet and stress levels. Three months later, my skin is the clearest it's been since high school. Absolutely incredible.",date:"2025-01-08",helpful:56,liked:false,verified:true,reply:{author:"Dr. Emily Zhang",text:"So happy to hear about your progress, James! Your dedication to the treatment plan made all the difference. Keep it up!"}},
            {id:5,name:"Sophia Chen",avatar:"review-sophia",rating:3,doctor:"Dr. Michael Brooks",specialty:"Orthopedics",title:"Good surgeon, poor follow-up communication",text:"The knee surgery itself went well and Dr. Brooks is clearly a skilled surgeon. However, post-operative communication was lacking — I had to call three times to get my rehab plan. The MediCare platform was easy to use for booking, but the doctor's office needs to improve their follow-up process.",date:"2025-01-05",helpful:22,liked:false,verified:true,reply:null},
            {id:6,name:"Robert Martinez",avatar:"review-robert",rating:5,doctor:"Dr. Robert Kim",specialty:"Cardiology",title:"World-class electrophysiologist",text:"After being diagnosed with AFib, I was terrified. Dr. Kim explained everything — the condition, the treatment options, the risks — with such clarity that my anxiety evaporated. The ablation procedure was successful and I'm back to running 5Ks. Can't recommend him enough.",date:"2025-01-03",helpful:41,liked:false,verified:true,reply:null},
            {id:7,name:"Lisa Park",avatar:"review-lisa",rating:4,doctor:"Dr. Emily Zhang",specialty:"Dermatology",title:"Great Botox results, slightly pricey",text:"Dr. Zhang has a great eye for aesthetics — my Botox results look completely natural, which is exactly what I wanted. The clinic environment is beautiful and the staff is friendly. My only hesitation is the price point, which is higher than average for the area. But you get what you pay for, I suppose.",date:"2024-12-28",helpful:18,liked:false,verified:true,reply:null},
            {id:8,name:"Michael Brown",avatar:"review-michael",rating:2,doctor:"Dr. Michael Brooks",specialty:"Orthopedics",title:"Disappointing experience overall",text:"Waited 90 minutes past my scheduled time. When I finally saw the doctor, the consultation lasted barely 10 minutes. He barely looked at my X-rays before recommending surgery. I sought a second opinion and was told physical therapy might be sufficient. The booking platform works fine, but this experience left a lot to be desired.",date:"2024-12-25",helpful:34,liked:false,verified:true,reply:{author:"MediCare Support",text:"We're sorry to hear about your experience, Michael. We've shared your feedback with Dr. Brooks' office and a patient coordinator will reach out to you directly."}},
            {id:9,name:"Emily Davis",avatar:"review-emily",rating:5,doctor:"Dr. Nina Volkov",specialty:"Neurology",title:"A true expert in movement disorders",text:"My father has Parkinson's and we've seen several neurologists. Dr. Volkov is in a different league entirely. She adjusted his medication regimen and the improvement was noticeable within weeks. She also connected us with a support group. Compassionate, brilliant, and thorough.",date:"2024-12-20",helpful:63,liked:false,verified:true,reply:null},
            {id:10,name:"Thomas Lee",avatar:"review-thomas",rating:4,doctor:"Dr. Hannah Lee",specialty:"Orthopedics",title:"Recovered from ACL tear faster than expected",text:"Dr. Hannah Lee is not only a great surgeon but also an amazing motivator. After my ACL surgery, she designed a rehab plan that had me back on the basketball court in 6 months — ahead of schedule. The video follow-ups were convenient and she always responded to messages promptly.",date:"2024-12-18",helpful:27,liked:false,verified:true,reply:null},
            {id:11,name:"Sarah Kim",avatar:"review-sarahk",rating:5,doctor:"Dr. Aisha Patel",specialty:"Pediatrics",title:"Our kids actually enjoy going to the doctor now",text:"Dr. Patel has a magical way with children. She makes every visit fun with her gentle approach and little tricks to keep them calm during checkups. Both my kids ask when they can see 'Dr. Aisha' again. The online booking and digital records make managing their health so much easier.",date:"2024-12-15",helpful:35,liked:false,verified:true,reply:null},
            {id:12,name:"Chris Anderson",avatar:"review-chris",rating:1,doctor:"Dr. Carlos Rivera",specialty:"Dermatology",title:"Felt rushed and dismissed",text:"I waited 40 minutes for a 5-minute consultation. Dr. Rivera barely examined my skin condition before prescribing a cream that didn't work. When I followed up, I was told to just keep using it. I ended up seeing another dermatologist who diagnosed something completely different. Very frustrating experience.",date:"2024-12-12",helpful:52,liked:false,verified:true,reply:{author:"MediCare Support",text:"We take this feedback seriously, Chris. We've escalated this to our quality team for review and someone will contact you to discuss your concerns."}},
        ];

        // ===== STATE =====
        let activeRating='all';
        let activeSpecialty='';
        let activeSort='recent';
        let currentPage=1;
        const perPage=4;

        function filterReviews(){
            let filtered=[...reviews];
            if(activeRating!=='all') filtered=filtered.filter(r=>r.rating===parseInt(activeRating));
            if(activeSpecialty) filtered=filtered.filter(r=>r.specialty===activeSpecialty);
            switch(activeSort){
                case'highest':filtered.sort((a,b)=>b.rating-a.rating);break;
                case'lowest':filtered.sort((a,b)=>a.rating-b.rating);break;
                case'helpful':filtered.sort((a,b)=>b.helpful-a.helpful);break;
                default:filtered.sort((a,b)=>new Date(b.date)-new Date(a.date));
            }
            return filtered;
        }

        function renderStars(rating){
            let s='';
            for(let i=1;i<=5;i++){
                if(i<=Math.floor(rating))s+='<i class="fas fa-star"></i>';
                else if(i===Math.ceil(rating)&&rating%1>=0.3)s+='<i class="fas fa-star-half-stroke"></i>';
                else s+='<i class="far fa-star"></i>';
            }
            return s;
        }

        function formatDate(d){
            return new Date(d).toLocaleDateString('en-US',{month:'short',day:'numeric',year:'numeric'});
        }

        function renderReviews(){
            const filtered=filterReviews();
            const total=filtered.length;
            const totalPages=Math.max(1,Math.ceil(total/perPage));
            if(currentPage>totalPages)currentPage=totalPages;
            const start=(currentPage-1)*perPage;
            const pageReviews=filtered.slice(start,start+perPage);

            const container=document.getElementById('reviewsContainer');
            const noRes=document.getElementById('noReviews');
            const pag=document.getElementById('pagination');
            document.getElementById('reviewCountText').textContent=`Showing ${Math.min(perPage,total)} of ${total} review${total!==1?'s':''}`;

            if(total===0){container.innerHTML='';noRes.classList.remove('d-none');pag.innerHTML='';return;}
            noRes.classList.add('d-none');

            container.innerHTML=pageReviews.map(r=>`
                <div class="review-card" data-id="${r.id}">
                    <div class="review-header">
                        <img src="https://picsum.photos/seed/${r.avatar}/104/104.jpg" alt="${r.name}" class="review-avatar">
                        <div class="review-author-info">
                            <div class="review-author-name">${r.name} ${r.verified?'<span class="review-verified"><i class="fas fa-circle-check"></i> Verified</span>':''}</div>
                            <div class="review-meta">
                                <span class="review-doctor-link"><i class="fas fa-user-doctor"></i> ${r.doctor}</span>
                                <span class="review-date"><i class="far fa-calendar"></i> ${formatDate(r.date)}</span>
                            </div>
                        </div>
                    </div>
                    <div class="review-stars">${renderStars(r.rating)}</div>
                    <h6 style="color:var(--dark);font-weight:700;margin-bottom:.5rem;">${r.title}</h6>
                    <p class="review-text">${r.text}</p>
                    <div class="review-footer">
                        <button class="helpful-btn${r.liked?' liked':''}" data-id="${r.id}">
                            <i class="fa${r.liked?'s':'r'} fa-thumbs-up"></i> Helpful (${r.helpful})
                        </button>
                        <span style="font-size:.78rem;color:var(--gray-500);">${r.specialty}</span>
                    </div>
                    ${r.reply?`<div class="review-reply"><div class="reply-label"><i class="fas fa-reply"></i> Clinic Response</div><div class="reply-text"><span class="reply-author">${r.reply.author}:</span> ${r.reply.text}</div></div>`:''}
                </div>
            `).join('');

            // Pagination
            let pagHTML=`<button class="page-btn" data-page="${currentPage-1}" ${currentPage===1?'disabled':''}><i class="fas fa-chevron-left" style="font-size:.7rem;"></i></button>`;
            for(let i=1;i<=totalPages;i++){pagHTML+=`<button class="page-btn${i===currentPage?' active':''}" data-page="${i}">${i}</button>`;}
            pagHTML+=`<button class="page-btn" data-page="${currentPage+1}" ${currentPage===totalPages?'disabled':''}><i class="fas fa-chevron-right" style="font-size:.7rem;"></i></button>`;
            pag.innerHTML=pagHTML;

            // Bind helpful buttons
            container.querySelectorAll('.helpful-btn').forEach(btn=>{
                btn.addEventListener('click',function(){
                    const id=parseInt(this.dataset.id);
                    const review=reviews.find(r=>r.id===id);
                    if(review){
                        review.liked=!review.liked;
                        review.helpful+=review.liked?1:-1;
                        renderReviews();
                        showToast(review.liked?'Marked as helpful':'Removed helpful mark','success');
                    }
                });
            });
        }

        // Filter chips
        document.querySelectorAll('.filter-chip[data-rating]').forEach(chip=>{
            chip.addEventListener('click',function(){
                document.querySelectorAll('.filter-chip[data-rating]').forEach(c=>c.classList.remove('active'));
                this.classList.add('active');
                activeRating=this.dataset.rating;
                currentPage=1;renderReviews();
            });
        });

        // Specialty filter
        document.getElementById('filterSpecialty').addEventListener('change',function(){
            activeSpecialty=this.value;currentPage=1;renderReviews();
        });

        // Sort
        document.getElementById('filterSort').addEventListener('change',function(){
            activeSort=this.value;currentPage=1;renderReviews();
        });

        // Clear filters
        document.getElementById('btnClearFilters').addEventListener('click',()=>{
            activeRating='all';activeSpecialty='';activeSort='recent';currentPage=1;
            document.querySelectorAll('.filter-chip[data-rating]').forEach(c=>c.classList.remove('active'));
            document.querySelector('.filter-chip[data-rating="all"]').classList.add('active');
            document.getElementById('filterSpecialty').value='';
            document.getElementById('filterSort').value='recent';
            renderReviews();showToast('Filters cleared','info');
        });

        // Pagination
        document.getElementById('pagination').addEventListener('click',function(e){
            const btn=e.target.closest('.page-btn');
            if(!btn||btn.disabled)return;
            currentPage=parseInt(btn.dataset.page);
            renderReviews();
            document.querySelector('.review-filters').scrollIntoView({behavior:'smooth',block:'start'});
        });

        // ===== STAR RATING INPUT =====
        let selectedRating=0;
        document.querySelectorAll('#starInput .star-btn').forEach(btn=>{
            btn.addEventListener('click',function(){
                selectedRating=parseInt(this.dataset.star);
                document.querySelectorAll('#starInput .star-btn').forEach((s,i)=>{
                    s.classList.toggle('active',i<selectedRating);
                });
                document.getElementById('errorRating').classList.remove('show');
            });
            btn.addEventListener('mouseenter',function(){
                const hover=parseInt(this.dataset.star);
                document.querySelectorAll('#starInput .star-btn').forEach((s,i)=>{
                    s.style.color=i<hover?'#F59E0B':'var(--gray-300)';
                });
            });
            btn.addEventListener('mouseleave',function(){
                document.querySelectorAll('#starInput .star-btn').forEach((s,i)=>{
                    s.style.color=i<selectedRating?'#F59E0B':'var(--gray-300)';
                });
            });
        });

        // ===== SUBMIT REVIEW =====
        document.getElementById('btnSubmitReview').addEventListener('click',()=>{
            let valid=true;
            // Clear errors
            document.querySelectorAll('#reviewForm .form-input').forEach(i=>i.classList.remove('error'));
            document.querySelectorAll('#reviewForm .form-error').forEach(e=>e.classList.remove('show'));

            if(!selectedRating){document.getElementById('errorRating').classList.add('show');valid=false;}
            const name=document.getElementById('reviewName').value.trim();
            if(!name){document.getElementById('reviewName').classList.add('error');document.getElementById('errorReviewName').classList.add('show');valid=false;}
            const doctor=document.getElementById('reviewDoctor').value;
            if(!doctor){document.getElementById('reviewDoctor').classList.add('error');document.getElementById('errorDoctor').classList.add('show');valid=false;}
            const title=document.getElementById('reviewTitle').value.trim();
            if(!title){document.getElementById('reviewTitle').classList.add('error');document.getElementById('errorTitle').classList.add('show');valid=false;}
            const text=document.getElementById('reviewText').value.trim();
            if(!text||text.length<20){document.getElementById('reviewText').classList.add('error');document.getElementById('errorReviewText').classList.add('show');valid=false;}

            if(!valid)return;

            // Add review to data
            const specialty=doctor.split(' — ')[1]||'General';
            reviews.unshift({
                id:Date.now(),name:name,avatar:'new-user-'+Date.now(),rating:selectedRating,
                doctor:doctor,specialty:specialty,title:title,text:text,
                date:new Date().toISOString().split('T')[0],helpful:0,liked:false,verified:false,reply:null
            });

            // Reset & close
            document.getElementById('reviewForm').reset();
            selectedRating=0;
            document.querySelectorAll('#starInput .star-btn').forEach(s=>{s.classList.remove('active');s.style.color='var(--gray-300)';});
            bootstrap.Modal.getInstance(document.getElementById('writeReviewModal')).hide();
            currentPage=1;activeRating='all';
            document.querySelectorAll('.filter-chip[data-rating]').forEach(c=>c.classList.remove('active'));
            document.querySelector('.filter-chip[data-rating="all"]').classList.add('active');
            renderReviews();
            showToast('Your review has been published!','success');
        });

        // Live clear errors on input
        ['reviewName','reviewDoctor','reviewTitle','reviewText'].forEach(id=>{
            document.getElementById(id).addEventListener('input',function(){
                this.classList.remove('error');
                const errMap={reviewName:'errorReviewName',reviewDoctor:'errorDoctor',reviewTitle:'errorTitle',reviewText:'errorReviewText'};
                document.getElementById(errMap[id]).classList.remove('show');
            });
        });

        // ===== INIT =====
        renderReviews();

        // Scroll reveal
        const ro=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible');});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
        document.querySelectorAll('.reveal').forEach(e=>ro.observe(e));
    </script>
</body>
</html>