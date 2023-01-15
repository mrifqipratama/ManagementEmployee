<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4 ml-5 mr-5">
        <div class="card-body">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/'), $user['image']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama_pegawai'] ?></h5>
                            <p class="card-text"><?= $user['nip'] ?></p>
                            <td>
                                <a href="<?= base_url('user/detail') ?>" class="btn btn-info">Detail</a>
                            </td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- /.container-fluid -->

<!-- End of Main Content -->