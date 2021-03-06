<div class="banner">
        <!-- <img src="< ?php echo base_url('asset/images/banner-1.jpg')?>" class="img-responsive banner-img" alt=""> -->

            <div class="row">
            <!-- The carousel -->
            <div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
                <!-- Indicators -->
                

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?php echo base_url('asset/images/categories-banner.jpg')?>" class="slide" />
                        <div class="carousel-caption">
                            <h1>Share your story</h1>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="<?php echo base_url('asset/images/categories-banner.jpg')?>" class="slide" />
                        <div class="carousel-caption">
                            <h1>Share your story</h1>
                        </div>
                    </div>
                    
                    <div class="item">
                        <img src="<?php echo base_url('asset/images/categories-banner.jpg')?>" class="slide" />
                        <div class="carousel-caption">
                            <h1>Share your story</h1>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                
                <!-- Timer "progress bar" -->
                <hr class="transition-timer-carousel-progress-bar animate" />
            </div>
        </div>

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
                        <a href="<?php echo base_url('frontend/news_feed'); ?>">
                            <img src="<?php echo base_url('asset/images/news-feed.png')?>" alt="">
                            <p>News Feed</p>
                        </a>
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
    
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
                                      <li><img src="<?php echo base_url('/asset/images/user.png')?>" class="prof"></li>
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

                      <div class="post-detail-border main-div">
                        <div class="line-content">
                           
                            <div class="user-details">
                              <?php if($post->image){ ?>
                                <img src="<?php echo base_url('/asset/images/'.$post->image)?>" class="" alt="">
                              <?php }else{?>
                                <img src="<?php echo base_url('/asset/images/user.png')?>" class="" alt="">
                              <?php  
                              } ?>  
                                <label><?php echo  $post->username; ?></label>
                            </div>

                            <div class="user-dpost">
                            
                                <div class="img">
                                  <a href="<? echo base_url('frontend/detail/').$post->post_id; ?>">
                                  <?php //if(in_array($post->media_filetype,$imagetype))
                                     if($post->media_filetype=='jpg' || $post->media_filetype=='png'||$post->media_filetype=='bmp'||$post->media_filetype=='jpeg'||$post->media_filetype=='gif'){ ?>
                                    <img src="<?php echo base_url('/asset/uploads/post/'.$post->media_file)?>" class="img-responsive" alt="">
                                   <?php }
                                   elseif($post->media_filetype=='ogg' || $post->media_filetype=='mp4'){?>
                                    <video width="100%" height="100%" controls>
                                      <source src="<?php echo base_url('/asset/uploads/post/'.$post->media_file)?>" type="video/mp4">
                                    </video>
                                   <?php }else{?>
                                    <img src="<?php echo base_url('/asset/images/noimage.png')?>" class="img-responsive" alt="">
                                   <?php } ?> 
                                   </a>
                                    <p><a class="category-name" href="<? echo base_url('frontend/categoryposts/').$post->category_id; ?>"><?php echo $post->category_name; ?></a></p>
                                </div><!-- $post->category_id; -->

                                <div class="content">

                                    <div class="row">
                                      <div class="col-xs-10 col-sm-10 padding-0">
                                        <h2><a href="<? echo base_url('frontend/detail/').$post->post_id; ?>"><?php echo  $post->title; ?></a></h2>
                                      </div>
                                      <div class="col-xs-2 col-sm-2 padding-0">
                                        <img src="http://webdesky.com/studentx/asset/images/report.png" class="report-icon" data-toggle="modal" data-target="#myModal_3">
                                      </div>
                                    </div>
                                    


                                    
                                    

                                    <p><?php echo  substr($post->contents,0,150); ?> </p>
                                
                                    <div class="row">
                                       <div class="comment-section">
                                            <?php 
                                              if(isset($post->comments))
                                               {
                                                 
                                                 foreach($post->comments as $comment) 
                                                  { 
  
                                                    ?>
                                                  <div class="asas border-btm">
                                                    <div class="profile-img-name">
                                                      <?php if($comment->image){ ?>
                                                       <img with="20" height="20" src="<?php echo base_url('/asset/images/'.$comment->image)?>" class="profile-img" alt="">

                                                     <?php }else{ ?>
                                                      <img with="20" height="20" src="<?php echo base_url('/asset/images/user.png')?>" class="profile-img" alt="">

                                                     <?php } ?>
                                                      <p class="p-comemt">
                                                      <?php echo $comment->username ?>: <?php echo $comment->comment ?>
                                                      </p>
                                                    </div>
                                                    <br>
                                                    <?php if(!empty($comment->file)){?> 
                                                    <img with="40" height="40" class="reply-media" src="<?php echo base_url('/asset/uploads/post/'.$comment->file)?>" alt="">
                                                    <?php } ?>
                                                  </div>
                                                    
                                                  <?php  
                                                    
                                                 }
                                               }
                                            ?>
                                                       
                                           <div class="col-xs-12 col-sm-12 left" style="padding: 0px;">
                                                <ul>
                                                    <!-- <li><a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                            <!-- <img src="<?php //echo base_url('asset/images/heart-red.png')?>" alt=""> -->
                                                        <!-- </a> -->
                                                    <!-- </li> --> 
                                                    <li>
                                                            <img src="<?php echo base_url('asset/images/comment.png')?>" data-toggle="collapse" data-target="#demo<?php echo $i; ?>" alt="">
                                                        
                                                    </li>
                                                    
                                                    <div id="demo<?php echo $i; ?>" class="comment-box collapse">
                                                      <div class="row">
                                                        <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                                          <div id="commentlist<?php echo $i; ?>">
                                                          </div> 

                                                          <div class="input-div">
                                                             <form action="javascript:void(0)" id="upload_form" enctype="multipart/form-data" method="post">     
                                                            <input type="hidden" id="post_id<?php echo $i; ?>" value="<?php echo $post->post_id; ?>" name="post_id">
                                                            <input type="hidden" id="senderid<?php echo $i; ?>" value="<?php echo $post->id; ?>" name="senderimage">
                                                            <input type="hidden" id="senderimage<?php echo $i; ?>" value="<?php echo base_url('/asset/images/'.$post->image); ?>" name="senderimage">
                                                            <input type="hidden" id="sendername<?php echo $i; ?>" value="<?php echo $post->username; ?>" name="sendername">
                                                            <input type="text" id="<?php echo $i; ?>" name="" class="search-2 commentbox">

                                                            <!-- ============ -->
                                                          <ul class="camera-ul">
                                                            <li>
                                                               
                                                               <div class="file-with-camera">
                                                                  <input type="file" name="commentmedia" class="camera-file" id="commentmedia" >
                                                                  <!-- onchange="readfile(this,<?php //echo $i; ?>)" -->
                                                                  <img src="<?php echo base_url('asset/images/camera.png')?>" alt="" class="camera-for-uploads">
                                                               </div>
                                                              
                                                              <input type="hidden" name="medianame<?php echo $i; ?>" value="" id="medianame<?php echo $i; ?>" >

                                                              <input type="hidden" name="media<?php echo $i; ?>" value="" id="mediadata<?php echo $i; ?>" >



                                                               <input type="hidden" name="mediatype<?php echo $i; ?>" value="" id="mediatype<?php echo $i; ?>" >
                                                               
                                                                <img id="commentimage<?php echo $i; ?>" style="display:none" src="#" class="img-after-select" alt="" />  

                                                            </li>
                                                          </ul>
                                                        </form>
                                                          <!-- ============ -->

                                                          </div>
                                                          <video id="commentvideo<?php echo $i; ?>" width="15%" height="15%" style="display: none" controls>
                                                           </video> 
                                                        </div>
                                                      </div>
                                                      <!-- <div class="col-xs-4 col-sm-4"></div> -->
                                                    </div>
                                                </ul>
                                           </div>

                                           <!-- <div class="col-xs-2 col-sm-2 right">
                                                <a href="#">
                                                    <img src="< ?php //echo base_url('asset/images/share.png')?>" alt="">
                                                </a>
                                           </div> -->

                                       </div>
                                       

                                    </div>

                                </div>
                            </div>
                            
                        </div>
                      </div>
                        
                    <?php
                     $i++; } 
                     } ?>
                        <!-- Post -->
                        <div class="clearfix"></div>
                        <ul id="pagin">
                         <?php if(isset($posts)){ ?>
                            <?php foreach ($posts as $key => $value) { 
                            $key = $key + 1;
                            if($key==1){
                          ?>
                            <li><a class="current" href="javascript:void(0)"><?php echo  $key ?></a></li>
                            <?php }else{ ?>
                              <li><a href="javascript:void(0)"><?php echo  $key ?></a></li>
                            <?php } ?>
                          <?php  } } ?> 
                        </ul>
                        <!-- <ul id="pagination-demo" class="pagination-lg pull-right"></ul> -->
                    </div>
                    
                    <!-- //Left Sider -->

                    <!-- Right Sider -->
                    <div class="col-xs-12 col-sm-12 col-md-4 left-8">
                        <div class="stories">
                            <h2>News Feed</h2>
                            <!-- <img src="< ?php echo base_url('asset/images/more.png')?>" class="more"  alt=""> -->
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
                                   <div class="col-xs-3 col-sm-3 left padding-0">
                                       <img src="<?php echo base_url('asset/images/upload.png')?>" alt="" data-toggle="modal" data-target="#myModal_s" class="upload-img">
                                   </div>
                                   <div class="col-xs-9 col-sm-9 right upload-img">
                                       <h3 data-toggle="modal" data-target="#myModal_s">Add your stories</h3>
                                       <!-- <label>Share video</label> -->
                                   </div>
                               </div>
                               <!-- /Story -->

                               <!-- Story -->
                               <?php if(!empty($news_feed)){
                                  foreach ($news_feed as $key => $value) {

                                ?>
                                 <div class="stories-post">
                                     <div class="col-xs-3 col-sm-3 left padding-0">
                                         <img src="<?php echo base_url('asset/uploads/').$value->image ?>" alt="">
                                     </div>
                                     <div class="col-xs-9 col-sm-9 right">
                                        <a href="<?php echo base_url('frontend/news_detail/').$value->feed_id ?>">
                                         <h3><?php echo $value->title; ?></h3>
                                        </a>
                                         <!-- <label>Share video</label> -->
                                     </div>
                                 </div>
                               <?php  } 
                               if($key==6)
                               break;
                               } ?>
                               <!-- /Story -->

                              

                              
                              
                              

                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="other-div">
                            <h2>Other</h2>
                            <!-- <img src="< ?php echo base_url('asset/images/more.png')?>" class="more" alt=""> -->

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

    <!-- ====================================== Categories ===================================== -->
    <section id="categories">
        <div class="container categories">
            <!--  Demos -->
            <div id="demos">
              <div class="row">
                <div class="large-12 columns">
                    <h1>Categories</h1>
                    <div class="owl-carousel owl-theme">
                     <?php if(isset($category)){
                        foreach($category as $cat)
                        { ?>
                            <div class="bootstrap item">
                              <div class="content-3">
                                  <img src="<?php echo base_url('asset/images/'.$cat['category_image'])?>" class="img-responsive" alt="">
                                  <h2><?php echo $cat['category_name'] ?></h2>
                              </div>
                            </div>

                          <?php 
                        }

                     } ?>
                    
                  </div>
                  
                  
                  
                  <script>
                    $(document).ready(function() {
                      var owl = $('.owl-carousel');
                      owl.owlCarousel({
                        margin: 10,
                        nav: true,
                        loop: true,
                        responsive: {
                          0: {
                            items: 1
                          },
                          600: {
                            items: 3
                          },
                          1000: {
                            items: 3
                          }
                        }
                      })
                    })
                  </script>
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- ====================================== //Categories =================================== -->



    <div class="gradient">

        <!-- ===== All-post ===== -->
        <section>
            <div class="all-post">
                <div class="container">
                     <div class="row">
                        <h1>All Post</h1>
                        <?php if(isset($posts)){
                         $i=0;
                        foreach($posts as $post)

                         {  
                            
                            if($i==5)
                             break; 

                          ?>
                        <div class="col-xs-12 col-sm-6 item left-8">
                            
                            <?php //if(in_array($post->media_filetype,$imagetype))
                                     if($post->media_filetype=='jpg' || $post->media_filetype=='png'||$post->media_filetype=='bmp'||$post->media_filetype=='jpeg'){ ?>
                                    <img src="<?php echo base_url('asset/uploads/post/'.$post->media_file)?>" class="img-responsive" alt="">
                                   <?php }
                                   elseif($post->media_filetype=='ogg' || $post->media_filetype=='mp4'){?>
                                    <video width="100%" height="100%" controls>
                                      <source src="<?php echo base_url('asset/uploads/post/'.$post->media_file)?>" type="video/mp4">
                                    </video>
                            <?php } ?> 

                            
                            <div class="content-2">
                                <h4><?php echo $post->title; ?></h4>
                                <p><?php echo substr($post->contents,0,30); ?></p>
                            </div>
                        </div>
                        <?php 
                           $i++;
                         }
                     }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- ===== //All-post ==== -->

</div>
    <script>


    pageSize = 2;

  showPage = function(page) {
      $(".line-content").hide();
      $(".line-content").each(function(n) {
          if (n >= pageSize * (page - 1) && n < pageSize * page)
              $(this).show();
      });        
  }
    
  showPage(1);

  $("#pagin li a").click(function() {
      $("#pagin li a").removeClass("current");
      $(this).addClass("current");
      showPage(parseInt($(this).text())) 
  });
  function _(el){
   return document.getElementById(el);
}  
    // $('#pagination-demo').twbsPagination({
    //     totalPages: 5,
    //     // the current page that show on start
    //     startPage: 1,

    //     // maximum visible pages
    //     visiblePages: 5,

    //     initiateStartPageClick: true,

    //     // template for pagination links
    //     href: false,

    //     // variable name in href template for page number
    //     hrefVariable: '{{number}}',

    //     // Text labels
    //     first: 'First',
    //     prev: 'Previous',
    //     next: 'Next',
    //     last: 'Last',

    //     // carousel-style pagination
    //     loop: false,

    //     // callback function
    //     onPageClick: function (event, page) {
         
    //         $('.page-active').removeClass('page-active');
    //       $('.page'+page).addClass('page-active');
    //     }, 

    //     // pagination Classes
    //     paginationClass: 'pagination',
    //     nextClass: 'next',
    //     prevClass: 'prev',
    //     lastClass: 'last',
    //     firstClass: 'first',
    //     pageClass: 'page',
    //     activeClass: 'active',
    //     disabledClass: 'disabled'

    //     });    

/* Ajax for Comment */

$(".commentbox").on('keyup', function (e) {
 if (e.keyCode == 13) {

      var path= '<?php echo base_url("asset/uploads/post/thumb/") ?>';

      var file = _("commentmedia").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type); 
  

  var formdata = new FormData();
  formdata.append("commentmedia", Date.now()+'_'+file);
  formData.append('senderid','1');
  //formdata.append("commentmedia", file);
  // formData.append('senderid', value);
  // formData.append('sendername', value);
  // formData.append('post_id', value); 

  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
 // ajax.addEventListener("load", completeHandler, false);
 // ajax.addEventListener("error", errorHandler, false);
 // ajax.addEventListener("abort", abortHandler, false);
  ajax.open("POST", "<?php echo base_url('frontend/upload_video')?>") 
  ajax.send(formdata);
          // Do something
         
          // var id = $(this).attr('id');
          // var comment_txt= $(this).val()
          // var postid= $('#post_id'+id).val()
          // var senderid = $('#senderid'+id).val()
          // var senderimage = $('#senderimage'+id).val()
          // var sendername = $('#sendername'+id).val()
          // var mediadata = $('#mediadata'+id).val()
          // var mediatype = $('#mediatype'+id).val()
          // // var medianame = $('#medianame'+id).val();
          
          // if(mediatype!='') 
          //     name = Date.now()+'.'+ mediatype
          // else
          //    name='';
          //    $(this).val(''); 
          // $.ajax({
          //     url: "<?php //echo base_url('frontend/add_comment')?>",
          //     type: "POST",
          //     data: {
          //         post_id: postid,
          //         comment_by: senderid,
          //         comment: comment_txt,
          //         filecontent: mediadata,
          //         filetype:mediatype,
          //         table:'comment',
          //         filename:name,
          //         posttype:'post',

          //     },
          // }).done(function(data) {
          //   alert(data);
          //   $('#commentlist'+id).append('<p><img width="30" height="30" src="'+senderimage+'">&nbsp;'+sendername+'&nbsp; '+comment_txt+'</p><p><img width="30" height="30" src="'+path+name+'"></p>');
          //     $("#commentimage"+id).attr('src', '');
              
          // }).error(function(data) {
          //     swal("Oops", "We couldn't connect to the server!", "error");
          // }); 


    }
});
 
  // function add_comment(id,tr_id) {
  //     swal({
  //         title: "Are you sure?",
  //         text: "you want to delete?",
  //         type: "warning",
  //         showCancelButton: true,
  //         closeOnConfirm: false,
  //         confirmButtonText: "Yes, Delete it!",
  //         confirmButtonColor: "#ec6c62"
  //     }, function() {
  //         $.ajax({
  //             url: "< ?php echo base_url('superadmin/delete')?>",
  //             data: {
  //                 id: id,
  //                 table:'users'
  //             },
  //             type: "POST"
  //         }).done(function(data) {
  //             swal("Deleted!", "Record was successfully deleted!", "success");
  //             $('#tr_' + tr_id).remove();
  //         }).error(function(data) {
  //             swal("Oops", "We couldn't connect to the server!", "error");
  //         });
  //     });
  // }
 

 function readfile(input,i) { 

   console.log(input.files[0].type);
    if (input.files && input.files[0]) {
     
      var reader = new FileReader();
      var imagetype =input.files[0].type
      var type= imagetype.split('/')
 
      reader.onload = function(e) 
      {
        $("#commentvideo"+i).hide();
        $("#commentimage"+i).hide();

        if(type[1]=='png'||type[1]=='jpg'||type[1]=='jpeg'||type[1]=='bmp'||type[1]=='gif')
         {
           $('#commentimage'+i).attr('src', e.target.result);
           $("#commentimage"+i).show(); 
           $('#mediadata'+i).val(e.target.result)
           $('#mediatype'+i).val(type[1]);
           $("#commentimage"+i).show(); 
         }
        else
         {
         	 var filetype =type[1]
           $('#mediadata'+i).val(e.target.result)
           $("#commentvideo"+i).html('<source src="'+e.target.result+'" type="'+filetype+'"></source>' );
           $("#commentvideo"+i).show();
           $('#mediatype'+i).val(filetype);
           $("#commentvideo"+i).show();
         } 
         
      }
     

      reader.readAsDataURL(input.files[0]);
    }
  }

  $(".imgInp").change(function() {
    
    readURL(this);
  });


   function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);

 
/* End Comment */    

    </script>    