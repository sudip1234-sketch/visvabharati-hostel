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

    <title>Visva Bharati</title>
  </head>
  <body>

    <header>
      <div class="headerTop">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <a href="<?php echo base_url('admin'); ?>" id="brand-logo">
                <img src="<?php echo base_url(); ?>assets/admin/images/Visva_bharati_logo.jpg" alt="Visva Bharati" class="brand-img">
                <h5 class="brand-name">Visva Bharati</h5>
                <p class="brand-tagline"><small>A Central University & an Institution of National Importance</small></p>
              </a>
            </div>
            
          </div>
        </div>
      </div>
    </header>

    <div class="inner-page-content-sectn student-dashboard">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
              <div class="card text-white bg-secondary login_sectn login_sectn_admin">
                <div class="card-header">Admin Login</div>
                <div class="card-body">
                  <form action="<?php echo base_url('check_admin_login'); ?>" method="post">
                    <div class="form-group">
                      <label>Admin Email Id</label>
                      <input type="email" name="username" class="form-control" placeholder="Enter Email Id" value="">                
                    </div>
                    <div class="form-group">
                      <label>Admin Password</label>
                      <input type="password" name="passwd" class="form-control" placeholder="Enter Password" value="">                
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                   <!--  <a href="student-dashboard.html" class="btn btn-light">Login</a> -->
                    &nbsp; 
                    <a href="<?php echo base_url('admin_forgot_password'); ?>" class="forgot-password" style="color: #fff;"><small><u>Forgot Password?</u></small></a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <!-- <div class="googlemap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3653.8930277622376!2d87.68778661509612!3d23.679783184624327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f9dcbc7d3f7def%3A0xa7ec725811c08522!2sVisva-Bharati!5e0!3m2!1sen!2sin!4v1529413202900" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      <div class="map-img"><img src="images/inside-visva-bharati.jpg" alt="" class="img-thumbnail"></div>
    </div> -->

    <footer>
      <div class="container">
        <span class="copyright">Visva Bharati, Official Site, Copyright © 2018</span>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- slick Script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
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
          changeYear: true
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

  </body>
</html>