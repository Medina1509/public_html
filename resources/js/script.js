$(function () {
	//script for popups
	$('a.show_popup').click(function () {
		$('div.'+$(this).attr("rel")).fadeIn(500);
		$("body").append("<div id='overlay'></div>");
		$('#overlay').show().css({'filter' : 'alpha(opacity=80)'});
		return false;				
	});	
	$('a.close').click(function () {
		$(this).parent().fadeOut(100);
		$('#overlay').remove('#overlay');
		return false;
	});
	var limit = 3;
$('input.single-checkbox').on('click', function (evt) {
    if ($('.single-checkbox:checked').length > limit) {
        this.checked = false;
    }
});
var answercount = 1;

function getCurrentQuestionElement(answercount) {
	return $('#question-' + answercount);
}

$("#flip").click(function() {
  $("#panel").show("slow");
});

$(".send").click(function() {
  var currentQuestionElement = getCurrentQuestionElement(answercount);
  var inputRadioCheckedInCurrentQuestion = currentQuestionElement.find('input:checkbox:checked');
  var inputRadioCheckedInCurrentQuestionFirstProp = inputRadioCheckedInCurrentQuestion.prop("checked");

  console.log('inputRadioCheckedInCurrentQuestion: ', inputRadioCheckedInCurrentQuestion);
  console.log('inputRadioCheckedInCurrentQuestionFirstProp: ', inputRadioCheckedInCurrentQuestionFirstProp);

  if (!!inputRadioCheckedInCurrentQuestionFirstProp) {
    answercount = $(this).closest(".question").attr("id").split('-')[1];
    console.log(answercount);

    $('#question-' + answercount).addClass('hidden');
    answercount = answercount * 1 + 1;
    console.log(answercount);
    $('#question-' + answercount).toggleClass('hidden');
  } else {
   // alert('Выберите хотя бы один тег!');
  // die("sorry my fault, didn't mean to but now I am in byte nirvana");
  return ("Пока");
  }
});

});
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

    $(".btn-submit").click(function(e){

  

        e.preventDefault();

   

        var name = $("textarea[name=name]").val();

        var author = $("input[name=author]").val();

        //var vehicle = $("input[name=vehicle").val();
        var vehicle = $("input:checkbox[name=vehicle[]]:checked").val();
   

        $.ajax({

           type:'POST',

           url:'/ajaxRequest',

           data:{name:name, author:author, vehicle:vehicle},

           success:function(data){

           //   alert(data.success);
           $('#one1').html(data);

                setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);    



           }

        });

  

	});

