@extends('layouts.app')

@section('content')
<div class="container-fluid px-3">
    <div class="row justify-content-center" style="margin-top: clamp(20px, 5vh, 50px);">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-sm" style="border-radius: clamp(8px, 2vw, 12px); border: none; overflow: hidden; max-width: 480px; margin: 0 auto;">
                <div class="card-header text-center" style="background-color: #8B4513; color: white; font-weight: bold; font-size: clamp(1.1rem, 4vw, 1.5rem); padding: clamp(0.75rem, 3vw, 1.25rem);">
                    Register
                </div>

                <div class="card-body" style="padding: clamp(1rem, 4vw, 2rem);">

                    <!-- Tombol Info Tentang Login/Register -->
                    <div class="text-center mb-3">
                        <button type="button" 
                                class="btn btn-outline-warning fw-bold" 
                                data-bs-toggle="modal" 
                                data-bs-target="#infoModal"
                                style="border-radius: 20px; font-size: clamp(0.7rem, 2.5vw, 0.85rem); padding: clamp(0.3rem, 1.5vw, 0.5rem) clamp(0.8rem, 3vw, 1.2rem);">
                            <i class="fas fa-info-circle"></i> Tentang Login & Register
                        </button>
                    </div>

                    <!-- Form Register -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label" style="font-size: clamp(0.85rem, 3vw, 1rem); font-weight: 500;">
                                <i class="fas fa-user"></i> Name
                            </label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   style="border-radius: 8px; padding: clamp(0.5rem, 2vw, 0.75rem) clamp(0.8rem, 3vw, 2rem); font-size: clamp(0.85rem, 3vw, 1rem);">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="display: block; font-size: clamp(0.75rem, 2.5vw, 0.875rem);">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-size: clamp(0.85rem, 3vw, 1rem); font-weight: 500;">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                   style="border-radius: 8px; padding: clamp(0.5rem, 2vw, 0.75rem) clamp(0.8rem, 3vw, 2rem); font-size: clamp(0.85rem, 3vw, 1rem);">
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block; font-size: clamp(0.75rem, 2.5vw, 0.875rem);">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-size: clamp(0.85rem, 3vw, 1rem); font-weight: 500;">
                                <i class="fas fa-lock"></i> Password
                            </label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password"
                                   style="border-radius: 8px; padding: clamp(0.5rem, 2vw, 0.75rem) clamp(0.8rem, 3vw, 2rem); font-size: clamp(0.85rem, 3vw, 1rem);">
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block; font-size: clamp(0.75rem, 2.5vw, 0.875rem);">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label" style="font-size: clamp(0.85rem, 3vw, 1rem); font-weight: 500;">
                                <i class="fas fa-lock"></i> Confirm Password
                            </label>
                            <input id="password-confirm" type="password" 
                                   class="form-control" name="password_confirmation" required autocomplete="new-password"
                                   style="border-radius: 8px; padding: clamp(0.5rem, 2vw, 0.75rem) clamp(0.8rem, 3vw, 2rem); font-size: clamp(0.85rem, 3vw, 1rem);">
                        </div>

                        <div class="d-grid gap-2" style="margin-top: clamp(1rem, 4vw, 1.5rem);">
                            <button type="submit" 
                                    class="btn" 
                                    style="background-color: #8B4513; color: white; font-weight: bold; border-radius: 8px; transition: 0.3s; padding: clamp(0.6rem, 3vw, 0.75rem); font-size: clamp(0.9rem, 3.5vw, 1.1rem);"
                                    onmouseover="this.style.backgroundColor='#A0522D';" 
                                    onmouseout="this.style.backgroundColor='#8B4513';">
                                <i class="fas fa-user-plus"></i> Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tentang Login & Register -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; margin: 15px;">
            <div class="modal-header bg-light text-dark" style="padding: clamp(0.75rem, 3vw, 1rem);">
                <h5 class="modal-title fw-bold" id="infoModalLabel" style="font-size: clamp(1rem, 4vw, 1.25rem);">
                    <i class="fas fa-info-circle text-warning"></i> Tentang Login & Register
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="font-size: clamp(0.8rem, 3vw, 0.95rem); line-height: 1.6; padding: clamp(1rem, 4vw, 1.25rem);">
                
                <p class="mb-3">
                    ✨ Untuk memastikan kenyamanan dan keamanan, berikut info singkat tentang sistem <b>Login & Register</b> di website ini:
                </p>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item" style="font-size: clamp(0.75rem, 2.8vw, 0.9rem); padding: clamp(0.5rem, 2vw, 0.75rem);">
                        1. Login/Register hanya dipakai untuk <b>mencatat pesanan Anda</b>.
                    </li>
                    <li class="list-group-item" style="font-size: clamp(0.75rem, 2.8vw, 0.9rem); padding: clamp(0.5rem, 2vw, 0.75rem);">
                        2. Anda bisa pakai <b>email & password apa saja</b> (tidak harus asli), yang penting <b>ingat sendiri</b>.
                    </li>
                    <li class="list-group-item" style="font-size: clamp(0.75rem, 2.8vw, 0.9rem); padding: clamp(0.5rem, 2vw, 0.75rem);">
                        3. Data login hanya digunakan untuk <b>riwayat pesanan</b> & <b>konfirmasi pembayaran</b>.
                    </li>
                    <li class="list-group-item" style="font-size: clamp(0.75rem, 2.8vw, 0.9rem); padding: clamp(0.5rem, 2vw, 0.75rem);">
                        4. Website ini <b>tidak pernah meminta data sensitif</b> seperti password email asli, PIN, atau data perbankan.
                    </li>
                    <li class="list-group-item" style="font-size: clamp(0.75rem, 2.8vw, 0.9rem); padding: clamp(0.5rem, 2vw, 0.75rem);">
                        5. Jadi tenang aja, sistem ini <b>aman</b> dan <b>bukan link phising</b>.
                    </li>
                </ul>

                <p class="text-muted small mb-0" style="font-size: clamp(0.7rem, 2.5vw, 0.8rem);">
                    📌 Catatan: Simpan baik-baik email & password yang Anda gunakan saat register supaya bisa login kembali.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CSS tambahan untuk responsivitas -->
<style>
@media (max-width: 576px) {
    .container-fluid {
        padding-left: 10px;
        padding-right: 10px;
    }
    
    .modal-dialog {
        margin: 10px;
    }
    
    .fas {
        font-size: clamp(0.8rem, 3vw, 1rem);
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .card {
        max-width: 400px !important;
    }
}

@media (min-width: 992px) {
    .card {
        max-width: 450px !important;
    }
}

/* Hover effects untuk desktop */
@media (min-width: 768px) {
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
    }
}
</style>
@endsection