<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Data Bulan</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            <?= $this->session->flashdata('notifikasi'); ?>
            <div class="table-responsive">
                <table id="tabelbulan" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>No</th>
                            <th>Nama Bulan</th>
                            <th>Jumlah Hari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($bulan as $a) : ?>
                            <tr>
                                <td>
                                    <a href="#" class='fas fa-edit' style='font-size:15px;color:#00cc00' data-toggle="modal" data-target="#updatebulan<?= $a->id_bulan ?>"></a>
                                </td>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= $a->nama_bulan; ?></td>
                                <td><?= $a->jml_hari; ?> Hari</td>
                            </tr>
                            <div class="modal fade" id="updatebulan<?= $a->id_bulan ?>" tabindex="-1" role="dialog" aria-labelledby="updatebulanLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatebulanLabel">Update Bulan </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="p-5">
                                            <form class="bulan" method="post" action="<?= base_url('akademik/updatebulan?id_bulan=') ?><?= $a->id_bulan ?>">
                                                <div class="form-group row mb-3">
                                                    <label for="id_bulan" class="col-sm-3 col-form-label">Id_bulan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="id_bulan" name="id_bulan" value="<?= $a->id_bulan; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="nama_bulan" class="col-sm-3 col-form-label">Nama Bulan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="nama_bulan" name="nama_bulan" value="<?= $a->nama_bulan; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="jml_hari" class="col-sm-3 col-form-label">Ekuivalensi Jam Perbulan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="jml_hari" name="jml_hari" value="<?= $a->jml_hari; ?>">
                                                    </div>
                                                </div>

                                                <!-- Button  -->
                                                <div class="form-group row mb-3 justify-content-end">
                                                    <div class="col-sm-10 text-right">
                                                        <button type="submmit" class="btn btn-info">Edit / Update Bulan</button>
                                                    </div>
                                                </div>

                                            </form>
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