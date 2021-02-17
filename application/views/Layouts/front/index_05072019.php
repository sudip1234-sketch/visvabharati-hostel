<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/lib/year-select.js"></script> -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">

    <!-- slick CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/front/plugins/slick/slick.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/front/plugins/slick/slick-theme.css' ?>">

    <!-- colorbox CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'/assets/front/plugins/colorbox/colorbox.css' ?>">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.css"> -->

    <!-- custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'/assets/front/css/custom.css'?>">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.js"></script>  -->

    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script> 
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- end datepicker -->
    <title>Visva-Bharati</title>
  </head>
  <body>

    <?php if ($header) echo $header; ?>
    <?php if ($middle) echo $middle; ?>
    <?php if ($footer) echo $footer; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- slick Script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'/assets/front/plugins/slick/slick.min.js' ?>"></script>
    <script>
      $(document).ready(function(){
        $('.banner-slider').slick({
          infinite: true,
          speed: 300,
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 5000
        });

        $('.notice-slider').slick({
          infinite: true,
          speed: 1000,
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 5000,
          vertical: true
        });
      });
    </script>

    <!-- colorbox Script -->
    <script type="text/javascript" src="<?php echo base_url().'/assets/front/plugins/colorbox/jquery.colorbox-min.js'?>"></script>

   <!--  <script>
      $('body').on('mouseenter mouseleave','.dropdown',function(e){
      var _d=$(e.target).closest('.dropdown');_d.addClass('show');
      setTimeout(function(){
        _d[_d.is(':hover')?'addClass':'removeClass']('show');
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded',_d.is(':hover'));
      },300);
    });
    </script> -->
    
  </body>
</html>