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
            <h1 class="page-header">Post List </h1>
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
                <div class="panel-heading"> <a class="btn btn-primary" href="<?php echo base_url('admin/post') ?>"><i class="fa fa-th-list">&nbsp;Add Post </i></a> </div>
                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered display nowrap" cellspacing="0" width="100%" id="appointment">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Sr. no</th>
                                    <th>Category</th>
                                    <th>Post </th>
                                    <th>User Name</th>
                                    <th>File</th>
                                    <th>Action</th>
                                   </tr>
                            </thead>
                            <tbody id="table_body">
                                <?php 
                                $count=1;
                                if(isset($post_list) && !empty($post_list)){
                                foreach ($post_list as  $value) { ?>
                                <tr class="odd gradeX" id="tr_<?php echo $count;?>">
                                        <td>
                                            <?php echo $count; ?>
                                        </td>
                                        <td>
                                            <?php  echo $value->category_name;?>
                                        </td>
                                        <td>
                                            <?php echo $value->title; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->user_name; ?>
                                        </td>
                                        <td>
                                            <?php 
                                            $image =  array('gif','png' ,'jpg','jpeg');
                                            $video =  array('mp4','webm');
                                            if(in_array($value->media_filetype,$image) ) { ?>
                                                <img src="<?php echo base_url('asset/uploads/post/').$value->media_file ?>" height="50px;" width="50px;">
                                            <?php }else if(in_array($value->media_filetype,$video)){?>
                                                <iframe src="<?php echo base_url('asset/uploads/post/').$value->media_file ?>"></iframe>
                                            <?php } ?>
                                        </td>
                                        <td>
                                          <a title="edit" href="<?php echo base_url('admin/post/').$value->post_id; ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a title="Delete" href="javascript:void(0)" onclick="delete_post('<?php echo $value->post_id;?>','<?php echo $count;?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>  
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
    $(document).ready(function(){
        $( ".datepicker" ).datepicker();
    });

    $('#appointment').DataTable({
        responsive: true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });

function delete_post(id,tr_id) {
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
            url: "<?php echo base_url('admin/delete_new')?>",
            data: {
                id: id,
                table:'post',
                column:'post_id'
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
                url: "<?php echo base_url('admin/get_search_task')?>",
                method: "POST",
                dataType: "json",
                data: {

                    start_date  : start_date,
                    end_date    : end_date
                  
                },
                success: function(responses) {
                    var response =responses['tasklist'];
                    //console.log(response);
                    if(response!=null){
                     if (response.length > 0) {
                         $('#table_body').html('');
                         for (var i = 0; i < response.length; i++) {

                            
                           
                            
                            var edit = "<?php echo base_url('admin/assigntask/'); ?>"+response[i].assigned_id;
                          

                            
                           var j = i+1;
                           // var del = "delete_leads("+response[i].id+","+i+")";
                            $('#table_body').append('<tr class="odd gradeX" id="tr_'+i+'"><td>'+j+'</td><td>'+response[i].name+'</td><td>'+response[i].url+'</td><td>'+response[i].description+'</td><td class="center"><a title="View" href="'+edit+'"><i class="fa fa-eye" aria-hidden="true"></i></a></td></tr>');
                            
                            
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
</script>