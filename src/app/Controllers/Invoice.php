<?php

namespace App\Controllers;

class Invoice extends BaseController
{

    /**
	 * Display invoice summary details
	 *
	 * @param string|null $code The reset code
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
    public function index()
    {
        $invoiceModel = new \App\Models\Invoice();
        $invoice_summary = $invoiceModel->getInvoiceSummary();
        
        $data = [ 'invoices' => $invoice_summary ];
        return view('summary', $data);
    }

    /**
	 * Display invoice line items with totals
	 *
	 * @param string|null $invoice_no The invoice number
	 *
	 * @return string|\CodeIgniter\HTTP\RedirectResponse
	 */
    public function view_invoice($invoice_no)
    {
        $invoiceModel = new \App\Models\Invoice();
        $invoice_summary = $invoiceModel->getInvoiceSummary($invoice_no);
        $invoice_items = $invoiceModel->getInvoiceItems($invoice_no);
  
        $data = [ 
            'invoice_summary' => $invoice_summary[0],
            'invoice_items' => $invoice_items 
        ];
        return view('details', $data);
    }

    /**
	 * Data migration
	 */
    public function migration()
    {
        return view('migration');
    }


}
