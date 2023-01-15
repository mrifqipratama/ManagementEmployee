<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Kinerja</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('notifikasi'); ?>
            <a href="#" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahkinerja">Tambah Data Kinerja</a>
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
                        foreach ($queryAkademik as $a) : ?>
                            <tr>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatekinerja<?= $a->id_kinerja ?>"></a>
                                    <a href="#" class='fas fa-trash' style='font-size:15px;color:red' data-toggle="modal" data-target="#deletekinerja<?= $a->id_kinerja ?>"></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nip; ?></td>
                                <td><?= $a->nama_pegawai; ?></td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $a->kegiatan; ?> Volume</td>
                                <td><?= $a->ket; ?></td>
                                <td><?= $a->bukti; ?></td>
                            </tr>
                            <div class="modal fade" id="updatekinerja<?= $a->id_kinerja ?>" tabindex="-1" role="dialog" aria-labelledby="updatekinerjaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatekinerjaLabel">Update Kinerja </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="kinerja" method="post" action="<?= base_url('akademik/updateKinerja?id_kinerja=') ?><?= $a->id_kinerja ?>" enctype="multipart/form-data">
                                                <div class="form-group row mb-3">
                                                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP" value="<?= $a->nip; ?>" readonly>
                                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                                <div class=" form-group row mb-3">
                                                    <label for="kegiatan" class="col-sm-3 col-form-label">Kegiatan</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="kegiatan" name="kegiatan">
                                                            <option value="<?= $a->kegiatan; ?>" selected><?= $a->kegiatan; ?> Poin</option>
                                                            < <option value="10">Memberikan materi kepada siswa kelas 7A,B,C</option>
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
                                                        <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan Lebih Lengkap" value="<?= $a->ket; ?>">
                                                    </div>
                                                </div>
                                                <div class=" from-group row mb-3">
                                                    <label for="bukti" class="col-sm-3 col-form-label">Upload Bukti</label>
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <img src="<?= base_url('assets/img/bukti/') . $a->bukti; ?>" class="img-thumbnail">
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="costum-file">
                                                                    <input type="file" class="form-control" name="bukti" id="bukti">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Button  -->
                                                <div class="form-group row mb-3 justify-content-end">
                                                    <div class="col-sm-10 text-right">
                                                        <button type="submmit" class="btn btn-info">Update Kinerja</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deletekinerja<?= $a->id_kinerja ?>" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusLabel">Hapus Kinerja</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda yakin ingin menghapus data kinerja <?= $a->id_kinerja ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('akademik/deleteKinerja?id_kinerja=') ?><?= $a->id_kinerja ?>" class="btn btn-primary">Hapus</a>
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
<div class="modal fade" id="tambahkinerja" tabindex="-1" role="dialog" aria-labelledby="tambahkinerjaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahkinerjaLabel">Tambah Kinerja </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="p-5">
                <?= form_open_multipart('akademik/tambahkinerja'); ?>
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