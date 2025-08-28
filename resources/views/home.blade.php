@extends('layouts.app')

@section('content')
<!-- Jumbotron Modern - No Container, Full Width -->
<div class="position-relative overflow-hidden" style="height:500px; margin-top: -50px; padding-top: 50px;">
  <!-- Video Background -->
  <video autoplay muted loop playsinline 
         class="position-absolute top-0 start-0 w-100 h-100" 
         style="object-fit: cover; z-index:0;">
    <source src="{{ asset('images/videoplayback.webm') }}" type="video/mp4">
  </video>

  <!-- Overlay Gelap Halus -->
  <div class="position-absolute top-0 start-0 w-100 h-100" 
       style="background: rgba(0,0,0,0.4); z-index:1;"></div>

  <!-- Konten Jumbotron -->
  <div class="position-absolute top-50 start-50 translate-middle text-center text-white" style="z-index:2; width: 90%;">
    <h1 id="jumbotronTitle" class="display-3 fw-bold mb-4" 
        style="opacity:0; transform:translateY(30px); transition:all 1s ease; text-shadow: 2px 2px 15px rgba(0,0,0,0.8);">
        Selamat Datang di <span style="color:#D4A574;">MiloBoom</span>
    </h1>
    <p id="jumbotronSub" class="lead mb-4 fs-4" 
       style="opacity:0; transform:translateY(30px); transition:all 1s ease; text-shadow: 1px 1px 10px rgba(0,0,0,0.7); max-width: 600px; margin: 0 auto;">
        Minuman segar pilihan terbaik untuk menemani hari Anda
    </p>
    <a id="jumbotronBtn" href="#produkContainer" 
       class="btn btn-lg ripple px-5 py-3" 
       style="
          background: rgba(212, 165, 116, 0.9);
          color:#fff; 
          font-weight:bold; 
          border-radius:25px; 
          font-size: 1.1rem;
          box-shadow:0 10px 30px rgba(0,0,0,0.4); 
          transition: all 0.3s ease; 
          opacity:0; 
          transform:translateY(30px); 
          position:relative; 
          overflow:hidden;
          border: 2px solid rgba(255,255,255,0.3);
       " 
       onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.5)'; this.style.background='rgba(212, 165, 116, 1)';" 
       onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.4)'; this.style.background='rgba(212, 165, 116, 0.9)';">
       <i class="fas fa-shopping-bag me-2"></i> Lihat Produk
    </a>
  </div>
</div>

<!-- Section 3 Fitur dengan Background Cream -->
<div class="py-5" style="background-color: #f8f5f2;">
  <div class="container">
    <!-- Judul Section -->
    <div class="row mb-5">
      <div class="col-md-12 text-center">
        <h2 class="mb-4 fw-bold" style="color:#8B4513; font-size: 2.5rem;">Keunggulan MiloBoom</h2>
        <div class="mx-auto mb-4" style="width: 120px; height: 4px; background: linear-gradient(90deg, #D4A574, #8B4513); border-radius: 2px;"></div>
        <p class="lead" style="color:#6B4423; max-width: 600px; margin: 0 auto;">Temukan mengapa MiloBoom menjadi pilihan terbaik untuk menemani aktivitas harian Anda</p>
      </div>
    </div>
    
    <!-- 3 Kenikmatan Modern -->
    <div class="row text-center mb-5 justify-content-center g-4">
  @php
    $features = [
      ['icon'=>'fa-mug-hot','title'=>'Rasa Nikmat','desc'=>'Setiap tegukan MiloBoom memberikan kenikmatan yang tiada duanya.'],
      ['icon'=>'fa-snowflake','title'=>'Segar','desc'=>'Minuman dingin yang menyegarkan dan cocok untuk semua suasana.'],
      ['icon'=>'fa-hand-holding','title'=>'Mudah Dibawa','desc'=>'Praktis dibawa kemana saja, siap menemani aktivitas harianmu.']
    ];
  @endphp
  @foreach($features as $index => $feature)
  <div class="col-md-4">
    <div class="p-4 rounded-4 shadow-lg h-100" 
         data-aos="fade-up"
         data-aos-delay="{{ $index * 200 }}"
         style="background: white; transition:all 0.4s; cursor:pointer; border: 1px solid rgba(212, 165, 116, 0.15);"
         onmouseover="this.style.transform='scale(1.08)'; this.style.boxShadow='0 12px 30px rgba(212, 165, 116, 0.3)'; this.querySelector('i').style.color='#D4A574'; this.querySelector('h5').style.color='#8B4513'; this.querySelector('p').style.color='#6B4423';"
         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 6px 15px rgba(0,0,0,0.15)'; this.querySelector('i').style.color='#8B4513'; this.querySelector('h5').style.color='#333'; this.querySelector('p').style.color='#666';">
      <i class="fas {{ $feature['icon'] }} fa-3x mb-3" style="color:#8B4513; transition:0.3s;"></i>
      <h5 class="fw-bold" style="color:#333;">{{ $feature['title'] }}</h5>
      <p style="color:#666;">{{ $feature['desc'] }}</p>
    </div>
  </div>
    @endforeach
    </div>
  </div>
</div>

<!-- Section Foto + Quote dengan Background Putih -->
<div class="py-5" style="background-color: #ffffff;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Foto -->
   <!-- Foto CEO full, tidak kepotong -->
   <div class="col-md-6" data-aos="fade-right">
        <img src="{{ asset('images/ceo.jpg') }}" 
             class="img-fluid rounded-4 shadow-lg" 
             style="width: 100%; height: auto; display: block;"
             alt="Founder MiloBoom">
      </div>
      
      <!-- Quote Text -->
      <div class="col-md-6" data-aos="fade-left">
        <div class="ps-md-4">
          <blockquote class="position-relative">
            <div class="mb-4">
              <i class="fas fa-quote-left" style="font-size: 3rem; color: #D4A574; opacity: 0.7;"></i>
            </div>
            <p class="lead mb-4" style="font-size: 1.3rem; line-height: 1.6; color: #333; font-style: italic;">
              "Di MiloBoom, impian kami adalah menyajikan minuman berkualitas tinggi, dibuat dengan bahan-bahan segar terbaik untuk pelanggan di seluruh Indonesia – dan seluruh dunia."
            </p>
            <footer class="text-end" style="color: #8B4513;">
              <strong>— Budi Santoso, CEO dan Founder</strong>
            </footer>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section Poster Promo dengan Background Cream -->
<div class="py-5" style="background-color: #f8f5f2;">
  <div class="container">
    <!-- Judul -->
    <div class="row mb-5">
      <div class="col-md-12 text-center">
        <h2 class="mb-4 fw-bold" style="color:#8B4513; font-size: 2.2rem;">Promo Terbaru</h2>
        <div class="mx-auto mb-4" style="width: 120px; height: 4px; background: linear-gradient(90deg, #D4A574, #8B4513); border-radius: 2px;"></div>
      </div>
    </div>

    <!-- 2 Poster Gambar -->
    <div class="row justify-content-center g-4">
      <div class="col-md-6 col-lg-5" data-aos="fade-right" data-aos-duration="1000">
        <img src="{{ asset('images/Brown Modern New Drink Menu Coffee Poster.png') }}" 
             alt="Poster Promo 1" 
             class="img-fluid rounded-4 shadow-lg" 
             style="width: 50%; height: auto; object-fit: contain; display:block; margin:auto;">
      </div>
      <div class="col-md-6 col-lg-5" data-aos="fade-left" data-aos-duration="1000">
        <img src="{{ asset('images/Brown Modern New Drink Menu Coffee Poster.png') }}" 
             alt="Poster Promo 2" 
             class="img-fluid rounded-4 shadow-lg" 
             style="width: 50%; height: auto; object-fit: contain; display:block; margin:auto;">
      </div>
    </div>
  </div>
</div>



<!-- Section Produk dengan Background Cream -->
<div class="py-5" style="background-color:rgb(255, 255, 255);">
  <div class="container">

  <!-- Produk -->
  <div class="row mb-4" id="produkContainer" style="opacity:0; transform:translateY(20px); transition:all 1s;">
    <div class="col-md-12 text-center">
      <h2 class="mb-4 fw-bold" style="color:#8B4513; font-size: 2.5rem;">Produk Kami</h2>
      <div class="mx-auto mb-4" style="width: 100px; height: 4px; background: linear-gradient(90deg, #D4A574, #8B4513); border-radius: 2px;"></div>
    </div>
  </div>

  <div class="row justify-content-center g-4" id="produkRow" style="opacity:0; transform:translateY(20px); transition:all 1s;">
    @foreach($products as $index => $product)
    <div class="col-md-5 col-lg-4">
      <div class="card h-100 shadow-lg overflow-hidden" 
           style="border-radius:20px; transition: transform 0.4s ease, box-shadow 0.4s ease; cursor:pointer; opacity:0; background: rgba(255,255,255,0.98); border: 1px solid rgba(212, 165, 116, 0.2);"
           data-aos="zoom-in"
           onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 15px 40px rgba(212, 165, 116, 0.3)';" 
           onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)';">

        <div style="position:relative; overflow:hidden; border-radius:20px 20px 0 0;">
            <img src="{{ asset('images/' . ($index == 0 ? '1.png' : '2.png')) }}" 
                 class="card-img-top" 
                 style="width:100%; height:250px; object-fit:contain; transition: transform 0.4s ease;" 
                 onmouseover="this.style.transform='scale(1.1)';" 
                 onmouseout="this.style.transform='scale(1)';">
        </div>

        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold" style="font-size:1.3rem; margin-bottom:0.5rem; color:#8B4513;">{{ $product->name }}</h5>
          <p class="card-text flex-grow-1" style="font-size:0.95rem; margin-bottom:1rem; color:#666;">{{ $product->description }}</p>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="h5" style="font-size:1.2rem; color:#D4A574; font-weight: bold;">{{ $product->formatted_price }}</span>
            <small style="font-size:0.85rem; color:#8B4513;">Stok: {{ $product->stock }}</small>
          </div>

          @auth
            @if($product->stock > 0)
              <button class="btn ripple mt-3 w-100 add-to-cart" 
                      data-product-id="{{ $product->id }}"
                      style="background: linear-gradient(135deg,#8B4513,#D4A574); color:white; font-weight:bold; border-radius:15px; padding:12px; position:relative; overflow:hidden; transition: all 0.3s ease; border: none;"
                      onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 8px 25px rgba(139, 69, 19, 0.4)';"
                      onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
              </button>
            @else
              <button class="btn btn-secondary mt-3 w-100" style="border-radius:15px; padding:12px;" disabled>Stok Habis</button>
            @endif
          @else
            <a href="{{ route('login') }}" 
               class="btn mt-3 w-100 ripple" 
               style="background: linear-gradient(135deg,#8B4513,#D4A574); color:white; font-weight:bold; border-radius:15px; padding:12px; position:relative; overflow:hidden; transition: all 0.3s ease; text-decoration: none;"
               onmouseover="this.style.transform='scale(1.02)'; this.style.boxShadow='0 8px 25px rgba(139, 69, 19, 0.4)';"
               onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
               <i class="fas fa-sign-in-alt me-2"></i> Login untuk Pesan
            </a>
          @endauth
        </div>
      </div>
    </div>
    @endforeach
    </div>

  </div>
</div>

<!-- Modal Add to Cart Modern -->
<div class="modal fade" id="addToCartModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg rounded-4" style="background: rgba(255,255,255,0.98); backdrop-filter: blur(10px);">
      <div class="modal-header border-0" style="background: linear-gradient(135deg, rgba(139,69,19,0.1), rgba(212,165,116,0.1));">
        <h5 class="modal-title" style="color:#8B4513;"><i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addToCartForm">@csrf
          <input type="hidden" id="productId" name="product_id">
          <div class="mb-3">
            <label for="quantity" class="form-label fw-bold" style="color:#8B4513;">Jumlah</label>
            <input type="number" class="form-control rounded-3" id="quantity" name="quantity" value="1" min="1" style="border: 2px solid #D4A574; padding: 10px;">
          </div>
        </form>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-outline-secondary rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn rounded-3 px-4" id="confirmAddToCart" style="background: linear-gradient(135deg,#8B4513,#D4A574); color: white; font-weight: bold;">
          <i class="fas fa-check me-2"></i> Tambah
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Toast Modern -->
<div class="position-fixed top-50 start-50 translate-middle p-3" style="z-index: 1080">
  <div id="cartAlert" class="toast align-items-center text-white border-0 rounded-4" 
       role="alert" aria-live="assertive" aria-atomic="true" 
       style="background: linear-gradient(135deg, rgba(34,139,34,0.9), rgba(46,125,50,0.9)); backdrop-filter: blur(8px); box-shadow: 0 8px 25px rgba(0,0,0,0.3);">
    <div class="d-flex">
      <div class="toast-body text-center py-3">
        <i class="fas fa-check-circle me-2"></i> Produk berhasil ditambahkan ke keranjang!
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
$(document).ready(function() {
    AOS.init({
        duration: 1000,
        once: true
    });

    // Smooth scroll untuk anchor link
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });

    // Animasi jumbotron yang lebih smooth
    setTimeout(()=> { $("#jumbotronTitle").css({opacity:1, transform:'translateY(0)'}); }, 500);
    setTimeout(()=> { $("#jumbotronSub").css({opacity:1, transform:'translateY(0)'}); }, 1000);
    setTimeout(()=> { $("#jumbotronBtn").css({opacity:1, transform:'translateY(0)'}); }, 1500);

    // Animasi produk
    setTimeout(()=> { $("#produkContainer").css({opacity:1, transform:'translateY(0)'}); }, 800);
    setTimeout(()=> { $("#produkRow").css({opacity:1, transform:'translateY(0)'}); }, 1200);
    setTimeout(()=> { $("#produkRow .card").css({opacity:1}); }, 1400);

    // Ripple effect yang lebih halus
    $(document).on("click", ".ripple", function (e) {
        let circle = document.createElement("span");
        let diameter = Math.max(this.clientWidth, this.clientHeight);
        let radius = diameter / 2;
        
        circle.style.width = circle.style.height = diameter + "px";
        circle.style.position = "absolute";
        circle.style.borderRadius = "50%";
        circle.style.background = "rgba(255,255,255,0.4)";
        circle.style.left = (e.clientX - this.offsetLeft - radius) + "px";
        circle.style.top = (e.clientY - this.offsetTop - radius) + "px";
        circle.style.pointerEvents = "none";
        circle.style.animation = "ripple 0.8s linear";
        circle.style.zIndex = "10";
        
        this.appendChild(circle);
        setTimeout(()=>circle.remove(), 800);
    });

    // Modal dan AJAX
    $('.add-to-cart').click(function() {
        const productId = $(this).data('product-id');
        $('#productId').val(productId);
        $('#addToCartModal').modal('show');
    });

    $('#confirmAddToCart').click(function(e) {
        e.preventDefault();
        const formData = $('#addToCartForm').serialize();
        
        // Disable button sementara
        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Menambahkan...');
        
        $.ajax({
            url: '{{ route("cart.add") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#addToCartModal').modal('hide');
                var toastEl = document.getElementById('cartAlert');
                var toast = new bootstrap.Toast(toastEl, {delay: 3000});
                toast.show();
                if(response.cart_count !== undefined){
                    $('#cartCount').text(response.cart_count);
                }
            },
            error: function() {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            },
            complete: function() {
                // Re-enable button
                $('#confirmAddToCart').prop('disabled', false).html('<i class="fas fa-check me-2"></i> Tambah');
            }
        });
    });
});
</script>

<style>
@keyframes ripple {
    from { 
        transform: scale(0); 
        opacity: 0.6; 
    }
    to { 
        transform: scale(4); 
        opacity: 0; 
    }
}

/* Custom scrollbar untuk modern look */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #8B4513, #D4A574);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #6B3410, #B8935F);
}

/* Smooth transitions untuk semua elemen */
* {
    transition: all 0.3s ease;
}

/* Hover effect untuk card yang lebih subtle */
.card:hover {
    border-color: rgba(212, 165, 116, 0.5) !important;
}

/* Video responsive */
@media (max-width: 768px) {
    .jumbotron-content h1 {
        font-size: 2rem !important;
    }
    
    .jumbotron-content p {
        font-size: 1rem !important;
    }
}
</style>
@endpush