<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <a href="<?= base_url('admin/tambahPegawai') ?>" class="btn btn-info mb-3">Tambah Data Pegawai</a>
            <!-- <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newPegawai">Tambah Data Pegawai</a> -->
            <div class="table-responsive text-nowrap">
                <table id="tabelpegawai" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>NUPTK</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin </th>
                            <th>Nomor Telepon </th>
                            <th>Pendidikan Terakhir </th>
                            <th>Alamat Lengkap </th>
                            <th>Mapel Yang Diampu </th>
                            <th>Gaji Pokok </th>
                            <th>Status Menerima TPG </th>
                            <th>Menerima TPG Mulai </th>
                            <th>Besarnya TPG Perbulan </th>
                            <th>Status Menerima TFG </th>
                            <th>Menerima TFG Mulai </th>
                            <th>Besarnya TFG Perbulan </th>
                            <th>TMT SK Terakhir </th>
                            <th>Status Kepegawaian </th>
                            <th>TMT Inpassing </th>
                            <th>Golongan </th>
                            <th>Jabatan </th>
                            <th>Nomor Regis Guru </th>
                            <th>No SK NRG </th>
                            <th>Tanggal SK NRG </th>
                            <th>No SK Pengangkatan Guru Tetap Non-PNS </th>
                            <th>Tanggal SK PGTNP </th>
                            <th>Masa Kerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($queryPegawai as $u) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('admin/editPegawai/') . $u['nip'] ?>" class='fas fa-edit' style='font-size:15px;color:#00cc00'></a>
                                    <!-- <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatePegawai"></a> -->
                                    <!-- <a href="<?= base_url('admin/deletePegawai/') . $u->nip; ?>" class='fas fa-trash' style='font-size:15px;color:red'></a> -->
                                    <a href="<?= base_url('admin/deletePegawai/' . $u['nip']); ?>" onclick="return confirm('Yakin ingin menghapus data dari <?= $u['nama_pegawai'] ?>?');" class='fas fa-trash' style='font-size:15px;color:red'></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $u['nama_pegawai']; ?></td>
                                <td><?= $u['nip']; ?></td>
                                <td><?= $u['nik']; ?></td>
                                <td><?= $u['nuptk']; ?></td>
                                <td><?= $u['tgl_lahir']; ?></td>
                                <td><?= $u['jk']; ?></td>
                                <td><?= $u['no_telp']; ?></td>
                                <td><?= $u['pendidikan']; ?></td>
                                <td><?= $u['alamat']; ?></td>
                                <td><?= $u['mapel']; ?></td>
                                <td>Rp. <?= number_format($u['gaji_pokok']); ?></td>
                                <td><?= $u['status_tpg']; ?></td>
                                <td><?= $u['tpg_mulai']; ?></td>
                                <td>Rp. <?= number_format($u['tpg_perbulan']); ?></td>
                                <td><?= $u['status_tfg']; ?></td>
                                <td><?= $u['tfg_mulai']; ?></td>
                                <td>Rp. <?= number_format($u['tfg_perbulan']); ?></td>
                                <td><?= $u['tmt_sk_terakhir']; ?></td>
                                <td><?= $u['status_kepegawaian']; ?></td>
                                <td><?= $u['tmt_inpassing']; ?></td>
                                <td><?= $u['golongan']; ?></td>
                                <td><?= $u['jabatan']; ?></td>
                                <td><?= $u['nrg']; ?></td>
                                <td><?= $u['no_sk_nrg']; ?></td>
                                <td><?= $u['tgl_sk_nrg']; ?></td>
                                <td><?= $u['no_sk_pgtnp']; ?></td>
                                <td><?= $u['tgl_sk_pgtnp']; ?></td>
                                <td><?= $u['masa_kerja']; ?></td>
                            </tr>
                            <!-- Delete Pegawai -->
                            <div class="modal fade" id="deletePegawai" tabindex="-1" role="dialog" aria-labelledby="deletePegawaiLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deletePegawaiLabel">Hapus Pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus Pegawai <?= $u['nama_pegawai']; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <a href="<?= base_url('admin/deletepegawai') ?><?= $u['nip']; ?>" class="btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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