<?php

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
                        <h5>User Management</i></h5>										
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
                               <th>User Name</th>
        					   <th>Level</th>
                              </tr>
                            </thead>      
                            <tfoot>
                              <tr>
                               <th>Actions</th>                                
                               <th>User Name</th>
                               <th>Level</th>
                              </tr>
                            </tfoot>    
                          </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->            
            </div><!-- /.col -->
            </div><!-- /.row -->
          
<!---->
            </div>

            <?php
include "footer.php";
?>

            <div class="modal inmodal" id="customModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-user modal-icon"></i>
                            <h4 class="modal-title">Add New User</h4>
                            <!--<small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                        </div>
                        <div class="modal-body">
                                <form role="form" id="form">
                                    <div class="form-group"><label>Username</label> <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username"></div>
                                    <div class="form-group"><label>Level</label> 
                                        <select class="form-control" name="level" id="level">
                                            <option value="1">Admin</option>
                                            <option value="2">Viewer</option>
                                        </select>
                                    </div>                                    
                                    <div class="form-group"><label>Password</label> <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password"></div>
                                    <div class="form-group"><label>Retype Password</label> <input type="password" placeholder="Retype Your Password" class="form-control" name="repassword" id="repassword"></div>
                                    <!--<div>
                                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
                                    </div>-->
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
            var table = $('#example').DataTable( {
                dom: 'Blfrtip',
                "responsive": true,
                "bAutoWidth": false ,                 
                "bSort": true,
                "order": [[ 1, "asc" ]],
                "processing": true,
                "serverSide": true,
                "ajax": "scripts/server_processing_user.php",
                "aoColumns" : [
                    { sWidth: '15%' },
                    { sWidth: '55%' },
                    { sWidth: '40%' },
                ]                
            } );
            
    	  /*setInterval( function () {
                table.ajax.reload();
          }, 30000 );*/


            $(document).on('click', '.delete-button', function(){
                     
                //var id = $(this).attr('delete-id');
                var obj_id  = $(this).data('id');
                var obj_username = $(this).data('username');

                if (confirm("Are you sure you want to delete '" + obj_username + "'?")){                 
             
                    $.post('crud_user.php', {'id': obj_id, 'oper': 'd'}, 
                      function(data){      
                        console.log(data);
                        table.ajax.reload();
                        //location.reload();
                    }).fail(function() {
                        alert('Unable to delete.');
                    });
             
                }
                     
                return false;
            });

            // Add
            $(document).on('click', '.add-button', function(){

                var modal_content = '<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Username</label> <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username"></div>';
                modal_content += '<div class="form-group"><label>Level</label><select class="form-control" name="level" id="level"><option value="1">Admin</option><option value="2">Viewer</option></select></div>';
                modal_content += '<div class="form-group"><label>Password</label> <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password"></div>';
                modal_content += '<div class="form-group"><label>Retype Password</label> <input type="password" placeholder="Retype Your Password" class="form-control" name="repassword" id="repassword"></div>';
                modal_content += '<input type="hidden" id="obj_id" name="obj_id">';
                modal_content += '</form>';

                $(".modal-title").html("Add User");

                $(".modal-body").html(modal_content);                  
                $("#save-or-update").attr("btn-action","c");

            });

            // Edit 
            $(document).on('click', '.edit-button', function(){

                var modal_content = '<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Username</label> <input type="text" placeholder="Enter Username" class="form-control" name="username" id="username"></div>';
                modal_content += '<div class="form-group"><label>Level</label><select class="form-control" name="level" id="level"><option value="1">Admin</option><option value="2">Viewer</option></select></div>';
                modal_content += '<input type="hidden" id="obj_id" name="obj_id">';
                modal_content += '</form>';

                $(".modal-body").html(modal_content);                  
                $(".modal-title").html("Edit User");

                $("#username").val($(this).data('username'));
                $("#level").val($(this).data('level'));
                $("#obj_id").val($(this).data('id'));                
                $("#save-or-update").attr("btn-action","u");

            });
          
            // Reset Password 
            $(document).on('click', '.resetpassword-button', function(){

                var modal_content = '<form role="form" id="form">';
                modal_content += '<div class="form-group"><label>Password</label> <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password"></div>';
                modal_content += '<div class="form-group"><label>Retype Password</label> <input type="password" placeholder="Retype Your Password" class="form-control" name="repassword" id="repassword"></div>';
                modal_content += '<input type="hidden" id="obj_id" name="obj_id">';
                modal_content += '</form>';

                $(".modal-body").html(modal_content);       
                $(".modal-title").html("Reset Password for " + $(this).data('username') );

                $("#obj_id").val($(this).data('id'));                
                $("#save-or-update").attr("btn-action","upassword");

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
                     username: {
                         required: true,
                         minlength: 3
                     },                 
                     level: {
                         required: true
                     },                        
                     password: {
                        required: true
                     },
                     repassword: {
                        equalTo: "#password"
                     }
                 }
                });          

                if (oper == "c") {
                    postData = {
                        'username': $('#username').val(), 
                        'password': $('#password').val(), 
                        'level': $('#level').val(),
                        'oper': oper
                    };
                } else if ( oper == "u") {
                    postData = {
                        'username': $('#username').val(), 
                        'level': $('#level').val(), 
                        'id': $("#obj_id").val(),
                        'oper': oper
                    };                    
                } else if ( oper == "upassword") {
                    postData = {
                        'password': $('#password').val(), 
                        'id': $("#obj_id").val(),
                        'oper': oper
                    };                    
                }

                if ( $("#form").valid() ) {
                    $.ajax({
                      method:'POST',
                      data: postData,
                      url:'crud_user.php',
                      success:function(data) {     
                        console.log(data);                    
                        if (data.trim() == "user-already-exists") {
                            alert("Username already exists. please try to user another one.")
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
