<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="card shadow mb-4 ml-5 mr-5">
        <div class="card-body">
            <div class="col-lg-9">

                <?= form_open_multipart('user/editProfile'); ?>
                <div class="form-group row mb-3">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nuptk" class="col-sm-3 col-form-label">NUPTK</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nuptk" name="nuptk" value="<?= $user['nuptk']; ?>">
                        <?= form_error('nuptk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $user['nama_pegawai']; ?>">
                        <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- checkbox inline -->
                <!-- if for checked -->
                <div class="form-group row mb-3">
                    <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" <?php if ($user['jk'] == 'Laki-Laki') echo 'checked'; ?>>
                            <label class="form-check-label" for="jk">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" <?php if ($user['jk'] == 'Perempuan') echo 'checked'; ?>>
                            <label class="form-check-label" for="jk">
                                Perempuan
                            </label>
                        </div>
                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- end checkbox inline -->
                <div class="form-group row mb-3">
                    <label for="no_telp" class="col-sm-3 col-form-label">No Telp</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user['no_telp']; ?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Terkahir</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="pendidikan" name="pendidikan">
                            <option selected><?= $user['pendidikan']; ?></option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $user['alamat']; ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- <div class="form-group row mb-3">
                <label for="mapel" class="col-sm-3 col-form-label">Mapel Yang Diampu</label>
                <div class="col-sm-9">
                    <select class="form-control" id="mapel" name="mapel">
                        <option selected><?= $user['mapel']; ?></option>
                        <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                        <option value="Al Quran Hadist">Al Qur'an Hadist</option>
                        <option value="Aqidah Akhlak">Aqidah Akhlak</option>
                        <option value="Fiqih">Fiqih</option>
                        <option value="Sejarah Kebudayaan Islam">Sejarah Kebudayaan Islam</option>
                        <option value="Pendidikan Kewarganegaraan">Pendidikan Kewarganegaraan</option>
                        <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                        <option value="Bahasa Arab">Bahasa Arab</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Ilmu Pengetahuan Alam">Ilmu Pengetahuan Alam</option>
                        <option value="Biologi">Biologi</option>
                        <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>
                        <option value="Seni Budaya">Seni Budaya</option>
                        <option value="Pendidikan Jasmani Olahraga dan Kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
                        <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                        <option value="Muatan Lokal Umum">Muatan Lokal Umum</option>
                        <option value="Muatan Lokal Agama">Muatan Lokal Agama</option>
                        <option value="Bimbingan Konseling">Bimbingan Konseling / Bimbingan Penyuluhan</option>
                    </select>
                </div>
            </div> -->
                <!-- choose file -->
                <div class="from-group row mb-3">
                    <div class="col-sm-3">Foto</div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="costum-file">
                                    <input type="file" class="form-control" name="image" id="image">
                                    <label class="form-label" for="image"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end choose file -->
                <div class="form-group row mb-3 justify-content-end">
                    <div class="col-sm-10 text-right">
                        <button type="submmit" class="btn btn-primary">Update / Edit</button>
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