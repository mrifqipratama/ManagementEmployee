<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <img src=" <?= base_url('assets/logo/mts.jpg') ?>" width="30%">
                            <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nuptk" name="nuptk" placeholder="NUPTK" value="<?= set_value('nuptk'); ?>">
                                <?= form_error('nuptk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama_pegawai" name="nama_pegawai" placeholder="Nama Pegawai" value="<?= set_value('nama_pegawai'); ?>">
                                <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal lahir" value="<?= set_value('tgl_lahir'); ?>">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jk" class="col col-form-label">Jenis Kelamin</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="laki-laki" value="Laki-Laki">
                                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="perempuan" value="Perempuan">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="no_telp" value="<?= set_value('no_telp'); ?>">
                                <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan" class=" col-form-label">Pendidikan Terkahir</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option selected></option>
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
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" rows="3" value="<?= set_value('alamat'); ?>"></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="mapel" class=" col-form-label">Mapel Yang Diampu</label>
                                <select class="form-control" id="mapel" name="mapel">
                                    <option selected></option>
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
                                    <option value="Ilmu Pengetahuan Sosial">Ilmu Pengetahuan Sosial</option>>
                                    <option value="Seni Budaya">Seni Budaya</option>
                                    <option value="Pendidikan Jasmani Olahraga dan Kesehatan">Pendidikan Jasmani, Olahraga dan Kesehatan</option>
                                    <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                                    <option value="Muatan Lokal Umum">Muatan Lokal Umum</option>
                                    <option value="Muatan Lokal Agama">Muatan Lokal Agama</option>
                                    <option value="Bimbingan Konseling">Bimbingan Konseling / Bimbingan Penyuluhan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="masa_kerja" name="masa_kerja" placeholder="masa_kerja" value="<?= set_value('masa_kerja'); ?>">
                                <?= form_error('masa_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulang Password">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth') ?>">Sudah Punya Akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>