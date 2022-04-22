<?php


class PrQuo extends CI_Controller
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
		$this->load->model("MPrQuo");
		$this->load->model("mCommonMaster");
	}

	function index()
	{
		$f["title"] = "Purchasing";
		$f["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
		$f["data"]  = $this->MPrQuo->getlistpo('');
		$f["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
		$f["data2"]  = $this->MPrQuo->getlistpr('');
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardpurchase");
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "dashboard purchase");
	}

	// function index()
	// {
	// 	$f["title"] = "gudang";
	// 	// PAGINATION
	// 	$this->load->library('pagination');

	// 	// CONFIGURATION
	// 	$config['base_url']   = base_url().'PrQuo/index';
	// 	$config['total_rows'] = $this->MPrQuo->countpr();
	// 	$config['per_page']   = 10;

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

	// 	// INITIALIZE
	// 	$this->pagination->initialize($config);
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
	// 	$cek["data"]         = $this->MPrQuo->getlistprpagination($config['per_page'], $from);
	// 	$f["pagination"]     = $this->pagination->create_links();

	// 	// 

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/PR", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Request Purchase list");
	// }

	//pr
	// function pr()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
	// 	$cek["data"]  = $this->MPrQuo->getlistpr('');
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/PR", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Request Purchase list");
	// }

	function pr()
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

		$f["title"] = "gudang";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'PrQuo/pr';
		$config['total_rows'] = $this->MPrQuo->countpr($filter, $search, $date1, $date2, $status);
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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
		$cek["data"]         = $this->MPrQuo->getlistprpagination($from, $end, $filter, $search, $date1, $date2, $status);
		$f["pagination"]     = $this->pagination->create_links();

		// 

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/PR", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Request Purchase list");
	}


	function addpr()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$datepr = $this->input->post('datepr');
		$idsupp = $this->input->post('idsupp');
		if (empty($idsupp)) {
			$idsupp = 0;
		}
		$attn = $this->input->post('attn');
		if (empty($attn)) {
			$attn = '';
		}
		$idcurr = $this->input->post('idcurr');
		if (empty($idcurr)) {
			$idcurr = 0;
		}
		$typepr = $this->input->post('typepr');
		if (empty($typepr)) {
			$typepr = 0;
		}
		$period = $this->input->post('period');
		if (empty($period)) {
			$period = 0;
		}
		$typereq = $this->input->post('typereq');
		if (empty($typereq)) {
			$typereq = '1';
		}
		$statuspr = $this->input->post('statuspr');
		if (empty($statuspr)) {
			$statuspr = '01';
		}

		$qtypr = str_replace(',', '', $this->input->post('qtypr'));
		$itempr = str_replace(',', '', $this->input->post('itempr'));
		$subtotal = str_replace(',', '', $this->input->post('subtotal'));
		$ppn = str_replace(',', '', $this->input->post('ppn'));
		$ppntotal = str_replace(',', '', $this->input->post('ppntotal'));
		$total = str_replace(',', '', $this->input->post('total'));

		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			//if(isset($this->input->post('transaksi_'. $x .'_iditem'))){
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$price[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_price'));
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$subpr[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_subpr'));
				$xint = $xint + 1;
			}
			//}
		}
		// $iditem = $this->input->post('iditem');
		// //$sku = $this->input->post('sku');
		// $price = str_replace(',','',$this->input->post('price'));
		// $qty = str_replace(',','',$this->input->post('qty'));
		// $subpr = str_replace(',','',$this->input->post('subpr'));

		//echo substr(date('YmdHisu'),0,15);
		$res = $this->MPrQuo->addpr($iduser, $datepr, $idsupp, $attn, $idcurr, $typepr, $period, $typereq, $statuspr, $qtypr, $itempr, $subtotal, $ppn, $ppntotal, $total, $iditem, $price, $qty, $subpr);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Add New Purchase Request");
		//$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$res.'</div>');
	}

	function deletepr()
	{
		$idpr = base64_decode($this->input->post('idpr'));
		$res = $this->MPrQuo->deletepr($idpr);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Purchase Request");
	}

	function updatepr()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idpr = base64_decode($this->input->post('idpr'));
		$codepr = $this->input->post('codepr');
		$datepr = $this->input->post('datepr');
		$idsupp = $this->input->post('idsupp');
		if (empty($idsupp)) {
			$idsupp = 0;
		}
		$attn = $this->input->post('attn');
		if (empty($attn)) {
			$attn = '';
		}
		$idcurr = $this->input->post('idcurr');
		if (empty($idcurr)) {
			$idcurr = 0;
		}
		$typepr = $this->input->post('typepr');
		if (empty($typepr)) {
			$typepr = 0;
		}
		$period = $this->input->post('period');
		if (empty($period)) {
			$period = 0;
		}
		$typereq = $this->input->post('typereq');
		if (empty($typereq)) {
			$typereq = '1';
		}
		$statuspr = $this->input->post('statuspr');
		if (empty($statuspr)) {
			$statuspr = '01';
		}

		$qtypr = str_replace(',', '', $this->input->post('qtypr'));
		$itempr = str_replace(',', '', $this->input->post('itempr'));
		$subtotal = str_replace(',', '', $this->input->post('subtotal'));
		$ppn = str_replace(',', '', $this->input->post('ppn'));
		$ppntotal = str_replace(',', '', $this->input->post('ppntotal'));
		$total = str_replace(',', '', $this->input->post('total'));

		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$price[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_price'));
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$subpr[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_subpr'));
				$xint = $xint + 1;
			}
			//}
		}
		$res = $this->MPrQuo->updatepr($iduser, $datepr, $idsupp, $attn, $idcurr, $typepr, $period, $typereq, $statuspr, $qtypr, $itempr, $subtotal, $ppn, $ppntotal, $total, $iditem, $price, $qty, $subpr, $idpr, $codepr);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Update Purchase Request");
	}

	function newpr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("PRQUO/addpr", $f);
		$this->load->view("xfooter");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "New Purchase Request");
	}

	function changepr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpr(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpr(base64_decode($f["idtrans"]));
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/changepr", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Purchase Request");
	}

	function loadpr()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpr(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpr(base64_decode($f["idtrans"]));
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/changepr", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "load purchase request");
	}

	//PO
	// function po()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
	// 	$cek["data"]  = $this->MPrQuo->getlistpo('');
	// 	$cek["transstatus1"]  = $this->MPrQuo->getcurrstatus('PR');
	// 	$cek["data1"]  = $this->MPrQuo->getlistpr('');
	// 	$f["title"] = "Purchasing";

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/po", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Purchasing Order List");
	// }

	function po()
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

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'PrQuo/po';
		$config['total_rows'] = $this->MPrQuo->countpo($filter, $search, $date1, $date2, $status);
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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]   = $this->MPrQuo->getcurrstatus('PO');
		$cek["data"]          = $this->MPrQuo->getlistpopagination($from, $end, $filter, $search, $date1, $date2, $status);
		$cek["transstatus1"]  = $this->MPrQuo->getcurrstatus('PR');
		$cek["data1"]         = $this->MPrQuo->getlistpr('');
		$f["pagination"]      = $this->pagination->create_links();

		// 

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/po", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Purchasing Order List");
	}

	function changeprpo()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpr(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpr(base64_decode($f["idtrans"]));
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/changepr", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Purchase Request");
	}
	// function addpo()
	// {
	// 	$f = $this->session->userdata("data");
	// 	$iduser = $f["iduser"];
	// 	$datepo = $this->input->post('datepo');
	// 	$idsupp = $this->input->post('idsupp');
	// 	if (empty($idsupp)){
	// 		$idsupp=0;
	// 	}
	// 	$attn = $this->input->post('attn');
	// 	if (empty($attn)){
	// 		$attn='';
	// 	}
	// 	$idcurr = $this->input->post('idcurr');
	// 	if (empty($idcurr)){
	// 		$idcurr=0;
	// 	}
	// 	$typepo = $this->input->post('typepo');
	// 	if (empty($typepo)){
	// 		$typepo=0;
	// 	}
	// 	$period = $this->input->post('period');
	// 	if (empty($period)){
	// 		$period=0;
	// 	}
	// 	$typereq = $this->input->post('typereq');
	// 	if (empty($typereq)){
	// 		$typereq='1';
	// 	}
	// 	$statuspo = $this->input->post('statuspo');
	// 	if (empty($statuspo)){
	// 		$statuspo='01';
	// 	}

	// 	$qtypo = str_replace(',','',$this->input->post('qtypo'));
	// 	$itempo = str_replace(',','',$this->input->post('itempo'));
	// 	$subtotal = str_replace(',','',$this->input->post('subtotal'));
	// 	$ppn = str_replace(',','',$this->input->post('ppn'));
	// 	$ppntotal = str_replace(',','',$this->input->post('ppntotal'));
	// 	$total = str_replace(',','',$this->input->post('total'));

	// 	$xcnt = $this->input->post('line-transaksi');
	// 	$xint=0;
	// 	for ($x = 1; $x <= $xcnt; $x++) {
	// 			//if(isset($this->input->post('transaksi_'. $x .'_iditem'))){
	// 				if(!empty($this->input->post('transaksi_'. $x .'_iditem'))){
	// 					$iditem[$xint] = $this->input->post('transaksi_'. $x .'_iditem');
	// 					$price[$xint] = str_replace(',','',$this->input->post('transaksi_'. $x .'_price'));
	// 					$qty[$xint] = str_replace(',','',$this->input->post('transaksi_'. $x .'_qty'));
	// 					$subpo[$xint] = str_replace(',','',$this->input->post('transaksi_'. $x .'_subpo'));
	// 					$xint=$xint+1;
	// 				}
	// 			//}
	// 	}
	// 	// $iditem = $this->input->post('iditem');
	// 	// //$sku = $this->input->post('sku');
	// 	// $price = str_replace(',','',$this->input->post('price'));
	// 	// $qty = str_replace(',','',$this->input->post('qty'));
	// 	// $subpr = str_replace(',','',$this->input->post('subpr'));

	// 	//echo substr(date('YmdHisu'),0,15);
	// 	$res = $this->MPrQuo->addpo($iduser,$datepo,$idsupp,$attn,$idcurr,$typepo,$period,$typereq,$statuspo,$qtypo,$itempo,$subtotal,$ppn,$ppntotal,$total,$iditem,$price,$qty,$subpo);
	// 	echo $res;
	// 	//$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$res.'</div>');
	// }

	function deletepo()
	{
		$idpo = base64_decode($this->input->post('idpo'));
		$res = $this->MPrQuo->deletepo($idpo);
		print_r($res);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Purchase Order");
	}

	function updatepo()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idpo') == '') {
			$idpo = '';
		} else {
			$idpo = base64_decode($this->input->post('idpo'));
		}
		$idpr = $this->input->post('idpr');
		if (empty($idpr)) {
			$idpr = 0;
		}


		$codepo = $this->input->post('codepo');
		$datepo = $this->input->post('datepo');
		$remark = $this->input->post('remark');
		$idsupp = $this->input->post('idsupp');
		if (empty($idsupp)) {
			$idsupp = 0;
		}
		$attn = $this->input->post('attn');
		if (empty($attn)) {
			$attn = '';
		}
		$idcurr = $this->input->post('idcurr');
		if (empty($idcurr)) {
			$idcurr = 0;
		}
		$typepo = $this->input->post('typepo');
		if (empty($typepo)) {
			$typepo = 0;
		}
		$period = $this->input->post('period');
		if (empty($period)) {
			$period = 0;
		}
		$kurs = $this->input->post('kurs');
		if (empty($kurs)) {
			$kurs = '1';
		}
		$statuspo = $this->input->post('statuspo');
		if (empty($statuspo)) {
			$statuspo = '01';
		}

		$qtypo = str_replace(',', '', $this->input->post('qtypo'));
		$itempo = str_replace(',', '', $this->input->post('itempo'));
		$subtotal = str_replace(',', '', $this->input->post('subtotal'));
		$ppn = str_replace(',', '', $this->input->post('ppn'));
		$pph22 = str_replace(',', '', $this->input->post('pph'));
		$ppntotal = str_replace(',', '', $this->input->post('ppntotal'));
		$disc = str_replace(',', '', $this->input->post('disc'));
		$disctotal = str_replace(',', '', $this->input->post('disctotal'));
		$total = str_replace(',', '', $this->input->post('total'));

		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$price[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_price'));
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$discsub[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_disc'));
				$pph[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_pph'));
				$subpo[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_subpo'));
				$idprdet[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_idprdet'));
				$vat[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_vatx'));
				$xint = $xint + 1;
			}
			//}
		}

		$res = $this->MPrQuo->updatepo($iduser, $datepo, $idpr, $idsupp, $attn, $idcurr, $kurs, $typepo, $period, $statuspo, $qtypo, $itempo, $subtotal, $ppn, $ppntotal, $disc, $disctotal, $total, $iditem, $price, $qty, $discsub, $subpo, $idprdet, $idpo, $codepo, $remark, $pph, $pph22, $vat);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save Update Purchase Order");
	}

	function newpo()
	{
		// $f = $this->session->userdata("data");
		$f["idpr"] = $this->input->get('ccc');
		$f["datepr"] = $this->input->get('ddd');
		$f["idsupp"] = $this->input->get('eee');
		$f["stat"] = "";

		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["request"] = $this->MPrQuo->getlistpr(" and not idsupp=0 and (not(statuspr ='04') and not(statuspr ='03') and not (qtypr=qtypo)) ");
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$this->load->view("xfooter");
		$this->load->view("PRQUO/addpo", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "New Purchase Order");
	}

	function changepo()
	{
		// $f = $this->session->userdata("data");
		$f["idpr"] = "";
		$f["datepr"] = "";
		$f["idsupp"] = "";
		$f["stat"] = $this->input->get("stat");

		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["status"] = $this->mCommonMaster->getcommonnamebygroup(8);
		$f["payment"] = $this->mCommonMaster->getcommonnamebygroup(7);
		$f["currency"] = $this->mCommonMaster->getcommonnamebygroup(3);
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MPrQuo->readheaderpo(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MPrQuo->readdetailpo(base64_decode($f["idtrans"]));
		$f["request"] = $this->MPrQuo->getlistpr(" and not idsupp=0 and  ((not(statuspr ='04') and not(statuspr ='03') and not (qtypr=qtypo)) or idpr = " . $f["headertrans"]['idpr'] . ")  ORDER BY a.datepr ASC");
		$f["item"] = $this->mCommonMaster->listitem('');
		$this->load->view("xfooter");
		$this->load->view("PRQUO/addpo", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Update Purchase Order");
		//$this->load->view("PRQUO/changepo",$f);	
	}


	function getitemdata()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->getdataitembyid($id);
		echo json_encode($cek);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Get Item Data");
	}

	function getpr()
	{
		$id = $this->input->post("id");
		$f["headertrans"] = $this->MPrQuo->readheaderpr($id);
		$f["detailtrans"] = $this->MPrQuo->readdetailpr($id);
		echo json_encode($f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Get Purchase Request Data");
	}

	function getpo()
	{
		$id = $this->input->post("id");
		$f["headertrans"] = $this->MPrQuo->readheaderpo($id);
		$f["detailtrans"] = $this->MPrQuo->readdetailposum($id);
		echo json_encode($f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Get Purchase Order Data");
	}


	// function cr()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	// $cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
	// 	// $cek["data"]  = $this->MPrQuo->getlistpo('');
	// 	$f["title"] = "gudang";
	// 	$f["data"] = $this->MPrQuo->getlisrequestcounter();
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/cr", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Counter Request List");
	// }

	function cr()
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

		$f["title"] = "gudang";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'PrQuo/cr';
		$config['total_rows'] = $this->MPrQuo->countcr($filter, $search, $date1, $date2, $status);
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
		$f["data"]         = $this->MPrQuo->getlisrequestcounterpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["pagination"]   = $this->pagination->create_links();

		// 
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/cr", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Counter Request List");
	}

	// function reportpo()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
	// 	$cek["data"]  = $this->MPrQuo->getlistpo('');
	// 	$f["data1"] = $this->MasterData->getcompany();
	// 	$f["title"] = "Purchasing";

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/reportpo", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");

	// 	$this->MasterData->userlog($f["iduser"], "Report Purchase Order");
	// }

	function reportpo()
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

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'PrQuo/reportpo';
		$config['total_rows'] = $this->MPrQuo->countreportpo($filter, $search, $date1, $date2, $status);
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
		$end  = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PO');
		$cek["data"]  = $this->MPrQuo->getlistreportpopagination($from, $end, $filter, $search, $date1, $date2, $status);
		$f["data1"] = $this->MasterData->getcompany();
		$f["pagination"]     = $this->pagination->create_links();
		// 

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/reportpo", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");

		$this->MasterData->userlog($f["iduser"], "Report Purchase Order");
	}

	// function reportpr()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
	// 	$cek["data"]  = $this->MPrQuo->getlistpr('');
	// 	$f["title"] = "Purchasing";

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("PRQUO/reportpr", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Report Purchase Request");
	// }

	function reportpr()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
		$status  = $this->input->post('status');

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

		$f["title"] = "Purchasing";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'PrQuo/po';
		$config['total_rows'] = $this->MPrQuo->countreportpr($filter, $search, $date1, $date2, $status);
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
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('PR');
		$cek["data"]         = $this->MPrQuo->getlistreportprpagination($from, $end, $filter, $search, $date1, $date2, $status);
		$f["pagination"]     = $this->pagination->create_links();

		// 

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("PRQUO/reportpr", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Report Purchase Request");
	}
}
