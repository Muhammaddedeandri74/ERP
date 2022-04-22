<?php



class AuthControler extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model("MasterData");
		$this->load->model("Quotation");
		$this->load->model("Request");
		$this->load->model("MPrQuo");
		date_default_timezone_set('Asia/Jakarta');
	}
	public function login()
	{
		$this->load->model("Auth");
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cek = $this->Auth->login($username, $password);
		if ($cek["pesan"] == "LOGIN") {
			$this->session->set_userdata($cek);
			$f = $this->session->userdata("data");
			$this->MasterData->userlog($f["iduser"], "login");
			redirect('AuthControler/mainpage');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek["pesan"] . '</div>');
			redirect('');
		}
	}

	public function mainpage()
	{
		$f = $this->session->userdata("data");
		$this->load->Model("MasterData");
		$f["title"] = "user";

		$date = date("Y-m-d H:i:s");
		$this->load->model("Auth");
		$this->load->model("MasterData");

		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session == "Session on") {

			if ($f["admin"] == "Yes") {
				$f["data"] = $this->MasterData->getuser();
				$f["data1"] = $this->MasterData->getitem();
				$f["data2"] = $this->MasterData->getwarehouse();
				$f["data4"] = $this->MasterData->getcustomer();
				$f["data3"] = $this->MasterData->getsupplier();
				$f["title"] = "Overview";
				$this->load->view("SuperAdmin/Header");
				$this->load->view("SuperAdmin/SuperAdmin", $f);
				$this->load->view("SuperAdmin/Overview", $f);
				$this->load->view("SuperAdmin/footer");
				$this->MasterData->userlog($f["iduser"], "overviewpage");
			} else {
				$this->employe();
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
	}


	public function profiluser()
	{

		$f  = $this->session->userdata("data");
		$this->load->model("MasterData");
		$f["title"]  = "Profile User";
		$f["data"]   = $this->MasterData->getdatauserbyid(base64_encode($f["iduser"]));
		$f["data1"]  = $this->MasterData->getrole();
		$this->load->view("SuperAdmin/Profileuser", $f);
	}

	public function getdatauserbyid()
	{
		$id = $this->input->get("id");
		$f = $this->session->userdata("data");
		$this->load->model("MasterData");
		$f["data"] = $this->MasterData->getdatauserbyid($id);
		$f["data1"] = $this->MasterData->getrole();
		$this->load->view("SuperAdmin/ProfileUser", $f);
	}

	public function editprofileuser()
	{
		$userid     = $this->input->post("userid");
		$username   = $this->input->post("username");
		$password   = $this->input->post("password");
		$repassword = $this->input->post("repassword");
		$email      = $this->input->post("email");
		$fullname   = $this->input->post("fullname");
		$address    = $this->input->post("address");
		$phone      = $this->input->post("phone");
		$status     = $this->input->post("status");
		$role       = $this->input->post("role");
		$photo      = "";

		if ($repassword != $password) {
			$cek = "Please Insert Password With Correctly";
		} else {
			if (strlen($password) < 3) {
				$cek = " Plesae Insert Password More From 3 Character";
			} else {
				$id  = $userid;
				$cek = $this->MasterData->edituser($username, $password, $email, $fullname, $address, $phone, $status, $userid, $id, $photo, $role);

				if ($cek = "Success") {

					$x = $this->session->userdata("data");
					$data["pesan"] = "login";
					$data["data"]  = array();
					$f["iduser"]   = $userid;
					$f["username"] = $username;
					$f["password"] = $password;
					$f["email"]    = $email;
					$f["fullname"] = $fullname;
					$f["address"]  = $address;
					$f["phone"]    = $phone;
					$f["status"]   = $status;
					$f["role"]     = $role;
					$f["photo"]    = $photo;

					$f["data"]   = $x["data"];

					$data["data"] = $f;
					$this->session->unset_userdata("data");
					$this->session->set_userdata($data);
				}
			}
		}

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $cek . '</div>');
		redirect('AuthControler/getdatauserbyid?id=' . base64_encode($id));
	}




	public function logout()
	{
		$this->load->model("Auth");
		$f = $this->session->userdata("data");
		$this->session->unset_userdata("data");
		$this->Auth->deletesession($f["iduser"]);
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">You Has Logout</div>');
		$this->MasterData->userlog($f["iduser"], "logout");
		redirect('');
	}


	public function employe()
	{
		$f = $this->session->userdata("data");
		$this->load->Model("MasterData");
		$f["finish"] = $this->input->get("finish");
		$f["title"] = "user";

		$date = date("Y-m-d");
		if (!isset($f["finish"])) {
			$f["finish"] = $date;
		}
		$this->load->model("Auth");
		$this->load->model("MasterData");


		$session = $this->Auth->ceksession($f["iduser"], $date);
		if ($session    == "Session on") {
			$f["data"]  = $this->session->userdata("data");
			$f["title"] = "dashboard";

			$f["data5"] = $this->MasterData->getcustomer();
			$f["data7"] = $this->MasterData->getitemwh();
			$f["data8"] = $this->MasterData->getitem();

			$f["salesorder"] = $this->MasterData->getsalesorderbydate($f["finish"]);
			$f["jasa"]       = $this->MasterData->getjasapengirimbydate($f["finish"]);
			$f["waiting"]    = $this->MasterData->getsalesorderwaitingbydate($f["finish"]);
			$f["pending"]    = $this->MasterData->getsalesorderpendingbydate($f["finish"]);
			$f["process"]    = $this->MasterData->getsalesorderprocessbydate($f["finish"]);
			$f["cancel"]     = $this->MasterData->getsalesordercancelbydate($f["finish"]);
			$f["finis"]      = $this->MasterData->getsalesorderfinishbydate($f["finish"]);
			$f["quotation"]  = $this->MasterData->getquotationbydates($f["finish"]);
			$f["po"]         = $this->MasterData->getlistpobydate($f["finish"]);
			$f["invoice"]    = $this->MasterData->getlistinvoicebydate($f["finish"]);
			$f["persentase"] = $this->MasterData->getsalesorderpersentasebydate($f["finish"]);
			$f["chartbar"]   = $this->MasterData->getsalesorderjumlahbydate($f["finish"]);

			$this->load->model("Auth");
			$this->load->view("Employe/header");
			$this->load->view("Employe/sidebar", $f);
			$this->load->view("Employe/dashboardmain");
			$this->load->view("Employe/footer");
			$f = $this->session->userdata("data");
			$this->MasterData->userlog($f["iduser"], "dashboardemploye");
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Your Session Has Expired</div>');
			$this->session->unset_userdata("data");
			redirect('');
		}
	}
}
