<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Staff</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if(!empty($msg)){?>
            <div class="alert alert-success">
                <?php echo $msg;?> </div>
            <?php }?>
            <?php if ($info_message = $this->session->flashdata('info_message')): ?>
            <div id="form-messages" class="alert alert-success" role="alert">
                <?php echo $info_message; ?> </div>
            <?php endif ?>
            <div class="panel panel-default">
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('superadmin/staff_list')?>"><i class="fa fa-th-list">&nbsp;Staff List</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="post" action="<?php if(!empty($staff[0])){ echo base_url('superadmin/staff/'.$staff[0]->id);}else{echo base_url('superadmin/staff');} ?>" class="registration_form1" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                   <label class="col-md-2">Admin </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="admin_id" id="admin_id">
                                            <option value="">-- Select Admin --</option>
                                            <?php if(!empty($admin_list)){ 
                                                foreach ($admin_list as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->id; ?>" <?php if(isset($staff) && $staff[0]->admin_id==$value->id){echo 'selected';} ?>><?php echo $value->username; ?></option>

                                            <?php } } ?>
                                        </select>
                                        <span class="red">
                                            <?php echo form_error('admin_id'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2">Name * </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" id="name" class="form-control" value="<?php if(!empty($staff[0]->username)){echo $staff[0]->username;}else{ echo set_value('name');}?>" maxlength="30">
                                        <span class="red"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Email *</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($staff[0]->email)){echo $staff[0]->email;}else{ echo set_value('email');}?>" maxlength="30">
                                        
                                        <span class="red"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>
                                <?php if(!isset($staff)){ ?>
                                <div class="form-group">
                                    <label class="col-md-2">Password *</label>
                                    <div class="col-lg-6">
                                        <input type="password" name="password" id="password" class="form-control" value="<?php if(!empty($staff[0]->name)){echo $staff[0]->name;}else{ echo set_value('speciality_name');}?>" maxlength="30">
                                        <span class="red"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-2">Phone Number *</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php if(!empty($staff[0]->phone_no)){echo $staff[0]->phone_no;}else{ echo set_value('phone_number');}?>" maxlength="30">
                                        <span class="red"><?php echo form_error('phone_number'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Status *</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1"  <?php if(!empty($staff[0]->is_active)){ echo ($staff[0]->is_active=='1')?'checked':'';}else{ echo set_value('status');} ?>>Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?php if(!empty($staff[0]->is_active)){ echo ($staff[0]->is_active=='0')?'checked':''; }else{ echo set_value('status');}?>>Inactive
                                        </label>
                                        <span class="red"><?php echo form_error('status'); ?></span>
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
       // $('select').niceSelect();
    });
</script>