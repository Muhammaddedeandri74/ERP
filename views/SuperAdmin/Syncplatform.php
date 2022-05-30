<div class="header px-4 pt-2" style="height: 196px;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item m-0"><a class="text-white text-decoration-none" href="#">Dashboard</a></li>
            <li class="breadcrumb-item m-0 bc-active" aria-current="page">Master Menu</li>
        </ol>
        <h3 class="text-white">Sync Platform</h3>
    </nav>
</div>
<div class="content bg-white mx-5">
    <div class="container-fluid">
        <div class="row">
            <?php echo $this->session->flashdata('message'); ?>
            <?php $this->session->set_flashdata('message', ''); ?>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-3">
                    <a href="<?php echo base_url('AuthControler/mainpage') ?>" style="text-decoration: none;" class="text-black fs-5"><i class='bx bx-left-arrow-alt'></i> Kembali</a>
                </div>
                <div class="col-6">
                    <div class="row mb-3">
                        <p>
                            <img style="margin-left: 13vw;" src="<?php echo base_url('assets/img/logokmotion.svg') ?>" alt="">
                        </p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label fs-3">Hubungkan S-ERP dengan platfomr K-Motion & POS</p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label fs-5">Masukkan unique ID yang tertera pada K-Motion App (Owner)</label>
                    </div>
                    <div class="row mb-3">
                        <label for="unique" class="form-label">Unique ID</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="unique" placeholder="Masukkan Unique ID">
                            </div>
                            <div class="col-4">
                                <a href="" class="btn btn-primary">Check ID</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">ID Terdaftar</label>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;border-radius: 8px">
                                <div class="row g-0">
                                    <div class="col-md-4 p-3">
                                        <img src="<?php echo base_url('assets/img/logokmotion.svg') ?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Gudang S-ERP yang digunakan oleh K-Motion untuk transaksi.</label>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Gudang</label>
                        <div class="col-8">
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">Gudang Utama</option>
                                <option value="2">Gudang Online</option>
                            </select>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-8 text-end">
                            <a href="" class="btn btn-primary">Hubungkan Akun</a>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
</div>