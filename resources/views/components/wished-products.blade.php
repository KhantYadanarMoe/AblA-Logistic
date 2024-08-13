<div class="wished-products">
    <div class="wished-products-header">
      <h4>Wished Products</h4>
      <form action="/wishlist">
        <div class="search-box">
          <input type="text" name="search" value="{{request('search')}}" placeholder="Search..." />
          <button>
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
    </div>
    @if (session('success'))
          <div class="alert alert-secondary mt-3" role="alert">
            {{session('success')}}
          </div>
        @endif

        @if (session('error'))
          <div class="alert alert-danger mt-3" role="alert">
            {{session('error')}}
          </div>
        @endif
    <div class="product-cards">
      
      @forelse ($wishlists as $wishlist)
      <div class="product-card">
        <div class="product-img">
          <img src="/storage/{{$wishlist->thumbnail}}" alt="" />
        </div>
        <div class="product-title-like">
          <h5 class="product-title">{{$wishlist->name}}</h5>
          {{-- <div class="like">
            <i class="fa-solid fa-heart"></i>
            <!-- remove from db when user click the heart again -->
          </div> --}}
        </div>
        <p class="price">{{$wishlist->price}} MMK</p>
        <p class="product-about">
          {{ Str::limit($wishlist->desc, 150) }}
        </p>
        <form action="/add-to-cart" method="POST">
          @csrf
          <input type="hidden" name="thumbnail" value="{{$wishlist->thumbnail}}">
          <input type="hidden" name="name" value="{{$wishlist->name}}">
          <input type="hidden" name="price" value="{{$wishlist->price}}">
          <button type="submit" class="add-cart-btn">
            Add to cart
            <i class="fa-solid fa-bag-shopping"></i>
          </button>
        </form>
      </div>
      @empty
      <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Product Founded.</p>
      @endforelse
    </div>
  </div>