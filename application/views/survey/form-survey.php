<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="card shadow mb-4 ml-5 mr-5">
        <div class="card-body">
            <div class="col-lg-9">

                <?= form_open_multipart('survey/tambahSurvey'); ?>
                <div class="form-group row mb-3">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-9">

                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $query->nip; ?>" readonly>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="id_bulan" class="col-sm-2 col-form-label">Bulan</label>
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
                <!-- checkbox inline -->
                <!-- if for checked -->
                <div class="form-group row mb-3">
                    <label for="jawaban" class="col-sm-9 col-form-label">1. Apakah pegawai mampu bekerja mencapai/melebihi target.</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban" value="5" <?php if (isset($_POST['jawaban']) && $_POST['jawaban'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban" value="4" <?php if (isset($_POST['jawaban']) && $_POST['jawaban'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban" value="3" <?php if (isset($_POST['jawaban']) && $_POST['jawaban'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban" id="jawaban" value="2" <?php if (isset($_POST['jawaban']) && $_POST['jawaban'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban2" class="col-sm-9 col-form-label">2. Apakah pegawai mampu menyelesaikan pekerjaaan yang diberikan.</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban2" id="jawaban2" value="5" <?php if (isset($_POST['jawaban2']) && $_POST['jawaban2'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban2">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban2" id="jawaban2" value="4" <?php if (isset($_POST['jawaban2']) && $_POST['jawaban2'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban2">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban2" id="jawaban2" value="3" <?php if (isset($_POST['jawaban2']) && $_POST['jawaban2'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban2">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban2" id="jawaban2" value="2" <?php if (isset($_POST['jawaban2']) && $_POST['jawaban2'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban2">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban3" class="col-sm-9 col-form-label">3. Apakah pegawai mampu menyelesaikan pekerjaan dengan ketelitian yang tinggi. </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban3" id="jawaban3" value="5" <?php if (isset($_POST['jawaban3']) && $_POST['jawaban3'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban3">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban3" id="jawaban3" value="4" <?php if (isset($_POST['jawaban3']) && $_POST['jawaban3'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban3">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban3" id="jawaban3" value="3" <?php if (isset($_POST['jawaban3']) && $_POST['jawaban3'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban3">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban3" id="jawaban3" value="2" <?php if (isset($_POST['jawaban3']) && $_POST['jawaban3'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban3">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban3', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban4" class="col-sm-9 col-form-label">4. Apakah pegawai mempu menyelesaikan suatu pekerjaan dengan rapi.</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban4" id="jawaban4" value="5" <?php if (isset($_POST['jawaban4']) && $_POST['jawaban4'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban4">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban4" id="jawaban4" value="4" <?php if (isset($_POST['jawaban4']) && $_POST['jawaban4'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban4">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban4" id="jawaban4" value="3" <?php if (isset($_POST['jawaban4']) && $_POST['jawaban4'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban4">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban4" id="jawaban4" value="2" <?php if (isset($_POST['jawaban4']) && $_POST['jawaban4'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban4">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban4', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban5" class="col-sm-9 col-form-label">5. Apakah pegawai mempu meminimalkan kesalahan dalam menyelesaikan pekerjaan. </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban5" id="jawaban5" value="5" <?php if (isset($_POST['jawaban5']) && $_POST['jawaban5'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban5">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban5" id="jawaban5" value="4" <?php if (isset($_POST['jawaban5']) && $_POST['jawaban5'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban5">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban5" id="jawaban5" value="3" <?php if (isset($_POST['jawaban5']) && $_POST['jawaban5'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban5">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban5" id="jawaban5" value="2" <?php if (isset($_POST['jawaban5']) && $_POST['jawaban5'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban5">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban5', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban6" class="col-sm-9 col-form-label">6. Apakah pegawai mampu berinovasi dalam menyelesaikan pekerjaan. </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban6" id="jawaban6" value="5" <?php if (isset($_POST['jawaban6']) && $_POST['jawaban6'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban6">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban6" id="jawaban6" value="4" <?php if (isset($_POST['jawaban6']) && $_POST['jawaban6'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban6">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban6" id="jawaban6" value="3" <?php if (isset($_POST['jawaban6']) && $_POST['jawaban6'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban6">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban6" id="jawaban6" value="2" <?php if (isset($_POST['jawaban6']) && $_POST['jawaban6'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban6">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban6', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban7" class="col-sm-9 col-form-label">7. Apakah pegawai mampu menyelesaikan pekerjaan dengan tepat waktu. </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban7" id="jawaban7" value="5" <?php if (isset($_POST['jawaban7']) && $_POST['jawaban'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban7">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban7" id="jawaban7" value="4" <?php if (isset($_POST['jawaban7']) && $_POST['jawaban7'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban7">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban7" id="jawaban7" value="3" <?php if (isset($_POST['jawaban7']) && $_POST['jawaban7'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban7">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban7" id="jawaban7" value="2" <?php if (isset($_POST['jawaban7']) && $_POST['jawaban7'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban7">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban7', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban8" class="col-sm-9 col-form-label">8. Apakah pegawai cepat dalam bertindak/mengambil keputusan.</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban8" id="jawaban8" value="5" <?php if (isset($_POST['jawaban8']) && $_POST['jawaban8'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban8">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban8" id="jawaban8" value="4" <?php if (isset($_POST['jawaban8']) && $_POST['jawaban8'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban8">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban8" id="jawaban8" value="3<?php if (isset($_POST['jawaban8']) && $_POST['jawaban8'] == "3") echo "checked"; ?>>
                            <label class=" form-check-label" for="jawaban8">
                            Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban8" id="jawaban8" value="2" <?php if (isset($_POST['jawaban8']) && $_POST['jawaban8'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban8">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban8', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban9" class="col-sm-9 col-form-label">9. Apakah pegawai dapat menggunakan waktu dengan efektif & efisien</label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban9" id="jawaban9" value="5" <?php if (isset($_POST['jawaban9']) && $_POST['jawaban9'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban9">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban9" id="jawaban9" value="4" <?php if (isset($_POST['jawaban9']) && $_POST['jawaban9'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban9">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban9" id="jawaban9" value="3" <?php if (isset($_POST['jawaban9']) && $_POST['jawaban9'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban9">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban9" id="jawaban9" value="2" <?php if (isset($_POST['jawaban9']) && $_POST['jawaban9'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban9">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban9', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="jawaban10" class="col-sm-9 col-form-label">10. Apakah pegawai datang ke kantor dengan tepat waktu. </label>
                    <div class="col-sm-9">
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban10" id="jawaban10" value="5" <?php if (isset($_POST['jawaban10']) && $_POST['jawaban10'] == "5") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban10">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban10" id="jawaban10" value="4" <?php if (isset($_POST['jawaban10']) && $_POST['jawaban10'] == "4") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban10">
                                Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban10" id="jawaban10" value="3" <?php if (isset($_POST['jawaban10']) && $_POST['jawaban10'] == "3") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban10">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class=" form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jawaban10" id="jawaban10" value="2" <?php if (isset($_POST['jawaban10']) && $_POST['jawaban10'] == "2") echo "checked"; ?>>
                            <label class="form-check-label" for="jawaban10">
                                Tidak Setuju
                            </label>
                        </div>
                        <?= form_error('jawaban10', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <!-- end checkbox inline -->
                <!-- end choose file -->
                <div class="form-group row mb-3 justify-content-end">
                    <div class="col-sm-10 text-right">
                        <button type="submmit" class="btn btn-primary">Simpan Survey</button>
                    </div>
                </div>



                </form>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->