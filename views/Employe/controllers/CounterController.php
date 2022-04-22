<?php

class CounterController extends CI_Controller
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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
		$this->load->model("Counter");
		$this->load->model("MasterData");
		$this->load->model("MInOut");
		$this->load->model("mCommonMaster");
		$this->load->model("MPrQuo");
	}


	function index()
	{
		$f["title"] = "counter";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardwarehouse", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Dashboard Counter");
	}

	// function inout()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdatacounterorderwaiting();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/inout", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Confirm Sales Order List");
	// }

	function inout()
	{
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/inout';
		$config['total_rows'] = $this->Counter->countinout();
		$config['per_page']   = 20;

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

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]           = $this->Counter->getdatacounterorderwaitingpaginate($config['per_page'], $from);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/inout", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Confirm Sales Order List");
	}

	function notifwaiting()
	{
		$notif = $this->db->get_where('tb_salesorder', ['notif' => 0])->result_array();
		for ($i = 0; $i < count($notif); $i++) {
			$data = [
				'notif' => 1
			];
			$this->db->update('tb_salesorder', $data, ['idso' => $notif[$i]['idso']]);
		}
		return redirect(base_url('CounterController/inout'));
	}

	function notifdelivery()
	{
		$notif = $this->db->get_where('tb_salesorder', ['notif' => 1, 'statusorder' => 'Process'])->result_array();

		for ($i = 0; $i < count($notif); $i++) {
			$data = [
				'notif' => 2
			];
			$this->db->update('tb_salesorder', $data, ['idso' => $notif[$i]['idso']]);
		}
		return redirect(base_url('CounterController/deliveryorder'));
	}

	function notifsendterbaru()
	{
		$notif = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();

		for ($i = 0; $i < count($notif); $i++) {
			$data = [
				'notif' => 3
			];
			$this->db->update('tb_salesorder', $data, ['idso' => $notif[$i]['idso']]);
		}
		return redirect(base_url('CounterController/terkirim'));
	}

	function notifsend()
	{
		$notif = $this->db->get_where('tb_salesorder', ['notif' => 2, 'statusorder' => 'Finish'])->result_array();

		for ($i = 0; $i < count($notif); $i++) {
			$data = [
				'notif' => 3
			];
			$this->db->update('tb_salesorder', $data, ['idso' => $notif[$i]['idso']]);
		}
		return redirect(base_url('CounterController/terkirim'));
	}


	// function outgoing()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdatacounterorderoutgoing();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/outgoing", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Outgoing Counter");
	// }
	function ingoing()
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
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/ingoing';
		$config['total_rows'] = $this->Counter->countingoing($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 20;
		$choice               = $config["total_rows"] / $config["per_page"];
		$config['num_links']  = floor($choice);

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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]           = $this->Counter->getdataingoingpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/ingoing", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Ingoing Counter");
	}
	function outgoing()
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

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/outgoing';
		$config['total_rows'] = $this->Counter->countoutgoing($filter, $search, $date1, $date2, $status);
		$config['per_page']   = 20;
		$choice               = $config["total_rows"] / $config["per_page"];
		$config['num_links']  = floor($choice);

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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]           = $this->Counter->getdatacounterorderoutgoingpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/outgoing", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Outgoing Counter");
	}



	// function ingoing()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdataingoing();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/ingoing", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Ingoing Counter");
	// }



	function newinvincounter()
	{

		// $f = $this->session->userdata("data");
		$f["data"]  = "Not Found";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$f["order"] = $this->Counter->getdatacounterorderfinish();
		$this->load->view("xfooter");
		$this->load->view("Employe/addinvincounter", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Ingoing Counter");

		// $this->load->view("Employe/header");
		// $this->load->view("Employe/addinvincounter", $f);
		// $this->load->view("Employe/footer");
		// $f = $this->session->userdata("data");

	}

	// function opname()
	// {
	// 	$f["long"] = json_decode(base64_decode($this->input->post('long')));
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->MasterData->getitem();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/stockopname", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Opname Counter");
	// }

	function opname()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/opname';
		$config['total_rows'] = $this->MasterData->Countgetitempagination();
		// $config['per_page']   = 50;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 2;
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
		// $from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		// get item list
		$f["title"]          = "counter";
		$f["long"] = json_decode(base64_decode($this->input->post('long')));
		$f["data"]           = $this->MasterData->getitemopnamepaginatation($filter, $search);

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();

		// load view
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockopname", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Opname Counter");
	}

	// function report()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getrequest();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/reportcounter", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Report Request Counter");
	// }

	function report()
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
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']         = base_url() . 'CounterController/report';
		$config['total_rows']       = $this->Counter->countreport($filter, $search, $date1, $date2, $status);
		$config['per_page']         = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]        = floor($choice);


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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]             = $this->Counter->getrequestpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["title"]            = "counter";
		$f["pagination"]       = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/reportcounter", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Report Request Counter");
	}

	// function outgoingreport()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdatacounterorderoutgoing();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/reportoutgoing", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Outgoing Report");
	// }

	function outgoingreport()
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

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']         = base_url() . 'CounterController/outgoingreport';
		$config['total_rows']       = $this->Counter->countoutgoingreport($filter, $search, $date1, $date2, $status);
		$config['per_page']         = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]        = floor($choice);

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
		$f["data"]           = $this->Counter->getdataoutgoingreportpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/reportoutgoing", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Outgoing Report");
	}

	// function ingoingreport()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdataingoing();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/reportingoing", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Ingoing Report");
	// }

	function ingoingreport()
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

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/ingoingreport';
		$config['total_rows'] = $this->Counter->countingoingreport($filter, $search, $date1, $date2, $status);
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
		$f["data"]           = $this->Counter->getdataingoingreportpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/reportingoing", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Ingoing Report");
	}


	function konfirmso()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idso = $this->input->post("idso");
		$cek = $this->Counter->konfirmso($idso, $iduser);
		redirect('CounterController/inout');
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Confirm Sales Order");
	}


	// function deliveryorder()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdatacounterorderprocess();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/terbaru", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Delivery Order List");
	// }

	function deliveryorder()
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

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/deliveryorder';
		$config['total_rows'] = $this->Counter->countcounterorderprocess($filter, $search, $date1, $date2);
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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]           = $this->Counter->getdatacounterorderprocesspaginate($from, $end, $filter, $search, $date1, $date2);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/terbaru", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delivery Order List");
	}


	function kemasorder()
	{
		$idso = $this->input->post("idso");
		$f = $this->session->userdata("data");
		$f["data"] = $this->Counter->getdatasalesorderbyid($idso);
		$f["data1"] = $this->MasterData->getcompany();
		$f["data2"] = $this->MasterData->getcard();
		$f["data3"] = $this->MasterData->getwarehouse();
		$this->load->view("Employe/header");
		$this->load->view("Employe/packing", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Packaging page");
	}

	function cancelorder()
	{
		$idso = $this->input->post('idso');
		$cek  = $this->MasterData->cancelorder($idso);
		echo json_encode($cek);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "cancel order");
	}


	function ceksn()
	{
		$snno1 = $this->input->post("snno1");
		$snno2 = $this->input->post("snno2");
		if ($snno1 == $snno2) {
			$snno2 = "";
		}
		$idso = $this->input->post("idso");
		$cek = $this->Counter->ceksn($snno1, $snno2, $idso);
		echo json_encode($cek);
	}


	function ceksnreturn()
	{
		$snno1 = $this->input->post("snno1");
		$snno2 = $this->input->post("snno2");
		$idso = $this->input->post("idso");
		$cek = $this->Counter->ceksnreturn($snno1, $snno2, $idso);
		echo json_encode($cek);
	}

	function returncust()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idinret') == '') {
			$idinret = '';
		} else {
			$idinret = base64_decode($this->input->post('idinret'));
		}
		$typeinret = $this->input->post('typeinret');
		if (empty($typeinret)) {
			$typeinret = '02';
		}

		$codeinret = $this->input->post('codeinret');
		$dateinret = $this->input->post('dateinret');
		$idsupp = $this->input->post('idsupp');
		if (empty($idsupp)) {
			$idsupp = 0;
		}
		$idpo = $this->input->post('idpo');
		if (empty($idpo)) {
			$idpo = 0;
		}

		$idso = $this->input->post('idso');
		if (empty($idso)) {
			echo 'Code Sales Order Tidak Ada';
			exit();
		}

		$idwh = $this->input->post('idwh');
		if (empty($idwh)) {
			$idwh = 0;
		}
		if ($idwh == 0) {
			echo 'Pilih Gudang';
			exit();
		}
		$descinfo = $this->input->post('descinfo');
		if (empty($descinfo)) {
			$descinfo = '';
		}
		$qtyinret = str_replace(',', '', $this->input->post('qtyinret'));
		$iteminret = str_replace(',', '', $this->input->post('iteminret'));
		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$idpodet[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_idpodet'));
				$idsodet[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_idsodet'));
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$idsn[$xint] = $this->input->post('transaksi_' . $x . '_idsn');
				$idsn2[$xint] = $this->input->post('transaksi_' . $x . '_idsn2');
				$xint = $xint + 1;
			}
		}
		$res = $this->Counter->updateinvinret($iduser, $dateinret, $typeinret, $idpo, $idsupp, $descinfo, $qtyinret, $iteminret, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idinret, $codeinret, $idso, $idsodet);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save change Outgoing Warehouse");
	}


	function updatesalesorder()
	{
		$idso = $this->input->post('idso');
		$iduser = $this->input->post('iduser');
		$idcust = $this->input->post('idcust');
		$idwh = $this->input->post('idwh');
		$noresi = $this->input->post('noresi');
		$delivaddr = $this->input->post('delivaddr');
		$jasapengirim = $this->input->post('jasapengirim');
		$iditem = $this->input->post('iditem');
		$nameitem = $this->input->post('nameitem');
		$snid = $this->input->post('snid');
		$snawal = $this->input->post('snawal');
		$snakhir = $this->input->post('snakhir');
		$snakhir = $this->input->post('snakhir');
		$expdate = $this->input->post('expdate');
		$iditemx = $this->input->post('iditemx');
		$pricebuyitem = $this->input->post('pricebuyitem');
		$qty = $this->input->post('qty');

		$cek = $this->Counter->updatesalesorder($idso, $iduser, $idcust, $idwh, $delivaddr, $jasapengirim, $iditem, $nameitem, $snawal, $snakhir, $snakhir, $expdate, $qty, $noresi, $iditemx, $pricebuyitem, $snid);

		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">' . $cek . '</div>');
		if ($cek == "Success") {
			redirect('CounterController/deliveryorder');
		} else {
			redirect('CounterController/deliveryorder');
		}
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Update Sales Order");
	}

	function addstockopname()
	{
		$iditem    = $this->input->post('iditem');
		$nameitem  = $this->input->post('nameitem');
		$sku       = $this->input->post('sku');
		$qtysystem = $this->input->post('qtysystem');
		$qtyactual = $this->input->post('qtyactual');
		$dateawal  = date('Y-m-d');
		$dateakhir = date('Y-m-d');
		$balancesystem = $this->input->post('balancesystem');
		$cek = $this->Counter->addstockopname($iditem, $nameitem, $sku, $qtysystem, $qtyactual, $dateawal, $dateakhir, $balancesystem);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		// echo $cek;
		redirect('CounterController/opname');
	}

	function cancelsalesorder()
	{
		$idso = $this->input->post('idso');
		$iduser = $this->input->post('iduser');
		$idcust = $this->input->post('idcust');
		$idwh = $this->input->post('idwh');
		$noresi = $this->input->post('noresi');
		$delivaddr = $this->input->post('delivaddr');
		$iditem = $this->input->post('iditem');
		$nameitem = $this->input->post('nameitem');
		$snid = $this->input->post('snid');
		$snawal = $this->input->post('snawal');
		$snakhir = $this->input->post('snakhir');
		$snakhir = $this->input->post('snakhir');
		$expdate = $this->input->post('expdate');
		$iditemx = $this->input->post('iditemx');
		$pricebuyitem = $this->input->post('pricebuyitem');
		$qty = $this->input->post('qty');

		$cek = $this->Counter->updatesalesorder($idso, $iduser, $idcust, $idwh, $delivaddr, $iditem, $nameitem, $snawal, $snakhir, $snakhir, $expdate, $qty, $noresi, $iditemx, $pricebuyitem, $snid);

		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">' . $cek . '</div>');
		if ($cek == "Success") {
			redirect('CounterController/deliveryorder');
		} else {
			redirect('CounterController/deliveryorder');
		}
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Update Sales Order");
	}

	// function terkirim()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->Counter->getdatacounterorderfinish();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/terkirim", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Delivery Order terkirim");
	// }

	function terkirim()
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
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/terkirim';
		$config['total_rows'] = $this->Counter->countcounterorderfinish($filter, $search, $date1, $date2);
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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$f["data"]           = $this->Counter->getdatacounterorderfinishpaginate($from, $end, $filter, $search, $date1, $date2);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/terkirim", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delivery Order terkirim");
	}

	// function stockinventory()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->MasterData->getitem();
	// 	$f["data1"] = $this->MasterData->getoutsn();

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/stockinventory", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Stock Inventory");
	// }

	function stockinventory()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/stockinventory';
		$config['total_rows'] = $this->MasterData->Countgetitempagination($filter, $search);
		// $config['per_page']   = 50;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
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
		// $from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $end  = $from + $config["per_page"];

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");



		// get item list
		$f["title"]          = "item";
		$f["data"]           = $this->MasterData->getitempaginatation($filter, $search);
		$f["data1"]          = $this->MasterData->getoutsn();

		// load view
		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockinventory", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Stock Inventory");
	}

	// function stockhabis()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->MasterData->getitem();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/stockhabis", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Stock Habis");
	// }

	function stockhabis()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		if (!isset($search)) {
			$search = '';
		}
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/stockhabis';
		$config['total_rows'] = $this->MasterData->Countgetitempagination($filter, $search);
		$config['per_page']   = 50;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
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

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");



		// get item list
		$f["title"]          = "counter";
		$f["data"]           = $this->MasterData->getitempaginatation($filter, $search, $from, $end);
		$f["data1"]          = $this->MasterData->getoutsn();

		// load view
		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockhabis", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Stock Inventory");
	}

	function sentemailstockhabis()
	{

		$f["title"] = "counter";
		$f["data"] = $this->MasterData->getitemstockhabis();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockhabis", $f);
		$this->load->view("Employe/footer");


		if (isset($_POST['submit'])) {
			// Instantiation and passing `true` enables exceptions
			// $mail                 = new PHPMailer(true);
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$email                = $this->input->post('email');

			//Server settings
			$mail->SMTPOptions = array(
				'ssl'               => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);

			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                              // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'guesmail004@gmail.com';                     // SMTP username
			$mail->Password   = 'guesmail123';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPSecure = 'tls';

			$data = array();
			$mesg = $this->load->view('Employe/SentMail/stockhabis', '', true);

			//Recipients
			$mail->setFrom('muhammaddedeandri98@gmail.com');
			$mail->addAddress($email);     // Add a recipient
			$mail->addReplyTo('muhammaddedeandri98@gmail.com');

			// Email subject
			$mail->Subject = 'Daftar Stock Barang Segera Habis';

			// Set email format to HTML
			$mail->isHTML(true);

			//Email body content
			$mail->Body    = '<p>' . $mesg . '</p>';

			if ($mail->send()) {
				$this->session->set_flashdata('flash_message', 'Email Has Been Send');
			} else {
				$this->session->set_flashdata('error', 'Erorr');
			}
		}
	}

	function sentemailstockexpaired()
	{

		$f["title"] = "counter";
		$f["data"] = $this->MasterData->getitem();
		$f["data1"] = $this->MasterData->getoutsn();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockexp", $f);
		$this->load->view("Employe/footer");

		if (isset($_POST['submit'])) {
			// Instantiation and passing `true` enables exceptions
			// $mail    = new PHPMailer(true);
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$email   = $this->input->post('email');

			//Server settings
			$mail->SMTPOptions = array(
				'ssl'               => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);

			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                              // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'guesmail004@gmail.com';                     // SMTP username
			$mail->Password   = 'guesmail123';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPSecure = 'tls';

			$data = array();
			$mesg = $this->load->view('Employe/SentMail/stockexp', '', true);

			//Recipients
			$mail->setFrom('muhammaddedeandri98@gmail.com');
			$mail->addAddress($email);     // Add a recipient
			$mail->addReplyTo('muhammaddedeandri98@gmail.com');

			// Email subject
			$mail->Subject = 'Daftar Stock Barang Expaired';

			// Set email format to HTML
			$mail->isHTML(true);

			//Email body content
			$mail->Body    = $mesg;

			if ($mail->send()) {
				$this->session->set_flashdata('flash_message', 'Email Has Been Send');
			} else {
				$this->session->set_flashdata('error', 'Erorr');
			}
		}
	}

	function sentemailstockopname()
	{

		$f["title"] = "counter";
		$f["data"] = $this->MasterData->getitem();
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockopname", $f);
		$this->load->view("Employe/footer");

		if (isset($_POST['submit'])) {
			// Instantiation and passing `true` enables exceptions
			// $mail                 = new PHPMailer(true);
			$mail = new PHPMailer\PHPMailer\PHPMailer();

			$email                = $this->input->post('email');

			//Server settings
			$mail->SMTPOptions = array(
				'ssl'               => array(
					'verify_peer'       => false,
					'verify_peer_name'  => false,
					'allow_self_signed' => true
				)
			);

			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                              // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'guesmail004@gmail.com';                     // SMTP username
			$mail->Password   = 'guesmail123';                               // SMTP password
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->SMTPSecure = 'tls';

			$data = array();
			$mesg = $this->load->view('Employe/SentMail/stockopname', '', true);

			//Recipients
			$mail->setFrom('muhammaddedeandri98@gmail.com');
			$mail->addAddress($email);     // Add a recipient
			$mail->addReplyTo('muhammaddedeandri98@gmail.com');

			// Email subject
			$mail->Subject = 'Daftar Stock OPNAME';

			// Set email format to HTML
			$mail->isHTML(true);

			//Email body content
			$mail->Body    = '<p>' . $mesg . '</p>';

			if ($mail->send()) {
				$this->session->set_flashdata('flash_message', 'Email Has Been Send');
			} else {
				$this->session->set_flashdata('error', 'Erorr');
			}
		}
	}

	// function expired()
	// {
	// 	$f["title"] = "counter";
	// 	$f["data"] = $this->MasterData->getitem();
	// 	$f["data1"] = $this->MasterData->getoutsn();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("Employe/stockexp", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "List Segera Expired");
	// }

	function expired()
	{
		date_default_timezone_set("Asia/Jakarta");
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');

		$dateexpaired = date('Y-m-d', strtotime("90 day", strtotime(date("Y-m-d"))));


		if (!isset($search)) {
			$search = '';
		}
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/expired';
		$config['total_rows'] = $this->MasterData->Countgetitempaginationexpaired($filter, $search, $dateexpaired, 'counter');
		$config['per_page']   = 20;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]  = floor($choice);
		// Membuat Style pagination untuk BootStrap v4
		$config['num_links'] = 3;
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

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		// get item list
		$f["title"]          = "counter";
		$f["data"]           = $this->MasterData->getitemexppaginatation($from, $end, $filter, $search, $dateexpaired, 'counter');
		$f["data1"]          = $this->MasterData->getoutsn();

		//Membuat link
		$f["pagination"]     = $this->pagination->create_links();

		// load view
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/stockexp", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "List Segera Expired");
	}

	function getdataexpired()
	{
		$iditem = $this->input->post('iditem');
		$idwh = $this->input->post('idwh');
		$cek = $this->MasterData->getdataexpired($iditem, $idwh);

		echo json_encode($cek);
	}


	function buatrequest()
	{
		$f["data"] = $this->MasterData->getitem();
		$f["iditem"] = $this->input->post('iditem');
		$this->load->view("Employe/header");
		$this->load->view("Employe/RequestItemCounter", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Buat Request");
	}



	function addrequestitem()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$iditem = $this->input->post('iditem');
		$idwh = $this->input->post('idwh');
		$qty = $this->input->post("qty");
		$nareq = $this->input->post("nareq");
		$cek = $this->Counter->addrequestitem($iditem, $idwh, $qty, $nareq, $iduser);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		$this->stockhabis();
	}


	function buatreturn()
	{
		$f["data"] = $this->MasterData->getitem();
		$f["data1"] = $this->MasterData->getwarehouse();
		$f["iditem"] = $this->input->post('iditem');

		$this->load->view("Employe/header");
		$this->load->view("Employe/returnexpcounter", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Buat Return");
	}

	function addreturnitem()
	{

		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$iditem = $this->input->post('iditem');
		$itemqty = $this->input->post('itemqty');

		$snawal = $this->input->post('snawal');
		$snakhir = $this->input->post('snakhir');
		$idwh = $this->input->post('idwh');
		$idwh2 = $this->input->post('idwh2');
		$expdate = $this->input->post('expdate');
		$qty = $this->input->post("qty");
		$nareq = $this->input->post("nareq");
		$cek = $this->MInOut->updatemovewh($iduser, date('Y-m-d'), '2', $nareq, $itemqty, count($iditem), $iditem, $qty, $snawal, $snakhir, $idwh[0], $idwh2, "", substr(date('YmdHisu'), 0, 15), "", $expdate, "", "");



		$this->expired();
	}

	function Snwarehouse()
	{
		$f["start"] = $this->input->get("start");
		$f["finish"] = $this->input->get("finish");
		$f["page"] = $this->input->get("page");
		$f["date1"] = $this->input->get("date1");
		$f["date2"] = $this->input->get("date2");
		$f["iditem"] = $this->input->get("xxx");
		$f["sn"] = $this->input->get("idsn");

		if (!isset($f["iditem"])) {
			$f["iditem"] = "empty";
		}


		if ($f["date1"] != "" || $f["iditem"] != "empty") {
			$f["data2"] = $this->MasterData->getitemsbydate($f["date1"], $f["date2"], $f["iditem"]);
		} else {
			$f["data2"] = $this->MasterData->getitems();
		}

		if ($f["sn"] != "") {
			$f["item"] = $this->MasterData->getsn($f["sn"]);
			if ($f["item"] == "Not Found") {
				$f["data2"] = "Not Found";
			}
		}
		$f["title"] = "gudang";
		$f["data5"] = $this->MasterData->getitem();
		$f["data3"] = $this->MasterData->getoutsn();
		$f["data4"] = $this->MasterData->getitemtype();

		$f["data"] = $this->session->userdata("data");
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/Snwarehouse");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "SN Counter");
	}

	function Sncounter()
	{
		$f["start"]  = $this->input->get("start");
		$f["finish"] = $this->input->get("finish");
		$f["page"]   = $this->input->get("page");
		$f["date1"]  = $this->input->get("date1");
		$f["date2"]  = $this->input->get("date2");
		$f["iditem"] = $this->input->get("xxx");
		$f["sn"]     = $this->input->get("idsn");

		if (!isset($f["iditem"])) {
			$f["iditem"] = "empty";
		}

		if ($f["date1"] != "" || $f["iditem"] != "empty") {
			$f["data2"] = $this->MasterData->getitemsbydate($f["date1"], $f["date2"], $f["iditem"]);
		} else {
			$f["data2"] = $this->MasterData->getitems();
		}

		if ($f["sn"] != "") {
			$f["item"] = $this->MasterData->getsn($f["sn"]);
			if ($f["item"] == "Not Found") {
				$f["data2"] = "Not Found";
			}
		}
		$f["title"] = "counter";
		$f["data5"] = $this->MasterData->getitem();
		$f["data3"] = $this->MasterData->getoutsn();
		$f["data4"] = $this->MasterData->getitemtype();



		$f["data"] = $this->session->userdata("data");
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/Sncounter");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "SN Counter");
	}

	// function return()
	// {
	// 	$f["title"] = "counter";

	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistinvinret('');
	// 	$f["title"] = "counter";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("Employe/returncounter", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Return Customer List");
	// }

	function return()
	{
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'CounterController/return';
		$config['total_rows'] = $this->MInOut->countreturn();
		$config['per_page']   = 10;

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

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data"]           = $this->MInOut->getlistinvinretpaginate($config['per_page'], $from);
		$f["title"]          = "counter";
		$f["pagination"]     = $this->pagination->create_links();

		$f["title"] = "counter";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("Employe/returncounter", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Return Customer List");
	}

	function changeinvinret()
	{
		// $f = $this->session->userdata("data");
		$f["data"]  = "Not Found";
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = $this->input->get('idtrans');
		$f["from"] = $this->input->get('from');
		$f["headertrans"] = $this->MInOut->readheaderinvinret(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MInOut->readdetailinvinret(base64_decode($f["idtrans"]));
		// $f["order"] = $this->MPrQuo->getlistpo(" and not idsupp=0 and ((not(statuspo ='04') and not(statuspo ='03') and not (qtyret=qtyin))  or idpo = " . $f["headertrans"]['idpo'] . ") ");
		$this->load->view("xfooter");
		$this->load->view("Employe/addinvincounter", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Detail Return");
	}



	function addreturn()
	{
		$f["title"] = "counter";
		$this->load->view("Employe/header");
		$this->load->view("Employe/addreturn", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Return");
	}

	function confirmall()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idso = $this->input->post("check");
		$cek = $this->Counter->konfirmsoall($idso, $iduser);
		redirect('CounterController/inout');
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Confirm Sales Order");
	}
}
