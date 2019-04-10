<div class="banner">
        <img src="<?php  echo base_url('asset/images/categories-banner.jpg')?>" class="img-responsive banner-img" alt="banner image" title="banner image">

        <!-- bottom-block -->
        <div class="bottom-block">
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 left-8">
                        <div class="record" data-toggle="modal" data-target="#myModal">
                            <img src="<?php echo base_url('asset/images/record.png'); ?>" alt="Record icon" title="Record icon">
                            <p>Record</p>
                        </div>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                        <a href="<?php echo base_url('frontend/news_feed'); ?>">
                        <div class="news-feed">
                            
                            <img src="<?php echo base_url('asset/images/news-feed.png'); ?>" alt="News feed icon" title="News feed icon">
                            <p>News Feed</p>
                            
                        </div>
                        </a>
                    </div>

                    <div class="col-xs-4 col-sm-4 left-8">
                      <a href="<?php echo base_url('frontend/all_posts'); ?>">
                        <div class="events">
                            <img src="<?php echo base_url('asset/images/events.png'); ?>" alt="Posts icon" title="Posts icon">
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
    <div class="update-profile">
      <div class="container">
        <div class="profile-edit">

          <div class="col-xs-12 col-sm-12 left-8">
            <h2 class="text-center">Update Profile</h2>

            <div class="no-image">
              <?php if(!empty($user_detail[0]->image)){ ?>
              <img src="<?php echo base_url('asset/uploads/profile/').$user_detail[0]->image;?>" class='img-thumbnail' alt="Profileimage" title="Profile image">
              <?php }else{ ?>

               <img src="<?php echo base_url('asset/images/user.png');?>" class=''>
              <?php } ?>
            </div>
<!--             http://webdesky.com/studentx/asset/uploads/profile/no_uploaded.png -->

            <div class="update-table">
              

              <div class="table-responsive">
                  <form class="forms-sample" method="post" action="<?php echo base_url('frontend/update_profile/').$user_detail[0]->id ?>" enctype='multipart/form-data'>
                      <table class="table table-responsive text-centered ">
                        <tr>
                          <td>Name :</td>
                          <td><input type="text" name="name" value="<?php if(isset($user_detail)){ echo $user_detail[0]->username;} ?>"></td>
                        </tr>

                        <tr>
                          <td>Moblie :</td>
                          <td><input type="text" name="number" value="<?php if(isset($user_detail)){ echo $user_detail[0]->phone_no;} ?>"></td>
                        </tr>

                         <tr>
                          <td>Profile Picture :</td>
                          <td><input type="file" name="image"></td>
                        </tr>

                        <tr>
                          <td>Public / Private</td>
                          <td>
                            <?php 
                                 
                               $Public='';$Private='';
                               $pu='';$pr='';
                              if($user_detail[0]->profile_public==1){
                                  $Public= 'checked';
                                 $pu='active ';
                              }
                              else
                               {
                                 $Private= 'checked1';
                                 $pr='active';
                               } 
                               ?>
                            <div class="btn-group" id="status" data-toggle="buttons">
                              <label class="btn btn-default btn-on btn-sm  <?php echo $pu ?>">
                              <input type="radio" value="1" name="profile_public" checked="<?php echo $Public  ?>"   >Public</label>
                              <label class="btn btn-default btn-off btn-sm <?php echo $pr ?>">
                              <input type="radio" value="0" name="profile_public" checked=<?php echo  $Private  ?>>Private</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td></td>
                          <td><button class="btn-1" type="submit">Update</button></td>
                        </tr>
                      </table>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>