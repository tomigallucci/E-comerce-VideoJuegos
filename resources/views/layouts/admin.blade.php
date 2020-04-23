<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/home.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"><link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" defer/>

    <!-- script -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/myApp.js') }}" defer></script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha256-5UaCo1aRXIRsfnhrev1tfk3LWrfo2Kd/J9DxHm3uVAo=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha256-zI6VVO07NPmVW11q3RQE42YbRmJIkkunrcQ9LEYxJsQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js" integrity="sha256-8HGN1EdmKWVH4hU3Zr3FbTHoqsUcfteLZJnVmqD/rC8=" crossorigin="anonymous"></script>
  <style>
    .feather {
    width: 16px;
    height: 16px;
    vertical-align: text-bottom;
    }


    /*
    * Sidebar
    */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 48px 0 0;
        /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }


    /*
    * Content
    */

    [role="main"] {
        padding-top: 133px;
        /* Space for fixed navbar */
    }


    /* Space for fixed navbar */

    @media (min-width: 768px) {
        [role="main"] {
            padding-top: 48px;
        }
    }


    /*
    * Navbar
    */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }
    </style>
</head>
<body>
    <div id="app">
      @include('partials.header-admin')
      @include('partials.sidebar-admin')

      <div class="container-fluid">
        <div class="row">
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            @yield('content')

          </main>
        </div>
      </div>
    
        @include('partials.footer')
    </div>

</body>
</html>
