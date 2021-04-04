<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" ></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body>
      <div class="container">
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-success" href={{ URL::to('/')}}>Home</a>
                    </li>
                    
                    
                </ul>
            </div>
            
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="btn btn-warning ml-1" href={{ route('trans-view') }}>Daftar Transaksi</a>
                    </li>
                    <li class="nav-item active">
                        <a class="btn btn-primary ml-1" href={{ route('trans-list') }}>Laporan Transaksi Harian</a>
                    </li>
                    <li class="nav-item active">
                        <a class="btn btn-success ml-1" href={{ route('trans-recap') }}>Laporan Transaksi Rekap</a>
                    </li>

                   
                </ul>
            </div>
          </nav>  

          <div class="content">
                @yield('content')
          </div>
         
      </div>  
      
      @stack('custom-scripts')

    </body>
</html>
