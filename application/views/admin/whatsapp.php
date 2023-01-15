<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('notifikasi'); ?>
    <div class="card shadow mb-4">
        <a href="<?= base_url('admin/whatsapplainya'); ?>" class="btn btn-primary mb-3">Broadcast</a>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/whatsapp') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row mb-3" id="form-no_telp">
                        <label class="col-sm-3 col-form-label">Pegawai</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="no_telp" name="no_telp" style="width: 85%;">
                                <option value="">- Pilih Pegawai -</option>
                                <?php
                                foreach ($nip as $data) {
                                    echo '<option value="' . $data->no_telp . '">' . $data->no_telp . ' | ' . $data->nama_pegawai . '</option>';
                                }
                                ?>
                            </select>
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-3" id="form-pesan">
                        <label class="col-sm-3 col-form-label">Isi Pesan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="pesan" name="pesan" placeholder="Masukkan Pesan" rows="3" style="text-align: center;width:85%;"></textarea>
                        </div>
                    </div>
                    <!-- Button  -->
                    <div class="form-group row mb-3">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="submmit" class="btn btn-success">Kirim Pesan</button>
                            <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>