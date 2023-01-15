<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4 ml-2 mr-2">
        <div class="card-body">
            <div class="col-lg-9">
                <!-- <form class="pegawai" method="post" action="<?= base_url('admin/tambahdata'); ?>" enctype="multipart/form-data"> -->
                <?= form_open_multipart('admin/tambahPegawai'); ?>
                <div class="form-group row mb-3">
                    <label class="col-sm-4 required_notification text-danger">* Wajib diisi, tidak boleh kosong</label>
                </div>
                <div class="form-group row mb-3">
                    <label for="nip" class="col-sm-3 col-form-label">NIP
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= set_value('nip'); ?>">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nik" class="col-sm-3 col-form-label">NIK
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" value="<?= set_value('nik'); ?>">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nuptk" class="col-sm-3 col-form-label">NUPTK
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="Masukkan NUPTK" value="<?= set_value('nuptk'); ?>">
                        <?= form_error('nuptk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Lengkap
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan Nama Lengkap Pegawai" value="<?= set_value('nama_pegawai'); ?>">
                        <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                        <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- checkbox inline -->
                <!-- if for checked -->
                <div class="form-group row mb-3">
                    <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Laki-Laki" <?php if (isset($_POST['jk']) && $_POST['jk'] == "Laki-Laki") echo "checked"; ?>>
                            <label class="form-check-label" for="jk">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk" value="Perempuan" <?php if (isset($_POST['jk']) && $_POST['jk'] == "Perempuan")  echo "checked"; ?>>
                            <label class="form-check-label" for="jk">
                                Perempuan
                            </label>
                        </div>
                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <!-- end checkbox inline -->
                <div class="form-group row mb-3">
                    <label for="no_telp" class="col-sm-3 col-form-label">No Telp
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telp" value="<?= set_value('no_telp'); ?>">
                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan Terkahir
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control" id="pendidikan" name="pendidikan">
                            <option value="0" selected disabled>- Pilih Pendidikan -</option>
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
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" style="text-align: center;" rows="3" value="<?= set_value('alamat'); ?>"></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="mapel" class="col-sm-3 col-form-label">Mapel Yang Diampu
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control" id="mapel" name="mapel">
                            <option value="0" selected disabled>- Pilih Mapel -</option>
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
                        <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="masa_kerja" class="col-sm-3 col-form-label">Masa Kerja
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" placeholder="Masukkan Masa Kerja" value="<?= set_value('masa_kerja'); ?>">
                        <?= form_error('masa_kerja', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="role_id" class="col-sm-3 col-form-label">Role
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role_id" id="role_id" value="1" <?php if (isset($_POST['role_id']) && $_POST['role_id'] == "1") echo "checked"; ?>>
                            <label class="form-check-label" for="role_id">
                                1 (Admin)
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role_id" id="role_id" value="2" <?php if (isset($_POST['role_id']) && $_POST['role_id'] == "2")  echo "checked"; ?>>
                            <label class="form-check-label" for="role_id">
                                2 (Pegawai)
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="role_id" id="role_id" value="3" <?php if (isset($_POST['role_id']) && $_POST['role_id'] == "3")  echo "checked"; ?>>
                            <label class="form-check-label" for="role_id">
                                3 (Kepala Sekolah)
                            </label>
                        </div>
                        <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="password" class="col-sm-3 col-form-label">Password
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="total_sehari" class="col-sm-3 col-form-label">Total Jam Sehari
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="total_sehari" name="total_sehari" placeholder="Masukkan Total Sehari">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="ekuivalensi" class="col-sm-3 col-form-label">Ekuivalensi
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ekuivalensi" name="ekuivalensi" placeholder="Masukkan Ekuivalensi">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="Masukkan Gaji Pokok" value="<?= set_value('gaji_pokok'); ?>">
                        <?= form_error('gaji_pokok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_tpg" class="col-sm-3 col-form-label">Status Menerima TPG</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_tpg" id="status_tpg" value="Sudah Menerima TPG" <?php if (isset($_POST['status_tpg']) && $_POST['status_tpg'] == "Sudah Menerima TPG") echo "checked"; ?>>
                            <label class="form-check-label" for="status_tpg">
                                Sudah Menerima TPG
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_tpg" id="status_tpg" value="Belum Menerima TPG" <?php if (isset($_POST['status_tpg']) && $_POST['status_tpg'] == "Belum Menerima TPG") echo "checked"; ?>>
                            <label class="form-check-label" for="status_tpg">
                                Belum Menerima TPG
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tpg_mulai" class="col-sm-3 col-form-label">Menerima TPG Mulai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tpg_mulai" name="tpg_mulai" placeholder="Masukkan Menerima TPG Mulai" value="<?= set_value('tpg_mulai'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tpg_perbulan" class="col-sm-3 col-form-label">Besarnya TPG Perbulan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tpg_perbulan" name="tpg_perbulan" placeholder="Masukkan Besarnya TPG Perbulan" value="<?= set_value('tpg_perbulan'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_tfg" class="col-sm-3 col-form-label">Status Menerima TFG</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_tfg" id="status_tfg" value="Sudah Menerima TFG" <?php if (isset($_POST['status_tfg']) && $_POST['status_tfg'] == "Sudah Menerima TFG") echo "checked"; ?>>
                            <label class="form-check-label" for="status_tfg">
                                Sudah Menerima TFG
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_tfg" id="status_tfg" value="Belum Menerima TFG" <?php if (isset($_POST['status_tfg']) && $_POST['status_tfg'] == "Sudah Menerima TFG") echo "checked"; ?>>
                            <label class="form-check-label" for="status_tfg">
                                Belum Menerima TFG
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tfg_mulai" class="col-sm-3 col-form-label">Menerima TFG Mulai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tfg_mulai" name="tfg_mulai" placeholder="Masukkan Menerima TFG Mulai" value="<?= set_value('tfg_mulai'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tfg_perbulan" class="col-sm-3 col-form-label">Besarnya TFG Perbulan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tfg_perbulan" name="tfg_perbulan" placeholder="Masukkan Besarnya TFG Perbulan" value="<?= set_value('tfg_perbulan'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tmt_sk_terakhir" class="col-sm-3 col-form-label">TMT SK Terakhir
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tmt_sk_terakhir" name="tmt_sk_terakhir" placeholder="TMT SK Terakhir" value="<?= set_value('tmt_sk_terakhir'); ?>">
                        <?= form_error('tmt_sk_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="status_kepegawaian" class="col-sm-3 col-form-label">Status Kepegawaian
                        <span class="required_notification text-danger">*</span>
                    </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_kepegawaian" id="status_kepegawaian" value="PNS" <?php if (isset($_POST['status_kepegawaian']) && $_POST['status_kepegawaian'] == "PNS") echo "checked"; ?>>
                            <label class="form-check-label" for="status_kepegawaian">
                                PNS
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_kepegawaian" id="status_kepegawaian" value="Non - PNS" <?php if (isset($_POST['status_kepegawaian']) && $_POST['status_kepegawaian'] == "Non - PNS") echo "checked"; ?>>
                            <label class="form-check-label" for="status_kepegawaian">
                                Non - PNS
                            </label>
                        </div>
                        <?= form_error('status_kepegawaian', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tmt_inpassing" class="col-sm-3 col-form-label">TMT Inpassing</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tmt_inpassing" name="tmt_inpassing" placeholder="TMT Inpassing" value="<?= set_value('tmt_inpassing'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="no_sk_inpassing" class="col-sm-3 col-form-label">No SK Inpassing</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_sk_inpassing" name="no_sk_inpassing" placeholder="Masukkan No SK Inpassing" value="<?= set_value('no_sk_inpassing'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="golongan" class="col-sm-3 col-form-label">Golongan</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="golongan" name="golongan">
                            <option value="0" selected disabled>- Pilih Golongan -</option>
                            <option value="Golongan I">Golongan I</option>
                            <option value="II/a">II/a</option>
                            <option value="II/b">II/b</option>
                            <option value="II/c">II/c</option>
                            <option value="II/d">II/d</option>
                            <option value="III/a">III/a</option>
                            <option value="III/b">III/b</option>
                            <option value="III/c">III/c</option>
                            <option value="III/d">III/d</option>
                            <option value="IV/a">IV/a</option>
                            <option value="IV/b">IV/b</option>
                            <option value="IV/c">IV/c</option>
                            <option value="IV/d">IV/d</option>
                            <option value="IV/e">IV/e</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="0" selected disabled>- Pilih Jabatan -</option>
                            <option value="Kepala Sekolah I">Kepala Sekolah I</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Waka Kurikulum">Waka Kurikulum</option>
                            <option value="Waka Saran-prasarana">Waka Saran-prasarana</option>
                            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                            <option value="Waka Humas">Waka Humas</option>
                            <option value="Staff Tata Usaha">Staff Tata Usaha</option>
                            <option value="Ka Lab IPA">Ka Lab IPA</option>
                            <option value="Ka Lab Komputer">Ka Lab Komputer</option>
                            <option value="Ka Perpustakaan">Ka Perpustakaan</option>
                            <option value="Pembina Keagamaan">Pembina Keagamaan</option>
                            <option value="Pembina Osis">Pembina Osis</option>
                            <option value="Pembina PMR">Pembina PMR</option>
                            <option value="Pembina Pramuka">Pembina Pramuka</option>
                            <option value="Pembina UKS">Pembina UKS</option>
                            <option value="Tenaga Administrasi">Tenaga Administrasi</option>
                            <option value="Tenaga Perpustakaan">Tenaga Perpustakaan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="nrg" class="col-sm-3 col-form-label">No Regis Guru</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nrg" name="nrg" placeholder="Masukkan No Regis Guru" value="<?= set_value('nrg'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="no_sk_nrg" class="col-sm-3 col-form-label">No SK NRG</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_sk_nrg" name="no_sk_nrg" placeholder="Masukkan No SK NRG" value="<?= set_value('no_sk_nrg'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tgl_sk_nrg" class="col-sm-3 col-form-label">Tanggal SK NRG</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_sk_nrg" name="tgl_sk_nrg" placeholder="Tanggal SK NRG" value="<?= set_value('tgl_sk_nrg'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="no_sk_pgtnp" class="col-sm-3 col-form-label">No SK Pengangkatan Guru Tetap Non-PNS</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_sk_pgtnp" name="no_sk_pgtnp" placeholder="Masukkan NO SK PGTNP" value="<?= set_value('no_sk_pgtnp'); ?>">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="tgl_sk_pgtnp" class="col-sm-3 col-form-label">Tanggal SK PGTNP</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl_sk_pgtnp" name="tgl_sk_pgtnp" placeholder="Tanggal SK PGTNPr" value="<?= set_value('tgl_sk_pgtnp'); ?>">
                    </div>
                </div>
                <!-- Button  -->
                <div class="form-group row mb-3 justify-content-end">
                    <div class="col-sm-10 text-right">
                        <button type="submmit" class="btn btn-primary">Tambah Data Pegawai</button>
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