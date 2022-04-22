<?php


class InOut extends CI_Controller
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
		$this->load->model("MInOut");
		$this->load->model("mCommonMaster");
		$this->load->model("MPrQuo");
		$this->load->model("Counter");
	}

	function index()
	{
		$f["title"] = "gudang";
		$f["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data1"]  = $this->MInOut->getlistinvinret('');
		$f["data2"]  = $this->MInOut->getlistinvin('');
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("Employe/dashboardgudang", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Dashboard gudang");
	}


	//pakets
	function pakets()
	{
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$cek["data"]  = $this->MInOut->getlistpakets('');
		$f["title"] = "gudang";
		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/pakets", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Split Bundle Item List");
	}

	function newpakets()
	{
		//$f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$f["order"] = '';
		$this->load->view("xfooter");
		$this->load->view("INOUT/addpakets", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "New Split Bundle Item");
	}

	function changepakets()
	{
		// $f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MInOut->readheaderpakets(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MInOut->readdetailpakets(base64_decode($f["idtrans"]));
		$f["order"] = '';
		$this->load->view("xfooter");
		$this->load->view("INOUT/addpakets", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Split Bundle Item");
	}

	function deletepakets()
	{
		$idpakets = base64_decode($this->input->post('idpakets'));
		$res = $this->MInOut->deletepakets($idpakets);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Split Bundle");
	}


	function updatepakets()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idpakets') == '') {
			$idpakets = '';
		} else {
			$idpakets = base64_decode($this->input->post('idpakets'));
		}
		$typepakets = $this->input->post('typepakets');
		if (empty($typepakets)) {
			$typepakets = '01';
		}

		$codepakets = $this->input->post('codepakets');
		$datepakets = $this->input->post('datepakets');
		$iditems = $this->input->post('iditems');
		if (empty($iditems)) {
			echo 'Pilih Item';
			exit();
		}
		$expdates = $this->input->post('expdates');
		$idsnp = $this->input->post('idsnp');
		$idsnp2 = $this->input->post('idsnp2');
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
		$qtys = str_replace(',', '', $this->input->post('qtys'));
		$qtypakets = str_replace(',', '', $this->input->post('qtypakets'));
		$itempakets = str_replace(',', '', $this->input->post('itempakets'));
		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$xint = $xint + 1;
			}
		}
		$res = $this->MInOut->updatepakets($iduser, $datepakets, $typepakets, $iditems, $expdates, $idsnp, $idsnp2, $descinfo, $qtys, $qtypakets, $itempakets, $iditem, $expdate, $qty, $idwh, $idpakets, $codepakets);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Update Split Bundle");
	}

	//paket
	// function paket()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistpaket('');
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/paket", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Bundle Item List");
	// }

	function paket()
	{
		$f["title"] = "gudang";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/paket';
		$config['total_rows'] = $this->MInOut->countgetlistpaket();
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
		$cek["data"]         = $this->MInOut->getlistpaketpaginate($config['per_page'], $from);
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/paket", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Bundle Item List");
	}

	function newpaket()
	{
		// $f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$f["order"] = '';
		$this->load->view("xfooter");
		$this->load->view("INOUT/addpaket", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "New Bundle");
	}

	function changepaket()
	{
		// $f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MInOut->readheaderpaket(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MInOut->readdetailpaket(base64_decode($f["idtrans"]));
		$f["order"] = '';
		$this->load->view("xfooter");
		$this->load->view("INOUT/addpaket", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Bundle");
	}

	function deletepaket()
	{
		$idpaket = base64_decode($this->input->post('idpaket'));
		$res = $this->MInOut->deletepaket($idpaket);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Bundle");
	}


	function updatepaket()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idpaket') == '') {
			$idpaket = '';
		} else {
			$idpaket = base64_decode($this->input->post('idpaket'));
		}
		$typepaket = $this->input->post('typepaket');
		if (empty($typepaket)) {
			$typepaket = '01';
		}

		$codepaket = $this->input->post('codepaket');
		$datepaket = $this->input->post('datepaket');
		$iditemp = $this->input->post('iditemp');
		if (empty($iditemp)) {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Pilih Item</div>');
			redirect("InOut/newpaket");
		}
		$expdatep = $this->input->post('expdatep');
		$hargabeli = $this->input->post('hargabeli');
		$idsnp = $this->input->post('idsnp');
		$idsnp2 = $this->input->post('idsnp2');
		$idwh = $this->input->post('idwh');
		if (empty($idwh)) {
			$idwh = 0;
		}
		if ($idwh == 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Pilih Gudang</div>');
			redirect("InOut/newpaket");
		}
		$descinfo = $this->input->post('descinfo');
		if (empty($descinfo)) {
			$descinfo = '';
		}
		$qtyp = str_replace(',', '', $this->input->post('qtyp'));
		$qtypaket = str_replace(',', '', $this->input->post('qtypaket'));
		$itempaket = str_replace(',', '', $this->input->post('itempaket'));
		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$snid[$xint] = $this->input->post('transaksi_' . $x . '_snid');
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$snawal[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_snawal'));
				$snakhir[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_snakhir'));
				$xint = $xint + 1;
			}
		}
		$res = $this->MInOut->updatepaket($iduser, $datepaket, $typepaket, $iditemp, $expdatep, $hargabeli, $idsnp, $idsnp2, $descinfo, $qtyp, $qtypaket, $itempaket, $iditem, $expdate, $qty, $idwh, $idpaket, $codepaket, $snawal, $snakhir, $snid);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">' . $res . '</div>');
		if ($res != "Success") {
			redirect("InOut/newpaket");
		} else {
			redirect("InOut/paket");
		}

		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save Change Bundle");
	}

	//move
	// function movewh()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('MOVEWH');
	// 	$cek["data"]  = $this->MInOut->getlistmovewh('');
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/movewh", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Move Warehouse List");
	// }

	function movewh()
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
		$config['base_url']   = base_url() . 'InOut/movewh';
		$config['total_rows'] = $this->MInOut->countmovewh($filter, $search, $date1, $date2, $status);
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
		$cek["transstatus"]  = $this->MInOut->getcurrstatus('MOVEWH');
		$cek["data"]         = $this->MInOut->getlistmovewhpaginate($from, $end, $filter, $search, $date1, $date2, $status);
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/movewh", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Move Warehouse List");
	}

	function newmovewh()
	{
		$idrequest = $this->input->post('idrequest');
		$f["data"] = $this->Counter->getrequestbyid($idrequest);
		$f["from"] = "warehouse";
		// $f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";

		$f["order"] = ''; //$this->MPrQuo->getlistpo(" and not idsupp=0 and (not(statuspo ='04') and not(statuspo ='03') and not (qtypo=qtyin)) ");
		$this->load->view("xfooter");
		$this->load->view("INOUT/addmovewh", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Add New Move Warehouse");
	}

	function changemovewh()
	{
		$idrequest = $this->input->post('idrequest');
		$f["data"] = $this->Counter->getrequestbyid($idrequest);
		// $f = $this->session->userdata("data");
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = $this->input->get('idtrans');
		$f["from"] = $this->input->get('from');
		$f["headertrans"] = $this->MInOut->readheadermovewh(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MInOut->readdetailmovewh(base64_decode($f["idtrans"]));
		$f["order"] = ''; //$this->MPrQuo->getlistpo(" and not idsupp=0 and ((not(statuspo ='04') and not(statuspo ='03') and not (qtypo=qtyin))  or idpo = ". $f["headertrans"]['idpo'] .") ");
		$this->load->view("xfooter");
		$this->load->view("INOUT/addmovewh", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Move Warehouse");
		//$this->load->view("PRQUO/changepo",$f);	
	}

	function deletemovewh()
	{
		$idmove = base64_decode($this->input->post('idmove'));
		$res = $this->MInOut->deletemovewh($idmove);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Move Warehouse");
	}


	function updatemovewh()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idmove') == '') {
			$idmove = '';
		} else {
			$idmove = base64_decode($this->input->post('idmove'));
		}

		$typemove = $this->input->post('typemove');
		if (empty($typemove)) {
			$typemove = '01';
		}

		$idrequest = $this->input->post('idrequest');
		if (empty($idrequest)) {
			$idrequest = "";
		}
		$norequest = $this->input->post('norequest');
		$codemove = $this->input->post('codemove');
		$datemove = $this->input->post('datemove');
		$idwh = $this->input->post('idwh');
		$acc = $this->input->post('acc');
		if (empty($idwh)) {
			$idwh = 0;
		}
		if ($idwh == 0) {
			echo 'Pilih Gudang Asal';
			exit();
		}
		$idwh2 = $this->input->post('idwh2');
		if (empty($idwh2)) {
			$idwh2 = 0;
		}
		if ($idwh2 == 0) {
			echo 'Pilih Gudang Tujuan';
			exit();
		}
		if ($idwh == $idwh2) {
			echo 'Gudang Asal dan Tujuan tidak boleh sama';
			exit();
		}
		$descinfo = $this->input->post('descinfo');
		if (empty($descinfo)) {
			$descinfo = '';
		}
		$qtymove = str_replace(',', '', $this->input->post('qtymove'));
		$itemmove = str_replace(',', '', $this->input->post('itemmove'));
		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$snawal[$xint] = $this->input->post('transaksi_' . $x . '_snawal');
				$snakhir[$xint] = $this->input->post('transaksi_' . $x . '_snakhir');
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$xint = $xint + 1;
			}
		}
		$res = $this->MInOut->updatemovewh($iduser, $datemove, $typemove, $descinfo, $qtymove, $itemmove, $iditem, $qty, $snawal, $snakhir, $idwh, $idwh2, $idmove, $codemove, $idrequest, $expdate, $acc, $norequest);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save Change Move Warehouse");
	}




	//Ret In
	// function invinret()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistinvinret('');
	// 	$f["title"] = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/invinret", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Outgoing Warehouse List");
	// }

	function invinret()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
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

		$f["title"]   = "gudang";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/invinret';
		$config['total_rows'] = $this->MInOut->countreportoutgoing($filter, $search, $date1, $date2);
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
		$end = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data"]           = $this->MInOut->getdatareportoutpaginate($from, $end, $filter, $search, $date1, $date2);
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/invinret", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Outgoing Warehouse List");
	}

	function newinvinret()
	{
		// $f = $this->session->userdata("data");
		$f["data"]  = "Not Found";
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$f["order"] = $this->MPrQuo->getlistpo("");
		$this->load->view("xfooter");
		$this->load->view("INOUT/addinvinret", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "New Outgoing warehouse");
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
		$this->load->view("INOUT/addinvinret", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change Outgoing Warehouse");
	}

	function deleteinvinret()
	{
		$idinret = base64_decode($this->input->post('idinret'));
		$res = $this->MInOut->deleteinvinret($idinret);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Outgoing warehouse");
	}


	function updateinvinret()
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
			$typeinret = '01';
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
				$snid[$xint] = $this->input->post('transaksi_' . $x . '_snid');
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$idsn[$xint] = $this->input->post('transaksi_' . $x . '_idsn');
				$idsn2[$xint] = $this->input->post('transaksi_' . $x . '_idsn2');
				$xint = $xint + 1;
			}
		}
		$res = $this->MInOut->updateinvinret($iduser, $dateinret, $typeinret, $idpo, $idsupp, $descinfo, $qtyinret, $iteminret, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idinret, $codeinret, $snid);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save change Outgoing Warehouse");
	}

	//In
	// function invin()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistinvin('');
	// 	$f["title"]   = "gudang";
	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/invin", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Ingoing Warehouse List");
	// }

	function invin()
	{

		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
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

		$f["title"]   = "gudang";
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/invin';
		$config['total_rows'] = $this->MInOut->countgetinvin($filter, $search, $date1, $date2);
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
		$end = $from + $config["per_page"];

		// INITIALIZE
		$this->pagination->initialize($config);
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data"]           = $this->MInOut->getlistinvinpaginate($from, $end, $filter, $search, $date1, $date2);
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/invin", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Ingoing Warehouse List");
	}

	function deleteinvin()
	{
		$idin = base64_decode($this->input->post('idin'));
		$res = $this->MInOut->deleteinvin($idin);
		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Delete Ingoing Warehouse");
	}

	function updateinvin()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		if ($this->input->post('idin') == '') {
			$idin = '';
		} else {
			$idin = base64_decode($this->input->post('idin'));
		}
		$typein = $this->input->post('typein');
		if (empty($typein)) {
			$typein = '01';
		}

		$codein = $this->input->post('codein');
		$datein = $this->input->post('datein');
		$idsupp = $this->input->post('idsupp');
		$nosj = $this->input->post('nosj');
		$noinvo = $this->input->post('noinvo');
		if (empty($idsupp)) {
			$idsupp = 0;
		}
		$idpo = $this->input->post('idpo');
		if (empty($idpo)) {
			$idpo = 0;
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
		$qtyin = str_replace(',', '', $this->input->post('qtyin'));
		$itemin = str_replace(',', '', $this->input->post('itemin'));
		$xcnt = $this->input->post('line-transaksi');
		$xint = 0;
		for ($x = 1; $x <= $xcnt; $x++) {
			if (!empty($this->input->post('transaksi_' . $x . '_iditem'))) {
				$iditem[$xint] = $this->input->post('transaksi_' . $x . '_iditem');
				$qty[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_qty'));
				$idpodet[$xint] = str_replace(',', '', $this->input->post('transaksi_' . $x . '_idpodet'));
				$expdate[$xint] = $this->input->post('transaksi_' . $x . '_expdate');
				$idsn[$xint] = $this->input->post('transaksi_' . $x . '_idsn');
				$idsn2[$xint] = $this->input->post('transaksi_' . $x . '_idsn2');
				$buyprice[$xint] = $this->input->post('transaksi_' . $x . '_buyprice');
				$xint = $xint + 1;
			}
		}
		$res = $this->MInOut->updateinvin($iduser, $datein, $typein, $idpo, $idsupp, $descinfo, $qtyin, $itemin, $iditem, $qty, $idpodet, $idsn, $idsn2, $expdate, $idwh, $idin, $codein, $nosj, $noinvo, $buyprice);

		echo $res;
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Save Change Ingoing warehouse");
	}

	function newinvin()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = '';
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";
		$f["order"] = $this->MPrQuo->getlistpo(" and not idsupp=0 and (not(statuspo ='04') and not(statuspo ='03') and not (qtypo=qtyin)) ");
		$this->load->view("xfooter");
		$this->load->view("INOUT/addinvin", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Add New Ingoing warehouse");
	}

	function changeinvin()
	{
		// $f = $this->session->userdata("data");
		$f["supplier"] = $this->mCommonMaster->getcommonnamebygroup2(1, 2);
		$f["warehouse"] = $this->mCommonMaster->getcommonnamebygroup(4);
		$f["item"] = $this->mCommonMaster->listitem('');
		$f["idtrans"] = $this->input->get('idtrans');
		$f["headertrans"] = $this->MInOut->readheaderinvin(base64_decode($f["idtrans"]));
		$f["detailtrans"] = $this->MInOut->readdetailinvin(base64_decode($f["idtrans"]));
		$f["order"] = $this->MPrQuo->getlistpo(" and not idsupp=0 and ((not(statuspo ='04') and not(statuspo ='03') and not (qtypo=qtyin))  or idpo = " . $f["headertrans"]['idpo'] . ") ");
		$this->load->view("xfooter");
		$this->load->view("INOUT/addinvin", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Change ingoing warehouse");
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

	// function return()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["from"] = "warehouses";
	// 	$f["title"] = "gudang";
	// 	$f["data"] = $this->Counter->getdataingoingwarehouse();

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/return", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Ingoing Return Counter list");
	// }

	function return()
	{
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/return';
		$config['total_rows'] = $this->Counter->countreturn();
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
		$f["data"]           = $this->Counter->getdatareturnpaginate($config['per_page'], $from);
		$f["from"]           = "warehouses";
		$f["title"]          = "gudang";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/return", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Ingoing Return Counter list");
	}

	// function reportingoing()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistinvin('');
	// 	$f["from"] = "warehouses";
	// 	$f["title"] = "gudang";

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/reportingoing", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Report Ingoing");
	// }

	function reportingoing()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
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

		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/reportingoing';
		$config['total_rows'] = $this->MInOut->countreportingoing($filter, $search, $date1, $date2);
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
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data"]           = $this->MInOut->reportingoingpaginate($from, $end, $filter, $search, $date1, $date2);
		$f["from"]           = "warehouses";
		$f["title"]          = "gudang";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/reportingoing", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Report Ingoing");
	}

	function getdataingoingdetail()
	{
		$hasil = $this->input->post('hasil');
		$f = $this->MInOut->readdetailinvin($hasil);
		echo json_encode($f);
	}

	// function reportoutgoing()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
	// 	$cek["data"]  = $this->MInOut->getlistinvinret('');
	// 	$f["from"] = "warehouses";
	// 	$f["title"] = "gudang";

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/reportoutgoing", $cek, $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Report Outgoing");
	// }

	function reportoutgoing()
	{
		$filter = $this->input->post('filter');
		$search = $this->input->post('search');
		$date1  = $this->input->post('date1');
		$date2  = $this->input->post('date2');
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
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/reportoutgoing';
		$config['total_rows'] = $this->MInOut->countreportoutgoing($filter, $search, $date1, $date2);
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
		$cek["transstatus"]  = $this->MPrQuo->getcurrstatus('INVIN');
		$f["data"]           = $this->MInOut->getdatareportoutpaginate($from, $end, $filter, $search, $date1, $date2);
		$f["from"]           = "warehouses";
		$f["title"]          = "gudang";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/reportoutgoing", $cek, $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Report Outgoing");
	}

	// function reportreturn()
	// {
	// 	// $f = $this->session->userdata("data");
	// 	$f["from"] = "warehouses";
	// 	$f["title"] = "gudang";
	// 	$f["data"] = $this->Counter->getdataingoingwarehouse();

	// 	$this->load->view("Employe/header");
	// 	$this->load->view("Employe/sidebar", $f);
	// 	$this->load->view("xfooter");
	// 	$this->load->view("INOUT/reportreturn", $f);
	// 	$this->load->view("Employe/footer");
	// 	$f = $this->session->userdata("data");
	// 	$this->MasterData->userlog($f["iduser"], "Report Ingoing Return");
	// }

	function reportreturn()
	{
		// PAGINATION
		$this->load->library('pagination');

		// CONFIGURATION
		$config['base_url']   = base_url() . 'InOut/reportreturn';
		$config['total_rows'] = $this->Counter->countreportreturn();
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
		$f["data"]           = $this->Counter->getdataingoingwarehousepaginate($config['per_page'], $from);
		$f["from"]           = "warehouses";
		$f["title"]          = "gudang";
		$f["pagination"]     = $this->pagination->create_links();

		$this->load->view("Employe/header");
		$this->load->view("Employe/sidebar", $f);
		$this->load->view("xfooter");
		$this->load->view("INOUT/reportreturn", $f);
		$this->load->view("Employe/footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Report Ingoing Return");
	}
}
