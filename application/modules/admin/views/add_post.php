<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Post</h1>
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
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('admin/post_list')?>"><i class="fa fa-th-list">&nbsp;Post List</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="post" action="<?php if(!empty($post[0])){ echo base_url('admin/post/'.$post[0]->post_id);}else{echo base_url('admin/post');} ?>" class="registration_form1" enctype="multipart/form-data">
                                <div class="form-group"> 
                                    <label class="col-md-2">Category name * </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option>Select Category</option>
                                            <?php if(!empty($category)){
                                                foreach ($category as $key => $value) { ?>
                                                <option value="<?php echo $value['category_id'] ?>" <?php if(!empty($post[0]->category_id) && $post[0]->category_id == $value['category_id']){ echo 'selected' ;} ?>><?php echo $value['category_name'] ?></option>    
                                                
                                                <?php } } ?>
                                        </select>
                                        <span class="red"><?php echo form_error('category_id'); ?></span>
                                    </div>
                                </div>


                                <div class="form-group"> 
                                    <label class="col-md-2">Title * </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="title" id="title" class="form-control" value="<?php if(!empty($post[0]->title)){echo $post[0]->title;}else{ echo set_value('title');}?>" maxlength="30">
                                        <span class="red"><?php echo form_error('title'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Content *</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="5" id="content" name="content" placeholder="content"><?php if(!empty($post[0]->contents)){ echo $post[0]->contents; } ?></textarea> <span class="red"><?php echo form_error('content'); ?></span>
                                        <script type="text/javascript">
                                            CKEDITOR.replace('content');
                                        </script>
                                        <span class="red"><?php echo form_error('content'); ?></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                
                                    
                                <div class="form-group">
                                    <label class="col-md-2">Image *</label>
                                    <div class="col-lg-6">
                                        <input type="file" name="media_file" id="media_file" class="form-control">
                                        <span class="red"><?php echo form_error('phone_number'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12" align="center">
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
      //  $('select').niceSelect();
    });
</script>