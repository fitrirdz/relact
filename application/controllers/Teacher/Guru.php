<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/Teacher/Base.php';

class Guru extends Base
{
	public function index()
	{
		redirect(site_url('guru/kelas'));
		// $this->load->view('guru/beranda');
	}
}
