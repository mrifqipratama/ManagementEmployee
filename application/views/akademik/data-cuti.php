<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Cuti</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <a href="#" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahcuti">Tambah Data Cuti</a>
            <div class="table-responsive text-nowrap">
                <table id="tabelcuti" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
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
                        foreach ($queryAkademik as $a) : ?>
                            <tr>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatecuti<?= $a->id_cuti ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletecuti<?= $a->id_cuti ?>"></a>
                                </td>
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
                            <div class="modal fade" id="updatecuti<?= $a->id_cuti ?>" tabindex="-1" role="dialog" aria-labelledby="updatecutiLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatecutiLabel">Update Cuti </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="pegawai" method="post" action="<?= base_url('akademik/updateCuti?id_cuti=') ?><?= $a->id_cuti ?>">
                                                <div class="form-group row mb-3">
                                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $a->nip; ?>" readonly>
                                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="nomor" class="col-sm-3 col-form-label">Nomor
                                                    </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nomor" value="<?= $a->nomor; ?>">
                                                        <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="jenis_cuti" class="col-sm-3 col-form-label">Jenis Cuti</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="jenis_cuti" name="jenis_cuti">
                                                            <option selected><?= $a->jenis_cuti; ?></option>
                                                            <option value="Cuti Tahunan">Cuti Tahunan</option>
                                                            <option value="Cuti Sakit">Cuti Sakit</option>
                                                            <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                                            <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                                            <option value="Cuti Haji/Umrah">Cuti Haji/Umrah</option>
                                                        </select>
                                                        <?= form_error('jenis_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="tgl_ajuan" class="col-sm-3 col-form-label">Tanggal Ajuan</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tgl_ajuan" name="tgl_ajuan" value="<?= $a->tgl_ajuan; ?>">
                                                        <?= form_error('tgl_ajuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="tgl_awal" class="col-sm-3 col-form-label">Tanggal Awal</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= $a->tgl_awal; ?>">
                                                        <?= form_error('tgl_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="tgl_akhir" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= $a->tgl_akhir; ?>">
                                                        <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="lama" class="col-sm-3 col-form-label">Lama Cuti</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="lama" name="lama" placeholder="Masukkan Lama Cuti" value="<?= $a->lama; ?>">
                                                        <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>

                                                <!-- Button  -->
                                                <div class="form-group row mb-3 justify-content-end">
                                                    <div class="col-sm-10 text-right">
                                                        <button type="submmit" class="btn btn-info">Update Data Cuti</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deletecuti<?= $a->id_cuti ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusLabel">Hapus Cuti</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus data Cuti <?= $a->nama_pegawai ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('akademik/deleteCuti?id_cuti=') ?><?= $a->id_cuti ?>" class="btn btn-primary">Hapus</a>
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
<div class="modal fade" id="tambahcuti" tabindex="-1" role="dialog" aria-labelledby="tambahcutiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahcutiLabel">Tambah Cuti </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <form class="pegawai" method="post" action="<?= base_url('akademik/tambahCuti'); ?>" enctype="multipart/form-data">
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
                        <label for="nomor" class="col-sm-3 col-form-label">Nomor
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nomor" value="<?= set_value('nomor'); ?>">
                            <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="nip" class="col-sm-3 col-form-label">Jenis Cuti</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="jenis_cuti" name="jenis_cuti">
                                <option value="0" selected disabled>- Pilih Jenis Cuti -</option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                <option value="Cuti Haji/Umrah">Cuti Haji/Umrah</option>
                            </select>
                            <?= form_error('jenis_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tgl_ajuan" class="col-sm-3 col-form-label">Tanggal Ajuan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_ajuan" name="tgl_ajuan" value="<?= set_value('tgl_ajuan'); ?>">
                            <?= form_error('tgl_ajuan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tgl_awal" class="col-sm-3 col-form-label">Tanggal Awal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= set_value('tgl_awal'); ?>">
                            <?= form_error('tgl_awal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="tgl_akhir" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= set_value('tgl_akhir'); ?>">
                            <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="lama" class="col-sm-3 col-form-label">Lama Cuti</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lama" name="lama" placeholder="Masukkan Lama Cuti" value="<?= set_value('lama'); ?>">
                            <?= form_error('lama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Button  -->
                    <div class="form-group row mb-3 justify-content-end">
                        <div class="col-sm-10 text-right">
                            <button type="submmit" class="btn btn-info">Tambah Data Cuti</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>