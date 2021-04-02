<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JQuery</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" ></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        
    </head>
    <body>


      <div class="container">
        <a href= {{ URL::to('/')}} class="btn btn-success mt-1">Home</a>
        
        <div class="card w-100 mt-2 ">
          <div class="card-body">
            <div id="card-result">

            </div>
            
          </div>
        </div>

        <button class="btn-primary btn mt-2 mb-2" id="btncard">Tambah Frame</button>

      </div>
      
      <script type="text/javascript">
        let card_idx =1;
        
        window.$("#btncard").click(function(e) {
          e.preventDefault();

          let s_html = '<div class="card w-75 mt-2" id="card_'+ card_idx +'">';
              s_html = s_html + '<div class="card-header text-right">';
              s_html = s_html + '   <button class="btnclose btn-danger btn-sm" id="btnclose_'+ card_idx + '">X</button>';
              s_html = s_html + '</div> ';
              s_html = s_html + '<div class="card-body"></div>' ;
              s_html = s_html + '</div>';
          window.$("#card-result").prepend(s_html);

          card_idx++;
        });  

        window.$("#card-result").on('click', '.btnclose', function(e){
          e.preventDefault();
          var id = this.id;
          var split_id = id.split("_");
          var deleteindex = split_id[1];
          window.$("#card_" + deleteindex).remove();
        });

       

      </script>

      



    </body>
</html>
