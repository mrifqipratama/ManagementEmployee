<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Detail <?= $title; ?> & Penilaian</h1>

    <div class="card shadow mb-4">
        <a href="<?= base_url('user/tambahacc_kinerja') ?>" class="btn btn-info mb-3">Tambah Data Kinerja</a>
        <div class="card-body">
            <div class="container">
                <form method="get" action="" class="form">
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
                    <button class="btn btn-primary" id="tampil" value="tampil" type="submit">Tampilkan</button>
                    <a href="<?= base_url('user/detailkinerja/' . $user['nip']); ?>">Reset Filter</a>

                </form>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">

        <div class="card-body">
            <h3>Data Kinerja Bulanan</h3>
            <div class="table-responsive text-nowrap">
                <table id="tabelkinerja" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>NIP</th>
                            <th>Bulan</th>
                            <th>Angka Kredit Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Bukti</th>
                        </tr>
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
                    <a href="<?= $url_cetak; ?>" class=" btn btn-success mb-3"><i class="fas fa-file-pdf"></i>Print PDF</a>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Data Penilaian Kinerja</h3>
            <div class="table-responsive text-nowrap">
                <table id="tabelsurvey" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Bulan</th>
                            <th>Poin Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($queryp as $a) : ?>
                            <tr>

                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= ((int)$a->jawaban + (int)$a->jawaban2 + (int)$a->jawaban3 + (int)$a->jawaban4 + (int)$a->jawaban5 + (int)$a->jawaban6 + (int)$a->jawaban7 + (int)$a->jawaban8 + (int)$a->jawaban9 + (int)$a->jawaban10); ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->