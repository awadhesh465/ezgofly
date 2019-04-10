<div class="banner">
        <img src="<?php  echo base_url('asset/images/categories-banner.jpg')?>" class="img-responsive banner-img" alt="banner image" title="banner image">

        <!-- bottom-block -->
        <div class="bottom-block">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="record" data-toggle="modal" data-target="#myModal">
                            <img src="<?php echo base_url('asset/images/record.png'); ?>" alt="">
                            <p>Record</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <a href="<?php echo base_url('frontend/news_feed'); ?>">
                        <div class="news-feed">
                            
                            <img src="<?php echo base_url('asset/images/news-feed.png'); ?>" alt="">
                            <p>News Feed</p>
                            
                        </div>
                        </a>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                      <a href="<?php echo base_url('frontend/all_posts'); ?>">
                        <div class="events">
                            <img src="<?php echo base_url('asset/images/events.png'); ?>" alt="">
                            <p>Posts</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- //bottom-block -->
    </div>

    <section>
    	<div class="container message-page">
            <div class="jumbotron">
                <div class="canter-div">
                    <h1 class="text-center">Message</h1>
                    <?php if(!empty($message)){ 
                        foreach ($message as $key => $value) {
                           
                     
                    ?>
                      
                    
                    <?php 

                        if(!empty($value->image))
                             {
                                 $senderimg    = base_url('asset/uploads/profile/'.$this->session->userdata('profile_image')  );
                                 $receiverimg  = base_url('asset/uploads/profile/'.$value->image);
 
                             }
                             else{
                                $senderimg     = base_url('asset/images/user.png');
                                $receiverimg   = base_url('asset/images/user.png');
                              } 


                    ?>


                    <div class="noti-list" onclick=" return assignmodel('<?php  echo $value->user_id; ?>','<?php  echo $this->session->userdata('id')?>','<?php echo $senderimg ?>','<?php echo $receiverimg ?>','<?php echo $value->username ?>')">
                        <div class="col-xs-2 col-sm-2 left">
                            <?php if(!empty($value->image)){ ?>
                            <img src="<?php echo base_url('asset/uploads/profile/').$value->image; ?>" class="img-responsive" title="Profile image" alt="Profile image">
                            <?php }else{ ?>
                            <img src="<?php echo base_url('asset/images/user.png'); ?>" class="img-responsive" title="Profile image" alt="Profile image">
                            <?php } ?>
                        </div>
                        <div class="col-xs-10 col-sm-10 middle" onclick="message_get(<?php echo $value->user_id; ?>)" data-value="<?php  echo $value->user_id; ?>" data-toggle="modal" data-target="#myModal_notification">
                            <h2><?php echo $value->username; ?></h2>
                            <button class="btn-Message">Message</button>
                        </div>

                        
                    </div>
                    <?php     } }else{ ?>

                        <p class="text-center">No Message Available</p>
                    <?php }  ?>

                   
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
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
                                var img = "<?php echo base_url('asset/uploads/profile/')?>"+message[i].reciever_image+"";
                                $('#message').append('<div class="row msg_container base_receive"><div class="col-xs-2 col-md-1 avatar"><img src='+img+' class=" img-responsive "></div><div class="col-xs-10 col-md-11 left-8"><div class="messages msg_receive"><p>'+message[i].message+'</p><time datetime="2009-11-13T20:00">'+message[i].hours+' </time></div></div></div>');
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