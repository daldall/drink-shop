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

     <!-- Navbar -->
<nav class="navbar navbar-expand-lg" 
     style="background-color:rgb(249, 249, 249); z-index:1030; box-shadow:0 3px 10px rgba(0,0,0,0.1); padding: 1.5rem 0;">
    
    <div class="container-fluid" style="max-width:1200px; padding-left:0; padding-right:0;">

        <!-- Logo -->
        <a class="navbar-brand m-0 p-0" href="{{ url('/') }}" 
           style="height:90px; display:block; margin-left:0; padding-left:0;">
            <img src="{{ asset('images/logo-removebg-preview.png') }}" 
                 alt="MiloBoom" 
                 style="height:90px; display:block;">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                style="border:none;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav" 
             style="margin-top:0;">
            <ul class="navbar-nav ms-auto align-items-center" 
                style="font-size:1.15rem; font-weight:500;">

                @guest
                    <li class="nav-item me-4">
                        <a href="{{ route('login') }}" 
                           style="color:#333; padding:8px 0; font-weight:500; text-decoration:none; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                           onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                           onmouseout="this.style.color='#333'; this.style.borderBottom='2px solid transparent';">
                            <i class="fas fa-sign-in-alt me-2"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" 
                           style="color:#333; padding:8px 0; font-weight:500; text-decoration:none; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                           onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                           onmouseout="this.style.color='#333'; this.style.borderBottom='2px solid transparent';">
                            <i class="fas fa-user-plus me-2"></i> Register
                        </a>
                    </li>
                @else
                    <li class="nav-item me-4">
                        <a href="{{ route('cart.view') }}" 
                           style="color:#333; padding:8px 0; font-weight:500; text-decoration:none; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                           onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                           onmouseout="this.style.color='#333'; this.style.borderBottom='2px solid transparent';">
                            <i class="fas fa-shopping-cart me-2"></i> Keranjang
                        </a>
                    </li>
                    <li class="nav-item me-4">
                        <a href="{{ route('orders.status') }}" 
                           style="color:#333; padding:8px 0; font-weight:500; text-decoration:none; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                           onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                           onmouseout="this.style.color='#333'; this.style.borderBottom='2px solid transparent';">
                            <i class="fas fa-clipboard-list me-2"></i> Status Pesanan
                        </a>
                    </li>

                    @if(Auth::user()->isAdmin())
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle fw-semibold d-flex align-items-center" 
                               href="#" role="button" data-bs-toggle="dropdown"
                               style="color:#000; padding:8px 0; font-weight:500; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                               onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                               onmouseout="this.style.color='#000'; this.style.borderBottom='2px solid transparent';">
                                <i class="fas fa-user-shield me-2"></i> Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" 
                                style="background-color:#fff;">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}" 
                                       style="color:#333; padding:6px 12px; text-decoration:none; display:flex; align-items:center;"
                                       onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.color='#8B4513';"
                                       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#333';">
                                       <i class="fas fa-cogs me-2"></i> Admin Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       style="color:#333; padding:6px 12px; text-decoration:none; display:flex; align-items:center;"
                                       onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.color='#8B4513';"
                                       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#333';">
                                       <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle fw-semibold d-flex align-items-center" 
                               href="#" role="button" data-bs-toggle="dropdown"
                               style="color:#000; padding:8px 0; font-weight:500; display:flex; align-items:center; border-bottom:2px solid transparent; transition:0.3s;"
                               onmouseover="this.style.color='#8B4513'; this.style.borderBottom='2px solid #8B4513';"
                               onmouseout="this.style.color='#000'; this.style.borderBottom='2px solid transparent';">
                                <i class="fas fa-user me-2"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" 
                                style="background-color:#fff;">
                                <li>
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       style="color:#333; padding:6px 12px; text-decoration:none; display:flex; align-items:center;"
                                       onmouseover="this.style.backgroundColor='#f8f9fa'; this.style.color='#8B4513';"
                                       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#333';">
                                       <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                @endguest

            </ul>
        </div>
    </div>
</nav>

<!-- Inline responsive: pakai media query di head -->
<style>
@media (max-width: 991px) {
    .navbar .navbar-brand {
        margin: 0 auto !important;
        display: block !important;
        text-align: center !important;
        position: relative !important;
        left: 0 !important;
    }
    .navbar-collapse {
        margin-top: 10px !important;
        text-align: center !important;
    }
    .navbar-nav {
        flex-direction: column !important;
        align-items: center !important;
    }
    .navbar-nav .nav-item {
        margin-bottom: 0.5rem !important;
    }
}
</style>



        <!-- Logout Form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

        <!-- Main Content -->
        <main style="padding-top:2rem; padding-bottom:2rem;">
            @if(session('success'))
                <div class="container mb-3">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="container mb-3">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>

    <!-- Footer -->
   <!-- Footer -->
<footer style="background: rgb(26, 26, 26); color: #fff; padding: 3rem 0 2rem 0;">
    <div class="container">
        <div class="row g-4">
            <!-- Kiri: Location & Operating Hours -->
            <div class="col-lg-6">
                <div class="mb-4">
                    <h5 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <i class="fas fa-map-marker-alt me-2"></i>Lokasi Kami
                    </h5>
                    <div style="font-size: 0.9rem; line-height: 1.6; color: #ccc; margin-bottom: 2rem;">
                    Jl. Kp. Tengah, RT.06/RW.03, Cipeucang,<br>
                     Kec. Cileungsi, Kabupaten Bogor, Jawa Barat 16820 <br>

                    </div>
                </div>

                <div>
                    <h5 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.5px;">
                        <i class="fas fa-clock me-2"></i>Jam Operasional
                    </h5>
                    <div style="font-size: 0.9rem; line-height: 1.6; color: #ccc;">
                        <div class="mb-2"><strong>Senin - Jumat:</strong> 07:00 - 22:00</div>
                        <div class="mb-2"><strong>Sabtu:</strong> 09:00 - 22:00</div>
                        <div class="mb-2"><strong>Ahad:</strong> Tutup</div>
                    </div>
                </div>
            </div>

            <!-- Kanan: Maps -->
            <div class="col-lg-6">
                <div style="width: 100%; height: 300px; border-radius: 8px; overflow: hidden; border: 1px solid #555;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1038.6778748539675!2d107.03970794825037!3d-6.423687271557469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69965ac34c0f21%3A0xef519b4f14cf74e4!2sSMK%20Fatahillah%20Cileungsi!5e1!3m2!1sid!2sid!4v1756015811312!5m2!1sid!2sid" 
                        style="width: 100%; height: 100%; border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section & Bottom Section tetap sama -->
</footer>


            <!-- Contact Section -->
            <div style="background:rgb(26, 26, 26); padding: 2rem 0; border-top: 1px solid #333; text-align: center;">
                <div class="container">
                    <div style="font-size: 1.3rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">
                        Curhat Yuk 0857-7529-4657
                    </div>
                    <div style="color: #25D366; font-size: 0.9rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                        <i class="fab fa-whatsapp"></i>
                        WhatsApp Chat Only
                    </div>
                </div>
            </div>

            <!-- Bottom Section -->
            <div style="background:rgb(26, 26, 26); padding: 1.5rem 0; border-top: 1px solid #333; text-align: center;">
                <div class="container">
                    <!-- Company Logos -->
                    <div style="display: flex; justify-content: center; gap: 2rem; margin-bottom: 1rem; flex-wrap: wrap;">
                        <div style="width: 60px; height: 60px; background: #222; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid #333;">
                            <i class="fas fa-coffee" style="font-size: 1.5rem; color: #8B4513;"></i>
                        </div>
                        <div style="width: 60px; height: 60px; background: #222; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid #333;">
                            <i class="fas fa-award" style="font-size: 1.5rem; color: #8B4513;"></i>
                        </div>
                    </div>

                    <!-- Company Info -->
                    <div style="font-size: 0.8rem; color: #888; line-height: 1.5;">
                        <div class="mb-2">
                            <strong>Hak Cipta ©2024 PT MiloBoom Indonesia</strong>
                        </div>
                        <div class="mb-2">
                            Consumer Complaints Service Contact Information
                        </div>
                        <div class="mb-2">
                            Directorate General of Consumer Protection and Trade Compliance, Ministry of Trade of the Republic of Indonesia
                        </div>
                        <div class="mb-3">
                            WhatsApp : 0812-8898-0562
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="margin-top: 1rem;">
                        <a href="#" title="Instagram" style="color: #888; font-size: 1.2rem; margin: 0 0.8rem; text-decoration: none; transition: color 0.3s ease;" 
                        onmouseover="this.style.color='#8B4513'" onmouseout="this.style.color='#888'">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/6281234567890" title="WhatsApp" style="color: #888; font-size: 1.2rem; margin: 0 0.8rem; text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='#8B4513'" onmouseout="this.style.color='#888'">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>

                    <div style="margin-top: 1rem; font-size: 0.8rem; color: #666;">
                        &copy; 2024 MiloBoom. All rights reserved.
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
