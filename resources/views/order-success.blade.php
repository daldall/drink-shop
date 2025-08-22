@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-4x text-success"></i>
                    </div>
                    <h2 class="text-success mb-3">Pesanan Berhasil!</h2>
                    <p class="lead">Terima kasih atas pesanan Anda</p>
                    
                    <div class="alert alert-info">
                        <strong>Nomor Pesanan: {{ $order->order_number }}</strong>
                    </div>
                    
                    @if($order->payment_method == 'qr')
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Pembayaran QR Code</h5>
                            </div>
                            <div class="card-body">
                                <div class="qr-code-container mb-3" style="display: flex; justify-content: center;">
                                    <!-- Ganti src sesuai file QR statis di public/images -->
                                    <img src="{{ asset('images/qr.png') }}" 
                                         style="width:200px; height:200px;" 
                                         alt="QR Code">
                                </div>
                                <p class="text-muted">Scan QR code di atas untuk melakukan pembayaran</p>
                                <div class="alert alert-warning">
                                    <strong>Total Pembayaran: {{ $order->formatted_total }}</strong>
                                </div>

                                <!-- Tambahan Nomor WhatsApp Admin -->
                                <div class="alert alert-success">
                                    Kirim bukti pembayaran ke WhatsApp Admin:  
                                    <a href="https://wa.me/6281234567890" target="_blank" class="fw-bold text-success">
                                        0812-3456-7890
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            <h5>Pembayaran Cash on Delivery (COD)</h5>
                            <p>Silakan siapkan uang pas sebesar <strong>{{ $order->formatted_total }}</strong> saat pesanan tiba.</p>
                        </div>

                        <!-- Tambahan Kontak WA Admin juga ditampilkan di COD -->
                        <div class="alert alert-success">
                            Jika ada kesalahan pesanan, hubungi WhatsApp Admin:  
                            <a href="https://wa.me/6281234567890" target="_blank" class="fw-bold text-success">
                                0812-3456-7890
                            </a>
                        </div>
                    @endif
                    
                    <div class="card">
                        <div class="card-header">
                            <h5>Detail Pesanan</h5>
                        </div>
                        <div class="card-body">
                            @foreach($order->orderItems as $item)
                                <div class="row align-items-center border-bottom py-2">
                                    <div class="col-md-6">{{ $item->product->name }}</div>
                                    <div class="col-md-2">{{ $item->quantity }}x</div>
                                    <div class="col-md-4 text-end">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mt-3">
                                <div class="col-md-8"><strong>Total:</strong></div>
                                <div class="col-md-4 text-end"><strong>{{ $order->formatted_total }}</strong></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-home"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
