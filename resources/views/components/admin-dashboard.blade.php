<div class="dashboard-container px-4 py-3">
    <h3 class="d-header">Admin Dashboard</h3>
    <div class="report-cards">
        <div class="report-card">
            <i class="fa-solid fa-users"></i>
            <div class="report-text">
                <span>Users</span>
                <span class="count">{{$user}}</span>
            </div>
        </div>
        <div class="report-card">
            <i class="fa-solid fa-boxes-stacked"></i>
            <div class="report-text">
                <span>Completed Orders</span>
                <span class="count">{{$completed}}</span>
            </div>
        </div>
        <div class="report-card">
            <i class="fa-solid fa-box-open"></i>
            <div class="report-text">
                <span>Total Orders</span>
                <span class="count">{{$total}}</span>
            </div>
        </div>
        <div class="report-card l-card">
            <i class="fa-solid fa-warehouse"></i>
            <div class="report-text">
                <span>Selling Products</span>
                <span class="count">{{$products}}</span>
            </div>
        </div>
    </div>
    <div class="latest-orders mt-4 mb-5">
        <h4 class="d-header mb-3">Latest Orders</h4>
        <div class="orders-table">
            @foreach ($orders as $order)
            <a href="/admin/orders/{{$order->id}}/details" class="orders-link">
              <ul class="orders-row">
                <li class="order-no">{{$order->id}}</li>
                <li class="orderId">{{$order->order_no}}</li>
                <li class="customer">{{$order->user->name}}</li>
                <li class="orderAt">{{$order->created_at->diffForHumans()}}</li>
                <li class="total">{{$order->total}} <span>MMK</span></li>
              </ul>
            </a>
            @endforeach
        </div>
    </div>
    <div class="latest-contacts mt-4">
        <h4 class="d-header mb-3">Latest Contacts</h4>
        <div class="contacts-table">
            
            @forelse ($contacts as $contact)
                <form action="/contact-done/{{$contact->id}}" method="POST">
                @csrf
                    <ul class="contacts-row">
                        <li class="c-name" name="name">{{$contact->firstName}}</li>
                        <li class="c-phone" name="phone">{{$contact->phone}}</li>
                        <li class="c-msg" name="message">{{$contact->message}}</li>
                        {{-- <li class="c-done">
                            <a href="">
                                <i class="fa-solid fa-check"></i>
                            </a>
                        </li> --}}
                        <button type="submit" style="background: none; border: none;" class="c-done">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </ul>
                </form>
            @empty
                <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Contacts Found.</p>
            @endforelse
        </div>
        <div class="contact-cards">
            @forelse ($contacts as $contact)
            <form action="/contact-done/{{$contact->id}}" method="POST">
                @csrf
                <div class="contact-card">
                    <div class="contact-pf">
                        <img src="{{asset('img/pf.jpg')}}" alt="" class="contact-img">
                        <div class="contact-info">
                            <h5 class="contact-name" name="name">{{$contact->firstName}} {{$contact->lastName}}</h5>
                            <p class="contact-phone" name="phone">{{$contact->phone}}</p>
                        </div>
                    </div>
                    <div class="contact-msg" name="message">
                        {{$contact->message}}
                        
                    </div>
                    <button type="submit" style="border: none;" class="contact-btn">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </div>
            </form>
            @empty
            <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Contacts Found.</p>
            @endforelse
        </div>  
    </div>
</div>