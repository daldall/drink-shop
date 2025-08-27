@extends('layouts.app')

@section('content')
<div class="container py-4">
  <!-- Tombol Kembali ke Home -->
  <div class="row mb-3">
      <div class="col-md-12">
          <a href="{{ route('home') }}" 
             class="btn text-white" 
             style="background-color:#000; border-radius:8px; transition:0.3s; box-shadow:0 2px 6px rgba(0,0,0,0.15);"
             onmouseover="this.style.backgroundColor='#8B4513';" 
             onmouseout="this.style.backgroundColor='#000';">
              <i class="fas fa-arrow-left"></i> Kembali ke Home
          </a>
      </div>
  </div>

  <h3 class="mb-4 fw-bold text-center">Status Pesanan Saya</h3>

  @if($orders->isEmpty())
      <div class="alert alert-info text-center">Kamu belum punya pesanan.</div>
  @else
      <div class="row justify-content-center g-4">
          @foreach($orders as $order)

              @php
                  $statusMap = [
                      'pending' => ['text' => 'Menunggu', 'class' => 'bg-warning text-dark'],
                      'delivered' => ['text' => 'Terkirim', 'class' => 'bg-success text-white'],
                      'canceled' => ['text' => 'Dibatalkan', 'class' => 'bg-danger text-white'],
                  ];

                  $statusClass = $statusMap[$order->order_status]['class'] ?? 'bg-brown text-white';
                  $statusText  = $statusMap[$order->order_status]['text']  ?? 'Proses';
              @endphp

              <div class="col-12 col-md-8">
                  <div class="card card-order shadow-sm border-0 rounded-4 p-3">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                          <span class="badge {{ $statusClass }} fw-bold">{{ $statusText }}</span>
                      </div>

                      @foreach($order->orderItems as $item)
                          <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                              <img src="{{ Storage::url($item->product->image) }}" 
                                   alt="{{ $item->product->name }}" 
                                   class="rounded-3 me-3" 
                                   style="width:60px; height:60px; object-fit:cover;">
                              <div class="flex-grow-1">
                                  <p class="mb-1 fw-bold">{{ $item->product->name }}</p>
                                  <p class="mb-0 text-muted">x{{ $item->quantity }} • Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                              </div>
                          </div>
                      @endforeach

                      <div class="mt-3 d-flex justify-content-between align-items-center">
                          <div>
                              <p class="mb-1 fw-bold">Total: <span class="text-brown">Rp {{ $order->formatted_total }}</span></p>
                              <p class="mb-0 text-muted">Alamat: {{ $order->notes ?? '-' }}</p>
                          </div>
                          <div>
                              <a href="{{ url('/') }}#produkContainer" class="btn btn-sm btn-outline-brown">Beli Lagi</a>
                          </div>
                      </div>
                  </div>
              </div>

          @endforeach
      </div>
  @endif
</div>
@endsection
