<?php
require '../../init.php';
require '../../session.php';
require_once "../../app/http/session/authanticate.php";
require '../../includes/html/adminheader.php';
require '../../includes/html/adminsidebar.php';
?>
<div class="container-fluid">
      <div class="col-md-3">
        <div class="well  text-center blue"><b><a style="text-decoration:none;color:#fff;pointer:cursor" href="https://blogpostindia.com/view/admin/All-post">posts </a></b><?php echo count(post::find_all());?></div>
      </div>
      <div class="col-md-3">
        <div class="well  text-center red"><b><a style="text-decoration:none;color:#fff;pointer:cursor" href="https://blogpostindia.com/view/admin/drafts">drafts </a></b><?php echo count(draft::find_all());?></div>
      </div>
      <div class="col-md-3">
        <div class="well  text-center yellow"><b>Visits </b><?php echo $handler->visitor_count;?></div>
      </div>
      <div class="col-md-3">
        <div class="well  text-center green"><b><a style="text-decoration:none;color:#fff;pointer:cursor" href="https://blogpostindia.com/view/admin/contactUs"> contact Us </a></b><?php echo count(contact::find_all());?></div>
      </div>
    
    <div id="piechart" class="col-md-8">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'monthly'],
          ['posts',     <?php echo count(post::find_all());?>],
          ['drafts', <?php echo count(draft::find_all());?>], 
          ['Visitors',   <?php echo $handler->visitor_count;?>],
          ['Contact Us',<?php echo count(contact::find_all());?>]
        ]);

        var options = {
          title: 'Dashboard Content',
          is3D: true,
          backgroundColor:"transparent",
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
          <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    </div>
    <div class="col-md-4">
      
    </div>
  </div> 

<?php
require '../../includes/html/adminfooter.php';