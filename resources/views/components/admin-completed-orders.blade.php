<div class="orders-container">
    <div class="contact-header-container">
      <div class="contact-header">
          <h3 class="header">Completed Orders</h3>
          
      </div>
      <form action="">
          <div class="search-box mt-4">
            <input type="text" name="search" value="{{request('search')}}" placeholder="Search..." />
            <button>
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
  </div>
      <div class="order-status-links">
        <span class="order-status-link"><a href="/admin/orders">All</a></span>
        <span class="order-status-link"><a href="/admin/orders/completed">Completed</a></span>
      </div>
      <div class="orders-table">
        <ul class="orders-header">
          <li class="order-no">No.</li>
          <li class="orderId">Id</li>
          <li class="customer">Customer</li>
          <li class="orderAt">Order At</li>
          <li class="total">Total <span class="head-mmk">(MMK)</span></li>
        </ul>
        @foreach ($completeds as $completed)
          
          <a href="/admin/orders/{{$completed->c_id}}/completed/details" class="orders-link" style="opacity: 0.5">
            <ul class="orders-row">
              <li class="order-no">{{$completed->c_id}}</li>
              <li class="orderId">{{$completed->order_no}}</li>
              <li class="customer">{{$completed->user->name}}</li>
              <li class="orderAt">{{$completed->created_at->diffForHumans()}}</li>
              <li class="total">{{$completed->total}} <span>MMK</span></li>
            </ul>
          </a>
        @endforeach
      </div>
    </div>