<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Acc Kinerja</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <div class="table-responsive text-nowrap">
                <table id="tabelkinerja" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
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
                                <td>
                                    <a href="<?= base_url('akademik/terimaKinerja/') . $a['id_kinerja'] ?>" class='fas fa-check' style='font-size:15px;color:#00cc00'></a>
                                    <a href="<?= base_url('akademik/tolakKinerja/' . $a['id_kinerja']); ?>" onclick="return confirm('Yakin ingin menolak ajuan dari <?= $a['nama_pegawai'] ?>?');" class='fas fa-times' style='font-size:15px;color:red'></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a['nip']; ?></td>
                                <td><?= $a['nama_pegawai']; ?></td>
                                <td><?= $a['nama_bulan']; ?></td>
                                <td><?= $a['kegiatan']; ?> Volume</td>
                                <td><?= $a['ket']; ?></td>
                                <td><?= $a['bukti']; ?></td>
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