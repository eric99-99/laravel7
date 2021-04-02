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

            <div class="row mt-4">
                <div class="col-4">
                    <img class="img-thumbnail" src="{{ asset('img/Google-Ads.jpg') }}"  style="height: 100px; width:100%;">
                </div>
                <div class="col-8">
                    <div class="text-justify read-more">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                        software like Aldus PageMaker including versions of Lorem Ipsum.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                        software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                </div>
            </div>

            <div class="row mt-2" >
                <div class="col-8" >
                    <p class="text-justify read-more" >
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                        It has survived not only five centuries, but also the leap into electronic typesetting, 
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset 
                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus 
                        PageMaker including versions of Lorem Ipsum.
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer 
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s 
                        with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
                        software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div class="col-4">
                    <img class="img-thumbnail" src="{{ asset('img/FB-Ads.jpg') }}"  style="height: 100px; width:100%;">
                </div>
            </div>

          <div class="card w-100 mt-2 ">
            <div class="card-body">
              <div id="card-result">

              </div>
             
            </div>
          </div>

          <button class="btn-primary mt-2 mb2" id="btncard">test</button>

          
          <form method="post" action="{{ route('test') }} " id="form-data">
              @csrf
              <div class="form-group" >
                  <label for="name">Nama:</label>
                  <input type="text" class="form-control form-control-sm " name="row[1][nama]"/>
              </div>
              <div class="form-group" >
                  <label for="name">Alamat:</label>
                  <input type="text" class="form-control form-control-sm " name="row[1][alamat]"/>
              </div>
            
            <button type="submit" class="btn btn-primary">Add Data</button>
        </form>

        <button class="btn-primary mt-2 mb-2" id="btntest">test</button>

        <div class='element mb-1' id='div_1'>
            <input type='text' placeholder='Enter your skill' id='txt_1' name="test[]">
            <input type='text' placeholder='Enter your skill' id='txt_1' name="test[]">
            &nbsp;<button class='add'>Add Skill</button>
        </div>



      </div>
      
      <script type="text/javascript">
        let card_idx =1;


        // window.$(".container").on('click','.read-more',  function(e){
        window.$(document).ready(function(){
            let readMoreHTML = $(".read-more").html();
			let lessText = readMoreHTML.substr(0, 500);

            if(readMoreHTML.length > 500){
				$(".read-more").html(lessText).append("<a href='' class='read-more-link'> Show More</a>");
			} else {
				$("read-more").html(readMoreHTML);
			}

      $("body").on("click", ".read-more-link", function(event){
				event.preventDefault();
				$(this).parent(".read-more").html(readMoreHTML).append("<a href='' class='show-less-link'> Show Less</a>");
			});
 
			$("body").on("click", ".show-less-link", function(){
				event.preventDefault();
				$(this).parent(".read-more").html(readMoreHTML.substr(0, 500)).append("<a href='' class='read-more-link'> Show More</a>");
			});

        });

        window.$("#btntest").click(function() {
          let s_html = '<div class="form-group" name="form"><label for="name">Nama:</label><input type="text" class="form-control form-control-sm" name="name[]"/></div>';
          window.$("#form-data").prepend(s_html);
        });  

        
        window.$("#btncard").click(function(e) {
          e.preventDefault();

          let s_html = '<div class="card w-75 mt-2" id="card_'+ card_idx +'">';
              s_html = s_html + '<div class="card-header d-flex justify-content-end ">';
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

        window.$(".add").click(function(e){
          e.preventDefault();
          // Finding total number of elements added
          var total_element = window.$(".element").length;

          // last <div> with element class id
          var lastid = window.$(".element:last").attr("id");
          var split_id = lastid.split("_");
          var nextindex = Number(split_id[1]) + 1;

          // var max = 5000;
          // Check total number elements
        
          // Adding new div container after last occurance of element class
          window.$(".element:last").after("<div class='element' id='div_"+ nextindex +"'></div>");

          // Adding element to <div>
          let sHtml = "<input type='text' placeholder='Enter your skill' id='txt_"+ nextindex +"'>";
          sHtml = sHtml + "<input class='ml-1' type='text' placeholder='Enter your skill' id='txt2_"+ nextindex +"'>";
          sHtml = sHtml + "<button id='remove_" + nextindex + "' class='remove mb-1 ml-1'>X</button>";
          sHtml = sHtml +"<button id='update_" + nextindex + "' class='disabled mb-1 ml-1'>Disabled</button>";

          window.$("#div_" + nextindex).append(sHtml);

      
        });

        window.$('.container').on('click','.remove',function(e){
            e.preventDefault();
            var id = this.id;
            var split_id = id.split("_");
            var deleteindex = split_id[1];

            // Remove <div> with id
              window.$("#div_" + deleteindex).remove();
        }); 

        $('.container').on('click','.disabled',function(){
            var id = this.id;
            var split_id = id.split("_");
            var updateindex = split_id[1];
            
            window.$("#txt_" +updateindex).attr('disabled', true);
            window.$("#txt2_" +updateindex).attr('disabled', true);
        }); 

      </script>

      



    </body>
</html>
