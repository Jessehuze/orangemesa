$(document).ready(function() {
  
  var animating = false,
      submitPhase1 = 1100,
      submitPhase2 = 400,
      logoutPhase1 = 800,
      $login = $(".login"),
      $app = $(".app")
      $signup = $(".signup");
  
  function ripple(elem, e) {
    $(".ripple").remove();
    var elTop = elem.offset().top,
        elLeft = elem.offset().left,
        x = e.pageX - elLeft,
        y = e.pageY - elTop;
    var $ripple = $("<div class='ripple'></div>");
    $ripple.css({top: y, left: x});
    elem.append($ripple);
  };
  
  function $_GET(q,s) 
  { 
      s = s ? s : window.location.search; 
      var re = new RegExp('&'+q+'(?:=([^&]*))?(?=&|$)','i'); 
      return (s=s.replace(/^?/,'&').match(re)) ? (typeof s[1] == 'undefined' ? '' : decodeURIComponent(s[1])) : undefined; 
  }

  var status = $_GET('error');
  if (status == "usernametaken")
  {
    $(".login").css("display", "none");
  }
  
  $("#login").on("click", function(e) {
    $(".login").css("display", "none");
  });
  
  $("#signup").on("click", function() {
    $(".login").css("display", "none");
  });
  
  $("#back2login").on("click", function() {
    $(".login").css("display", "block");
  });
});