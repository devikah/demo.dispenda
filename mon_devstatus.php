<?php
session_start();
//echo $_SESSION['long'];
if(!empty ($_SESSION['long']))
{
	$long=$_SESSION['long'];
	$lat=$_SESSION['lat'];
	$zoom="13";
}else
{
    $long="107.304937";
    $lat="-6.304427";
	$zoom="13";
	$status="";    
}

if(!empty ($_SESSION['status']))
{
	$status=$_SESSION['status'];
	$zoom="11";
}

require ("secure.php");
include "koneksi.php";
$state=array();
//$query = "SELECT status,count(*) as jumlah FROM data_gis group by status";
$query = "SELECT b.id_status,a.jumlah FROM status b LEFT JOIN (SELECT data_gis.status,count(*) as jumlah FROM data_gis group by data_gis.status) a on b.id_status=a.status";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result)) {
	$state[]=$row["jumlah"];
}
mysql_free_result($result);

      
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tax Monitoring System | Dashboard </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    
	
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
	
	<!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script> 
	<script src="js/jquery.searchFilter.js" type="text/javascript"></script>

	<!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">


	<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

<script type="text/javascript">
var peta;
var pertama = 0;
//var status = "1";
var judulx = new Array();
var desx = new Array();
var i;
var url;
var gambar_tanda;

function peta_awal(){
    var jakarta = new google.maps.LatLng(<?php echo $lat;?>, <?php echo $long;?>);
    var petaoption = {
        zoom: <?php echo $zoom;?>,
        center: jakarta,
		panControl: false,
    
    
     mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    //google.maps.event.addListener(peta,'click',function(event){
      //  kasihtanda(event.latLng);
    //});
    ambildatabase('awal');
	
}




function set_icon(statusnya){
    switch(statusnya){
        case "1":
            gambar_tanda = 'icon/green_.png';
            break;
        case "2":
            gambar_tanda = 'icon/orange_.png';
            break;
        case  "3":
            gambar_tanda = 'icon/red_.png';
            break;
        case  "4":
            gambar_tanda = 'icon/alarm.png';
            break;
    }
}

function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata1.php?akhir=1&status=<?php echo $status;?>";
    }else{
        url = "ambildata1.php?akhir=0&status=<?php echo $status;?>";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
				judulx[i] = msg.wilayah.petak[i].judul;
				desx[i] = msg.wilayah.petak[i].deskripsi;

                set_icon(msg.wilayah.petak[i].status);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

function setstatus(stat){
    status = stat;
}



function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
  		/*
		$( "#dialog" ).dialog({
			autoOpen: false,
			show: {
				effect: "blind",
				duration: 1000
			},
			hide: {
				effect: "explode",
				duration: 1000
			}
		});

		
		$( "#dialog" ).dialog( "open" );
	*/
	  $("#jendelainfo").fadeIn();
        $("#teksjudul").html(judulx[nomor]);		
        $("#teksdes").html(desx[nomor]);
 
 });

  $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
}
</script>

<style type="text/css">
#jendelainfo{position:absolute;z-index:1;top:100;overflow: hidden;left:400px;top:950px;background-color:blue;display:none;}
</style>



</head>

<body onload="peta_awal()">
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
				-->
                </div>
            </div>



<div class="wrapper wrapper-content">
<div class="row">
            <div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> TOTAL </span>
                            <h2 class="font-bold">6</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> OK </span>
                            <h2 class="font-bold">1</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-exclamation fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> WARNING </span>
                            <h2 class="font-bold">0</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-times fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> CRITICAL </span>
                            <h2 class="font-bold">5</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="row">
 <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Status<i> - Realtime Online</i></h5>
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
                       <th>ID</th>
					   <th>WajibPajak</th>
                        <th>Alamat</th>
						<th>Status</th>


                      </tr>
                    </thead>
                    
                    <tfoot>
                      <tr>
                       <th>ID</th>
					   <th>WajibPajak</th>
                        <th>Alamat</th>
						<th>Status</th>

                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            
            </div><!-- /.col -->
          </div><!-- /.row -->
<div class="row">
                <div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Lokasi Perangkat</h5>
                        </div>
                        <div class="ibox-content">

                            <div style="height: 650px; width: 100%;" class="google-map" id="petaku"></div>
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
    
    
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

	

	 <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>
	    <!-- jQuery UI -->
    

   
   
  
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
		dom: 'Br',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ], 	
        "processing": true,
        "serverSide": true,
        "ajax": "scripts/srvproc_status.php"
      } );
	  
      

	  $('#example tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        console.log(data[0]);
      });
     } );
    </script>


<table id="jendelainfo" border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#fff" width="300" height="136">
  <tr>
    <td width="248" bgcolor="#6698FF" height="19">
	<font color='white'><p align="center"><span id="teksjudul"></span></font></td>
    <td width="30" bgcolor="#6698FF" height="19">
    <p align="center"><a style="cursor:pointer;color:#fff;" id="tutup"><b>x</b></a></td>
  </tr>
  <tr>
    <td width="290" bgcolor="#ffffff" height="50" valign="top" colspan="2">
    <p align="left"><span id="teksdes"></span></td>
  </tr>
  
</table>

</body>

</html>
