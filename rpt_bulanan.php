<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Tax | Laporan Bulanan</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">  

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href="css/plugins/jqGrid/ui.jqgrid.css" rel="stylesheet">    

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
    .ui-datepicker-calendar {
        display: none;
    }
    </style>


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
                        <strong>Laporan Harian</strong>
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

        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Filter</h5>
                        </div>
                        <div class="ibox-content">

                                <form role="form" class="form-inline">

                                    <div class="form-group">

                                        <div class="input-group">
                                            <select data-placeholder="Pilih Wajib Pajak..." class="chosen-select" multiple style="width:350px;" tabindex="4" name="merchant" id="merchant">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="data_5">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="form-control start date-picker" name="start" id="start"/>
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control end date-picker" name="end" id="end"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" id="go" name="go"><strong>Go</strong></button>
                                    </div>
                                </form>


                        </div>
                    </div>

                </div>
 
            </div> <!-- row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5></h5>
                        </div>
                        <div class="ibox-content">
                            <table id="list"></table>
                            <div id="pager"></div>                            
                        </div>
                    </div>

                </div>
 
            </div> <!-- row -->            
            <div class="row">

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5></h5>
                        </div>
                        <div class="ibox-content">
                             <div id="graph-container">
                                <canvas id="barChart" height="140"></canvas>
                            </div>                          
                        </div>
                    </div>

                </div>
 
            </div> <!-- row -->             
        </div>
       <?php
include "footer.php";
?>

        </div>
                    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>


    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- jqGrid -->
    <script src="js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="js/plugins/jqGrid/jquery.jqGrid.min.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>    

    <script>
        $(document).ready(function(){
            // initialize date range
            var date = new Date();
            date.setDate(date.getDate() - 1);
            document.getElementById("start").value = ( '0' + (date.getMonth() + 1)).slice(-2) +  '/' +  date.getFullYear();

            date = new Date();
            document.getElementById("end").value = ( '0' + (date.getMonth() + 1)).slice(-2) +  '/' +  date.getFullYear();


            var barData;
            var ctx = document.getElementById("barChart").getContext("2d");            
            //var myNewChart = new Chart(ctx);    

            var barOptions = {
                    scaleBeginAtZero: true,
                    scaleShowGridLines: true,
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleGridLineWidth: 1,
                    barShowStroke: true,
                    barStrokeWidth: 2,
                    barValueSpacing: 5,
                    barDatasetSpacing: 1,
                    responsive: true,
                    scaleLabel:
                    function(label){return  label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");},
                    tooltipTemplate : function (label) {return label.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");}
                }   

            var myBarChart;// = new Chart(ctx).Bar(barData,barOptions);
            
            window.myBar = myBarChart;

            var resetCanvas = function () {
                  $('#barChart').remove(); // this is my <canvas> element
                  $('#graph-container').append('<canvas id="barChart" name="barChart"><canvas>');
                  ctx = document.getElementById("barChart").getContext("2d");                             
            };


            function firstgenerateChartData() {
                $.ajax({
                  method:'POST',
                  dataType: "json",
                  data: {'start': start.value, 'end': end.value, 'merchant': getSelectedMerchant(), 'oper': 'r-group-monthmerchant'},
                  url:'crud_struk.php',
                  success:function(data) {     
                      barData = data;      
                      myBarChart = new Chart(ctx).Bar(barData,barOptions);
                      window.myBar = myBarChart;
                  }
                });                 
            }

            firstgenerateChartData();

            function merchantOption(){
                $('#merchant').append("<option value=\"all\">All</option>");
                $('#merchant').trigger("chosen:updated");

                $.ajax({
                  method:'POST',
                  dataType: "json",
                  data: {'oper': 'select-option'},
                  url:'crud_merchant.php',
                  success:function(data) {     
                        $.each(data, function (key, value) {
                             $('#merchant').append("<option value=\""+value['id']+"\">"+ value['merchantname']+"</option>");
                             $('#merchant').trigger("chosen:updated");
                        });
                  }
                }); 
            }            

            var createGrid= function() {

                $("#list").jqGrid({
                    url: "data_rpt_bulanan.php",
                    datatype: "xml",
                    mtype: "GET",
                    autowidth: true,
                    shrinkToFit: true,
                    height:400,
                    postData: {
                        'merchant': function() { return getSelectedMerchant();},
                        'start': function() { return start.value;},
                        'end': function() { return end.value}
                    },
                    colNames: ["Wajib Pajak", "NOPD", "Tanggal Transaksi", "Pajak","Invoice"],
                    colModel: [
                      { name: "merchantname", width: 80, align: "Left" },
                      { name: "deviceid", index: "deviceid", width: 60},
                      { name: "tgltransaksi", index: "tgltransaksi", width: 60},            
                      { name: "pajak", width: 30, align: "right", formatter: 'number', summaryType:'sum'},
                      { name: "invoice", width: 30, align: "center", 
                        formatter: function (cellvalue, options, rowObject) {
                            //return '<a style="text-decoration: underline" href="invoice_report_wp.php?' + cellvalue + '" onclick="alert(\'me\');"><img width="40" src="images/iconInvoice.jpeg"></a>';      
                        return '<a style="text-decoration: underline" href="#" onclick="window.open(\'invoice_report_wp.php?p=' + cellvalue + '\')"><img width="30" src="img/pdf_file1.png"></a>';
                      }}      

                    ],
                    pager: "#pager",
                    rowNum: 300,
                    rowList: [20, 40, 60],
                    sortname: "tgltransaksi",
                    sortorder: "desc",
                    viewrecords: true,
                    gridview: true,
                    autoencode: true,
                    caption: 'Laporan per Wajib Pajak',
                    grouping: true,
                    groupingView : {
                        groupField : ['merchantname','deviceid'],
                        groupColumnShow : [true,true],
                        groupText : ['<b>{0}</b>'],
                        groupCollapse : false,
                        groupOrder: ['asc','asc'],
                        groupSummary : [true,true],
                        showSummaryOnHide: true,
                        groupDataSorted : true
                    },
                    footerrow : true,
                    userDataOnFooter : true,
                    //hidegrid: false                    
                }); 

               jQuery("#list").jqGrid('navGrid','#pager',{edit:false,refresh:true,search:false,add:false,del:false})
                  .navButtonAdd('#pager',{
                                caption: "Export to Excel",
                                buttonicon: "ui-icon-save",
                                onClickButton: function() {
                                     //alert("here");
                                     window.open("xls_month_wp.php" + "?merchantid=" + getSelectedMerchant() + "&tanggal1=" + datepicker1.value + "&tanggal2=" + datepicker2.value, '_blank');
                                     //$.get("http://192.168.12.41/tms/simplebanget.php",{}, function (){
                                      //    alert("here2");
                                     //});
                                },
                                position:"last"
                            });

                $("#go").click(function(e) {
                    //$("#list").jqGrid('GridUnload');
                    e.preventDefault();
                    var user_select = merchant.value;                   

                    if (user_select == "") {
                       alert("Maaf, silahkan pilih salah satu wajib pajak.");
                    } else {
                    
                    jQuery("#list").jqGrid("clearGridData");
                    jQuery("#list").jqGrid("setGridParam", {datatype: "xml"})
                           .trigger("reloadGrid",[{page:1}]);
                    }

                    $.ajax({
                      method:'POST',
                      dataType: "json",
                      data: {'start': start.value, 'end': end.value, 'merchant': getSelectedMerchant(), 'oper': 'r-group-monthmerchant'},
                      url:'crud_struk.php',
                      success:function(data) {     
                          barData = data;      
                          resetCanvas();
                          myBarChart = undefined;
                          myBarChart = new Chart(ctx).Bar(barData,barOptions);
                          window.myBar = myBarChart;
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            console.log("Status: " + textStatus + " Error: " + errorThrown); 
                        }        

                    });                        
                    
                });     


            }            

            $(function() {
            //  $( "#datepicker1" ).datepicker({ dateFormat: "mm/yy" });
              $('.start').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                format: 'mm/yyyy'
              }).focus(function() {
                var thisCalendar = $(this);
                $('.ui-datepicker-calendar').detach();
                $('.ui-datepicker-close').click(function() {
                   var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                   var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                   thisCalendar.datepicker('setDate', new Date(year, month, 1));
                });
              });
            });

            //});
            $(function() {
            //    $( "#datepicker2" ).datepicker({ dateFormat: "mm/yy" });
              $('.end').datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                format: 'mm/yyyy'
              }).focus(function() {
                var thisCalendar = $(this);
                $('.ui-datepicker-calendar').detach();
                $('.ui-datepicker-close').click(function() {
                   var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                   var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                   thisCalendar.datepicker('setDate', new Date(year, month, 1));
                });
              });
            });
    /*
            $(function() {
                $('.date-picker').datepicker( {
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM yy',
                    onClose: function(dateText, inst) { 
                        $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                    }
                });
            });*/

        

            // initialize date range - END

            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

            merchantOption();

            $("#merchant").chosen().change(function(e, params){
                checkSelectedMerchant();
            });


            // Draw First load Grid
            createGrid();

            function getSelectedMerchant() {
                if ($("#merchant").chosen().val()==null) {
                    return 'all';
                } else {
                    return $("#merchant").chosen().val().toString();
                }
            }

            function checkSelectedMerchant() {
                if ( $("#merchant").chosen().val() != null ) {
                    if ( $("#merchant").chosen().val().indexOf("all") != -1 ) {
                       $("#merchant").chosen().val('').trigger("chosen:updated");
                       $("#merchant").chosen().val('all').trigger("chosen:updated");
                    }
                } 
            }
        });

    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.0/form_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 Apr 2015 10:53:15 GMT -->
</html>
