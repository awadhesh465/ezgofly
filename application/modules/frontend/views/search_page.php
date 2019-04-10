<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/search_style.css'); ?>">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<style type="text/css">
  body{
    overflow-x: hidden;
  }
  .cloud{
    position: absolute;
  }
  .cloud-1 {
      top: 34%;
      height: 60px;
      animation: animate 30s linear infinite;
      width: 318px;
      height: auto;
  }
  .cloud-2{
    left: -50%;
    height: 100px;
    animation: animate2 30s linear infinite;
    width: 120px;
    direction: ltr;
    top: 30%;
  }
  .cloud-3{
    left: -50%;
    animation: animate 50s linear infinite;
    width: 120px;
    direction: ltr;
    top: 20%;
    opacity: 0.5;
  }
  .cloud-4{
    left: -50%;
    height: 100px;
    animation: animate 25s linear infinite;
    direction: ltr;
    top: 25%;
  }
  .diver{
    left: -50%;
    height: 100px;
    animation: animate 40s linear infinite;
    direction: ltr;
    top: 80%;
  }

  @keyframes animate{
    0%{
      transform: translateY(-50%);
      left: -25%;
    }
    25%{
      transform: translateY(0%);
    }
    50%{
      transform: translateY(50%);
    }
    70%{
      transform: translateY(0%);
    }
    100%{
      transform: translateY(-50%);
      left: 125%;
    } 
  }


  @keyframes animate2{
    0%{
      transform: translateY(-50%);
      right: -25%;
    }
    25%{
      transform: translateY(0%);
    }
    50%{
      transform: translateY(50%);
    }
    70%{
      transform: translateY(0%);
    }
    100%{
      transform: translateY(-50%);
      right: 125%;
    } 
  }

  body{
    background-color: white!important;
  }
  .text-center{
    text-align: center;
    font-size: 22px;
    color: white;
    padding: 55px 0 0 0;
  }

</style>



<div style="display: none;">
<input type="hidden" name="optradio" id="optradio" value="<?php echo $search_page_data['optradio'] ?>">
<input type="hidden" name="from" id="from" value="<?php echo $search_page_data['from'] ?>">
<input type="hidden" name="from_city_code" id="from_city_code" value="<?php echo $search_page_data['from_city_code'] ?>">
<input type="hidden" name="to" id="to" value="<?php echo $search_page_data['to'] ?>">
<input type="hidden" name="to_city_code" id="to_city_code" value="<?php echo $search_page_data['to_city_code'] ?>">
<input type="hidden" name="date" id="date" value="<?php echo $search_page_data['date'] ?>">
<input type="hidden" name="flight_date_return" id="flight_date_return" value="<?php echo $search_page_data['flight_date_return'] ?>">
<input type="hidden" name="trip_class" id="trip_class" value="<?php echo $search_page_data['trip_class'] ?>">
<input type="hidden" name="adult" id="adult" value="<?php echo $search_page_data['adult'] ?>">
<input type="hidden" name="children" id="children" value="<?php echo $search_page_data['children'] ?>">
<input type="hidden" name="infant" id="infant" value="<?php echo $search_page_data['infant'] ?>">   

</div>
<!-- particles.js container -->

<div id="particles-js">
    <h2  class="text-center">We’re looking for all available flight for your search</h2>
  <img src="<?php echo base_url('asset/') ?>images/aeroplane-pngrepo-com.png" class="cloud cloud-1">
  <img src="<?php echo base_url('asset/') ?>images/cloud-3.png" class="cloud cloud-2">
  <img src="<?php echo base_url('asset/') ?>images/cloud-3.png" class="cloud cloud-3">
  <img src="<?php echo base_url('asset/') ?>images/cloud-3.png" class="cloud cloud-4">
  <img src="<?php echo base_url('asset/') ?>images/cloud-3.png" class="cloud diver">
  
</div> 
<div id="search_data" style="background-color: #ffffff!important;"> 
  
</div>
<script type="text/javascript">
  $(document).ready(function(){
      get_flight_data();
  });


  function get_flight_data(){
    
    var optradio             = $('#optradio').val();
    var from                 = $('#from').val();
    var from_city_code       = $('#from_city_code').val();
    var to                   = $('#to').val();
    var to_city_code         = $('#to_city_code').val();
    var date                 = $('#date').val();
    var flight_date_return   = $('#flight_date_return').val();
    var trip_class           = $('#trip_class').val();
    var adult                = $('#adult').val();
    var children             = $('#children').val();
    var infant               = $('#infant').val();

     var url = "<?php echo base_url('frontend/flight_search')?>";
      $.ajax({
            url: url,
            method: "POST",
           
            data: {
                optradio            : optradio,
                from                : from,
                from_city_code      : from_city_code,
                to                  : to,
                to_city_code        : to_city_code,
                date                : date,
                flight_date_return  : flight_date_return,
                trip_class          : trip_class,
                adult               : adult,
                children            : children,
                infant              : infant
            },
            success: function(responses) {
              $('#particles-js').hide();
              $('#search_data').html(responses);
            },error: function() {
                  console.log('error');
            }
      });
  }
</script>