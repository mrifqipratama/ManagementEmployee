<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <a href="<?= base_url('survey/hasil_survey') ?>" class="btn btn-info mb-3">Preview Hasil Survey</a>
        <div class="card-body">
            <div class="container">
                <form method="get" action="<?= base_url('survey/indexlainya'); ?>" class="form">
                    <div class="form-group">
                        <label>Pilih Pegawai</label>
                        <select class="form-control" name="filter" id="filter" style="width: 50%">
                            <option value="">- Pilih Pegawai -</option>
                            <?php
                            foreach ($nip as $data) {
                                echo '<option value="' . $data->nip . '">' . $data->nip . ' | ' . $data->nama_pegawai . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?= base_url('survey'); ?>">Reset Filter</a>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
</div>

<!-- End of Main Content -->