<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Hasil Penilaian</h1>

    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.css'); ?>" />
                <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
                <form method="get" action="<?= base_url('akademik/penilaianlainya/'); ?>" class="form">
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
                    <div class="form-group" id="form-bulan">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control" style="width: 50%">
                            <option value="">- Pilih Bulan -</option>
                            <?php
                            foreach ($bulan as $data) {
                                echo '<option value="' . $data->id_bulan . '">' . $data->nama_bulan . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                    <a href="<?= base_url('akademik/penilaian'); ?>">Reset Filter</a>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
<script src="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#form-bulan').hide();
        $('#filter').change(function() {
            if ($(this).val() == '') {
                $('#form-bulan').hide();
            } else {
                $('#form-bulan').show();
            }
            $('#form-bulan select').val('');
        })
    })
</script>
</div>

<!-- End of Main Content -->