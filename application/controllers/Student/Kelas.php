<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/Student/Base.php';

class Kelas extends Base
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa/KelasModel', 'Kelas');
	}

	public function index()
	{
		$data = $this->Kelas->getUserKelasByUserId($this->getUserId());
		if (!$data) {
			$res['data'] = false;
		} else {
			$res['data'] = $data;
		}

		$this->breadcrumb->push('Siswa', '/siswa');
		$this->breadcrumb->push('Kelas', '/siswa/kelas');
		$this->load->view('siswa/kelas', $res);
	}

	/**
	 * post dari view untuk masuk kelas dengan kelas_kode
	 * 
	 * @return boolean and redirect
	 */
	public function masukKelas()
	{
		$kode_kelas = $this->input->post('kodeKelas');
		$check = $this->Kelas->masukKelasByKodeKelas($kode_kelas, $this->getUserId());
		if (!$check) {
			$this->session->set_flashdata('alert', 'Kode Kelas tidak ditemukan. Cek kembali kode yang diberikan guru.');
		} else {
			$this->session->set_flashdata('success', 'Berhasil masuk kelas.');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}
}
