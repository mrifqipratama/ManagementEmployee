<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('notifikasi'); ?>

    <div class="card shadow mb-4 ml-4 mr-4">
        <div class="card-body">
            <div class="row n0-gutters">
                <div class="col-md-3">
                    <img src="<?= base_url('assets/img/profile/'), $user['image']; ?>" class="img-fluid rounded-start" alt="...">
                    <div class="form-group row mt-3 mr-2 justify-content-end">
                        <div class="col-sm-10 text-right">
                            <a href="<?= base_url('user/editProfile') ?>" class="btn btn-info">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Nama Lengkap </td>
                                <td>: <?= $user['nama_pegawai']; ?></td>
                            </tr>
                            <tr>
                                <td>NIP </td>
                                <td>: <?= $user['nip']; ?></td>
                            </tr>
                            <tr>
                                <td>NIK </td>
                                <td>: <?= $user['nik']; ?></td>
                            </tr>
                            <tr>
                                <td>NUPTK</td>
                                <td>: <?= $user['nuptk']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir </td>
                                <td>: <?= $user['tgl_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin </td>
                                <td>: <?= $user['jk']; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon </td>
                                <td>: <?= $user['no_telp']; ?></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td>: <?= $user['pendidikan']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Lengkap</td>
                                <td>: <?= $user['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Mapel Yang Diampu </td>
                                <td>: <?= $user['mapel']; ?></td>
                            </tr>
                            <tr>
                                <td>Gaji Pokok </td>
                                <td>: Rp. <?= number_format($gaji['gaji_pokok']); ?></td>
                            </tr>
                            <tr>
                                <td>Status Menerima TPG </td>
                                <td>: <?= $gaji['status_tpg']; ?></td>
                            </tr>
                            <tr>
                                <td>Menerima TPG Mulai </td>
                                <td>: <?= $gaji['tpg_mulai']; ?></td>
                            </tr>
                            <tr>
                                <td>Besarnya TPG Perbulan </td>
                                <td>: Rp. <?= number_format($gaji['tpg_perbulan']); ?></td>
                            </tr>
                            <tr>
                                <td>Status Menerima TFG </td>
                                <td>: <?= $gaji['status_tfg']; ?></td>
                            </tr>
                            <tr>
                                <td>Menerima TFG Mulai </td>
                                <td>: <?= $gaji['tfg_mulai']; ?></td>
                            </tr>
                            <tr>
                                <td>Besarnya TFG Perbulan </td>
                                <td>: Rp. <?= number_format($gaji['tfg_perbulan']); ?></td>
                            </tr>
                            <tr>
                                <td>TMT SK Terakhir </td>
                                <td>: <?= $jabatan['tmt_sk_terakhir']; ?></td>
                            </tr>
                            <tr>
                                <td>Status Kepegawaian </td>
                                <td>: <?= $jabatan['status_kepegawaian']; ?></td>
                            </tr>
                            <tr>
                                <td>TMT Inpassing </td>
                                <td>: <?= $jabatan['tmt_inpassing']; ?></td>
                            </tr>
                            <tr>
                                <td>No SK Inpassing </td>
                                <td>: <?= $jabatan['no_sk_inpassing']; ?></td>
                            </tr>
                            <tr>
                                <td>Golongan </td>
                                <td>: <?= $jabatan['golongan']; ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan </td>
                                <td>: <?= $jabatan['jabatan']; ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Regis Guru </td>
                                <td>: <?= $jabatan['nrg']; ?></td>
                            </tr>
                            <tr>
                                <td>No SK NRG </td>
                                <td>: <?= $jabatan['no_sk_nrg']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal SK NRG </td>
                                <td>: <?= $jabatan['tgl_sk_nrg']; ?></td>
                            </tr>
                            <tr>
                                <td>No SK Pengangkatan Guru Tetap Non-PNS </td>
                                <td>: <?= $jabatan['no_sk_pgtnp']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal SK PGTNP </td>
                                <td>: <?= $jabatan['tgl_sk_pgtnp']; ?></td>
                            </tr>
                            <tr>
                                <td>Masa Kerja Mulai Dari</td>
                                <td>: <?= $user['masa_kerja']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->