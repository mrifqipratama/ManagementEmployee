<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah <?= $title; ?></h1>
    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4 ml-2 mr-2">
        <a href="<?= base_url('user/detailkinerja/' . $user['nip']) ?>" class="btn btn-success mb-3">Preview Data Kinerja & Penilaian</a>
        <div class="card-body">
            <div class="col-lg-9">
                <?= form_open_multipart('user/tambahacc_kinerja'); ?>
                <div class="form-group row mb-3">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $user['nip']; ?>" readonly>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class=" form-group row mb-3">
                    <label for="id_bulan" class="col-sm-3 col-form-label">Bulan</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="id_bulan" name="id_bulan">
                            <option value="0" selected disabled>- Pilih Bulan -</option>
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
                <div class=" form-group row mb-3">
                    <label for="kegiatan" class="col-sm-3 col-form-label">Kegiatan</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="kegiatan" name="kegiatan">
                            <option value="0" selected disabled>- Pilih Kegiatan -</option>
                            <option value="10">Memberikan materi kepada siswa kelas 7A,B,C</option>
                            <option value="10">Memberikan materi kepada siswa kelas 8A,B</option>
                            <option value="10">Memberikan materi kepada siswa kelas 9A,B,C</option>
                            <option value="10">Penilaian siswa kelas 7A,B,C</option>
                            <option value="10">Penilaian siswa kelas 8A,B</option>
                            <option value="10">Penilaian siswa kelas 9A,B,C</option>
                            <option value="10">Piket</option>
                            <option value="10">Membuat laporan</option>
                            <option value="100">Merancang program BK</option>
                            <option value="10">Mengimplementasikan program BK</option>
                            <option value="5">Menyiapkan kelengkapan permintaan uang persediaan</option>
                            <option value="5">Membayar gaji </option>
                            <option value="5">Merekap seluruh kegiatan perbendaharaan</option>
                            <option value="5">Menata kerasipan bendahara pengeluaran</option>
                            <option value="10">Membuat daftar hadir guru dan karyawan</option>
                            <option value="10">Membuat laporan keadaan guru</option>
                            <option value="5">Melayani pendaftaran anggota baru</option>
                            <option value="5">Pengolahan bahan pustaka yang baru </option>
                            <option value="5">Melayani peminjaman dan pengembalian </option>
                            <option value="5">Memanggil siswa / siswi</option>
                            <option value="5">Mengikuti rapat</option>
                            <option value="5">Sambutan kedatangan</option>
                            <option value="5">Lainnya.... </option>
                        </select>
                        <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan Lebih Lengkap">
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label for="bukti" class="col-sm-3 col-form-label">Upload Bukti</label>
                    <div class="col-sm-9">
                        <div class="costum-file">
                            <input type="file" class="form-control" id="bukti" name="bukti">
                        </div>
                        <?= form_error('bukti', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>


                <!-- Button  -->
                <div class="form-group row mb-3 justify-content-end">
                    <div class="col-sm-10 text-right">
                        <button type="submmit" class="btn btn-info">Tambah Kinerja</button>
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