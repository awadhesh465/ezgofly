    <style type="text/css">
      
      .search_data {
          overflow: hidden;
          
          scroll-behavior: auto;
          border: 1px solid;
          overflow-y: scroll;
      }
      .search_data {
        margin-top: -20px;
        background: #fff;
        padding: 2px 0px;
        line-height: 23px;
        height: 80px;
        scroll-behavior: auto;
        position: absolute;
        width: 89%;
        z-index: 9;
    }
    .search_data li{
      padding: 0 10px;
      margin-bottom: 1px solid #ccc;
    }
    .search_data li:hover{
      background-color: #318bd6;
      color: #fff;
    }
    </style>
    <section>
        <div class="main-slider">
            <!--  Banner  -->
            <div id="bootstrap-touch-slider" class="carousel bs-slider slide  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

                <!-- Wrapper For Slides -->
                <div class="carousel-inner" role="listbox">
                    
                    <div class="item active">
                        <!-- Slide Background -->
                        <img src="<?php echo base_url('asset/') ?>images/banner-5.jpg" alt="Bootstrap Touch Slider"  class="slide-image"/>
                        <!-- <div class="bs-slider-overlay"></div> -->
                    </div>
                    
                    <div class="item">
                        <img src="<?php echo base_url('asset/') ?>images/banner-5.jpg" alt="Bootstrap Touch Slider"  class="slide-image "/>
                        <!-- <div class="bs-slider-overlay"></div> -->
                    </div>


                </div><!-- End of Wrapper For Slides -->

                <!-- Left Control -->
                <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <!-- Right Control -->
                <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--  // Banner  -->
          

            <!--  Search Box  -->
            <div class="search-box">
                <div class="container">
                    <div class="box">
                        <form class="form-group" action="<?php echo base_url('frontend/search_page'); ?>" method="POST">
                            <div class="row">
                              
                                <div class="col-xs-12 col-sm-4 trip-type">
                                  <label class="radio-inline">
                                          <input type="radio" name="optradio" checked onclick="date_show('oneway')" value="oneway">Oneway
                                        </label>
                                        <label class="radio-inline">
                                          <input type="radio" name="optradio" onclick="date_show('roundway')" value="roundway">Round Trip
                                        </label>
                                </div>

                                <div class="col-xs-12 col-sm-4">
                                    <label>From</label>
                                    <input type="text" name="from" placeholder="Enter a city or airport" class="form-control" required="" onkeyup="get_from(this.value)" id="from">
                                    <div id="from_data" style="display: none;" class="search_data">
                                      <ul  id="from_list"></ul>
                                      <input type="hidden" name="from_city_code" id="from_city_code">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4">
                                    <label>To</label>
                                    <input type="text" name="to" placeholder="Any world wide city or airport" class="form-control" required="" id="to" onkeyup="get_to(this.value)">
                                    <div id="to_data" style="display: none;" class="search_data">
                                      <ul  id="to_list"></ul>
                                      <input type="hidden" name="to_city_code" id="to_city_code">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 date">
                                    <label>Departure</label>
                                    <div class="input-group input-append date " id="datePicker">
                                        <input type="text" class="form-control datePicker" name="date" required="" placeholder="Enter Departure Date" />
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    
                                </div>

                                <div class="col-xs-12 col-sm-4 date" id="return_date" style="display:none;">
                                    <label>Return</label>
                                    <div class="input-group input-append date " id="datePicker1">
                                        <input type="text" class="form-control datePicker" name="flight_date_return" id="flight_date_return"  placeholder="Enter Return Date"/>
                                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4">
                                    <label>Class</label>
                                    <select class="form-control" name="trip_class">
                                        
                                        <option value="Y">Economy</option>
                                        <option value="M">Business</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="">
                                    <div class="center">
                                        <div class="plus-minus col-xs-12 col-sm-3">
                                            <label>Adult(12+ y)</label>    
                                            <div class="input-group">
                                            
                                                <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="adult">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                                </span>
                                                    <input type="text" name="adult" class="form-control input-number" value="1" min="1" max="10">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="adult">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            
                                            </div>
                                        </div>

                                        <div class="plus-minus col-xs-12 col-sm-3">
                                            <label>Children(2-11 y)</label>    
                                            <div class="input-group">
                                            
                                                <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="children">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                                </span>
                                                    <input type="text" name="children" class="form-control input-number" value="0" min="0" max="10">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="children">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            
                                            </div>
                                        </div>

                                        <div class="plus-minus col-xs-12 col-sm-3">
                                            <label>Infant(Under 2)</label>    
                                            <div class="input-group">
                                            
                                                <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="infant">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                                </span>
                                                    <input type="text" name="infant" class="form-control input-number" value="0" min="0" max="10">
                                                    <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="infant">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3">
                                  <input type="submit" name="" value="Search" class="btn-1">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  // Search Box  -->
        </div>
    </section>
  
  <section>
      <div class="support">
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-sm-4">
                      <div class="item wow fadeInDown">
                          <i class="fa fa-dollar"></i>
                          <h1>Price Match Promise</h1>
                          <p>Find our lowest price to destinations worldwide, guaranteed </p>
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-4">
                      <div class="item wow fadeInDown" data-wow-delay=".5s">
                          <i class="fa fa-thumbs-up"></i>
                          <h1>Easy Booking</h1>
                          <p>Search, select and save - the fastest way to book your trip </p>
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-4">
                      <div class="item  wow fadeInDown" data-wow-delay="1s">
                          <i class="fa fa-headphones"></i>
                          <h1>Cutomer Support(24/7)</h1>
                          <p>Get award-winning service and special deals by calling <strong>1-800-568-9939</strong> </p>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>
  
  <section id="demos" class="testi-monial my-carousel owl-1">
     <h2 class="text-center">Testimonials</h2>
    <div class="container wow fadeInLeft" data-wow-delay="0.7s; ">
     
      <div class="row">
        <div class="col-xs-12 large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class=" item">
              <h1>Michael.K</h1>
              <ul class="stra-rating">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>I am very grateful to the CruiseWaveTravel for availing me with the best offer on my flight to New York. It was a hassle-free booking with no extra charges and the customer chat support was friendly and acknowledgeable. With this kind of assistance, I would like to do all my further bookings with CruiseWaveTravel only. Kudos to the team!</p>
            </div>
            <div class=" item">
              <h1>Michael.K</h1>
              <ul class="stra-rating">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>I am very grateful to the CruiseWaveTravel for availing me with the best offer on my flight to New York. It was a hassle-free booking with no extra charges and the customer chat support was friendly and acknowledgeable. With this kind of assistance, I would like to do all my further bookings with CruiseWaveTravel only. Kudos to the team!</p>
            </div>
            <div class="item">
              <h1>Michael.K</h1>
              <ul class="stra-rating">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>I am very grateful to the CruiseWaveTravel for availing me with the best offer on my flight to New York. It was a hassle-free booking with no extra charges and the customer chat support was friendly and acknowledgeable. With this kind of assistance, I would like to do all my further bookings with CruiseWaveTravel only. Kudos to the team!</p>
            </div>
            <div class="item">
              <h1>Michael.K</h1>
              <ul class="stra-rating">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>I am very grateful to the CruiseWaveTravel for availing me with the best offer on my flight to New York. It was a hassle-free booking with no extra charges and the customer chat support was friendly and acknowledgeable. With this kind of assistance, I would like to do all my further bookings with CruiseWaveTravel only. Kudos to the team!</p>
            </div>
            <div class="item">
              <h1>Michael.K</h1>
              <ul class="stra-rating">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>I am very grateful to the CruiseWaveTravel for availing me with the best offer on my flight to New York. It was a hassle-free booking with no extra charges and the customer chat support was friendly and acknowledgeable. With this kind of assistance, I would like to do all my further bookings with CruiseWaveTravel only. Kudos to the team!</p>
            </div>

            </div>
            
          </div>
        </div>
      </div>
  </section>
  





 

  
