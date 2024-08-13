<div class="container-fluid m-0 p-0">
  <form action="/order" method="POST">

    <div class="row g-0">
      
      @csrf
      <div class="col-lg-8 col-12 p-4">
        
        <h3 class="cart-header my-3">Your Shopping Cart</h3>
        @if (session('success'))
          <div class="alert alert-danger">
            {{session('success')}}
          </div>
        @endif
        @if (session('order'))
          <div class="alert alert-success">
            {{session('order')}}
          </div>
        @endif
        <div class="cart-table">
          <ul class="cart-table-header mb-3">
            <li class="cart-id">No.</li>
            <li class="cart-product">Product</li>
            <li class="cart-quantity">Quantity</li>
            <li class="cart-price">Price</li>
            <li class="cart-control">Action</li>
          </ul>
          @foreach ($carts as $index => $cart)
          <ul class="cart-table-row mb-3">
              <li class="cart-id">{{ $index + 1 }}</li>
              <li class="cart-product">
                  <div>
                      <img src="/storage/{{$cart->thumbnail}}" alt="" />
                      <div class="products-name-quantity">
                          <h5>{{$cart->name}}</h5>
                          <p>{{$cart->price}} MMK</p>
                          <div class="quantity-selector">
                              <button type="button" class="quantity-decrease" data-index="{{ $index }}">-</button>
                              <input
                                  type="number"
                                  class="quantity"
                                  name="quantities[{{$cart->id}}][quantity]"
                                  value="1"
                                  min="1"
                                  data-price="{{ $cart->price }}"
                                  id="quantity1-{{ $index }}"
                              />
                              <button type="button" class="quantity-increase" data-index="{{ $index }}">+</button>
                          </div>
                      </div>
                      <div class="cart-delete-sm">
                          <a href="/remove-from-cart/{{$cart->id}}">
                              <i class="fa-solid fa-trash text-danger"></i>
                          </a>
                      </div>
                  </div>
              </li>
              <li class="cart-quantity">
                  <div class="quantity-selector">
                      <button type="button" class="quantity-decrease" data-index="{{ $index }}">-</button>
                      <input
                          type="number"
                          class="quantity"
                          name="quantities[{{$cart->id}}][quantity]"
                          value="1"
                          min="1"
                          data-price="{{ $cart->price }}"
                          id="quantity-{{ $index }}"
                      />
                      <button type="button" class="quantity-increase" data-index="{{ $index }}">+</button>
                  </div>
              </li>
              <li class="cart-price">{{$cart->price}} MMK</li>
              <li class="cart-control">
                  <a href="/remove-from-cart/{{$cart->id}}">
                      <i class="fa-solid fa-trash text-danger"></i>
                  </a>
              </li>
          </ul>
          <input type="hidden" name="quantities[{{$cart->id}}][price]" value="{{$cart->price}}">
          <input type="hidden" name="quantities[{{$cart->id}}][name]" value="{{$cart->name}}">
          <input type="hidden" name="quantities[{{$cart->id}}][thumbnail]" value="{{$cart->thumbnail}}">
      @endforeach
        </div>
      </div>
      <div class="col-lg-4 col-12 py-4 pe-3">
        <div class="check-out">
          <h5 class="cart-header">CheckOut</h5>
          
          <hr />
          <div class="total">
            <h6>Subtotal -</h6>
            <span id="subtotal" name="total">{{ number_format($carts->sum('price'), 2) }} MMK</span>
          </div>
          <hr />
          <p class="shipping-request">
            Please enter your address and phone to contact when your orders arrived.
          </p>
          {{-- @php
            $orderNumber = '#' . rand(1000, 9999);
          @endphp
          <input type="hidden" name="order_no" value="{{$orderNumber}}">
          <input type="hidden" name="total" value="{{$cart->sum('price')}}"> --}}
          <div class="shipping-contact">
            <div>
              <label for="address">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Sanchaung, Yangon"/>
              <x-error name="address"></x-error>
            </div>
            <div>
              <label for="phone">Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="+959 123 456 789"/>
              <x-error name="phone"></x-error>
            </div>
            <div>
              <label for="msg">Note</label>
              <textarea name="msg" id="" class="form-control"></textarea>
              <x-error name="address"></x-error>
            </div>
          </div>
          <hr />
          <button type="submit" class="order-btn w-100">Order</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
        const quantityDecreaseButtons = document.querySelectorAll('.quantity-decrease');
        const quantityIncreaseButtons = document.querySelectorAll('.quantity-increase');
        const quantityInputs = document.querySelectorAll('.quantity');

        let total = parseFloat('{{ $carts->sum('price') }}');

        document.getElementById('subtotal').innerText = total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' MMK';

        quantityDecreaseButtons.forEach(button => {
          button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            const quantityInput = document.querySelector(`input#quantity-${index}`);
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
              const price = parseFloat(quantityInput.getAttribute('data-price'));
              total -= price;
              quantityInput.value = currentValue - 1;
              updateTotalDisplay();
            }
          });
        });

        quantityIncreaseButtons.forEach(button => {
          button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            const quantityInput = document.querySelector(`input#quantity-${index}`);
            let currentValue = parseInt(quantityInput.value);
            const price = parseFloat(quantityInput.getAttribute('data-price'));
            total += price;
            quantityInput.value = currentValue + 1;
            updateTotalDisplay();
          });
        });

        quantityInputs.forEach(input => {
          input.addEventListener('change', function() {
            updateTotal();
          });
        });

        function updateTotal() {
          let newTotal = 0;
          quantityInputs.forEach(input => {
            const quantity = parseInt(input.value);
            const price = parseFloat(input.getAttribute('data-price'));
            if (quantity > 1) {
              newTotal += (quantity - 1) * price;
            }
          });
          total = newTotal + parseFloat('{{ $carts->sum('price') }}');
          updateTotalDisplay();
        }

        function updateTotalDisplay() {
          document.getElementById('subtotal').innerText = total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' MMK';
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const quantityDecreaseButtons = document.querySelectorAll('.quantity-decrease');
        const quantityIncreaseButtons = document.querySelectorAll('.quantity-increase');
        const quantityInputs = document.querySelectorAll('.quantity');

        let total = parseFloat('{{ $carts->sum('price') }}');

        document.getElementById('subtotal').innerText = total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' MMK';

        quantityDecreaseButtons.forEach(button => {
          button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            const quantityInput = document.querySelector(`input#quantity1-${index}`);
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
              const price = parseFloat(quantityInput.getAttribute('data-price'));
              total -= price;
              quantityInput.value = currentValue - 1;
              updateTotalDisplay();
            }
          });
        });

        quantityIncreaseButtons.forEach(button => {
          button.addEventListener('click', function() {
            const index = button.getAttribute('data-index');
            const quantityInput = document.querySelector(`input#quantity1-${index}`);
            let currentValue = parseInt(quantityInput.value);
            const price = parseFloat(quantityInput.getAttribute('data-price'));
            total += price;
            quantityInput.value = currentValue + 1;
            updateTotalDisplay();
          });
        });

        quantityInputs.forEach(input => {
          input.addEventListener('change', function() {
            updateTotal();
          });
        });

        function updateTotal() {
          let newTotal = 0;
          quantityInputs.forEach(input => {
            const quantity = parseInt(input.value);
            const price = parseFloat(input.getAttribute('data-price'));
            if (quantity > 1) {
              newTotal += (quantity - 1) * price;
            }
          });
          total = newTotal + parseFloat('{{ $carts->sum('price') }}');
          updateTotalDisplay();
        }

        function updateTotalDisplay() {
          document.getElementById('subtotal').innerText = total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' MMK';
        }
    });
</script>