<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MmsShop - Buy & Sell</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <!-- Header -->
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo"><i class="fas fa-bullhorn"></i> MmsShop</a>

                        <div class="search-bar">
              <!-- nouvelle bar de recherche -->
              <form action="{{route('ads.search')}}" method="GET" style="margin-bottom: 20px;">
                <input type="text" name="search" placeholder="Categories,Produits..."  value="{{ request('search') }}">
                <button type="submit"
              class="px-6 py-2.5 rounded-full cursor-pointer text-white text-sm tracking-wider font-medium border-0 outline-0 bg-blue-700 hover:bg-blue-800">chercher</button>
             </form>
            </div>

            <div class="header-actions">
                <a href="{{ route('home')}}"><i class="fas fa-user"></i></a>
                <a href="{{ route('login')}}"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Découvrez des offres incroyables</h1>
                <p>Achetez auprès de milliers de vendeurs indépendants et trouvez des produits à des prix imbattables.</p>
            </div>
        </div>
    </section>



    <!-- Featured Products -->

<section class="featured-products">
    <div class="container">
        <h2 class="section-title">Produits disponibles</h2>
        <div class="products-container">

            @forelse($ads as $ad)
                <div class="product-card">
                    <div class="product-img">
                        @if($ad->photo)
                            <img src="{{ Storage::url($ad->photo) }}" alt="{{ $ad->title }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Photo" alt="">
                        @endif
                    </div>
                    <div class="product-info">
                        <h3>{{ $ad->title }}</h3>
                        <h4>{{ $ad->category }}</h4>
                        <div class="product-meta">
                            <div class="product-price">{{ number_format($ad->price, 2) }} €</div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded
                            {{ $ad->condition === 'new' ? 'bg-green-100 text-green-700' : '' }}
                            {{ $ad->condition === 'good' ? 'bg-yellow-100 text-yellow-700' : '' }}
                            {{ $ad->condition === 'used' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ $ad->condition === 'new' ? 'Neuf' : ($ad->condition === 'good' ? 'Bon état' : 'Occasion') }}
                        </span>
                        <br>
                        <a href="{{ route('ads.show_home', $ad) }}">
                            <i class="fas fa-ellipsis-h"></i>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center w-full py-8">Aucune annonce disponible pour le moment.</p>
            @endforelse

        </div>
    </div>
</section>
    
<!-- /****************************************************************************************************************** */ -->
    <!-- Footer -->
       <footer class="bg-[#0b0e37] pt-16 pb-8 px-12 tracking-wide relative overflow-hidden">
      <div class="max-w-screen-xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 gap-8 z-20 relative">
            <h2 class="text-base font-medium text-white mb-6">Bonne visite :-)</h2>   
        </div>

        <hr class="border-gray-600 my-8" />

        <div class="flex flex-wrap sm:justify-between gap-6 relative z-20">
          <p class="text-slate-400 text-sm">©MmsShop. All rights reserved.
          </p>
        </div>
      </div>
      <img src="https://readymadeui.com/bg-image.webp" class="absolute w-full inset-0 object-cover opacity-5 -z-0" />
    </footer>


 <script src="script.js"></script>
</body>
</html>