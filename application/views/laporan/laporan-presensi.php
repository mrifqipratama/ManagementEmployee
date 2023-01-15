<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Presensi</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.css'); ?>" />
                <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
                <form method="get" action="" class="form">
                    <div class="form-group">
                        <label>Filter Berdasarkan</label>
                        <select class="form-control" name="filter" id="filter" style="width: 50%">
                            <option value="">Pilih</option>
                            <option value="1">Per Pegawai</option>
                            <option value="2">Per Bulan</option>
                        </select>
                    </div>
                    <div class="form-group" id="form-nip">
                        <label>NIP / Nama Pelanggan</label>
                        <select name="nip" class="form-control" style="width: 50%">
                            <option value="">Pilih</option>
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
                            <option value="">Pilih</option>
                            <?php
                            foreach ($bulan as $data) {
                                echo '<option value="' . $data->id_bulan . '">' . $data->nama_bulan . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" id="tampil" value="tampil" type="submit">Tampilkan</button>
                    <a href="<?= base_url('laporan/laporanpresensi'); ?>">Reset Filter</a>

                </form>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="<?= $url_cetak; ?>" class=" btn btn-success mb-3"><i class="fas fa-file-pdf"></i>Print PDF</a>
            <!-- <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newPegawai">Tambah Data Pegawai</a> -->
            <div class="table-responsive text-nowrap">
                <table id="tabelpresensi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Total Jam Perbulan</th>
                            <th>Ekuivalensi Jam Perbulan</th>
                            <th>Bulan</th>
                            <th>Jumlah Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($queryp as $a) : ?>
                            <?php
                            $jml_presensi = ((int)$a->total_jam  + (int)$a->ekuivalensi_jam); ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_pegawai; ?></td>
                                <td><?= $a->total_jam; ?> Jam</td>
                                <td><?= $a->ekuivalensi_jam; ?> Jam</td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $jml_presensi; ?> Jam</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="<?php echo base_url('assets/vendor/jquery/jquery-ui.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#form-nip, #form-bulan').hide();
        $('#filter').change(function() {
            if ($(this).val() == '') {
                $('#form-nip, #form-bulan').hide();
            } else if ($(this).val() == '1') {
                $('#form-bulan').hide();
                $('#form-nip').show();
            } else {
                $('#form-nip').hide();
                $('#form-bulan').show();
            }
            $('#form-bulan select, #form-nip select').val('');
        })
    })
</script>
</div>
<!-- End of Main Content -->