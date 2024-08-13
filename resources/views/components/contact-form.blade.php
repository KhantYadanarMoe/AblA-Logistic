<div class="contact-form-container">
    <div class="container">
      <h3 class="text-center green">Reach us</h3>
      
      <div class="contact-form">
        @if(session('success'))
        <div class="alert alert-secondary" role="alert">
              {{session('success')}}
        </div>
          @endif
        <form action="/contact" method="POST">
          @csrf
          <div class="name">
            <div>
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" class="form-control" />
              <x-error name="firstName"></x-error>
            </div>
            <div>
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" class="form-control" />
              <x-error name="lastName"></x-error>
            </div>
          </div>
          <div class="msg">
            <label for="message">Message</label>
            <textarea id="message" name="message" id="" class="form-control"></textarea>
            <x-error name="message"></x-error>
          </div>
          <h6 class="mt-2">
            Thanks! We will respond back by Phone. Please leave your
            phone for us.
          </h6>
          <div class="contact-phone">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" />
            <x-error name="phone"></x-error>
          </div>
          {{-- <div class="contact-email">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" />
          </div>
           --}}
          <div class="text-center mt-3">
            <button type="submit" class="view-all-btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>