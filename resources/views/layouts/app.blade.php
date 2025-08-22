<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Drink Shop') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white text-dark">

<div id="app">
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light shadow-lg" style="background-color: #f8f9fa;">
 <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="{{ url('/') }}">
            <img src="{{ asset('storage/logo.png') }}" alt="Drink Shop" height="90">
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Kanan -->
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                <li class="nav-item me-3">
    <a href="{{ route('cart.view') }}" 
       class="btn btn-sm text-white" 
       style="background-color: #8B4513; transition: 0.3s;"
       onmouseover="this.style.backgroundColor='#A0522D';" 
       onmouseout="this.style.backgroundColor='#8B4513';">
        <i class="fas fa-shopping-cart"></i> Cart
    </a>
</li>

                @endauth

                @guest
                <li class="nav-item me-2">
    <a class="btn btn-sm" 
       href="{{ route('login') }}" 
       style="background-color:#8B4513; color:white; transition:0.3s;"
       onmouseover="this.style.backgroundColor='#A0522D';" 
       onmouseout="this.style.backgroundColor='#8B4513';">
       <i class="fas fa-sign-in-alt"></i> Login
    </a>
</li>
<li class="nav-item">
    <a class="btn btn-sm" 
       href="{{ route('register') }}" 
       style="background-color:#8B4513; color:white; transition:0.3s;"
       onmouseover="this.style.backgroundColor='#A0522D';" 
       onmouseout="this.style.backgroundColor='#8B4513';">
       <i class="fas fa-user-plus"></i> Register
    </a>
</li>

                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if(Auth::user()->isAdmin())
                            <li>
    <a class="dropdown-item" href="{{ route('admin.dashboard') }}" 
       style="background-color: transparent; color: #000; transition: 0.3s;" 
       onmouseover="this.style.backgroundColor='#8B4513'; this.style.color='#fff';" 
       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#000';">
       <i class="fas fa-tachometer-alt"></i> Admin Dashboard
    </a>
</li>

                            @endif
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main class="py-4">
        @if(session('success'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5 pb-3 mt-5 shadow-lg">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Kata Motivasi -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Kata Motivasi</h5>
                <p class="small fst-italic">
                    "Hidup itu seperti secangkir kopi, nikmati perlahan agar terasa nikmatnya."
                </p>
            </div>

            <!-- Google Maps -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Lokasi Kami</h5>
                <div class="ratio ratio-16x9 rounded shadow-sm overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed/v1/place?q=smk%20fatahillah%20cileungsi&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                        style="border:0; border-radius:0.5rem;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Jadwal Operasional -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Jadwal Operasional</h5>
                <ul class="list-unstyled small">
                    <li>Senin - Jumat: 07.00 - 22.00</li>
                    <li>Sabtu: 09.00 - 22.00</li>
                    <li>Minggu: Tutup</li>
                </ul>
            </div>
        </div>

        <hr class="border-light">

        <!-- Copyright + Social Media -->
        <div class="text-center">
            <p class="mb-2 small">&copy; {{ date('Y') }} <strong>MiloBoom</strong>. All rights reserved.</p>
            <div>
                <a href="#" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="https://wa.me/6281234567890" class="text-light me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@stack('scripts')
</body>
</html>


