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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	</head>

    <body class="main-body app sidebar-mini">

    

        <!-- Page -->
        <div class="page">
            <!-- main-content -->
			<div class="main-content app-content">

                <!-- container -->
				<div class="container-fluid">        

                    <h2>Invoice Number: <?php echo $invoice_summary->invoice_no ?></h2>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice Date</th>
                                <th>Client ID</th>
                                <th>Contract ID</th>
                                <th>Description</th>
                                <th class="text-right">Net Amount</th>
                                <th class="text-right">GST</th>
                                <th class="text-right">Gross Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        foreach($invoice_items as $line){ 
                            $i++;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $line->invoiced ?></th>
                                <td><?php echo $line->client_id ?></td>
                                <td><?php echo $line->contract_id ?></td>
                                <td><?php echo $line->description ?></td>
                                <td class="text-right"><?php echo '$ '. number_format($line->amount_net, 2, '.', '') ?></td>
                                <td class="text-right"><?php echo '$ '. number_format($line->amount_gst, 2, '.', '') ?></td>
                                <td class="text-right"><?php echo '$ '. number_format($line->amount_gross, 2, '.', '') ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th class="text-right" colspan="6">Net Total</th>
                                <th class="text-right"><?php echo '$ '. number_format($invoice_summary->total_amount_net, 2, '.', '') ?></th>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="6">GST</th>
                                <th class="text-right"><?php echo '$ '. number_format($invoice_summary->total_amount_gst, 2, '.', '') ?></th>
                            </tr>
                            <tr>
                                <th class="text-right" colspan="6">Gross Total</th>
                                <th class="text-right"><?php echo '$ '. number_format($invoice_summary->total_amount_gross, 2, '.', '') ?></th>
                            </tr>
                        </thead>
                    </table>
                    <a href="<?= site_url('/invoice') ?>">Back to Invoices</a>
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
                        template: "<a href='/view_invoice/#= invoice_no#' >#= invoice_no#</a>",
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