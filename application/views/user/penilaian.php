<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil <?= $title; ?></h1>

    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <form method="get" action="<?= base_url('user/penilaianlainya/') . $user['nip']; ?>" class="form">
                    <div class="form-group">
                        <label>Pilih Bulan</label>
                        <select class="form-control" name="filter" id="filter" style="width: 50%">
                            <option value="">- Pilih Bulan -</option>
                            <?php
                            foreach ($bulan as $data) {
                                echo '<option value="' . $data->id_bulan . '">' . $data->nama_bulan . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?= base_url('user/penilaian'); ?>">Reset Filter</a>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->