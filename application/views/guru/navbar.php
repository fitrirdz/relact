<nav class="navbar navbar-expand-lg border-bottom shadow-sm d-flex flex-wrap col-12 justify-content-between">
    <div class="d-flex flex-wrap col-12 col-md-auto">
        <button class="btn shadow-none pr-3" id="menu-toggle"><svg style="width:24px; height:24px; color: white;" viewBox="0 0 24 24">
                <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>
        </button>
        <h5 class="pt-2" style="color: white">Recording Learning Activities</h5>
    </div>
    <div class="col-12 col-md-auto">
        <ul class="navbar-nav flex-row ml-auto d-flex">
            <?php if ($this->uri->segment(2) == 'kelas') { ?>
                <?php if ($this->uri->segment(3)) { ?>
                    <?php if (!$this->uri->segment(4)) { ?>
                        <li>
                            <!-- <a class="btn btn-secondary" href="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/tambah_materi') ?>">Tambah Materi</a> -->
                            <button type="button" class="btn btn-secondary mr-1" data-toggle="modal" data-target="#tambahMateri">
                                Tambah Materi
                            </button>
                        </li>

                    <?php }
                            if ($this->uri->segment(4) == 'materi' && $this->uri->segment(5) && !$this->uri->segment(6) == 'soal') { ?>
                        <li class="mr-2">
                            <a class="btn btn-success" href="<?php echo base_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/soal') ?>" role="button">Lihat Soal</a>
                        </li>
                        <li class="mr-2">
                            <a class="btn btn-primary" href="<?php echo site_url('guru/kelas/' . $this->uri->segment(3) . '/materi/' . $this->uri->segment(5) . '/tambah') ?>">Tambah Submateri</a>
                        </li>
                        <li class="mr-2">
                            <a type="button" class="btn btn-secondary text-white" data-toggle="modal" data-target="#ubahMateri">Ubah Materi</a>
                        </li>
                        <li class="mr-2">
                            <a type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteMateri">Hapus Materi</a>
                        </li>
                    <?php } else if ($this->uri->segment(4) == 'materi' && $this->uri->segment(5) && $this->uri->segment(6) == 'soal') { ?>
                        <li>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahSoal">Tambah Soal</button>
                        </li>
                    <?php } else if ($this->uri->segment(4) == 'materi' && $this->uri->segment(5) && $this->uri->segment(6) == 'sub') { ?>
                        <li class="mr-2">
                            <a class="btn btn-secondary" href="<?php echo site_url(uri_string() . '/ubah') ?>">Ubah Submateri</a>
                        </li>
                        <li class="mr-2">
                            <a type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteSub">Hapus Submateri</a>
                        </li>
                    <?php }
                        } else { ?>
                    <li>
                        <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#tambahKelas">
                            Tambah Kelas
                        </button>
                    </li>
            <?php
                }
            } ?>
            <li class="nav-item dropdown">
                <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <span class="text-white"><?php echo $this->session->userdata("nama"); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="bd-versions">
                    <a class="dropdown-item" href="<?php echo base_url('faq') ?>">FAQ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('Login/Logout') ?>">Keluar</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<?php if ($this->breadcrumb->get_array() != null) { ?>
    <nav class="px-3 py-2" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php $i = 1;
                $breadcrumb = $this->breadcrumb->get_array();
                foreach ($breadcrumb as $key => $crumb) {
                    $keys = array_keys($breadcrumb);
                    if (end($keys) == $key) { ?>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?php echo $crumb['page'] ?></li>
                <?php } else { ?>
                    <li class="breadcrumb-item text-capitalize"><a href="<?php echo $crumb['href'] ?>"><?php echo $crumb['page'] ?></a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Kelas</a></li> -->
            <?php }
                    $i++;
                } ?>
        </ol>
    </nav>

<?php } ?>