<?php


class SalesinvoiceControler extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model("Auth");
		$date = date("Y-m-d H:i:s");
		$f = $this->session->userdata("data");
		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session != "Session on") {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
		$this->load->model("Salesinvoice");
		$this->load->model("MasterData");
	}

	// function index()
	// {
	// 	$f["title"] = "sales";
	// 	$f["data"] = $this->Salesinvoice->getsalesinvoice();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/Invoice", $f);
	// 	$this->load->view("Employe/footer");
	// }

	function index()
	{

		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status  = $this->input->post('status');
		// echo ($filter . " " . $search);

		if (!isset($search)) {
			$search = '';
		}

		if (!isset($date1)) {
			$date1 = '';
		}
		if (!isset($date2)) {
			$date2 = '';
		}

		$f["title"] = "sales";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'SalesinvoiceControler/index';
		$config['total_rows'] = $this->Salesinvoice->countAllInvoice($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 50;
		$choice               = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$end = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);

		$f["data"]       = $this->Salesinvoice->salesinvoicepaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f['pagination'] = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/Invoice", $f);
		$this->load->view("Employe/footer");
	}

	function updateinvoice()
	{

		$idinv = $this->input->post("idinv");

		$f["title"] = "sales";
		$f["data"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getpaymentmethod();
		$f["data4"] = $this->Salesinvoice->getsalesinvoicebyid($idinv);
		$f["data5"] = $this->MasterData->getcompany();
		$f["data6"] = $this->MasterData->getcard();
		$this->load->view("Employe/header");
		$this->load->view("Employe/UpdateInvoice", $f);
		$this->load->view("Employe/footer");
	}

	function updatedatainvoice()
	{
		$idinv = $this->input->post("idinv");
		$paymentmethod = $this->input->post("paymentmethod");
		$jmlbayar = $this->input->post("jmlbayar");
		$idinvdet = $this->input->post("idinvdet");
		$discdet = $this->input->post("discdet");
		$totalprice = str_replace(".", "", $this->input->post("totalprice"));
		$disnom = $this->input->post("disnom");
		$balance = $this->input->post("balance");



		$cek = $this->Salesinvoice->updateinvoice($idinv, $paymentmethod, $jmlbayar, $balance, $idinvdet, $discdet, $totalprice, $disnom);

		redirect('SalesinvoiceControler');
	}

	function updatebycheck()
	{
		$idinv = $this->input->post("check");
		$cek  = $this->Salesinvoice->updatebychek($idinv);
		redirect('SalesinvoiceControler');
	}
}
