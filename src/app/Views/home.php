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

                    <h2>Welcome to EclipX</h2>
                    
					<p><a href="<?= site_url('/invoice') ?>" class="btn btn-primary">Invoices</a> </p>

					<p><a href="<?= site_url('/invoice/migration') ?>" class="btn btn-primary">Data Migration</a></p>
                </div>
				<!-- Container closed -->

			</div>
			<!-- main-content closed -->

        </div>
		<!-- End Page -->

    

    </body>
</html>