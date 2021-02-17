<div class="banner-slider inner-page-banner">
      <div class="banner">
        <img src="<?php echo base_url().'/assets/front/images/about-banner-img.jpg' ?>" alt="" class="img-fluid">
        
      </div>
    </div>

    <div class="inner-page-content-sectn">
      <div class="container">
        <!-- <div class="row"> -->
          <div class="row">
           <div class="col-sm-6 col-md-12">
           <div class="card  bg-default mb-3">
            <div class="card-header">Payment</div>
            <div class="card-body">
              <form method="post" action="https://merchant.onlinesbi.com/merchant/merchantprelogin.htm">
              <!-- <input  name="encdata" value="tomMLKdyLMVlENkQoC92GC4o8XYURsoR0khs1Gq8t/GDu7VhC++ITQKvoFoXnDGYxn4P1yAMQfGX1iOA0pLS5v2AoGZkGRO42syftX+lk8U=" type="hidden"> -->
               <input  name="encdata" value="<?php echo $encstring; ?>" type="hidden">
              <input  name="merchant_code" value="VISVA_BHARATI" type="hidden">
              <input type="submit" value="Submit" name="Submit">
              </form>
              </div>
              </div>
           </div>
           </div>
        <!-- </div> -->
      <!-- </div> -->

        </div>
      </div>
    </div>

   