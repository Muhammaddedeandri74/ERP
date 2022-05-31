<?php


class background extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model("backgroundservice");
    }

    function getshop()
    {
        $cek = $this->backgroundservice->getshop();
        if ($cek != "Tidak Konek K-Motion") {
            $this->syncitem($cek["idshop"], $cek["idwh"]);
        }
    }

    function syncitem($idshop, $idwh)
    {
        $cek =  $this->backgroundservice->syncitem($idshop);
        // echo $cek;

        // $this->syncitem($idshop, $idwh);
        $this->syncinvin($idshop, $idwh);
    }

    function syncinvin($idshop, $idwh)
    {
        $cek =  $this->backgroundservice->syncinvin($idshop, $idwh);
        // echo $cek;

        $this->syncinvout($idshop, $idwh);
    }
    function syncinvout($idshop, $idwh)
    {
        $cek =  $this->backgroundservice->syncinvout($idshop, $idwh);
        // echo $cek;

        $this->syncsales($idshop, $idwh);
    }

    function syncsales($idshop, $idwh)
    {
        $cek =  $this->backgroundservice->syncsales($idshop, $idwh);
        echo $cek;

        $this->getshop();
    }
}
