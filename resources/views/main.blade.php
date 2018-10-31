<!DOCTYPE html>
<html>
<head>
@include('partials._head')

</head>


  <body>
      
   @include('partials._nav') 
    <!-- main-content -->
    <div class="container">
        @include('partials._messages')
        {{ Auth::check() ? "Logged in" : "Logged out"}}
        @yield('content')
        <!--/.container--> 
    </div>
    <!--/.footer-->
    @include('partials._footer')

    @include('partials._scripts')
  </body>
</html>