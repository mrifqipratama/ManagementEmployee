<!-- bg gradient warna -->
<div class="container bg-gradient-info">

    <!-- Outer Row -->
    <div class="row justify-content-center ">

        <div class="col-lg-6">

            <div class=" card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src=" <?= base_url('assets/logo/mts.jpg') ?>" width="30%">
                                    <h1 class="h5 text-gray-900 mb-2">Madrasah Tsanawiyah Laboratoium</h1>
                                    <h1 class="h5 text-gray-900 mb-2">Kota Jambi</h1>
                                </div>
                                <div class="text-center">

                                </div>
                                <?= $this->session->flashdata('notifikasi'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP" value="<?= set_value('nip'); ?>">
                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; MTs Laboratorium <?= date('Y'); ?></span>
                                </div>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Daftar Akun!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>