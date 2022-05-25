<?php

class InventoryStockControler extends CI_Controller
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
        $this->load->model("MInventoryOut");
        $this->load->model("MStockInventory");
    }

    function getitemstock()
    {
        $idwh = $this->input->post("idwh");
        $itemtype = $this->input->post("itemtype");
        $filter = $this->input->post("filter");
        $search = $this->input->post("search");
        $cek = $this->MStockInventory->getitemstock($idwh, $itemtype, $filter, $search);
        echo json_encode($cek);
    }
}
