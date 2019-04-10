  <div class="banner">
        <img src="http://webdesky.com/studentx/asset/images/categories-banner.jpg" class="img-responsive banner-img" alt="">


        <!-- <div class="banner-headings">
            <h1>Share your story</h1>
            <button class="btn-1">Register</button>
        </div> -->

        <!-- bottom-block -->
        <div class="bottom-block">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="record">
                            <img src="<?php echo base_url('asset/images/record.png')?>" alt="">
                            <p>Record</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="news-feed">
                            <img src="<?php echo base_url('asset/images/news-feed.png')?>" alt="">
                            <p>News Feed</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="events">
                            <img src="<?php echo base_url('asset/images/events.png')?>" alt="">
                            <p>Posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //bottom-block -->
  </div>


        <!-- ====================================== Main ======================================= -->

    <section>
        <div class="main">
            <div class="container">
                <div class="row">
                    
                    
                    <!-- Left Sider -->
                    <div class="col-xs-12 col-sm-12 col-md-8 left-8">
                        
                        <div class="postssss">
                            <div class="panel panel-default">
                              <div class="panel-heading">Make a post</div>
                              <div class="panel-body">

                                <div class="comment-1">

                                    <ul>
                                      <li><img src="http://webdesky.com/studentx/asset/images/user.png" class="prof"></li>
                                      <li><textarea placeholder="Message" data-toggle="modal" data-target="#myModal"></textarea></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- Post -->

                        <?php if(isset($posts)){
                         $i=1;  
                         $j=1;
                         $imagetype= array('jpg,jpeg,png,bmp');
                         $videotype= array('ogg,mp3,mp4');

                        foreach($posts as $post)
                         {  
                            if($i%2==0)
                              $j++; 
                          ?>
                    <?php
                     $i++; } 
                     } ?>
                        <!-- Post detail-->
                        <div class="post-detail">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 padding-0">

                                  <!-- post-1 -->
                                  <div class="post page page1 page-active">
                                    <div class="user-details">
                                        <img src="http://webdesky.com/studentx/asset/images/user.png" class="" alt="">
                                        <label>gaurav</label>
                                    </div>
                                    <div class="user-dpost">
                                        <div class="img">
                                          <a href="#">
                                          <img src="http://webdesky.com/studentx/asset/uploads/post/abhi11-26-2018_12:38:37.png" class="img-responsive" alt="">
                                            
                                           </a>
                                        </div>
                                        <div class="content">
                                            <h2><a hre="#">abhi</a></h2>
                                            <p>Shek </p>
                                        
                                            <div class="row">
                                               <div class="comment-section">
                                                                                                           
                                                   <div class="col-xs-8 col-sm-10 left" style="padding: 0px;">
                                                        <ul>
                                                            <li><a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                                    <img src="http://webdesky.com/studentx/asset/images/heart-red.png" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                    <img src="http://webdesky.com/studentx/asset/images/comment.png" data-toggle="collapse" data-target="#demo1" alt="">
                                                                
                                                            </li>
                                                            
                                                            <div id="demo1" class="comment-box collapse">
                                                              <div class="row">
                                                                <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                                                  <div id="commentlist1">
                                                                  </div> 

                                                                  <div class="input-div">

                                                                    <input type="hidden" id="post_id1" value="32" name="post_id">
                                                                    <input type="hidden" id="senderid1" value="26" name="senderimage">
                                                                    <input type="hidden" id="senderimage1" value="http://webdesky.com/studentx/asset/images/user.png" name="senderimage">
                                                                    <input type="hidden" id="sendername1" value="gaurav" name="sendername">
                                                                    <input type="text" id="1" name="" class="search-2 commentbox">
                                                                   </div>

                                                                  <ul class="camera-ul">
                                                                    <li>
                                                                       <input type="file" name="commentmedia" class="camera-file" onchange="readfile(this,1)">

                                                                      <img src="http://webdesky.com/studentx/asset/images/camera.png" alt="">
                                                                      
                                                                      <input type="hidden" name="image1" value="" class="imagedata">
                                                                       
                                                                        <img id="blah1" style="display:none" src="#">  

                                                                    </li>
                                                                  </ul>
                                                                  

                                                                </div>
                                                              </div>
                                                              <!-- <div class="col-xs-4 col-sm-4"></div> -->
                                                            </div>
                                                        </ul>
                                                   </div>

                                                   <div class="col-xs-4 col-sm-2 right">
                                                        <a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                            <img src="http://webdesky.com/studentx/asset/images/share.png" alt="">
                                                        </a>
                                                        
                                                   </div>

                                               </div>
                                               

                                            </div>

                                        </div>

                                        
                                    </div>
                                  </div>
                                  <!-- //post-1 -->

                                  <!-- post-1 -->
                                  <div class="post page page1 page-active">
                                    <div class="user-details">
                                        <img src="http://webdesky.com/studentx/asset/images/user.png" class="" alt="">
                                        <label>gaurav</label>
                                    </div>
                                    <div class="user-dpost">
                                        <div class="img">
                                          <a href="#">
                                          <img src="http://webdesky.com/studentx/asset/uploads/post/abhi11-26-2018_12:38:37.png" class="img-responsive" alt="">
                                            
                                           </a>
                                        </div>
                                        <div class="content">
                                            <h2><a hre="#">abhi</a></h2>
                                            <p>Shek </p>
                                        
                                            <div class="row">
                                               <div class="comment-section">
                                                                                                           
                                                   <div class="col-xs-8 col-sm-10 left" style="padding: 0px;">
                                                        <ul>
                                                            <li><a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                                    <img src="http://webdesky.com/studentx/asset/images/heart-red.png" alt="">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                    <img src="http://webdesky.com/studentx/asset/images/comment.png" data-toggle="collapse" data-target="#demo1" alt="">
                                                                
                                                            </li>
                                                            
                                                            <div id="demo1" class="comment-box collapse">
                                                              <div class="row">
                                                                <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                                                  <div id="commentlist1">
                                                                  </div> 

                                                                  <div class="input-div">

                                                                    <input type="hidden" id="post_id1" value="32" name="post_id">
                                                                    <input type="hidden" id="senderid1" value="26" name="senderimage">
                                                                    <input type="hidden" id="senderimage1" value="http://webdesky.com/studentx/asset/images/user.png" name="senderimage">
                                                                    <input type="hidden" id="sendername1" value="gaurav" name="sendername">
                                                                    <input type="text" id="1" name="" class="search-2 commentbox">
                                                                   </div>

                                                                  <ul class="camera-ul">
                                                                    <li>
                                                                       <input type="file" name="commentmedia" class="camera-file" onchange="readfile(this,1)">

                                                                      <img src="http://webdesky.com/studentx/asset/images/camera.png" alt="">
                                                                      
                                                                      <input type="hidden" name="image1" value="" class="imagedata">
                                                                       
                                                                        <img id="blah1" style="display:none" src="#">  

                                                                    </li>
                                                                  </ul>
                                                                  

                                                                </div>
                                                              </div>
                                                              <!-- <div class="col-xs-4 col-sm-4"></div> -->
                                                            </div>
                                                        </ul>
                                                   </div>

                                                   <div class="col-xs-4 col-sm-2 right">
                                                        <a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                            <img src="http://webdesky.com/studentx/asset/images/share.png" alt="">
                                                        </a>
                                                        
                                                   </div>

                                               </div>
                                               

                                            </div>

                                        </div>

                                        
                                    </div>
                                  </div>
                                  <!-- //post-1 -->


                                </div>
                            </div>
                        </div>
                        <!-- //Post detail-->
                    </div>
                    
                    <!-- //Left Sider -->

                    <!-- Right Sider -->
                    <div class="col-xs-12 col-sm-12 col-md-4 left-8">
                        <div class="stories">
                            <h2>News Feed</h2>
                            <img src="<?php echo base_url('asset/images/more.png')?>" class="more"  alt="" data-toggle="modal" data-target="#myModal">
                            <!-- <form action="#" data-toggle="modal" data-target="#myModal">
                              <div class="input-file-container">  
                                <input class="input-file" id="my-file" type="file">
                                <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                              </div>
                              <p class="file-return"></p>
                            </form> -->
                            <script type="text/javascript">
                                            document.querySelector("html").classList.add('js');

                                            var fileInput  = document.querySelector( ".input-file" ),  
                                                button     = document.querySelector( ".input-file-trigger" ),
                                                the_return = document.querySelector(".file-return");
                                                  
                                            button.addEventListener( "keydown", function( event ) {  
                                                if ( event.keyCode == 13 || event.keyCode == 32 ) {  
                                                    fileInput.focus();  
                                                }  
                                            });
                                            button.addEventListener( "click", function( event ) {
                                               fileInput.focus();
                                               return false;
                                            });  
                                            fileInput.addEventListener( "change", function( event ) {  
                                                the_return.innerHTML = this.value;  
                                            });  
                                        </script>

                            <div class="row"> 
                               
                               <!-- Story -->
                               <div class="stories-post" data-toggle="modalnews" data-target="#newsModal">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/upload.png')?>" alt="" data-toggle="modal" data-target="#myModal_s" class="upload-img">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right upload-img">
                                       <h3 data-toggle="modal" data-target="#myModal_s" class="upload-img">Add your storyss</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <div class="stories-post">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/user-2.png')?>" alt="">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right">
                                       <h3>Add your story</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <div class="stories-post">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/user-2.png')?>" alt="">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right">
                                       <h3>Add your story</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <div class="stories-post">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/user-2.png')?>" alt="">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right">
                                       <h3>Add your story</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <div class="stories-post">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/user-2.png')?>" alt="">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right">
                                       <h3>Add your story</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <div class="stories-post">
                                   <div class="col-xs-4 col-sm-3 left">
                                       <img src="<?php echo base_url('asset/images/user-2.png')?>" alt="">
                                   </div>
                                   <div class="col-xs-8 col-sm-9 right">
                                       <h3>Add your story</h3>
                                       <label>Share video</label>
                                   </div>
                               </div>
                               <!-- /Story -->

                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="other-div">
                            <h2>Other</h2>
                            <img src="<?php echo base_url('asset/images/more.png')?>" class="more" alt="">

                            <!-- Slider other -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!-- <ol class="carousel-indicators">
                                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                  <li data-target="#myCarousel" data-slide-to="1"></li>
                                  <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol> -->

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <img src="<?php echo base_url('asset/images/other-img.jpg')?>" alt="Los Angeles" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>

                                  <div class="item">
                                    <img src="<?php echo base_url('asset/images/other-img.jpg')?>" alt="Chicago" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>
                                
                                  <div class="item">
                                    <img src="<?php echo base_url('asset/images/other-img.jpg')?>" alt="New york" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                            <!-- //Slider other -->

                        </div>


                    </div>
                    <!-- //Right Sider -->
                </div>
            </div>
        </div>
    </section>
    <!-- ====================================== //Main ===================================== -->