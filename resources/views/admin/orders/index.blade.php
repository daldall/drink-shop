@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @include('admin.sidebar')
        </div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Kelola Pesanan</h2>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Status Order</th>
                                    <th>Status Payment</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->formatted_total }}</td>
                                        <td>
                                            @if($order->payment_method == 'qr')
                                                <span class="badge bg-info">QR Code</span>
                                            @else
                                                <span class="badge bg-warning">COD</span>
                                            @endif
                                        </td>
                                        <td>    
                                            @if($order->order_status == 'pending')
                                                <span class="badge bg-warning">Menunggu</span>
                                            @elseif($order->order_status == 'processing')
                                                <span class="badge bg-primary">Proses</span>
                                            @elseif($order->order_status == 'shipped')
                                                <span class="badge bg-info">Dikirim</span>
                                            @elseif($order->order_status == 'delivered')
                                                <span class="badge bg-success">Terkirirm</span>
                                            @else
                                                <span class="badge bg-danger">Batal</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->payment_status == 'pending')
                                                <span class="badge bg-warning">Menunggu</span>
                                            @elseif($order->payment_status == 'paid')
                                                <span class="badge bg-success">Sudah Bayar</span>
                                            @else
                                                <span class="badge bg-danger">Gagal</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada pesanan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection