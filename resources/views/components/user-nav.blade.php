<nav>
    <div class="navbar p-3">
      <div class="container">
        <div class="nav-sm">
          <div class="sidebarOpen">
            <i class="fa-solid fa-bars-staggered sidebarOpen"></i>
          </div>
          <div class="menu-toggle">
            <div class="logo-toggle">
              <i class="fa-solid fa-xmark sidebarClose"></i>
            </div>
            <ul class="nav-sm-links">
              <a href="/"><li class="nav-sm-link">Home</li></a>
              <a href="/about"><li class="nav-sm-link">About</li></a>
              <a href="/products"><li class="nav-sm-link">Products</li></a>
              <a href="/contact"><li class="nav-sm-link">Contact Us</li></a>
              @can('admin')
              <a href="/admin/products"><li class="nav-sm-link">Admin Dashboard</li></a>
              @endcan
              @auth
              
              <a href="/user-info"><li class="nav-sm-link">Account</li></a>
              <a href="{{ route('logout') }}" class="nav-sm-link"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              @endauth
              

            </ul>
          </div>
        </div>
        <h3 class="logo"><span class="logo-green">AlbA</span> Logistic</h3>
        <ul class="nav-lg-links">
          <a href="/"><li class="nav-lg-link">Home</li></a>
          <a href="/about"><li class="nav-lg-link">About</li></a>
          <a href="/products"><li class="nav-lg-link">Products</li></a>
          <a href="/contact"><li class="nav-lg-link">Contact Us</li></a>
          @auth
          <a href="/user-info"><li class="nav-lg-link">Account</li></a>
          @endauth
          @can('admin')
            <a href="/admin/products"><li class="nav-lg-link">Admin</li></a>
          @endcan
          
        </ul>
        
        <div class="auth">
          @guest
          @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link auth-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                <a class="nav-link auth-icon me-3" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link auth-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                <a class="nav-link auth-icon" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
            </li>
          @endif
          @else
            
            <div class="auth-links">
              <a href="/wishlist" class="auth-link" class="pe-2">
                <i class="fa-solid fa-heart"></i>
              </a>
              <a href="/cart" class="auth-link">
                <i class="fa-solid fa-bag-shopping badge-container" id="cart-icon">
                  <span class="badge badge-danger">{{ session('cartCount', 0) }}</span>
                </i>
              </a>
            </div>
            <li class="nav-item dropdown acc-lg">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>
        @endguest
          
        </div>
      </div>
    </div>
  </nav>
