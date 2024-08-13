<div class="products-container">
    <div class="container">
      <div class="products">
        <div class="products-header">
          <h4>Our Products</h4>
          <a href="/products">
            <button class="view-all-btn">
              View All Products
              <i class="fa-solid fa-angles-right"></i>
            </button>
          </a>
        </div>
        @if (session('success'))
          <div class="text-success mt-3" role="alert">
            {{session('success')}}
          </div>
        @endif
        @if (session('error'))
          <div class="text-danger mt-3" role="alert">
            {{session('error')}}
          </div>
        @endif
        <div class="product-cards">
          
          @foreach ($randoms as $random)
          <div class="product-card {{ $loop->last ? 'last-card' : '' }}">
            <div class="product-img">
              <img src="/storage/{{$random->thumbnail}}" alt="">
            </div>
            <div class="product-title-like">
              <h5 class="product-title">{{$random->name}}</h5>
              <form action="/add-to-wishlist" method="POST">
                @csrf
                <input type="hidden" name="thumbnail" value="{{$random->thumbnail}}">
                <input type="hidden" name="name" value="{{$random->name}}">
                <input type="hidden" name="price" value="{{$random->price}}">
                <input type="hidden" name="desc" value="{{$random->desc}}">
                <button type="submit" style="border: none" class="like">
                  <i class="fa-regular fa-heart"></i>
                </button>
              </form>
            </div>
            <p class="price">{{$random->price}} MMK</p>
            <p class="product-about">
              {{ Str::limit($random->desc, 150) }}
            </p>
            <form action="/add-to-cart" method="POST">
              @csrf
              <input type="hidden" name="thumbnail" value="{{$random->thumbnail}}">
              <input type="hidden" name="name" value="{{$random->name}}">
              <input type="hidden" name="price" value="{{$random->price}}">
              <button type="submit" class="add-cart-btn">
                Add to cart
                <i class="fa-solid fa-bag-shopping"></i>
              </button>
            </form>
          </div>
          @endforeach
          
          {{-- <div class="product-card last-card">
            <div class="product-img">
              <img src="{{asset('img/about2.jpg')}}" alt="">
            </div>
            <div class="product-title-like">
              <h5 class="product-title">H beam Structure</h5>
              <div class="like">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <p class="price">24,000 MMK</p>
            <p class="product-about">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, magnam.
            </p>
            <button class="add-cart-btn">
              Add to cart 
              <i class="fa-solid fa-bag-shopping"></i>
            </button>
          </div> --}}
        </div>
      </div>
    </div>
  </div>