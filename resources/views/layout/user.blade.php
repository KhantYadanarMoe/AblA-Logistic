<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlbA Logistic | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <script
      src="https://kit.fontawesome.com/3fe29430bd.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    
  </head>
  <body>
    @yield('content')
    <script>
      const body = document.querySelector("body"),
        nav = document.querySelector("nav"),
        sidebarOpen = document.querySelector(".sidebarOpen"),
        sidebarClose = document.querySelector(".sidebarClose");

      //   js code to toggle sidebar
      sidebarOpen.addEventListener("click", () => {
        nav.classList.add("active");
      });
      body.addEventListener("click", (e) => {
        let clickedElm = e.target;
        if (
          !clickedElm.classList.contains("sidebarOpen") &&
          !clickedElm.classList.contains("menu-toggle")
        ) {
          nav.classList.remove("active");
        }
      });
    </script>
  </body>
</html>
  