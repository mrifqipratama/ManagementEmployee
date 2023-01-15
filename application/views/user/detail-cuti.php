<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Detail Presensi & <?= $title; ?></h1>


    <div class="card shadow mb-4">
        <a href="<?= base_url('user/tambahacc_cuti') ?>" class="btn btn-info mb-3">Tambah Data Cuti</a>
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
                    <a href="<?= base_url('user/detailcuti/' . $user['nip']); ?>">Reset Filter</a>

                </form>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Data Presensi</h3>
            <div class="table-responsive text-nowrap">
                <table id="tabelpresensi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Bulan</th>
                            <th>Total Jam</th>
                            <th>Ekuivalensi Jam</th>
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
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $a->total_jam; ?> Jam</td>
                                <td><?= $a->ekuivalensi_jam; ?> Jam</td>
                                <td><?= $jml_presensi; ?> Jam</td>
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
            <h3>Data Cuti</h3>
            <div class="table-responsive text-nowrap">
                <table id="tabelcuti" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Nomor</th>
                            <th>Jenis Cuti</th>
                            <th>Tanggal Ajuan</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Lama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($query as $a) : ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_pegawai; ?></td>
                                <td><?= $a->nomor; ?></td>
                                <td><?= $a->jenis_cuti; ?></td>
                                <td><?= $a->tgl_ajuan; ?></td>
                                <td><?= $a->tgl_awal; ?></td>
                                <td><?= $a->tgl_akhir; ?></td>
                                <td><?= $a->lama; ?> Hari</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->