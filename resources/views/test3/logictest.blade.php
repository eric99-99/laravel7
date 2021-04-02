<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        
    </head>
    <body>
        <div class="container">
            <div>
                <a href= {{ URL::to('/')}} class="btn btn-success">Home</a>
            </div>
            
            <h1 class="mt-2"> Perhitungan 2 Angka Fibonaccy</h1>
            <hr>
            
            <form method="post" action="{{ URL::to('/calcFibo')}}">
                <div class="form-group">
                    @csrf
                    <label for="number1">Angka Pertama:</label>
                    <input type="number" class="form-control" name="number1"/>
                </div>
                <div class="form-group">
                    <label for="number2">Angka Kedua :</label>
                    <input type="number" class="form-control" name="number2"/>
                </div>
                <button type="submit" class="btn btn-primary">Hitung</button>
            </form>
        </div>

        <script src="{{ asset('js/app.js') }}" type="text/js"></script>

    </body>
</html>
