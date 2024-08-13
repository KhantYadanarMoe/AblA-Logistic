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
          <li class="c-name">Name</li>
          <li class="c-phone">Phone</li>
          <li class="c-msg">Message</li>
          <li class="c-done">Action</li>
        </ul>
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
