@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('admin.sidebar')
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Detail Pesanan #{{ $order->order_number }}</h2>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Informasi Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Nomor Pesanan:</strong> {{ $order->order_number }}</p>
                                    <p><strong>Pelanggan:</strong> {{ $order->user->name }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                    
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                    <p><strong>Metode Pembayaran:</strong> 
                                        @if($order->payment_method == 'qr')
                                            QR Code
                                        @else
                                            Cash on Delivery (COD)
                                        @endif
                                    </p>
                                    <p><strong>Total:</strong> {{ $order->formatted_total }}</p>
                                </div>
                            </div>
                            
                            @if($order->user->address)
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Alamat:</strong> {{ $order->user->address }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($order->notes)
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Alamat :</strong> {{ $order->notes }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5>Detail Produk</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderItems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th>{{ $order->formatted_total }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Status</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.orders.update-status', $order) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                
                                <div class="mb-3">
                                    <label for="order_status" class="form-label">Status Pesanan</label>
                                    <select class="form-control" id="order_status" name="order_status" required>
                                    <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Diproses</option>
                                    <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="delivered" {{ $order->order_status == 'delivered' ? 'selected' : '' }}>Terkirim</option>
                                    <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>

                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="payment_status" class="form-label">Status Pembayaran</label>
                                    <select class="form-control" id="payment_status" name="payment_status" required>
                                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Sudah Bayar</option>
                                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Gagal</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-save"></i> Update Status
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection