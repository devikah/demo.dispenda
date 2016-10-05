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
                            <strong>User</strong>
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
                        <h5>Device Management</i></h5>										
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
                               <th>Device ID</th>
        					   <th>Device Alias</th>
                               <th>Wajib Pajak</th>
                               <th>Kategori</th>
                               <th>Address</th>                               
                              </tr>
                            </thead>      
                            <tfoot>
                              <tr>
                               <th>Actions</th>                                
                               <th>Device ID</th>
                               <th>Device Alias</th>
                               <th>Wajib Pajak</th>
                               <th>Kategori</th>
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
                    <strong>Copyright</strong> E-Tax &copy; 2016
                </div>
            </div>

            <div class="modal inmodal" id="customModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-tablet modal-icon"></i>
                            <h4 class="modal-title">Add New Device</h4>
                            <!--<small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                        </div>
                        <div class="modal-body">
                                <form role="form" id="form">
                                    <div class="form-group"><label>Device ID</label> <input type="text" placeholder="Enter Device ID" class="form-control" name="deviceid" id="deviceid"></div>
                                    <div class="form-group"><label>Device Alias</label> <input type="text" placeholder="Enter Device Alias" class="form-control" name="msisdn" id="msisdn"></div>
                                    <div class="form-group"><label>Wajib Pajak</label> 
                                        <select class="form-control" name="wpname" id="wpname">
                                            <option value="1">Admin</option>
                                            <option value="2">Viewer</option>
                                        </select>
                                    </div>                                    
                                    <div class="form-group"><label>Kategori Pajak</label> 
                                        <select class="form-control" name="kategori" id="kategori">
                                            <option value="1">Admin</option>
                                            <option value="2">Viewer</option>
                                        </select>
                                    </div>                                    
                                    <div class="form-group"><label>Adress</label> 
                                        <textarea class="form-control" id="adress" name="address" rows="3">
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
                "ajax": "scripts/server_processing_device.php",
            } );
            // DataTable END//

            function merchantOption(valueSelected){

                valueSelected = valueSelected || null;

                $.ajax({
                  method:'POST',
                  dataType: "json",
                  data: {'oper': 'select-option'},
                  url:'crud_merchant.php',
                  success:function(data) {     
                        $.each(data, function (key, value) {
                             selected = false;
                             if ( value['id'] == valueSelected) {
                                selected = true;
                             }
                             $('#wpname')
                                 .append($("<option></option>")
                                            .prop({"value": value['id'],"selected": selected})
                                            .text(value['merchantname']));                            
                        });
                  }
                }); 
            }

            function categoryOption(valueSelected){
                valueSelected = valueSelected || null;
                $.ajax({
                  method:'POST',
                  dataType: "json",
                  data: {'oper': 'select-option'},
                  url:'crud_kategori.php',
                  success:function(data) {     
                        $.each(data, function (key, value) {
                             selected = false;
                             if ( value['id'] == valueSelected) {
                                selected = true;
                             }

                             $('#kategori')
                                 .append($("<option></option>")
                                            .prop({"value":value['id'], "selected": selected})
                                            .text(value['kategori_name']));                            

                        });
                  }
                }); 
            }
            $(document).on('click', '.delete-button', function(){
                     
                //var id = $(this).attr('delete-id');
                var obj_id  = $(this).data('id');
                var obj_name = $(this).data('name');

                if (confirm("Are you sure you want to delete '" + obj_name + "'?")){                 
             
                    $.post('crud_device.php', {'id': obj_id, 'oper': 'd'}, 
                      function(data){      

                        table.ajax.reload();
                    }).fail(function() {
                        alert('Unable to delete.');
                    });
             
                }
                     
                return false;
            });


            // Add
            $(document).on('click', '.add-button', function(){
                               
                var modal_content ='<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Device ID</label> <input type="text" placeholder="Enter Device ID" class="form-control" name="deviceid" id="deviceid"></div>';
                modal_content += '<div class="form-group"><label>Device Alias</label> <input type="text" placeholder="Enter Device Alias" class="form-control" name="msisdn" id="msisdn"></div>';
                modal_content += '<div class="form-group"><label>Wajib Pajak</label> <select class="form-control" name="wpname" id="wpname"></select></div>';
                modal_content += '<div class="form-group"><label>Kategori Pajak</label> <select class="form-control" name="kategori" id="kategori"></select></div>';
                modal_content += '<div class="form-group"><label>Adress</label><textarea class="form-control" id="address" name="address" rows="3"></textarea></div>';
                modal_content += '</form>';

                $(".modal-title").html("Add Device");

                $(".modal-body").html(modal_content);                  
                $("#save-or-update").attr("btn-action","c");
                merchantOption();categoryOption();

            });

            // Edit 
            $(document).on('click', '.edit-button', function(){

                var modal_content ='<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Device ID</label> <input type="text" placeholder="Enter Device ID" class="form-control" name="deviceid" id="deviceid"></div>';
                modal_content += '<div class="form-group"><label>Device Alias</label> <input type="text" placeholder="Enter Device Alias" class="form-control" name="msisdn" id="msisdn"></div>';
                modal_content += '<div class="form-group"><label>Wajib Pajak</label> <select class="form-control" name="wpname" id="wpname"></select></div>';
                modal_content += '<div class="form-group"><label>Kategori Pajak</label> <select class="form-control" name="kategori" id="kategori"></select></div>';
                modal_content += '<div class="form-group"><label>Adress</label><textarea class="form-control" id="address" name="address" rows="3"></textarea></div>';
                modal_content += '<input type="hidden" id="obj_id" name="obj_id">';
                modal_content += '</form>';


                //$(".modal-body").html(modal_content);                  
                $(".modal-title").html("Edit Device");
                $(".modal-body").html(modal_content);     

                var row = $(this).data('attr').split(',');
                $("#obj_id").val(row[0]);
                $("#deviceid").val(row[1]);
                $("#msisdn").val(row[2]);
                $("#address").text(row[5]);
                merchantOption(row[6]);
                categoryOption(row[7]);

                $("#save-or-update").attr("btn-action","u");

            });
          

            /*$('#example tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            console.log(data[0]);
            });*/


            
            $('#save-or-update').on('click', function (e) {            
                var oper = $("#save-or-update").attr("btn-action");
                var postData;

                $("#form").validate({
                 rules: {
                     deviceid: {
                         required: true
                     },                 
                     msisdn: {
                         required: true
                     }
                 }
                });          

                if (oper == "c") {
                    postData = {
                        'deviceid': $('#deviceid').val(), 
                        'msisdn': $('#msisdn').val(), 
                        'wpname': $('#wpname').val(),
                        'kategori': $('#kategori').val(),
                        'address': $('#address').val(),
                        'oper': oper
                    };
                } else if ( oper == "u") {
                    postData = {
                        'deviceid': $('#deviceid').val(), 
                        'msisdn': $('#msisdn').val(), 
                        'wpname': $('#wpname').val(),
                        'kategori': $('#kategori').val(),
                        'address': $('#address').val(),
                        'id': $("#obj_id").val(),
                        'oper': oper
                    };                    
                } 

                if ( $("#form").valid() ) {
                    $.ajax({
                      method:'POST',
                      data: postData,
                      url:'crud_device.php',
                      success:function(data) {     
                        console.log(data);                    
                        if (data.trim() == "already-exists") {
                            alert("Device ID already exists. please try to user another one.")
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
