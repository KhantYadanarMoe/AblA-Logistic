<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AlbA Logistic | @yield('title')</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}" />
    <script
      src="https://kit.fontawesome.com/3fe29430bd.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
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
  