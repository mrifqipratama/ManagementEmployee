<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/dataCuti'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Data (Cuti) </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahcuti; ?> Data</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-card fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/dataKinerja'); ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Data (Kinerja)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahkinerja; ?> Data</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-award fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/dataPresensi'); ?>">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                    Data (Presensi)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahpresensi; ?> Data</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/accCuti'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Ajuan (Cuti) </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahacc_cuti; ?> Data</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-card-alt fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/accKinerja'); ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Ajuan (Kinerja)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahacc_kinerja; ?> Data</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list-alt fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('akademik/penilaian'); ?>">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger text-uppercase mb-1">
                                    Penilaian Kinerja Guru</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-pen fa-2x text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->