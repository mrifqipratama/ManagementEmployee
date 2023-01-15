<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil <?= $title; ?></h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('notifikasi'); ?>
            <!-- <a href="<?= base_url('survey/hasilsurvey') ?>" class="btn btn-info mb-3">Preview Hasil Survey</a> -->
            <!-- <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newPegawai">Tambah Data Pegawai</a> -->
            <div class="table-responsive text-nowrap">
                <table id="tabelkinerja" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Bulan</th>
                            <th>Jawaban No. 1</th>
                            <th>Jawaban No. 2</th>
                            <th>Jawaban No. 3</th>
                            <th>Jawaban No. 4</th>
                            <th>Jawaban No. 5</th>
                            <th>Jawaban No. 6</th>
                            <th>Jawaban No. 7</th>
                            <th>Jawaban No. 8</th>
                            <th>Jawaban No. 9</th>
                            <th>Jawaban No. 10</th>
                            <th>Penilaian Kinerja</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1;
                        // $ab = $a['jawaban'] + $a['jawaban2']; //Menghitung A + B
                        foreach ($query as $a) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('survey/deletesurvey/' . $a['id_survey']); ?>" onclick="return confirm('Yakin ingin menghapus data dari <?= $a['nama_pegawai'] ?>?');" class='fas fa-trash' style='font-size:15px;color:red'></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a['nip']; ?></td>
                                <td><?= $a['nama_pegawai']; ?></td>
                                <td><?= $a['nama_bulan']; ?></td>
                                <td><?= $a['jawaban']; ?></td>
                                <td><?= $a['jawaban2']; ?></td>
                                <td><?= $a['jawaban3']; ?></td>
                                <td><?= $a['jawaban4']; ?></td>
                                <td><?= $a['jawaban5']; ?></td>
                                <td><?= $a['jawaban6']; ?></td>
                                <td><?= $a['jawaban7']; ?></td>
                                <td><?= $a['jawaban8']; ?></td>
                                <td><?= $a['jawaban9']; ?></td>
                                <td><?= $a['jawaban10']; ?></td>
                                <td><?= ((int)$a['jawaban'] + (int)$a['jawaban2'] + (int)$a['jawaban3'] + (int)$a['jawaban4'] + (int)$a['jawaban5'] + (int)$a['jawaban6'] + (int)$a['jawaban7'] + (int)$a['jawaban8'] + (int)$a['jawaban9'] + (int)$a['jawaban10']); ?></td>


                                <!-- <td><?= $a['poin']; ?></td> -->
                            </tr>
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