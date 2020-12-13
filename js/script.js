$(document).ready(function(){    
  $(".phone").mask("+38(099) 999-99-99");
  if (document.querySelector("#candles")) {
    $(".scrollToCandles").click(function(e) {
        e.preventDefault();
        $("html, body").animate(
            {
                scrollTop: $("#candles").offset().top - 70
            },
            2000
        );
    });
    $(".scrollToAromats").click(function(e) {
      e.preventDefault();
      $("html, body").animate(
          {
              scrollTop: $("#aromats").offset().top - 70
          },
          2000
      );
    });
    $(".scrollToUsage").click(function(e) {
      e.preventDefault();
      $("html, body").animate(
          {
              scrollTop: $("#usage").offset().top - 70
          },
          2000
      );
    });
    $(".scrollToContacts").click(function(e) {
      e.preventDefault();
      $("html, body").animate(
          {
              scrollTop: $("#contacts").offset().top - 70
          },
          2000
      );
    });
    $(".scrollToMainForm").click(function(e) {
      e.preventDefault();
      $("html, body").animate(
          {
              scrollTop: $("#main_form").offset().top - 70
          },
          2000
      );
    });
  }

  /* #region upper btn when scroll down */
    jQuery(function($) {
        var $win = $(window);
        var winH = $win.height(); // Get the window height.

        $win.on("scroll", function() {            
            if ($(this).scrollTop() > winH) {
                $(".upper").addClass("upper_fixed");
                $(".upper__btn").addClass("upper_fixed");
            } else {
                $(".upper").removeClass("upper_fixed");
                $(".upper__btn").removeClass("upper_fixed");
            }
        }).on("resize", function() {
            // If the user resizes the window
            winH = $(this).height(); // you'll need the new height value
        });
    });

    $('.js-upper').click(function(){
        window.scrollTo({ top: 0, behavior: 'smooth' });
    })
    /* #endregion */
});