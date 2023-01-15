<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Data Kinerja</h3>
            <div class="table-responsive text-nowrap">
                <table id="tabelkinerja" class="table table-hover table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>NIP</th>
                            <th>Bulan</th>
                            <th>Angka Kredit Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Bukti</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($query as $a) : ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $a->kegiatan; ?> Volume</td>
                                <td><?= $a->ket; ?></td>
                                <td><?= $a->bukti; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Data Presensi</h3>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <div class="table-responsive text-nowrap">
                <table id="tabelpresensi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Bulan</th>
                            <th>Jumlah Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($queryp as $a) : ?>
                            <tr>
                                <?php
                                $jml_presensi = ((int)$a->total_jam  + (int)$a->ekuivalensi_jam); ?>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $jml_presensi; ?> Jam</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="card shadow mb-4">
        <a href="<?= base_url('survey/survey/') . $a->nip; ?>" class="btn btn-info">Beri Penilaian</a>
    </div>
</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->