<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php $user_role = $this->session->userdata('user_role');?>
    <!-- /.row -->
    
    <!-- /.row -->

    
</div>
<script type="text/javascript">
    
var ctx = document.getElementById("myChart").getContext('2d');
var completed_task  = $('#completed_task').val();
var new_task  = $('#new_task').val();
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["New Task", "Completed Task"],
        datasets: [{
            label: '# Task Detail',
            data: [new_task,completed_task],
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
</script>

<!-- /#page-wrapper -->