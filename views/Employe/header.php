<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url('assets/css/indexxxx.css') ?>" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <script src="<?= base_url('assets/js/Chart.js') ?>"></script> -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src='<?php echo base_url('assets/js/format.currency.min.js'); ?>'></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://static2.sharepointonline.com/files/fabric/office-ui-fabric-core/11.0.0/css/fabric.min.css" />
  <link rel="icon" type="image/x-icon" href="http://103.251.44.143:8099/ERP/assets/img/logo_daffina.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <title>ERP</title>
</head>

<body style="box-sizing: border-box; margin: 0; overflow-x: hidden;">

  <style>
    @keyframes pulse {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(250, 82, 82, 0.7);
      }

      70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(255, 82, 82, 0);
      }

      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(255, 82, 82, 0);
      }
    }

    .menu-icon .badge {
      animation: pulse 2s infinite;
      position: absolute;
      top: -10px;
      right: -6px;
      max-width: fit-content;
      text-align: left;
    }


    .badge {
      animation: pulse 2s infinite;
      position: absolute;
      top: -8px;
      max-width: fit-content;
      text-align: left;
    }

    .card .col-10 .badge {
      animation: pulse 2s infinite;
      position: absolute;
      top: -8px;
      max-width: fit-content;
      text-align: left;
    }

    .slc {
      background-color: #f3f3f3;
      color: black;
    }

    .fw {
      font-weight: bold;
    }

    .bay {
      box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
      -webkit-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
      -moz-box-shadow: 0px 0px 5px 1px rgba(0, 0, 5, 0.1);
    }
  </style>