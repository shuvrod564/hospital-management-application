<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> 
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}"> 
        
        @stack('styles')
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <!-- Main Wrapper -->
        <div class="main-wrapper">
            <!-- Header -->
            <div class="header">
            
                <!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('admin.dashboard') }}" class="logo">
                        <x-application-logo class="size-80 fill-current text-gray-500" />
                    </a>
                    <a href="{{ route('admin.dashboard') }}" class="logo logo-small">
                        <x-application-logo class="size-80 fill-current text-gray-500" />
                    </a>
                </div>
                <!-- /Logo -->
                
                <div class="menu-toggle">
                    <a href="javascript:void(0);" id="toggle_btn">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                
                <!-- Search Bar -->
                <div class="top-nav-search">
                    <form>
                        <input type="text" class="form-control" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search Bar -->
                
                <!-- Mobile Menu Toggle -->
                <a class="mobile_btn" id="mobile_btn">
                    <i class="fas fa-bars"></i>
                </a>
                <!-- /Mobile Menu Toggle -->
                
                <!-- Header Right Menu -->
                <ul class="nav user-menu"> 
                    <li  class="nav-item me-2">
                        <a href="<?php echo url('/'); ?>" class="nav-link header-nav-list" target="_blank">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                    </li>
                    
                    <!-- User Menu -->
                    <li class="nav-item dropdown has-arrow new-user-menus">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <div class="user-img">
                                <i class="fas fa-user-tie"></i>
                                <div class="user-text">
                                    <h6>Alice Johnson</h6>
                                    <p class="text-muted mb-0 text-uppercase">Administrator</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu">
                            <div class="user-header">
                                {{--<div class="avatar avatar-sm">
                                    <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                                </div>--}}
                                <div class="user-text">
                                    <h6>Alice Johnson</h6>
                                    <p class="text-muted mb-0">Administrator</p>
                                </div>
                            </div>
                            @if(config('app.env') != 'local')
                            <a href="{{ url('symlink.php') }}" class="dropdown-item">
                                Run Storage Link
                            </a>
                            @endif
                            
                            <form method="POST" action="{{ route('admin.logout') }}" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn btn-light w-100 mt-3 justify-content-center">
                                    <i class="fa-solid fa-right-from-bracket" style="color: rgb(86, 211, 62);"></i>
                                    {{ __('Log Out') }}
                                </button>
                            </form>  
                        </div>
                    </li>
                    <!-- /User Menu -->
                    
                </ul>
                <!-- /Header Right Menu -->
                
            </div>
            <!-- /Header -->
            
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu" style="min-height: calc(100vh - 200px);">
                        <ul> 
                            <li class="menu-title"> 
                                <span>Main Menu</span>
                            </li>
                            <li class=" {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-file"></i> <span> Dashboard</span></a> 
                            </li>
                            <li class="  ">
                                <a href="{{ route('admin.admin.appointments') }}" class="active"><i class="fas fa-file"></i> <span> appointments</span></a> 
                            </li>
                            <li class=" {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}" class="active"><i class="fas fa-file"></i> <span> Users</span></a> 
                            </li>
                            

                           
                             
                      {{--      <li class="menu-title"> 
                                <span>Settings</span>
                            </li> 
                            <li class=" {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.settings.index') }}">
                                    <i class="fas fa-cog"></i> <span>Settings</span>
                                </a>
                            </li>
                            <li class=" {{ request()->routeIs('admin.menu.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.menu.index') }}">
                                    <i class="fas fa-bars"></i> <span>Site Menu</span>
                                </a>
                            </li>
                            <li> 
                                <a href="{{ route('admin.manage.index') }}">
                                    <i class="fas fa-users"></i> <span>Manage Admins</span>
                                </a>
                            </li>--}}
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
            <!-- /Sidebar -->
            
            <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                {{--  @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif --}}


                {{ $slot }} 
                </div>			
            </div>
            <!-- /Page Wrapper -->
        
        </div>
        <!-- /Main Wrapper -->
         

        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script> 
        <!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> 
        <!-- Slimscroll JS -->
        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script> 
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Custom JS -->
        <script  src="{{ asset('assets/js/script.js?v=1') }}"></script>
        <script>
            // Auto-hide alerts
            document.querySelectorAll('.alert').forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
        </script>

        @stack('scripts')
    </body>
</html>
