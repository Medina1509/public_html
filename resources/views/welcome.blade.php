<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- Тут Ваши скрипты -->
      <meta name="csrf-token" content="{{ csrf_token() }}"/> 

</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Онлайн-цитатник</title> <!-- настраиваем служебную информацию для браузеров --> 
<meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- загружаем Бутстрап --> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  <link rel="stylesheet" type="text/css" href="{{URL::asset('resources/css/app.css')}}"
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>-->

	<!-- закрываем служебную часть страницы --> 

 <body> <!-- тут будет наша страница --> 
   <script type="text/javascript" src="{{ URL::asset('resources/js/jquery-1.7.1.min.js') }}"></script> 
  <script type="text/javascript" src="{{ URL::asset('resources/js/script.js') }}"></script> 
   

    <div class="container">

</div>
  
  <div class="row">

    <div class="p-4 col-lg-12 col-sm-12 col-md-12">
  <div class="link_group">
   <button> <a class="show_popup" rel="reg_form" href="#">Добавить цитату</a></button>
  </div>

</div>

<div class="popup reg_form col-lg-10 col-md-3 col-sm-3 ml-md-1 ml-5  pl-5">
    <a class="close" href="#">Закрыть</a>
    <h2>Добавить цитату</h2>
   @if($errors->any())
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
    @endif
            <div class="form-group">

                    @csrf 
       <textarea class="form-control" rows="5" placeholder="Введите цитату" name="name"></textarea>

       <br>
       </div>

  

            <div class="form-group">

            <input type="text" class="form-control" placeholder="Автор" name ="author">

            </div>

   

            <div class="form-group">

    <div class="pricing-levels-3">
    <div class="question show" id="question-1">
    <p><strong>Выберете теги (Не более трех!)</strong>


  <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Психология">Психология
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Любовь">Любовь
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Отношения">Отношения
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Дружба">Дружба
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Животные">Животные
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Родители">Родители
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Дети">Дети
    <br>
    <input type="checkbox" class="single-checkbox" name="vehicle[]" value="Работа">Работа
    <br>

</div>
</div>

         </div>
            <div class="form-group">

                <button class="btn btn-success btn-submit send">Submit</button>
    </div>
            </div>
            <br>



        </form>

    </div>

<div id="one1"></div>
  

</body>

<script type="text/javascript">

   

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

    $(".btn-submit").click(function(e){

  

        e.preventDefault();

   

        var name = $("textarea[name=name]").val();

        var author = $("input[name=author]").val();

        var vehicle= [];

      $("input:checkbox[name=vehicle[]]:checked").each(function(){

       vehicle.push(this.value);
       

       });
       vehicle = JSON.stringify(vehicle);
        $.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{name:name, author:author, vehicle:vehicle},

           success:function(data){

           $('#one1').html(data);

                setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    



           }

        });

  

	});

</script>

    </form>
  </div> 
    </div>
     </div>
  </div>
 
   @if(count($users))
   
        <div class="row">
        
         @foreach($users as  $user)
             
          <div class="col-lg-5 mx-auto col-md-12 col-sm-12"> 
          <div id="one1">
    <div class="card">
  <div class="card-body"><!-- Начало текстового контента -->
     <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12 text-md-left text-sm-left mx-md-0 mx-sm-0 p-0 pr-0 pl-0 font-size-md-10px ">{{$user->text_q}}</div>
        <div class="col-lg-12 col-md-12 col-sm-12 text-md-right text-sm-right text-right mx-md-0 mx-sm-0 p-0 pr-0 pl-0">{{$user->name}}</div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-md-left text-sm-left mx-md-0 mx-sm-0 p-0 pr-0 pl-0"><p>Теги: {{$user->tags}}</p></div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-md- text-sm-right text-right mx-md-0 mx-sm-0 p-0 pr-0 pl-0">Добавлено:<br>{{$user->date_q}}</div>
     </div>
  </div><!-- Конец текстового контента -->

</div><!-- Конец карточки -->
</div> 
  <br>
</div>

@endforeach
 
    </div>
     @endif
</div>

    </div>
 </body> <!-- конец всей страницы --> 
<div class ="row">
    <div class="col-lg-11 mx-auto col-md-12 col-sm-12">{{$users->links()}}</div></div> 


  </html>