<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Soal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/summernote-bs4.min.css') ?>">
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
            <div class="container-fluid shadow-sm" style="padding: 25px">
                <h1>Soal</h1>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pg-tab" data-toggle="tab" href="#pg" role="tab" aria-controls="pilihan ganda" aria-selected="true">Pilihan Ganda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="esai-tab" data-toggle="tab" href="#esai" role="tab" aria-controls="esai" aria-selected="false">Esai</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pg" role="tabpanel" aria-labelledby="pg-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Sub materi</th>
                                    <th scope="col">Kunci Jawaban</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col" style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_pg = 1;
                                foreach ($soal as $soa) {
                                    if ($soa['tipe'] == 'pg') { ?>
                                        <tr>
                                            <th scope="row"><?php echo $no_pg ?></th>
                                            <td><?php echo $soa['pertanyaan'] ?></td>
                                            <td><?php echo $soa['judul_sub'] ?></td>
                                            <td><?php echo $soa['pilihan'] ? $soa['pilihan'] : "belum ada kunci jawaban" ?></td>
                                            <td><?php echo $soa['bobot'] ?></td>
                                            <td style="text-align: center; white-space: nowrap; width: 1%">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahSoal" data-soalid="<?php echo $soa['id'] ?>" data-soaljenis="<?php echo $soa['tipe'] ?>" data-url-api-soal="<?php echo site_url('api/soal/') ?>">Ubah</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusSoal" data-soalid="<?php echo $soa['id'] ?>" data-url-hapus-soal="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/soal/delete/') ?>">Hapus</button>
                                                <!-- FIXME: hapus soal -->
                                            </td>
                                        </tr>
                                <?php $no_pg++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="esai" role="tabpanel" aria-labelledby="esai-tab">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Sub materi</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col" style="text-align: center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no_esai = 1;
                                foreach ($soal as $soa) {
                                    if ($soa['tipe'] == 'esai') { ?>
                                        <tr>
                                            <th scope="row"><?php echo $no_esai ?></th>
                                            <td><?php echo $soa['pertanyaan'] ?></td>
                                            <td><?php echo $soa['judul_sub'] ?></td>
                                            <td><?php echo $soa['bobot'] ?></td>
                                            <td style="text-align: center; white-space: nowrap; width: 1%">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ubahSoal" data-soalid="<?php echo $soa['id'] ?>" data-soaljenis="<?php echo $soa['tipe'] ?>" data-url-api-soal="<?php echo site_url('api/soal/') ?>">Ubah</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusSoal" data-soalid="<?php echo $soa['id'] ?>" data-url-hapus-soal="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/soal/delete/') ?>">Hapus</button>
                                                <!-- FIXME: hapus soal -->
                                            </td>
                                        </tr>
                                <?php $no_esai++;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusSoal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Soal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Yakin ingin menghapus soal?</h6>
                </div>
                <div class="modal-footer">
                    <form id="formHapusSoal" action="" method="POST">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahSoal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Soal Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/soal') ?>" method="POST">
                        <div class="form-group">
                            <label for="tipeSoal">Tipe Soal</label>
                            <select class="form-control" id="tipeSoal" name="tipeSoal" required>
                                <option default value="pg">Pilihan Ganda</option>
                                <option value="esai">Esai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subMateri">Sub Materi</label>
                            <select class="form-control" id="subMateri" name="subMateri" required></select>
                        </div>
                        <div class="form-group">
                            <label for="kodeMateri">Kode Materi</label>
                            <input type="text" class="form-control" id="kodeMateri" name="kodeMateri" value="<?php echo $this->uri->segment(5) ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="editor">Pertanyaan</label>
                            <!-- <div id="editorTambah"></div> -->
                            <textarea class="form-control summernote" id="editorTambah" name="pertanyaan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bobotSoal">Bobot Soal</label>
                            <input type="number" class="form-control" id="bobotSoal" name="bobotSoal" min="0" required>
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

    <div class="modal fade" id="ubahSoal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Soal Pilihan Ganda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" data-url="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/soal/') ?>">
                        <!-- <div class="form-group">
                            <label for="subMateri">Sub Materi</label>
                            <select class="form-control" id="subMateri" name="subMateri" required></select>
                        </div> -->
                        <div class="form-group">
                            <label for="editor">Pertanyaan</label>
                            <textarea class="summernote form-control" id="editorUbah" name="pertanyaan"></textarea>
                        </div>
                        <div id="pilihanGanda">
                            <h5 class="modal-title">Pilihan Jawaban</h5>
                            <table class="table">
                                <thead class="text-center">
                                    <th>Pilihan</th>
                                    <th>Kunci</th>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>

                </div>
                <div class="modal-footer">
                    <div class="text-left" id="btnPG">
                        <button type="button" id="btnHapusPilihan" class="btn btn-danger">Hapus Pilihan</button>
                        <button type="button" id="btnTambahPilihan" class="btn btn-info">Tambah Pilihan</button>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetTableRow()">Batal</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu Toggle Script -->
    <script src="<?php echo base_url('assets/js/summernote-bs4.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                dialogsInBody: true,
                disableDragAndDrop: true,
                spellcheck: false,
                callbacks: {
                    onImageUpload: function(files) {
                        if (!files.length) return;
                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i])
                        }
                    }
                }
            })
            $('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            })

            function uploadImage(file) {
                let data = new FormData();
                data.append('file', file);
                fetch("<?php echo site_url('/api/image') ?>", {
                    method: "POST",
                    body: data
                }).then(response => response.json()).then(data => {
                    // console.log(data);
                    $('.summernote').summernote('insertImage', data.path);
                });
            }

            $('#hapusSoal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var soal_id = button.data('soalid')
                var urlHapusSoal = button.data('url-hapus-soal')
                $('.modal-footer form').attr('action', urlHapusSoal + soal_id)
            })

            $('#ubahSoal').on('show.bs.modal', function(event) {
                let button = $(event.relatedTarget)
                let soal_id = button.data('soalid')
                var soal_jenis = button.data('soaljenis')
                var urlApiSoal = button.data('url-api-soal');
                let modal = $(this)
                fetch(urlApiSoal + soal_id)
                    .then(response => response.json())
                    .then(data => {
                        var pertanyaan = data.pertanyaan
                        $("#editorUbah").summernote('code', pertanyaan)
                        // $("#subMateriId" + data.sub_id).prop('selected', true);
                    });

                fetch(urlApiSoal + "pilihan/" + soal_id)
                    .then(response => response.json())
                    .then(function(data) {
                        this.appendPilihan(data)
                    })
                var getUrlPost = $("#ubahSoal .modal-body form").data('url');

                if (soal_jenis == 'pg') {
                    $('.modal-body form').attr('action', getUrlPost + soal_id);
                    modal.find('.modal-body #pilihanGanda').removeClass('d-none');
                    modal.find('.modal-footer #btnPG').removeClass('d-none');
                } else if (soal_jenis == 'esai') {
                    $('.modal-body form').attr('action', getUrlPost + "esai/" + soal_id);
                    modal.find('.modal-body #pilihanGanda').addClass('d-none');
                    modal.find('.modal-footer #btnPG').addClass('d-none');
                }
            });

            $('#btnTambahPilihan').click(function() {
                data = [{
                    id: "",
                    soal_id: "",
                    pilihan: "",
                    kunci_id: ""
                }]
                appendPilihan(data)
            })
        });

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });


        let i = 0;

        function appendPilihan(data) {
            data.forEach(el => {
                $("#pilihanGanda tbody")
                    .append(`
        <tr>
          <td><textarea name="pilihan[` + i + `]" class="form-control" data-pil_id="` + el.id + `" rows="2" aria-label="Pilihan Jawaban">` + el
                        .pilihan + `</textarea>
          <td>
            <input class="form-check-input" type="checkbox" name="kunci[` + i + `]" value="1" id="checkKunci` + i + `" onclick="selectOnlyThis(this.id)">
            <label for="checkKunci` + i + `">Kunci</label>
            <input type="hidden" name="id[` + i + `]" value="` + el.id + `">
          </td>
        </tr>
        `)
                if (el.kunci_id) {
                    $("#checkKunci" + i).prop('checked', true)
                }
                i++;
            });
        }

        function resetTableRow() {
            $('#pilihanGanda tbody tr').remove();
            i = 0;
        }

        function selectOnlyThis(id) {
            for (var j = 0; j <= i; j++) {
                $("#checkKunci" + j).prop("checked", false)
            }
            $("#" + id).prop("checked", true)
        }

        $('#btnHapusPilihan').click(function() {
            let id = $("#pilihanGanda tbody tr td textarea").last().data('pil_id');
            fetch('/api/soal/pilihan/delete/' + id)
                .then(response => response.json())
                .then(data => console.log(data.status));
            $("#pilihanGanda tbody tr").last().remove();
            i--;
        })

        fetch('/api/showlistsub/<?php echo $this->uri->segment(5) ?>').then(response => response.json()).then(data => {
            console.log(data);
            let first = true;
            data.forEach(el => {
                $("#subMateri").append(`<option id="subMateriId${el.id}" ${first ? 'default' : ''} value="${el.id}">${el.judul}</option>`);
                first = false;
            })
        });
    </script>
</body>

</html>