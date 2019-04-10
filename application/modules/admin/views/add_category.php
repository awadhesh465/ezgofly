<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Category</h1>
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
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('admin/category_list')?>"><i class="fa fa-th-list">&nbsp;Category List</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="post" action="<?php if(!empty($category[0])){ echo base_url('admin/category/'.$category[0]->category_id);}else{echo base_url('admin/category');} ?>" class="registration_form1" enctype="multipart/form-data">
                                <div class="form-group"> 
                                    <label class="col-md-2">Name * </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" id="name" class="form-control" value="<?php if(!empty($category[0]->category_name)){echo $category[0]->category_name;}else{ echo set_value('name');}?>" maxlength="30">
                                        <span class="red"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>
                                
                               
                               
                               

                                <div class="form-group">
                                    <label class="col-md-2">Image *</label>
                                    <div class="col-lg-6">
                                        <input type="file" name="category_image" id="category_image" class="form-control">
                                        <span class="red"><?php echo form_error('category_image'); ?></span>
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
        $('select').niceSelect();
    });
</script>