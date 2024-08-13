<div class="contact-container">
    <div class="contact-header-container">
        <div class="contact-header">
            <h4>Contact</h4>
            <p>Phone or email your customer as fast as you can to build the good image for your business. </p>
        </div>
        <form action="">
            <div class="search-box">
              <input type="text" name="search" value="{{request('search')}}" placeholder="Search..." />
              <button>
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
    </div>
    <div class="contact-routes ms-3">
        <span class="contact-route"><a href="/admin/contacts">New Messages</a></span>
        <span class="contact-route"><a href="/admin/contacted">Contacted</a></span>
    </div>
    <hr class="ms-3 me-3">
    @if (session('success'))
        <div class="alert alert-info ms-3 me-3">
            {{session('success')}}
        </div>
    @endif
    <div class="contacts-table">
        <ul class="contacts-header">
          <li class="cd-name">Name</li>
          <li class="cd-phone">Phone</li>
          <li class="cd-msg">Message</li>
        </ul>
        @forelse ($contacteds as $contacted)
            <ul class="contacts-row" style="opacity: 0.6">
                <li class="cd-name" name="name">{{$contacted->name}}</li>
                <li class="cd-phone" name="phone">{{$contacted->phone}}</li>
                <li class="cd-msg" name="message">{{$contacted->message}}</li>
            </ul>
        @empty
        <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Contacts Found.</p>
        @endforelse
    </div>
    <div class="contact-cards">
        @forelse ($contacteds as $contacted)
        <div class="contact-card" style="opacity: 0.6">
            <div class="contact-pf">
                <img src="{{asset('img/pf.jpg')}}" alt="" class="contact-img">
                <div class="contact-info">
                    <h5 class="contact-name">{{$contacted->name}}</h5>
                    <p class="contact-phone">{{$contacted->phone}}</p>
                </div>
            </div>
            <div class="contact-msg">
                {{$contacted->message}}
                
            </div>
        </div>
        @empty
        <p style="font-size: 18px; font-weight: 600; color: #3e8107" class="text-center mt-4">No Contacts Found.</p>
        @endforelse
    </div>    
</div>
