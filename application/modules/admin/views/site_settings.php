<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Site Detail</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if(!empty($msg)){
 
                ?>
            <div class="alert alert-success">
                <?php echo $msg;?> </div>
            <?php }?>
            <?php if ($info_message = $this->session->flashdata('info_message')): ?>
            <div id="form-messages" class="alert alert-success" role="alert">
                <?php echo $info_message; ?> </div>
            <?php endif ?>
            <div class="panel panel-default">
                <div class="panel-heading"> <a class="btn btn-primary" href="#"><i class="fa fa-th-list">&nbsp;Site Detail</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-8 col-md-offset-2" >
                            <form role="form" method="post"  action="<?php echo base_url('admin/site_detail/1');?>" class="registration_form1 form-group" enctype="multipart/form-data">
                               	
                                <div class="col-lg-4"> 
	                                <div class="form-group"> 
	                                    <label >Site Title * </label>
	                                    <div class="">
	                                        <input type="text" name="site_title" id="site_title" class="form-control" value="<?php if(!empty($detail[0]->site_title)){echo $detail[0]->site_title;}else{ echo set_value('site_title');}?>" maxlength="30">
	                                        <span class="red"><?php echo form_error('site_title'); ?></span>
	                                    </div>
	                                </div>
                                </div>
                              
                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Site Email</label>
	                                    <div class="">
	                                        <input type="text" name="site_email" id="site_email" class="form-control" value="<?php if(!empty($detail[0]->site_email)){echo $detail[0]->site_email;}else{ echo set_value('site_email');}?>">
	                                        <span class="red"><?php echo form_error('site_email'); ?></span>
	                                    </div>
	                                </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-4"> 
	                                <div class="form-group"> 
	                                    <label >Site Phone Number  </label>
	                                    <div class="">
	                                        <input type="text" name="site_number" id="site_number" class="form-control" value="<?php if(!empty($detail[0]->site_number)){echo $detail[0]->site_number;}else{ echo set_value('site_number');}?>" maxlength="30">
	                                        <span class="red"><?php echo form_error('site_number'); ?></span>
	                                    </div>
	                                </div>
                                </div>
                                
                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Site Logo </label>
	                                    <div class="">
	                                        <input type="file" name="site_logo" id="site_logo" class="form-control">
	                                        <span class="red"><?php echo form_error('site_logo'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="clearfix"></div>


                                <div class="col-lg-4"> 
	                                <div class="form-group"> 
	                                    <label >Site Favicon Icon </label>
	                                    <div class="">
	                                         <input type="file" name="site_favicon" id="site_favicon" class="form-control">
	                                        <span class="red"><?php echo form_error('site_favicon'); ?></span>
	                                    </div>
	                                </div>
                                </div>
                                
                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Facebook Url </label>
	                                    <div class="">
	                                        <input type="text" name="facebook_url" id="facebook_url" class="form-control" value="<?php if(!empty($detail[0]->facebook_link)){echo $detail[0]->facebook_link;}else{ echo set_value('facebook_url');}?>">
	                                        <span class="red"><?php echo form_error('facebook_url'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Google Plus Url </label>
	                                    <div class="">
	                                        <input type="text" name="google_plus_url" id="google_plus_url" class="form-control" value="<?php if(!empty($detail[0]->google_plus_link)){echo $detail[0]->google_plus_link;}else{ echo set_value('google_plus_url');}?>">
	                                        <span class="red"><?php echo form_error('google_plus_url'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Twitter Url </label>
	                                    <div class="">
	                                        <input type="text" name="twitter_url" id="twitter_url" class="form-control" value="<?php if(!empty($detail[0]->twitter_link)){echo $detail[0]->twitter_link;}else{ echo set_value('twitter_url');}?>">
	                                        <span class="red"><?php echo form_error('twitter_url'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Youtube Url </label>
	                                    <div class="">
	                                        <input type="text" name="youtube_url" id="youtube_url" class="form-control" value="<?php if(!empty($detail[0]->youtube_link)){echo $detail[0]->youtube_link;}else{ echo set_value('youtube_url');}?>">
	                                        <span class="red"><?php echo form_error('youtube_url'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="col-lg-4">
	                                <div class="form-group">
	                                    <label >Instagram Url </label>
	                                    <div class="">
	                                        <input type="text" name="instagram_url" id="instagram_url" class="form-control" value="<?php if(!empty($detail[0]->instagram_link)){echo $detail[0]->instagram_link;}else{ echo set_value('instagram_url');}?>">
	                                        <span class="red"><?php echo form_error('instagram_url'); ?></span>
	                                    </div>
	                                </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label >Subscribe Content </label>
                                        <div class="">
                                 <textarea class="form-control" rows="5" id="content" name="content" placeholder="content"><?php if(!empty($detail[0]->site_subscribe_text)){ echo $detail[0]->site_subscribe_text; } ?></textarea> <span class="red"><?php echo form_error('content'); ?></span>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('content');
                                        </script>
                                        <span class="red"><?php echo form_error('content'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label >Uploaded Images </label>
                                        <div class="">
                                            <img src="<?php echo base_url('asset/uploads/').$detail[0]->site_logo; ?>" height="100px" width="100px" class="img-thumbnail">

                                            <img src="<?php echo base_url('asset/uploads/').$detail[0]->site_favicon_icon; ?>" height="50px" width="50px" class="img-thumbnail">
                                        </div>

                                       
                                    </div>

                                </div>
                                        
                                <div class="col-md-8 col-md-offset-3">
                                    <button type="submit" value="Save" id="submit" class="btn btn-success">Save</button>
                                    <input type="reset" class="btn btn-default" value="Reset"> </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').niceSelect();
    });
</script>