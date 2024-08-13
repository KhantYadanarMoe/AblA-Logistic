<div class="order-histories-container">
    <h3>Your Orders</h3>
    <div class="orders-table">
      <ul class="orders-header">
        <li class="order-no">No.</li>
        <li class="orderId">Id</li>
        <li class="order-status">Order Status</li>
        <li class="total">Total <span class="head-mmk">(MMK)</span></li>
      </ul>
      @foreach ($orders as $order)
      <a href="order-history/{{$order->id}}/details" class="orders-link">
        <ul class="orders-row">
          <li class="order-no">{{$order->id}}</li>
          <li class="orderId">{{$order->order_no}}</li>
          <li class="order-status">
            <span class="p-tag">Preparing</span>
            <!-- It will be preparing(Orange), Complete(green) -->
          </li>
          <li class="total">{{$order->total}} <span>MMK</span></li>
        </ul>
      </a>
      @endforeach
      @foreach ($completeds as $completed)
      <a href="order-history/{{$completed->c_id}}/completed/details" class="orders-link" style="opacity: 0.5">
        
        <ul class="orders-row">
          <li class="order-no">{{$completed->c_id}}</li>
          <li class="orderId">{{$completed->order_no}}</li>
          <li class="order-status">
            <span class="c-tag">Completed</span>
            <!-- It will be preparing(Orange), Complete(green) -->
          </li>
          <li class="total">{{$completed->total}} <span>MMK</span></li>
        </ul>
      </a>
      @endforeach
    </div>
  </div>