@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4 fw-bold text-center">Status Pesanan Saya</h3>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center">Kamu belum punya pesanan.</div>
    @else
        <div class="row justify-content-center g-4">
            @foreach($orders as $order)
                <div class="col-12 col-md-8">
                    <div class="card card-order shadow-sm border-0 rounded-4 p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @php
                                switch($order->order_status) {
                                    case 'pending':
                                        $statusClass = 'bg-warning text-dark';
                                        break;
                                    case 'delivered':
                                        $statusClass = 'bg-success text-white';
                                        break;
                                    case 'canceled':
                                        $statusClass = 'bg-danger text-white';
                                        break;
                                    default:
                                        $statusClass = 'bg-brown text-white';
                                }
                            @endphp

                            <span class="badge {{ $statusClass }} fw-bold">{{ ucfirst($order->order_status) }}</span>
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

<style>
    /* Warna tema MiloBoom */
    .bg-brown { background-color: #8B4513 !important; }
    .text-brown { color: #8B4513; }
    .btn-brown { background-color: #8B4513; border-color: #8B4513; }
    .btn-brown:hover { background-color: #A0522D; border-color: #A0522D; }
    .btn-outline-brown { border-color: #8B4513; color: #8B4513; }
    .btn-outline-brown:hover { background-color: #8B4513; color: #fff; }

    /* Card modern */
    .card-order {
        transition: all 0.3s ease;
        border-radius: 15px;
    }
    .card-order:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.75em;
        border-radius: 12px;
    }
</style>
@endsection
