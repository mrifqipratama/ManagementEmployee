<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="<?= base_url('laporan/laporanCuti'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Cuti </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahcuti; ?> Pegawai</div>
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
            <a href="<?= base_url('laporan/laporanKinerja'); ?>">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Kinerja</div>
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
            <a href="<?= base_url('laporan/laporanPresensi'); ?>">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">
                                    Presensi</div>
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



    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->