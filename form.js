$(document).ready(function(){
  $("#rsvp-submit").click(function(){
    var password = $("#password").val();
    var name = encodeURIComponent($("#name").val());
    var attending = $(".radio-button:checked").val();
    var numguests = $("#numguests").val();
    var message = $("#message").val();

    var dataString = {
      password: password,
      name: name,
      attending: attending,
      numguests: numguests,
      message: message
    };

    if(name==''||password==''){
      $("#form-display").html("Please fill all fields");
    } else {
      $.ajax({
        type: "POST",
        url: "rsvp-to-email.php",
        data: dataString,
        cache: false,
        success: function(result){
          $("#form-display").html(result);
          alert(result);
        }
      });
    }
    return false;
  });
});
