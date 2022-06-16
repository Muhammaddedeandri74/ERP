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
		$this->load->model("MInventoryOut");
		$this->load->model("MStockInventory");
	}

	function newinvin()
	{
		$this->load->model("MasterData");
		$f  = $this->session->userdata("data");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitemmaterialinvin();
		$f["data1"]   = $this->MasterData->getcurrency();
		$f["data2"]   = $this->MasterData->getwarehouse();
		$f["data3"]   = $this->MasterData->getlistinvin();
		$f["data4"]   = $this->MasterData->getcustomerinvin();
		$f["data6"]   = $this->MasterData->getlistinvin();
		$f["data7"]   = $this->MasterData->getlistpo();
		$f["data8"]   = $this->MasterData->getinvinlast();
		$f["order"]   = $this->MasterData->getlistpoheader();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/Addinventoryin", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function movewh()
	{
		$this->load->model("MasterData");
		$f  = $this->session->userdata("data");
		$f["title"]   = "Register Inventory In";
		$f["data"]    = $this->MasterData->getitemmaterialinvin();
		$f["data1"]   = $this->MasterData->getcurrency();
		$f["data2"]   = $this->MasterData->getwarehouse();
		$f["data3"]   = $this->MasterData->getlistinvin();
		$f["data4"]   = $this->MasterData->getcustomer();
		$f["data6"]   = $this->MasterData->getlistinvin();
		$f["data7"]   = $this->MasterData->getlistpo();
		$f["order"]   = $this->MasterData->getlistpoheader();
		$this->load->view("Superadmin/Header");
		$this->load->view("Inventory/AddinventoryinMoveWH", $f);
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
		$namewarehouse   = $this->input->post('namewh');
		$tipein          = $this->input->post('tipein');
		$namesupp        = $this->input->post('namecust');
		$date1           = $this->input->post('date1');
		$date2           = $this->input->post('date2');
		$nameitem        = $this->input->post('nameitem');

		if (!isset($namewarehouse)) {
			$namewarehouse = '';
		}

		if (!isset($tipein)) {
			$tipein = '';
		}

		if (!isset($namesupp)) {
			$namesupp = '';
		}

		if (!isset($date1)) {
			$date1 = '';
		}

		if (!isset($date2)) {
			$date2 = '';
		}

		if (!isset($nameitem)) {
			$nameitem = '';
		}


		$this->load->model("MasterData");
		$f["title"]    = "Register Inventory In";
		$f["data"]     = $this->MasterData->getlistinvindetfilter($namewarehouse, $tipein, $namesupp, $date1, $date2, $nameitem);
		$f["data1"]    = $this->MasterData->getwarehouse();
		$f["data2"]    = $this->MasterData->getcustomerinvin();
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
		$f["data"]    = $this->MasterData->getitemmaterialso();
		$f["data1"]    = $this->MasterData->getcustomer();

		$f["warehouse"]    = $this->MasterData->getwarehouse();
		$f["noinvout"] = $this->input->post('noinvout');
		if (!isset($f["noinvout"])) {
			$f["noinvout"] = "";
		}
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


	function AddPo()
	{
		$this->load->model("MasterData");
		$f            = $this->session->userdata("data");
		$f["title"]   = "Register Purchase Order";
		$f["data"]    = $this->MasterData->getitemmaterialpo();
		$f["data2"]   = $this->MasterData->getcurrency();
		$f["data3"]   = $this->MasterData->getpo();
		$f["data4"]   = $this->MasterData->getlistpo();
		$f["data5"]   = $this->MasterData->getsupplier();
		$f["data6"]   = $this->MasterData->getcompany();
		$f["data7"]   =  $this->MasterData->getpolast();
		$this->load->view("Superadmin/Header");
		$this->load->view("PO/AddPurchaseOrder", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function cancelpo()
	{
		$codepo = $this->input->post("codepo");
		$cek = $this->MasterData->cancelpo($codepo);
		echo json_encode($cek);
	}

	// function getlistinvinincoice()
	// {
	// 	$search     = $this->input->post("search");
	// 	$datestart  = $this->input->post("datestart");
	// 	$finishdate = $this->input->post("finishdate");
	// 	$cek        =  $this->MasterData->getlistinvininvoice($search, $datestart, $finishdate);
	// 	echo json_encode($cek);
	// }



	function getlistmovewh()
	{
		$search     = $this->input->post("search");
		$datestart  = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek        =  $this->MasterData->getlistmovewh($search, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistpoinvoice()
	{
		$search     = $this->input->post("search");
		$datestart  = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek        =  $this->MasterData->getlistpoinvoice($search, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistpo()
	{
		$filter     = $this->input->post("filter");
		$search     = $this->input->post("search");
		$statuspo   = $this->input->post("statuspo");
		$datestart  = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek        =  $this->MasterData->getlistpodet($filter, $search, $statuspo, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistIO()
	{
		$filter     = $this->input->post("filterout");
		$search     = $this->input->post("searchout");
		$statusout  = $this->input->post("statusout");
		$datestart  = $this->input->post("datestartout");
		$finishdate = $this->input->post("finishdateout");
		$cek        =  $this->MasterData->getlistIO($filter, $search, $statusout, $datestart, $finishdate);
		echo json_encode($cek);
	}


	function getlistreqpo()
	{
		$filter     = $this->input->post("filters");
		$search     = $this->input->post("searchs");
		$statuspo   = $this->input->post("statusreqpos");
		$datestart  = $this->input->post("datestarts");
		$finishdate = $this->input->post("finishdates");
		$cek        =  $this->MasterData->getlistreqpodetail($filter, $search, $statuspo, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistrequestpo()
	{
		$filter     = $this->input->post("filters");
		$search     = $this->input->post("searchs");
		$statuspo   = $this->input->post("statusreqpos");
		$datestart  = $this->input->post("datestarts");
		$finishdate = $this->input->post("finishdates");
		$cek        =  $this->MasterData->getlistrequestpo($filter, $search, $statuspo, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistso()
	{
		$filter     = $this->input->post("filterx");
		$search     = $this->input->post("searchx");
		$statusso   = $this->input->post("statusorder");
		$datestart  = $this->input->post("datestartx");
		$finishdate = $this->input->post("finishdatex");
		$cek        = $this->MasterData->getlistsodetail($filter, $search, $statusso, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function detailpo()
	{
		$idpo = $this->input->post("idpo");
		$cek  = $this->MasterData->detailpo($idpo);
		echo json_encode($cek);
	}

	function detailreqpo()
	{
		$idreqpo = $this->input->post("idreqpo");

		$cek  = $this->MasterData->detailreqpo($idreqpo);
		echo json_encode($cek);
	}

	function detailso()
	{
		$idso         = $this->input->post('idso');
		$this->load->Model("MasterData");
		$cek  = $this->MasterData->salesorderdetail($idso);
		echo json_encode($cek);
	}

	function detailinvin()
	{
		$idin = $this->input->post("idin");

		$cek  = $this->MasterData->detailinvin($idin);
		echo json_encode($cek);
	}

	function detailIO()
	{
		$idinvout = $this->input->post("idinvout");

		$cek  = $this->MasterData->detailIO($idinvout);
		echo json_encode($cek);
	}

	function detailinvoice()
	{
		$idinv = $this->input->post("idinv");

		$cek  = $this->MasterData->detailinvoice($idinv);
		echo json_encode($cek);
	}

	function detailmove()
	{
		$idinvout = $this->input->post("idinvout");
		$cek  = $this->MasterData->detailmove($idinvout);
		echo json_encode($cek);
	}

	function detailpox()
	{
		$idpo = $this->input->post("idpo");
		$cek  = $this->MasterData->detailpox($idpo);
		echo json_encode($cek);
	}

	function getlistpostatus()
	{
		$filter = $this->input->post("filter");
		$search = $this->input->post("search");
		$statusquo = $this->input->post("statuspo");
		$datestart = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek =  $this->MasterData->getlistpostatus($filter, $search, $statusquo, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistinvinstatus()
	{
		$filter = $this->input->post("filter");
		$search = $this->input->post("search");
		$statusin = $this->input->post("statusin");
		$datestart = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek =  $this->MasterData->getlistinvinstatus($filter, $search, $statusin, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistinvoice()
	{
		$filter = $this->input->post("filter");
		$search = $this->input->post("search");
		$statusinv = $this->input->post("statusinv");
		$datestart = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek =  $this->MasterData->getlistinvoice($filter, $search, $statusinv, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function getlistinvoicedetail()
	{
		$filter = $this->input->post("filter");
		$search = $this->input->post("search");
		$statusinv = $this->input->post("statusinv");
		$datestart = $this->input->post("datestart");
		$finishdate = $this->input->post("finishdate");
		$cek =  $this->MasterData->getlistinvoicedet($filter, $search, $statusinv, $datestart, $finishdate);
		echo json_encode($cek);
	}

	function PoStatus()
	{
		$codepo         = $this->input->post('codepo');
		$namesupp       = $this->input->post('namesupp');
		$filter         = $this->input->post('filterx');
		$date1          = $this->input->post('date1');
		$date2          = $this->input->post('date2');
		$status         = $this->input->post('status');

		if (!isset($codepo)) {
			$codepo = '';
		}

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
		$f["data"]    = $this->MasterData->getlistpodetail($codepo, $namesupp, $filter, $date1, $date2, $status);
		$this->load->view("Superadmin/Header");
		$this->load->view("PO/PurchaseOrderStatus", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
	}

	// function editpo()
	// {
	// 	$this->load->model("MasterData");
	// 	$id           = $this->input->get("idpox");
	// 	$f            = $this->session->userdata("data");
	// 	$f["data"]    = $this->MasterData->getitemmaterialpo();
	// 	$f["data2"]   = $this->MasterData->getcurrency();
	// 	$f["data3"]   = $this->MasterData->getpo();
	// 	$f["data4"]   = $this->MasterData->getlistpo();
	// 	$f["data5"]   = $this->MasterData->getsupplier();
	// 	$f["data6"]   = $this->MasterData->getcompany();
	// 	$f["data7"]   =  $this->MasterData->getpolast();

	// 	$this->load->view("Superadmin/Header");
	// 	$this->load->view("PO/EditPurchaseOrder", $f);
	// 	$this->load->view("SuperAdmin/Footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->load->view("xfooter");
	// }

	function InOutReport()
	{
		$this->load->model("MasterData");
		$f["title"]   = "Inventory InOut Report";
		// $f["data"]    = $this->MasterData->getlistinvindet();
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
		$f["data"]  = $this->MasterData->getsupplier();
		$f["data1"] = $this->MasterData->getcurrency();
		$f["data2"] = $this->MasterData->getlistinvininvoice();
		$f["data3"] = $this->MasterData->getitemmaterialpo();
		$f["data4"] = $this->MasterData->getcodeinvoice();

		$f["codeinvz"] = $this->input->post("codeinvz");

		if (!isset($f["codeinvz"])) {
			$f["codeinvz"] = "";
		}
		$this->load->view("SuperAdmin/header");
		$this->load->view("Invoice/Purchaseinvoice", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function RequestInvoice()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getlistinvoicedetail();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("Invoice/RequestInvoice", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function outstatus()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/outstatus", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function stockcard()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/stockcard", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function statuspo()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/statuspo", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function requestpo()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getrequestpo();
		$f["data1"] = $this->MasterData->getitemmaterialpo();
		$f["data2"] =  $this->MasterData->getreqpolast();
		$f["iditem"] = $this->input->post("iditemx");
		if (!isset($f["iditem"])) {
			$f["iditem"] = "";
		}
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/requestpo", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function stockready()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getitemtype();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/stockready", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function RegisterInvoice()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/RegisterInvoice", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Poadjuststatus()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Poadjuststatus", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Registeradvance()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Registeradvance", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Advancestatus()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Advancestatus", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Returnadvance()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Returnadvance", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function outreport()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/outreport", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Safestock()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getitemtype();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Safestock", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Expiredreport()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getitemtype();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/header");
		$this->load->view("Po/Expiredreport", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Inclosing()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/Inclosing", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function Stokopname()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/Stokopname", $f);
		$this->load->view("SuperAdmin/Footer");
	}

	function ingoingreport()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->view("SuperAdmin/header");
		$this->load->view("Inventory/ingoingreport", $f);
		$this->load->view("SuperAdmin/Footer");
	}
}
