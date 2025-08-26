@extends('layouts.app')

@section('content')
<div class="container">
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

    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4 fw-bold" style="color:#333;">Keranjang Belanja</h2>
        </div>
    </div>

    @if(empty($cart))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-light text-center" style="border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                    <h4 class="fw-bold mb-2" style="color:#444;">Keranjang Anda Kosong</h4>
                    <p class="mb-3 text-muted">Silakan pilih produk untuk mulai berbelanja</p>
                    <a href="{{ url('/') }}#produkContainer"
                       class="btn text-white" 
                       style="background-color:#000; border-radius:8px; transition:0.3s; box-shadow:0 2px 6px rgba(0,0,0,0.15);"
                       onmouseover="this.style.backgroundColor='#8B4513';" 
                       onmouseout="this.style.backgroundColor='#000';">
                        Mulai Belanja
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <!-- Daftar Produk di Keranjang -->
            <div class="col-md-8">
                <div class="card" style="border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08); border:none;">
                    <div class="card-body">
                        @php $total = 0 @endphp
                        @foreach($cart as $id => $item)
                            @php 
                                $subtotal = $item['price'] * $item['quantity']; 
                                $total += $subtotal; 
                            @endphp
                            <div class="row align-items-center border-bottom py-3">
                                <div class="col-md-2">
                                    @if(!empty($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             class="img-fluid rounded" 
                                             alt="{{ $item['name'] }}"
                                             style="max-height:60px; object-fit:cover; border-radius:8px;">
                                    @else
                                        <div class="bg-light p-3 rounded text-center">
                                            <i class="fas fa-box fa-2x text-muted"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <h6 class="fw-semibold mb-1">{{ $item['name'] }}</h6>
                                    <p class="text-muted mb-0 small">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <div class="col-md-2">
                                    <span class="badge" style="background-color:#000; color:white; font-size:0.9rem; padding:6px 10px;">{{ $item['quantity'] }}</span>
                                </div>
                                <div class="col-md-3">
                                    <strong style="color:#000;">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                                </div>
                                <div class="col-md-1 text-end">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm text-white" 
                                                style="background-color:#000; border:none; border-radius:6px; padding:6px 10px; transition:0.3s;"
                                                onmouseover="this.style.backgroundColor='#8B4513';"
                                                onmouseout="this.style.backgroundColor='#000';">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Ringkasan Pesanan + Checkout Form -->
            <div class="col-md-4">
                <div class="card" style="border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.08); border:none;">
                    <div class="card-header" style="background-color:#f8f9fa; font-weight:600; border-bottom:1px solid #eee;">
                        <h5 class="mb-0">Ringkasan Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span class="fw-semibold">Total:</span>
                            <strong class="h5" style="color:#000;">Rp {{ number_format($total, 0, ',', '.') }}</strong>
                        </div>

                        <form action="{{ route('checkout') }}" method="POST" id="checkoutForm">
                            @csrf

                            <!-- Metode Pembayaran -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold d-flex align-items-center">
                                    Metode Pembayaran
                                    <button type="button" 
                                            class="btn btn-sm btn-warning p-1 rounded-circle ms-2" 
                                            style="width:26px; height:26px; font-size:12px;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#qrModal"
                                            title="Tata Cara QR">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="qr" value="qr" required>
                                    <label class="form-check-label" for="qr">
                                        <i class="fas fa-qrcode"></i> QR Code
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" required>
                                    <label class="form-check-label" for="cod">
                                        <i class="fas fa-money-bill"></i> Cash on Delivery (COD)
                                    </label>
                                </div>
                            </div>

                            <!-- Field Alamat -->
                            <div class="mb-3">
                                <label for="notes" class="form-label fw-semibold d-flex align-items-center">
                                    Data diri & Alamat
                                    <button type="button" 
                                            class="btn btn-sm btn-warning p-1 rounded-circle ms-2" 
                                            style="width:26px; height:26px; font-size:12px;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#alamatModal"
                                            title="Tata Cara">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                </label>
                                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Tambahkan data diri & alamat pengiriman Anda..." required></textarea>
                            </div>

                            <button type="submit" 
                                    class="btn w-100 text-white fw-semibold"
                                    style="background-color:#000; border:none; border-radius:8px; padding:12px; transition:0.3s; font-size:1rem;"
                                    onmouseover="this.style.backgroundColor='#8B4513';" 
                                    onmouseout="this.style.backgroundColor='#000';">
                                <i class="fas fa-check"></i> Checkout
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Kontak Admin -->
                <div class="alert alert-light mt-3" style="border-radius:8px; border:1px solid #ddd;">
    <span class="fw-semibold">Butuh bantuan?</span> Hubungi WhatsApp Admin:  
    <a href="https://wa.me/6285775294657" 
       target="_blank" 
       class="fw-bold" 
       style="color:#25D366; text-decoration:none;">
       0857-7529-4657
    </a>
</div>

            </div>
        </div>
    @endif
</div>

<!-- Modal Tata Cara Alamat -->
<div class="modal fade" id="alamatModal" tabindex="-1" aria-labelledby="alamatModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:12px;">
      <div class="modal-header bg-light text-dark">
        <h5 class="modal-title fw-bold" id="alamatModalLabel"><i class="fas fa-info-circle"></i> Tata Cara Isi Alamat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ol>
          <li>Isi <b>Nama Penerima</b> lengkap.</li>
          <li>Jika <b>di sekolah</b>: tulis Nama Sekolah & Kelas.</li>
          <li>Jika <b>di luar sekolah</b>: tulis alamat lengkap (jalan, nomor rumah, RT/RW, desa/kelurahan, kecamatan, kota).</li>
          <li>Tambahkan patokan jika perlu (misal: dekat masjid, depan warung).</li>
          <li>Isi <b>Nomor WhatsApp</b> aktif untuk konfirmasi.</li>
        </ol>
        <small class="text-muted">Semua kolom harus diisi agar pesanan dapat diproses.</small>
      </div>
      <div class="modal-footer">    
      </div>
    </div>
  </div>
</div>

<!-- Modal Tata Cara QR -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:12px;">
      <div class="modal-header bg-light text-dark">
        <h5 class="modal-title fw-bold" id="qrModalLabel"><i class="fas fa-info-circle"></i> Tata Cara Pembayaran QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ol>
          <li>Pilih metode pembayaran QR Code.</li>
          <li>Scan kode QR yang diberikan setelah checkout.</li>
          <li>Lakukan pembayaran sesuai jumlah total.</li>
          <li>Kirim bukti pembayaran ke nomor WhatsApp admin.</li>
          <li>Sertakan nomor pesanan Anda (misal: <b>ORD202508219711</b>).</li>
        </ol>
        <small class="text-muted">Pastikan pembayaran sesuai jumlah yang tertera.</small>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@endsection
