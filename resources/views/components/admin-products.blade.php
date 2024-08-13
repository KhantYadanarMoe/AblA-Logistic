<div class="products-container">
    <div class="products-header">
      <div>
        <h4>Products</h4>
        <form action="/admin/products">
          <div class="search-box">
            <input type="text" name="search" value="{{request('search')}}" placeholder="Search..." />
            <button>
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
      </div>
      <div>
        <a href="/admin/products/create">
          <button class="product-btn">+ Add product</button>
        </a>
      </div>
    </div>
    @if (session('success'))
      <div class="text-success mt-3 ms-4 me-2 mb-0">
        {{session('success')}}
      </div>
    @endif
    
    @if (session('updated'))
      <div class="text-warning mt-3 ms-4 me-2 mb-0">
        {{session('updated')}}
      </div>
    @endif
    @if (session('delete'))
      <div class="text-danger mt-3 ms-4 me-2 mb-0">
        {{session('delete')}}
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
        </div>
        <p class="price">{{$product->price}} MMK</p>
        <p class="product-about">
          {{ Str::limit($product->desc, 150) }}
        </p>
          {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,
          magnam. --}}
        
        <div class="action">
          
            <a href="/admin/products/{{$product->id}}/edit" style="text-decoration: none; color: #fff">
              <button class="btn btn-warning me-2">
              Edit
            </button>
            </a>
          
          
          <form action="/admin/products/{{$product->id}}/delete"
            method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
          
        </div>
      </div>
      @empty
      <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Products Found.</p>
      @endforelse
      
    </div>
  </div>