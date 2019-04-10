<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Task</h1>
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
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('superadmin/task_list')?>"><i class="fa fa-th-list">&nbsp;Task List</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <form role="form" method="post" action="<?php if(!empty($task[0])){ echo base_url('superadmin/task/'.$task[0]->task_id);}else{echo base_url('superadmin/task');} ?>" class="registration_form1" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2">Name * </label>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" id="name" class="form-control" value="<?php if(!empty($task[0]->name)){echo $task[0]->name;}else{ echo set_value('name');}?>" >
                                        <span class="red"><?php echo form_error('name'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Url *</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="url" id="url" class="form-control" value="<?php if(!empty($task[0]->url)){echo $task[0]->url;}else{ echo set_value('url');}?>">
                                        
                                        <span class="red"><?php echo form_error('url'); ?></span>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-2">Description*</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter Description"><?php if(!empty($task[0]->description)){ echo  $task[0]->description;} ?>
                                            </textarea> 
                                        <script type="text/javascript">
                                            CKEDITOR.replace('description');
                                        </script>
                                        <span class="red"><?php echo form_error('description'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                   <label class="col-md-2">Time to Finish </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="time" id="time">
                                            <option value="">-- Select Days --</option>
                                            <?php 
                                            for($i=1;$i<=100;$i++)
                                                 {
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php if(isset($task) && $task[0]->time==$i){echo 'selected';} ?>><?php echo $i.'Days'; ?></option>

                                            <?php }?>
                                        </select>
                                        <span class="red">
                                            <?php echo form_error('time'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2">Status *</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="1"  <?php if(!empty($task[0]->is_active)){ echo ($task[0]->is_active=='1')?'checked':'';}else{ echo set_value('status');} ?>>Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" value="0" <?php if(!empty($task[0]->is_active)){ echo ($task[0]->is_active=='0')?'checked':''; }else{ echo set_value('status');}?>>Inactive
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
        //$('select').niceSelect();
    });
</script>