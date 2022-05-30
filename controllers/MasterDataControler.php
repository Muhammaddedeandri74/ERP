<?php



class MasterDataControler extends CI_Controller
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

	function currency()
	{

		$f = $this->session->userdata("data");

		$cek["data"] = $this->MasterData->getcurrency();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/Currency", $cek, $f);
		$this->load->view("templates/footer");
	}

	function customer()
	{

		$f = $this->session->userdata("data");

		$cek["data"] = $this->MasterData->getcustomer();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/Customer", $cek, $f);
		$this->load->view("templates/footer");
	}

	function item()
	{

		$f = $this->session->userdata("data");

		$cek["data"] = $this->MasterData->getitem();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/Item", $cek, $f);
		$this->load->view("templates/footer");
	}

	function supplier()
	{

		$f = $this->session->userdata("data");

		$cek["data"] = $this->MasterData->getsupplier();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/Supplier", $cek, $f);
		$this->load->view("templates/footer");
	}

	function user()
	{
		$f = $this->session->userdata("data");

		$cek["data"] = $this->MasterData->getuser();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/User", $cek, $f);
		$this->load->view("templates/footer");
	}

	function warehouse()
	{
		$f = $this->session->userdata("data");
		$cek["data"] = $this->MasterData->getwarehouse();
		$f["title"] = "Master Data";
		$this->load->view("templates/header");
		$this->load->view("templates/sidebar", $f);
		$this->load->view("templates/topbar", $f);
		$this->load->view("MasterData/Warehouse", $cek, $f);
		$this->load->view("templates/footer");
	}



	function addrole()
	{
		$f        = $this->session->userdata("data");
		$iduser   = $f["iduser"];
		$idrole   = $this->input->post("idrole");
		$namerole = $this->input->post("namerole");
		$role     = $this->input->post("role");
		$cek      = $this->MasterData->addroleuser($namerole, $role, $iduser);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addroleuser');
	}

	function editrole()
	{
		$f = $this->session->userdata("data");
		$idrole = $this->input->post("idrole");
		$role = $this->input->post("role");
		$iduser = 1;

		$cek = $this->MasterData->editroleuser($role, $idrole, $iduser);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/User');
	}


	function addcurrency()
	{
		$userid = $this->input->post("userid");
		$codecurrency = $this->input->post("codecurrency");
		$namecurrency = $this->input->post("namecurrency");
		$symbolcurrency = $this->input->post("symbolcurrency");
		$kurscurrency = $this->input->post("kurscurrency");
		$cek = $this->MasterData->addcurrency($codecurrency, $namecurrency, $symbolcurrency, $kurscurrency, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcurrency');
	}

	function addunit()
	{
		$userid = $this->input->post("userid");
		$codecurrency = $this->input->post("codecurrency");
		$namecurrency = $this->input->post("namecurrency");

		$cek = $this->MasterData->addunit($codecurrency, $namecurrency, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addunit');
	}

	function addcard()
	{
		$userid       = $this->input->post("userid");
		$codecurrency = $this->input->post("codecurrency");
		$namecurrency = $this->input->post("namecurrency");
		$nocard       = $this->input->post("nocard");
		$beneficiary  = $this->input->post("beneficiary");

		$cek = $this->MasterData->addcard($codecurrency, $namecurrency, $userid, $nocard, $beneficiary);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcard');
	}

	function addcustomer()
	{
		$userid          = $this->input->post("userid");
		$codecustomer    = $this->input->post("codecustomer");
		$email           = $this->input->post("attrib3");
		$type            = $this->input->post("type");
		$phonecustomer   = $this->input->post("phonecustomer");
		$contact         = $this->input->post("attrib5");
		$namecustomer    = $this->input->post("namecomm");
		$addresscustomer = $this->input->post("addresscustomer");

		$cek               = $this->MasterData->addcustomer($addresscustomer, $namecustomer, $contact, $phonecustomer, $type, $email, $codecustomer, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcustomer');
	}

	function editcustomer()
	{
		$id              = $this->input->post("id");
		$userid          = $this->input->post("userid");
		$codecustomer    = $this->input->post("codecustomer");
		$email           = $this->input->post("email");
		$type            = $this->input->post("typecust");
		$phonecustomer   = $this->input->post("telepon");
		$namecustomer    = $this->input->post("namecust");
		$contact         = $this->input->post("contact");
		$addresscustomer = $this->input->post("alamat");
		$cek = $this->MasterData->editcustomer($id, $codecustomer, $email, $type, $phonecustomer, $namecustomer, $contact, $addresscustomer, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/customer');
	}




	function additembom()
	{
		$f = $this->session->userdata("data");
		$itemgroup  = $this->input->post("itemgroup");
		$nameitem   = $this->input->post("nameitem");
		$sku        = $this->input->post("sku");
		$unitsatuan = $this->input->post("unit");
		$minstock        = $this->input->post("minstock");
		$hargaitem  = $this->input->post("hargaitem");
		$deskripsi  = $this->input->post("deskripsi");
		$userid     = $this->input->post("iduser");
		$cek        = $this->MasterData->additembom($itemgroup, $nameitem, $sku, $unitsatuan, $minstock, $hargaitem, $deskripsi, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/BahanMaterial');
	}

	function newinvin()
	{
		$f                     = $this->session->userdata("data");
		$userid                = $this->input->post("userid");
		$codein                = $this->input->post("codein");
		$tipeingoing           = $this->input->post("typein");
		$idpo                  = $this->input->post("idpo");
		$namesupp              = $this->input->post("idcust");
		$namewarehouse         = $this->input->post("idwh1");
		$datein                = $this->input->post("datein");
		$currency              = $this->input->post("currency");
		$transaksi_iditem       = $this->input->post("transaksi_iditem");
		$transaksi_sku         = $this->input->post("transaksi_sku");
		$transaksi_nameitem    = $this->input->post("transaksi_nameitem");
		$transaksi_deskripsi   = $this->input->post("transaksi_deskripsi");
		$transaksi_harga       = $this->input->post("transaksi_harga");
		$transaksi_qtypo       = $this->input->post("transaksi_qtypo");
		$transaksi_qtyin       = $this->input->post("transaksi_qtyin");
		$transaksi_balance     = $this->input->post("transaksi_balance");
		$transaksi_expiredate  = $this->input->post("transaksi_expiredate");

		$idmove                 = $this->input->post("idinvout");
		$codemove               = $this->input->post("codemove");
		$idwh                   = $this->input->post("idwh");
		$idwh2                  = $this->input->post("idwh2");
		$datein1                = $this->input->post("datein1");
		$currency1              = $this->input->post("currency1");
		$transaksi_iditem1      = $this->input->post("transaksi_iditem1");
		$transaksi_sku1         = $this->input->post("transaksi_sku1");
		$transaksi_nameitem1    = $this->input->post("transaksi_nameitem1");
		$transaksi_deskripsi1   = $this->input->post("transaksi_deskripsi1");
		$transaksi_harga1       = $this->input->post("transaksi_harga1");
		$transaksi_qtyout1       = $this->input->post("transaksi_qtyout1");
		$transaksi_qtyin1       = $this->input->post("transaksi_qtyin1");
		$transaksi_balance1     = $this->input->post("transaksi_balance1");
		$transaksi_expiredate1  = $this->input->post("transaksi_expiredate1");

		$namewarehouse2         = $this->input->post("namewarehouse2");
		$datein2                = $this->input->post("datein2");
		$currency2              = $this->input->post("currency2");
		$transaksi_iditem2      = $this->input->post("transaksi_iditem2");
		$transaksi_price2       = $this->input->post("transaksi_price2");
		$transaksi_qtyin2       = $this->input->post("transaksi_qtyin2");
		$transaksi_expiredate2  = $this->input->post("transaksi_expiredate2");

		if ($tipeingoing == "supplier") {
			$cek                   = $this->MasterData->newinvin(
				$codein,
				$tipeingoing,
				$idpo,
				$namesupp,
				$namewarehouse,
				$datein,
				$currency,
				$transaksi_iditem,
				$transaksi_sku,
				$transaksi_nameitem,
				$transaksi_deskripsi,
				$transaksi_harga,
				$transaksi_qtypo,
				$transaksi_qtyin,
				$transaksi_balance,
				$transaksi_expiredate,
				$userid
			);
			echo $cek;
		} elseif ($tipeingoing == "warehouse") {
			$cek                   = $this->MasterData->newinvinmovewh(
				$codein,
				$codemove,
				$tipeingoing,
				$idmove,
				$namesupp,
				$idwh,
				$idwh2,
				$datein1,
				$currency1,
				$transaksi_iditem1,
				$transaksi_sku1,
				$transaksi_nameitem1,
				$transaksi_deskripsi1,
				$transaksi_harga1,
				$transaksi_qtyout1,
				$transaksi_qtyin1,
				$transaksi_expiredate1,
				$userid
			);
			echo $cek;
		} elseif ($tipeingoing == "return") {
			$cek                   = $this->MasterData->newinvinreturn(
				$codein,
				$tipeingoing,
				$namesupp,
				$namewarehouse2,
				$datein2,
				$currency2,
				$transaksi_iditem2,
				$transaksi_price2,
				$transaksi_qtyin2,
				$transaksi_expiredate2,
				$userid
			);
			echo $cek;
		}
	}

	function addbundling()
	{
		$itemgroup = $this->input->post("itemgroup");
		$nameitem  = $this->input->post("nameitem");
		$link      = $this->input->post("link");
		$status    = $this->input->post("status");
		$sku       = $this->input->post("sku");
		$harga     = str_replace(".", "", $this->input->post("harga"));
		$iditem    = $this->input->post("iditem");
		$spec      = $this->input->post("spec");
		$userid    = $this->input->post("userid");
		$qty       = $this->input->post("qty");

		$cek       = $this->MasterData->addbundling($itemgroup, $nameitem, $link, $status, $sku, $harga, $spec, $userid, $iditem, $qty);
		echo $cek;
	}

	function additemtype()
	{
		$userid = $this->input->post("userid");
		$codeitemgroup = $this->input->post("codeitemgroup");
		$itemtype = $this->input->post("itemtype");
		$itemgroup = $this->input->post("itemgroup");
		$cek = $this->MasterData->additemtype($codeitemgroup, $itemtype, $itemgroup, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/additemtype');
	}

	function addsupplier()
	{
		$userid = $this->input->post("userid");
		$codesupp = $this->input->post("codesupp");
		$namesupp = $this->input->post("namesupp");
		$namacontact = $this->input->post("namacontact");
		$notelp = $this->input->post("notelp");
		$norekening = $this->input->post("norekening");
		$namabank = $this->input->post("namabank");
		$beneficiary = $this->input->post("beneficiary");
		$addressup = $this->input->post("addressupp");
		$cek = $this->MasterData->addsupplier($codesupp, $namesupp, $namacontact, $notelp, $addressup, $namabank, $norekening, $beneficiary, $userid);
		echo $cek;
	}

	function addlocitem()
	{
		$userid    = $this->input->post("userid");
		$codecomm  = $this->input->post("codecomm");
		$namecomm  = $this->input->post("namecomm");
		$attrib1   = $this->input->post("attrib1");
		$attrib2   = $this->input->post("attrib2");
		$attrib3   = $this->input->post("attrib3");
		$attrib4   = $this->input->post("attrib4");
		$cek       = $this->MasterData->addlocationitem($codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $userid);
		print_r($cek);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addlocitem');
	}

	function adduser()
	{
		// $userid = $this->input->post("userid");
		$username    = $this->input->post("username");
		$email       = $this->input->post("email");
		$idwarehouse = $this->input->post("warehouse");
		$role        = $this->input->post("roles");
		$password    = $this->input->post("password");
		$repassword  = $this->input->post("repassword");

		if ($repassword != $password) {
			$cek = "Please Insert Password With Correctly";
		} else {
			if (strlen($password) < 3) {
				$cek = " Plesae Insert Password More From 3 Character";
			} else {
				$cek = $this->MasterData->adduser($username, $email, $idwarehouse, $role, $password, $repassword);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/user');
	}


	function addwarehouse()
	{
		$userid = $this->input->post("userid");
		$codewarehouse = $this->input->post("codewarehouse");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->addwarehouse($codewarehouse, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addwarehouse');
	}

	function editcurrency()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->editcurrency($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatacurrencybyid?id=' . base64_encode($codewarehouse));
	}

	function editunit()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$cek = $this->MasterData->editunit($id, $namewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdataunitbyid?id=' . base64_encode($codewarehouse));
	}

	function editcard()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$nocard   = $this->input->post("nocard");
		$beneficiary = $this->input->post("beneficiary");
		$cek = $this->MasterData->editcard($id, $namewarehouse, $userid, $status, $nocard, $beneficiary);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatacardbyid?id=' . base64_encode($codewarehouse));
	}


	function edititem()
	{
		$id = $this->input->post("id");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$itemname = $this->input->post("itemname");
		$priceitem = $this->input->post("priceitem");
		$pricebuyitem = $this->input->post("pricebuyitem");
		$vat = $this->input->post("vat");
		$location = $this->input->post("idcomm");
		$sku = $this->input->post("sku");
		$itemtype = $this->input->post("itemtype");
		$min = $this->input->post("min");
		$max = $this->input->post("max");
		$pph = $this->input->post("pph");
		$sn = $this->input->post("sn");
		$cek = $this->MasterData->edititem($id, $itemname, $priceitem, $sku, $userid, $status, $itemtype, $min, $max, $pricebuyitem, number_format((float)$vat, 2, '.', ''), $location, $pph, $sn);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdataitembyid?id=' . base64_encode($id));
	}

	function editlockitem()
	{
		$codecomm      = $this->input->post("codecomm");
		$userid        = $this->input->post("userid");
		$id            = $this->input->post("id");
		$namecomm      = $this->input->post("namecomm");
		$attrib1       = $this->input->post("attrib1");
		$attrib2       = $this->input->post("attrib2");
		$attrib3       = $this->input->post("attrib3");
		$attrib4       = $this->input->post("attrib4");
		$cek           = $this->MasterData->editlockitem($id, $codecomm, $namecomm, $attrib1, $attrib2, $attrib3, $attrib4, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatalocitembyid?id=' . base64_encode($id));
	}

	function editsupplier()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->editsupplier($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatasupplierbyid?id=' . base64_encode($codewarehouse));
	}


	function edititemtype()
	{
		$id = $this->input->post("id");
		$codeitemgroup = $this->input->post("codeitemgroup");
		$itemtype = $this->input->post("itemtype");
		$itemgroup = $this->input->post("itemgroup");
		$userid = $this->input->post("userid");

		$cek = $this->MasterData->edititemtype($id, $itemtype, $itemgroup, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdataitemtypebyid?id=' . base64_encode($codeitemgroup));
	}

	function editlocitem()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->editsupplier($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatasupplierbyid?id=' . base64_encode($codewarehouse));
	}

	function edituser()
	{
		$id         = $this->input->post("id");
		$userid     = $this->input->post("userid");
		$username   = $this->input->post("username");
		$email      = $this->input->post("email");
		$warehouse  = $this->input->post("warehouse");
		$role       = $this->input->post("role");
		$password   = $this->input->post("password");
		$repassword = $this->input->post("repassword");
		if ($repassword != $password) {
			$cek = "Please Insert Password With Correctly";
		} else {
			if (strlen($password) < 3) {
				$cek = " Plesae Insert Password More From 3 Character";
			} else {
				$cek = $this->MasterData->edituser($id, $username, $email, $warehouse, $role, $password, $userid);
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/user');
	}


	function editwarehouse()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->editwarehouse($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatawarehousebyid?id=' . base64_encode($codewarehouse));
	}



	function getdatacurrencybyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getcurrencybyid($id);
		$this->load->view("SuperAdmin/EditCurrency", $f);
	}

	function getdataunitbyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdataunitbyid($id);
		$this->load->view("SuperAdmin/EditUnit", $f);
	}

	function getdatacardbyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdataunitbyid($id);
		$this->load->view("SuperAdmin/EditCard", $f);
	}



	function getdataitembyid()
	{
		$id = $this->input->get("id");
		$f  = $this->session->userdata("data");
		$f["data"]   = $this->MasterData->getdataitembyid($id);
		$f["data1"]  = $this->MasterData->getitemtype();
		$f["data2"]  = $this->MasterData->getunit();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Footer");
		$this->load->view("SuperAdmin/EditItem", $f);
	}

	function getdatalocitembyid()
	{
		$id        = $this->input->get("id");
		$f         = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatalockitembyid($id);
		$this->load->view("SuperAdmin/EditlocItem", $f);
	}


	function getdataitemtypebyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdataitemtypebyid($id);
		$f["data1"]          = $this->MasterData->getitemtype();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/EditItemType", $f);
	}

	function getdatasupplierbyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatasupplierbyid($id);
		$this->load->view("SuperAdmin/EditSupplier", $f);
	}


	function getdatauserbyid()
	{
		$id         = $this->input->get("id");
		$f          = $this->session->userdata("data");
		$this->load->model("MasterData");
		$f["data"]  = $this->MasterData->getdatauserbyid($id);
		$f["data1"] = $this->MasterData->getrole();
		$f["data2"] = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/EditUser", $f);
	}

	function getdatacustomerbyid()
	{
		$id = $this->input->get("id");
		$f  = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatacustomerbyid($id);
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Footer");
		$this->load->view("SuperAdmin/EditCustomer", $f);
	}

	function getdatawarehousebyid()
	{
		$id = $this->input->get("id");
		$f  = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatawarehousebyid($id);
		$this->load->view("SuperAdmin/Header", $f);
		$this->load->view("SuperAdmin/EditWarehouse", $f);
	}


	function deletecurrency()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletecurrency($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/currency');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatacurrencybyid?id=' . $id);
		}
	}

	function deleteitemtype()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletecurrency($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/item');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdataitemtypebyid?id=' . $id);
		}
	}

	function deleteunit()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deleteitemtype($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/unit');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdataunitbyid?id=' . $id);
		}
	}

	function deletecard()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletecard($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/card');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatacardbyid?id=' . $id);
		}
	}



	function deletecustomer()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletecustomer($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/customer');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatacustomerbyid?id=' . $id);
		}
	}

	function deleteitem()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deleteitem($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/item');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdataitembyid?id=' . $id);
		}
	}

	function deletesupplier()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletesupplier($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/supplier');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatasupplierbyid?id=' . $id);
		}
	}

	function deleteuser()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deleteuser($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/user');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatauserbyid?id=' . $id);
		}
	}

	function deletewarehouse()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletewarehouse($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/warehouse');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatawarehousebyid?id=' . $id);
		}
	}

	function addpo()
	{
		$idpox                   = $this->input->post("idpo");
		$codepo                  = $this->input->post("codepo");
		$idreqpo                 = $this->input->post("idreqpo");
		$codereqpo               = $this->input->post("codereqpo");
		$supplier                = $this->input->post("idsupp");
		$judulpurchase           = $this->input->post("judulpurchase");
		$datepo                  = $this->input->post("datepo");
		$delivedate              = $this->input->post("delivedate");
		$matauang                = $this->input->post("matauang");
		$exchange                = $this->input->post("exchange");
		$norekening              = $this->input->post("norekening");
		$subtotal                = str_replace(",", "", $this->input->post("subtotal"));
		$distrans                = str_replace(",", "", $this->input->post("distrans"));
		$ppn                     = str_replace(",", "", $this->input->post("ppn"));
		$grandtotal              = str_replace(",", "", $this->input->post("grandtotal"));

		$iditem                  = $this->input->post("iditem");
		$sku                     = $this->input->post("sku");
		$nameitem                = $this->input->post("nameitem");
		$harga                   = $this->input->post("harga");
		$qty                     = $this->input->post("qty");
		$discpercent             = $this->input->post("discpercent");
		$disnom                  = $this->input->post("disnom");
		$sub                     = $this->input->post("sub");
		$totaldisc               = $this->input->post("totaldisc");
		$total                   = $this->input->post("total");
		$iduser                  = $this->input->post("userid");

		// print_r($qty);


		$cek                     = $this->MasterData->addpo(
			$idpox,
			$codepo,
			$idreqpo,
			$codereqpo,
			$supplier,
			$judulpurchase,
			$datepo,
			$delivedate,
			$matauang,
			$exchange,
			$norekening,
			$subtotal,
			$distrans,
			$ppn,
			$grandtotal,

			$iditem,
			$sku,
			$nameitem,
			$harga,
			$qty,
			$disnom,
			$discpercent,
			$sub,
			$totaldisc,
			$total,
			$iduser
		);
		echo $cek;
	}

	function addporeq()
	{
		$codereqpo               = $this->input->post("codereqpo");
		$date                    = $this->input->post("date");
		$desc                    = $this->input->post("desc");
		$subtotal                = str_replace(",", "", $this->input->post("subtotal"));
		$grandtotal              = str_replace(",", "", $this->input->post("grandtotal"));
		$iditem                  = $this->input->post("iditem");
		$sku                     = $this->input->post("sku");
		$nameitem                = $this->input->post("nameitem");
		$harga                   = $this->input->post("harga");
		$qty                     = $this->input->post("qty");
		$total                   = $this->input->post("total");
		$iduser                  = $this->input->post("userid");


		$cek                     = $this->MasterData->addporeq(
			$codereqpo,
			$date,
			$desc,
			$subtotal,
			$grandtotal,
			$iditem,
			$sku,
			$nameitem,
			$harga,
			$qty,
			$total,
			$iduser
		);
		echo $cek;
	}

	function getdatapobyid()
	{
		$this->load->model("MasterData");
		$id           = $this->input->get("id");
		$f            = $this->session->userdata("data");
		$f["title"]   = "Register Purchase Order";
		$f["data"]    = $this->MasterData->getitemmaterial();
		$f["data1"]   = $this->MasterData->getwarehouse();
		$f["data2"]   = $this->MasterData->getcurrency();
		$f["data3"]   = $this->MasterData->getpo();
		$f["data4"]   = $this->MasterData->getlistpo();
		$f["data5"]   = $this->MasterData->getsupplier();
		$f["data6"]   = $this->MasterData->getcompany();
		$f["data7"]   = $this->MasterData->getdatapobyid($id);

		$f["stat"] = "";
		$f["headertrans"] = "Not Found";
		$f["detailtrans"] = "Not Found";

		$this->load->view("Superadmin/Header");
		$this->load->view("PO/EditPurchaseOrder", $f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->load->view("xfooter");
	}

	function additem()
	{
		$itemgroup           = $this->input->post("itemgroup");
		$nameitem            = $this->input->post("nameitem");
		$sku                 = $this->input->post("sku");
		$jenisitem           = $this->input->post("jenisitem");
		$stockmin            = $this->input->post("stockmin");
		$price               = $this->input->post("price");
		$deskripsi           = $this->input->post("deskripsi");
		$status              = $this->input->post("status");
		$userid              = $this->input->post("userid");
		$unit                = $this->input->post("unit");
		$transaksi_iditembom = $this->input->post("transaksi_iditembom");
		$transaksi_sku       = $this->input->post("transaksi_sku");
		$transaksi_nameitem  = $this->input->post("transaksi_nameitem");
		$transaksi_deskripsi = $this->input->post("transaksi_deskripsi");
		$transaksi_qty       = $this->input->post("transaksi_qty");

		if ($itemgroup == "nonbom") {
			$cek                   = $this->MasterData->additemnonbom(
				$itemgroup,
				$nameitem,
				$sku,
				$jenisitem,
				$stockmin,
				$price,
				$deskripsi,
				$status,
				$userid
			);
			echo $cek;
		} elseif ($itemgroup == "bom") {
			$cek                   = $this->MasterData->additembom(
				$itemgroup,
				$nameitem,
				$sku,
				$unit,
				$stockmin,
				$price,
				$deskripsi,
				$status,
				$userid
			);
			echo $cek;
		} elseif ($itemgroup == "usebom") {
			$cek                   = $this->MasterData->additemusebom(
				$itemgroup,
				$nameitem,
				$sku,
				$jenisitem,
				$price,
				$deskripsi,
				$status,
				$userid,
				$transaksi_iditembom,
				$transaksi_sku,
				$transaksi_nameitem,
				$transaksi_deskripsi,
				$transaksi_qty

			);
			echo $cek;
		}
	}

	function additemproduk()
	{
		$itemgroup           = $this->input->post("itemgroup");
		$nameitem            = $this->input->post("nameitem");
		$sku                 = $this->input->post("sku");
		$jenisitem           = $this->input->post("jenisitem");
		$stokmin             = $this->input->post("stokmin");
		$price               = $this->input->post("price");
		$deskripsi           = $this->input->post("deskripsi");
		$status              = $this->input->post("status");
		$userid              = $this->input->post("iduser");
		$cek                 = $this->MasterData->additemproduk($itemgroup, $nameitem, $sku, $jenisitem, $stokmin, $price, $deskripsi, $status, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/Produk');
	}

	function newcustomer()
	{
		$codecust     = $this->input->post("codecust");
		$typecust	  = $this->input->post("typecust");
		$namecomp     = $this->input->post("namaperusahaan");
		$nocontact    = $this->input->post("nocontact");
		$email        = $this->input->post("email");
		$notelp       = $this->input->post("notelp");
		$alamat       = $this->input->post("alamat");
		$namabank     = $this->input->post("namabank");
		$norekening   = $this->input->post("norekening");
		$beneficiary  = $this->input->post("beneficiary");
		$userid       = $this->input->post("userid");
		$cek          = $this->MasterData->newcustomer($codecust, $typecust, $namecomp, $nocontact, $email, $notelp, $alamat, $userid, $namabank, $norekening, $beneficiary);
		echo $cek;
	}

	function editcust()
	{
		$codecust     = $this->input->post("codecust");
		$typecust	  = $this->input->post("typecust");
		$namecomp     = $this->input->post("namaperusahaan");
		$nocontact    = $this->input->post("nocontact");
		$email        = $this->input->post("email");
		$notelp       = $this->input->post("notelp");
		$alamat       = $this->input->post("alamat");
		$userid       = $this->input->post("iduser");
		$namabank     = $this->input->post("namabank");
		$norekening   = $this->input->post("norekening");
		$beneficiary  = $this->input->post("beneficiary");
		$cek          = $this->MasterData->editcust($codecust, $typecust, $namecomp, $nocontact, $email, $notelp, $alamat, $userid, $namabank, $norekening, $beneficiary);
		echo $cek;
	}


	function addsalesorder()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idwh                  = $this->input->post("idwh");
		$idso                  = $this->input->post("idso");
		$codeso                  = $this->input->post("codeso");
		$statusso                  = $this->input->post("statusso");
		$idquo                   = $this->input->post("idquo");
		$tipeorder               = $this->input->post("tipeorder");
		$idcust                  = $this->input->post("idcustx");
		$dateso                  = $this->input->post("dateso");
		$delivdate               = $this->input->post("delivdate");
		$nopesanan               = $this->input->post("nopesanan");
		$nocontact               = $this->input->post("nocontact");
		$delivaddr               = $this->input->post("delivaddr");
		$paymentmethod           = $this->input->post("paymentmethod");
		$norekening              = $this->input->post("norekening");
		$subtotal                = str_replace(",", "", $this->input->post("subtotal"));
		$disnom                  = $this->input->post("disnom");
		$disper                  = $this->input->post("disper");
		$totaldisc               = str_replace(",", "", $this->input->post("totaldisc"));
		$vat                     = str_replace(",", "", $this->input->post("vat"));
		$ongkir                  = str_replace(",", "", $this->input->post("ongkir"));
		$grandtotaldetail        = str_replace(",", "", $this->input->post("grandtotal"));

		$transaksi_iditem        = $this->input->post("transaksi_iditem");
		$transaksi_sku           = $this->input->post("transaksi_sku");
		$transaksi_nameitem      = $this->input->post("transaksi_nameitem");
		$transaksi_deskripsi     = $this->input->post("transaksi_deskripsi");
		$transaksi_price         = $this->input->post("transaksi_price");
		$transaksi_qty           = $this->input->post("transaksi_qty");
		$transaksi_total         = $this->input->post("transaksi_total");
		$transaksi_discnominal   = $this->input->post("transaksi_discnominal");
		$transaksi_discpersen    = $this->input->post("transaksi_discpersen");
		$transaksi_grandtotal    = $this->input->post("transaksi_grandtotal");
		// $iduser                  = $this->input->post("userid");


		$cek                     = $this->MasterData->addso(
			$idwh,
			$idso,
			$codeso,
			$statusso,
			$idquo,
			$tipeorder,
			$idcust,
			$dateso,
			$delivdate,
			$nopesanan,
			$nocontact,
			$delivaddr,
			$paymentmethod,
			$norekening,
			$subtotal,
			$disnom,
			$disper,
			$totaldisc,
			$vat,
			$ongkir,
			$grandtotaldetail,

			$transaksi_iditem,
			$transaksi_sku,
			$transaksi_nameitem,
			$transaksi_deskripsi,
			$transaksi_price,
			$transaksi_qty,
			$transaksi_total,
			$transaksi_discnominal,
			$transaksi_discpersen,
			$transaksi_grandtotal,
			$iduser
		);

		echo $cek;
	}

	function cancelorder()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$idso                  = $this->input->post("idso");
		$idquo                  = $this->input->post("idquo");
		$cek = $this->MasterData->cancelorder($idso, $idquo, $iduser);
		echo $cek;
	}
}
