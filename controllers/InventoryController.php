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

	function Supplier()
	{
		$this->load->model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitemmaterial();
		$f["data1"]   = $this->MasterData->getcurrency();
		$f["data2"]   = $this->MasterData->getwarehouse();
		$f["data3"]   = $this->MasterData->getlistinvin();
		$f["data4"]   = $this->MasterData->getsupplier();
		$f["data5"]   = $this->MasterData->getlistpoheader();
		$f["data6"]   = $this->MasterData->getlistinvin();
		$f["order"]   = $this->MasterData->getlistpoheader();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/Addinventoryin", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function getpo()
	{
		$id = $this->input->post("id");
		$f["headertrans"] = $this->MasterData->readheaderpo($id);
		$f["detailtrans"] = $this->MasterData->readdetailposum($id);
		echo json_encode($f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Get Purchase Order Data");
	}


	function addinventoryin()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]   = $this->MasterData->getcurrency();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/Addinventoryin", $f);
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
		$this->load->view("Inventory/InventoryInReturn", $f);
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
		$this->load->view("Inventory/InventoryInMoveWarehouse", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function ingoingstatus()
	{
		$nameitem       = $this->input->post('nameitem');
		$date1          = $this->input->post('date1');
		$date2          = $this->input->post('date2');
		$tipein         = $this->input->post('tipein');
		$namesupp       = $this->input->post('namesupp');
		$typeitem      = $this->input->post('itemgroup');

		if (!isset($nameitem)) {
			$nameitem = '';
		}

		if (!isset($date1)) {
			$date1 = '';
		}

		if (!isset($date2)) {
			$date2 = '';
		}

		if (!isset($tipein)) {
			$tipein = '';
		}

		if (!isset($namesupp)) {
			$namesupp = '';
		}

		if (!isset($typeitem)) {
			$typeitem = '';
		}

		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getlistinvindet($nameitem, $date1, $date2, $tipein, $namesupp, $typeitem);
		$f["data1"]    = $this->MasterData->getwarehouse();
		$f["data2"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/IngoingStatus", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function getdatainventorybyid()
	{
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("Inventory/EditInventoryIn", $f);
	}

	function inventoryout()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory Out";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryOutSales", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function Sales()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory Out";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryOutSales", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function returns()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory Out";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryOutReturn", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function movewarehouses()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Register Inventory Out";
		$f["data"]    = $this->MasterData->getitem();
		$f["data1"]    = $this->MasterData->getcustomer();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InventoryOutMoveWh", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function AddPo()
	{
		$this->load->model("MasterData");
		$f            = $this->session->userdata("data");
		$f["title"]   = "Register Purchase Order";
		$f["data"]    = $this->MasterData->getitemmaterial();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$f["data2"]   = $this->MasterData->getcurrency();
		$f["data3"]   = $this->MasterData->getpo();
		$f["data4"]   = $this->MasterData->getlistpo();
		$f["data5"]   = $this->MasterData->getsupplier();
		$f["data6"]   = $this->MasterData->getcompany();
		$f["stat"]    = "";
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";

		$this->load->view("Superadmin/Header");
		$this->load->view("PO/AddPurchaseOrder", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->load->view("xfooter");
	}

	function PoStatus()
	{
		$namesupp       = $this->input->post('namesupp');
		$filter         = $this->input->post('filter');
		$date1          = $this->input->post('date1');
		$date2          = $this->input->post('date2');
		$status         = $this->input->post('status');

		if (!isset($namesupp)) {
			$namesupp = '';
		}

		if (!isset($filter)) {
			$filter = '';
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

		$this->load->model("MasterData");
		$f            = $this->session->userdata("data");
		$f["title"]   = "Status Purchase Order";
		$f["data"]    = $this->MasterData->getlistpodetail($namesupp, $filter, $date1, $date2, $status);
		$f["data1"]   = $this->MasterData->getwarehouse();
		$f["data2"]   = $this->MasterData->getsupplier();
		$this->load->view("Superadmin/Header");
		$this->load->view("PO/PurchaseOrderStatus", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function InOutReport()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Inventory InOut Report";
		$f["data"]    = $this->MasterData->getlistinvindet();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/InOutReport", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function StockCardReport()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Inventory StockCard Report";
		$f["data"]    = $this->MasterData->getlistinvindet();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/StockCardReport", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	function Purchaseinvoice()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Invoice/Purchaseinvoice", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function RequestInvoice()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Invoice/RequestInvoice", $f);
		$this->load->view("SuperAdmin/Footer");
	}
}
