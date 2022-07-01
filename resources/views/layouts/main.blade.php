<!DOCTYPE html>
<html lang="en">
  <head>
      
    @include('partials/head')

  </head>
  <body>
    
    @if ($title !== "Log In" && $title !== "Users")
        @include('partials/navbar')
    @endif
    
    <!-- ============ MAIN ============ -->
    @yield('main')

    @if ($title === "Dashboard" || $title === "Opsi" || $title === "Edit")
        @include('partials/pop-up')
    @endif

    <!-- ============= JS ============ -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>

    @if ($title === "Dashboard" || $title === "Opsi" || $title === "Edit")
        @include('partials/script')
    @endif

    @include('sweetalert::alert')
    @livewireScripts
    @stack('scripts')

  </body>
</html>
