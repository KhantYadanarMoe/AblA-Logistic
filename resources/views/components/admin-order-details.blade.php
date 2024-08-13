{{-- <div class="row g-0">
    <div class="col-lg-9 d-block">
      <div class="order-details-container">
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
      </div>
    </div>
    <div class="col-lg-3 d-block">
      <div class="me-3">
        <h5 class="header">Order History</h5>
        <hr />
        <div class="order-process">
          <h5 class="order-process-step">1</h5>
          <div class="order-process-right">
            <h6 class="order-process-title">Order Placed</h6>
            <span class="order-process-date text-secondary" style="font-size: 14px">9th Aug 2024</span>
          </div>
        </div>
        <hr>
        <div class="order-process">
          <h5 class="order-process-step">2</h5>
          <div class="order-process-right">
            <h6 class="order-process-title">Processing</h6>
            {{-- <span class="order-process-date">9th Aug 2024</span> use if else to add 
            <a href="" class="order-process-done"><i class="fa-solid fa-check"></i></a>
          </div>
        </div>
        <hr>
        <div class="order-process">
          <h5 class="order-process-step">3</h5>
          <div class="order-process-right">
            <h6 class="order-process-title">Complete</h6>
            {{-- <span class="order-process-date">9th Aug 2024</span> use if else to add 
            <a href="" class="order-process-done"><i class="fa-solid fa-check"></i></a>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div> --}}

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