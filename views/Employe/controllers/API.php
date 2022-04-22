<?php 


	class API extends CI_Controller
	{
		function login()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$username =$this->input->post("username");
			$password =$this->input->post("password");
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->login($username,$password);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function getchartsellbuy()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$iduser =$this->input->post("iduser");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->getchartsellbuy($iduser);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function chartsellbuycurency()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$iduser =$this->input->post("iduser");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->chartsellbuycurency($iduser);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function sellheader()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$iduser =$this->input->post("iduser");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->sellheader($iduser);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function selldetail()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$transdate =$this->input->post("transdate");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->selldetail($transdate);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function buyheader()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$iduser =$this->input->post("iduser");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->buyheader($iduser);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

		function buydetail()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$transdate =$this->input->post("transdate");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->buydetail($transdate);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}


		function selldata()
		{
			$this->load->model("APIModel");
			$valid = $this->input->post("valid");
			$transdate =$this->input->post("transdate");			
			$transeq =$this->input->post("transeq");			
			$validasi = $this->APIModel->validasi($valid);
			if ($validasi == true) {
				$cek = $this->APIModel->selldata($transdate,$transeq);
			}
			else
			{
				$respon["pesan"] = "You Not Have Authority";
				$respon["kode"] = 0;
				echo json_encode($respon);
			}
		}

	}



 ?>