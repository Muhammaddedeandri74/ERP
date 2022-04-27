
<style type="text/css">
  
  .left,.right{
    height: 100vh;
    width: 100%;
  }


  .left{
    background: white;
    padding: 20%;
  }

  .right{
    background: #F1F5F9;
    padding: 25%;

  }

  .img{
    background-image: url("<?php echo base_url('assets/img/puzzle.png') ?>");
  }

</style>

<!DOCTYPE html>
<html>
<head>
  <title>S-ERP</title>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="overflow-y: hidden; overflow-x: hidden">

  <div class="row">
      <div class="col-6 position-relative" style="border-radius: 0px 20px 30px 0px;">
           <div class="position-absolute d-flex" style="left:50%;top:8%;width:150px;flex-wrap: wrap; align-items:center;justify-content: center;">
              <img src="<?php echo base_url('assets/img/logo-yubi.png') ?>" style="height:24px;">
              <img src="<?php echo base_url('assets/img/logo-text.png') ?>" style="height:24px;">
            </div>
            <img src="<?php echo base_url('assets/img/puzzle.png') ?>" style="width: 1089px;height:1080px;object-fit:cover;">
      </div>
      <div class="col-6">
       <div class="right">
         <form action="<?php echo base_url('AuthControler/login') ?>" method="post" style="background:white;padding:64px 32px 96px 32px;border-radius: 16px;">
          <p class="m-0" style="color: #1143D8; font-size: 40px;text-align:center; letter-spacing: 4px;"><b>LOGIN</b></p>
          <p style="text-align:center;font-size: 19px;">S-ERP YubiPro</p>
            <?php echo $this->session->flashdata('message'); ?> 
            <?php $this->session->set_flashdata('message',''); ?>
                <p style="color: #262626CC ; font-size:  13px; margin-top: 20px"><b>Alamat Email</b></p>
                  <input type="text" name="username" class="form-control" required autocomplete="off">
                    <p style="color: #262626CC ; font-size:13px ; margin-top: 20px"><b>Kata Sandi</b></p>
                  <input type="password" name="password" class="form-control" required autocomplete="off">
                <!-- <p style="float: center; margin-top: 10px">Email atau password salah,Silahkan ulangi lagi</p> -->
              <br><br>
            <button class="form-control" style="background-color:#3761DE;color: white;border-radius:4px;" type="submit" ><b>MASUK</b></button>
         </form>
        </div>
      </div>
  </div>


</body>
</html>

