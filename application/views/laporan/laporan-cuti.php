<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Cuti</h1>
    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">

                <form method="get" action="" class="form">
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
                    <button class="btn btn-primary" value="tampil" type="submit">Tampilkan</button>
                    <a href="<?= base_url('laporan/laporancuti'); ?>">Reset Filter</a>

                </form>
            </div>
        </div>

    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <a href="<?= $url_cetak; ?>" class=" btn btn-success mb-3"><i class="fas fa-file-pdf"></i>Print PDF</a>
            <!-- <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newPegawai">Tambah Data Pegawai</a> -->
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
                                <td><?= $a->lama; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->