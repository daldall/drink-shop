@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:50px;">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border-radius:10px; border:none; overflow:hidden;">
                <div class="card-header text-center" style="background-color:#8B4513; color:white; font-weight:bold; font-size:1.3rem;">
                  Verify Your Email
                </div>

                <div class="card-body" style="padding:2rem;">

                    @if (session('resent'))
                        <div class="alert" role="alert" 
                             style="background-color:#D2B48C; color:#4B2E2E; border-radius:8px; padding:1rem; text-align:center;">
                            A fresh verification link has been sent to your email address.
                        </div>
                    @endif

                    <p>Before proceeding, please check your email for a verification link.</p>
                    <p>If you did not receive the email,</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" 
                                class="btn" 
                                style="background-color:#8B4513; color:white; font-weight:bold; border-radius:8px; padding:0.5rem 1rem; transition:0.3s;"
                                onmouseover="this.style.backgroundColor='#A0522D';" 
                                onmouseout="this.style.backgroundColor='#8B4513';">
                            <i class="fas fa-redo-alt"></i> 
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
