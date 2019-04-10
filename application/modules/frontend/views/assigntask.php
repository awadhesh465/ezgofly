<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assign Task</h1>
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
            <?php if ($info_message = $this->session->flashdata('error_message')): ?>
            <div id="form-messages" class="alert alert-danger" role="alert">
                <?php echo $info_message; ?> </div>
            <?php endif ?>
            <div class="panel panel-default">
                <div class="panel-heading"> <a class="btn btn-primary" href="#"><i class="fa fa-th-list">&nbsp;Task Detail</i></a> </div>
                <div class="panel-body">
                    <div class="row">
                        <table class="table table-1">
                            <tbody>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td><?php if(isset($task)){ echo $task[0]->name;} ?></td>
                                </tr>


                                <tr>
                                    <td><strong>Url</strong></td>
                                    <td><?php if(isset($task)){ echo $task[0]->url;} ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Description </strong></td>
                                    <td><?php if(isset($task)){ echo $task[0]->description;} ?></td>
                                </tr>

                                <tr>
                                    <td><strong>Time </strong></td>
                                    <td><?php if(isset($task)){ echo $task[0]->time." Days";} ?></td>
                                </tr>
                            </tbody>
                        </table> 
                        <div class="clearfix"></div>
                      <?php if(isset($task) && $task[0]->assigned_status==1){ ?>
                      <h2 align="center"><b><u>Task Assigned Detail</u></b></h2>
                      <?php } ?>
                       <table class="table table-bordered display nowrap" cellspacing="0" width="100%" id="appointment">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sr. no</th>
                                    <th>Assigned To</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                        
                                    <th>Assigned Date</th>
                                    <th>Task Action</th>
                                    
                                   </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php 
                                $count=1;
                                if(isset($task_detail)){
                                    
                                foreach ($task_detail as  $value) { ?>
                                <tr class="odd gradeX" id="tr_<?php echo $count;?>">
                                    <td>
                                        <?php echo $count; ?>
                                    </td>
                                    <td>
                                        <?php if($value->assignedto_role_id==2){
                                            echo "ADMIN";
                                            }else{
                                            echo "STAFF";
                                            } ?>
                                    </td>
                                    <td>
                                        <?php  echo $value->username;?>
                                    </td>
                                    <td>
                                        <?php if($value->status==1 && $value->completed==2){
                                                echo "<b>Completed</b>";

                                            }elseif($value->status==1 && $value->completed==0){

                                                echo  "<b>Working</b>";
                                            }?>                                   
                                    </td>
                                    
                                 
                                    <td>
                                        <?php echo $value->created_at; ?>
                                    </td>

                                    <td>
                                        <?php if($value->status==1 && $value->completed==0){ ?>
                                        <button class="btn btn-primary" onclick="complete_task(<?php echo $value->assigned_id; ?>)">Complete it</button>
                                        <?php }else{
                                            echo "<b>Task Already Completed</b>";
                                            } ?>
                                    </td>
                                    
                                   </tr>
                                <?php $count++; } }?> </tbody>
                        </table>
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

       $("#role").change(function(){
        var role =$("#role option:selected").val();
        //alert(role);
        if(role!=''){
            if(role=='admin'){
                $('#admin').show();
                $('#staff').hide();
          
            }else if(role=='staff'){
              
                $('#admin').hide();
                $('#staff').show();
            }
        }else{
            $('#staff').hide();
            $('#admin').hide();
            alert('Please Select Role First')
        }
        
    });


    
   
});
    function check_function(){
       var role =$("#role option:selected").val();
        if(role!=''){
             if(role=='admin'){
               var admin_id =$("#admin_id option:selected").val();
                if(admin_id==''){
                    alert('Please Select Admin');
                    return false;
                }
            }else if(role=='staff'){
                var staff_id =$("#staff_id option:selected").val();
                if(staff_id==''){
                    alert('Please Select Staff');
                    return false;
                }
            }
        }else{
            $('#staff').hide();
            $('#admin').hide();
            alert('Please Select Role First')
        }
    }  

    function complete_task(id){
        var url = "<?php echo base_url('superadmin/complete_task')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                id : id
            },
            success: function(result) {
               location.reload();
            }
        });
    } 
</script>