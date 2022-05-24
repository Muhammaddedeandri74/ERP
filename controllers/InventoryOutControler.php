<?php

class InventoryOutControler extends CI_Controller
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
    }

    function AddInventoryout()
    {
        $iditem = $this->input->post('transaksi_iditem');
        $expdate = $this->input->post('transaksi_expdate');
        $qtyout = $this->input->post('transaksi_qty[]1_qty');
        $noinvout = $this->input->post('notransaksi');
        $idso = $this->input->post('idso');
        $idwhsales = $this->input->post('idwhsales');
        $dateoutsales = $this->input->post('dateoutsales');
        $nodeliv = $this->input->post('nodeliv');

        $cek = $this->MInventoryOut->outsales($idso, $noinvout, $idwhsales, $dateoutsales, $nodeliv, $iditem, $qtyout, $expdate);
        echo $cek;
    }

    function AddInventoryoutmovewh()
    {
        $iditem = $this->input->post('transaksi_iditem');
        $expdate = $this->input->post('transaksi_expdate');
        $qtyout = $this->input->post('transaksi_qty[]1_qty');
        $noinvout = $this->input->post('notransaksi');
        $namewarehouse = $this->input->post('namewarehouse1');
        $namewarehouse2 = $this->input->post('namewarehouse2');
        $dateoutmovewh = $this->input->post('dateoutmovewh');

        $cek = $this->MInventoryOut->outmovewh($namewarehouse, $namewarehouse2, $noinvout, $dateoutmovewh, $iditem, $qtyout, $expdate);
        echo $cek;
    }

    function AddInventoryoutret()
    {
        $iditem = $this->input->post('transaksi_iditem');
        $expdate = $this->input->post('transaksi_expdate');
        $qtyout = $this->input->post('transaksi_qty[]1_qty');
        $noinvout = $this->input->post('notransaksi');
        $idwhret = $this->input->post('idwhret');
        $idsupp = $this->input->post('idsupp');
        $dateret = $this->input->post('dateret');

        $cek = $this->MInventoryOut->outret($idwhret, $idsupp, $noinvout, $dateret, $iditem, $qtyout, $expdate);
        echo $cek;
    }

    function AddInventoryoutgoing()
    {
        $iditem = $this->input->post('transaksi_iditem');
        $expdate = $this->input->post('transaksi_expdate');
        $qtyout = $this->input->post('transaksi_qty[]1_qty');
        $noinvout = $this->input->post('notransaksi');
        $idwhout = $this->input->post('idwhout');
        $dateoutwh = $this->input->post('dateoutwh');

        $cek = $this->MInventoryOut->outwh($idwhout, $noinvout, $dateoutwh, $iditem, $qtyout, $expdate);
        echo $cek;
    }

    function dataout()
    {
        $idwh = $this->input->post("idwh");
        $tipeout = $this->input->post("tipeout");
        $date1 = $this->input->post("date1");
        $date2 = $this->input->post("date2");
        $status = $this->input->post("status");
        $filter = $this->input->post("filter");
        $search = $this->input->post("search");
        $cek = $this->MInventoryOut->dataout($idwh, $tipeout, $date1, $date2, $status, $filter, $search);
        echo json_encode($cek);
    }
}
