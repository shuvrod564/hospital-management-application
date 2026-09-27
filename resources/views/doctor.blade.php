<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Doctors — MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0D9488;
            --primary-dark: #0F766E;
            --primary-light: #99F6E4;
            --primary-glow: rgba(13,148,136,0.25);
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
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Plus Jakarta Sans',sans-serif;color:var(--gray-700);overflow-x:hidden;-webkit-font-smoothing:antialiased;}
        h1,h2,h3,h4,h5,h6{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;}
        ::-webkit-scrollbar{width:8px;}
        ::-webkit-scrollbar-track{background:var(--gray-100);}
        ::-webkit-scrollbar-thumb{background:var(--primary);border-radius:99px;}

        /* NAVBAR */
        .navbar-custom{background:rgba(255,255,255,0.85);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid rgba(0,0,0,0.05);padding:0.75rem 0;transition:all 0.4s ease;z-index:1050;}
        .navbar-custom.scrolled{background:rgba(255,255,255,0.95);box-shadow:0 1px 20px rgba(0,0,0,0.08);padding:0.5rem 0;}
        .navbar-brand-text{font-weight:900;font-size:1.5rem;color:var(--dark)!important;letter-spacing:-0.5px;}
        .navbar-brand-text span{color:var(--primary);}
        .nav-link-custom{color:var(--gray-700)!important;font-weight:600;font-size:0.9rem;padding:0.5rem 1rem!important;border-radius:8px;transition:all 0.3s ease;}
        .nav-link-custom:hover{color:var(--primary)!important;background:var(--primary-glow);}
        .nav-link-custom.active{color:var(--primary)!important;background:var(--primary-glow);}
        .btn-nav-cta{background:var(--primary);color:var(--white)!important;font-weight:700;font-size:0.875rem;padding:0.6rem 1.5rem;border-radius:12px;border:none;transition:all 0.3s ease;box-shadow:0 4px 15px var(--primary-glow);}
        .btn-nav-cta:hover{background:var(--primary-dark);color:var(--white)!important;transform:translateY(-2px);box-shadow:0 8px 25px var(--primary-glow);}

        /* Mobile menu */
        .mobile-menu-overlay{position:fixed;inset:0;background:rgba(15,23,42,0.6);backdrop-filter:blur(5px);z-index:9998;opacity:0;visibility:hidden;transition:all 0.3s ease;}
        .mobile-menu-overlay.active{opacity:1;visibility:visible;}
        .mobile-menu-panel{position:fixed;top:0;right:-320px;width:300px;max-width:85vw;height:100%;background:var(--white);z-index:9999;padding:2rem;transition:right 0.4s cubic-bezier(0.25,0.46,0.45,0.94);overflow-y:auto;box-shadow:-10px 0 40px rgba(0,0,0,0.15);}
        .mobile-menu-panel.active{right:0;}
        .mobile-close-btn{background:none;border:none;font-size:1.25rem;color:var(--dark);cursor:pointer;padding:0.5rem;border-radius:8px;transition:background 0.3s;}
        .mobile-close-btn:hover{background:var(--gray-100);}
        .mobile-nav-links{list-style:none;padding:0;margin:2rem 0;}
        .mobile-nav-links li{border-bottom:1px solid var(--gray-100);}
        .mobile-nav-links a{display:block;padding:1rem 0;color:var(--dark);font-weight:600;text-decoration:none;transition:color 0.3s;}
        .mobile-nav-links a:hover{color:var(--primary);}

        /* Page hero */
        .page-hero{background:var(--hero-gradient);padding:7rem 0 3rem;position:relative;overflow:hidden;}
        .page-hero::before{content:'';position:absolute;top:-40%;right:-15%;width:600px;height:600px;background:radial-gradient(circle,rgba(13,148,136,0.25) 0%,transparent 70%);border-radius:50%;animation:hp 8s ease-in-out infinite;}
        @keyframes hp{0%,100%{transform:scale(1);opacity:0.5;}50%{transform:scale(1.12);opacity:1;}}
        .breadcrumb-custom{display:flex;gap:0.5rem;align-items:center;margin-bottom:1rem;}
        .breadcrumb-custom a{color:rgba(255,255,255,0.5);text-decoration:none;font-size:0.875rem;font-weight:500;transition:color 0.3s;}
        .breadcrumb-custom a:hover{color:var(--primary-light);}
        .breadcrumb-custom .separator{color:rgba(255,255,255,0.3);font-size:0.75rem;}
        .breadcrumb-custom .current{color:var(--primary-light);font-size:0.875rem;font-weight:600;}
        .page-hero h1{font-family:'Playfair Display',serif;color:var(--white);font-size:clamp(1.75rem,4vw,2.75rem);line-height:1.15;margin-bottom:0.5rem;}
        .page-hero .result-count{color:rgba(255,255,255,0.5);font-size:0.95rem;font-weight:500;}

        /* Filter bar */
        .filter-bar{
            background:var(--white);border:1px solid rgba(0,0,0,0.08);
            border-radius:18px;padding:1.25rem 1.5rem;margin-top:-2rem;
            position:relative;z-index:10;
            box-shadow:0 8px 40px rgba(0,0,0,0.08);
        }
        .filter-input-group{position:relative;}
        .filter-input-group i{position:absolute;left:1rem;top:50%;transform:translateY(-50%);color:var(--gray-500);font-size:0.85rem;}
        .filter-input-group input,
        .filter-input-group select{
            width:100%;padding:0.75rem 1rem 0.75rem 2.6rem;
            border:2px solid var(--gray-300);border-radius:12px;
            font-family:inherit;font-size:0.875rem;color:var(--dark);
            background:var(--white);transition:all 0.3s ease;-webkit-appearance:none;
        }
        .filter-input-group input:focus,
        .filter-input-group select:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px var(--primary-glow);}
        .filter-input-group select{cursor:pointer;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 1rem center;}
        .btn-filter-search{
            background:var(--primary);color:var(--white);font-weight:700;font-size:0.9rem;
            padding:0.75rem 1.75rem;border-radius:12px;border:none;
            transition:all 0.3s ease;box-shadow:0 4px 15px var(--primary-glow);
            display:inline-flex;align-items:center;gap:0.5rem;white-space:nowrap;height:100%;
        }
        .btn-filter-search:hover{background:var(--primary-dark);transform:translateY(-2px);box-shadow:0 8px 25px var(--primary-glow);}

        /* Active filter tags */
        .active-filters{display:flex;flex-wrap:wrap;gap:0.5rem;align-items:center;margin-top:1rem;}
        .active-filter-tag{
            display:inline-flex;align-items:center;gap:0.4rem;
            background:var(--primary-glow);color:var(--primary);font-size:0.8rem;
            font-weight:600;padding:0.35rem 0.85rem;border-radius:99px;
            cursor:pointer;transition:all 0.2s;
        }
        .active-filter-tag:hover{background:var(--primary);color:var(--white);}
        .active-filter-tag i{font-size:0.65rem;}
        .clear-all-btn{
            background:none;border:none;color:var(--gray-500);font-size:0.8rem;
            font-weight:600;cursor:pointer;text-decoration:underline;transition:color 0.2s;
        }
        .clear-all-btn:hover{color:var(--accent);}

        /* Main layout */
        .doctors-layout{padding:3rem 0 5rem;}
        .sidebar-filters{position:sticky;top:6rem;}
        .filter-section{margin-bottom:1.75rem;}
        .filter-section-title{
            font-size:0.85rem;font-weight:700;color:var(--dark);text-transform:uppercase;
            letter-spacing:0.5px;margin-bottom:0.85rem;display:flex;align-items:center;gap:0.5rem;
        }
        .filter-section-title i{color:var(--primary);font-size:0.8rem;}

        /* Custom checkbox */
        .filter-check{display:flex;align-items:center;gap:0.65rem;padding:0.4rem 0;cursor:pointer;font-size:0.88rem;color:var(--gray-700);transition:color 0.2s;}
        .filter-check:hover{color:var(--primary);}
        .filter-check input[type="checkbox"]{display:none;}
        .filter-check .checkmark{
            width:20px;height:20px;border:2px solid var(--gray-300);border-radius:6px;
            display:flex;align-items:center;justify-content:center;flex-shrink:0;
            transition:all 0.2s;font-size:0.65rem;color:transparent;
        }
        .filter-check input:checked + .checkmark{background:var(--primary);border-color:var(--primary);color:var(--white);}
        .filter-check .count{margin-left:auto;font-size:0.78rem;color:var(--gray-500);font-weight:500;}

        /* Price range slider */
        .price-range-display{display:flex;justify-content:space-between;font-size:0.82rem;color:var(--gray-500);margin-bottom:0.5rem;font-weight:600;}
        .price-range-display span{color:var(--dark);font-weight:700;}
        input[type="range"]{
            -webkit-appearance:none;width:100%;height:6px;border-radius:99px;
            background:var(--gray-300);outline:none;
        }
        input[type="range"]::-webkit-slider-thumb{
            -webkit-appearance:none;width:20px;height:20px;border-radius:50%;
            background:var(--primary);cursor:pointer;box-shadow:0 2px 8px var(--primary-glow);
        }

        /* Rating filter */
        .rating-option{display:flex;align-items:center;gap:0.5rem;padding:0.35rem 0;cursor:pointer;transition:opacity 0.2s;}
        .rating-option:hover{opacity:0.8;}
        .rating-option input{display:none;}
        .rating-option .stars{color:#F59E0B;font-size:0.8rem;}
        .rating-option .label{font-size:0.82rem;color:var(--gray-500);}

        /* Sort & View */
        .sort-bar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-bottom:1.5rem;}
        .sort-bar .result-text{font-size:0.9rem;color:var(--gray-500);}
        .sort-bar .result-text strong{color:var(--dark);font-weight:700;}
        .sort-controls{display:flex;align-items:center;gap:0.75rem;}
        .sort-select{
            padding:0.55rem 2rem 0.55rem 0.85rem;border:2px solid var(--gray-300);
            border-radius:10px;font-family:inherit;font-size:0.85rem;color:var(--dark);
            background:var(--white);-webkit-appearance:none;cursor:pointer;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right 0.75rem center;transition:all 0.3s;
        }
        .sort-select:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px var(--primary-glow);}
        .view-toggle{display:flex;gap:0.35rem;}
        .view-btn{
            width:38px;height:38px;border:2px solid var(--gray-300);border-radius:10px;
            background:var(--white);display:flex;align-items:center;justify-content:center;
            cursor:pointer;transition:all 0.2s;color:var(--gray-500);font-size:0.85rem;
        }
        .view-btn.active,.view-btn:hover{border-color:var(--primary);color:var(--primary);background:var(--primary-glow);}

        /* Doctor cards */
        .doctor-card{
            background:var(--white);border:1px solid rgba(0,0,0,0.06);
            border-radius:20px;overflow:hidden;transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);height:100%;
        }
        .doctor-card:hover{transform:translateY(-6px);box-shadow:var(--card-shadow-hover);}
        .doctor-img-wrap{position:relative;height:220px;overflow:hidden;background:var(--section-alt);}
        .doctor-img-wrap img{width:100%;height:100%;object-fit:cover;transition:transform 0.6s ease;}
        .doctor-card:hover .doctor-img-wrap img{transform:scale(1.06);}
        .doctor-badge-top{position:absolute;top:1rem;left:1rem;background:rgba(255,255,255,0.95);backdrop-filter:blur(8px);padding:0.25rem 0.75rem;border-radius:99px;font-size:0.72rem;font-weight:700;color:var(--primary);}
        .doctor-fav-btn{position:absolute;top:1rem;right:1rem;width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.95);backdrop-filter:blur(8px);border:none;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all 0.3s;color:var(--gray-500);font-size:0.85rem;}
        .doctor-fav-btn:hover,.doctor-fav-btn.active{background:#FEE2E2;color:#EF4444;}
        .doctor-available-badge{position:absolute;bottom:1rem;left:1rem;display:flex;align-items:center;gap:0.35rem;background:rgba(52,211,153,0.9);color:var(--white);padding:0.25rem 0.75rem;border-radius:99px;font-size:0.72rem;font-weight:700;}
        .doctor-available-badge .dot{width:6px;height:6px;background:var(--white);border-radius:50%;animation:pd 2s infinite;}
        @keyframes pd{0%,100%{opacity:1;}50%{opacity:0.4;}}
        .doctor-info{padding:1.35rem;}
        .doctor-info h5{color:var(--dark);font-weight:700;font-size:1.02rem;margin-bottom:0.15rem;}
        .doctor-specialty{color:var(--primary);font-size:0.82rem;font-weight:600;margin-bottom:0.65rem;}
        .doctor-meta{display:flex;align-items:center;gap:0.85rem;margin-bottom:0.85rem;font-size:0.8rem;color:var(--gray-500);flex-wrap:wrap;}
        .doctor-meta i{margin-right:0.2rem;}
        .doctor-rating{color:#F59E0B;}
        .doctor-tags{display:flex;flex-wrap:wrap;gap:0.35rem;margin-bottom:1rem;}
        .doctor-tag{font-size:0.72rem;font-weight:600;padding:0.2rem 0.6rem;border-radius:99px;background:var(--section-alt);color:var(--gray-500);}
        .doctor-bottom{display:flex;align-items:center;justify-content:space-between;padding-top:0.85rem;border-top:1px solid var(--gray-100);}
        .doctor-fee{font-size:0.78rem;color:var(--gray-500);}
        .doctor-fee strong{font-size:1.15rem;color:var(--dark);font-weight:800;}
        .btn-book-doc{background:var(--primary);color:var(--white);font-weight:700;font-size:0.8rem;padding:0.55rem 1.15rem;border-radius:12px;border:none;transition:all 0.3s ease;text-decoration:none;display:inline-flex;align-items:center;gap:0.4rem;}
        .btn-book-doc:hover{background:var(--primary-dark);color:var(--white);transform:translateY(-2px);box-shadow:0 6px 20px var(--primary-glow);}

        /* List view */
        .doctor-card.list-view{display:flex;flex-direction:row;}
        .doctor-card.list-view .doctor-img-wrap{width:240px;min-width:240px;height:auto;min-height:220px;}
        .doctor-card.list-view .doctor-info{display:flex;flex-direction:column;justify-content:center;flex:1;}

        /* No results */
        .no-results{text-align:center;padding:4rem 2rem;}
        .no-results i{font-size:3rem;color:var(--gray-300);margin-bottom:1rem;}
        .no-results h4{color:var(--dark);margin-bottom:0.5rem;}
        .no-results p{color:var(--gray-500);margin-bottom:1.5rem;}
        .btn-clear-filters{background:var(--primary);color:var(--white);font-weight:700;font-size:0.9rem;padding:0.7rem 1.5rem;border-radius:12px;border:none;transition:all 0.3s;}
        .btn-clear-filters:hover{background:var(--primary-dark);transform:translateY(-2px);}

        /* Pagination */
        .pagination-custom{display:flex;align-items:center;justify-content:center;gap:0.35rem;margin-top:2.5rem;}
        .page-btn{
            width:42px;height:42px;border:2px solid var(--gray-300);border-radius:12px;
            background:var(--white);display:flex;align-items:center;justify-content:center;
            font-weight:700;font-size:0.875rem;color:var(--gray-700);cursor:pointer;
            transition:all 0.2s;font-family:inherit;
        }
        .page-btn:hover{border-color:var(--primary);color:var(--primary);background:var(--primary-glow);}
        .page-btn.active{background:var(--primary);border-color:var(--primary);color:var(--white);box-shadow:0 4px 15px var(--primary-glow);}
        .page-btn:disabled{opacity:0.4;cursor:default;pointer-events:none;}
        .page-btn.dots{border:none;background:none;cursor:default;}

        /* Mobile filter toggle */
        .mobile-filter-toggle{
            display:none;width:100%;padding:0.85rem;border:2px solid var(--gray-300);
            border-radius:14px;background:var(--white);font-family:inherit;font-size:0.9rem;
            font-weight:700;color:var(--dark);cursor:pointer;transition:all 0.3s;
            margin-bottom:1rem;align-items:center;justify-content:center;gap:0.5rem;
        }
        .mobile-filter-toggle:hover{border-color:var(--primary);color:var(--primary);}

        /* Sidebar collapse on mobile */
        .sidebar-col{transition:all 0.3s ease;}
        .sidebar-backdrop{
            display:none;position:fixed;inset:0;background:rgba(15,23,42,0.5);
            z-index:1000;backdrop-filter:blur(4px);
        }
        .sidebar-backdrop.active{display:block;}

        /* Footer */
        .footer-section{background:var(--dark);color:rgba(255,255,255,0.6);padding:5rem 0 0;}
        .footer-brand{font-weight:900;font-size:1.5rem;color:var(--white);margin-bottom:1rem;}
        .footer-brand span{color:var(--primary);}
        .footer-desc{font-size:0.9rem;line-height:1.7;max-width:320px;margin-bottom:1.5rem;}
        .footer-socials{display:flex;gap:0.75rem;}
        .footer-socials a{width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,0.06);display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.6);transition:all 0.3s ease;text-decoration:none;}
        .footer-socials a:hover{background:var(--primary);color:var(--white);transform:translateY(-3px);}
        .footer-heading{color:var(--white);font-weight:700;font-size:1rem;margin-bottom:1.25rem;}
        .footer-links{list-style:none;padding:0;margin:0;}
        .footer-links li{margin-bottom:0.6rem;}
        .footer-links a{color:rgba(255,255,255,0.5);text-decoration:none;font-size:0.9rem;transition:all 0.3s ease;display:inline-flex;align-items:center;gap:0.4rem;}
        .footer-links a:hover{color:var(--primary-light);transform:translateX(4px);}
        .footer-contact-item{display:flex;align-items:flex-start;gap:0.85rem;margin-bottom:1rem;font-size:0.9rem;}
        .footer-contact-item i{color:var(--primary);margin-top:0.2rem;width:18px;text-align:center;}
        .footer-bottom{border-top:1px solid rgba(255,255,255,0.08);padding:1.5rem 0;margin-top:4rem;font-size:0.85rem;}
        .footer-bottom a{color:var(--primary-light);text-decoration:none;}
        .footer-bottom a:hover{text-decoration:underline;}

        /* Toast */
        .custom-toast{position:fixed;bottom:2rem;right:2rem;background:var(--dark);color:var(--white);padding:1rem 1.5rem;border-radius:14px;font-size:0.9rem;font-weight:600;display:flex;align-items:center;gap:0.75rem;box-shadow:0 15px 50px rgba(0,0,0,0.3);z-index:9999;transform:translateY(120%);opacity:0;transition:all 0.5s cubic-bezier(0.68,-0.55,0.27,1.55);}
        .custom-toast.show{transform:translateY(0);opacity:1;}
        .custom-toast .toast-icon{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:0.85rem;flex-shrink:0;}
        .custom-toast .toast-icon.success{background:rgba(52,211,153,0.2);color:#34D399;}
        .custom-toast .toast-icon.info{background:rgba(59,130,246,0.2);color:#60A5FA;}

        .back-to-top{position:fixed;bottom:2rem;left:2rem;width:48px;height:48px;border-radius:14px;background:var(--primary);color:var(--white);border:none;font-size:1.1rem;display:flex;align-items:center;justify-content:center;cursor:pointer;box-shadow:0 6px 20px var(--primary-glow);z-index:999;opacity:0;transform:translateY(20px);transition:all 0.4s ease;pointer-events:none;}
        .back-to-top.visible{opacity:1;transform:translateY(0);pointer-events:all;}
        .back-to-top:hover{background:var(--primary-dark);transform:translateY(-3px);}

        @media(max-width:991.98px){
            .mobile-filter-toggle{display:inline-flex;}
            .sidebar-col{
                position:fixed;top:0;left:-320px;width:300px;max-width:85vw;height:100%;
                background:var(--white);z-index:1001;padding:1.5rem;overflow-y:auto;
                box-shadow:10px 0 40px rgba(0,0,0,0.15);transition:left 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
            }
            .sidebar-col.open{left:0;}
            .sidebar-col .filter-section-title{margin-top:1.5rem;}
            .sidebar-col .filter-section-title:first-child{margin-top:2.5rem;}
            .doctor-card.list-view{flex-direction:column;}
            .doctor-card.list-view .doctor-img-wrap{width:100%;min-width:100%;height:200px;}
        }
        @media(max-width:767.98px){
            .page-hero{padding:6rem 0 2.5rem;}
            .filter-bar{padding:1rem;border-radius:14px;margin-top:-1.5rem;}
        }
        @media(prefers-reduced-motion:reduce){
            *,*::before,*::after{animation-duration:0.01ms!important;transition-duration:0.01ms!important;}
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
                <span class="current">Find Doctors</span>
            </div>
            <h1>Find Your Doctor</h1>
            <p class="result-count" id="resultCountText">Showing 12 doctors available near you</p>
        </div>
    </section>

    <!-- FILTER BAR -->
    <div class="container">
        <div class="filter-bar" id="filterBar">
         
            <div class="row g-2 align-items-end">
                <div class="col-md-3">
                    <div class="filter-input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Doctor name or keyword..." id="filterSearch">
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="filter-input-group">
                        <i class="fas fa-stethoscope"></i>
                        <select id="filterSpecialty">
                            <option value="">All Specialties</option>
                            @foreach($specialties as $item)
                                <option option="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="filter-input-group">
                        <i class="fas fa-location-dot"></i>
                        <select id="filterLocation">
                            <option value="">All Locations</option>
                            <option value="New York">New York</option>
                            <option value="Los Angeles">Los Angeles</option>
                            <option value="Chicago">Chicago</option>
                            <option value="Houston">Houston</option>
                            <option value="Miami">Miami</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="filter-input-group">
                        <i class="fas fa-dollar-sign"></i>
                        <select id="filterPrice">
                            <option value="">Any Price</option>
                            <option value="0-100">Under $100</option>
                            <option value="100-150">$100 — $150</option>
                            <option value="150-200">$150 — $200</option>
                            <option value="200-999">$200+</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <button class="btn-filter-search w-100" id="btnApplyFilters">
                        <i class="fas fa-magnifying-glass"></i> Search Doctors
                    </button>
                </div>
            </div>
            <div class="active-filters" id="activeFilters"></div>
        </div>
    </div>

    <!-- DOCTORS LAYOUT -->
    <section class="doctors-layout">
        <div class="container">
            <div class="row g-4">
                <!-- SIDEBAR -->
                <div class="col-lg-3 sidebar-col" id="sidebarCol">
                    <button class="d-lg-none" id="closeSidebar" style="position:absolute;top:1rem;right:1rem;background:none;border:none;font-size:1.25rem;cursor:pointer;color:var(--dark);z-index:10;" aria-label="Close filters">
                        <i class="fas fa-xmark"></i>
                    </button>
                    <div class="sidebar-filters">

                        <!-- Availability -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-circle-dot"></i> Availability</div>
                            <label class="filter-check"><input type="checkbox" data-filter="available" value="today"><span class="checkmark"><i class="fas fa-check"></i></span> Available Today <span class="count">8</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="available" value="this-week"><span class="checkmark"><i class="fas fa-check"></i></span> This Week <span class="count">12</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="available" value="video"><span class="checkmark"><i class="fas fa-check"></i></span> Video Consult <span class="count">10</span></label>
                        </div>

                        <!-- Specialty -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-stethoscope"></i> Specialty</div>
                            @foreach($specialties as $item) 
                                <label class="filter-check">
                                    <input type="checkbox" data-filter="specialty" value="{{ $item }}">
                                    <span class="checkmark"><i class="fas fa-check"></i></span> {{ $item }} <span class="count">3</span>
                                </label>
                            @endforeach
                            {{-- <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Neurology"><span class="checkmark"><i class="fas fa-check"></i></span> Neurology <span class="count">2</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Dermatology"><span class="checkmark"><i class="fas fa-check"></i></span> Dermatology <span class="count">2</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Orthopedics"><span class="checkmark"><i class="fas fa-check"></i></span> Orthopedics <span class="count">2</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Pediatrics"><span class="checkmark"><i class="fas fa-check"></i></span> Pediatrics <span class="count">1</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Ophthalmology"><span class="checkmark"><i class="fas fa-check"></i></span> Ophthalmology <span class="count">1</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="specialty" value="Dental"><span class="checkmark"><i class="fas fa-check"></i></span> Dental <span class="count">1</span></label>--}}
                        </div>

                        <!-- Rating -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-star"></i> Rating</div>
                            <label class="rating-option"><input type="radio" name="rating" value="4.5"><span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-stroke"></i></span><span class="label">4.5 & up</span></label>
                            <label class="rating-option"><input type="radio" name="rating" value="4"><span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span><span class="label">4.0 & up</span></label>
                            <label class="rating-option"><input type="radio" name="rating" value="3.5"><span class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-stroke"></i><i class="far fa-star"></i></span><span class="label">3.5 & up</span></label>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-dollar-sign"></i> Price Range</div>
                            <div class="price-range-display">
                                <span>$<span id="priceMin">0</span></span>
                                <span>$<span id="priceMax">300</span></span>
                            </div>
                            <input type="range" min="0" max="300" value="300" id="priceSlider">
                        </div>

                        <!-- Location -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-map-marker-alt"></i> Location</div>
                            <label class="filter-check"><input type="checkbox" data-filter="location" value="New York"><span class="checkmark"><i class="fas fa-check"></i></span> New York <span class="count">4</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="location" value="Los Angeles"><span class="checkmark"><i class="fas fa-check"></i></span> Los Angeles <span class="count">3</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="location" value="Chicago"><span class="checkmark"><i class="fas fa-check"></i></span> Chicago <span class="count">2</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="location" value="Houston"><span class="checkmark"><i class="fas fa-check"></i></span> Houston <span class="count">2</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="location" value="Miami"><span class="checkmark"><i class="fas fa-check"></i></span> Miami <span class="count">1</span></label>
                        </div>

                        <!-- Gender -->
                        <div class="filter-section">
                            <div class="filter-section-title"><i class="fas fa-user"></i> Gender</div>
                            <label class="filter-check"><input type="checkbox" data-filter="gender" value="Male"><span class="checkmark"><i class="fas fa-check"></i></span> Male <span class="count">7</span></label>
                            <label class="filter-check"><input type="checkbox" data-filter="gender" value="Female"><span class="checkmark"><i class="fas fa-check"></i></span> Female <span class="count">5</span></label>
                        </div>

                    </div>
                </div>
                <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

                <!-- RESULTS -->
                <div class="col-lg-9">
                    <!-- Mobile filter toggle -->
                    <button class="mobile-filter-toggle" id="mobileFilterToggle">
                        <i class="fas fa-sliders"></i> Filters & Sort
                    </button>

                    <!-- Sort bar -->
                    <div class="sort-bar">
                        <div class="result-text" id="sortResultText"><strong>12</strong> doctors found</div>
                        <div class="sort-controls">
                            <select class="sort-select" id="sortSelect">
                                <option value="relevance">Sort: Relevance</option>
                                <option value="rating">Highest Rated</option>
                                <option value="experience">Most Experienced</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                            </select>
                            <div class="view-toggle">
                                <button class="view-btn active" data-view="grid" aria-label="Grid view"><i class="fas fa-grid-2"></i></button>
                                <button class="view-btn" data-view="list" aria-label="List view"><i class="fas fa-list"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Cards Grid -->
                    <div class="row g-4" id="doctorsGrid">
                        <!-- Cards injected by JS -->
                    </div>

                    <!-- No Results -->
                    <div class="no-results d-none" id="noResults">
                        <i class="fas fa-user-doctor"></i>
                        <h4>No Doctors Found</h4>
                        <p>Try adjusting your filters or search terms to find available doctors.</p>
                        <button class="btn-clear-filters" id="btnClearAll">Clear All Filters</button>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-custom" id="pagination">
                        <!-- Injected by JS -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <x-footer />

    @php
        $doctorsList = $doctors->getCollection()->map(function ($doctor) {
            $profile = $doctor->profile;
            $meta = $profile?->meta ?? [];

            return [
                'id' => $doctor->id,
                'name' =>  $doctor->name,
                'specialty' => $meta['department'] ?? 'General Physician',
                'sub' => $doctor['sub'] ?? 'Doctor',
                'rating' => (float) ($doctor['rating'] ?? 0),
                'experience' => (int) ($doctor['experience'] ?? 0),
                'fee' => (float) ($doctor['consultation_fee'] ?? 0),
                'location' => $doctor['location'] ?? 'Not specified',
                'gender' => $doctor?->gender ?? '',
                'available' => (bool) ($doctor['available'] ?? false),
                'video' => (bool) ($doctor['video_consult'] ?? false),
                'tags' => $doctor['tags'] ?? [],
                'img' => $doctor['img']?->avatar
                    ? asset('storage/' . $profile->avatar)
                    : asset('images/default-doctor.png'),
            ];
        })->values();

        dd($doctorsList);
    @endphp

    <script>
        const doctors = @json($doctorsList);
        const specialitiesList = @json($specialties);
        console.log(specialitiesList);
    </script>

    <script>
        // ===== Toast =====
        function showToast(m, t = 'success') {
            const e = document.getElementById('customToast'), s = document.getElementById('toastMessage'), i = e.querySelector('.toast-icon');
            s.textContent = m; i.className = 'toast-icon ' + t;
            i.innerHTML = t === 'success' ? '<i class="fas fa-check"></i>' : '<i class="fas fa-info"></i>';
            e.classList.add('show'); clearTimeout(e._t); e._t = setTimeout(() => e.classList.remove('show'), 3500);
        }

        // ===== Navbar =====
        const mainNav = document.getElementById('mainNav');
        window.addEventListener('scroll', () => mainNav.classList.toggle('scrolled', window.scrollY > 50));

        // ===== Back to top =====
        const btt = document.getElementById('backToTop');
        window.addEventListener('scroll', () => btt.classList.toggle('visible', window.scrollY > 600));
        btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // ===== Mobile menu =====
        const mo = document.getElementById('mobileOverlay'), mp = document.getElementById('mobilePanel');
        function openM() { mo.classList.add('active'); mp.classList.add('active'); document.body.style.overflow = 'hidden'; }
        function closeM() { mo.classList.remove('active'); mp.classList.remove('active'); document.body.style.overflow = ''; }
        document.getElementById('mobileMenuBtn').addEventListener('click', openM);
        document.getElementById('mobileCloseBtn').addEventListener('click', closeM);
        mo.addEventListener('click', closeM);
        mp.querySelectorAll('a').forEach(l => l.addEventListener('click', closeM));

        // ===== Sidebar mobile =====
        const sidebarCol = document.getElementById('sidebarCol');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        document.getElementById('mobileFilterToggle').addEventListener('click', () => {
            sidebarCol.classList.add('open');
            sidebarBackdrop.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        function closeSidebar() {
            sidebarCol.classList.remove('open');
            sidebarBackdrop.classList.remove('active');
            document.body.style.overflow = '';
        }
        document.getElementById('closeSidebar').addEventListener('click', closeSidebar);
        sidebarBackdrop.addEventListener('click', closeSidebar);

        // ===== DOCTOR DATA =====
        // const doctors = [
        //     { id:1, name:"Dr. Sarah Mitchell", specialty:"Cardiology", sub:"Interventional Cardiologist", rating:4.9, experience:15, fee:150, location:"New York", gender:"Female", available:true, video:true, tags:["Heart Disease","Hypertension","ECG"], img:"doc-sarah" },
        //     { id:2, name:"Dr. James Carter", specialty:"Neurology", sub:"Consultant Neurologist", rating:4.8, experience:12, fee:180, location:"Los Angeles", gender:"Male", available:true, video:true, tags:["Migraine","Epilepsy","Stroke"], img:"doc-james" },
        //     { id:3, name:"Dr. Emily Zhang", specialty:"Dermatology", sub:"Cosmetic Dermatologist", rating:5.0, experience:10, fee:120, location:"New York", gender:"Female", available:true, video:false, tags:["Acne","Skin Cancer","Botox"], img:"doc-emily" },
        //     { id:4, name:"Dr. Michael Brooks", specialty:"Orthopedics", sub:"Orthopedic Surgeon", rating:4.7, experience:18, fee:200, location:"Chicago", gender:"Male", available:false, video:false, tags:["Joint Replacement","Sports Injury","Spine"], img:"doc-michael" },
        //     { id:5, name:"Dr. Aisha Patel", specialty:"Pediatrics", sub:"General Pediatrician", rating:4.9, experience:8, fee:90, location:"Houston", gender:"Female", available:true, video:true, tags:["Vaccinations","Growth","Nutrition"], img:"doc-aisha" },
        //     { id:6, name:"Dr. Robert Kim", specialty:"Cardiology", sub:"Electrophysiologist", rating:4.6, experience:14, fee:175, location:"Los Angeles", gender:"Male", available:true, video:true, tags:["Arrhythmia","Pacemaker","AFib"], img:"doc-robert" },
        //     { id:7, name:"Dr. Laura Mendez", specialty:"Ophthalmology", sub:"Retina Specialist", rating:4.8, experience:11, fee:160, location:"Miami", gender:"Female", available:false, video:false, tags:["Retina","LASIK","Glaucoma"], img:"doc-laura" },
        //     { id:8, name:"Dr. David Okafor", specialty:"Dental", sub:"Oral & Maxillofacial Surgeon", rating:4.5, experience:9, fee:95, location:"Chicago", gender:"Male", available:true, video:false, tags:["Wisdom Teeth","Implants","Braces"], img:"doc-david" },
        //     { id:9, name:"Dr. Nina Volkov", specialty:"Neurology", sub:"Movement Disorder Specialist", rating:4.9, experience:16, fee:220, location:"New York", gender:"Female", available:true, video:true, tags:["Parkinson's","Tremor","Dystonia"], img:"doc-nina" },
        //     { id:10, name:"Dr. Carlos Rivera", specialty:"Dermatology", sub:"Clinical Dermatologist", rating:4.4, experience:7, fee:100, location:"Houston", gender:"Male", available:false, video:false, tags:["Psoriasis","Eczema","Hair Loss"], img:"doc-carlos" },
        //     { id:11, name:"Dr. Hannah Lee", specialty:"Orthopedics", sub:"Sports Medicine Specialist", rating:4.8, experience:13, fee:170, location:"Los Angeles", gender:"Female", available:true, video:true, tags:["ACL","Fractures","Rehab"], img:"doc-hannah" },
        //     { id:12, name:"Dr. Thomas Wright", specialty:"Pulmonology", sub:"Critical Care Pulmonologist", rating:4.7, experience:20, fee:190, location:"New York", gender:"Male", available:true, video:true, tags:["Asthma","COPD","COVID-19"], img:"doc-thomas" },
        // ];

        // ===== STATE =====
        let currentView = 'grid';
        let currentPage = 1;
        const perPage = 6;

        // ===== FILTER LOGIC =====
        function getActiveFilters() {
            const f = { search: '', specialties: [], locations: [], genders: [], available: [], rating: null, priceMax: 300, priceRange: '' };
            f.search = document.getElementById('filterSearch').value.trim().toLowerCase();

            // Top bar selects
            const barSpec = document.getElementById('filterSpecialty').value;
            const barLoc = document.getElementById('filterLocation').value;
            const barPrice = document.getElementById('filterPrice').value;

            // Sidebar checkboxes
            document.querySelectorAll('[data-filter="specialty"]:checked').forEach(c => f.specialties.push(c.value));
            document.querySelectorAll('[data-filter="location"]:checked').forEach(c => f.locations.push(c.value));
            document.querySelectorAll('[data-filter="gender"]:checked').forEach(c => f.genders.push(c.value));
            document.querySelectorAll('[data-filter="available"]:checked').forEach(c => f.available.push(c.value));

            // Rating radio
            const ratingChecked = document.querySelector('input[name="rating"]:checked');
            if (ratingChecked) f.rating = parseFloat(ratingChecked.value);

            // Price slider
            f.priceMax = parseInt(document.getElementById('priceSlider').value);

            // Merge top bar with sidebar
            if (barSpec && !f.specialties.includes(barSpec)) f.specialties.push(barSpec);
            if (barLoc && !f.locations.includes(barLoc)) f.locations.push(barLoc);
            if (barPrice) f.priceRange = barPrice;

            return f;
        }

        function filterDoctors(filters) {
            return doctors.filter(d => {
                if (filters.search && !d.name.toLowerCase().includes(filters.search) && !d.specialty.toLowerCase().includes(filters.search) && !d.sub.toLowerCase().includes(filters.search) && !d.tags.some(t => t.toLowerCase().includes(filters.search))) return false;
                if (filters.specialties.length && !filters.specialties.includes(d.specialty)) return false;
                if (filters.locations.length && !filters.locations.includes(d.location)) return false;
                if (filters.genders.length && !filters.genders.includes(d.gender)) return false;
                if (filters.rating && d.rating < filters.rating) return false;
                if (d.fee > filters.priceMax) return false;
                if (filters.priceRange) {
                    const [min, max] = filters.priceRange.split('-').map(Number);
                    if (d.fee < min || d.fee > max) return false;
                }
                if (filters.available.includes('today') && !d.available) return false;
                if (filters.available.includes('video') && !d.video) return false;
                return true;
            });
        }

        function sortDoctors(list) {
            const sort = document.getElementById('sortSelect').value;
            const sorted = [...list];
            switch (sort) {
                case 'rating': sorted.sort((a, b) => b.rating - a.rating); break;
                case 'experience': sorted.sort((a, b) => b.experience - a.experience); break;
                case 'price-low': sorted.sort((a, b) => a.fee - b.fee); break;
                case 'price-high': sorted.sort((a, b) => b.fee - a.fee); break;
                default: sorted.sort((a, b) => (b.available ? 1 : 0) - (a.available ? 1 : 0) || b.rating - a.rating);
            }
            return sorted;
        }

        // ===== RENDER =====
        function renderDoctors() {
            const filters = getActiveFilters();
            let filtered = filterDoctors(filters);
            filtered = sortDoctors(filtered);

            const total = filtered.length;
            const totalPages = Math.max(1, Math.ceil(total / perPage));
            if (currentPage > totalPages) currentPage = totalPages;
            const start = (currentPage - 1) * perPage;
            const pageDocs = filtered.slice(start, start + perPage);

            const grid = document.getElementById('doctorsGrid');
            const noRes = document.getElementById('noResults');
            const pag = document.getElementById('pagination');

            // Update count texts
            document.getElementById('resultCountText').textContent = `Showing ${total} doctor${total !== 1 ? 's' : ''} available near you`;
            document.getElementById('sortResultText').innerHTML = `<strong>${total}</strong> doctor${total !== 1 ? 's' : ''} found`;

            if (total === 0) {
                grid.innerHTML = '';
                noRes.classList.remove('d-none');
                pag.innerHTML = '';
                renderActiveFilters(filters);
                return;
            }
            noRes.classList.add('d-none');

            const isGrid = currentView === 'grid';
            grid.className = isGrid ? 'row g-4' : 'row g-4';
            // In list view, make single column
            const colClass = isGrid ? 'col-md-6' : 'col-12';

            grid.innerHTML = pageDocs.map(d => `
                <div class="${colClass}">
                    <div class="doctor-card${isGrid ? '' : ' list-view'}">
                        <div class="doctor-img-wrap">
                            <img src="${d.img}" alt="${d.name}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="doctor-img-error" style="display: none; width: 100%; height: 100%; background: #f8f9fa; align-items: center; justify-content: center; color: #6c757d; font-size: 0.85rem; border-radius: 8px;">
                                <i class="fas fa-user-md me-1"></i> Image Unavailable
                            </div>
                            <div class="doctor-badge-top">${d.specialty}</div>
                            <button class="doctor-fav-btn" data-id="${d.id}" aria-label="Add to favorites"><i class="far fa-heart"></i></button>
                            ${d.available ? '<div class="doctor-available-badge"><span class="dot"></span> Available Today</div>' : ''}
                        </div>
                        <div class="doctor-info">
                            <h5>${d.name}</h5>
                            <div class="doctor-specialty">${d.sub}</div>
                            <div class="doctor-meta">
                                <span class="doctor-rating"><i class="fas fa-star"></i> ${d.rating}</span>
                                <span><i class="fas fa-clock"></i> ${d.experience} yrs</span>
                                <span><i class="fas fa-location-dot"></i> ${d.location}</span>
                                ${d.video ? '<span><i class="fas fa-video"></i> Video</span>' : ''}
                            </div>
                            <div class="doctor-tags">${d.tags.map(t => `<span class="doctor-tag">${t}</span>`).join('')}</div>
                            <div class="doctor-bottom">
                                <div class="doctor-fee">$<strong>${d.fee}</strong>/visit</div>
                                <a href="#" class="btn-book-doc" data-name="${d.name}">Book Now <i class="fas fa-arrow-right" style="font-size:0.7rem;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');

            // Render pagination
            let pagHTML = `<button class="page-btn" data-page="${currentPage - 1}" ${currentPage === 1 ? 'disabled' : ''}><i class="fas fa-chevron-left" style="font-size:0.7rem;"></i></button>`;
            for (let i = 1; i <= totalPages; i++) {
                if (totalPages > 7) {
                    if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                        pagHTML += `<button class="page-btn${i === currentPage ? ' active' : ''}" data-page="${i}">${i}</button>`;
                    } else if (i === currentPage - 2 || i === currentPage + 2) {
                        pagHTML += `<span class="page-btn dots">...</span>`;
                    }
                } else {
                    pagHTML += `<button class="page-btn${i === currentPage ? ' active' : ''}" data-page="${i}">${i}</button>`;
                }
            }
            pagHTML += `<button class="page-btn" data-page="${currentPage + 1}" ${currentPage === totalPages ? 'disabled' : ''}><i class="fas fa-chevron-right" style="font-size:0.7rem;"></i></button>`;
            pag.innerHTML = pagHTML;

            renderActiveFilters(filters);
            bindCardEvents();
        }

        function renderActiveFilters(filters) {
            const container = document.getElementById('activeFilters');
            const tags = [];
            if (filters.search) tags.push({ label: `"${filters.search}"`, clear: () => { document.getElementById('filterSearch').value = ''; } });
            filters.specialties.forEach(s => tags.push({ label: s, clear: () => {
                document.querySelectorAll(`[data-filter="specialty"][value="${s}"]`).forEach(c => c.checked = false);
                const sel = document.getElementById('filterSpecialty'); if (sel.value === s) sel.value = '';
            }}));
            filters.locations.forEach(l => tags.push({ label: l, clear: () => {
                document.querySelectorAll(`[data-filter="location"][value="${l}"]`).forEach(c => c.checked = false);
                const sel = document.getElementById('filterLocation'); if (sel.value === l) sel.value = '';
            }}));
            filters.genders.forEach(g => tags.push({ label: g, clear: () => { document.querySelectorAll(`[data-filter="gender"][value="${g}"]`).forEach(c => c.checked = false); } }));
            filters.available.forEach(a => tags.push({ label: a === 'today' ? 'Available Today' : a === 'video' ? 'Video Consult' : 'This Week', clear: () => { document.querySelectorAll(`[data-filter="available"][value="${a}"]`).forEach(c => c.checked = false); } }));
            if (filters.rating) tags.push({ label: `${filters.rating}+ Stars`, clear: () => { document.querySelector('input[name="rating"]:checked').checked = false; } });
            if (filters.priceMax < 300) tags.push({ label: `Under $${filters.priceMax}`, clear: () => { document.getElementById('priceSlider').value = 300; document.getElementById('priceMax').textContent = '300'; } });

            if (tags.length === 0) { container.innerHTML = ''; return; }

            container.innerHTML = tags.map((t, i) => `<span class="active-filter-tag" data-idx="${i}">${t.label} <i class="fas fa-xmark"></i></span>`).join('') +
                `<button class="clear-all-btn">Clear All</button>`;

            // Bind clear events
            container.querySelectorAll('.active-filter-tag').forEach((el, i) => {
                el.addEventListener('click', () => { tags[i].clear(); currentPage = 1; renderDoctors(); });
            });
            container.querySelector('.clear-all-btn').addEventListener('click', clearAllFilters);
        }

        function clearAllFilters() {
            document.getElementById('filterSearch').value = '';
            document.getElementById('filterSpecialty').value = '';
            document.getElementById('filterLocation').value = '';
            document.getElementById('filterPrice').value = '';
            document.getElementById('priceSlider').value = 300;
            document.getElementById('priceMax').textContent = '300';
            document.querySelectorAll('.sidebar-filters input[type="checkbox"], .sidebar-filters input[type="radio"]').forEach(i => i.checked = false);
            currentPage = 1;
            renderDoctors();
            showToast('All filters cleared', 'info');
        }

        function bindCardEvents() {
            document.querySelectorAll('.doctor-fav-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    this.classList.toggle('active');
                    const icon = this.querySelector('i');
                    if (this.classList.contains('active')) {
                        icon.classList.replace('far', 'fas');
                        showToast('Added to favorites', 'success');
                    } else {
                        icon.classList.replace('fas', 'far');
                        showToast('Removed from favorites', 'info');
                    }
                });
            });
            document.querySelectorAll('.btn-book-doc').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    showToast(`Booking ${this.dataset.name} — redirecting...`, 'success');
                });
            });
        }

        // ===== EVENT LISTENERS =====
        // Top bar search button
        document.getElementById('btnApplyFilters').addEventListener('click', () => {
            currentPage = 1;
            renderDoctors();
            showToast('Filters applied', 'success');
            closeSidebar();
        });

        // Enter key on search
        document.getElementById('filterSearch').addEventListener('keydown', e => {
            if (e.key === 'Enter') { currentPage = 1; renderDoctors(); }
        });

        // Sidebar checkboxes & radios - live filter
        document.querySelectorAll('.sidebar-filters input').forEach(input => {
            input.addEventListener('change', () => { currentPage = 1; renderDoctors(); });
        });

        // Price slider
        document.getElementById('priceSlider').addEventListener('input', function () {
            document.getElementById('priceMax').textContent = this.value;
            currentPage = 1;
            renderDoctors();
        });

        // Sort
        document.getElementById('sortSelect').addEventListener('change', () => { currentPage = 1; renderDoctors(); });

        // View toggle
        document.querySelectorAll('.view-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                currentView = this.dataset.view;
                renderDoctors();
            });
        });

        // Pagination
        document.getElementById('pagination').addEventListener('click', function (e) {
            const btn = e.target.closest('.page-btn');
            if (!btn || btn.disabled || btn.classList.contains('dots')) return;
            currentPage = parseInt(btn.dataset.page);
            renderDoctors();
            // Scroll to top of results
            document.getElementById('filterBar').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });

        // Clear all
        document.getElementById('btnClearAll').addEventListener('click', clearAllFilters);

        // Top bar selects also trigger live filter
        ['filterSpecialty', 'filterLocation', 'filterPrice'].forEach(id => {
            document.getElementById(id).addEventListener('change', () => { currentPage = 1; renderDoctors(); });
        });

        // ===== INIT =====
        renderDoctors();
    </script>
</body>
</html>