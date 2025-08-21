@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:50px;">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius:10px; border:none; overflow:hidden;">
                <div class="card-header text-center" style="background-color:#8B4513; color:white; font-weight:bold; font-size:1.3rem;">
                 Reset Password
                </div>

                <div class="card-body" style="padding:2rem;">
                    @if (session('status'))
                        <div class="alert" role="alert" 
                             style="background-color:#D2B48C; color:#4B2E2E; border-radius:8px; padding:1rem; text-align:center;">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="d-grid gap-2">
                            <button type="submit" 
                                    class="btn" 
                                    style="background-color:#8B4513; color:white; font-weight:bold; border-radius:8px; transition:0.3s;"
                                    onmouseover="this.style.backgroundColor='#A0522D';" 
                                    onmouseout="this.style.backgroundColor='#8B4513';">
                                <i class="fas fa-paper-plane"></i> 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
