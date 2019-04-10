<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php $user_role = $this->session->userdata('user_role');?>
    <!-- /.row -->
    <div class="row">
       
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-first">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                              <?php echo $admin; ?>
                            </div>
                            <div>Total Admin!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('superadmin/admin_list');?>">
                    <div class="panel-footer">
                        <span class="pull-left">Admin</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                                <?php echo $staff; ?>
                            </div>
                            <div>Total Staff!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('superadmin/staff_list');?>">
                    <div class="panel-footer">
                        <span class="pull-left">Staff</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-first">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                              <?php echo $total_task; ?>
                            </div>
                            <div>Total Task!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('superadmin/task_list/');?>">
                    <div class="panel-footer">
                        <span class="pull-left">Total task</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
    </div>
    <!--  <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-hand-o-right fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                              <?php echo $completed_task; ?>
                            </div>
                            <div>Completed Task!</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url('superadmin/completedtask/');?>">
                    <div class="panel-footer">
                        <span class="pull-left">Completed task</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
    </div> -->


    <span class="min-chart" id="chart-sales" data-percent="56"><span class="percent"></span></span>
    <h5><span class="label green">Sales <i class="fa fa-arrow-circle-up"></i></span></h5>


    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12">
        <canvas id="myChart" style="max-width: 800px;" ></canvas>
        <input type="hidden" name="assigned_task" id="assigned_task" value="<?php echo $assigned_task; ?>">

        <input type="hidden" name="completed_task" id="completed_task" value="<?php echo $completed_task; ?>">
    </div>

      
   
    </div>
    <!-- /.row -->
</div>
<script type="text/javascript">
	
var ctx = document.getElementById("myChart").getContext('2d');
var completed_task  = $('#completed_task').val();
var assigned_task  = $('#assigned_task').val();
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Assigned Task", "Completed Task"],
        datasets: [{
            label: '# Task Report',
            data: [assigned_task,completed_task],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
$(function () {
    $('.min-chart#chart-sales').easyPieChart({
        barColor: "#4caf50",
        onStep: function (10, 20, percent) {
            $(this.el).find('.percent').text(Math.round(percent));
        }
    });
});

</script>

<!-- /#page-wrapper -->