  <section>
    <div class="div-2">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-8 item wow fadeInDown">
            <h1>Book Airline Tickets on CruiseWaveTravel</h1>
            <p>Fares are roundtrip, Fares incl. all fuel surcharges, our service fees and taxes. Tickets are nonrefundable, nontransferable, non-assignable. Name changes are not permitted. Displayed fares are based on historical data, are subject to change and cannot be guaranteed at the time of booking. There is a higher probability of seats being available at this fare on Tuesday, Wednesday and Thursday, and may require a Saturday night stay at your destination. Lowest fares may require an advance purchase of up to 21 days. Certain blackout dates may apply. Holidays and weekend travel may have a surcharge. Other restrictions may apply. Additional terms and conditions of purchase.</p>
          </div>
          <div class="col-xs-12 col-sm-4 item Subscribe">
            <h2>Subscribe</h2>
                <form class="form-group">
                    <input type="email" name="" placeholder="Enter Email" class="form-control" required="">
                    <input type="submit" name="" class="form-control">
                </form>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <div id="boxes">
    <div id="dialog" class="window">
      <div id="lorem">
        <h3><i class="fa fa-headphones"></i> +1-844-591-9060</h3>
        <img src="<?php echo base_url('asset/')  ?>images/banner-5.jpg" class="img-responsive">
        <h1>Did you know you can grab CHEAPER UNPUBLISHED FARES by calling our Toll Free Number?</h1>
        <h2>Call Now and Speak to one of our experienced Travel Agents!</h2>
        
      </div>
      <div id="popupfoot"> <a href="#" class="close agree"><i class="fa fa-close"></i></a>
      </div>
    </div>
    <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div>
  </div>
  <div class="scrollup"></div>


  <footer>
    <div class="container">
      <div class="row wow fadeInDown">
        <div class="col-xs-12 col-sm-2">
            <h2>Explor</h2>
            <ul>
                <li><a href="<?php echo base_url('frontend/about') ?>">About Us</a></li>
                <li><a href="<?php echo base_url('frontend/credit') ?>">Credit Card Authorization</a></li>
                <li><a href="<?php echo base_url('frontend/cruise') ?>">Cruise Info</a></li>
                <li><a href="<?php echo base_url('frontend/contact') ?>">Contact Us</a></li>
                <li><a href="<?php echo base_url('frontend/faq') ?>">Faq</a></li>
                <li><a href="<?php echo base_url('frontend/insurance') ?>">Insurance</a></li>
                <li><a href="<?php echo base_url('frontend/privacy') ?>">Privacy Policy</a></li>
                <li><a href="<?php echo base_url('frontend/terms') ?>">Term & Condition</a></li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-2">
            <h2>Top Airlines</h2>
            <ul>
                <li><a href="<?php echo base_url('frontend/aeromexico') ?>">Aeromexico</a></li>
                <li><a href="<?php echo base_url('frontend/canada') ?>">Air Canada</a></li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-2">
            <h2>Top Destinations</h2>
            <ul>
                <li><a href="<?php echo base_url('frontend/amsterdam') ?>">Amsterdam</a></li>
                <li ><a href="<?php echo base_url('frontend/bangkok') ?>">Bangkok</a></li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-2">
            <h2>Travel Extras</h2>
            <ul>
                <li><a href="<?php echo base_url('frontend') ?>airline-contact-info.html">Airline Contact Info</a></li>
                <li><a href="#">Airport Code</a></li>
                <li><a href="#">Travel Document</a></li>
                <li><a href="#">Shore Excursions</a></li>
                <li><a href="#">Visa Information</a></li>
                <li><a href="#">Dynamic Packages</a></li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-4">
            <h2>Social Icons</h2>
                <ul class="social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
      </div>

      <div class="learfix"></div>

      <div class="row">
        <p class="copy-right">Copyright © 2018 <a href="#">EZGOFLY</a></p>
      </div>

    </div>
  </footer>
  <!-- <script src="<?php// echo base_url('asset/'); ?>js/jquery.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url('asset/'); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('asset/'); ?>js/owl.carousel.min.js"></script>
  
  <script src="<?php echo base_url('asset/') ?>js/wow.min.js"></script>
  <script src="<?php echo base_url('asset/'); ?>js/custom.js"></script>
  


   <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />

    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
  <script type="text/javascript">
    function get_from(value) {

      var from  = value;
      if(from!=''){
          $.ajax({
            url : "<?php echo base_url('frontend/get_airport') ?>",
            method:'POST',
            type: 'JSON',
            data : {'value' : value},
            success:function(response){
              var obj = JSON.parse(response);
              
              if(obj==null){
               console.log('abccc');
                $('#from_list').html();
                $('#from_data').hide();
              }else{
                
                console.log(obj);
                $('#from_list').html('');
                for (var i =0; i < obj.length; i++) {
                  var city_code       = "'"+obj[i].CityCode+"'"; 
                  var CityName        = "'"+obj[i].CityName+"'"; 
                  var CountryCode     = "'"+obj[i].CountryCode+"'"; 
                  var CountryName     = "'"+obj[i].CountryName+"'"; 
                  var city_id         = "'"+obj[i].id+"'"; 

                  $('#from_list').append('<li onclick="show_value_from('+city_code+','+CityName+','+CountryCode+','+CountryName+','+city_id+')">'+obj[i].CityName+','+obj[i].CountryCode+'-('+obj[i].CountryName+')</li>');
                  $('#from_data').show();
                
                }
              }
            }
          });
      }else{
           $('#from_list').html();
                $('#from_data').hide();
      }
    }

    function get_to(value) {

      var from  = value;
      if(from!=''){
        $.ajax({
          url : "<?php echo base_url('frontend/get_airport') ?>",
          method:'POST',
          type: 'JSON',
          data : {'value' : value},
          success:function(response){
            var obj = JSON.parse(response);
            
            if(obj==null){
             console.log('abccc');
              $('#to_list').html();
              $('#to_data').hide();
            }else{
              
              console.log(obj);
              $('#to_list').html('');
              for (var i =0; i < obj.length; i++) {
                var city_code = "'"+obj[i].CityCode+"'"; 
                var CityName = "'"+obj[i].CityName+"'"; 
                var CountryCode = "'"+obj[i].CountryCode+"'"; 
                var CountryName = "'"+obj[i].CountryName+"'"; 
                var city_id = "'"+obj[i].id+"'"; 

                $('#to_list').append('<li onclick="show_value_to('+city_code+','+CityName+','+CountryCode+','+CountryName+','+city_id+')">'+obj[i].CityName+','+obj[i].CountryCode+'-('+obj[i].CountryName+')</li>');
                $('#to_data').show();
              
              }
            }
          }
        });
      }else{
          $('#to_list').html();
          $('#to_data').hide();
      }
    }

    function show_value_to(city_code,city_name,country_code,country_name,city_id){
      
      var city_code     = city_code;
      var city_name     = city_name;
      var country_code  = country_code;
      var country_name  = country_name;
      var city_id       = city_id;

      var data = ""+city_name+","+country_code+"-("+country_name+")";
     
      $('#to').val(data);
      $('#to_city_code').val(city_code);
      $('#to_list').html('');
      $('#to_data').hide();
   
    }

    function show_value_from(city_code,city_name,country_code,country_name,city_id){
      
      var city_code     = city_code;
      var city_name     = city_name;
      var country_code  = country_code;
      var country_name  = country_name;
      var city_id       = city_id;

      var data = ""+city_name+","+country_code+"-("+country_name+")";
     
      $('#from').val(data);
      $('#from_city_code').val(city_code);
      $('#from_list').html('');
      $('#from_data').hide();
   
    }


   

     var todayDate = new Date().getDate()
    

     function date_show(type){
    

      if(type=='oneway'){
        $('#return_date').hide();
         $("#flight_date_return").prop('required',false);
      }else{
        $('#return_date').show();
        $("#flight_date_return").prop('required',true);
      }
     }    
      
          $(document).ready(function() {
          $('#example').DataTable();
           $( ".datePicker" ).datepicker({
      minDate: 0
     });
         });
   

    

     
  </script>
     

  
</body>
</html>