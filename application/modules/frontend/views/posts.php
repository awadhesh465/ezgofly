    <div class="banner">

       <img src="<?php echo base_url('asset/images/categories-banner.jpg')?>" class="img-responsive banner-img" alt="">
        <!-- bottom-block -->
        <div class="bottom-block">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="record" data-toggle="modal" data-target="#myModal">
                            <img src="<?php echo base_url('asset/images/record.png')?>" alt="Record icon" title="Record icon">
                            <p>Record</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="news-feed">
                          <a href="<?php echo base_url('frontend/news_feed'); ?>">
                            <img src="<?php echo base_url('asset/images/news-feed.png')?>" alt="News feed icon" title="News feed icon">
                            <p>News Feed</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="events">
                            <img src="<?php echo base_url('asset/images/events.png')?>" alt="Posts icon" title="Posts icon">
                            <a href="<?php echo base_url('frontend/all_posts'); ?>"><p>Posts</p></a>
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

                      <div class="catgory-div">
                            <div class="row">
                             

                              <?php if(isset($category)){
                                  foreach($category as $cat)
                                  { 
                                     //if($cat['category_name']!='GENERAL'){
                                  ?>
                            
                             <div class="col-xs-12 col-sm-3 item">
                              <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                                <img src="<?php echo base_url('asset/images/'.$cat['category_image'])?>" class="img-responsive" alt="Category images" title="Category images">
                              </a>
                               <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                                <p><?php echo $cat['category_name'] ?></p>
                              </a>
                              </div>
                            
                            

                          <?php //} 
                          } ?> 
                          <div class="col-xs-12 col-sm-3 item">
                              <a href="<?php echo base_url('frontend/news_feed/')?>">
                                <img src="<?php echo base_url('asset/images/general.png')?>" class="img-responsive" alt="category icon" title="Category icon">
                              </a>
                              <a href="<?php echo base_url('frontend/news_feed/') ?>">
                                <p>General</p>
                              </a>
                              </div>
                             
                          <?php } ?>
                          </div>
                          </div>

                  

                          <?php if(!empty($msg)){?>
                            <div class="alert alert-info">
                                <?php echo $msg;?>
                            </div>
                          <?php } ?>
                        <div class="postssss">
                            <div class="panel panel-default">
                              <div class="panel-heading">Make a post</div>
                              <div class="panel-body">

                                <div class="comment-1">

                                    <ul>
                                       <li>
                                        <?php if($this->session->userdata('profile_image')==''){ ?> 
                                          <img src="<?php echo base_url('/asset/images/user.png')?>"  class="prof" alt="User image" title="User image">
                                          <?php }else{ ?>
                                         <img src="<?php echo base_url('asset/uploads/profile/').$this->session->userdata('profile_image')?>"  class="prof" class="prof" alt="User image" title="User image">
                                       <?php } ?>
                                        </li>
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
                         $videotype= array('ogg,mp3,mp4,mov,m4v');
                         $total_no_pages  = sizeof($posts)/6;
                         ?>
                         <div>
                          <input type="hidden" name="total_no_pages" value="<?php echo round($total_no_pages); ?>" id="total_no_pages">
                         <div class="page page-active" id="page<?php echo $i; ?>">
                          <div class="mask"></div>

                         <?php 
                        foreach($posts as $key => $post)
                         {  
                          
                          
                          ?>

                      <div class="">
                        <div class="post-detail-border main-div">
                           
                            <div class="user-details">
                              <?php if(!empty($post->image)){ ?>
                                <img src="<?php echo base_url('/asset/uploads/profile/'.$post->image)?>" class="" alt="Profile images" title="Profile images">
                              <?php }else{?>
                                <img src="<?php echo base_url('/asset/images/user.png')?>" class="" alt="Profile images" title="Profile images">
                              <?php  
                              } ?>  
                                 <a href="<? echo base_url('frontend/user_post/').$post->user_id; ?>"><label><?php echo  $post->username; ?></label></a>

                                  <?php 
                                      if(!empty($post->image)){
                                          $senderimg    = base_url('asset/uploads/profile/'.$this->session->userdata('profile_image'));
                                          $receiverimg  = base_url('asset/uploads/profile/'.$post->image);
                   
                                      }else{
                                                  $senderimg     = base_url('asset/images/user.png');
                                                  $receiverimg   = base_url('asset/images/user.png');
                                  } ?>


                                    <div class="msg-1" onclick=" return assignmodel('<?php  echo $post->id; ?>','<?php  echo $this->session->userdata('id')?>','<?php echo $senderimg ?>','<?php echo $receiverimg ?>','<?php echo $post->username ?>')">
                                              <i class="fa fa-bell" id="bellicon" data-value="<?php  echo $post->id; ?>" data-toggle="modal" data-target="#myModal_notification" onclick="message_get(<?php echo $post->id; ?>)"> <!-- <strong>5</strong> --><span>Messages</span></i>
                                            </div>
                            </div>

                            <div class="user-dpost">
                               <?php if(!empty($post->media_file)){ ?> 
                                <div class="img <?php if(empty($post->title) && empty($post->contents)){ echo 'abc'; } ?> img-list" >
                                  <a href="<? echo base_url('frontend/detail/').$post->post_id; ?>">
                                  <?php //if(in_array($post->media_filetype,$imagetype))
                                     if($post->media_filetype=='jpg' || $post->media_filetype=='png'||$post->media_filetype=='bmp'||$post->media_filetype=='jpeg'||$post->media_filetype=='gif'){ ?>
                                     <a href="" class="ab">
                                    <img src="<?php echo base_url('/asset/uploads/post/thumb/'.$post->media_file)?>" class="img-responsive" alt="Post images" title="Post images"></a>
                                   <?php }
                                   elseif($post->media_filetype=='ogg' || $post->media_filetype=='mp4'||$post->media_filetype=='mov' || $post->media_filetype=='m4v' || $post->media_filetype=='quicktime'){?>
                                   <?php $first = strtok($post->media_file, '.'); ?>

                                    <video width="100%" height="100%" controls>
                                      <source src="<?php echo base_url('/asset/uploads/post/'.$post->media_file)?>" type="video/mp4" poster="<?php echo base_url('asset/uploads/video_image/').$first.'.png'; ?>">
                                    </video>
                                   <?php } ?> 
                                   </a>
                                   
                                </div><!-- $post->category_id; -->
                              <?php } ?>
                              <div class="content <?php if(empty($post->media_file) && empty($post->media_filetype)) echo "conetnt-fillwidth" ?> <?php if(empty($post->title) && empty($post->contents)){ echo 'xyz'; } ?>" >

                                    <div class="row">
                                      <div class="col-xs-10 col-sm-10 padding-0">
                                        <h2><a href="<? echo base_url('frontend/detail/').$post->post_id; ?>"><?php echo substr($post->title,0,100);
                                                     if(strlen($post->title)>99) echo '...';
                                        ?></a></h2>
                                      </div>
                                      <div class="col-xs-2 col-sm-2 padding-0">
                                         <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url('frontend/detail/').$post->post_id; ?>" target="_blank">
                                                     <img src="<?php echo base_url('asset/images/share.png'); ?>" class="share-icon">
                                                     </a>
                                         <img src="<?php echo base_url('asset/images/report.png'); ?>" class="report-icon" data-toggle="modal" data-target="#myModal_<?php echo $key ?>">

                                        <div class="modal fade popup-login" id="myModal_<?php echo $key ?>" role="dialog">
                                          <div class="modal-dialog">
                                          
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                              <h2>Report</h2>
                                              </div>
                                              <form class="form center-block" role="form" method="post" action="<?php echo base_url('frontend/report_abuse') ?>"  enctype="multipart/form-data" >
                                                <div class="modal-body">
                                                  <div class="form-group">
                                                    <input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>">
                                                    <textarea name="comment" class="form-control input-lg"  autofocus="" placeholder="Write report here"></textarea>
                                                  </div>

                                                  <div class="form-group">
                                                                              <ul class="categary-radio">
                                                                                  <li>
                                                                                      <input type="radio" value="abusive" id="report_0" name="report_abusive" checked="checked">
                                                                                      <label for="report_0">Abusive</label>
                                                                                  </li>
                                                                                  <li>
                                                                                      <input type="radio" value="other" id="report_1" name="report_abusive">
                                                                                      <label for="report_1">Other</label>
                                                                                  </li>
                                                                                                 
                                                                              </ul>
                                                                    </div>
                                                </div>
                                                <img width="40%" height="40%" class="blahpost" style="display: none" src="#" alt="" />
                                                 <video class="blahvideo" width="40%" height="40%" style="display: none" controls>
                                                 </video>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                   <button type="submit" class="btn"  aria-hidden="true">Report</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                     
                                      </div>
                                    </div>
                                                                    
                                    <p><?php 
                                    $contents  = findURLTurnToClickableLink($post->contents);
                                    echo  substr($contents,0,150);
                                          if(strlen($contents)>140) echo '...';  
                                     ?> </p>
                                
                              <div class="row">
                                <div class="comment-section img-list">
                                            <?php 
                                              if(isset($post->comments))
                                               {
                                                foreach($post->comments as $comment){ ?>
                                                  <div class="asas border-btm">
                                                    <div class="ac ac-1">
                                                     <div class="img-container1">
                                                      <?php if(!empty($comment->image)){ ?>
                                                     
                                                       <img with="20" height="20" src="<?php echo base_url('/asset/uploads/profile/'.$comment->image)?>" class="profile-img" alt="Profile images" title="Profile images">
                                                       
                                                       <?php }else{ ?>
                                                        <img with="20" height="20" src="<?php echo base_url('/asset/images/user.png')?>" class="profile-img" alt="">

                                                       <?php } ?>
                                                     </div>

                                                     <div class="content-container1">
                                                      <p class="p-comemt">
                                                        <strong><?php echo $comment->username ?> :</strong>
                                                        <h5><?php echo findURLTurnToClickableLink($comment->comment) ?></h5>
                                                      </p>

                                                      <?php if(!empty($comment->file)){?> 
                                                    <?php //if(in_array($post->media_filetype,$imagetype))
                                                 if($comment->file_type=='jpg' || $comment->file_type=='png'||$comment->file_type=='bmp'||$comment->file_type=='jpeg'||$comment->file_type=='gif'){ ?>
                                                 <a href="" class="ab">
                                                <img src="<?php echo base_url('/asset/uploads/post/thumb/'.$comment->file)?>" class="img-responsive" alt="Post images" title="Post images"></a>
                                                 
                                                   <?php }
                                                   elseif($comment->file_type=='ogg' || $comment->file_type=='mp4'||$post->media_filetype=='mov' || $post->media_filetype=='m4v'){?>
                                                    <video controls>
                                                      <source src="<?php echo base_url('/asset/uploads/post/'.$comment->file)?>" type="video/mp4" id="video">
                                                    </video>
                                               <?php } ?>
                                                               
                                                    <?php } ?>
                                                    </div>
                                                  </div>
                                                  </div>
                                                    
                                                  <?php  
                                                    
                                                 }
                                               }
                                            ?>
                                                        
                                    <div class="col-xs-12 col-sm-12 left comment-icon-div" style="padding: 0px;">
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
                                                  <input type="hidden" id="id" value="<?php echo $i; ?>" name="id">
                                                   <input type="hidden" id="post_id<?php echo $i; ?>" value="<?php echo $post->post_id; ?>" name="post_id">
                                                   <input type="hidden" id="senderid<?php echo $i; ?>" name="senderid" value="<?php echo $post->id; ?>" name="senderimage">
                                                   <input type="hidden"   id="senderimage<?php echo $i; ?>" value="<?php echo base_url('/asset/images/'.$post->image); ?>" name="senderimage">
                                                   <input type="hidden"  id="sendername<?php echo $i; ?>" value="<?php echo $post->username; ?>" name="sendername">
                                                   <input type="text" id="<?php echo $i; ?>" value="" name="commenttext" class="search-2 commentbox  commenttext<?php echo $i ?>" >

                                                  <!-- ============ -->
                                                    <ul class="camera-ul">
                                                      <li>
                                                        <div class="file-with-camera">
                                                          <input type="file"      name="commentmedia<?php echo $i; ?>" class="camera-file" id="commentmedia<?php echo $i; ?>" onchange="readfile(this,<?php echo $i; ?>)">
                                                           <!--  <input type="file" name="commentmedia" class="camera-file" onchange="readfile(this,< ?php echo $i; ?>)"  -->

                                                            <img src="<?php echo base_url('asset/images/camera.png')?>" alt="" class="camera-for-uploads">
                                                        </div>
                                                        
                                                        <input type="hidden" name="medianame<?php echo $i; ?>" value="" id="medianame<?php echo $i; ?>" >

                                                        <input type="hidden" name="media" value="" id="mediadata<?php echo $i; ?>" >

                                                         <input type="hidden" name="mediatype" value="" id="mediatype<?php echo $i; ?>" >
                                                         
                                                          <img id="commentimage<?php echo $i; ?>" style="display:none" src="#" class="img-after-select" alt="" />  

                                                          <video id="commentvideo<?php echo $i; ?>" width="15%" height="15%" style="display: none" controls class="video-cont-2">
                                                          </video>

                                                          <button id="<?php echo $i; ?>" type="submit" class="submit-upload-item" style="display:none"> <span>Send</span> <i class="fa fa-chevron-right"></i></button>

                                                      </li>
                                                    </ul>
                                                     <progress id="progressBar<?php echo $i; ?>" value="0" max="100" style="width:300px; display: none "></progress>
                                                      <h3 id="status<?php echo $i; ?>"></h3>
                                                    <p id="loaded_n_total"></p>
                                                    <p class="imagenotfond" style="display: none; color: red">Only mp4 format supported !</p>
                                                 </form> 
                                                  <!-- ============ -->
                                                </div>
                                                
                                              </div>
                                            </div>
                                            <!-- <div class="col-xs-4 col-sm-4"></div> -->

                                          </div>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <p class="aftercatgory"><a class="category-name" href="<? echo base_url('frontend/categoryposts/').$post->category_id; ?>"><?php echo $post->category_name; ?></a></p>
                            </div>
                        </div>
                      </div>
                  <?php $i++; 
                          if($i%6==0){
                            $j++;
                            echo '</div>';
                            echo "<div class='page' id='page$j'>";
                          }
                        } ?>
                     </div>
                      <ul id="pagination-demo" class="pagination-lg pull-right"></ul>
                      </div>
                     <?php 
                     } ?>
                        <!-- Post -->
                        <div class="clearfix"></div>
                         
                        <!-- <ul id="pagination-demo" class="pagination-lg pull-right"></ul> -->
                    </div>
                    
                    <!-- //Left Sider -->

                    <!-- Right Sider -->
                    <div class="col-xs-12 col-sm-12 col-md-4 left-8">
                        <div class="stories">
                            <h2>News Feed</h2>
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
                                       <h3 data-toggle="modal" data-target="#myModal_s">Add News Feed</h3>
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
                                        <?php if(!empty($value->image)){ ?>
                                         <img src="<?php echo base_url('asset/uploads/profile/').$value->image ?>" title="News feed image" alt="News feed image">
                                       <?php }else{ ?>
                                          <img src="<?php echo base_url('asset/images/user.png')?>" title="News feed image" alt="News feed image">
                                       <?php } ?>
                                     </div>
                                     <div class="col-xs-9 col-sm-9 right">
                                        <a href="<?php echo base_url('frontend/news_detail/').$value->feed_id ?>">
                                         <h3><?php echo substr($value->title,0,20); 
                                            if(strlen($value->title)>19) echo '...';
                                         ?></h3>
                                        </a>
                                         <!-- <label>Share video</label> -->
                                     </div>
                                 </div>
                               <?php  if($key==6)
                               break;} 
                               
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
                            <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                            <div class="bootstrap item">
                              <div class="content-3">
                                  <img src="<?php echo base_url('asset/images/'.$cat['category_image'])?>" class="img-responsive" alt="">
                                  <h2><?php echo $cat['category_name'] ?></h2>
                              </div>
                            </div>
                            </a>

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



  
    <script>

 function _(el){
   return document.getElementById(el);
}     
 
  function uploadFile(id) 
 {
      if(_("commentmedia"+id).files[0])
      {
        var file = _("commentmedia"+id).files[0];
       
      }  
    var comment = $.trim($(".commenttext"+id).val());
    
    var postid= $('#post_id'+id).val()
    var comment_by = $('#senderid'+id).val()
    var formdata = new FormData();
    formdata.append("commentmedia", file);
    formdata.append("comment", comment);
    formdata.append("post_id", postid);
    formdata.append("id",comment_by);
    formdata.append("table", 'comment');
    formdata.append("posttype",'post');

    formdata.append("i",id);
      if(_("commentmedia"+id).files[0])
      {
         formdata.append("file", file.name);
          var ext= file.type;
          var type =ext.split('/') 
          var filetype = type[1]; //$('#mediatype'+id).val()
          var table = 'comment';
          var posttype = 'post';

          formdata.append("extension", filetype);
          formdata.append("imagename", file.name);
      }
   var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler.bind(null,id), false);
 // ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      location.reload();
     // document.getElementById("video").innerHTML = this.responseText;
    }
  };
  ajax.open("POST", "<?php echo base_url('frontend/add_comment')?>") 
  ajax.send(formdata);
  //location.reload();


} 
function progressHandler(id,event){
  
  $('#progressBar'+id).show();
 // _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  //  alert(percent)
  $('#progressBar'+id).val( Math.round(percent))
  //_("progressBar").value = Math.round(percent);
  $("#status"+id).innerHTML = Math.round(percent)+"% uploaded... please wait";

   // var comment = $(".commenttext"+id).val();
   // var postid= $('#sendername'+id).val()
  

}
function completeHandler(event)
{
   var response = event.target.responseText;
  
   _("status").innerHTML = event.target.responseText;
   _("progressBar").value = 0;
   $('#progressBar').hide();
   var path= '<?php echo base_url().'/'; ?>';
   var senderimage = $('#senderimage'+response.id).val()
   var sendername = $('#sendername'+response.id).val()
   var comment_txt= $('#commenttext'+response.id).val()
   var postimage = path+response.path;
   //alert(response.path);
    
   
   var filename = response.mediafile;
   
   if(ext=='mp4'||ext=='ogg'||ext=='mov'||ext=='m4v')
   {
      
      $('#commentlist').append('<p><img width="30" height="30" src="'+senderimage+'">&nbsp;'+sendername+'&nbsp; '+comment_txt+'</p><p><video src= height="30" src="'+postimage+'"></p>');
   }
   else
   {

     $('#commentlist').append('<p><img width="30" height="30" src="'+senderimage+'">&nbsp;'+sendername+'&nbsp; '+comment_txt+'</p><p><video width="320" height="240" controls><source src="'+postimage+'" type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video>');
   }
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
} 

/* Ajax for Comment */
$('.commentbox').each(function(){
  $(this).on('keyup', function (e) {
  
 if (e.keyCode == 13) {
 var id = $(this).attr('id');

 uploadFile(id);

   
     e.preventDefault(e);
    }

});

});



 

  $(".imgInp").change(function() {
    readURL(this);
  });


   function handleFileSelect(evt) 
   {
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


$('.chat_input').on('keyup', function (e) {
         if (e.keyCode == 13) {
           //alert('Hello');
           chatmessage()
         }
      });
     

     function chatmessage()
     {
       
        var chat_input='';
        chat_input= $('.chat_input').val();
        sender= $('#sender').val();
        receiver= $('#receiver').val();
        senderimg= $('#senderimg').val();
        console.log(senderimg);
        receiverimg = $('#receiverimg').val();
        if(chat_input)
          {
              $.ajax({
                      url: "<?php echo base_url('frontend/add_chat')?>",
                      type: "POST",
                      data: {
                          message: chat_input,
                          sender: sender,
                          receiver: receiver,
                          table:'chat_message',
                      },
                  }).done(function(data) {
                    

                    $chat = '<div class="row msg_container base_sent"><div class="col-xs-10 col-md-10 left-8"><div class="messages msg_sent"><p> '+chat_input+' </p><time datetime="2009-11-13T20:00">Timothy • 0 min; </time></div></div><div class="col-md-2 col-xs-2 avatar"><img src="'+senderimg+'" class=" img-responsive "></div></div>';
                   $('.chat_input').val(''); 
                   $("#message").append($chat);

                    // if(name)
                    // {
                    //   completepath = path+name;
                    // } 
                    // else
                    //   completepath = "#"
                    // $('#commentlist'+id).append('<p><img width="30" height="30" src="'+senderimage+'">&nbsp;'+sendername+'&nbsp; '+comment_txt+'</p><p><img width="30" height="30" src="'+completepath+'" alt=""></p>' );
                    //   // swal("Deleted!", "Record was successfully deleted!", "success");
                    //   // $('#tr_' + tr_id).remove();
                    //  $("#commentimage"+id).attr('src', '');
                  }).error(function(data) {
                      swal("Oops", "We couldn't connect to the server!", "error");
                  }); 
          }

     }
function message_get(user_id){
             var user_id   = user_id;
             $.ajax({
                    url: "<?php echo base_url('frontend/get_message')?>",
                    method: "POST",
                    dataType:'json',
                    data: {
                        user_id: user_id
                       
                    },
                    success: function(response) {
                        var id  = "<?php echo $this->session->userdata('id'); ?>";

                        console.log(response)
                         var message  = response.chatmessage;
                         $('#message').html('');
                         for (var i = 0; i<message.length; i++){
                            if(id==message[i].sender){
                              var img = "<?php echo base_url('asset/uploads/profile/')?>"+message[i].sender_image+"";
                                $('#message').append('<div class="row msg_container base_sent"><div class="col-xs-10 col-md-11 left-8"><div class="messages msg_sent"><p>'+message[i].message+'</p><time datetime="2009-11-13T20:00">'+message[i].hours+'</time></div></div><div class="col-xs-2 col-md-1 avatar"><img src='+img+' class=" img-responsive "></div></div>');
                            }else{
                              var img = "<?php echo base_url('asset/uploads/profile/')?>"+message[i].receiver_image+"";
                                $('#message').append('<div class="row msg_container base_receive"><div class="col-xs-2 col-md-1 avatar"><img src='+img+' class=" img-responsive "></div><div class="col-xs-10 col-md-11 left-8"><div class="messages msg_receive"><p>'+message[i].message+'</p><time datetime="2009-11-13T20:00">'+message[i].hours+'</time></div></div></div>');
                            }
                         }
                        // var option = '<option value="">--Section--</option>';
                        // for (var i = 0; i < section.length; i++) {
                        //     option += '<option value="' + section[i].section_id + '">' + section[i].section_name + '</option>';
                        // }
                        // $('#section_id').html('');
                        // $("#section_id").html(option);
                        // $('#exam_section_id').html('');
                        // $('#exam_section_id').html(option)

                       
                        
                    },
                    error: function() {
                        alert("error");
                    }
             });
              
    }   

    </script>    