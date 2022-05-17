<?php


class OrderManagementController extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model("Auth");
		$date    = date("Y-m-d H:i:s");
		$f       = $this->session->userdata("data");
		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session != "Session on") {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
		$this->load->model("MasterData");
	}

	function addsalesorder()
	{
		$this->load->model("MasterData");
		$f            = $this->session->userdata("data");
		$f["title"]   = "Register Sales Order";
		$f["data"]    = $this->MasterData->getitemmaterialso();
		$f["data1"]   = $this->MasterData->getsalesorder();
		$f["data2"]   = $this->MasterData->getcustomer();
		$f["data3"]   = $this->MasterData->getpaymentmethod();
		$f["data4"]   = $this->MasterData->getcompany();

		$this->load->view("Superadmin/Header");
		$this->load->view("SalesOrder/AddSalesorder", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->load->view("xfooter");
	}

	function orderreport()
	{
		$status         = $this->input->post('status');
		$date1          = $this->input->post('date1');
		$date2          = $this->input->post('date2');
		$namecust       = $this->input->post('namecust');

		if (!isset($status)) {
			$status = '';
		}

		if (!isset($date1)) {
			$date1 = '';
		}

		if (!isset($date2)) {
			$date2 = '';
		}

		if (!isset($namecust)) {
			$namecust = '';
		}

		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getsalesorderfilter($status, $date1, $date2, $namecust);
		$f["data1"] = $this->MasterData->getallsalesorder();
		$this->load->view("SuperAdmin/header");
		$this->load->view("SalesOrder/orderreport", $f);
		$this->load->view("SuperAdmin/Footer");
	}
}
