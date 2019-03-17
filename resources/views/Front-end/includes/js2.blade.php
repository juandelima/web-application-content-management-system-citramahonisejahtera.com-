<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/flickity.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/aos_lib.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://urbanquarter.com/js/bootstrap.js"></script>  
<script type="text/javascript" src="https://urbanquarter.com/js/jquery.smartmenus.js"></script>
<script type="text/javascript" src="https://urbanquarter.com/js/jquery.smartmenus.bootstrap.js"></script>
<!--
<script src="https://urbanquarter.com/js/sequence.js"></script>
<script src="https://urbanquarter.com/js/sequence-theme.modern-slide-in.js"></script>  
-->
<script type="text/javascript" src="https://urbanquarter.com/js/jquery.simpleGallery.js"></script>
<script type="text/javascript" src="https://urbanquarter.com/js/jquery.simpleLens.js"></script>
<script type="text/javascript" src="https://urbanquarter.com/js/nouislider.js"></script>
<script type="text/javascript" src="https://urbanquarter.com/js/slick.js"></script>
<script src="https://urbanquarter.com/js/custom.js"></script> 
<script type="text/javascript" src="https://urbanquarter.com/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="https://urbanquarter.com/js/menu_jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
  $(window).on("scroll", function() {
    if($(window).scrollTop()) {
      $('nav').addClass('black');
    } else {
      $('nav').removeClass('black');
    }
  });

  $(document).ready(function(){
    $('.nama_produk').click(function(){
      $('nav').css('display','none');
    });

    $('.nav-btn').click(function() {
      if($('#nav').is(':checked'))
        $('.nav-wrapper').css('display','none');
      else
        $('.nav-wrapper').css('display','block');
    });

    $('.close').click(function(){
      $('nav').css('display','block');
    });
  });
</script>