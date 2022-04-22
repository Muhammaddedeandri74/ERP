<?php 


	class RequestControler extends CI_Controller
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
			$this->load->model("Request");
		}

		function quotation()
		{	
			$f = $this->session->userdata("data");
				$cek["data"]  =$this->MasterData->getcustomer();
				$cek["data1"]  =$this->MasterData->getitem();
				$cek["seq"]  =$this->Request->getlastrequestseq();
				$f["title"] = "Offering";
				$this->load->view("templates/header");
				$this->load->view("templates/sidebar",$f);
				$this->load->view("templates/topbar",$f);		
				$this->load->view("Request/Quoatation",$cek,$f);		
				$this->load->view("templates/footer");	

		}

		function getitemdata()
		{
			$id =$this->input->post("id");
			$cek = $this->MasterData->getdataitembyid($id);
			echo json_encode($cek);
		}

		function quotationinsert()
		{
			$transdate = $this->input->post("transdate");
			$transeq = $this->input->post("transeq");
			$idcust = $this->input->post("idcust");
			$iduser = $this->input->post("iduser");
			$item = $this->input->post("item");
			$qty = $this->input->post("qty");

			$cek = $this->Request->insertquotation($transdate,$transeq,$idcust,$item,$qty,$iduser);
			
			if ($cek == "Success") 
			{
				redirect(base_url('OrderControler/salesorder'));
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">Your Quotation cant save, please try again</div>');
				redirect(base_url('RequestControler/quotation'));
			}

		}


		function import()
		{
			$f = $this->session->userdata("data");
			$cek["random"] = "";
			if (isset($_POST["id"])) {
				$cek["random"] = $_POST["id"];
				$cek["data"]  =$this->MasterData->getcustomer();
				$cek["data1"]  =$this->MasterData->getitem();
				$cek["seq"]  =$this->Request->getlastrequestseq();
				$f["title"] = "Offering";
				$this->load->view("templates/header");
				$this->load->view("templates/topbar",$f);		
				$this->load->view("Request/Import",$cek,$f);		
				$this->load->view("templates/footer");	
			}
			else
			{
				$cek["data"]  =$this->MasterData->getcustomer();
				$cek["data1"]  =$this->MasterData->getitem();
				$cek["seq"]  =$this->Request->getlastrequestseq();
				$f["title"] = "Offering";
				$this->load->view("templates/header");
				$this->load->view("templates/sidebar",$f);
				$this->load->view("templates/topbar",$f);		
				$this->load->view("Request/Import",$cek,$f);		
				$this->load->view("templates/footer");	
			}
				
				
			
		}

	}







 ?>