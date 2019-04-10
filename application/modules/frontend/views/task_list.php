<style type="text/css">
    .filter{
        border: 1px solid #ccc;
        padding: 18px 0 0;
        width: 80%;
        margin: 20px auto 0;
    }
    .filter p{
        text-align: center;
        line-height: 35px;
        font-size: 22px;
        margin: 0px;
    }

</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Task List </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <?php if ($info_message = $this->session->flashdata('info_message')): ?>
            <div id="form-messages" class="alert alert-success" role="alert">
                <?php echo $info_message; ?>
            </div>
            <?php endif ?>
            <div class="panel panel-default">
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('superadmin/task')?>"><i class="fa fa-th-list">&nbsp;Add Task </i></a> </div>
                <div class="filter">
                    <div class="row">
                       

                        

                        <div class="col-xs-5 col-sm-1"><p>From</p></div>
                        <div class="col-xs-7 col-sm-2 form-group">
                            <input type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="Select Start Date">
                        </div>

                        <div class="col-xs-5 col-sm-1"><p>to</p></div>
                        <div class="col-xs-7 col-sm-2 form-group">
                            <input type="text" name="end_date" id="end_date" class="form-control datepicker" placeholder="Select End Date">
                        </div>
                        
                        <div class="col-xs-3 col-sm-1">
                            <button class="btn" onclick="get_data()">Filter</button>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" cellspacing="0" width="100%" id="appointment">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sr. no</th>
                                    <th>Assign</th>
                                    <th>Name</th>
                                   <!--  <th>Time</th>
                                    <th>url</th>
                                    <th>Description</th> -->
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php 
                                $count=1;
                                if(isset($task)){
                                foreach ($task as  $value) { ?>
                                <tr class="odd gradeX" id="tr_<?php echo $count;?>">
                                    <td>
                                        <?php echo $count; ?>
                                    </td>
                                    <td>
                                    
                                        <input type="checkbox" name="task_id[]" value="<?php echo $value->task_id; ?>" id="task_id" >
                                       
                                      
                                    </td>
                                    <td>
                                        <a title="Assign" href="<?php echo base_url('superadmin/assigntask/').$value->task_id; ?>"><?php  echo $value->name;?></i></a>
                                    </td>
                                   <!--  <td>
                                        <?php //echo $value->time." Days"; ?>
                                    </td>
                                    <td>
                                        <?php //echo $value->url; ?>
                                    </td>

                                    <td>
                                        <?php //echo $value->description; ?>
                                    </td> -->
                                    <td>
                                        <?php echo $value->created_at; ?>
                                    </td>
                                    <td>
                                        <!-- <?php  //if($value->assigned_status==0){ echo 'Not Assigned';}else{ echo 'Assigned';}?> -->
                                        <div class="progress">
                                            <div class="progress-bar" style="width:<?php echo $value->percentage.'%' ?>"><?php echo $value->percentage.'%' ?></div>
                                          </div>
                                    </td>

                                   
                                    <td class="center">
                                     <a title="Edit" href="<?php echo base_url('superadmin/task/').$value->task_id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ||
                                       <a title="Delete" href="javascript:void(0)" onclick="delete_task('<?php echo $value->task_id;?>','<?php echo $count;?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> || 

                                       <a title="Assign" href="<?php echo base_url('superadmin/assigntask/').$value->task_id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                         </td>
                                   </tr>
                                <?php $count++; } }?> </tbody>
                        </table>

                                <div class="form-group col-lg-12">
                                   <label class="col-md-2"><h2><b><u>Assign Builder</u></b> </h2></label>
                                   </div>
                                    <div class="form-group col-lg-12">
                                   <label class="col-md-2">Role </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="role" id="role" required="required">
                                            <option value="">Select Role</option>
                                            <option value="admin" <?php  if(!empty($assigned_detail) && $assigned_detail[0]->assignedto_role_id==2) { echo 'selected';} ?>>Admin</option>
                                            <option value="staff" <?php  if(!empty($assigned_detail) && $assigned_detail[0]->assignedto_role_id==3) { echo 'selected';} ?>>Staff</option>
                                        </select>
                                        <span>
                                            <?php echo form_error('role'); ?></span>
                                    </div>
                                </div>
                                 <div class="form-group col-lg-12" id="admin" style="<?php if(!empty($assigned_detail) && $assigned_detail[0]->assignedto_role_id==2){  }else{ ?>display: none; <?php } ?>">
                                   <label class="col-md-2">Admin </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="admin_id" id="admin_id"  class="staff_id" >
                                            <option value="">Select Admin</option>
                                            <?php if(!empty($admin)){
                                                foreach ($admin as $key => $value) { ?>
                                                
                                                <option value="<?php echo $value->id; ?>" <?php if(!empty($assigned_detail) && $assigned_detail[0]->assigned_to==$value->id) { echo 'selected';}?>><?php echo $value->username; ?></option>    
                                            <?php   }
                                                } ?>
                                        </select>
                                        <span>
                                            <?php echo form_error('admin_id'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12" id="staff" style="<?php if(!empty($assigned_detail) && $assigned_detail[0]->assignedto_role_id==3){  }else{ ?>display: none; <?php } ?>">
                                   <label class="col-md-2">Staff </label>
                                    <div class="col-md-4">
                                        <select class="form-control staff_id1" name="staff_id" id="staff_id" >
                                            <option value="">Select Staff</option>
                                            <?php if(!empty($staff)){
                                                foreach ($staff as $key => $value) { ?>
                                                
                                                <option value="<?php echo $value->id; ?>" <?php if(!empty($assigned_detail) && $assigned_detail[0]->assigned_to==$value->id) { echo 'selected';}?>><?php echo $value->username; ?></option>    
                                            <?php   }
                                                } ?>
                                        </select>

                                        <span>
                                            <?php echo form_error('assigned_id'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12">
                                    <div class="col-md-10" align="center">
                                    <button class="btn btn-primary" onclick="multiple_assign()">Assign</button>
                                    </div>
                                    </div>
                        
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( ".datepicker" ).datepicker();

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


    $('#appointment').DataTable({
        responsive: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });

function delete_task(id,tr_id) {
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
            url: "<?php echo base_url('superadmin/task_delete')?>",
            data: {
                id: id,
                table:'task'
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

function get_data(){
        var start_date = $('#start_date').val();
        var end_date   = $('#end_date').val();
     
        $.ajax({
                url: "<?php echo base_url('superadmin/get_search_task')?>",
                method: "POST",
                dataType: "json",
                data: {

                    start_date  : start_date,
                    end_date    : end_date
                  
                },
                success: function(responses) {
                    var response =responses['task'];
                    //console.log(response);
                    if(response!=null){
                     if (response.length > 0) {
                         $('#table_body').html('');
                         for (var i = 0; i < response.length; i++) {                            
                            var edit = "<?php echo base_url('superadmin/task/'); ?>"+response[i].task_id;
                            var del  = response[i].task_id;
                            var assign = "<?php echo base_url('superadmin/assigntask/') ?>"+response[i].task_id;
                           // var name =  "<?php echo base_url('superadmin/assigntask/')?>"+response[i].task_id;
                            
                            if(response[i].assigned_status==1){
                                var status = 'Assigned';
                            }else{
                                var status = 'Not Assigned';
                            }
                           var j = i+1;
                           // var del = "delete_leads("+response[i].id+","+i+")";
                            $('#table_body').append('<tr class="odd gradeX" id="tr_'+i+'"><td>'+j+'</td><td> <input type="checkbox" name="task_id[]" value="'+response[i].task_id+'" id="task_id" ></td><td><a title="Assign" href="'+assign+'">'+response[i].name+'</a></td><td>'+response[i].created_at+'</td><td><div class="progress"><div class="progress-bar" style="width:'+response[i].percentage+'%">'+response[i].percentage+'%</div></div></td><td class="center"><a title="Edit" href="'+edit+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> ||<a title="Delete" href="javascript:void(0)" onclick="delete_task('+del+','+i+')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> || <a title="Assign" href="'+assign+'"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>');
                            
                            
                        }
                    }
                    }else{
                      $('#table_body').html('');
                     $('#table_body').append('<tr><td colspan="5">No data Found</td></tr>')   
                    }
                    
                },
                error: function() {
                    $('#table_body').html('');
                     $('#table_body').append('<tr><td colspan="5">No data Found</td></tr>')
                   // alert('Something went wrong please try again later');
                }
        });
    }
        
        function multiple_assign(){
        var role         = $('#role').val(); 
        if(role=='admin'){
            var assigned_to = $('#admin_id').val();
        }else{
            var assigned_to = $('#staff_id').val();
        }
            var task_id  = $("input[name='task_id[]']:checked")
              .map(function(){return $(this).val();}).get();
        
        if(task_id ==''){
            alert('Please Select Check Box First');
            return false;
        }
        if(assigned_to==''){
            alert('Please Select "'+role+'" To Assign');
            return false;
        }


        $.ajax({
                url: "<?php echo base_url('superadmin/multiple_task_assigned')?>",
                method: "POST",
                dataType: "json",
                data: {
                    task_id: task_id,
                    assigned_to   : assigned_to,
                    role     :role
                },
                success: function(response) {
                 
                     location.reload();
                    
                },
                error: function() {
                   //    $('#table_body').html('');
                    // $('#table_body').append('<tr><td colspan="5">No data Found</td></tr>')
                    alert('Something went wrong please try again later');
                }
        });
    }
</script>