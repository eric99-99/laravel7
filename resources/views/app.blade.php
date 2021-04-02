<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.: Test Toongo :.</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        
    </head>
    <body>
      <div class="container">

          <h1>
             Pengerjaan Test 1 - Test 2 - Test3 (pakai Lumen)
          </h1>

          <div class="form-inline">
            <div class="dropdown">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hasil Test 1
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href= {{ URL::to('/test-css')}} >Test CSS</a>
                <a class="dropdown-item" href={{ route('teacher.index')}}>CRUD Guru</a>
                <a class="dropdown-item" href={{ URL::to('/jquery')}}>JQuery</a>
              </div>
            </div>
  
            <div class="dropdown ml-1">
              <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hasil Test 2
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href= {{ route('trans-view')}} >Transaksi</a>
              </div>
            </div>
  
            {{-- <div class="dropdown ml-1">
              <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hasil Test 3
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href= {{ URL::to('/fibo')}} >Penjumlahan 2 Angka Fibonaccy</a>
              </div>
            </div> --}}
          </div>
         

      </div>
        
    </body>
</html>
