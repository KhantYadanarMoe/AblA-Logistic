<div class="order-details-container py-3">
    <div class="order-details-header">
      <h4 class="header">Order {{$order->order_no}}</h4>
      <span class="text-secondary"
        >Order at {{$order->created_at->diffForHumans()}}</span
      >
    </div>
    <div class="order-details-table">
      @foreach ($items as $item)
      <ul>
        <li class="order-details-img-container">
          <img
            src="/storage/{{$item->thumbnail}}"
            alt=""
            class="order-details-img"
            name="thumbnail"
          />
          <h5 class="header">{{$item->name}}</h5>
        </li>

        <li class="order-details-price"><p>{{$item->price}} MMK</p></li>
        <li class="order-details-quantity"><p>x {{$item->quantity}}</p></li>
      </ul>
      @endforeach
      <hr />
      <div class="subtotal">
        <div class="note">
          <h6>Order Note</h6>
          <p>
            {{$order->msg}}
          </p>
        </div>
        <div class="od-total">
          <h6>Total -</h6>
          <h5>{{$order->total}} MMK</h5>
        </div>
      </div>
    </div>
    <div class="cus-info">
      <h5>Customer Details</h5>
      <hr />
      <div class="cus-info-section">
        <div>
          <h6>{{$order->user->name}}</h6>
          <h6>{{$order->phone}}</h6>
        </div>
        <div>
          <span>{{$order->address}}</span>
          
        </div>
      </div>
    </div>
    <form action="/admin/order/{{$order->id}}/completed" method="POST">
      @csrf
      <input type="hidden" name="c_id" value="{{$order->id}}">
      <button type="submit" class="completed-btn">Delivered</button>
    </form>
</div>