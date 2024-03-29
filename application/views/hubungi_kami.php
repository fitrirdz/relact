<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hubungi Kami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/contact-us.css') ?>">
    <link rel="icon" href="<?php echo base_url('assets/images/logoTab_Relact.png') ?>">
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/contact-us.js') ?>"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg border-bottom shadow-sm">
        <a href="<?php echo base_url() ?>">
            <h5 style="color: white">Recording Learning Activities</h5>
        </a>
    </nav>

    <header>
        <h2>Hubungi Kami</h2>
    </header>

    <div id="form">

        <div class="letter" id="letter"></div>
        <div class="letter" id="letter2"></div>

        <form id="waterform" action="<?php echo site_url('saran') ?>" method="POST">
            <div class="formgroup">
                <label for="jenisPertanyaan">Jenis Pertanyaan*</label>
                <select id="jenisPertanyaan" name="jenisPertanyaan" required>
                    <option value="Fitur Sistem">Fitur Sistem</option>
                    <option value="Kritik dan Saran">Kritik dan Saran</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="formgroup" id="message-form">
                <label for="message">Pesan</label>
                <textarea id="message" name="pesan"></textarea>
            </div>

            <input type="submit" value="Kirim" />
        </form>
    </div>
</body>