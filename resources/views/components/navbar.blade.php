<nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand navbar-brand-text"
           href="{{ route('frontend.home') }}">
            Medi<span>Care</span>
        </a>

        {{-- Main Navigation --}}
        <div class="d-none d-lg-flex align-items-center gap-1 ms-auto">

            <a href="{{ route('frontend.about-us') }}"
               class="nav-link nav-link-custom">
                About Us
            </a>

            <a href="{{ route('frontend.home') }}#how-it-works"
               class="nav-link nav-link-custom">
                How It Works
            </a>

            <a href="{{ route('frontend.home') }}#specialties"
               class="nav-link nav-link-custom">
                Specialties
            </a>

            <a href="{{ route('frontend.doctors') }}#doctors"
               class="nav-link nav-link-custom">
                Doctors
            </a>

            <a href="{{ route('frontend.home') }}#testimonials"
               class="nav-link nav-link-custom">
                Reviews
            </a>

        </div>

        {{-- User Actions --}}
        <div class="d-none d-lg-flex align-items-center gap-2 ms-3">

            {{-- Appointment Button --}}
            <a href="#"
               class="btn btn-nav-cta">
                Book Appointment
            </a>

            {{-- If User Is Logged In --}}
            @auth
                <div class="dropdown ms-2">

                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="fas fa-user-circle me-1"></i>
                        {{ Auth::user()->name }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('user.appointments.index') }}">Appointments</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('user.profile.view') }}">
                                <i class="fas fa-user me-2"></i>
                                My Profile
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form method="POST"
                                  action="{{ route('user.logout') }}">
                                @csrf

                                <button type="submit"
                                        class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>
                                    Log Out
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>

            {{-- If User Is a Guest --}}
            @else
                <a href="{{ route('user.login') }}"
                   class="nav-link btn btn-outline-primary nav-link-custom">
                    Sign In
                </a>
            @endauth

        </div>

        {{-- Mobile Hamburger --}}
        <button class="d-lg-none border-0 bg-transparent fs-5"
                id="mobileMenuBtn"
                aria-label="Open menu"
                type="button">
            <i class="fas fa-bars" style="color: var(--dark);"></i>
        </button>

    </div>
</nav>


<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileOverlay"></div>
<div class="mobile-menu-panel" id="mobilePanel">
    <div class="d-flex justify-content-between align-items-center">
        <span class="navbar-brand-text" style="font-size:1.25rem;">Medi<span>Care</span></span>
        <button class="mobile-close-btn" id="mobileCloseBtn" aria-label="Close menu"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="mobile-nav-links">
        <a href="{{ route('frontend.about-us') }}"
            class="nav-link nav-link-custom">
            About Us
        </a>

        <a href="{{ route('frontend.home') }}#how-it-works"
            class="nav-link nav-link-custom">
            How It Works
        </a>

        <a href="{{ route('frontend.home') }}#specialties"
            class="nav-link nav-link-custom">
            Specialties
        </a>

        <a href="{{ route('frontend.home') }}#doctors"
            class="nav-link nav-link-custom">
            Doctors
        </a>

        <a href="{{ route('frontend.home') }}#testimonials"
            class="nav-link nav-link-custom">
            Reviews
        </a>
    </div>
    <a href="#" class="btn btn-nav-cta w-100 text-center">Book Appointment</a>
</div>