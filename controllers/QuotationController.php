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
        $this->load->model("MQuotation");
        $this->load->model("MasterData");
    }

    function addquot()
    {
        $this->load->Model("MasterData");
        $f = $this->session->userdata("data");
        $f["data"]  =  $this->MasterData->getcustomer();
        $f["data1"] =  $this->MQuotation->getquotationlast();
        $f["data2"] =  $this->MQuotation->getcompanydata();
        $f["item"] =  $this->MQuotation->getitem();
        $f["codequox"] = $this->input->post("codequox");
        if (!isset($f["codequox"])) {
            $f["codequox"] = "";
        }

        $this->load->view("SuperAdmin/header");
        $this->load->view("Quotation/addquot", $f);
        $this->load->view("SuperAdmin/Footer");
    }

    function getlistquo()
    {
        $filter = $this->input->post("filter");
        $search = $this->input->post("search");
        $statusquo = $this->input->post("statusquo");
        $datestart = $this->input->post("datestart");
        $finishdate = $this->input->post("finishdate");
        $cek =  $this->MQuotation->getlistquotation($filter, $search, $statusquo, $datestart, $finishdate);
        echo json_encode($cek);
    }

    function reportquot()
    {
        $this->load->Model("MasterData");
        $f = $this->session->userdata("data");

        $this->load->view("SuperAdmin/header");
        $this->load->view("Quotation/reportquot", $f);
        $this->load->view("SuperAdmin/Footer");
    }

    function addquo()
    {
        $f = $this->session->userdata("data");
        $date = date('Y-m-d H:i:s');
        $iduser = $f["iduser"];
        $norek = $this->input->post('norek');
        $codequo = $this->input->post('codequo');
        if (!isset($codequo) || $codequo == "") {
            $codequo = $this->MQuotation->getquotationlast();
        }

        $idcust = $this->input->post('idcust');
        $address = $this->input->post('address');
        $judulquo = $this->input->post('judulquo');
        $startquo = $this->input->post('startquo');
        $expquo = $this->input->post('expquo');
        $subtotal = str_replace(".", "", $this->input->post('subtotal'));
        $disnoms = str_replace(".", "", $this->input->post('disnoms'));
        $ppn = str_replace(".", "", $this->input->post('ppn'));
        $grandtotal = str_replace(".", "", $this->input->post('grandtotal'));
        $iditem = $this->input->post('iditem');
        $qty = $this->input->post('qty');
        $disnom = str_replace(".", "", $this->input->post('disnom'));
        $harga = str_replace(".", "", $this->input->post('harga'));
        $total = str_replace(".", "", $this->input->post('total'));
        $remark = $this->input->post('remark');

        $cek = $this->MQuotation->addquo($date, $iduser, $norek, $codequo, $idcust, $address, $judulquo, $startquo, $expquo, $subtotal, $disnoms, $ppn, $grandtotal, $iditem, $qty, $disnom, $harga, $total, $remark);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">' . $cek . '</div>');
        redirect("QuotationController/addquot");
    }

    function detailquo()
    {
        $idquo = $this->input->post("idquo");
        $cek = $this->MQuotation->detailquo($idquo);
        echo json_encode($cek);
    }

    function cancelquo()
    {
        $codequo = $this->input->post("codequo");
        $cek = $this->MQuotation->cancelquo($codequo);
        echo json_encode($cek);
    }
    function detailquotation()
    {
        $idquo         = $this->input->post('idquo');
        $this->load->Model("MasterData");
        $cek  = $this->MQuotation->detailquo($idquo);
        echo json_encode($cek);
    }
}
