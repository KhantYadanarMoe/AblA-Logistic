<div class="user-info-container">
    <div class="username-address">
      <img src="{{asset("img/pf.jpg")}}" alt="" class="default-pf" />
      <div>
        <h4>{{Auth::user()->name}}</h4>
        {{-- <p class="text-secondary">{{$info->street}}, {{$info->township}}, {{$info->city}}</p> --}}
      </div>
    </div>
    
    <div class="user-info-edit">
      <form action="/user-info" method="POST">
        @csrf
        <!-- add previous data for name, email. And if there is another data already, show all data in input box -->
        <p class="text-success mb-2 mt-3" style="font-weight: 600">Please fill your infos for flexible shopping with us.</p>
        <div>
          <label for="name">Name</label>
          <p class="user-info-read">
            {{ old('name', Auth::user()->name) }}
          </p>
        </div>
        <div class="two-input">
          <div>
            <label for="email">Email</label>
            <p class="user-info-read">
              {{ old('email', Auth::user()->email) }}
            </p>
          </div>
          <div>
            <label for="phone">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $info->phone ?? '') }}" required />
            <x-error name="phone"></x-error>
          </div>
        </div>
        <div class="three-input">
          <div>
            <label for="street">Street</label>
            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street"value="{{ old('street', $info->street ?? '') }}" required />
            <x-error name="street"></x-error>
          </div>
          <div>
            <label for="township">Township</label>
            <input id="township" type="text" class="form-control @error('township') is-invalid @enderror" name="township" value="{{ old('township', $info->township ?? '') }}" required>
            <x-error name="township"></x-error>
          </div>
          <div>
            <label for="city">City</label>
            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $info->city ?? '') }}" required>
            <x-error name="city"></x-error>
          </div>
        </div>
        @if(session('success'))
            <div class="text-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="text-center">
          <button type="submit" class="user-info-edit-btn">Save</button>
        </div>
      </form>
    </div>
  </div>