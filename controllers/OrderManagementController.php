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
		$f["title"]   = "Register Purchase Order";
		$f["data"]    = $this->MasterData->getitemmaterial();
		
		$this->load->view("Superadmin/Header");
		$this->load->view("SalesOrder/AddSalesorder",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}


}
