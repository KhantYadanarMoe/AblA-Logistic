<div class="user-container">
    <div class="products-header">
      <h4>Users</h4>
      <form action="/admin/users">
        <div class="search-box">
          <input type="text" name="search" value="{{request('search')}}" placeholder="Search..." />
          <button>
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form>
    </div>
    <div class="orders-table">
      <ul class="orders-header">
        <li class="order-no">No.</li>
        <li class="cus-name">Name</li>
        <li class="email">Email</li>
        <li class="order-total">Orders</li>
      </ul>
      @foreach ($users as $user)
      <ul class="orders-row">
        <li class="order-no">{{$user->id}}</li>
        <li class="cus-name">{{$user->name}}</li>
        <li class="email">{{$user->email}}</li>
        <li class="order-total">{{ $user->orders_count }}</li>
      </ul>
      @endforeach
    </div>
  </div>