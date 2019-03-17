<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/flickity.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/aos_lib.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script type="text/javascript">
  $(window).on("scroll", function() {
    if($(window).scrollTop()) {
      $('nav').addClass('black');
    } else {
      $('nav').removeClass('black');
    }
  });

  (function($) {
    $(document).ready(function() {
      $('.slider-clients').flickity({
          cellAlign: 'left',
          contain: true,
          autoPlay: true,
          pageDots: false
      });

      $('.control_carousel').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: true,
        pageDots: true
      });

      $('.slider_products').flickity({
          cellAlign: 'left',
          contain: true,
          autoPlay: true,
          pageDots: false
      });

      $('.event_slide').flickity({
          cellAlign: 'left',
          contain: true,
          autoPlay: true,
          pageDots: false
      });

      $('.slide_our_done').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: true,
        pageDots: false
      });

      $('.slider_dp').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: true,
        pageDots: true
      });

      $('.carousel-nav').flickity({
        asNavFor: '.slider_dp',
        contain: true,
        pageDots: false
      });
      $('.slider-projects').flickity({
        cellAlign: 'left',
        contain: true,
        autoPlay: true,
        pageDots: true
      });


    });

    $('.about_us .btn-more').click(function() {
      $('#more').slideToggle();
    });

    $('.whatsapp-btn').click(function(){
      $('#whatsapp').toggleClass('toggle');
    });

    $('#whatsapp .submit').click(WhatsApp);

    $("#whatsapp input, #whatsapp textarea").keypress(function() {
      if (event.which == 13) WhatsApp();
    });

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    function WhatsApp() {
      var ph = '';
      if ($('#whatsapp .nama').val() == '') {
        ph = $('#whatsapp .nama').attr('placeholder');
        alert('Silahkan tulis ' + ph);
        $('#whatsapp .nama').focus();
        return false;
      } else if ($('#whatsapp .pesan').val() == '') {
        ph = $('#whatsapp .pesan').attr('placeholder');
        alert('Silahkan tulis ' + ph);
        $('#whatsapp .pesan').focus();
        return false;
      } else {
        if (!confirm("Sudah menginstall WhatsApp?")) {
          window.open("https://www.whatsapp.com/download/");
        } else {
          var url_wa = 'https://web.whatsapp.com/send';
          if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            url_wa = 'whatsapp://send/';
          }
          var tujuan = $('#whatsapp .tujuan').val(),
          nama = $('#whatsapp .nama').val(),
          pesan = $('#whatsapp .pesan').val();
          $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text=Halo, saya ' + nama +'. '+ pesan);
          var w = 960,
          left = Number((screen.width / 2) - (w / 2)),
          tops = Number((screen.height / 2) - (h / 2)),
          popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
          popupWindow.focus();
          return false;
        }
      }
    }
  })(jQuery)
</script>