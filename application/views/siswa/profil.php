<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profil Saya</title>
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

            <!-- isi halaman -->
            <div class="container-fluid">
                <?php if ($this->session->flashdata('alert')) { ?>
                    <div class="mx-3 my-4 alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('alert') ?>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="mx-3 my-4 alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success') ?>
                    </div>
                <?php } ?>

                <div class="row shadow-sm p-2 p-md-4">
                    <div class="d-flex flex-wrap col-12">
                        <div class="text-center col-12 col-lg-2">
                            <img src="<?php echo base_url(isset($data['url_foto']) ? 'uploads/profil/' . $data['url_foto'] : 'assets/images/img_avatar.png') ?>" class="shadow-sm rounded-circle" style="object-fit:cover; width: 150px; height: 150px;">
                        </div>
                        <div class="text-center text-lg-left col-12 col-lg-10 my-2">
                            <h2><?php echo isset($data['nama_lengkap']) ? $data['nama_lengkap'] : "Tidak ada data" ?></h2>
                            <p style="color: gray">
                                NIP : <?php echo isset($data['nomor_induk']) ? $data['nomor_induk'] : "Tidak ada data" ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row shadow-sm" style="padding: 25px">
                    <div class="col-12">
                        <table>
                            <tr>
                                <th>Jabatan</th>
                                <td>: <?php echo ucfirst($this->session->userdata('role')) ?></td>
                            </tr>
                            <tr>
                                <th>Sekolah</th>
                                <td>: <?php echo isset($data['nama_sekolah']) ? $data['nama_sekolah'] : "Tidak ada data" ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?php echo isset($data['alamat']) ? $data['alamat'] : "Tidak ada data" ?></td>
                            </tr>
                            <tr>
                                <th>No. Telp/HP</th>
                                <td>: <?php echo isset($data['no_hp']) ? $data['no_hp'] : "Tidak ada data" ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="ml-md-auto d-md-flex flex-column flex-md-row flex-wrap">
                        <div class="p-1 col-12 col-md-auto">
                            <button type="button" class="col-12 btn btn-success" data-toggle="modal" data-target="#editFoto">
                                Ubah Foto
                            </button>
                        </div>
                        <div class="p-1 col-12 col-md-auto">
                            <button type="button" class="col-12 btn btn-primary" data-toggle="modal" data-target="#editProfil">
                                Ubah Profil
                            </button>
                        </div>
                        <div class="p-1 col-12 col-md-auto">
                            <button type="button" class="col-12 btn btn-secondary" data-toggle="modal" data-target="#editPassword">
                                Ubah Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit foto -->
    <div class="modal fade" id="editFoto" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('profil/ubah/foto') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fotoProfil">Upload Foto Profil (ekstensi yang diperbolehkan hanya .gif, .png, .jpg, .jpeg dan ukuran maksimal adalah 500kB)</label>
                            <input type="file" class="form-control-file" name="file" id="fotoProfil">
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

    <!-- Modal Edit Profil -->
    <div class="modal fade" id="editProfil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Profil Saya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('profil/ubah') ?>" method="POST">
                        <div class="form-group">
                            <label for="namaLengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" value="<?php echo isset($data['nama_lengkap']) ? $data['nama_lengkap'] : "" ?>">
                        </div>
                        <div class="form-group">
                            <label for="nomorInduk">Nomor Induk Sekolah (NIS)</label>
                            <input type="text" class="form-control" id="nomorInduk" name="nomorInduk" value="<?php echo isset($data['nomor_induk']) ? $data['nomor_induk'] : "" ?>">
                        </div>
                        <div class="form-group">
                            <label for="sekolah">Sekolah</label>
                            <select id="sekolah" class="form-control" name="sekolah" required>
                                <?php foreach ($sekolah as $school) { ?>
                                    <option value="<?php echo $school['id'] ?>"><?php echo $school['nama_sekolah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <textarea class="form-control" id="Alamat" name="Alamat"><?php echo isset($data['alamat']) ? $data['alamat'] : "" ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No. Telp/HP</label>
                            <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?php echo isset($data['no_hp']) ? $data['no_hp'] : "" ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Password -->
    <div class="modal fade" id="editPassword" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Password Saya</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('profil/ubah/password') ?>" method="POST">
                        <div class="form-group">
                            <label for="passwordLama">Password Saat Ini</label>
                            <input type="password" class="form-control" id="passwordLama" name="passwordLama" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="passwordBaru">Password Baru</label>
                            <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" required>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasiPassword">Ketik Ulang Password Baru</label>
                            <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword" required>
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

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>