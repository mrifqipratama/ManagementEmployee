<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('notifikasi'); ?>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="<?= base_url('assets/img/profile/'), $user['image']; ?>" class="card-img-top rounded-start" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $user['nama_pegawai']; ?></h5>
            <p class="card-title"><?= $user['nip']; ?></p>
            <a href="<?= base_url('user/detail') ?>" class="btn btn-info">Detail</a>
        </div>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->