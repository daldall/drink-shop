@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:50px;">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius:10px; border:none; overflow:hidden;">
                <div class="card-header text-center" style="background-color:#8B4513; color:white; font-weight:bold; font-size:1.5rem;">
                   Login
                </div>

                <div class="card-body" style="padding:2rem;">

                    <!-- Tombol Info Tentang Login -->
                    <div class="text-center mb-4">
                        <button type="button" 
                                class="btn btn-outline-warning btn-sm fw-bold" 
                                data-bs-toggle="modal" 
                                data-bs-target="#qrModal"
                                style="border-radius:20px;">
                            <i class="fas fa-info-circle"></i> Tentang Login & Register
                        </button>
                    </div>

                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email Address</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                   style="border-radius:8px; padding-left:2rem;">
                            @error('email')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="fas fa-lock"></i> Password</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password"
                                   style="border-radius:8px; padding-left:2rem;">
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" 
                                    class="btn" 
                                    style="background-color:#8B4513; color:white; font-weight:bold; border-radius:8px; transition:0.3s;"
                                    onmouseover="this.style.backgroundColor='#A0522D';" 
                                    onmouseout="this.style.backgroundColor='#8B4513';">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#8B4513;">
                                    Forgot Your Password?
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tentang Login & Register -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:12px;">
      <div class="modal-header bg-light text-dark">
        <h5 class="modal-title fw-bold" id="qrModalLabel">
          <i class="fas fa-info-circle text-warning"></i> Tentang Login & Register
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="font-size:0.95rem; line-height:1.6;">
        
        <p class="mb-3">
          ✨ Untuk memastikan kenyamanan dan keamanan, berikut info singkat tentang sistem <b>Login & Register</b> di website ini:
        </p>

        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item">
            ✅ Login/Register hanya dipakai untuk <b>mencatat pesanan Anda</b>.
          </li>
          <li class="list-group-item">
            ✅ Anda bisa pakai <b>email & password apa saja</b> (tidak harus asli), yang penting <b>ingat sendiri</b>.
          </li>
          <li class="list-group-item">
            ✅ Data login hanya digunakan untuk <b>riwayat pesanan</b> & <b>konfirmasi pembayaran</b>.
          </li>
          <li class="list-group-item">
            ✅ Website ini <b>tidak pernah meminta data sensitif</b> seperti password email asli, PIN, atau data perbankan.
          </li>
          <li class="list-group-item">
            ✅ Jadi tenang aja, sistem ini <b>aman</b> dan <b>bukan link phising</b>.
          </li>
        </ul>

        <p class="text-muted small mb-0">
          📌 Catatan: Simpan baik-baik email & password yang Anda gunakan saat register supaya bisa login kembali.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
