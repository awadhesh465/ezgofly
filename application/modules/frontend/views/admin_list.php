<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin List</h1>
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
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('admin/add_admin')?>"><i class="fa fa-th-list">&nbsp;Add Admin </i></a> </div>
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" cellspacing="0" width="100%" id="appointment">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sr. no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    
                                    <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $count=1;
                                if(isset($admin)){
                                foreach ($admin as  $value) { ?>
                                <tr class="odd gradeX" id="tr_<?php echo $count;?>">
                                    <td>
                                        <?php echo $count; ?>
                                    </td>
                                    <td>
                                        <a href="<?php  echo base_url('superadmin/admin_detail/').$value->id;?>"><?php  echo $value->username;?></a>
                                    </td>
                                    <td>
                                        <?php echo $value->email; ?>
                                    </td>
                                    <td>
                                        <?php  if($value->is_active==0){ ?>  <button class="btn btn-danger" onclick="change_status(<?php echo $value->id; ?>,1)">DisApprove</button><?php }else{ ?>
                                        <button class="btn btn-primary" onclick="change_status(<?php echo $value->id; ?>,0)">Approve</button>
                                        <?php } ?>
                                    </td>

                                   
                                    <td class="center">
                                     <a title="Edit" href="<?php echo base_url('superadmin/add_admin/').$value->id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                       <a title="Delete" href="javascript:void(0)" onclick="delete_admin('<?php echo $value->id;?>','<?php echo $count;?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

function delete_admin(id,tr_id) {
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
            url: "<?php echo base_url('superadmin/delete')?>",
            data: {
                id: id,
                table:'users'
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
    function change_status(user_id,status){
       
        var url = "<?php echo base_url('superadmin/change_status')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                user_id: user_id,
                status  : status,
                table   : 'users'
            },
            success: function(result) {
               location.reload();
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