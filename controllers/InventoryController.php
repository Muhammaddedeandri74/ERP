<?php


class InventoryController extends CI_Controller
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
		$this->load->model("MasterData");
	}

	function ingoingstatus()
	{
        $this->load->model("MasterData");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getwarehouse();
		$f["data1"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/IngoingStatus",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}

    function Supplier()
	{
        $this->load->model("MasterData");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]   = $this->MasterData->getcurrency();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/Addinventoryin",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}

	function addinventoryin()
	{
        $this->load->model("MasterData");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]   = $this->MasterData->getcurrency();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/Addinventoryin",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}

	function Return()
	{
        $this->load->model("MasterData");
		$f["title"]   = "Register Inventory In Return";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]   = $this->MasterData->getcurrency();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryInReturn",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}

	function MoveWarehouse()
	{
        $this->load->model("MasterData");
		$f["title"]   = "Register Inventory In MoveWarehouse";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]   = $this->MasterData->getcurrency();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryInMoveWarehouse",$f);
		$this->load->view("SuperAdmin/Footer");
        $f = $this->session->userdata("data");
	}

	function getdatainventorybyid(){
		// $id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		// $f["data"] = $this->MasterData->getdatauserbyid($id);
		$this->load->view("SuperAdmin/Header");
		$this->load->view("Inventory/EditInventoryIn", $f);
	}

}
