<?php
include "init_dbconnection.php";
$wkrst=mysql_query($mysqli,"SELECT sum(jumlahstruk) as jumlah FROM dataseminggu");
while ($rws = mysql_fetch_array($wkrst)) {
	$wkupdate=$rws[0];
}
mysql_free_result($wkrst);


/* Open connection MySQL database. */
$mysqli = new mysqli("localhost", "batam", "batam2016", "taxdb");
     
 /* Check the connection. */
 if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
  }
     
 /* Fetch result set from t_test table */
$dataku=mysqli_query($mysqli,"SELECT * FROM dataseminggu");



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tax Monitoring System | Dashboard </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">	
<?php
include "navi.php";
?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>TAX MONITORING SYSTEM</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="main.php">Home</a>
                        </li>
                        <li class="active">
                            <strong>DASHBOARD</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
				<!--
                    <div class="title-action">
					<small>Didukung oleh</small>
                        <img alt="image" src="img/Logo-Bank-Riau-Kepri-transparent-bg.png" width='280' height='50' align='center'/>
                    </div>
                </div>
				-->
            </div>



            <div class="wrapper wrapper-content">

			<div class="row">
        <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Data Transaksi Masuk - <i>Live Traffic</i></h5>
						
						
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                  <table id="example" class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                      <tr>
                       <th>DeviceID</th>
					   <th>WajibPajak</th>
                        <th>NoStruk</th>
						<th>TglTransaksi</th>
                        <th>Jumlah</th>
			<th>Pajak</th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr>
                       <th>DeviceID</th>
					   <th>WajibPajak</th>
                        <th>NoStruk</th>
						<th>TglTransaksi</th>
                        <th>Jumlah</th>
			<th>Pajak</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            
            </div><!-- /.col -->
          </div><!-- /.row -->

<?php
include "init_dbconnection.php";
$qry=mysql_query("SELECT sum(jumlahstruk) as jumlah FROM dataseminggu");
while ($rec = mysql_fetch_array($qry)) {
	$jlh = $rec["jumlah"];
}
mysql_free_result($qry);

$wkrst=mysql_query("SELECT CREATED FROM dataseminggu");
while ($rws = mysql_fetch_array($wkrst)) {
	$wkupdate=$rws["CREATED"];
}
mysql_free_result($wkrst);


$monthly = mysql_query("select sum(round( (select nilai_pajak from kategori where device.kategoriid = id) * struk.jumlah, 0)) as pajak from struk,device where struk.deviceid = device.deviceid and month(`tgltransaksi`)=MONTH( CURRENT_DATE )");
while ($r = mysql_fetch_array($monthly)) {
	$j = $r["pajak"];
}
mysql_free_result($monthly);

$yearly = mysql_query("select sum(round( (select nilai_pajak from kategori where device.kategoriid = id) * struk.jumlah, 0)) as pajak from struk,device where struk.deviceid = device.deviceid and year(`tgltransaksi`)=YEAR( CURRENT_DATE )");
while ($r = mysql_fetch_array($yearly)) {
	$jt = $r["pajak"];
}
mysql_free_result($yearly);

?>
			<div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                    <div>
                                        <span class="pull-right text-right">
                                        <small>Information: <strong></strong></small>
                                            <br/>
                                            Jumlah Wajib Pajak : 3
                                        </span>
                                        <h1 class="m-b-xs">
                                            Data Pajak - <i>weekly</i>
                                        </h1>										
										<h3 class="font-bold no-margins">
                                            <?php echo "Total : Rp. ".number_format($jlh,2,',','.');?> 
                                        </h3>
<br>
                                    </div>
                                <div>
                                    <canvas id="lineChart" height="70"></canvas>
                                </div>
                                <div class="m-t-md">
                                    <small class="pull-right">
                                        <i class="fa fa-clock-o"> </i>
                                        Update on <?php echo $wkupdate;?> 
                                    </small>
                                   <small>
                                       <strong>Catatan:</strong>
                                   </small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                
			<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Bulan Berjalan</span>
                                <h5>Penerimaan Pajak</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"> <?php echo "Rp. ".number_format($j,2,',','.');?> </h1>
  <!--                              <div class="stat-percent font-bold text-success">65% <i class="fa fa-bolt"></i></div>
                                <small> Total</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Tahun Berjalan</span>
                                <h5>Penerimaan Pajak</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo "Rp. ".number_format($jt,2,',','.');?></h1>
             <!--                   <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>Total</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">ONLINE</span>
                                <h5>Jumlah WP Online</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">3</h1>
<!--                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>Total</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">OFFLINE</span>
                                <h5>Jumlah WP</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">-</h1>
                  <!--              <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>Sejak Launching</small> -->
                            </div>
                        </div>
            </div>


        </div>



<!---->
            </div>

<?php
include "footer.php";
?>

        </div>
        </div>

     <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

	<!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

	 <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>
	    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

   <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {

		var myData=[<?php 
		while($info=mysqli_fetch_array($dataku))
        echo '"'.$info['JUMLAHSTRUK'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
		?>];
		<?php
		$data=mysqli_query($mysqli,"SELECT * FROM dataseminggu");
		
		?>
		var myLabels=[<?php 
		while($info=mysqli_fetch_array($data))
        echo '"'.$info['TANGGAL'].'",';		
		?>];
		
		<?php
        /* Close the connection */
        $mysqli->close(); 
        ?>

            var lineData = {
                labels: myLabels,
                datasets: [
                    
                    {
                        label: "Jumlah",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: myData
						//data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
				scaleSteps:100,
				scaleLabel : function(label){return  ' Rp. ' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
                scaleStartValue:0,
                scaleStepWidth:50000,
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
				tooltipTemplate : function (label) {return ' Rp. ' + label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");} 
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        });
    </script>
  

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>



    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

	<script>
      $(document).ready(function() {
        var table = $('#example').DataTable( {
		dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ], 	
		"bSort": true,
		"order": [[ 3, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/server_processing.php"
      } );
	  setInterval( function () {
            table.ajax.reload();
      }, 10000 );
      

	  $('#example tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        console.log(data[0]);
      });
     } );
    </script>
	
	



</body>



</html>
