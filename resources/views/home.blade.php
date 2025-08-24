@extends('layouts.app')

@section('content')
<div class="container py-4">

  <!-- Jumbotron Modern -->
  <div class="row mb-5 justify-content-center">
    <div class="col-md-10">
      <div class="jumbotron p-5 rounded-5 text-center text-white position-relative overflow-hidden shadow-lg" 
           style="height:450px; border-radius:30px;">

        <!-- Video Background -->
        <video autoplay muted loop playsinline 
               class="position-absolute top-0 start-0 w-100 h-100" 
               style="object-fit: cover; z-index:0; border-radius:30px;">
          <source src="{{ asset('images/videoplayback.webm') }}" type="video/mp4">
        </video>

        <!-- Overlay Gelap Halus -->
        <div class="position-absolute top-0 start-0 w-100 h-100" 
             style="background: rgba(0,0,0,0.35); z-index:1; border-radius:30px;"></div>

        <!-- Konten -->
        <div class="position-relative" style="z-index:2;">
         <!-- Konten Jumbotron -->
<div class="position-relative" style="z-index:2;">
  <h1 id="jumbotronTitle" class="display-4 fw-bold" 
      style="opacity:0; transform:translateY(30px); transition:all 1s ease; color:#fff; text-shadow: 1px 1px 8px rgba(0,0,0,0.7);">
      Selamat Datang di <span style="color:#fff;">MiloBoom</span>
  </h1>
  <p id="jumbotronSub" class="lead mb-4" 
     style="opacity:0; transform:translateY(30px); transition:all 1s ease; color:#fff; text-shadow: 1px 1px 6px rgba(0,0,0,0.7);">
      Minuman segar pilihan terbaik untuk menemani hari Anda
  </p>
  <a id="jumbotronBtn" href="#produkContainer" 
     class="btn btn-lg ripple" 
     style="
        background: rgba(255,255,255,0.2);
        color:#fff; 
        font-weight:bold; 
        border-radius:20px; 
        padding:12px 25px; 
        box-shadow:0 8px 20px rgba(0,0,0,0.3); 
        transition: all 0.3s ease; 
        opacity:0; 
        transform:translateY(30px); 
        position:relative; 
        overflow:hidden;
     " 
     onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 12px 25px rgba(0,0,0,0.45)'; this.style.background='rgba(255,255,255,0.35)';" 
     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.3)'; this.style.background='rgba(255,255,255,0.2)';">
     <i class="fas fa-shopping-bag me-2"></i> Lihat Produk
  </a>
</div>


        </div>
      </div>
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
  @foreach($features as $feature)
  <div class="col-md-4">
    <div class="p-4 rounded-4 shadow-lg h-100" 
         data-aos="fade-up"
         style="background: rgba(255,255,255,0.9); backdrop-filter: blur(10px); transition:all 0.4s; cursor:pointer;"
         onmouseover="this.style.transform='scale(1.08)'; this.style.boxShadow='0 12px 30px rgba(0,0,0,0.35)'; this.querySelector('i').style.color='#8B4513'; this.querySelector('h5').style.color='#8B4513'; this.querySelector('p').style.color='#8B4513';"
         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 6px 15px rgba(0,0,0,0.25)'; this.querySelector('i').style.color='#000'; this.querySelector('h5').style.color='#000'; this.querySelector('p').style.color='#000';">
      <i class="fas {{ $feature['icon'] }} fa-3x mb-3" style="color:#000; transition:0.3s;"></i>
      <h5 class="fw-bold" style="color:#000;">{{ $feature['title'] }}</h5>
      <p style="color:#000;">{{ $feature['desc'] }}</p>
    </div>
  </div>
  @endforeach
</div>


  <!-- Produk -->
  <div class="row mb-3" id="produkContainer" style="opacity:0; transform:translateY(20px); transition:all 1s;">
    <div class="col-md-12 text-center">
      <h2 class="mb-4 fw-semibold">Produk Kami</h2>
    </div>
  </div>

  <div class="row justify-content-center g-4" id="produkRow" style="opacity:0; transform:translateY(20px); transition:all 1s;">
    @foreach($products as $index => $product)
    <div class="col-md-5 col-lg-4">
      <div class="card h-100 shadow-lg overflow-hidden" 
           style="border-radius:25px; transition: transform 0.4s ease, box-shadow 0.4s ease; cursor:pointer; opacity:0; background: rgba(255,255,255,0.95);"
           data-aos="zoom-in"
           onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.35)';" 
           onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.25)';">

        <div style="position:relative; overflow:hidden; border-radius:25px;">
            <img src="{{ asset('images/' . ($index == 0 ? '1.png' : '2.png')) }}" 
                 class="card-img-top" 
                 style="width:100%; height:250px; object-fit:contain; transition: transform 0.4s ease;" 
                 onmouseover="this.style.transform='scale(1.1)';" 
                 onmouseout="this.style.transform='scale(1)';">
        </div>

        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold text-dark" style="font-size:1.3rem; margin-bottom:0.5rem; text-shadow:1px 1px 3px rgba(0,0,0,0.2);">{{ $product->name }}</h5>
          <p class="card-text flex-grow-1 text-dark" style="font-size:0.95rem; margin-bottom:1rem; text-shadow:1px 1px 2px rgba(0,0,0,0.15);">{{ $product->description }}</p>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="h5 text-warning" style="font-size:1.2rem;">{{ $product->formatted_price }}</span>
            <small class="text-dark" style="font-size:0.85rem;">Stok: {{ $product->stock }}</small>
          </div>

          @auth
            @if($product->stock > 0)
              <button class="btn ripple mt-3 w-100 add-to-cart" 
                      data-product-id="{{ $product->id }}"
                      style="background: linear-gradient(135deg,#000,#A0522D); color:white; font-weight:bold; border-radius:15px; padding:12px; position:relative; overflow:hidden; transition: all 0.3s ease;"
                      onmouseover="this.style.transform='scale(1.02)';"
                      onmouseout="this.style.transform='scale(1)';">
                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
              </button>
            @else
              <button class="btn btn-secondary mt-3 w-100" style="border-radius:12px; padding:10px 15px;" disabled>Stok Habis</button>
            @endif
          @else
            <a href="{{ route('login') }}" 
               class="btn mt-3 w-100 ripple" 
               style="background: linear-gradient(135deg,#8B4513,#A0522D); color:white; font-weight:bold; border-radius:15px; padding:12px; position:relative; overflow:hidden; transition: all 0.3s ease;"
               onmouseover="this.style.transform='scale(1.02)';"
               onmouseout="this.style.transform='scale(1)';">
               <i class="fas fa-sign-in-alt me-2"></i> Login untuk Pesan
            </a>
          @endauth
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>

<!-- Modal Add to Cart Modern -->
<div class="modal fade" id="addToCartModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow-lg rounded-4" style="backdrop-filter: blur(10px); background: rgba(0,0,0,0.65);">
      <div class="modal-header" style="background: rgba(0, 0, 0, 0.2); color:#8B4513;">
        <h5 class="modal-title"><i class="fas fa-cart-plus"></i> Tambah ke Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-white">
        <form id="addToCartForm">@csrf
          <input type="hidden" id="productId" name="product_id">
          <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="border-top:none;">
        <button type="button" class="btn btn-secondary rounded-4" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-warning rounded-4" id="confirmAddToCart">
          <i class="fas fa-check"></i> Tambah
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Toast Modern -->
<div class="position-fixed top-50 start-50 translate-middle p-3" style="z-index: 1080">
  <div id="cartAlert" class="toast align-items-center text-white border-0" 
       role="alert" aria-live="assertive" aria-atomic="true" style="background: rgba(0,128,0,0.85); backdrop-filter: blur(8px);">
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
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
$(document).ready(function() {
    AOS.init();

    setTimeout(()=> { $("#jumbotronTitle").css({opacity:1, transform:'translateY(0)'}); }, 1000);
    setTimeout(()=> { $("#jumbotronSub").css({opacity:1, transform:'translateY(0)'}); }, 1500);
    setTimeout(()=> { $("#jumbotronBtn").css({opacity:1, transform:'translateY(0)'}); }, 2000);

    setTimeout(()=> { $("#produkContainer").css({opacity:1, transform:'translateY(0)'}); }, 800);
    setTimeout(()=> { $("#produkRow").css({opacity:1, transform:'translateY(0)'}); }, 1200);
    setTimeout(()=> { $("#produkRow .card").css({opacity:1}); }, 1200);

    // Ripple effect
    $(document).on("click", ".ripple", function (e) {
        let circle = document.createElement("span");
        circle.style.width = circle.style.height = "100px";
        circle.style.position = "absolute";
        circle.style.borderRadius = "50%";
        circle.style.background = "rgba(255,255,255,0.5)";
        circle.style.left = (e.offsetX - 50) + "px";
        circle.style.top = (e.offsetY - 50) + "px";
        circle.style.pointerEvents = "none";
        circle.style.animation = "ripple 0.6s linear";
        this.appendChild(circle);
        setTimeout(()=>circle.remove(), 600);
    });

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
                var toastEl = document.getElementById('cartAlert');
                var toast = new bootstrap.Toast(toastEl);
                toast.show();
                if(response.cart_count !== undefined){
                    $('#cartCount').text(response.cart_count);
                }
            }
        });
    });
});

</script>

<style>
@keyframes ripple {
    from { transform: scale(0); opacity: 0.7; }
    to { transform: scale(4); opacity: 0; }
}
</style>
@endpush
