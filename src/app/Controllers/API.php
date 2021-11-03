<?php

namespace App\Controllers;

class API extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
	}

    /**
	 * Invoice Summary
	 */
    public function getInvoiceSummary()
    {
        $this->response->setHeader('Content-Type', 'application/json');

        $invoiceModel = new \App\Models\Invoice();
        $invoice_summary = $invoiceModel->getInvoiceSummary();
        
        echo json_encode($invoice_summary, 256);
    }

    /**
	 * Data migration
	 */
    public function migration()
    {
        $this->response->setHeader('Content-Type', 'application/json');

        $invoiceModel = new \App\Models\Invoice();
        $result = $invoiceModel->migration();
        
        echo json_encode($result, 256);
    }

}
