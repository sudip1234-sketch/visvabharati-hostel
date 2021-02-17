<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jquery-ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/lib/year-select.js"></script>

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">

    <!-- slick CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/plugins/slick/slick-theme.css">

    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css">

    <!-- custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/print.css">
    <!-- dataTables.bootstrap4 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">




<!-- https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js
https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js
https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js
https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js -->

<!-- https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css -->


    <!-- slick Script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    <script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script> 

    <!-- <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/admin/ckeditor/ckeditor.js"></script>
  
    <title>Visva-Bharati</title>
   <!--  <style>         
        @media print {
            /*@page{size:54mm 86mm; margin: 0; padding: 0}*/
            .printme{
                width: 54mm !improtant;
                height: 86mm !improtant;
                padding: 0;
                margin: 0
            }
        }
     </style> -->
  </head>
  <body class="">
  <div class="loader-wrapper" style="display: none;">
<img src="<?php echo base_url(); ?>assets/image/ajax-loader.gif">
</div>

    <?php if ($header) echo $header; ?>
    <?php if ($middle) echo $middle; ?>
    <?php if ($footer) echo $footer; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/slick/slick.min.js"></script>
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

    <!-- jquery-ui -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( function() {
        $( ".datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: "-50:+0",
        });
      });
    </script>

    <!-- prop disabled & show/hide -->
    <script>
      $(document).ready(function(){
        $("#btn-edit").click(function(event){
          event.preventDefault();
          $('.inputDisabled').prop("disabled", false); // Element(s) are now enabled.
          $("#btn-edit").hide();
          $("#btn-save").show();
        });

        $("#btn-save").click(function(event){
          event.preventDefault();
          $('.inputDisabled').prop("disabled", true); // Element(s) are now enabled.
          $("#btn-save").hide();
          $("#btn-edit").show();
        });
      });
    </script>




<style type="text/css">
  .loader-wrapper{
  background: rgba(0,0,0,0.5);
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 10;
}

.loader-wrapper img{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}
.bodyCls{
  height: 100%; overflow: hidden;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('.selectpicker').selectpicker();
</script>
<!-- jspdf -->
<script src="<?php echo base_url(); ?>assets/admin/js/jspdf.debug.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jspdf.plugin.autotable.js"></script>
</body>
</html>