<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah <?= $title; ?></h1>
    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4 ml-2 mr-2">
        <a href="<?= base_url('user/detailcuti/' . $user['nip']) ?>" class="btn btn-success mb-3">Preview Data Presensi & Cuti</a>
        <div class="card-body">
            <div class="col-lg-9">
                <form class="pegawai" method="post" action="<?= base_url('user/tambahacc_cuti'); ?>" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $user['nip']; ?>" readonly>
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
                        <label for="jenis_cuti" class="col-sm-3 col-form-label">Jenis Cuti</label>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->