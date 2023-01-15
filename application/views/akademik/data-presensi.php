<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Presensi</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <a href="#" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahpresensi">Tambah Data Presensi</a>
            <a href="bulan" class="btn btn-info mb-3">Bulan</a>
            <div class="table-responsive text-nowrap">
                <table id="tabelpresensi" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Total Jam Perbulan</th>
                            <th>Ekuvalensi Jam Perbulan</th>
                            <th>Bulan</th>
                            <th>Jumlah Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($queryAkademik as $a) : ?>
                            <?php
                            $jml_presensi = ((int)$a->total_jam  + (int)$a->ekuivalensi_jam); ?>
                            <tr>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatepresensi<?= $a->id_presensi ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletepresensi<?= $a->id_presensi ?>"></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_pegawai; ?></td>
                                <td><?= $a->total_jam; ?> Jam</td>
                                <td><?= $a->ekuivalensi_jam; ?> Jam</td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $jml_presensi; ?> Jam</td>
                            </tr>
                            <div class="modal fade" id="updatepresensi<?= $a->id_presensi ?>" tabindex="-1" role="dialog" aria-labelledby="updatepresensiLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatepresensiLabel">Update Cuti </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="pegawai" method="post" action="<?= base_url('akademik/updatePresensi?id_presensi=') ?><?= $a->id_presensi ?>">
                                                <div class="form-group row mb-3">
                                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $a->nip; ?>" readonly>
                                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="total_jam" class="col-sm-3 col-form-label">Total Jam Perbulan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="total_jam" name="total_jam" placeholder="Masukkan Total Jam" value="<?= $a->total_jam; ?>">
                                                        <?= form_error('total_jam', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="ekuivalensi_jam" class="col-sm-3 col-form-label">Ekuivalensi Jam Perbulan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="ekuivalensi_jam" name="ekuivalensi_jam" placeholder="Masukkan Ekuivalensi" value="<?= $a->ekuivalensi_jam; ?>">
                                                        <?= form_error('ekuivalensi_jam', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="id_bulan" class="col-sm-3 col-form-label">Bulan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="id_bulan" name="id_bulan">
                                                            <option value="<?= $a->id_bulan; ?>" selected><?= $a->nama_bulan; ?></option>
                                                            <option value="1">Januari</option>
                                                            <option value="2">Februari</option>
                                                            <option value="3">Maret</option>
                                                            <option value="4">April </option>
                                                            <option value="5">Mei</option>
                                                            <option value="6">Juni </option>
                                                            <option value="7">Juli </option>
                                                            <option value="8">Agustus </option>
                                                            <option value="9">September </option>
                                                            <option value="10">Oktober </option>
                                                            <option value="11">November </option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                        <?= form_error('id_bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <!-- Button  -->
                                                <div class="form-group row mb-3 justify-content-end">
                                                    <div class="col-sm-10 text-right">
                                                        <button type="submmit" class="btn btn-info">Edit / Update Presensi</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deletepresensi<?= $a->id_presensi ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusLabel">Hapus Presensi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus data Presensi <?= $a->nama_pegawai ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('akademik/deletePresensi?id_presensi=') ?><?= $a->id_presensi ?>" class="btn btn-primary">Hapus</a>
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
<div class="modal fade" id="tambahpresensi" tabindex="-1" role="dialog" aria-labelledby="tambahpresensiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahpresensiLabel">Tambah Presensi </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <form class="pegawai" method="post" action="<?= base_url('akademik/tambahPresensi'); ?>" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="nip" name="nip">
                                <option value="">- Pilih Pegawai -</option>
                                <?php
                                foreach ($nip as $data) {
                                    echo '<option value="' . $data->nip . '">' . $data->nip . ' | ' . $data->nama_pegawai . '</option>';
                                }
                                ?>
                            </select>
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="total_jam" class="col-sm-3 col-form-label">Total Jam Perbulan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="total_jam" name="total_jam" placeholder="Masukkan Total Jam" value="<?= set_value('total_jam'); ?>">
                            <?= form_error('total_jam', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="ekuivalensi_jam" class="col-sm-3 col-form-label">Ekuivalensi Jam Perbulan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ekuivalensi_jam" name="ekuivalensi_jam" placeholder="Masukkan Ekuivalensi" value="<?= set_value('ekuivalensi_jam'); ?>">
                            <?= form_error('ekuivalensi_jam', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="id_bulan" class="col-sm-3 col-form-label">Bulan</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="id_bulan" name="id_bulan">
                                <option value="">- Pilih Bulan -</option>
                                <?php
                                foreach ($bulan as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                    echo '<option value="' . $data->id_bulan . '">' . $data->nama_bulan . '</option>';
                                }
                                ?>
                            </select>
                            <?= form_error('id_bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                    <!-- Button  -->
                    <div class="form-group row mb-3 justify-content-end">
                        <div class="col-sm-10 text-right">
                            <button type="submmit" class="btn btn-info">Tambah Data Presensi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>