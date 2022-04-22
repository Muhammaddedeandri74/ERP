<?php


class SuperAdminControler extends CI_Controller
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


	 function user()
	{
		$f["title"]          = "User";
		$f["data"]           = $this->MasterData->getdatausers();
		$this->load->view("SuperAdmin/Header",$f);
		$this->load->view("SuperAdmin/User",$f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "user manage dashboard");
	}

	function adduser()
	{
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		$f["data"]  = $this->MasterData->getrole();
		$f["data1"] = $this->MasterData->getwarehouse();

		$this->load->view("SuperAdmin/Header", $f);
		$this->load->view("SuperAdmin/AddUser", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "adduser");
	}

	function locitem()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "locitem";
		$f["data"] = $this->MasterData->getitemloc();
		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/locitem");
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "item manage dashboard");
	}


	function addlocitem()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getitemloc();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Addlocitem", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addlocitem");
	}
	public function item()
	{
		$f["title"]          = "List Item";
		$f["data"]           = $this->MasterData->getitem();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Item",$f);
		$this->load->view("SuperAdmin/Footer");

		// $this->MasterData->userlog($f["iduser"], "item manage dashboard");
	}

	function additem()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getitemtype();
		$f["data1"] = $this->MasterData->getitem();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/AddItem", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "additem");
	}

	function Produk()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]   = $this->MasterData->getitemmaterial();
		$f["data1"]  = $this->MasterData->getunitmaterial();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Produk", $f);
	}

	function BahanMaterial()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"]  = $this->MasterData->getitemtype();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/BahanMaterial", $f);
	}

	function addbundling()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getitemtype();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/AddBundling", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "additem");
	}

	function additemtype()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getitemtype();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header", $f);
		$this->load->view("SuperAdmin/AddItemType", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "additemtype");
	}


	function warehouse()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "warehouse";
		$f["data"] = $this->MasterData->getwarehouse();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Warehouse",$f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "warehouse manage dashboard");
	}

	function addwarehouse()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getwarehouse();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/AddWarehouse", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addwarehouse");
	}



	function customer()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "customer";
		$f["data"] = $this->MasterData->getcustomer();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Customer",$f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "customer manage dashboard");
	}

	function addcustomer()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getcustomer();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header", $f);
		$this->load->view("SuperAdmin/AddCustomer", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addcustomer");
	}

	function bundling()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "Bundling";
		$f["data"] = $this->MasterData->getbundling();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Bundling",$f);
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "customer manage dashboard");
	}
	function supplier()
	{
		$this->load->library('pagination');

		//pagination settings
		$dari      = $this->uri->segment('3');
		$sampai    = 50;

		$like      = '';

		//hitung jumlah row
		$jumlah = $this->MasterData->jumlahsupplier();

		//inisialisasi array
		$config = array();

		//set base_url untuk setiap link page
		$config['base_url']         = base_url() . 'SuperAdminControler/supplier';

		//hitung jumlah row
		$config['total_rows'] = $jumlah;

		//mengatur total data yang tampil per page
		$config['per_page']   = $sampai;

		//mengatur jumlah nomor page yang tampil
		$config['num_links']  = $jumlah;

		//mengatur tag
		$config['num_links'] = 1;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);
		$f = $this->session->userdata("data");

		//inisialisasi array
		$data = array();

		// get item list
		$f["title"] = "supplier";
		$f["data"]  = $this->MasterData->getsupplierpagination($sampai, $dari, $like);

		//Membuat link
		$str_links  = $this->pagination->create_links();
		$f["links"] = explode('&nbsp;', $str_links);

		// load view

		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/Supplier");
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "supplier manage supplier");
	}
	function searchsupplier()
	{
		$this->load->library('pagination');

		//mengambil nilai keyword dari form pencarian
		$search = (trim($this->input->post('key', true))) ? trim($this->input->post('key', true)) : '';

		//jika uri segmen 3 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 3
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;


		//mengambil nilari segmen 4 sebagai offset
		$dari   = $this->uri->segment('4');

		//limit data yang ditampilkan
		$sampai  = 10;

		//inisialisasi variabel $like
		$like      = '';

		//mengisi nilai variabel $like dengan variabel $search, digunakan sebagai kondisi untuk menampilkan data
		if ($search) $like = "(codecomm LIKE '%$search%' OR namecomm LIKE '%$search%' OR attrib1 LIKE '%$search%')";
		//hitung jumlah row
		$jumlah = $this->MasterData->jumlahsupplier($like);

		//inisialisasi array
		$config = array();

		//set base_url untuk setiap link page
		$config['base_url']         = base_url() . 'SuperAdminControler/searchsupplier/' . $search;

		//hitung jumlah row
		$config['total_rows'] = $jumlah;

		//mengatur total data yang tampil per page
		$config['per_page']   = $sampai;

		//mengatur jumlah nomor page yang tampil
		$config['num_links'] = $jumlah;

		//mengatur tag
		$config['num_links'] = 0;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$this->pagination->initialize($config);

		//inisialisasi array
		$data = array();

		// get item list
		$f = $this->session->userdata("data");
		$f['title'] = 'Cari Supplier';

		$f["data"]           = $this->MasterData->getsupplierpagination($sampai, $dari, $like);
		//Membuat link
		$str_links  = $this->pagination->create_links();
		$f["links"] = explode('&nbsp;', $str_links);

		// load view

		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/searchsupplier", $f);
		$this->load->view("SuperAdmin/Footer");

		$this->MasterData->userlog($f["iduser"], "item manage dashboard");
	}

	function addsupplier()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getsupplier();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/AddSupplier", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addsupplier");
	}


	function currency()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "currency";
		$f["data"] = $this->MasterData->getcurrency();
		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/Currency");
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "currency manage dashboard");
	}

	function addcurrency()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getcurrency();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/AddCurrency", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addcurrency");
	}


	function unit()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "unit";
		$f["data"] = $this->MasterData->getunit();
		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/Unit");
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "unit manage dashboard");
	}

	function addunit()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getunit();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/AddUnit", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addunit");
	}

	function card()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "card";
		$f["data"] = $this->MasterData->getcard();
		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/Card");
		$this->load->view("SuperAdmin/Footer");
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "bank manage dashboard");
	}

	function addcard()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getcard();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/AddCard", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "addbank");
	}


	function company()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "company";
		$f["data"] = $this->MasterData->getcompany();
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/Company", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "company profile");
	}

	function addcompany()
	{
		$this->load->Model("MasterData");
		$idcomp         = $this->input->post("idcomp");
		$logo           = $this->input->post("logo");
		$namecomp       = $this->input->post("namecomp");
		$email          = $this->input->post("email");
		$nokantor       = $this->input->post("nokantor");
		$nohandphone    = $this->input->post("nohandphone");
		$alamat         = $this->input->post("alamat");
		$bank           = $this->input->post("bank");
		$norekening     = $this->input->post("norekening");
		$beneficiary    = $this->input->post("beneficiary");
		$remarkinvoice  = $this->input->post("remarkinvoice");
		$remarkquotation = $this->input->post("remarkquotation");
		$cek = $this->MasterData->addcompany($logo,$namecomp,$email, $nokantor, $nohandphone, $alamat, $bank, $norekening,$beneficiary,$remarkinvoice,$remarkquotation);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $cek . '</div>');
		redirect('SuperAdminControler/company');
	}

	function editcompany()
	{
		$this->load->Model("MasterData");
		$idcomp = $this->input->post("idcomp");
		$namecomp = $this->input->post("namecomp");
		$dir = $this->input->post("dir");
		$phone = $this->input->post("phone");
		$fax = $this->input->post("fax");
		$addr = $this->input->post("addr");
		$email = $this->input->post("email");
		$website = $this->input->post("website");
		$titleremark = $this->input->post("titleremark");
		$bodyremark = $this->input->post("bodyremark");
		$photo = $_FILES["photo"]["tmp_name"];
		$cek = $this->MasterData->editcomp($idcomp, $namecomp, $phone, $fax, $addr, $email, $website, $titleremark, $bodyremark, $photo, $dir);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "edit company profile");
		redirect('SuperAdminControler/company');
	}

	function userrole()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["title"] = "userrole";
		$f["data"] = $this->MasterData->getroleuser();
		$this->load->view("SuperAdmin/SuperAdmin", $f);
		$this->load->view("SuperAdmin/userrole", $f);
		$this->load->view("SuperAdmin/Footer");
		$this->MasterData->userlog($f["iduser"], "User Role");
	}

	function saveuserrole()
	{
		$f = $this->session->userdata("data");
		$iduser = $f["iduser"];
		$sales = $this->input->post('sales');
		$counter = $this->input->post('counter');
		$warehouse = $this->input->post('warehouse');
		$purchasing = $this->input->post('purchasing');
		$qc = $this->input->post('qc');
		$cek = $this->MasterData->userrole($sales, $counter, $warehouse, $purchasing, $qc, $iduser);
		$this->MasterData->userlog($f["iduser"], "edit User Role");
		redirect('SuperAdminControler/userrole');
	}

	function addtypeorder()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/addtypeorder", $f);
	}

	function addroleuser()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getrole();
		$this->load->model("MasterData");
		$this->load->view("SuperAdmin/Header");
		$this->load->view("SuperAdmin/addroleuser", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Add User Role Page");
	}


	function gethistory()
	{
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$f["data2"] = $this->MasterData->gethistory($start, $end);
		echo json_encode($f["data2"]);
	}

	function userhistory()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$f["data"] = $this->MasterData->getuser();
		$f["data1"] = $this->MasterData->getrole();

		$f["data3"] = $this->MasterData->getuseractive();
		$this->load->view("SuperAdmin/userhistory", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Check User history");
	}

	function managerole()
	{
		$this->load->Model("MasterData");
		$f = $this->session->userdata("data");
		$idrole = $this->input->get("xxx");
		$f["data"] = $this->MasterData->getrolebyid(base64_decode($idrole));

		$this->load->view("SuperAdmin/managerole", $f);
		$f = $this->session->userdata("data");
		$this->MasterData->userlog($f["iduser"], "Manage Role");
	}
}
