<div class="container-fluid m-0 p-0">
    <div class="row g-0">
      <div class="col-lg-3 d-block">
        <nav>
          <div class="sidebarOpen">
            <i class="fa-solid fa-bars-staggered sidebarOpen"></i>
          </div>
          <h4 class="logo-sm">AlbA Logistic</h4>
          <span style="padding: 10px; font-size: 14px; color: #82d73d"
            >Admin</span
          >
        </nav>
        <aside>
          <div class="sidebar">
            <div class="logo-toggle">
              <i class="fa-solid fa-arrow-left-long sidebarClose"></i>
            </div>
            <div class="logo">
              <h3 class="green">AlbA Logistic</h3>
            </div>
            <ul class="sidebar-links">
              <a href="/admin" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-regular fa-folder-open"></i>
                  Dashboard
                </li>
              </a>
              <a href="/admin/products" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-solid fa-warehouse"></i>
                  Products
                </li>
              </a>
              <a href="/admin/orders" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-solid fa-box-open"></i>
                  Orders
                </li>
              </a>
              <a href="/admin/users" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-solid fa-users"></i>
                  Users
                </li>
              </a>
              <a href="/admin/contacts" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-regular fa-comments"></i>
                  Contact
                </li>
              </a>
              <a href="/" style="text-decoration: none">
                <li class="sidebar-link">
                  <i class="fa-solid fa-home"></i>
                  Home
                </li>
              </a>
            </ul>
            <div class="logout">
              <a class="sidebar-link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
              </a>
              
            </div>
          </div>
        </aside>
      </div>
      <div class="col-lg-9 d-block">
        @yield('admin')
      </div>
    </div>
  </div>