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
		$f = $this->session->userdata("data");
		$idrole = $this->input->post("idrole");
		$namerole = $this->input->post("namerole");
		$role = $this->input->post("role");
		$cek = $this->MasterData->addroleuser($namerole, $role, $iduser);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addroleuser');
	}

	function editrole()
	{
		$f = $this->session->userdata("data");
		$idrole = $this->input->post("idrole");
		$role = $this->input->post("role");
		$iduser = $f["iduser"];

		$cek = $this->MasterData->editroleuser($role, $idrole, $iduser);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcurrency');
	}

	function addunit()
	{
		$userid = $this->input->post("userid");
		$codecurrency = $this->input->post("codecurrency");
		$namecurrency = $this->input->post("namecurrency");

		$cek = $this->MasterData->addunit($codecurrency, $namecurrency, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcard');
	}

	function addcustomer()
	{
		$userid = $this->input->post("userid");
		$namecustomer = $this->input->post("namecustomer");
		$phonecustomer = $this->input->post("phonecustomer");
		$addresscustomer = $this->input->post("addresscustomer");
		$codecustomer = $this->input->post("codecustomer");
		$cek = $this->MasterData->addcustomer($namecustomer, $phonecustomer, $addresscustomer, $codecustomer, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addcustomer');
	}


	function additem()
	{
		$userid = $this->input->post("userid");
		$itemname = $this->input->post("itemname");
		$priceitem = $this->input->post("priceitem");
		$sku = $this->input->post("sku");
		$itemtype = $this->input->post("itemtype");
		$min = $this->input->post("min");
		$max = $this->input->post("max");
		$vat = $this->input->post("vat");
		$location = $this->input->post("idcomm");
		$pph = $this->input->post("pph");
		$sn = $this->input->post("sn");
		$purcahaseitem = $this->input->post("purcahaseitem");
		$cek = $this->MasterData->additem($itemname, $priceitem, $sku, $userid, $min, $max, $itemtype, $vat, $location, $purcahaseitem, $pph, $sn);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/additem');
	}

	function additemtype()
	{
		$userid = $this->input->post("userid");
		$itemname = $this->input->post("itemname");
		$codeitem = $this->input->post("codeitem");
		$cek = $this->MasterData->additemtype($itemname, $codeitem, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/additemtype');
	}

	function addsupplier()
	{
		$userid = $this->input->post("userid");
		$namecustomer = $this->input->post("namecustomer");
		$phonecustomer = $this->input->post("phonecustomer");
		$addresscustomer = $this->input->post("addresscustomer");
		$codecustomer = $this->input->post("codecustomer");
		$cek = $this->MasterData->addsupplier($namecustomer, $phonecustomer, $addresscustomer, $codecustomer, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addsupplier');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/addlocitem');
	}

	function adduser()
	{
		$userid = $this->input->post("userid");
		$photo = $_FILES["photo"]["tmp_name"];
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$repassword = $this->input->post("repassword");
		$email = $this->input->post("email");
		$fullname = $this->input->post("fullname");
		$address = $this->input->post("address");
		$phone = $this->input->post("phone");
		$status = $this->input->post("status");

		if ($repassword != $password) {
			$cek = "Please Insert Password With Correctly";
		} else {
			if (strlen($password) < 3) {
				$cek = " Plesae Insert Password More From 3 Character";
			} else {
				$cek = $this->MasterData->adduser($username, $password, $email, $fullname, $address, $phone, $status, $userid, $photo);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/adduser');
	}

	function addwarehouse()
	{
		$userid = $this->input->post("userid");
		$codewarehouse = $this->input->post("codewarehouse");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$typewarehouse = $this->input->post("typewarehouse");
		$cek = $this->MasterData->addwarehouse($codewarehouse, $namewarehouse, $addresswarehouse, $phonewarehouse, $typewarehouse, $userid);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatacardbyid?id=' . base64_encode($codewarehouse));
	}




	function editcustomer()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$cek = $this->MasterData->editcustomer($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatacustomerbyid?id=' . base64_encode($codewarehouse));
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
		$cek = $this->MasterData->edititem($id, $itemname, $priceitem, $sku, $userid, $status, $itemtype, $min, $max, $pricebuyitem, $vat, $location, $pph, $sn);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatasupplierbyid?id=' . base64_encode($codewarehouse));
	}


	function edititemtype()
	{
		$id = $this->input->post("id");
		$codeitem = $this->input->post("codeitem");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$nameitem = $this->input->post("itemname");

		$cek = $this->MasterData->edititemtype($id, $nameitem, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdataitemtypebyid?id=' . base64_encode($codeitem));
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
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatasupplierbyid?id=' . base64_encode($codewarehouse));
	}

	function edituser()
	{
		$id = $this->input->post("id");
		$userid = $this->input->post("userid");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$repassword = $this->input->post("repassword");
		$email = $this->input->post("email");
		$fullname = $this->input->post("fullname");
		$address = $this->input->post("address");
		$phone = $this->input->post("phone");
		$status = $this->input->post("status");
		$role = $this->input->post("role");
		$photo = $_FILES["photo"]["tmp_name"];
		if ($repassword != $password) {
			$cek = "Please Insert Password With Correctly";
		} else {
			if (strlen($password) < 3) {
				$cek = " Plesae Insert Password More From 3 Character";
			} else {
				$cek = $this->MasterData->edituser($username, $password, $email, $fullname, $address, $phone, $status, $userid, $id, $photo, $role);
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('MasterDataControler/getdatauserbyid?id=' . base64_encode($id));
	}

	function editwarehouse()
	{
		$id = $this->input->post("id");
		$codewarehouse = $this->input->post("codewarehouse");
		$userid = $this->input->post("userid");
		$status = $this->input->post("status");
		$namewarehouse = $this->input->post("namewarehouse");
		$addresswarehouse = $this->input->post("addresswarehouse");
		$phonewarehouse = $this->input->post("phonewarehouse");
		$typewarehouse = $this->input->post("typewarehouse");
		$cek = $this->MasterData->editwarehouse($id, $namewarehouse, $addresswarehouse, $phonewarehouse, $typewarehouse, $userid, $status);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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

	function getdatacustomerbyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatacustomerbyid($id);
		$this->load->view("SuperAdmin/EditCustomer", $f);
	}

	function getdataitembyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdataitembyid($id);
		$f["data1"] = $this->MasterData->getitemtype();
		$f["data2"] = $this->MasterData->getitemnamelocation();
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
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		$f["data"] = $this->MasterData->getdatauserbyid($id);
		$f["data1"] = $this->MasterData->getrole();
		$this->load->view("SuperAdmin/EditUser", $f);
	}



	function getdatawarehousebyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getdatawarehousebyid($id);
		$this->load->view("SuperAdmin/EditWarehouse", $f);
	}


	function deletecurrency()
	{
		$id = $this->input->post("id");
		$cek = $this->MasterData->deletecurrency($id);
		if ($cek == "Success") {
			redirect('SuperAdminControler/currency');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
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
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
			redirect('MasterDataControler/getdatawarehousebyid?id=' . $id);
		}
	}
}
