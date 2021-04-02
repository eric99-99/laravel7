<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>.: Khabib Nurmagomediv :.</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">PartnerIklan.com</a>
                    </li>
                    
                </ul>
            </div>
            {{-- <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div> --}}
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Homepage</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="#">News</a>
                    </li>

                    <li class="nav-item dropdown active">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Google</a>
                        <a class="dropdown-item" href="#">Facebook Ads</a>
                        <a class="dropdown-item" href="#">SEO</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Training</a>
                      </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Order</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
          </nav>  
          <div class="mt-1">
            <img src="{{ asset('img/khabib_back.jpg') }}" class="img-fluid" style="height: 230px; width: 100%">
          </div>
          <div class="row mt-1">
             <div class="col">
                <a href="#" title="Google Ads">
                  <img class="img-thumbnail" src="{{ asset('img/Google-Ads.jpg') }}"  style="height: 70px; width:100%;">
                </a>  
              </div> 
              <div class="col">
                <a href="#" title="Facebook Ads">
                  <img class="img-thumbnail" src="{{ asset('img/FB-Ads.jpg') }}"  style="height: 70px; width:100%;">
                </a>  
              </div>
              <div class="col">
                <a href="#" title="SEO">
                  <img class="img-thumbnail" src="{{ asset('img/SEO.jpg') }}"  style="height: 70px; width:100%;">
                </a>  
              </div>
              <div class="col">
                <a href="#" title="Training">
                  <img class="img-thumbnail" src="{{ asset('img/Training.jpg') }}"  style="height: 70px; width:100%;">
                </a>  
              </div>
          </div>

          <div class="row mt-4">
              <div class="col-4">
                <img class="img-thumbnail" src="{{ asset('img/khabib_tawhid.jpg') }}"  style="height: 200px; width:100%;">
              </div>
              <div class="col-8">
                <div class="text-justify read-more ">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                  took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                  the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                  like Aldus PageMaker including versions of Lorem Ipsum.
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                  took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                  the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                  like Aldus PageMaker including versions of Lorem Ipsum.
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                  took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                  the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                  like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
              </div>
          </div>

          <div class="row mt-2">
            <div class="col-8">
              <div class="text-justify read-more">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
            </div>
            <div class="col-4">
              <img class="img-thumbnail" src="{{ asset('img/khabib_belt.jpg') }}"  style="height: 200px; width:100%;">
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-4">
              <img class="img-thumbnail" src="{{ asset('img/khabib_umroh.jpg') }}"  style="height: 200px; width:100%;">
            </div>
            <div class="col-8">
              <div class="text-justify read-more">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software 
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
            </div>
          </div>
         

      </div>
      
      <script type="text/javascript">
          window.$(document).ready(function(){
            let readMoreHTML = $(".read-more").html();
            let lessText = readMoreHTML.substr(0, 1100);

            if(readMoreHTML.length > 1100){
              $(".read-more").html(lessText).append("<a href='' class='read-more-link'>...Show More </strong></a>");
            } else {
              $("read-more").html(readMoreHTML);
            }

            $("body").on("click", ".read-more-link", function(event){
              event.preventDefault();
              $(this).parent(".read-more").html(readMoreHTML).append("<a href='' class='show-less-link'> Show Less</a>");
            });
      
            $("body").on("click", ".show-less-link", function(){
              event.preventDefault();
              $(this).parent(".read-more").html(readMoreHTML.substr(0, 1100)).append("<a href='' class='read-more-link'>...Show More</a>");
            });

          });

      </script>
    </body>
</html>
