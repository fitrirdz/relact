<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Materi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="icon" href="<?php echo base_url('assets/images/logoTab_Relact.png') ?>">
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php include('sidebar.php') ?>
        <div id="page-content-wrapper">
            <?php include('navbar.php') ?>
            <div class="container-fluid shadow-sm" style="padding: 25px">
                <?php if (!$data) { ?>
                    <div class="alert alert-danger col-12" role="alert">
                        <h4 class="alert-heading">Tidak ada materi !</h4>
                        <hr />
                        <p class="mb-0">
                            Silahkan tambahkan materi dengan tombol diatas !
                        </p>
                    </div>
                <?php } else { ?>
                    <h3>Daftar Materi</h3>
                    <br>
                    <div class="list-group">
                        <?php if ($data) {
                            foreach ($data as $dat) { ?>
                                <a href="<?php echo base_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $dat['kode']) ?>" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><strong>
                                                <?php echo $dat['judul'] ?>
                                            </strong></h5>
                                    </div>
                                    <div>
                                        <span class="d-inline-block text-truncate w-100">
                                            <?php echo $dat['deskripsi'] ?>
                                        </span>
                                    </div>
                                </a>
                        <?php }
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahMateri" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Materi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url(uri_string() . '/materi') ?>" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi singkat (maksimal 160 karakter)</label>
                            <textarea class="form-control" id="deskripsi" rows="4" maxlength="160" name="deskripsi"></textarea>
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper -->

    <!-- Menu Toggle Script -->

    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>