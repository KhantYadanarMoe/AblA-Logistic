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
      <div class="order-status">
        <h5 class="header">Order History</h5>
        <hr />
        <div class="timeline">
          <div class="lines">
            <div class="dot"></div>
            <div class="line"></div>
            <div class="dot"></div>
            <div class="line"></div>
            <div class="dot"></div>
            <div class="line"></div>
            <div class="dot"></div>
            <div class="line"></div>
            <div class="dot"></div>
            <div class="line"></div>
          </div>
          <div class="timeline-content">
            <div class="order-process-container">
              <div class="order-processing">
                <i class="fa-solid fa-arrow-pointer"></i>
                <div class="order-status-content">
                  <h6>Order Placed</h6>
                  <p>25 July 2024</p>
                </div>
              </div>
              <div class="order-processing">
                <i class="fa-solid fa-basket-shopping"></i>
                <div class="order-status-content not-yet-done">
                  <h6>Picked</h6>
                  <p>26 July 2024</p>
                </div>
              </div>
              <div class="order-processing">
                <i class="fa-solid fa-box-archive"></i>
                <div class="order-status-content not-yet-done">
                  <h6>Packed</h6>
                  <p>26 July 2024</p>
                </div>
              </div>
              <div class="order-processing">
                <i class="fa-solid fa-truck-fast"></i>
                <div class="order-status-content not-yet-done">
                  <h6>Shipped</h6>
                  <p>27 July 2024</p>
                </div>
              </div>
              <div class="order-processing">
                <i class="fa-solid fa-truck-ramp-box"></i>
                <div class="order-status-content not-yet-done">
                  <h6>Delivered</h6>
                  <p>depend on your location</p>
                </div>
              </div>
            </div>
          </div>
        </div>
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