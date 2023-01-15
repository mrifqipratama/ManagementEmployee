<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Hasil Penilaian</h1>

    <?= $this->session->flashdata('notifikasi'); ?>

    <div class="card shadow mb-4 ml-2 mr-2">
        <div class="card-body">
            <a href="<?= $url_cetak; ?>" class=" btn btn-success mb-3">Print PDF</a>
            <div class="col">
                <center>
                    <table>
                        <tr>
                            <img src="<?= base_url('assets/logo/mts.png') ?>" class="rounded float-left" style="width: 90px; height: 90px;">
                            <td>
                                <center>
                                    <h4 style="font-family: times;">MADRASAH TSANAWIYAH LABORATOIUM JAMBI</h4>
                                    <p class="m-2" style="font-family: times;">Alamat: Jl. Arif Rahman Hakim, No. 111, Kel. Simpang IV Sipin</p>
                                    <p class="m-2" style="font-family: times;">Kecamatan Telanaipura, Kota Jambi, Kode Pos : 36361</p>
                                </center>
                            </td>
                        </tr>
                    </table>
                    <hr noshade>
                    <h4 class="m-2" style="font-family: times;">PENILAIAN KINERJA GURU</h4>
                    <p class="m-2" style="font-family: times;">Bulan <?= $query2['nama_bulan'] ?>
                    </p>
                </center>
                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Nama Pegawai
                    </div>
                    <div class="col" style="font-family: times;">
                        : <?= $query2['nama_pegawai']; ?>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Nomor Induk Pegawai
                    </div>
                    <div class="col" style="font-family: times;">
                        : <?= $query2['nip']; ?>
                    </div>
                </div>

                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Kegiatan
                    </div>
                    <div class="col" style="font-family: times;">
                        : <?= $query['kegiatan']; ?> Volume
                    </div>
                </div>
                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Jumlah Presensi
                    </div>
                    <div class="col" style="font-family: times;">
                        <?php
                        $jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']); ?>
                        : <?= $jml_presensi; ?> Jam
                    </div>
                </div>
                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Penilaian Kepala Sekolah
                    </div>
                    <div class="col" style="font-family: times;">
                        <?php
                        $jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']); ?>
                        : <?= $jml_jawaban; ?> Poin
                    </div>
                </div>
                <hr noshade width="75%" align="left" class="ml-3">
                <div class="row m-4">
                    <div class="ml-3 col-4" style="font-family: times;">
                        Hasil Penilaian
                    </div>
                    <div class="col" style="font-family: times;">
                        <?php
                        $jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']);
                        $jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']);
                        $total_presensi = ((int)$query2['total_sehari']  * (int)$query2['jml_hari'] + (int)$query2['ekuivalensi']);
                        $total_kegiatan = '60';
                        $total_jawaban = '50';
                        $hasil_penilaian = (($query['kegiatan'] / $total_kegiatan * '100') * ($jml_presensi / $total_presensi) * ($jml_jawaban / $total_jawaban)); ?>
                        : <?= round($hasil_penilaian); ?> Poin
                    </div>
                </div>
                <div class="row m-4">
                    <div class="ml-3 col-4">
                        <!-- Menghitung Predikat
                        Predikat = (jumlah kegiatan / total kegiatan * 100) * (jumlah presensi / total presensi) * (jumlah jawaban / total jawaban) -->
                        <p class="font-weight-bold" style="font-family: times;  font-size: 18px;">PREDIKAT</p>
                    </div>
                    <div class="col font-weight-bold" style="font-family: times;  font-size: 18px;">
                        <?php
                        $jml_jawaban = ($query3['jawaban'] + $query3['jawaban2'] + $query3['jawaban3'] + $query3['jawaban4'] + $query3['jawaban5'] + $query3['jawaban6'] + $query3['jawaban7'] + $query3['jawaban8'] + $query3['jawaban9'] + $query3['jawaban10']);
                        $jml_presensi = ((int)$query2['total_jam']  + (int)$query2['ekuivalensi_jam']);
                        $total_presensi = ((int)$query2['total_sehari']  * (int)$query2['jml_hari'] + (int)$query2['ekuivalensi']);
                        $total_kegiatan = '60';
                        $total_jawaban = '50';
                        $hasil_penilaian = (($query['kegiatan'] / $total_kegiatan * '100') * ($jml_presensi / $total_presensi) * ($jml_jawaban / $total_jawaban));
                        if ($hasil_penilaian == '') {
                            $predikat = 'TIDAK DI TEMUKAN';
                        } else if ($hasil_penilaian >= '80') {
                            $predikat = 'SANGAT BAIK';
                        } else if ($hasil_penilaian > '60') {
                            $predikat = 'BAIK';
                        } else if ($hasil_penilaian > '50') {
                            $predikat = 'CUKUP';
                        } else {
                            $predikat = 'KURANG';
                        }
                        ?>
                        : <?= $predikat; ?>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="mr-3 col">
                        <p style="font-family: times; text-align:right;">
                            Jambi, <?= $tgl_cetak ?></p>
                    </div>
                </div>
                <div class="row m-4">
                    <div class="col">
                    </div>
                </div>
                <div class="row m-4">
                    <div class=" col">
                        <p style="font-family: times; text-align:right;">
                            Mahmud MY, S. Ag., M. Pd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->