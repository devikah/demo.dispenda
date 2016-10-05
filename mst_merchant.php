<?php

$select_merchant='';

$select_kategori='';

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
                            <strong>Merchant</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">

                    <div class="title-action">
<!--
					<small>Didukung oleh</small>
                        <img alt="image" src="img/Logo-Bank-Riau-Kepri-transparent-bg.png" width='280' height='50' align='center'/> 
-->
                    </div>
                </div>
            </div>


            <div class="wrapper wrapper-content">

			<div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Merchant Management</i></h5>										
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
                        <div class="">
                        <a href="#" class="btn btn-outline btn-primary add-button" data-toggle="modal" data-target="#customModal" data-button="add"><i class="fa fa-plus"></i> Add </a>
                        </div>                        
                          <table id="example" class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                              <tr>
                               <th>Actions</th>                                
                               <th>Merchant Name</th>
        					   <th>NPWP</th>
                               <th>Address</th>
                              </tr>
                            </thead>      
                            <tfoot>
                              <tr>
                               <th>Actions</th>                                
                               <th>Merchant Name</th>
                               <th>NPWP</th>
                               <th>Address</th>
                              </tr>
                            </tfoot>    
                          </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->            
            </div><!-- /.col -->
            </div><!-- /.row -->
          
<!---->
            </div>

            <div class="footer">
               
                <div>
                    <strong>Copyright</strong>  Bristol-Tek &copy; 2016
                </div>
            </div>

            <div class="modal inmodal" id="customModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-tablet modal-icon"></i>
                            <h4 class="modal-title">Add New Merchant</h4>
                            <!--<small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                        </div>
                        <div class="modal-body">
                                <form role="form" id="form">
                                    <div class="form-group"><label>Merchant Name</label> <input type="text" placeholder="Enter Merchant Name" class="form-control" name="merchantname" id="merchantname"></div>
                                    <div class="form-group"><label>NPWP</label> <input type="text" placeholder="Enter NPWP" class="form-control" name="npwp" id="npwp"></div>
                                    <div class="form-group"><label>Address</label> 
                                        <textarea class="form-control" id="address" name="address" rows="3">
                                        </textarea>                          
                                    </div>                                          
                                </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save-or-update" btn-action="c">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

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

  
    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

	<script>
      $(document).ready(function() {

            // DataTable //
            var table = $('#example').DataTable( {
                dom: 'Blfrtip',
                "responsive": true,
                "bSort": true,
                "order": [[ 1, "asc" ]],
                "processing": true,
                "serverSide": true,
                "ajax": "scripts/server_processing_merchant.php",
            } );
            // DataTable END//


            $(document).on('click', '.delete-button', function(){
                     
                //var id = $(this).attr('delete-id');
                var obj_id  = $(this).data('id');
                var obj_name = $(this).data('name');

                if (confirm("Are you sure you want to delete '" + obj_name + "'?")){                 
             
                    $.post('crud_merchant.php', {'id': obj_id, 'oper': 'd'}, 
                      function(data){                             

                        if ( data.trim() == "device-still-exists") {
                            alert("Cannot delete selected Merchant.\nPlease make sure all the device from this Merchant are deleted.");
                        } else {
                            table.ajax.reload();
                        }

                    }).fail(function() {
                        alert('Unable to delete.');
                    });
             
                }
                     
                return false;
            });


            // Add
            $(document).on('click', '.add-button', function(){

                var modal_content ='<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Merchant Name</label> <input type="text" placeholder="Enter Merchant Name" class="form-control" name="merchantname" id="merchantname"></div>';
                modal_content += '<div class="form-group"><label>NPWP</label> <input type="text" placeholder="Enter NPWP" class="form-control" name="npwp" id="npwp"></div>';
                modal_content += '<div class="form-group"><label>Adress</label><textarea class="form-control" id="address" name="address" rows="3"></textarea></div>';
                modal_content += '</form>';

                $(".modal-title").html("Add Merchant");

                $(".modal-body").html(modal_content);                  
                $("#save-or-update").attr("btn-action","c");

            });

            // Edit 
            $(document).on('click', '.edit-button', function(){

                var modal_content ='<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Merchant Name</label> <input type="text" placeholder="Enter Merchant Name" class="form-control" name="merchantname" id="merchantname"></div>';
                modal_content += '<div class="form-group"><label>NPWP</label> <input type="text" placeholder="Enter NPWP" class="form-control" name="npwp" id="npwp"></div>';
                modal_content += '<div class="form-group"><label>Adress</label><textarea class="form-control" id="address" name="address" rows="3"></textarea></div>';
                modal_content += '<input type="hidden" id="obj_id" name="obj_id">';
                modal_content += '</form>';

         
                $(".modal-title").html("Edit Merchant");
                $(".modal-body").html(modal_content);     

                var row = $(this).data('attr').split(',');
                $("#obj_id").val(row[0]);
                $("#merchantname").val(row[1]);
                $("#npwp").val(row[2]);
                $("#address").val(row[3]);
                $("#save-or-update").attr("btn-action","u");

            });
          

            $('#save-or-update').on('click', function (e) {   
                e.preventDefault();         
                var oper = $("#save-or-update").attr("btn-action");
                var postData;

                $("#form").validate({
                 rules: {
                     merchantname: {
                         required: true
                     }
                 }
                });          

                if (oper == "c") {
                    postData = {
                        'merchantname': $('#merchantname').val(), 
                        'npwp': $('#npwp').val(), 
                        'address': $('#address').val(),
                        'oper': oper
                    };
                } else if ( oper == "u") {
                    postData = {
                        'merchantname': $('#merchantname').val(), 
                        'npwp': $('#npwp').val(), 
                        'address': $('#address').val(),
                        'id': $("#obj_id").val(),
                        'oper': oper
                    };                    
                } 

                if ( $("#form").valid() ) {
                    $.ajax({
                      method:'POST',
                      data: postData,
                      url:'crud_merchant.php',
                      success:function(data) {     
                        console.log(data);                    
                        if (data.trim() == "already-exists") {
                            alert("Merchant already exists. please try to use another name.");
                        } else {
                            alert('Action Succedeed.');
                            $('#customModal').modal('toggle');
                            table.ajax.reload();
                        }

                      }
                    });                 
                }

            });

        });
    </script>    
	
	



</body>



</html>
