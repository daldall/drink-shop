@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Jumbotron -->
<div class="row mb-4 justify-content-center">
    <div class="col-md-10">
        <div class="jumbotron p-5 rounded-4 mb-4 text-center text-white shadow position-relative overflow-hidden" 
             style="height: 400px; border-radius: 20px;">

            <!-- Video Background -->
            <video autoplay muted loop playsinline class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover; z-index:0;">
                <source src="{{ asset('storage/videoplayback.webm') }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>

            <!-- Overlay Gelap biar teks tetap kebaca -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5); z-index:1;"></div>

            <!-- Konten Jumbotron -->
            <div class="position-relative" style="z-index:2;">
                <h1 class="display-4 fw-bold">Selamat Datang di <span style="color:#FFD700;">MiloBoom</span></h1>
                <p class="lead mb-4">Minuman segar pilihan terbaik untuk menemani hari Anda</p>
                <a href="#produkContainer" 
                   class="btn btn-lg rounded-4 px-4" 
                   style="background-color:#FFD700; color:#8B4513; font-weight:bold; transition:0.3s;"
                   onmouseover="this.style.backgroundColor='#FFC107'; this.style.color='white';"
                   onmouseout="this.style.backgroundColor='#FFD700'; this.style.color='#8B4513';">
                    <i class="fas fa-shopping-bag me-2"></i> Lihat Produk
                </a>
            </div>
        </div>
    </div>
</div>


   <!-- 3 Kenikmatan -->
<div class="row text-center mb-5 justify-content-center">
    <div class="col-md-4 mb-3">
        <div class="p-4 rounded-4 shadow-sm h-100">
            <i class="fas fa-mug-hot fa-3x mb-3" style="color:#8B4513;"></i>
            <h5 class="fw-bold">Rasa Nikmat</h5>
            <p class="text-muted">Setiap tegukan MiloBoom memberikan kenikmatan yang tiada duanya.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-4 rounded-4 shadow-sm h-100">
            <i class="fas fa-ice-cream fa-3x mb-3" style="color:#8B4513;"></i>
            <h5 class="fw-bold">Segar</h5>
            <p class="text-muted">Minuman dingin yang menyegarkan dan cocok untuk semua suasana.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-4 rounded-4 shadow-sm h-100">
            <i class="fas fa-bolt fa-3x mb-3" style="color:#8B4513;"></i>
            <h5 class="fw-bold">Mudah Dibawa</h5>
            <p class="text-muted">Praktis dibawa kemana saja, siap menemani aktivitas harianmu.</p>
        </div>
    </div>
</div>


    <!-- Produk -->
    <div class="row mb-3" id="produkContainer" style="opacity:0; transform:translateY(20px);">
        <div class="col-md-12 text-center">
            <h2 class="mb-4 fw-semibold">Produk Kami</h2>
        </div>
    </div>

    <div class="row justify-content-center" id="produkRow" style="opacity:0; transform:translateY(20px);">
        @foreach($products as $index => $product)
            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm mx-auto overflow-hidden" 
                     style="transition: transform 0.3s, box-shadow 0.3s; cursor:pointer; opacity:0;" 
                     onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.2)';" 
                     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 1px 3px rgba(0,0,0,0.1)';">

                    <!-- Gambar produk -->
                    @php
                        $imageFile = $index == 0 ? '1.png' : '2.png';
                    @endphp
                    <img src="{{ asset('storage/' . $imageFile) }}" 
                         class="card-img-top bg-light" 
                         style="height:250px; object-fit:contain; transition: transform 0.3s;" 
                         onmouseover="this.style.transform='scale(1.05)';" 
                         onmouseout="this.style.transform='scale(1)';">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 text-primary">{{ $product->formatted_price }}</span>
                            <small class="text-muted">Stok: {{ $product->stock }}</small>
                        </div>

                        @auth
                            @if($product->stock > 0)
                                <button class="btn mt-3 add-to-cart" 
                                        data-product-id="{{ $product->id }}"
                                        style="background-color:#8B4513; color:white; transition:0.3s;"
                                        onmouseover="this.style.backgroundColor='#A0522D';" 
                                        onmouseout="this.style.backgroundColor='#8B4513';">
                                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                                </button>
                            @else
                                <button class="btn btn-secondary mt-3" disabled>Stok Habis</button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" 
                               class="btn mt-3 w-100" 
                               style="background-color:#8B4513; color:white; transition:0.3s;"
                               onmouseover="this.style.backgroundColor='#A0522D';" 
                               onmouseout="this.style.backgroundColor='#8B4513';">
                               <i class="fas fa-sign-in-alt"></i> Login untuk Pesan
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add to Cart Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title"><i class="fas fa-cart-plus"></i> Tambah ke Keranjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addToCartForm">
                    @csrf
                    <input type="hidden" id="productId" name="product_id">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success rounded-4" id="confirmAddToCart">
                    <i class="fas fa-check"></i> Tambah
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Alert -->
<!-- Toast Alert Tengah Layar -->
<div class="position-fixed top-50 start-50 translate-middle p-3" style="z-index: 1080">
    <div id="cartAlert" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body text-center">
                <i class="fas fa-check-circle me-2"></i> Produk berhasil ditambahkan ke keranjang!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Fade-in smooth
    $('#jumbotron, #produkContainer, #produkRow').css({'opacity':0, 'transform':'translateY(20px)'}).animate(
        {opacity:1, top:0}, 400
    );
    $('#produkRow .card').css({'opacity':0, 'transform':'translateY(20px)'}).animate({opacity:1, top:0}, 400);

    // Add to cart modal
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        $('#productId').val(productId);
        $('#addToCartModal').modal('show');
    });

    $('#confirmAddToCart').click(function(e) {
        e.preventDefault();
        const formData = $('#addToCartForm').serialize();
        
        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#addToCartModal').modal('hide');

                // Tampilkan toast alert
                var toastEl = document.getElementById('cartAlert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();

                // Optional: update jumlah keranjang di navbar
                if(response.cart_count !== undefined){
                    $('#cartCount').text(response.cart_count);
                }
            },
            error: function() {
                console.log('Terjadi kesalahan.');
            }
        });
    });
});
</script>

<style>
html {
    scroll-behavior: smooth;
}
</style>
@endpush
