<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Profile | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/user-pf.css')}}" />
    
    <script
      src="https://kit.fontawesome.com/3fe29430bd.js"
      crossorigin="anonymous"
    ></script>
    {{-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script> --}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  </head>
  <body>
    <div class="container-fluid m-0 p-0">
        <div class="row g-0">
            <x-user-sidebar></x-user-sidebar>
            <div class="col-lg-9 d-block">
                @yield('user-data')
            </div>
        </div>
      </div>
      <script>
        const body = document.querySelector("body"),
          aside = document.querySelector("aside"),
          sidebarOpen = document.querySelector(".sidebarOpen"),
          sidebarClose = document.querySelector(".sidebarClose");
  
        //   js code to toggle sidebar
        sidebarOpen.addEventListener("click", () => {
          aside.classList.add("active");
        });
        body.addEventListener("click", (e) => {
          let clickedElm = e.target;
          if (
            !clickedElm.classList.contains("sidebarOpen") &&
            !clickedElm.classList.contains("menu-toggle")
          ) {
            aside.classList.remove("active");
          }
        });
      </script>
    </body>
  </html>