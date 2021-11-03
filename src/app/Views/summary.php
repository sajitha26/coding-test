<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="dashboard, admin, bootstrap admin template, codeigniter, php, php framework, codeigniter 4, php mvc, php codeigniter, best php framework, codeigniter admin, codeigniter dashboard, admin panel template, bootstrap 4 admin template, bootstrap dashboard template"/>

        <!-- Kendo CSS -->
        <link href="<?php echo base_url('assets/plugins/kendo/styles/web/kendo.common-bootstrap.css'); ?>" rel="stylesheet">        
        <link href="<?php echo base_url('assets/plugins/kendo/styles/web/kendo.bootstrap.css'); ?>" rel="stylesheet">   
        <link href="<?php echo base_url('assets/plugins/kendo/styles/web/kendo.bootstrap.mobile.css'); ?>" rel="stylesheet">   

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</head>

    <body class="main-body app sidebar-mini">

    

        <!-- Page -->
        <div class="page">
            <!-- main-content -->
			<div class="main-content app-content">

                <!-- container -->
				<div class="container-fluid">        

                    <h2>Invoice Summary</h2>
                    <div id="grid"></div>

                </div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->

        </div>
		<!-- End Page -->

        <!-- Kendo UI -->
        <script src="<?php echo base_url('assets/plugins/kendo/js/kendo.all.js'); ?>"></script>

        <script>
        $(document).ready(function () {
                dataSource = new kendo.data.DataSource({
                    transport: {
                        read: {
                            url: "/API/getInvoiceSummary",
                            dataType: "json"
                        }
                    },
                    batch: true,
                    pageSize: 5,
                    autoSync: true,
                    schema: {
                        model: {
                            id: "invoice_no",
                            fields: {
                                invoice_date: { editable: false, nullable: true },
                                invoice_no: { type: "string", editable: false },
                                total_amount_net: { type: "number", editable: false },
                                total_amount_gst: { type: "number", editable: false },           
                                client_id: { type: "number", editable: false }, 
                                contract_count: { type: "number", editable: false },                 
                            }
                        }
                    }
                });

            $("#grid").kendoGrid({
                dataSource: dataSource,
                pageable: true,
                sortable: true,
                filterable: true,
                //reorderable: true,
                //groupable: true,
                toolbar: ["search"],
                columns: [
                    {
                        field: "invoice_date",
                        title: "Invoice Date",
                        width: 100
                    },
                    {
                        field: "invoice_no",
                        title: "Invoice Number",
                        template: "<a href='/invoice/view_invoice/#= invoice_no#' >#= invoice_no#</a>",
                        width: 200
                    }, 
                    {
                        field: "total_amount_net",
                        title: "Total Amount Net",
                        format: "{0:c2}",
                        width: 100
                    }, 
                    {
                        field: "total_amount_gst",
                        title: "Total Amount GST",
                        format: "{0:c2}",
                        width: 150
                    }, 
                    {
                        field: "client_id",
                        title: "Client ID",
                        width: 130,
                    }, 
                    {
                        field: "contract_count",
                        title: "Contract Count",
                        width: 100,
                    },
                    /*{ command: "destroy", title: "&nbsp;", width: 120 },*/
                ],
            });
        });

    </script>

    </body>
</html>