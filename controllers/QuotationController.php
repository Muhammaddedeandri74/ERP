<?php

class QuotationController extends CI_Controller
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
        $this->load->model("Salesinvoice");
        $this->load->model("MasterData");
    }

    function addquot()
    {
        $this->load->Model("MasterData");
        $f = $this->session->userdata("data");
        $f["data"] = $this->MasterData->getsupplier();
        $this->load->view("SuperAdmin/header");
        $this->load->view("Quotation/addquot", $f);
        $this->load->view("SuperAdmin/Footer");
    }

    function reportquot()
    {
        $this->load->Model("MasterData");
        $f = $this->session->userdata("data");
        $this->load->view("SuperAdmin/header");
        $this->load->view("Quotation/reportquot", $f);
        $this->load->view("SuperAdmin/Footer");
    }
}
