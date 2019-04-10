<style type="text/css">
    #userActions{
    display: table-cell;
    height: 150px;
    width: 200px;
    vertical-align: middle;
    text-align: center;
    color: #37474F;
    background-color: #FFFFFF;
    border: solid 2px #333333;
    border-radius: 10px;
}
#userActions input{
    width: 150px;
    margin: auto;
}
#imgPrime{ 
    width: 300px;
    height: 300px;
    display: none; }
</style>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Complete Task</h1>
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
                                    <td><?php if(isset($task)){ echo $task[0]->task_days." Days";} ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Assigned To </strong></td>
                                    <td><?php if(isset($task)){ echo $task[0]->username;} ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Current  Status</strong></td>
                                    <td><?php if(isset($task)){ 
                                        switch($task[0]->status){  
                                          case 0 : echo 'Reassigned'; break;  
                                          case 1 : echo 'Working'; break;
                                          case 2 : echo 'Completed'; break;
                                          
                                         }
                                       }
                                     ?></td>
                                </tr>
                            </tbody>
                        </table> 
                        <div class="clearfix"></div>

                        <div class="manage-new-form">
                            <div class="col-md-6">

                             <form role="form" method="post" action="<?php if(!empty($task[0])){ echo base_url('admin/task_assign/'.$task[0]->assigned_id);}?>" class="registration_form1" enctype="multipart/form-data" onsubmit="return check_function()">
                               <div class="first-border">
                               <h2><b>Change Status</b></h2>
                                <div class="form-group col-lg-12">
                                   <label class="col-md-4">Task Status </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="completed" id="role" required="required">
                                            <option value="">Task Status</option>
                                            <option value="2">Completed</option>
                                           <!--  <option value="3">Cancelled</option> -->
                                        </select>
                                        <span>
                                            <?php echo form_error('role'); ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                        <div id="userActions">
                                            <p>Drag &amp; Drop Image</p>
                                            <input type="file" id="fileUpload" />
                                        </div>
                                        <div class="img">
                                            <img id="imgPrime" src="" alt="uploaded image placeholder" />
                                        </div>
                                        <input type="hidden" name="screenshot_image"  id="screenshot_image">
                                    </div>
                                </div>

                                <div class="form-group col-lg-12 text-right">
                                    <button  type="Submit" class="btn btn-primary"  >Submit</button>
                                </div>

                                </div>
                                </form>
                            </div>
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
        
    var src =  document.getElementById('imgPrime')
    .getAttribute('src');
    document.getElementById("screenshot_image").value =src;

    // $('#screenshot_image').val(src);
   // return false;
            
        
    }  


    
/**
// ||||||||||||||||||||||||||||||| \\
//  Global Object $: Generic controls
// ||||||||||||||||||||||||||||||| \\
**/
(function(){
    // http://stackoverflow.com/questions/4083351/what-does-jquery-fn-mean
    var $ = function( elem ){
        if (!(this instanceof $)){
      return new $(elem);
        }
        this.el = document.getElementById( elem );
    };
    window.$ = $;
    $.prototype = {
        onChange : function( callback ){
            this.el.addEventListener('change', callback );
            return this;
        }
    };
})();

/**
// ||||||||||||||||||||||||||||||| \\
//  Drag and Drop code for Upload
// ||||||||||||||||||||||||||||||| \\
**/
var dragdrop = {
    init : function( elem ){
        elem.setAttribute('ondrop', 'dragdrop.drop(event)');
        elem.setAttribute('ondragover', 'dragdrop.drag(event)' );
    },
    drop : function(e){
        e.preventDefault();
        var file = e.dataTransfer.files[0];
        runUpload( file );
    },
    drag : function(e){
        e.preventDefault();
    }
};

/**
// ||||||||||||||||||||||||||||||| \\
//  Code to capture a file (image) 
//  and upload it to the browser
// ||||||||||||||||||||||||||||||| \\
**/
function runUpload( file ) {
    // http://stackoverflow.com/questions/12570834/how-to-preview-image-get-file-size-image-height-and-width-before-upload
    if( file.type === 'image/png'  || 
            file.type === 'image/jpg'  || 
          file.type === 'image/jpeg' ||
            file.type === 'image/gif'  ||
            file.type === 'image/bmp'  ){
        var reader = new FileReader(),
                image = new Image();
        reader.readAsDataURL( file );
        reader.onload = function( _file ){
            $('imgPrime').el.src = _file.target.result;

            $('imgPrime').el.style.display = 'inline';
           
        } // END reader.onload()
    } // END test if file.type === image
}

/**
// ||||||||||||||||||||||||||||||| \\
//  window.onload fun
// ||||||||||||||||||||||||||||||| \\
**/
window.onload = function(){
    if( window.FileReader ){
        // Connect the DIV surrounding the file upload to HTML5 drag and drop calls
        dragdrop.init( $('userActions').el );
        //  Bind the input[type="file"] to the function runUpload()
        $('fileUpload').onChange(function(){ runUpload( this.files[0] ); });
    }else{
        // Report error message if FileReader is unavilable
        var p   = document.createElement( 'p' ),
                msg = document.createTextNode( 'Sorry, your browser does not support FileReader.' );
        p.className = 'error';
        p.appendChild( msg );
        $('userActions').el.innerHTML = '';
        $('userActions').el.appendChild( p );
    }
}; 
</script>