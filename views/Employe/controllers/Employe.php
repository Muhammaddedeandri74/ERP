<?php


class Employe extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("MasterData");
		$this->load->model("Quotation");
		$this->load->model("Request");
		$this->load->model("Counter");
		$this->load->model("Salesinvoice");
		$this->load->model("Auth");
		$date = date("Y-m-d H:i:s");
		$f = $this->session->userdata("data");
		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session != "Session on") {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
	}


	function upload()
	{

		$f["data"] = $this->input->post("long");
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->MasterData->getsalesorder();
		$f["data6"] = $this->MasterData->getitemlocupload();

		$this->load->view("Employe/header");
		$this->load->view("Employe/reportsales", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "upload excel order");
	}

	function uplo()
	{
		$f["data"] = $this->input->post("long");
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->MasterData->getsalesorder();
		$this->load->view("Employe/header");
		$this->load->view("Employe/reportitem", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "upload excel order");
	}

	function uploads($x)
	{
		$f["data"] = $x;
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->MasterData->getsalesorder();
		$f["data6"]  = $this->MasterData->getitemloc();
		$this->load->view("Employe/header");
		$this->load->view("Employe/reportsales", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "upload excel order");
	}

	function cetakpdf()
	{
		$f["title"] = "sales";
		$f["data2"] = $this->MasterData->getsalesorder();
		$f["data"] =  $this->MasterData->getquotationbystatus();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/pdforders");
		$this->load->view("Employe/footer");
	}

	function index()
	{
		$f["start"] = $this->input->get("start");
		$f["finish"] = $this->input->get("finish");
		$f["title"] = "sales";
		$f["data2"] = $this->MasterData->getsalesorderbydate($f["start"], $f["finish"]);
		$f["data3"] =  $this->MasterData->getquotationbydate($f["start"], $f["finish"]);
		$f["data4"] = $this->Salesinvoice->getsalesinvoicebydate($f["start"], $f["finish"]);
		$f["data"] = $this->Counter->getdatacounterorderfinishbydate($f["start"], $f["finish"]);
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardsales");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "dashboard sales order");
	}


	// function salesbook()
	// {
	// 	$f["title"] = "sales";
	// 	$f["data2"] = $this->MasterData->getsalesorder();
	// 	$f["data"] =  $this->MasterData->getquotationbystatus();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/dashboardsalesbook", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "list salesbook");
	// }

	function salesbook()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status = $this->input->post('status');
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
		if (!isset($status)) {
			$status = '';
		}

		$f["title"] = "sales";

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'Employe/salesbook';
		$config['total_rows'] = $this->MasterData->countsalesbook($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 20;
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

		$f["data2"] = $this->MasterData->getsalesbookpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["data"]  =  $this->MasterData->getquotationbystatus();
		$f["pagination"] = $this->pagination->create_links();


		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardsalesbook", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "list salesbook");
	}

	function salesorder()
	{

		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status = $this->input->post('status');
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
		if (!isset($status)) {
			$status = '';
		}


		$f["title"] = "sales";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'Employe/salesorder/';
		$config['total_rows'] = $this->MasterData->countSalesorderNotPending($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 100;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

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

		$f["data"]       =  $this->MasterData->getquotationbystatus();
		$f["data2"]      = $this->MasterData->getsalesorderpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["data3"]      = $this->MasterData->getinvinret();
		$f['pagination'] = $this->pagination->create_links();


		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/SalesOrder");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "pending list");

		// echo $config['per_page'] . " " . $from;
	}

	// function salesorder()
	// {
	// 	$f["title"] = "sales";
	// 	$f["data2"] = $this->MasterData->getsalesorder();
	// 	$f["data"] =  $this->MasterData->getquotationbystatus();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/SalesOrder");
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "list salesorder");
	// }

	// function salesbooks()
	// {
	// 	$f["title"] = "sales";
	// 	$f["data"] = $this->Salesinvoice->getsalesinvoice();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/dashboardsalesbooks", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "list salesbooks");
	// }

	function salesbooks()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status = $this->input->post('status');
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
		if (!isset($status)) {
			$status = '';
		}

		$f["title"] = "sales";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'Employe/salesbooks';
		$config['total_rows'] = $this->Salesinvoice->countsalesbooks($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

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
		$f["data"]       = $this->Salesinvoice->salesbookspaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["pagination"] = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardsalesbooks", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "list salesbooks");
	}

	function neworder()
	{
		$this->load->model("MasterData");
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->MasterData->getsalesorder();
		$f["data6"] = $this->MasterData->gettypeorder();
		$this->load->view("Employe/NewOrder", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "new order");
	}


	function addquotation()
	{

		$f["title"] = "sales";

		$f["data"] = $this->MasterData->getcustomer();
		$f["data1"] = $this->MasterData->getcurrency();
		$f["data2"] = $this->MasterData->getitem();
		$f["data3"] = $this->MasterData->getpaymentmethod();
		$f["data4"] = $this->MasterData->getquotation();
		$f["data5"] = $this->MasterData->gettypeorder();
		$f["data6"] = $this->MasterData->getcard();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/AddQuotation", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "add quotation");
	}


	// function quotationlist()
	// {
	// 	$f["title"] = "sales";
	// 	$f["data"] = $this->MasterData->getquotation();
	// 	$f["data1"] = $this->MasterData->getcompany();
	// 	$f["data2"] = $this->MasterData->getcard();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/QuotationList");
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "quotation list");
	// }

	function quotationlist()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status = $this->input->post('status');
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
		if (!isset($status)) {
			$status = '';
		}

		$f["title"] = "sales";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config = array();
		$config['base_url']   = base_url() . 'Employe/quotationlist';
		$config['total_rows'] = $this->MasterData->countgetquotation($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

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
		$f["data"]       = $this->MasterData->getquotationpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["data1"] = $this->MasterData->getcompany();
		$f["data2"] = $this->MasterData->getcard();
		$f["data3"]  = $this->MasterData->getcustomer();
		$f["pagination"] = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/QuotationList", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "quotation list");
	}

	function pendinglist()
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
		if (!isset($status)) {
			$status = '';
		}

		$f["title"] = "sales";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'Employe/pendinglist';
		$config['total_rows'] = $this->MasterData->countAllSalesorderPending($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 100;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 1;
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
		$end  = $from + $config["per_page"];
		// INITIALIZE
		$this->pagination->initialize($config);

		$f["data"]       =  $this->MasterData->getquotationbystatus();
		$f["data2"]      = $this->MasterData->getsalesorderpendingpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f['pagination'] = $this->pagination->create_links();


		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/PendingList");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "pending list");
	}

	function cetakquo()
	{

		$f["title"] = "sales";
		$f["data"] = $this->MasterData->getquotation();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/cetakquo");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "cetak quotation");
	}

	function insertquotation()
	{

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$noquo = $this->input->post('noquo');
		$typequo = $this->input->post('typequo');
		$judul = $this->input->post('judul');
		$cust = $this->input->post('cust');
		$cur = $this->input->post('cur');
		$vats = $this->input->post('vats');
		$norek = $this->input->post('norek');
		$paymentmethod = $this->input->post('paymentmethod');
		$delivdate = $this->input->post('delivdate');
		$jasapengirim = $this->input->post('jasapengirim');
		$delivaddr = $this->input->post('delivaddr');
		$moreinfo = $this->input->post('moreinfo');
		$expquo = $this->input->post('expquo');
		$disper = $this->input->post('dispers');
		$disnom = $this->input->post('disnoms');
		$grandtotals = $this->input->post('grandtotals');
		$jmlitem = $this->input->post('jmlitem');
		$iditem = $this->input->post('iditem');
		$nameitem = $this->input->post('nameitem');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('hargajual');
		$disc = $this->input->post('discx');
		$vat = $this->input->post('vat');
		$total = $this->input->post('total');

		$cek = $this->Quotation->addquotation($noquo, $typequo, $judul, $cust, $cur, $vats, $norek, $paymentmethod, $delivdate, $jasapengirim, $delivaddr, $moreinfo, $expquo, $disper, $disnom, $grandtotals, $jmlitem, $iditem, $nameitem, $qty, $harga, $disc, $vat, $total, $iduser);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('Employe/addquotation');
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "insert quotation");
	}


	function editquotation()
	{
		$id = $this->input->get("zzz");
		$f["title"] = "sales";

		$f["data"]  = $this->MasterData->getcustomer();
		$f["data1"] = $this->MasterData->getcurrency();
		$f["data2"] = $this->MasterData->getitem();
		$f["data3"] = $this->MasterData->getpaymentmethod();
		$f["data4"] = $this->Quotation->getdataquotationbyid($id);
		$f["data5"] = $this->MasterData->gettypeorder();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/EditQuotation", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "edit quotation");
	}


	function updatequotation()
	{

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idquo = $this->input->post('idquo');
		$noquo = $this->input->post('noquo');
		$typequo = $this->input->post('typequo');
		$judul = $this->input->post('judul');
		$cust = $this->input->post('cust');
		$cur = $this->input->post('cur');
		$vats = $this->input->post('vats');
		$norek = $this->input->post('norek');
		$paymentmethod = $this->input->post('paymentmethod');
		$delivdate = $this->input->post('delivdate');
		$jasapengirim = $this->input->post('jasapengirim');
		$delivaddr = $this->input->post('delivaddr');
		$moreinfo = $this->input->post('moreinfo');
		$expquo = $this->input->post('expquo');
		$disper = $this->input->post('dispers');
		$disnom = $this->input->post('disnoms');
		$grandtotals = $this->input->post('grandtotals');
		$jmlitem = $this->input->post('jmlitem');
		$iditem = $this->input->post('iditem');
		$nameitem = $this->input->post('nameitem');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('hargajual');
		$disc = $this->input->post('discx');
		$vat = $this->input->post('vat');
		$total = $this->input->post('total');

		$cek = $this->Quotation->editquotation($idquo, $noquo, $typequo, $judul, $cust, $cur, $vats, $norek, $paymentmethod, $delivdate, $jasapengirim, $delivaddr, $moreinfo, $expquo, $disper, $disnom, $grandtotals, $jmlitem, $iditem, $nameitem, $qty, $harga, $disc, $vat, $total, $iduser);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('Employe/editquotation?zzz=' . base64_encode($idquo));
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "save edit quotation");
	}

	function deletequotation()
	{
		$id = $this->input->get("zzz");
		$cek = $this->Quotation->deletequotation($id);
		if ($cek == "Success") {
			redirect('Employe/quotationlist');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			redirect('Employe/editquotation?zzz=' . base64_encode($idquo));
		}
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "delete quotation");
	}


	function uploadAllExcel()
	{
		$fail   = 0;
		$sofail = array();
		$data3  = $this->MasterData->getitem();
		$data5  = $this->MasterData->getsalesorder();
		$data6  = $this->MasterData->getitemloc();
		$data   = $this->input->post("from");

		$d = $this->session->userdata("data");
		$f["iduser"] = $d["iduser"];

		$f["noso"] = "";
		if ($data5 != "Not Found") {
			$f["noso"] = "";
			foreach ($data5 as $key) {
				$f["noso"] = $key["codeso"];
				$f["noso"]++;
			}
		} else {
			$f["noso"] = "SO0001";
		}
		$upload = json_decode(base64_decode($data));

		$idtransaksi = "";
		$transaksi = array();
		foreach ($upload as $key) {
			if ($key->{'ID Transaksi'} != $idtransaksi) {
				array_push($transaksi, $key->{'ID Transaksi'});
				$idtransaksi = $key->{'ID Transaksi'};
			}
		}


		foreach ($transaksi as $key) {
			if ($data5 != "Not Found") {
				foreach ($data5 as $keyx) {

					if ($key == $keyx["nopesanan"]) {
						unset($transaksi[array_search($key, $transaksi)]);
						break;
					}
				}
			}
		}


		$datatransaksi = array();
		$idtrans = $upload[0]->{"ID Transaksi"};
		$f["data"] = array();
		$f["qty"] = 0;
		$f["subtotal"] = 0;
		$f["subtotals"] = 0;
		$longdata = count($upload);
		$start = 1;

		foreach ($upload as $key) {


			if ($idtrans != $key->{"ID Transaksi"}) {


				array_push($datatransaksi, $f);
				$f["noso"]++;
			}

			if ($idtrans == $upload[0]->{"ID Transaksi"}) {
				$ok = 1;


				$f["nopes"] = $key->{"ID Transaksi"};
				$f["datetrans"] = $key->{"Tanggal Transaksi"};
				if (strtolower($key->From) == 'web') {
					$f["typeso"] = '001';
				} else if (strtolower($key->From) == 'tokopedia') {
					$f["typeso"] = '002';
				} else if (strtolower($key->From) == 'shopee') {
					$f["typeso"] = '003';
				} else {
					$f["typeso"] = '004';
				}

				if (isset($key->{"Kode Pos Pembeli"})) {
					$f["address"] = $key->{"Alamat Pembeli"} . ',' . $key->{"Kecamatan Pembeli"} . ',' . $key->{"Kota Pembeli"} . ',' . $key->{"Propinsi Pembeli"} . ',' . $key->{"Kode Pos Pembeli"};
				} else {
					if (isset($key->{"Alamat Pembeli"})) {
						$f["address"] = $key->{"Alamat Pembeli"};
					} else {
						$f["address"] = "";
					}
				}
				if (isset($key->{"HP Pembeli"})) {
					$idcust =  $this->getcust($key->Pembeli, $f["address"], $key->{"HP Pembeli"});
					$f["idcust"] = $idcust;
					$f["nocust"] = $key->{"HP Pembeli"};
				} else {
					$idcust = $this->getcust($key->Pembeli, $f["address"], "0");
					$f["idcust"] = $idcust;
					$f["nocust"] = 0;
				}
				$f["namecust"] = $key->Pembeli;
				$f["delivfee"] = $key->{"Biaya Pengiriman"};
				if (isset($key->{"Tanggal Pengiriman"})) {
					$f["delivdate"] = $key->{"Tanggal Pengiriman"};
				} else {
					$f["delivdate"] = "";
				}

				$f["jasapengirim"] = $key->{"Jasa Pengiriman"};

				if (isset($key->{"Kode Tracking"})) {
					$f["noresi"] = $key->{"Kode Tracking"};
				} else {
					$f["noresi"] = "";
				}
			}

			if ($idtrans != $key->{"ID Transaksi"}) {
				$ok = 1;

				$idtrans = $key->{"ID Transaksi"};
				$f["nopes"] = $key->{"ID Transaksi"};
				$f["datetrans"] = $key->{"Tanggal Transaksi"};
				if (strtolower($key->From) == 'web') {
					$f["typeso"] = '001';
				} else if (strtolower($key->From) == 'tokopedia') {
					$f["typeso"] = '002';
				} else if (strtolower($key->From) == 'shopee') {
					$f["typeso"] = '003';
				} else {
					$f["typeso"] = '004';
				}

				if (isset($key->{"Kode Pos Pembeli"})) {
					$f["address"] = $key->{"Alamat Pembeli"} . ',' . $key->{"Kecamatan Pembeli"} . ',' . $key->{"Kota Pembeli"} . ',' . $key->{"Propinsi Pembeli"} . ',' . $key->{"Kode Pos Pembeli"};
				} else {
					if (isset($key->{"Alamat Pembeli"})) {
						$f["address"] = $key->{"Alamat Pembeli"};
					} else {
						$f["address"] = "";
					}
				}
				if (isset($key->{"HP Pembeli"})) {
					$idcust =  $this->getcust($key->Pembeli, $f["address"], $key->{"HP Pembeli"});
					$f["idcust"] = $idcust;
					$f["nocust"] = $key->{"HP Pembeli"};
				} else {
					$idcust = $this->getcust($key->Pembeli, $f["address"], "0");
					$f["idcust"] = $idcust;
					$f["nocust"] = 0;
				}
				$f["namecust"] = $key->Pembeli;
				$f["delivfee"] = $key->{"Biaya Pengiriman"};
				$f["jasapengirim"] = $key->{"Jasa Pengiriman"};
				if (isset($key->{"Tanggal Pengiriman"})) {
					$f["delivdate"] = $key->{"Tanggal Pengiriman"};
				} else {
					$f["delivdate"] = "";
				}
				if (isset($key->{"Kode Tracking"})) {
					$f["noresi"] = $key->{"Kode Tracking"};
				} else {
					$f["noresi"] = "";
				}

				$f["data"] = array();
				$f["qty"] = 0;
				$f["subtotal"] = 0;
				$f["subtotals"] = 0;
			}




			$idloc = 0;
			foreach ($data6 as $locs) {
				if ($key->{'Propinsi Pembeli'} == $locs["namecomm"]) {
					$idloc = $locs["idcomm"];
				}
			}

			foreach ($data3 as $keyy) {

				$vat = 0;
				$hargabesih = 0;
				if (isset($key->{'VAT'})) {
					// $vat = $key->{'VAT'} / $key->{"Jumlah Produk"};
					$vat = $key->{'VAT'};
					$hargabesih = $key->{"Harga Dibayar"} - $key->{'VAT'};
				} else {
					$hargabesih = $key->{"Harga Dibayar"};
					$vat = 0;
				}

				if (isset($key->SKU) && $key->SKU != '' && $key->SKU == $keyy["sku"]) {

					$f["qty"]++;
					$f["subtotal"] += $key->{"Harga Dibayar"};
					$f["subtotals"] += $key->{"Harga Dibayar"};
					$g["iditemx"] = $keyy["iditem"];
					$g["idwh"] = $keyy["idwh"];
					$g["nameitem"] = $keyy["nameitem"];
					$g["sku"] = $keyy["sku"];
					$g["qtyorder"] = $key->{"Jumlah Produk"};
					$g["qtyready"] = $keyy["qty"] - $key->{"Jumlah Produk"};
					$g["price"] = "";
					// $g["hargaitem"] = $key->{"Harga Dibayar"} - $vat;
					$g["hargaitem"]  = $hargabesih / $key->{"Jumlah Produk"};
					$g["discx"] = 0;
					$g["hargabeli"] = $keyy["pricebuyitem"];
					$g["vat"] = $vat;
					$g["subtotalxx"] = $key->{"Harga Dibayar"};

					array_push($f["data"], $g);
					break;
				} elseif (isset($key->{'Propinsi Pembeli'}) && $key->{'Propinsi Pembeli'} != '') {
					if ($keyy["id_location"] == $idloc && $keyy["nameitem"] == $key->{'Nama Produk'}) {

						$f["qty"]++;
						$f["subtotal"] += $key->{"Harga Dibayar"};
						$f["subtotals"] += $key->{"Harga Dibayar"};
						$g["iditemx"] = $keyy["iditem"];
						$g["idwh"] = $keyy["idwh"];
						$g["nameitem"] = $keyy["nameitem"];
						$g["sku"] = $keyy["sku"];
						$g["qtyorder"] = $key->{"Jumlah Produk"};
						$g["qtyready"] = $keyy["qty"] - $key->{"Jumlah Produk"};
						$g["price"] = "";
						$g["hargaitem"] = $key->{"Harga Dibayar"} - $vat;
						// $g["hargaitem"]  =  $hargabesih  / $key->{"Jumlah Produk"};
						$g["discx"] = 0;
						$g["hargabeli"] = $keyy["pricebuyitem"];
						$g["vat"] = $vat;
						$g["subtotalxx"] = $key->{"Harga Dibayar"};

						array_push($f["data"], $g);
						break;
					} else if ($keyy["nameitem"] == $key->{'Nama Produk'}) {

						$f["qty"]++;
						$f["subtotal"] += $key->{"Harga Dibayar"};
						$f["subtotals"] += $key->{"Harga Dibayar"};
						$g["iditemx"] = $keyy["iditem"];
						$g["idwh"] = $keyy["idwh"];
						$g["nameitem"] = $keyy["nameitem"];
						$g["sku"] = $keyy["sku"];
						$g["qtyorder"] = $key->{"Jumlah Produk"};
						$g["qtyready"] = $keyy["qty"] - $key->{"Jumlah Produk"};
						$g["price"] = "";
						// $g["hargaitem"] = $key->{"Harga Dibayar"} - $vat;
						$g["hargaitem"]  =  $hargabesih / $key->{"Jumlah Produk"};
						$g["discx"] = 0;
						$g["hargabeli"] = $keyy["pricebuyitem"];
						$g["vat"] = $vat;
						$g["subtotalxx"] = $key->{"Harga Dibayar"};

						array_push($f["data"], $g);
						break;
					}
				} else if ($keyy["nameitem"] == $key->{'Nama Produk'}) {

					$f["qty"]++;
					$f["subtotal"] += $key->{"Harga Dibayar"};
					$f["subtotals"] += $key->{"Harga Dibayar"};
					$g["iditemx"] = $keyy["iditem"];
					$g["idwh"] = $keyy["idwh"];
					$g["nameitem"] = $keyy["nameitem"];
					$g["sku"] = $keyy["sku"];
					$g["qtyorder"] = $key->{"Jumlah Produk"};
					$g["qtyready"] = $keyy["qty"] - $key->{"Jumlah Produk"};
					$g["price"] = "";
					// $g["hargaitem"] = $key->{"Harga Dibayar"} - $vat;
					$g["hargaitem"]  =  $hargabesih  / $key->{"Jumlah Produk"};
					$g["discx"] = 0;
					$g["hargabeli"] = $keyy["pricebuyitem"];
					$g["vat"] = $vat;
					$g["subtotalxx"] = $key->{"Harga Dibayar"};

					array_push($f["data"], $g);
					break;
					// } 
				}
			}

			if (count($f["data"]) == 0) {
				$fail++;
				array_push($sofail, $key->{'Nama Produk'});
			}



			if ($start == $longdata) {

				$idtrans = $key->{"ID Transaksi"};
				array_push($datatransaksi, $f);
				$f["noso"]++;
			}
			$start++;
		}


		if ($fail == 0) {
			// print "\n\n----------------------------------------------------\n\n";
			// print_r($datatransaksi);
			$cek = $this->Quotation->insertsalesorderfromexcel($datatransaksi);
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Error Karena Nomor Sales Order Berikut : ' . implode(", ", $sofail) . ' Tidak Ada Item</div>');
		}

		// redirect('Employe/upload?long=' . $data);
		$this->uploads($data);
	}

	function insertsalesorder()
	{
		$f["data5"] = $this->MasterData->getsalesorder();
		$noso = "";
		if ($f["data5"] != "Not Found") {
			$noso = "";
			foreach ($f["data5"] as $key) {
				$noso = $key["codeso"];
				$noso++;
			}
		} else {
			$noso = "SO0001";
		}

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$typeso = $this->input->post("typeso");
		$datetrans = $this->input->post("datetrans");
		if (!isset($datetrans)) {
			$datetrans = date('Y-m-d');
		}
		$idcust = $this->input->post("idcust");
		$from = $this->input->post('from');
		$nopes = $this->input->post("nopes");
		$delivdate = $this->input->post("delivdate");
		$jasapengirim = $this->input->post("jasapengirim");
		$delivaddr =   $this->input->post("delivaddr");
		$delivfee = $this->input->post("delivfee");
		$idcurrency = $this->input->post("idcurrency");
		$paymentmethod = $this->input->post("paymentmethod");
		$disnoms = $this->input->post("disnoms");
		$qty = $this->input->post("qty");
		$subtotals = $this->input->post("subtotals");
		$vatnom = $this->input->post("vatnom");
		$grandtotals = $this->input->post("grandtotals");
		$noresi = $this->input->post("noresi");
		$iditem = $this->input->post("iditemx");
		$idwh = $this->input->post("idwh");
		$nameitem = $this->input->post("nameitemx");
		$sku = $this->input->post("skux");
		$qtyorder = $this->input->post("qtyorderx");
		$qtyready = $this->input->post("qtyready");
		$hargaitem = $this->input->post("hargaitem");
		$hargabeli = $this->input->post("hargabeli");
		$return = $this->input->post("return");
		$vat = $this->input->post("vat");
		$price = $this->input->post("pricex");
		$disc     = $this->input->post("discx");
		$subtotal = $this->input->post("subtotalxx");
		$cek = $this->Quotation->insertsalesorder($iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $jasapengirim, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat, $return, $datetrans);
		print_r($cek);
		if ($from == "") {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			redirect('Employe/salesorder');
		} else {
			// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			// redirect('Employe/upload?long=' . $from);
			$this->uploads($from);
		}
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "add order");
		// print_r($qtyready);
	}


	function insertsalesorderpending()
	{
		$f["data5"] = $this->MasterData->getsalesorder();
		$noso = "";
		if ($f["data5"] != "Not Found") {
			$noso = "";
			foreach ($f["data5"] as $key) {
				$noso = $key["codeso"];
				$noso++;
			}
		} else {
			$noso = "SO0001";
		}

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$typeso = $this->input->post("typeso");
		$datetrans = $this->input->post("datetrans");
		if (!isset($datetrans)) {
			$datetrans = date('Y-m-d');
		}
		$idcust = $this->input->post("idcust");
		$from = $this->input->post('from');
		$nopes = $this->input->post("nopes");
		$delivdate = $this->input->post("delivdate");
		$delivaddr = $this->input->post("delivaddr");
		$delivfee = $this->input->post("delivfee");
		$idcurrency = $this->input->post("idcurrency");
		$paymentmethod = $this->input->post("paymentmethod");
		$disnoms = $this->input->post("disnoms");
		$qty = $this->input->post("qty");
		$subtotals = $this->input->post("subtotals");
		$vatnom = $this->input->post("vatnom");
		$grandtotals = $this->input->post("grandtotals");
		$noresi = $this->input->post("noresi");
		$iditem = $this->input->post("iditemx");
		$idwh = $this->input->post("idwh");
		$nameitem = $this->input->post("nameitemx");
		$sku = $this->input->post("skux");
		$qtyorder = $this->input->post("qtyorderx");
		$qtyready = $this->input->post("qtyready");
		$hargaitem = $this->input->post("hargaitem");
		$hargabeli = $this->input->post("hargabeli");
		$return = $this->input->post("return");
		$vat = $this->input->post("vat");
		$price = $this->input->post("pricex");
		$disc = $this->input->post("discx");
		$subtotal = $this->input->post("subtotalxx");



		$cek = $this->Quotation->insertsalesorderpending($iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat, $return, $datetrans);

		if ($from == "") {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			redirect('Employe/salesorder');
		} else {
			// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			// redirect('Employe/upload?long=' . $from);
			$this->uploads($from);
		}
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addorder pending");
	}


	function insertsalesorderfromquotation()
	{
		$f["data5"] = $this->MasterData->getsalesorder();
		$noso = "";
		if ($f["data5"] != "Not Found") {
			$noso = "";
			foreach ($f["data5"] as $key) {
				$noso = $key["codeso"];
				$noso++;
			}
		} else {
			$noso = "SO0001";
		}

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idquo = $this->input->post("idquo");
		$typeso = $this->input->post("typeso");
		$idcust = $this->input->post("idcust");

		$nopes = $this->input->post("nopes");
		$delivdate = $this->input->post("delivdate");
		$delivaddr = $this->input->post("delivaddr");
		$delivfee = $this->input->post("delivfee");
		$idcurrency = $this->input->post("idcurrency");
		$paymentmethod = $this->input->post("paymentmethod");
		$disnoms = $this->input->post("disnoms");
		$qty = $this->input->post("qty");
		$subtotals = $this->input->post("subtotals");
		$vatnom = $this->input->post("vatnom");
		$grandtotals = $this->input->post("grandtotals");
		$noresi = $this->input->post("noresi");
		$iditem = $this->input->post("iditemx");
		$idwh = $this->input->post("idwh");
		$nameitem = $this->input->post("nameitemx");
		$sku = $this->input->post("skux");
		$qtyready = $this->input->post("qtyready");
		$qtyorder = $this->input->post("qtyorderx");
		$price = $this->input->post("pricex");
		$disc = $this->input->post("discx");
		$subtotal = $this->input->post("subtotalxx");
		$hargaitem = $this->input->post("hargaitem");
		$hargabeli = $this->input->post("hargabeli");
		$vat = $this->input->post("vat");

		$cek = $this->Quotation->insertsalesorderfromquotation($idquo, $iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $qtyready, $price, $disc, $subtotal, $noresi, $hargabeli, $hargaitem, $vat);

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('Employe/SalesOrder');

		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "add order from quotation");
	}


	function pendinglistold()
	{
		$f["title"] = "sales";
		$f["data2"] = $this->MasterData->getsalesorder();
		$f["data"] =  $this->MasterData->getquotationbystatus();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/PendingList");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "pending list");
	}

	// function pendinglist()
	// {
	// 	$f["title"] = "sales";
	// 	// PAGINATION
	// 	$this->load->library('pagination');

	// 	// CONFIGURATION
	// 	$config['base_url']   = base_url().'Employe/pendinglist';
	// 	$config['total_rows'] = $this->MasterData->countAllSalesorderPending();
	// 	$config['per_page']   = 20;

	// 	// Membuat Style pagination untuk BootStrap v4
	// 	$config['first_link']       = 'First';
	// 	$config['last_link']        = 'Last';
	// 	$config['next_link']        = 'Next';
	// 	$config['prev_link']        = 'Prev';
	// 	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	// 	$config['full_tag_close']   = '</ul></nav></div>';
	// 	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	// 	$config['num_tag_close']    = '</span></li>';
	// 	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	// 	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	// 	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	// 	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['prev_tagl_close']  = '</span>Next</li>';
	// 	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	// 	$config['first_tagl_close'] = '</span></li>';
	// 	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	// 	$config['last_tagl_close']  = '</span></li>';
	// 	$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 	$end = $from + $config["per_page"];
	// 	// INITIALIZE
	// 	$this->pagination->initialize($config);

	// 	$f["data"]       =  $this->MasterData->getquotationbystatus();
	// 	$f["data2"]      = $this->MasterData->getsalesorderpendingpaginate($from, $end);
	// 	$f['pagination'] = $this->pagination->create_links();


	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/PendingList");
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "pending list");
	// }


	function cancelorder()
	{
		$idso = $this->input->post('idso');
		$cek = $this->Quotation->cancelorder($idso);
		echo json_encode($cek);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "cancel order");
	}

	function editsalesorder()
	{
		$idso = $this->input->post('idso');
		$f["from"] = $this->input->post('from');
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->Quotation->getsalesorderbyidso($idso);
		$f["data6"] = $this->MasterData->gettypeorder();
		$this->load->view("Employe/EditSalesOrder", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "edit sales order");
	}

	function updatesalesorder()
	{
		$f["data5"] = $this->MasterData->getsalesorder();


		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$typeso = $this->input->post("typeso");
		$idcust = $this->input->post("idcust");
		$idso = $this->input->post("idso");
		$noso = $this->input->post("noso");

		$nopes = $this->input->post("nopes");
		$noresi = $this->input->post("noresi");
		$delivdate = $this->input->post("delivdate");
		$jasapengirim = $this->input->post("jasapengirim");
		$delivaddr = $this->input->post("delivaddr");
		$delivfee = $this->input->post("delivfee");
		$idcurrency = $this->input->post("idcurrency");
		$paymentmethod = $this->input->post("paymentmethod");
		$disnoms = $this->input->post("disnoms");
		$qty = $this->input->post("qty");
		$subtotals = $this->input->post("subtotals");
		$vatnom = $this->input->post("vatnom");
		$grandtotals = $this->input->post("grandtotals");
		$iditem = $this->input->post("iditemx");
		$idwh = $this->input->post("idwh");
		$hargaitem = $this->input->post("hargaitem");
		$hargabeli = $this->input->post("hargabeli");
		$vat = $this->input->post("vat");
		$nameitem = $this->input->post("nameitemx");
		$sku = $this->input->post("skux");
		$qtyorder = $this->input->post("qtyorderx");
		$price = $this->input->post("pricex");
		$disc = $this->input->post("discx");
		$subtotal = $this->input->post("subtotalxx");
		$notready = $this->input->post("notready");
		if ($notready == 0) {
			$cek = $this->Quotation->updatesalesorder($idso, $iduser, $typeso, $idcust, $noso, $nopes, $delivdate, $jasapengirim, $delivaddr, $delivfee, $idcurrency, $paymentmethod, $disnoms, $qty, $subtotals, $vatnom, $grandtotals, $iditem, $idwh, $nameitem, $sku, $qtyorder, $price, $disc, $subtotal, $noresi, $hargaitem, $hargabeli, $vat);
		} else {
			$cek = "Stock Item Masih ada yang kurang akan masuk Pending List";
		}


		// echo $noresi;

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('Employe/salesorder');
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "save edit sales order");
	}


	function SalesOrderFromquotation()
	{
		$idquo = $this->input->get("zzz");
		$f["title"] = "sales";
		$f["data1"] = $this->MasterData->getcustomer();
		$f["data2"] = $this->MasterData->getcurrency();
		$f["data3"] = $this->MasterData->getitem();
		$f["data4"] = $this->MasterData->getpaymentmethod();
		$f["data5"] = $this->MasterData->getsalesorder();
		$f["data6"] = $this->Quotation->getdataquotationbyid($idquo);
		$f["data7"] = $this->MasterData->gettypeorder();
		$this->load->view("Employe/NewOrders", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Sales Order From Quotation");
	}


	function cekcust()
	{
		$f["data"] = $this->MasterData->getcustomer();
		$idnew;
		if ($f["data"] != "Not Found") {
			foreach ($f["data"] as $key) {
				$idnew = $key["codecomm"];
				$idnew++;
			}
		} else {
			$idnew = "CR0001";
		}
		$name = $this->input->post("name");
		$delivaddr = $this->input->post("delivaddr");
		$nocust = $this->input->post("nocust");
		$cek = $this->MasterData->ceknameuser($name, $delivaddr, $nocust, $idnew);

		echo json_encode($cek);
	}

	function getcust($x, $y, $z)
	{
		$f["data"] = $this->MasterData->getcustomer();
		$idnew;
		if ($f["data"] != "Not Found") {
			foreach ($f["data"] as $key) {
				$idnew = $key["codecomm"];
				$idnew++;
			}
		} else {
			$idnew = "CR0001";
		}
		$name = $x;
		$delivaddr = $y;
		$nocust = $z;
		$cek = $this->MasterData->ceknameuser($name, $delivaddr, $nocust, $idnew);

		return $cek;
	}
}
