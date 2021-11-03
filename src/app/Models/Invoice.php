<?php

namespace App\Models;

use CodeIgniter\Model;
use \CodeIgniter\Database\ConnectionInterface;
use \CodeIgniter\Database\Query;

class Invoice extends Model
{
	// get invoice summary
	public function getInvoiceSummary(string $invoice_no=''): array
	{
		if ($invoice_no==''){
			$query = $this->db->query("SELECT min(invoiced) as invoice_date
					,invoice_no
					,sum(amount_net) as total_amount_net
					,sum(amount_gst) as total_amount_gst
					,sum(amount_gross) as total_amount_gross
					,client_id
					,count(DISTINCT contract_id) as contract_count 
				FROM invoices 
				GROUP BY invoice_no,client_id 
				ORDER BY invoice_no"
			);
		} else {
			$query = $this->db->query("SELECT min(invoiced) as invoice_date
					,invoice_no
					,sum(amount_net) as total_amount_net
					,sum(amount_gst) as total_amount_gst
					,sum(amount_gross) as total_amount_gross
					,client_id
					,count(DISTINCT contract_id) as contract_count 
				FROM invoices 
				WHERE invoice_no=?
				GROUP BY invoice_no,client_id 
				ORDER BY invoice_no"
			, [$invoice_no]
			);
		}

		if(!$query){
			$error = $this->db->error();
			log_message('debug', $error);
			return [];
		}else{
            return $query->getResult();
		}

	}

	public function getInvoiceItems(string $invoice_no=''): array
	{
		$query = $this->db->query("SELECT invoiced
					,description
					,amount_net
					,amount_gst
					,amount_gross
					,client_id
					,contract_id
				FROM invoices 
				WHERE invoice_no=?
				ORDER BY id"
			, [$invoice_no]
		);

		if(!$query){
			$error = $this->db->error();
			log_message('debug', $error);
			return [];
		}else{
            return $query->getResult();
		}
	}

	public function migration(): array
	{
		$check_query = $this->db->query('SELECT registration FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA=accounts AND TABLE_NAME=invoices');

		if (!$check_query) {
			$alt_query = $this->db->query("ALTER TABLE invoices ADD registration VARCHAR(50) NOT NULL");
		} 

		$query = $this->db->query("UPDATE invoices SET registration=RIGHT(TRIM(description),6) ");

		if (!$query){
			$error = $this->db->error();
			log_message('debug', $error);
			return [];
		} else {
            return array('status'=>1, 'message' => 'Migration completed.');
		}

	}
}

?>