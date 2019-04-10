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
            <h1 class="page-header">Assign Task List </h1>
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
                
              <!--   <div class="filter">
                    <div class="row">
                       

                        <div class="col-xs-5 col-sm-1"><p>Role</p></div>
                        <div class="col-xs-7 col-sm-2 form-group">
                            <select class="form-control" name="role" id="role">
                                <option value="">Select Role</option>
                                <option value="2">Admin</option>
                                <option value="3">Staff</option>
                               
                                
                            </select>
                        </div>

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
                </div> -->
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" cellspacing="0" width="100%" id="appointment">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sr. no</th>
                                    <th>Assigned To</th>
                                    <th>User Name</th>
                                    <th>Task Name</th>
                                    <th>url</th>
                                    <th>Time</th>
                                    <th>Description</th>
                                    <th>Assigned Date</th>
                                    <th>Status</th>
                                   </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php 
                                $count=1;
                                if(isset($task_history)){
                                foreach ($task_history as  $value) { ?>
                                <?php if($value->status==1 && $value->completed==2){ ?>
                                <tr class="odd gradeX" id="tr_<?php echo $count;?>" style="background: lightgreen">
                                <?php }elseif ($value->status==1 && $value->completed==0) {?>
                                    <tr class="odd gradeX" id="tr_<?php echo $count;?>"style="background: lightblue">
                                <?php }elseif ($value->status==0) { ?>
                                    <tr class="odd gradeX" id="tr_<?php echo $count;?>" style="background: red">
                                <?php  } ?>
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
                                        <?php  echo $value->name;?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $value->url; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->task_days." Days"; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->description; ?>
                                    </td>
                                    <td>
                                        <?php echo $value->created_at; ?>
                                    </td>

                                    <td>
                                        <?php if($value->status==0){
                                            echo "<b>UnCompleted</b>";
                                        }elseif ($value->status==1 && $value->completed==0) {
                                            echo '<b>Working</b>';
                                        }elseif ($value->status==1 && $value->completed==2)  {
                                           echo '<b>Completed</b>';
                                        } ?>
                                    </td>
                                    
                                   </tr>
                                <?php $count++; } }?> </tbody>
                        </table>
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
    $(document).ready(function(){
        $( ".datepicker" ).datepicker();
    });

    function get_data(){
        var start_date = $('#start_date').val();
        var end_date   = $('#end_date').val();
        var role       = $('#role').val();
        
        

        $.ajax({
                url: "<?php echo base_url('superadmin/get_search_data')?>",
                method: "POST",
                dataType: "json",
                data: {

                    start_date  : start_date,
                    end_date    : end_date,
                    role        :role
                },
                success: function(responses) {
                    var response =responses['assigntask'];
                    console.log(response);
                    if(response!=null){
                     if (response.length > 0) {
                         $('#table_body').html('');
                         for (var i = 0; i < response.length; i++) {

                            var edit = "<?php echo base_url('superadmin/assigntask/'); ?>"+response[i].task_id;
                            console.log(edit);
                           

                           
                           if(response[i].assignedto_role_id==2){
                            var assign = 'ADMIN';
                           }else{
                            var assign = 'STAFF';
                           }
                           var j = i+1;
                           // var del = "delete_leads("+response[i].id+","+i+")";
                            $('#table_body').append('<tr class="odd gradeX" id="tr_'+i+'"><td>'+j+'</td><td>'+assign+'</td><td>'+response[i].username+'</td><td>'+response[i].name+'</td><td>'+response[i].url+'</td><td>'+response[i].time+'Days</td><td>'+response[i].Description+'</td><td>'+response[i].created_at+'</td><td class="center"><a title="Edit" href="'+edit+'"><i class=" fa fa-eye" aria-hidden="true"></i></a></td></tr>');
                            
                            
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
// function updateStatus(id, active) {
//     if (active == 0) {
//         data = 1;
//     } else {
//         data = 0;
//     }
//     swal({
//         title: "Are you sure?",
//         text: "You want to Change Status?",
//         type: "warning",
//         showCancelButton: true,
//         closeOnConfirm: false,
//         confirmButtonText: "Yes, Change it!",
//         confirmButtonColor: "#ec6c62"
//     }, function() {
//         $.ajax({
//             url: "<?php //secho base_url('admin/update_status')?>",
//             data: {
//                 id: id,
//                 active: data,
//             },
//             type: "POST"
//         }).done(function(data) {
//             swal("Changed!", "Status was successfully changed!", "success");
//              window.location.reload();
//         });
//     });
// }
</script>