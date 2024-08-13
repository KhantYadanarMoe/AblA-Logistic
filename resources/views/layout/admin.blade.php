<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script
      src="https://kit.fontawesome.com/3fe29430bd.js"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  </head>
  <body>
    <x-admin-layout></x-admin-layout>
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
