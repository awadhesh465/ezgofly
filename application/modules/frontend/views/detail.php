    <div class="banner">
        <img src="<?php  echo base_url('asset/images/categories-banner.jpg')?>" class="img-responsive banner-img" alt="banner image" title="banner image">
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
                       <a href="<?php echo base_url('frontend/all_posts'); ?>">
                          <div class="events">
                              <img src="<?php echo base_url('asset/images/events.png')?>" alt="Posts icon" title="Posts icon">
                              <p>Posts</p>
                          </div>
                      </a>
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
                      <div class="catgory-div">
                        <div class="row">
                          <?php if(isset($category)){
                              foreach($category as $cat)
                              { 
                                // if($cat['category_name']!='GENERAL'){
                              ?>
                          <div class="col-xs-12 col-sm-3 item">
                            <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                              <img src="<?php echo base_url('asset/images/'.$cat['category_image'])?>" class="img-responsive" title="Category icon" alt="Category icon">
                            </a>
                             <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                              <p><?php echo $cat['category_name'] ?></p>
                            </a>
                          </div>
                          <?php // } 
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
                                          <img src="<?php echo base_url('/asset/images/user.png')?>"  class="prof" alt="Profile image" title="Profile image">
                                          <?php }else{ ?>
                                         <img src="<?php echo base_url('asset/uploads/profile/').$this->session->userdata('profile_image')?>"  class="prof" alt="Profile image" title="Profile image">
                                       <?php } ?>
                                        </li>
                                      <li><textarea placeholder="Message" data-toggle="modal" data-target="#myModal"></textarea></li>
                                    </ul>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!-- Post -->

                        <?php 
   
                                        
                        if(isset($post_detail)){
                         $i=1;  
                         $j=1;
                         $imagetype= array('jpg,jpeg,png,bmp');
                         $videotype= array('ogg,mp3,mp4,mov,m4v'); 

                         
                        ?>

                          

                      <div class="post-detail-border main-div">
                        <div class="line-content">
                            <div class="mask"></div>
                            <div class="user-details">
                              <?php if(!empty($post_detail[0]->image)){ ?>
                                <img src="<?php echo base_url('/asset/uploads/profile/'.$post_detail[0]->image)?>" class="" class="prof" alt="Profile image" title="Profile image">
                              <?php }else{?>
                                <img src="<?php echo base_url('/asset/images/user.png')?>" class="" class="prof" alt="Profile image" title="Profile image">
                              <?php  
                              } ?>  
                                 <a href="<? echo base_url('frontend/user_post/').$post_detail[0]->user_id; ?>"><label><?php echo  $post_detail[0]->username; ?></label></a>

                                  <?php 
                                      if(!empty($post_detail[0]->image)){
                                          $senderimg    = base_url('asset/uploads/profile/'.$this->session->userdata('profile_image'));
                                          $receiverimg  = base_url('asset/uploads/profile/'.$post_detail[0]->image);
                   
                                      }else{
                                          $senderimg     = base_url('asset/images/user.png');
                                          $receiverimg   = base_url('asset/images/user.png');
                                  } ?>
                                             
                                      <div class="msg-1" onclick=" return assignmodel('<?php  echo $post_detail[0]->user_id; ?>','<?php  echo $this->session->userdata('id')?>','<?php echo $senderimg ?>','<?php echo $receiverimg ?>','<?php echo $post_detail[0]->username ?>')">
                                              <i class="fa fa-bell" id="bellicon" data-value="<?php  echo $post_detail[0]->user_id; ?>" data-toggle="modal" data-target="#myModal_notification" onclick="message_get(<?php echo $post_detail[0]->user_id; ?>)"> <!-- <strong>5</strong> --><span>Messages</span></i>
                                      </div>
                            </div>

                            <div class="user-dpost img-list">
                               <?php if(!empty($post_detail[0]->media_file)){ ?>
                                <div class="img <?php if(empty($post_detail[0]->title) && empty($post_detail[0]->contents)){ echo 'abc'; } ?>">
                                  <a href="<? echo base_url('frontend/detail/').$post_detail[0]->post_id; ?>">
                                  <?php //if(in_array($post->media_filetype,$imagetype))
                                     if($post_detail[0]->media_filetype=='jpg' || $post_detail[0]->media_filetype=='png'||$post_detail[0]->media_filetype=='bmp'||$post_detail[0]->media_filetype=='jpeg'||$post_detail[0]->media_filetype=='gif'){ ?>
                                     <a href="" class="ab">
                                    <img src="<?php echo base_url('/asset/uploads/post/thumb/'.$post_detail[0]->media_file)?>" class="img-responsive" class="prof" alt="Post image" title="Post image"></a>
                                   <?php }
                                   elseif($post_detail[0]->media_filetype=='ogg' ||$post_detail[0]->media_filetype=='mp4'||$post_detail[0]->media_filetype=='mov' ||$post_detail[0]->media_filetype=='m4v' || $post_detail[0]->media_filetype=='quicktime'){?>
                                    <?php $first = strtok($post_detail[0]->media_file, '.'); ?>
                                    <video width="100%" height="100%" controls>
                                      <source src="<?php echo base_url('/asset/uploads/post/'.$post_detail[0]->media_file)?>" type="video/mp4" poster="<?php echo base_url('asset/uploads/video_image/').$first.'.png'; ?>">
                                    </video>
                                   <?php } ?> 
                                   </a>
                                     
                                </div><!-- $post->category_id; -->
                                <?php } ?>
                                <div class="content <?php if(empty($post_detail[0]->media_file)) echo "conetnt-fillwidth" ?> <?php if(empty($post_detail[0]->title) && empty($post_detail[0]->contents)){ echo 'xyz'; } ?>">

                                    <div class="row">
                                      <div class="col-xs-10 col-sm-10 padding-0">
                                        <h2><a href="<? echo base_url('frontend/detail/').$post_detail[0]->post_id; ?>"><?php echo  $post_detail[0]->title; ?></a></h2>
                                      </div>
                                      <div class="col-xs-2 col-sm-2 padding-0">
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url('frontend/detail/').$post_detail[0]->post_id; ?>" target="_blank">
                                                     <img src="<?php echo base_url('asset/images/share.png'); ?>" class="share-icon">
                                                     </a>
                                         <img src=" <?php echo base_url('/asset/images/report.png')?>" class="report-icon" data-toggle="modal" data-target="#myModal_<?php echo $post_detail[0]->post_id ?>" >

                                        <div class="modal fade popup-login" id="myModal_<?php echo $post_detail[0]->post_id ?>" role="dialog">
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
                                                            <input type="hidden" name="post_id" value="<?php echo $post_detail[0]->post_id; ?>">
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
                                    
                                    <p class="detail-description">
                                     <?php echo  findURLTurnToClickableLink($post_detail[0]->contents); ?> 
                                   
                                     </p>
                                
                                    <div class="row">
                                       
                                       <div class="comment-section img-list">
                                            <?php 
                                             

                                              if(!empty($post_detail[0]->comments))
                                               {
                                                 foreach($post_detail[0]->comments as $key=> $comment) 
                                                  { 
                                                    ?>
                                                  <div class="asas border-btm">
                                                    <div class="ac ac-1">
                                                     <div class="img-container1">
                                                      <?php if($comment->image){ ?>
                                                      
                                                       <img with="20" height="20" src="<?php echo base_url('/asset/uploads/profile/'.$comment->image)?>" class="profile-img" class="prof" alt="Profile image" title="Profile image">
                                                       
                                                       <?php }else{ ?>
                                                        <img with="20" height="20" src="<?php echo base_url('/asset/images/user.png')?>" class="profile-img" alt="Profile image" title="Profile image">

                                                       <?php } ?>
                                                     </div>

                                                     <div class="content-container1">
                                                      <p class="p-comemt">
                                                        <strong><?php echo $comment->username ?>: </strong>
                                                        <h5><?php echo findURLTurnToClickableLink($comment->comment) ?></h5>
                                                      </p>
                                                      <?php if(!empty($comment->file)){?> 
                                                            <?php //if(in_array($post->media_filetype,$imagetype))
                                                         if($comment->file_type=='jpg' || $comment->file_type=='png'||$comment->file_type=='bmp'||$comment->file_type=='jpeg'||$comment->file_type=='gif'){ ?>
                                                        <a href="" class="ab"><img src="<?php echo base_url('/asset/uploads/post/thumb/'.$comment->file)?>" class="img-responsive" title="Post image" alt="Post image"></a>
                                                       <?php }
                                                       elseif($comment->file_type=='ogg' || $comment->file_type=='mp4'||$comment->file_type=='mov' || $comment->file_type=='mp4'){?>
                                                        <video width="50%" height="50%" controls>
                                                          <source src="<?php echo base_url('/asset/uploads/post/'.$comment->file)?>" type="video/mp4" id="video">
                                                        </video>
                                                       <?php } ?>
                                                               
                                                    <?php } ?>
                                                    </div>
                                                  </div>
                                                  </div>
                                                    
                                                  <?php  
                                                    
                                                 }
                                              
                                            ?>
                                            
                                           
                                               
                                           <div class="col-xs-12 col-sm-12 left comment-icon-div" style="padding: 0px;">
                                                <ul>
                                                    
                                                    <li>
                                                            <img src="<?php echo base_url('asset/images/comment.png')?>" data-toggle="collapse" data-target="#demo<?php echo $key; ?>" alt="">
                                                        
                                                    </li>
                                                    
                                                    <div id="demo<?php echo $key; ?>" class="comment-box collapse">
                                                      <div class="row">
                                                        <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                                          <div id="commentlist<?php echo $key; ?>">
                                                          </div> 

                                                          <div class="input-div">
                                                           <form action="javascript:void(0)" id="upload_form" enctype="multipart/form-data" method="post">     
                                                            <input type="hidden" id="id" value="<?php echo $key; ?>" name="id">
                                                             <input type="hidden" id="post_id<?php echo $key; ?>" value="<?php echo $post_detail[0]->post_id; ?>" name="post_id">
                                                             <input type="hidden" id="senderid<?php echo $key; ?>" name="senderid" value="<?php echo $post_detail[0]->user_id; ?>" name="senderimage">
                                                             <input type="hidden"   id="senderimage<?php echo $key; ?>" value="<?php echo base_url('/asset/images/'.$post_detail[0]->image); ?>" name="senderimage">
                                                             <input type="hidden"  id="sendername<?php echo $key; ?>" value="<?php echo $post_detail[0]->username; ?>" name="sendername">
                                                             <input type="text" id="<?php echo $key; ?>" value="" name="commenttext" class="search-2 commentbox  commenttext<?php echo $key ?>" >

                                                            <!-- ============ -->
                                                              <ul class="camera-ul">
                                                                <li>
                                                                   
                                                                  <div class="file-with-camera">
                                                                     <input type="file"      name="commentmedia<?php echo $key; ?>" class="camera-file" id="commentmedia<?php echo $key; ?>" onchange="readfile(this,<?php echo $key; ?>)">
                                                                     <!--  <input type="file" name="commentmedia" class="camera-file" onchange="readfile(this,< ?php echo $i; ?>)"  -->

                                                                      <img src="<?php echo base_url('asset/images/camera.png')?>" alt="" class="camera-for-uploads">
                                                                   </div>
                                                                  
                                                                    <input type="hidden" name="medianame<?php echo $i; ?>" value="" id="medianame<?php echo $key; ?>" >

                                                                    <input type="hidden" name="media" value="" id="mediadata<?php echo $key; ?>" >



                                                                     <input type="hidden" name="mediatype" value="" id="mediatype<?php echo $key; ?>" >
                                                                     
                                                                      <img id="commentimage<?php echo $key; ?>" style="display:none" src="#" class="img-after-select" alt="" />  

                                                                      <video id="commentvideo<?php echo $key; ?>" width="15%" height="15%" controls class="video-cont-2"  style="display:none">
                                                                      </video> 

                                                                      <button id="<?php echo $key; ?>" type="submit" class="submit-upload-item" style="display:none"> <span>Send</span> <i class="fa fa-chevron-right"></i></button>

                                                                </li>
                                                              </ul>
                                                               <progress id="progressBar<?php echo $key; ?>" value="0" max="100" style="width:300px; display: none "></progress>
                                                                <h3 id="status<?php echo $key; ?>"></h3>
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
                                           <?php }else{ ?>

                                    <div class="row">
                                       <div class="comment-section">
                                                                                                   
                                           <div class="col-xs-12 col-sm-12 left comment-icon-div" style="padding: 0px;">
                                                <ul>
                                                    <!-- <li><a href="#"><!-- <i class="fa fa-heart-o"></i> -->
                                                            <!-- <img src="" alt=""> -->
                                                        <!-- </a> -->
                                                    <!-- </li> --> 
                                                    <li>
                                                            <img src="<?php echo base_url('asset/images/comment.png')?>" data-toggle="collapse" data-target="#demo1" alt="">
                                                        
                                                    </li>
                                                    
                                                    <div id="demo1" class="comment-box collapse">
                                                      <div class="row">
                                                        <div class="col-xs-12 col-sm-12" style="padding: 0px;">
                                                          <div id="commentlist0">
                                                          </div> 

                                                          <div class="input-div">
                                                           <form action="javascript:void(0)" id="upload_form" enctype="multipart/form-data" method="post">     
                                                            <input type="hidden" id="id" value="0" name="id">
                                                             <input type="hidden" id="post_id0" value="<?php  echo $post_detail[0]->post_id; ?>" name="post_id">
                                                             <input type="hidden" id="senderid0" name="senderid" value="<?php echo $this->session->userdata('id'); ?>">
                                                             <input type="hidden" id="senderimage0" value="<?php echo $this->session->userdata('profile_image'); ?>" name="senderimage0">
                                                             <input type="hidden" id="sendername0" value="<?php echo $this->session->userdata('username'); ?>" name="sendername">
                                                             <input type="text" id="0" value="" name="commenttext" class="search-2 commentbox  commenttext0">

                                                            <!-- ============ -->
                                                              <ul class="camera-ul">
                                                                <li>
                                                                   
                                                                   <div class="file-with-camera">
                                                                     <input type="file" name="commentmedia0" class="camera-file" id="commentmedia0" onchange="readfile(this,0)">
                                                                     <!--  <input type="file" name="commentmedia" class="camera-file" onchange="readfile(this,< ?php echo $i; ?>)"  -->

                                                                      <img src="<?php echo base_url('asset/images/camera.png')?>" alt="" class="camera-for-uploads">
                                                                   </div>
                                                                  
                                                                  <input type="hidden" name="medianame0" value="" id="medianame0">

                                                                  <input type="hidden" name="media" value="" id="mediadata0">



                                                                   <input type="hidden" name="mediatype" value="" id="mediatype0">
                                                                   
                                                                    <img id="commentimage0" style="display:none" src="#" class="img-after-select" alt="">  

                                                                    <video id="commentvideo0" width="15%" height="15%" style="display: none" controls="" class="video-cont-2">
                                                                    </video> 

                                                                    <button id="0" type="submit" class="submit-upload-item" style="display:none"> <span>Send</span> <i class="fa fa-chevron-right"></i></button>

                                                                </li>
                                                              </ul>
                                                               <progress id="progressBar0" value="0" max="100" style="width:300px; display: none; "></progress>
                                                                <h3 id="status1"></h3>
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

                                           <!-- <div class="col-xs-2 col-sm-2 right">
                                                <a href="#">
                                                    <img src="< ?php //echo base_url('asset/images/share.png')?>" alt="">
                                                </a>
                                           </div> -->

                                       </div>
                                       

                                    </div>

                          
 
                                           <?php  } ?>
                                           <!-- <div class="col-xs-2 col-sm-2 right">
                                                <a href="#">
                                                    <img src="< ?php //echo base_url('asset/images/share.png')?>" alt="">
                                                </a>
                                           </div> -->

                                       </div>
                                       

                                    </div>

                                </div>
                                <p class="aftercatgory"><a class="category-name" href="<? echo base_url('frontend/categoryposts/').$post_detail[0]->category_id; ?>"><?php echo $post_detail[0]->category_name; ?></a></p>
                            </div>
                            
                        </div>
                      </div>
                        
                    <?php
                     $i++; 
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
                                          if(strlen($value->title)>19) echo '...';?></h3>
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
                      


                    </div>
                    <!-- //Right Sider -->
                </div>
            </div>
        </div>
    </section>
    <!-- ====================================== //Main ===================================== -->

<script>
function _(el){
   return document.getElementById(el);
}  
      /* Ajax for Comment */ 
  function uploadFile(id) 
 {
  //alert(id);
      if(_("commentmedia"+id).files[0])
      {
        var file = _("commentmedia"+id).files[0];
      } 
   var comment = $.trim($(".commenttext"+id).val());
    if(comment=='' && file==null){
        return false;
    }
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

function progressHandler(id,event)
{
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
   alert('xcxzca',+response);
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
   //var ext =filename.split('.').pop();
   //alert(response.mediafile);
   return false;
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
$('.commentbox').each(function(){
  $(this).on('keyup', function (e) {
  
 if (e.keyCode == 13) {
 var id = $('#id').val();
// alert('ishisissas',+id)
    uploadFile(id);
    e.preventDefault(e);
    }

});

});

  function add_comment(id,tr_id) {
      swal({
          title: "Are you sure?",
          text: "you want to delete?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Yes, Delete it!",
          confirmButtonColor: "#ec6c62"
      }, function() {
          $.ajax({
              url: "<?php echo base_url('superadmin/delete')?>",
              data: {
                  id: id,
                  table:'users'
              },
              type: "POST"
          }).done(function(data) {
            
              swal("Deleted!", "Record was successfully deleted!", "success");
              $('#tr_' + tr_id).remove();
          }).error(function(data) {
              swal("Oops", "We couldn't connect to the server!", "error");
          });
      });
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
