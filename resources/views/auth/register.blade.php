@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:50px;">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius:10px; border:none; overflow:hidden;">
                <div class="card-header text-center" style="background-color:#8B4513; color:white; font-weight:bold; font-size:1.5rem;">
                    Register
                </div>

                <div class="card-body" style="padding:2rem;">

                    <!-- Tombol Info Tentang Login/Register -->
                    <div class="text-center mb-4">
                        <button type="button" 
                                class="btn btn-outline-warning btn-sm fw-bold" 
                                data-bs-toggle="modal" 
                                data-bs-target="#infoModal"
                                style="border-radius:20px;">
                            <i class="fas fa-info-circle"></i> Tentang Login & Register
                        </button>
                    </div>

                    <!-- Form Register -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="fas fa-user"></i> Name</label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   style="border-radius:8px; padding-left:2rem;">
                            @error('name')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email Address</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                   name="password" required autocomplete="new-password"
                                   style="border-radius:8px; padding-left:2rem;">
                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display:block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label"><i class="fas fa-lock"></i> Confirm Password</label>
                            <input id="password-confirm" type="password" 
                                   class="form-control" name="password_confirmation" required autocomplete="new-password"
                                   style="border-radius:8px; padding-left:2rem;">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" 
                                    class="btn" 
                                    style="background-color:#8B4513; color:white; font-weight:bold; border-radius:8px; transition:0.3s;"
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
    <div class="modal-content" style="border-radius:12px;">
      <div class="modal-header bg-light text-dark">
        <h5 class="modal-title fw-bold" id="infoModalLabel">
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
            1.Login/Register hanya dipakai untuk <b>mencatat pesanan Anda</b>.
          </li>
          <li class="list-group-item">
            2. Anda bisa pakai <b>email & password apa saja</b> (tidak harus asli), yang penting <b>ingat sendiri</b>.
          </li>
          <li class="list-group-item">
            3. Data login hanya digunakan untuk <b>riwayat pesanan</b> & <b>konfirmasi pembayaran</b>.
          </li>
          <li class="list-group-item">
            4. Website ini <b>tidak pernah meminta data sensitif</b> seperti password email asli, PIN, atau data perbankan.
          </li>
          <li class="list-group-item">
            5. Jadi tenang aja, sistem ini <b>aman</b> dan <b>bukan link phising</b>.
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
