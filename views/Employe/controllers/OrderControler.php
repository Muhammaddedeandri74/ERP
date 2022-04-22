<?php 


	class OrderControler extends CI_Controller
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
			$this->load->model("Order");
		}

		function salesorder()
		{
				$f = $this->session->userdata("data");
				$cek["data"]  =$this->MasterData->getcustomer();
				$cek["data3"]  =$this->MasterData->getwarehouse();
				$cek["data2"]  =$this->Order->getrequest();
				$cek["seq"] = $this->Order->getlastorderseq();
				$cek["data1"]  =$this->MasterData->getitem();
				$f["title"] = "Order";
				$this->load->view("templates/header");
				$this->load->view("templates/sidebar",$f);
				$this->load->view("templates/topbar",$f);		
				$this->load->view("Order/SalesOrder",$cek,$f);		
				$this->load->view("templates/footer");	
		}

		function insertsalesorder()
		{
			$transdate = $this->input->post("transdate");
			$transeq = $this->input->post("transeq");
			$idcust = $this->input->post("idcust");
			$iduser = $this->input->post("iduser");
			$subtotal = $this->input->post("subtotal");
			$disc1 = $this->input->post("disc1");
			$ppn = $this->input->post("ppn");
			$grantotal = $this->input->post("grandtotal");
			$item = $this->input->post("item");
			$qty = $this->input->post("qty");
			$price = $this->input->post("price");
			$disc = $this->input->post("disc");
			$total = $this->input->post("total");
			$warehouse = $this->input->post("warehouse");
			$cek = $this->Order->insertsalesorder($transdate,$transeq,$idcust,$iduser,$subtotal,$disc1,$ppn,$grantotal,$item,$qty,$price,$disc,$total,$warehouse);
			if ($cek == "Success") {
				redirect(base_url('OrderControler/listsalesorder'));
			}
			else
			{
				$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">Your Order cant save, please try again</div>');
				redirect(base_url('OrderControler/salesorder'));
			}

		}


		function listsalesorder()
		{
				$f = $this->session->userdata("data");
				$cek["data"] = $this->Order->getlistorder();
				$f["title"] = "Order";
				$this->load->view("templates/header");
				$this->load->view("templates/sidebar",$f);
				$this->load->view("templates/topbar",$f);		
				$this->load->view("Order/ListSalesOrder",$cek,$f);		
				$this->load->view("templates/footer");	
		}

		function salesorderdetail()
		{
			$cek["transdate"] = $this->input->post("transdate");
			$cek["transeq"] = $this->input->post("transeq");
			$cek["noorder"] = $this->input->post("noorder");
			$cek["namecust"] = $this->input->post("namecust");
			$cek["total"] = $this->input->post("total");
			$cek["status"] = $this->input->post("status");
			$cek["idwarehouse"] = $this->input->post("idwarehouse");
			$cek["namewarehouse"] = $this->input->post("namewarehouse");

			$f = $this->session->userdata("data");
			$cek["data"] = $this->Order->salesorderdetail($cek["noorder"],$cek["idwarehouse"]);
			$f["title"] = "Order";
			$this->load->view("templates/header");
			$this->load->view("templates/sidebar",$f);
			$this->load->view("templates/topbar",$f);		
			$this->load->view("Order/SalesOrderDetail",$cek,$f);		
			$this->load->view("templates/footer");	
		}



	}




 ?>