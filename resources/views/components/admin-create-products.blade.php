<div class="products-form-container">
    <h3 class="header text-center">Create new products</h3>
    <p class="text-secondary para text-center">
      create new products to show in user interface
    </p>
    <div class="product-form">
      <form action="/admin/products/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
          <label for="img">Product Image</label>
          <input type="file" id="img" name="thumbnail" class="form-control bs" />
          <x-error name="thumbnail"></x-error>
        </div>
        <div class="mb-2">
          <label for="name">Product Name</label>
          <input type="text" id="name" name="name" class="form-control bs" />
          <x-error name="name"></x-error>
        </div>
        
        <div class="mb-2">
          <label for="price">Price</label>
          <div class="input-group bs mb-3">
            <input
              type="text"
              class="form-control"
              aria-label="Amount (to the nearest dollar)"
              id="price"
              name="price"
            />
            <div class="input-group-append">
              <span class="input-group-text">MMK</span>
            </div>
          </div>
          <x-error name="price"></x-error>
        </div>
        <div class="mb-2">
          <label for="about">Product Description</label>
          <textarea
            name="desc"
            id=""
            class="form-control bs"
            id="about"
            name="desc"
          ></textarea>
          <x-error name="desc"></x-error>
        </div>
        <div class="text-center">
          <button type="submit" class="product-btn mt-3 w-50">Create</button>
        </div>
      </form>
    </div>
  </div>