<div class="border-right shadow-sm" id="sidebar-wrapper" style="background-color: #f7f7f7">
    <!-- Logo dan nama aplikasi -->
    <div class="sidebar-heading" style="text-align: center;">
        <a href="<?php echo base_url() ?>">
            <img src="<?php echo base_url('assets/images/logoNav_Relact.png') ?>" height="34">
        </a>
    </div>
    <div class="list-group list-group-flush">
        <a href="<?php echo site_url("siswa/profil") ?>" class="list-group-item list-group-item-action mb-2 bg-light">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" /></svg>
            Profil Saya
        </a>
        <a href="<?php echo site_url("siswa/kelas") ?>" class="list-group-item list-group-item-action mb-2 bg-light">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M23,2H1A1,1 0 0,0 0,3V21A1,1 0 0,0 1,22H23A1,1 0 0,0 24,21V3A1,1 0 0,0 23,2M22,20H20V19H15V20H2V4H22V20M10.29,9.71A1.71,1.71 0 0,1 12,8C12.95,8 13.71,8.77 13.71,9.71C13.71,10.66 12.95,11.43 12,11.43C11.05,11.43 10.29,10.66 10.29,9.71M5.71,11.29C5.71,10.58 6.29,10 7,10A1.29,1.29 0 0,1 8.29,11.29C8.29,12 7.71,12.57 7,12.57C6.29,12.57 5.71,12 5.71,11.29M15.71,11.29A1.29,1.29 0 0,1 17,10A1.29,1.29 0 0,1 18.29,11.29C18.29,12 17.71,12.57 17,12.57C16.29,12.57 15.71,12 15.71,11.29M20,15.14V16H16L14,16H10L8,16H4V15.14C4,14.2 5.55,13.43 7,13.43C7.55,13.43 8.11,13.54 8.6,13.73C9.35,13.04 10.7,12.57 12,12.57C13.3,12.57 14.65,13.04 15.4,13.73C15.89,13.54 16.45,13.43 17,13.43C18.45,13.43 20,14.2 20,15.14Z" /></svg>
            Kelas
        </a>
        <a href="<?php echo site_url("siswa/capaian") ?>" class="list-group-item list-group-item-action mb-2 bg-light">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M17 4V2H7V4H2V11C2 12.1 2.9 13 4 13H7.1C7.5 14.96 9.04 16.5 11 16.9V19.08C8 19.54 8 22 8 22H16C16 22 16 19.54 13 19.08V16.9C14.96 16.5 16.5 14.96 16.9 13H20C21.1 13 22 12.1 22 11V4H17M4 11V6H7V11L4 11M20 11L17 11V6H20L20 11Z" /></svg>
            Capaian Belajar
        </a>
        <hr>
        <hr>
        <p class="list-group-item mb-2 bg-light">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M15.07,11.25L14.17,12.17C13.45,12.89 13,13.5 13,15H11V14.5C11,13.39 11.45,12.39 12.17,11.67L13.41,10.41C13.78,10.05 14,9.55 14,9C14,7.89 13.1,7 12,7A2,2 0 0,0 10,9H8A4,4 0 0,1 12,5A4,4 0 0,1 16,9C16,9.88 15.64,10.67 15.07,11.25M13,19H11V17H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" /></svg>
            Pusat Bantuan
            <div class="list-group">
                <a href="<?php echo base_url("tentang") ?>" class="list-group-item list-group-item-action">Tentang</a>
                <a href="<?php echo base_url("saran") ?>" class="list-group-item list-group-item-action">Hubungi Kami</a>
                <a href="<?php echo base_url('faq') ?>" class="list-group-item list-group-item-action">FAQ</a>
            </div>
        </p>
    </div>
</div>