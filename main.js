$(document).ready(function(){
  $("#BTN").click(function(){

  var name = $('input[name=name]').val();
  var surname = $('input[name=surname]').val();
  var email = $('input[name=email]').val();
  var formdata = {name: name, surname: surname, email: email};
  
  $.ajax({
    url: 'Process2.php',
    type: 'POST',
    data: formdata,
    success: function(result){
      alert(result);
  
  }
  });
  });
});




