<div class="container">
    <div class="all-products">
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
        
        @forelse ($products as $product)
        <div class="product-card">
          <div class="product-img">
            <img src="/storage/{{$product->thumbnail}}" alt="" />
          </div>
          <div class="product-title-like">
            <h5 class="product-title">{{$product->name}}</h5>
            <form action="/add-to-wishlist" method="POST">
              @csrf
              <input type="hidden" name="thumbnail" value="{{$product->thumbnail}}">
              <input type="hidden" name="name" value="{{$product->name}}">
              <input type="hidden" name="price" value="{{$product->price}}">
              <input type="hidden" name="desc" value="{{$product->desc}}">
              <button type="submit" style="border: none" class="like">
                <i class="fa-regular fa-heart"></i>
              </button>
            </form>
          </div>
          <p class="price">{{$product->price}} MMK</p>
          <p class="product-about">
            {{ Str::limit($product->desc, 150) }}
          </p>
          <form action="/add-to-cart" method="POST">
            @csrf
            <input type="hidden" name="thumbnail" value="{{$product->thumbnail}}">
            <input type="hidden" name="name" value="{{$product->name}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <button type="submit" class="add-cart-btn">
              Add to cart
              <i class="fa-solid fa-bag-shopping"></i>
            </button>
          </form>
        </div>
        @empty
        <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="mx-auto">No Products Found.</p>
        @endforelse
      </div>
    </div>
  </div>