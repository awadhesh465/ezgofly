    <script src="< ?php echo base_url('asset/frontjs/jquery.js')?>"></script>

    <style type="text/css">
        #desktop{
          display: block;
        }
        #mobile{
          display: none;
        }
      @media screen and (max-width: 768px){
          #desktop{
            display: none;
          }
          #mobile{
            display: block;
          }
      }
    </style>

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

                    <div class="col-xs-4 col-sm-4 left-8" id="desktop">
                        <div class="news-feed">
                          <a href="<?php echo base_url('frontend/news_feed'); ?>">
                            <img src="<?php echo base_url('asset/images/news-feed.png')?>" alt="News Feed icon" title="News Feed icon">
                            <p>News Feed</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 left-8"  id="mobile">
                        <div class="news-feed" data-toggle="modal" data-target="#myModal_s">
                          
                            <img src="<?php echo base_url('asset/images/news-feed.png')?>" alt="News Feed icon" title="News Feed icon">
                            <p>News Feed</p>
                            
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
                        <!-- Post -->

                        <?php 
                        
                        if(isset($news_feed)){
                        	
                         $i=1;  
                         $j=1;
                         $imagetype= array('jpg,jpeg,png,bmp');
                         $videotype= array('ogg,mp3,mp4,mov,m4v');
                         $total_no_pages  = sizeof($news_feed)/6;
                          ?>

                          <div class="catgory-div">
                            <div class="row">
                              <input type="hidden" name="total_no_pages" value="<?php echo round($total_no_pages); ?>" id="total_no_pages">
                              <div class="mask"></div>
                              <?php if(isset($category)){
                                  foreach($category as $cat)
                                  { 
                                   //  if($cat['category_name']!='GENERAL'){
                                  ?>
                            
                             <div class="col-xs-12 col-sm-3 item">
                              <a href="<?php echo base_url('frontend/categoryposts/').$cat['category_id'] ?>">
                                <img src="<?php echo base_url('asset/images/'.$cat['category_image'])?>" class="img-responsive" alt="Posts icon" title="Category icon">
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

                         <div>
                         <div class="page page-active" id="page<?php echo $i; ?>">
                         <?php 

                        
                        foreach($news_feed as $news){  ?>
                        
                        <div class="post">
                          <div class="">
                            <div class="user-details">
                              <?php if($news->image){ ?>
                                <img src="<?php echo base_url('/asset/uploads/profile/'.$news->image)?>" class="" alt="User image" title="User image">
                              <?php }else{?>
                                <img src="<?php echo base_url('/asset/images/user.png')?>" class="" alt="User image" title="User image">
                              <?php  
                              } ?>  
                               <a href="<? echo base_url('frontend/user_post/').$news->user_id; ?>"> <label><?php echo  $news->username; ?></label></a>

                                 <?php 
                                      if(!empty($news->image)){
                                          $senderimg    = base_url('asset/uploads/profile/'.$this->session->userdata('profile_image'));
                                                   $receiverimg  = base_url('asset/uploads/profile/'.$news->image);
                   
                                      }else{
                                                  $senderimg     = base_url('asset/images/user.png');
                                                  $receiverimg   = base_url('asset/images/user.png');
                                      } ?>
                                             
                                <div class="msg-1" onclick=" return assignmodel('<?php  echo $news->user_id; ?>','<?php  echo $this->session->userdata('id')?>','<?php echo $senderimg ?>','<?php echo $receiverimg ?>','<?php echo $news->username ?>')">
                                              <i class="fa fa-bell" id="bellicon" data-value="<?php  echo $news->user_id; ?>" data-toggle="modal" data-target="#myModal_notification" onclick="message_get(<?php echo $news->user_id; ?>)"> <!-- <strong>5</strong> --><span>Messages</span></i>
                                </div>
                            </div>

                            <div class="user-dpost img-list">
                              <?php if(!empty($news->media_file)){ ?>
                                <div class="img <?php if(empty($news->title) && empty($news->contents)){ echo 'abc'; } ?>" >
                                  <a href="<? echo base_url('frontend/news_detail/').$news->feed_id; ?>">
                                  <?php //if(in_array($post->media_filetype,$imagetype))
                                     if($news->media_filetype=='jpg' || $news->media_filetype=='png'||$news->media_filetype=='bmp'||$news->media_filetype=='jpeg'||$news->media_filetype=='gif'){ ?>
                                     <a href="" class="ab">
                                    <img src="<?php echo base_url('/asset/uploads/post/thumb/'.$news->media_file)?>" class="img-responsive" alt="Post image" title="Post image"></a>
                                   <?php }
                                   elseif($news->media_filetype=='ogg' || $news->media_filetype=='mp4'||$news->media_filetype=='mov' || $news->media_filetype=='m4v' || $news->media_filetype=='quicktime'){?>
                                   <?php $first = strtok($news->media_file, '.'); ?>
                                    <video width="100%" height="100%" controls>
                                      <source src="<?php echo base_url('/asset/uploads/post/'.$news->media_file)?>" type="video/mp4" poster="<?php echo base_url('asset/uploads/video_image/').$first.'.png'; ?>">
                                    </video>
                                   <?php } ?> 
                                   </a>
                                    
                                </div><!-- $post->category_id; -->
                              <?php } ?>
                                <div class="content <?php if(empty($news->media_file)) echo "conetnt-fillwidth"; ?>  <?php if(empty($news->title) && empty($news->contents)){ echo 'xyz'; } ?>">
                                   <a href="http://www.facebook.com/sharer.php?u=<?php echo base_url('frontend/news_detail/').$news->feed_id; ?>" target="_blank">
                                                     <img src="<?php echo base_url('asset/images/share.png'); ?>" class="share-icon">
                                                     </a>
                                    <h2><a href="<? echo base_url('frontend/news_detail/').$news->feed_id; ?>"><?php echo substr($news->title,0,100) ; 
                                                 if(strlen($news->contents)>99) echo '...';
                                     ?></a></h2>
                                    <p><?php
                                          $contents = findURLTurnToClickableLink($news->contents); 
                                          echo  substr($contents,0,150);
                                           if(strlen($contents)>140) echo '...';
                                     ?> </p>
                                
                                    <div class="row">
                                      
                                       <div class="comment-section img-list">
                                            <?php 
                                              if(isset($news->comments))
                                               {
                                                 
                                                 foreach($news->comments as $comment) 
                                                  { 
  
                                                    ?>
                                                  <div class="asas border-btm">
                                                    
                                                    
                                                    <div class="ac ac-1">
                                                        <div class="img-container1">
                                                          <?php if(!empty($comment->image)){ ?>
                                                           <img src="<?php echo base_url('/asset/uploads/profile/'.$comment->image)?>" alt="User image" title="User image">
                                                         <?php }else{ ?>
                                                            <img src="<?php echo base_url('/asset/images/user.png')?>" alt="">
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
                                                    <img src="<?php echo base_url('/asset/uploads/post/thumb/'.$comment->file)?>" class="img-responsive" alt="Post image" title="Post image"></a>
                                                   <?php }
                                                   else if($comment->file_type=='ogg' || $comment->file_type=='mp4'||$comment->file_type=='quicktime' || $comment->file_type=='m4v'||$comment->file_type=='x-msvideo')
                                                    {?>
                                                    <video width="50%" height="50%" src="<?php echo base_url('/asset/uploads/post/'.$comment->file)?>"  controls id="video">
                                                      
                                                    </video>

                                                   
                                                   <?php } }?>
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

                                                            <input type="hidden" id="post_id<?php echo $i; ?>" value="<?php echo $news->feed_id; ?>" name="post_id">

                                                            <input type="hidden" id="senderid<?php echo $i; ?>" value="<?php echo $news->user_id; ?>" name="senderid">


                                                           <form action="javascript:void(0)" id="upload_form" enctype="multipart/form-data" method="post">     
                                                            <input type="hidden" id="id" value="<?php echo $i; ?>" name="id">
                                                             <input type="hidden" id="post_id<?php echo $i; ?>" value="<?php echo $news->feed_id; ?>" name="post_id">
                                                             <input type="hidden" id="senderid<?php echo $i; ?>" name="senderid" value="<?php echo $news->user_id; ?>" name="senderimage">
                                                             <input type="hidden"   id="senderimage<?php echo $i; ?>" value="<?php echo base_url('/asset/images/'.$news->image); ?>" name="senderimage">
                                                             <input type="hidden"  id="sendername<?php echo $i; ?>" value="<?php echo $news->username; ?>" name="sendername">
                                                             <input type="text" id="<?php echo $i; ?>" value="" name="commenttext" class="search-2 commentbox  commenttext<?php echo $i ?>" >

                                                            <!-- ============ -->
                                                              <ul class="camera-ul">
                                                                <li>
                                                                   
                                                                   <div class="file-with-camera">
                                                                     <input type="file"      name="commentmedia<?php echo $i; ?>" class="camera-file" id="commentmedia<?php echo $i; ?>"  onchange="readfile(this,<?php echo $i; ?>)">
                                                                   

                                                                      <img src="<?php echo base_url('asset/images/camera.png')?>" alt="" class="camera-for-uploads">
                                                                   </div>
                                                                  
                                                                  <input type="hidden" name="medianame<?php echo $i; ?>" value="" id="medianame<?php echo $i; ?>" >

                                                                  <input type="hidden" name="media" value="" id="mediadata<?php echo $i; ?>" >



                                                                   <input type="hidden" name="mediatype" value="" id="mediatype<?php echo $i; ?>" >
                                                                   
                                                                    <img id="commentimage<?php echo $i; ?>" style="display:none" src="#" class="img-after-select" alt="" />  
                                                                    <video id="commentvideo<?php echo $i; ?>" width="5%" height="5%" style="display: none" controls class="video-cont-2">
                                                                       </video> 

                                                                       <button id="<?php echo $i; ?>" type="submit" class="submit-upload-item" style="display:none"><span>Send</span> <i class="fa fa-chevron-right"></i></button>

                                                                </li>
                                                              </ul>
                                                               <progress id="progressBar<?php echo $i; ?>" value="0" max="100" style="width:300px; display: none "></progress>
                                                                <h3 id="status<?php echo $i; ?>"></h3>
                                                              <p id="loaded_n_total"></p>
                                                           </form> 
                                                          <!-- ============ -->
                                                          

                                                          
                                               
                                                            <!-- ============ -->
                                                          
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
                                                    <img src="< ? php //echo base_url('asset/images/share.png')?>" alt="">
                                                </a>
                                           </div> -->

                                       </div>
                                       

                                    </div>

                                </div>
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
                     }else
                     {?>
                       <div class="user-dpost">
                        <p><h4> No News Available </h4></p>
                       </div>


                     <?php }
                      ?>
                        <!-- Post -->
                        
                    </div>
                    
                    <!-- //Left Sider -->

                    <!-- Right Sider -->
                    <div class="col-xs-12 col-sm-12 col-md-4 left-8">
                        <div class="stories">
                            <h2 data-toggle="modal" data-target="#myModal_s">News Feed</h2>
                            
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
                               <?php
                               if(!empty($news_feed))
                               {
                                foreach ($news_feed as $key => $value) 
                                {
                                ?>
                                 <div class="stories-post">
                                     <div class="col-xs-3 col-sm-3 left padding-0">
                                      <?php if(!empty($value->image)){ ?>

                                         <img src="<?php echo base_url('asset/uploads/profile/').$value->image ?>" title="News feed image" alt="News feed image">
                                      <?php } else{ ?>
                                         <img src="<?php echo base_url('asset/images/user.png'); ?>" title="News feed image" alt="News feed image"> 
                                      <?php  } ?>
                                         
                                     </div>
                                     <div class="col-xs-9 col-sm-9 right">
                                        <a href="<?php echo base_url('frontend/news_detail/').$value->feed_id ?>">
                                          <h3><?php echo substr($value->title,0,20); 
                                            if(strlen($value->title)>19) echo '...';
                                         ?>
                                          
                                        </h3>
                                        </a>
                                         <!-- <label>Share video</label> -->
                                     </div>
                                 </div>
                               <?php  
                                if($key==6)
                                  break;
                                } 
                              
                               } ?>
                               <!-- /Story -->

                              

                              
                              
                              

                            </div>
                        </div>

                        <div class="clearfix"></div>
                       <!--  <div class="other-div">
                            <h2>Other</h2>
                            
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <img src="< ?php echo base_url('asset/images/other-img.jpg')?>" alt="Los Angeles" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>

                                  <div class="item">
                                    <img src="< ?php echo base_url('asset/images/other-img.jpg')?>" alt="Chicago" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>
                                
                                  <div class="item">
                                    <img src="< ?php echo base_url('asset/images/other-img.jpg')?>" alt="New york" style="width:100%;">
                                    <div class="content-1">Lorem Ipsum is simply dummy text 
                                        of the printing and typesetting 
                                        industry.</div>
                                  </div>
                                </div>

                                
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                  <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                  <span class="sr-only">Next</span>
                                </a>
                              </div>
                             
                        </div> -->


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


   
 
$('.commentbox').each(function(){
  $(this).on('keyup', function (e) {
  
 if (e.keyCode == 13) {
     var id = $(this).attr('id');
     uploadFile(id);
     e.preventDefault(e);
    }

});

});


function uploadFile(id) 
 {
      if(_("commentmedia"+id).files[0])
      {
        var file = _("commentmedia"+id).files[0];
      } 
      var comment = $(".commenttext"+id).val();
       
      var postid= $('#post_id'+id).val()
      var comment_by = $('#senderid'+id).val()
      var formdata = new FormData();
      formdata.append("commentmedia", file);
      formdata.append("comment", comment);
      formdata.append("post_id", postid);
      formdata.append("id",comment_by);
      formdata.append("table", 'comment');
      formdata.append("posttype",'news');

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
} 
function progressHandler(id,event){
  
  $('#progressBar'+id).show();
 // _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  //  alert(percent)
  $('#progressBar'+id).val( Math.round(percent))
  //_("progressBar").value = Math.round(percent);
  $("#status"+id).innerHTML = Math.round(percent)+"% uploaded... please wait";

  
  

}

function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
} 
 
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
